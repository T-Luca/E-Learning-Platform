@extends('layouts.app')

@section('content')
    <h1>Adăugați o nouă subcategorie</h1>
    <hr>
    {!! Form::open(['action' => 'SubcategoriesController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('name','Numele subcategoriei')}}
            {{Form::text('name','', ['class' => 'form-control', 'placeholder' => 'Nume'])}}
        </div>
        <div class="form-group">
            {{Form::label('description','Echivalentul în engleză')}}
            {{Form::text('description','', ['class' => 'form-control', 'placeholder' => 'Numele englezesc'])}}
            {{Form::hidden('category_id',$id)}}
        </div>
        <button type="submit" class="btn btn-primary" value="Add"><i class="fa fa-plus" aria-hidden="true"></i> Adaugă</button>
        <a class="btn btn-danger float-right" href="/category/{{$id}}" role="button"><i class="fa fa-reply" aria-hidden="true"></i> Anulează</a>
    {!! Form::close() !!}
@endsection
