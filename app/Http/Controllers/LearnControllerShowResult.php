<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Set;

class LearnControllerShowResult extends Controller
{

    /**
     * Display result after test
     *
     */
    public function result(Request $request){
        $set = Set::find($request->input('set_id'));
        $result = $request->input('result');
        $NoW = $request->input('NoW');
        $isTest = $request->input('isTest');

        return view('sets.learn.result')->with('result', $result)->with('NoW', $NoW)->with('isTest', $isTest)->with('set', $set);
    }

}