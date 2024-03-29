@extends('layouts.app')

@section('content')
    @if(count($sets) > 0)
        <div class="row">
            <div class="col-4">
                <a class="btn btn-danger float-left" href="/category/{{$sets[0]->subcategory->category->id}}" role="button"><i class="fa fa-reply" aria-hidden="true"></i> Înapoi</a>
            </div>
        </div>
        <br/>
    @endif
    <h1>{{$name}}</h1>
    <h3>Seturi de cuvinte</h3>
    <hr>
    @if(!Auth::guest())
    {!!Form::open(array('url' => '/set/create')) !!}
        {!! Form::hidden('current_id', $current_id) !!}
        {!! Form::hidden('phidden', 2) !!}
        <button type="submit" class="btn btn-primary btn-sm" name="priv" value="Add a private set"><i class="fa fa-plus" aria-hidden="true"></i> Adăugați un set privat</button>
    {!! Form::close() !!}
    @if(Auth::user()->role_id == 10 || (Auth::user()->role_id == 3 && count($auth) != 0) || (Auth::user()->role_id == 2 && count($auth) != 0))
    {!!Form::open(array('url' => '/set/create')) !!}
        {!! Form::hidden('current_id', $current_id) !!}
        {!! Form::hidden('hidden', 0) !!}
        <button type="submit" class="btn btn-primary btn-sm" name="all" value="Add a set"><i class="fa fa-plus" aria-hidden="true"></i> Adăugați un set</button>
    {!! Form::close() !!}
    @endif
    <hr>
    @endif

    @if(count($sets) > 0)
        @for($hidden = 0; $hidden < 2; $hidden++)
            @if($hidden == 1 && !Auth::guest() && Auth::user()->role_id == 10)
            <br/>
            <h1>Seturi ascunse</h1>
            <hr>
            @endif
            @if($hidden == 2 && !Auth::guest())
            <br/>
            <h1>Seturi private</h1>
            <hr>
            @endif
            @if(($hidden == 1 && !Auth::guest() && Auth::user()->role_id == 10) || ($hidden == 0))
            <?php $i = 0; ?>
            @foreach($sets as $set)
                @if($set->hidden == $hidden)
                    @if($i%3 == 0)
                        <div class="row">
                    @endif
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-header">
                                <h3><a href="/set/{{$set->id}}">{{$set->name}}</a></h3>
                            </div>
                            <div class="card-body">
                                <small>Autor: {{$set->user->name}}</small>
                                @if(!Auth::guest())
                                @if(Auth::user()->role_id == 10 || (Auth::user()->role_id == 3 && count($auth) != 0) || (Auth::user()->id == $set->user_id && Auth::user()->role_id == 2 && count($auth) != 0))
                                    <p>
                                    {!! Form::open(['action' => ['SetsControllerDELETE@destroy', $set->id], 'method' => 'POST', 'class' => 'float-right']) !!}
                                        {{ Form::hidden('_method','DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-sm" value="Delete"><i class="fa fa-times" aria-hidden="true"></i> Şterge</button>
                                    {!! Form::close() !!}
                                    @if($hidden == 0 && Auth::user()->role_id == 10)
                                    {!! Form::open(['action' => ['SetsControllerREAD@hideCategory', $set->id, 'hide'], 'method' => 'POST', 'class' => 'float-right']) !!}
                                        {{ Form::hidden('_method','PUT') }}
                                        <button type="submit" class="btn btn-default btn-sm" value="Hide"><i class="fa fa-eye-slash" aria-hidden="true"></i> Ascunde</button>
                                    {!! Form::close() !!}
                                    @elseif($hidden == 1 && Auth::user()->role_id == 10)
                                    {!! Form::open(['action' => ['SetsControllerREAD@hideCategory', $set->id, 'unhide'], 'method' => 'POST', 'class' => 'float-right']) !!}
                                        {{ Form::hidden('_method','PUT') }}
                                        <button type="submit" class="btn btn-default btn-sm" value="Show"><i class="fa fa-eye" aria-hidden="true"></i> Afișare</button>
                                    {!! Form::close() !!}
                                    </p>
                                    @endif
                                    <a class="btn btn-primary btn-sm float-right" href="/set/{{$set->id}}/edit" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> Editează</a>
                                @endif
                                @endif
                            </div>
                        </div>
                    </div>
                    @if($i%3 == 2)
                        </div>
                    @endif
                    <?php $i++; ?>
                @endif
            @endforeach
            @if($i%3 != 0)
                </div>
            @endif
            @endif
        @endfor

        @if(!Auth::guest() && !is_null($privs))
        @if(count($privs) > 0)
        <br/>
        <h1>Seturi private</h1>
        <hr>
        <?php $i = 0; ?>
        @foreach($privs as $priv)
                @if($i%3 == 0)
                    <div class="row">
                @endif
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header">
                            <h3><a href="/set/{{$priv->id}}">{{$priv->name}}</a></h3>
                        </div>
                        <div class="card-body">
                            <small>Autor: {{$priv->user->name}}</small>
                            @if(!Auth::guest())
                                {!! Form::open(['action' => ['SetsControllerDELETE@destroy', $priv->id], 'method' => 'POST', 'class' => 'float-right']) !!}
                                    {{ Form::hidden('_method','DELETE') }}
                                    {{ Form::submit('Şterge', ['class' => 'btn btn-danger btn-sm']) }}
                                {!! Form::close() !!}
                                <a class="btn btn-primary btn-sm float-right" href="/set/{{$priv->id}}/edit" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> Editează</a>
                            @endif
                        </div>
                    </div>
                </div>
                @if($i%3 == 2)
                    </div>
                @endif
                <?php $i++; ?>
        @endforeach
        @if($i%3 != 0)
            </div>
        @endif
        @endif
        @endif
    @else
        <h3>Nu există seturi</h3>
    @endif
@endsection


