<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Subcategory;
use App\Set;
use App\Authorization;

class SubcategoriesControllerCR extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return redirect('/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $subcategory = Subcategory::find($id);
        $sets = Set::where('subcategory_id','=',$id)->get();
        if(!Auth::guest()){
            $auth = Authorization::where([['user_id','=', Auth::user()->id],['subcategory_id','=',$id]])->get();
            $privs = Set::where([['user_id','=', Auth::user()->id],['subcategory_id','=',$id],['hidden','=',2]])->get();
        }
        else {
            $auth = Auth::guest();
            $privs = NULL;
        }
        if($subcategory->hidden == 0){
            return view('sets.index')->with('sets', $sets)->with('privs', $privs)->with(['current_id' => $id, 'auth' => $auth, 'name' => $subcategory->name]);
        }
        else if(!Auth::guest() && $subcategory->hidden == 1 && Auth::user()->role_id == 10){
            return view('sets.index')->with('sets', $sets)->with('privs', $privs)->with(['current_id' => $id, 'auth' => $auth, 'name' => $subcategory->name]);
        }
        else return redirect()->back()->with('error', 'Subcategoria nu există');
            }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id){
        if(Auth::user()->role_id != 10){
            return redirect()->action('CategoriesControllerCR@show', ['id' => $id])->with('error', 'Nu aveți permisiunea de a vizualiza această pagină');
        }
        return view('subcategories.create')->with('id', $id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required'
        ]);
        $subcategory = new Subcategory;
        $subcategory->name = $request->input('name');
        $subcategory->description = $request->input('description');
        $subcategory->category_id = $request->input('category_id');
        $subcategory->save();

        return redirect()->action('CategoriesControllerCR@show', ['id' => $request->input('category_id')])->with('success', 'Subcategorii adăugate');
    }
}