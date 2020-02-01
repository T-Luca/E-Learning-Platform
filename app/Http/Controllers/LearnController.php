<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Set;

class LearnController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['mode', 'result']]);
    }

    /**
     * Mode 1 learning- basic
     *
     */
    public function mode1(Request $request){
        $id = $request->input('current_id');
        $lang = $request->input('lang');
        $set = Set::find($id);
        if($set->hidden == 0 || (!Auth::guest() && $set->hidden == 1 && Auth::user()->role_id == 10) || (!Auth::guest() && $set->hidden == 2 && $set->user_id == Auth::user()->id)){
            if(isset($_POST['learn1'])){
                return view('sets.learn.learn')->with('set', $set)->with('lang',$lang)->with('test',0);
            }
        }
        else return redirect()->back()->with('error', 'Setul nu există');
    }

    /**
     * Mode 2 learning- multiple
     *
     */
    public function mode2(Request $request){
        $id = $request->input('current_id');
        $lang = $request->input('lang');
        $set = Set::find($id);
        if($set->hidden == 0 || (!Auth::guest() && $set->hidden == 1 && Auth::user()->role_id == 10) || (!Auth::guest() && $set->hidden == 2 && $set->user_id == Auth::user()->id)){
            if(isset($_POST['learnm'])){
                return view('sets.learn.multiple')->with('set', $set)->with('lang',$lang)->with('test',0);
            }
        }
        else return redirect()->back()->with('error', 'Setul nu există');
    }

    /**
     * Mode 3&4 learning- flashcards & final test
     *
     */
    public function mode3(Request $request){
        $id = $request->input('current_id');
        $lang = $request->input('lang');
        $set = Set::find($id);
        if($set->hidden == 0 || (!Auth::guest() && $set->hidden == 1 && Auth::user()->role_id == 10) || (!Auth::guest() && $set->hidden == 2 && $set->user_id == Auth::user()->id)){
            if(isset($_POST['flashcards'])){
                return view('sets.learn.flashcards')->with('set', $set)->with('lang',$lang)->with('test',0);
            }
            else{
                return view('sets.learn.learn')->with('set', $set)->with('lang',$lang)->with('test',1);
            }
        }
        else return redirect()->back()->with('error', 'Setul nu există');
    }
}