<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('pages.index');
    }

    public function category(){
        return view('pages.category');
    }

    public function test(){
        return view('pages.navtest');
    }

    public function speech(){
        return view('pages.speech');
    }
    
}
