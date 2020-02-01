@extends('layouts.app')

@section('content')
    <h1>Editarea unei subcategorii</h1>
    <hr>
    {!! Form::open(['action' => ['SubcategoriesControllerUD@update', $subcategory->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('name','Numele categoriei')}}
            {{Form::text('name',$subcategory->name, ['class' => 'form-control', 'placeholder' => 'Nume'])}}
        </div>
        <div class="form-group">
            {{Form::label('description','Scurtă descriere')}}
            {{Form::text('description',$subcategory->description, ['class' => 'form-control', 'placeholder' => 'Descriere'])}}
        </div>
        {!! Form::hidden('_method','PUT') !!}
        {{Form::submit('Salvați', ['class' => 'btn btn-primary'])}}
        <a class="btn btn-danger float-right" href="/category" role="button">Anulare</a>
    {!! Form::close() !!}
    
@endsection
