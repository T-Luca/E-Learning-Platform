<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Authorization;
use App\Subcategory;
use App\User;


class AuthorizationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if(Auth::guest() || Auth::user()->role_id != 10){
            return redirect()->back()->with('error', 'Nu aveți permisiunea de a vizualiza această pagină');
        }
        return redirect()->action('AdminPanelsController@index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if(Auth::guest() || Auth::user()->role_id != 10){
            return redirect()->back()->with('error', 'Nu aveți permisiunea de a vizualiza această pagină');
        }
        $id = $request->input('current_id');
        $auths = Authorization::where('user_id','=',$id)->pluck('subcategory_id')->all();
        $subcategories = Subcategory::whereNotIn('id', $auths)->get();

        return view('adminpanel.auth.create')->with('user_id', $id)->with('subcategories', $subcategories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $auths = $request->input(['name']);
        for($i = 0; $i < count($auths); $i++){
            $auth = new Authorization;
            $auth->user_id = $request->input('user_id');
            $auth->subcategory_id = $auths[$i];
            $auth->save();
        }

        return redirect()->action('AuthorizationsController@show', ['id' => $request->input('user_id')])->with('success','Permisiunile au fost adăugate');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::guest() || Auth::user()->role_id != 10){
            return redirect()->back()->with('error', 'Nu aveți permisiunea de a vizualiza această pagină');
        }
        $user = User::find($id);
        $authorizations = Authorization::where('user_id','=',$id)->get();
        return view('adminpanel.auth.show')->with('user', $user)->with('authorizations', $authorizations);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $auth = Authorization::find($id);
        if(!is_null($auth)){
            if(Auth::user()->role_id != 10){
                return redirect('/')->with('error', 'Nu aveți permisiunea de a vizualiza această pagină');
            }
            $auth->delete();
            return redirect()->back()->with('success', 'Permisiunea a fost eliminată');
        }
        return redirect()->back()->with('error', 'Imposibil de șters permisiunile inexistente');
    }
}
