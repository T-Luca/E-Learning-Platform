<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class AdminPanelsController extends Controller
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
        $users = User::orderBy('name','asc')->get();
        return view('adminpanel.index')->with('users', $users);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->action('AuthorizationsController@show', ['id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        if(Auth::guest() || Auth::user()->role_id != 10){
            return redirect()->back()->with('error', 'Nu aveți permisiunea de a vizualiza această pagină');
        }
        $user = User::find($id);
        return view('adminpanel.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'type' => 'required'
        ]);
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role_id = $request->input('type');
        $user->save();

        return redirect('/adminpanel')->with('success', 'Utilizatorul a fost editat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if(!is_null($user)){
            if(Auth::user()->role_id != 10){
                return redirect('/')->with('error', 'Nu aveți permisiunea de a vizualiza această pagină');
            }
            $user->delete();
            return redirect()->back()->with('success', 'Contul a fost șters');
        }
        return redirect()->back()->with('error', 'Nu puteți șterge un cont inexistent');
    }
}
