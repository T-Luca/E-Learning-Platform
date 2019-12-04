@extends('layouts.app')

@section('content')
<?php $percentage = round(($result/$NoW*100), 2); ?>
<div class="row">
    <div class="col-4">
        <a class="btn btn-danger float-left" href="/set/{{$set->id}}" role="button"><i class="fa fa-reply" aria-hidden="true"></i> Înapoi</a>
    </div>
</div>
<br/>
<div class="card">
    <div class="card-header">
        <h3>Rezultatele învățării setului {{$set->name}}</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-4">Învățat:</div>
            <div class="col-4">{{$result}}/{{$NoW}}</div>
        </div>
        <div class="row">
            <div class="col-4">Procent rezultat:</div>
            <div class="col-4">{{$percentage}}%</div>
        </div>
        @if(!Auth::guest() && $isTest == 1)
            <br/>
            {!! Form::open(['action' => 'ResultsController@store', 'method' => 'POST']) !!}
            {{Form::hidden('set_id',$set->id)}}
            {{Form::hidden('percentage',$percentage)}}
            <div class="row">
                <div class="col-4">
                    <button type="submit" class="btn btn-success" value="Save the result"><i class="fa fa-floppy-o" aria-hidden="true"></i> Salvați rezultatul</button>
                </div>
            </div>
            {!! Form::close() !!}
        @endif
    </div>
</div>
@endsection