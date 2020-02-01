<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Set;

class SetsControllerCREATE extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){
        $id = $request->input('current_id');
        if(isset($_POST['priv'])){
            $hidden = $request->input('phidden');
        }
        else $hidden = $request->input('hidden');
        return view('sets.create')->with('id', $id)->with('hidden',$hidden);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'word1.*' => 'required',
            'word2.*' => 'required',
            'name' => 'required',
            'subcategory_id' => 'required',
            'lang' => 'required',
            'hidden' => 'required',
        ]);

        $set = new Set;
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
        $set->hidden = $request->input('hidden');
        $set->subcategory_id = $request->input('subcategory_id');
        $set->set = $setted;
        $set->user_id = Auth::user()->id;
        $set->language1_id = 1;
        $set->language2_id = 2;
        $set->save();

        return redirect()->action('SubcategoriesControllerCR@show', ['id' => $request->input('subcategory_id')])->with('success', 'A fost adăugat un set');
    }
}
