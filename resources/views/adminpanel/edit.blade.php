@extends('layouts.app')

@section('content')
    <h1>Editarea unui utilizator</h1>
    <h3>{{$user->name}}</h3>
    <hr>
    {!! Form::open(['action' => ['AdminPanelsController@update', $user->id], 'method' => 'POST']) !!}
        <div class="row">
            <div class="col-3">
                {{Form::label('name','Nume de utilizator')}}
            </div>
            <div class="col-3">
                {{Form::label('email','E-mail')}}
            </div>
            <div class="col-3">
                {{Form::label('type','Tip cont')}}
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                {{Form::text('name',$user->name, ['class' => 'form-control', 'placeholder' => 'Nume'])}}
            </div>
            <div class="col-3">
                {{Form::text('email',$user->email, ['class' => 'form-control', 'placeholder' => 'E-mail'])}}
            </div>
            <div class="col-3">
                {{Form::select('type', array(1 => 'Utilizator', 2 => 'Redactor'), $user->role_id, ['class' => 'form-control'])}}
            </div>            
        </div>
        <br/>
        {!! Form::hidden('_method','PUT') !!}
        {{Form::submit('Salvați', ['class' => 'btn btn-primary'])}}
        <a class="btn btn-danger float-right" href="/adminpanel" role="button">Anulare</a>
    {!! Form::close() !!}
@endsection
