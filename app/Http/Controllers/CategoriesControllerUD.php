<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Category;


class CategoriesControllerUD extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        if(Auth::user()->role_id != 10){
            return redirect('/category')->with('error', 'Nu aveți permisiunea de a vizualiza această pagină');
        }
        $category = Category::find($id);
        return view('categories.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id){
        if(Auth::user()->role_id != 10){
            return redirect('/category')->with('error', 'Nu aveți permisiunea');
        }
        $category = Category::find($id);
        $category->delete();
        return redirect('/category')->with('success', 'Categoriile au fost eliminate');
    }
}