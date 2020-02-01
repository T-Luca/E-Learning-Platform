<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Result;

class ResultsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $results = Result::where('user_id', '=', Auth::user()->id)->groupBy('set_id')->get();
        return view('results.index')->with('results',$results);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $results = Result::where([['user_id', '=', Auth::user()->id],['set_id','=',$id]])->orderBy('created_at', 'desc')->take(10)->get();
        if(count($results) == 0) return redirect('/results')->with('error','Nu ai făcut acest set');
        else return view('results.show')->with('results',$results);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'set_id' => 'required',
            'percentage' => 'required'
        ]);
        $result = new Result;
        $result->set_id = $request->input('set_id');
        $result->user_id = Auth::user()->id;
        $result->result = $request->input('percentage');
        $result->save();

        return redirect()->action('SetsControllerREAD@show', ['id' => $request->input('set_id')])->with('success', 'Rezultatul a fost salvat');
    }
}