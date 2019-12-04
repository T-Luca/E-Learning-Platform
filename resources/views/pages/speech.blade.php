@extends('layouts.app')

@section('style')
    <link href="{{ asset('css/speech.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
        <div>
            <h2 class="text-center"><br>Transformarea textului în vorbire<br>Text To Speech</h2>
        </div>
        <br><br><br>
        <img src={{ url('/').'/images/responsivevoice.jpg' }} width="90" height="120" align="right">

        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <h2>Introduceți textul:</h2>
                    <textarea type="text" class="form-control" placeholder="Enter some text here..." rows="5" id="text"></textarea>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <h2>Selectați o voce</h2>
                    <select id="gender" class="form-control">
                        <option value="UK English Male">UK English Male</option>
                        <option value="UK English Female">UK English Female</option>
                        <option value="US English Male">US English Male</option>
                        <option value="US English Female">US English Female</option>
                        <option value="Romanian Female">Romanian Female</option>
                    </select>
                </div>
            </div>
        </div>
        <button class="btn btn-success btn-lg" id="btPlay"><span class="fa fa-play"></span></button>
        <button class="btn btn-danger btn-lg" id="btStop" disabled><span class="fa fa-stop"></span></button>
    </div>
    </br>
    <p><b>Exemplu:</b> Excuse me, could you tell me how to get to the bus station?</p>

    @include('inc.scripts.speechscript')
@endsection