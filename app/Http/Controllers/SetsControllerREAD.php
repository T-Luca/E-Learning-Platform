<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Set;

class SetsControllerREAD extends Controller
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
        $set = Set::find($id);
        if($set->hidden == 0){
            return view('sets.show')->with('set', $set);
        }
        else if(!Auth::guest() && $set->hidden == 1 && Auth::user()->role_id == 10){
            return view('sets.show')->with('set', $set);
        }
        else if(!Auth::guest() && $set->hidden == 2 && $set->user_id == Auth::user()->id){
            return view('sets.show')->with('set', $set);
        }
        else return redirect()->back()->with('error', 'Setul nu există');
    }
}
