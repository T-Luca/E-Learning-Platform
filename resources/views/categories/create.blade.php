@extends('layouts.app')

@section('content')
    <h1>Adăugați o nouă categorie</h1>
    <hr>
    {!! Form::open(['action' => 'CategoriesController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('name','Numele categoriei')}}
            {{Form::text('name','', ['class' => 'form-control', 'placeholder' => 'Nume'])}}
        </div>
        <div class="form-group">
            {{Form::label('description','Echivalentul în engleză al numelui')}}
            {{Form::text('description','', ['class' => 'form-control', 'placeholder' => 'Numele în engleză'])}}
        </div>
        <button type="submit" class="btn btn-primary" value="Add"><i class="fa fa-plus" aria-hidden="true"></i> Adaugă</button>
        <a class="btn btn-danger float-right" href="/category" role="button"><i class="fa fa-reply" aria-hidden="true"></i> Anulare</a>
    {!! Form::close() !!}
@endsection
