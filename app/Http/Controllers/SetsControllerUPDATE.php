<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Set;
use App\Authorization;

class SetsControllerUPDATE extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $set = Set::find($id);
        if(!is_null($set)){
            if(!Auth::guest() && $set->hidden == 2 && $set->user_id == Auth::user()->id){
                return view('sets.edit')->with('set', $set);
            }
            $auth = Authorization::where([['user_id','=', Auth::user()->id],['subcategory_id','=',$set->subcategory_id]])->get();
            if(Auth::guest() || Auth::user()->role_id != 10){
                if((Auth::user()->role_id != 3) || (count($auth) == 0)){
                    if((Auth::user()->role_id != 2) || (Auth::user()->id != $set->user_id) || (count($auth) == 0)){
                        return redirect()->action('SubcategoriesControllerCR@show', ['id' => $set->subcategory_id])->with('error', 'Nu aveți permisiunea de a vizualiza această pagină');
                    }
                }
            }
            return view('sets.edit')->with('set', $set);
        }
        return redirect('/category')->with('error', 'Nu puteți edita un set existent');
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
            'word1.*' => 'required',
            'word2.*' => 'required',
            'name' => 'required',
            'lang' => 'required',
        ]);

        $set = Set::find($id);
        $elems = count($request->input(['word1']));
        $array = array();
        if($request->input('lang') == 1){
            $words1 = $request->input(['word1']);
            $words2 = $request->input(['word2']);
        }
        else{
            $words1 = $request->input(['word2']);
            $words2 = $request->input(['word1']);
        }
        for($i = 0; $i < $elems; $i++){
            $array[] = strtolower($words1[$i]);
            $array[] = strtolower($words2[$i]);
        }
        $setted = implode(";",$array);
        $set->name = $request->input('name');
        $set->set = $setted;
        $set->save();

        return redirect()->action('SubcategoriesControllerCR@show', ['id' => $set->subcategory_id])->with('success', 'Setul a fost editat');
    }
}
