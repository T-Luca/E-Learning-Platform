<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Subcategory;


class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index(){
        $categories = Category::all();
        return view('categories.index')->with('categories', $categories);
    }

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

    public function create(){
        if(Auth::user()->role_id != 10){
            return redirect('/category')->with('error', 'Nu aveți permisiunea de a vizualiza această pagină');
        }
        return view('categories.create');
    }

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

    public function edit($id){
        if(Auth::user()->role_id != 10){
            return redirect('/category')->with('error', 'Nu aveți permisiunea de a vizualiza această pagină');
        }
        $category = Category::find($id);
        return view('categories.edit')->with('category', $category);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->save();

        return redirect('/category')->with('success', 'Categoriile au fost editate');
    }

    public function destroy($id){
        if(Auth::user()->role_id != 10){
            return redirect('/category')->with('error', 'Nu aveți permisiunea');
        }
        $category = Category::find($id);
        $category->delete();
        return redirect('/category')->with('success', 'Categoriile au fost eliminate');
    }

    public function hideCategory($id, $type){
        if(Auth::user()->role_id != 10){
            return redirect('/category')->with('error', 'Nu ai permisiune');
        }
        $category = Category::find($id);
        if($type == 'hide') {
            $category->hidden = 1;
            $category->save();
            return redirect()->back()->with('success', 'Categorie ascunsă');
        }
        else {
            $category->hidden = 0;
            $category->save();
            return redirect()->back()->with('success', 'Categoria este vizibilă');
        }
    }
}