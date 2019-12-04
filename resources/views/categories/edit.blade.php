@extends('layouts.app')

@section('content')
    <h1>Editarea categoriilor</h1>
    <hr>
    {!! Form::open(['action' => ['CategoriesController@update', $category->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('name','Numele categoriei')}}
            {{Form::text('name',$category->name, ['class' => 'form-control', 'placeholder' => 'Nume'])}}
        </div>
        <div class="form-group">
            {{Form::label('description','Scurtă descriere')}}
            {{Form::text('description',$category->description, ['class' => 'form-control', 'placeholder' => 'Descriere'])}}
        </div>
        {!! Form::hidden('_method','PUT') !!}
        {{Form::submit('Salvați', ['class' => 'btn btn-primary'])}}
        <a class="btn btn-danger float-right" href="/category" role="button">Anulare</a>
    {!! Form::close() !!}
    
@endsection
