@extends('layouts.app')
@section('content')
    @if(count($users) > 0)
    <div class="card">
        <div class="card-header"><h3><i class="fa fa-users" aria-hidden="true"></i> Gestionarea utilizatorilor</h3></div>
        <div class="card-body">
            <table class="table table-striped table-bordered table-hover table-sm">
                <thead class="thead-dark">
                    <tr>
                        <th>Nume de utilizator</th>
                        <th>E-mail</th>
                        <th>Tip cont</th>
                    </tr>
                </thead>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role->name}}
                        {!! Form::open(['action' => ['AdminPanelsController@destroy', $user->id], 'method' => 'POST', 'class' => 'float-right']) !!}
                            {{ Form::hidden('_method','DELETE') }}
                            <button type="submit" class="btn btn-danger btn-sm" value="Delete"><i class="fa fa-times" aria-hidden="true"></i> Șterge</button>
                        {!! Form::close() !!}
                        <a class="btn btn-primary btn-sm float-right" href="/adminpanel/{{$user->id}}/edit" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> Editați</a>
                        <a class="btn btn-success btn-sm float-right" href="/adminpanel/{{$user->id}}" role="button"><i class="fa fa-key" aria-hidden="true"></i> Permisiuni</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    @endif
@endsection