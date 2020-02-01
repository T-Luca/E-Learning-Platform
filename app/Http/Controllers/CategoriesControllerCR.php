<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Subcategory;
use Illuminate\View\View;


class CategoriesControllerCR extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index(){
        $categories = Category::all();
        return view('categories.index')->with('categories', $categories);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id){
        $subcategories = Subcategory::where('category_id','=',$id)->get();
        $category = Category::find($id);
        if($category->hidden == 0){
            return view('subcategories.index')->with('subcategories', $subcategories)->with('current_id', $id)->with('name', $category->name);
        }
        else if(!Auth::guest() && $category->hidden == 1 && Auth::user()->role_id == 10){
            return view('subcategories.index')->with('subcategories', $subcategories)->with('current_id', $id)->with('name', $category->name);
        }
        else return redirect()->back()->with('error', 'Categoria nu există');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(){
        if(Auth::user()->role_id != 10){
            return redirect('/category')->with('error', 'Nu aveți permisiunea de a vizualiza această pagină');
        }
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);
        $category = new Category;
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->save();

        return redirect('/category')->with('success', 'Categorii adăugate');
    }
}