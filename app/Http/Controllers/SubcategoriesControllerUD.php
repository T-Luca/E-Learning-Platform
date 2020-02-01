<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Subcategory;

class SubcategoriesControllerUD extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        if(Auth::user()->role_id != 10){
            return redirect()->action('CategoriesControllerCR@show', ['id' => $id])->with('error', 'Nu aveți permisiunea de a vizualiza această pagină');
        }
        $subcategory = Subcategory::find($id);
        return view('subcategories.edit')->with('subcategory', $subcategory);
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
        $subcategory = Subcategory::find($id);
        $subcategory->name = $request->input('name');
        $subcategory->description = $request->input('description');
        $subcategory->save();

        return redirect()->action('CategoriesControllerCR@show', ['id' => $id])->with('success', 'Subcategoriile au fost editate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        if(Auth::user()->role_id != 10){
            return redirect()->action('CategoriesControllerCR@show', ['id' => $id])->with('error', 'Nu aveți permisiunea de a vizualiza această pagină');
        }
        $subcategory = Subcategory::find($id);
        $subcategory->delete();
        return redirect()->back()->with('success', 'Subcategoriile au fost eliminate');
    }
}