<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Set;
use App\Authorization;

class SetsControllerDELETE extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $set = Set::find($id);
        if(!is_null($set)){
            if(!Auth::guest() && $set->hidden == 2 && $set->user_id == Auth::user()->id){
                $set->delete();
                return redirect()->back()->with('success', 'Set eliminat');
            }
            $auth = Authorization::where([['user_id','=', Auth::user()->id],['subcategory_id','=',$set->subcategory_id]])->get();
            if(Auth::guest() || Auth::user()->role_id != 10){
                if((Auth::user()->role_id != 3) || (count($auth) == 0)){
                    if((Auth::user()->role_id != 2) || (Auth::user()->id != $set->user_id) || (count($auth) == 0)){
                        return redirect()->action('SubcategoriesControllerCR@show', ['id' => $set->subcategory_id])->with('error', 'Nu aveți permisiunea de a vizualiza această pagină');
                    }
                }
            }
            $set->delete();
            return redirect()->back()->with('success', 'Set eliminat');
        }
        return redirect()->back()->with('error', 'Nu puteți șterge un set inexistent');
    }
}