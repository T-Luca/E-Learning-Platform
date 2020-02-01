@extends('layouts.app')

@include('inc.dynamicform')

@section('content')
    <h1>Adăugați un set nou</h1>
    <hr>
    {!! Form::open(['action' => 'SetsControllerCREATE@store', 'method' => 'POST']) !!}
    <div id="container">
        <div class="row">
            <div class="col-3">
            {{Form::label('name','Numele setului')}}
            </div>
            <div class="col-4">
            {{Form::label('lang','Metoda de introducere')}}
            {{Form::hidden('subcategory_id',$id)}}
            {{Form::hidden('hidden',$hidden)}}
            </div>
        </div>
        <div class="row">
            <div class="col-3">
            {{Form::text('name','', ['class' => 'form-control', 'placeholder' => 'Nume'])}}
            </div>
            <div class="col-3">
            {{Form::select('lang', array(1 => 'Română - Engleză', 2 => 'Engleză - Română'), null, ['class' => 'form-control'])}}
            </div>
        </div>
        <div class="row">
                <div class="col-4">
                {{Form::label('word1','Cuvântul 1')}}
                </div>
                <div class="col-4">
                {{Form::label('word2','Cuvântul 2')}}
                </div>
            </div>
        <div class="row">
            <div class="col-4">
            {{Form::text('word1[]','', ['class' => 'form-control', 'placeholder' => 'Cuvântul 1'])}}
            </div>
            <div class="col-4">
            {{Form::text('word2[]','', ['class' => 'form-control', 'placeholder' => 'Cuvântul 2'])}}
            </div>
            <div class="col-4">
            <a class="float-right" href="#" id="add"><i class="fa fa-plus fa-2x" aria-hidden="true" style="color:green"></i></a>
            </div>
        </div>
    </div>
    <br/>
    <button type="submit" class="btn btn-primary" value="Add"><i class="fa fa-plus" aria-hidden="true"></i> Adaugă</button>
    <a class="btn btn-danger float-right" href="/category/{{$id}}" role="button"><i class="fa fa-reply" aria-hidden="true"></i> Anulare</a>
    {!! Form::close() !!}

@endsection