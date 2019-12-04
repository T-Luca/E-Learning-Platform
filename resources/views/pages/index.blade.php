@extends('layouts.app')

@section('content')
        <div class="jumbotron text-center" style="background-color:#79b8e5">
            <h1>Bine ai venit!</h1>
            <h4>Este foarte bine să iei elementele pe rând şi să creezi o structură de învăţare corectă. Poţi începe prin învăţarea unor cuvinte şi expresii uzuale apăsând pe butonul de mai jos.</h4>

            <div class="container">
                <div class="col-sm-12 text-center">
                    <a href="/category" class="btn btn-info" role="button">Start!</a>
                </div>
            </div>
        </div>
        <hr>


        <div class="jumbotron text-center" style="background-color:#ff8a84">
            <h1>Exersare vorbire</h1>
            <h4>În această secţiune poţi învăţa ritmul şi intonaţia limbii engleze</h4>

            <div class="container">
                <div class="col-sm-12 text-center">
                    <a href="/speech" class="btn btn-info" role="button">Start!</a>
                </div>
            </div>
        </div>
@endsection