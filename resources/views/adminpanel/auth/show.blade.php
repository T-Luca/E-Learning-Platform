@extends('layouts.app')
@section('content')
    @if(!is_null($user))
    <div class="card">
        <div class="card-header">
            {!!Form::open(array('url' => '/auth/create')) !!}
                {!! Form::hidden('current_id', $user->id) !!}
                <button type="submit" class="btn btn-primary btn-sm float-right" value="Add permissions"><i class="fa fa-plus" aria-hidden="true"></i> Adăugați permisiuni</button>
            {!! Form::close() !!}
            <h3><i class="fa fa-user" aria-hidden="true"></i> {{$user->name}} - competențe</h3>
            <h5>Tip cont: {{$user->role->name}}</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered table-hover table-sm">
                <thead class="thead-dark">
                    <tr>
                        <th>Numele categoriei</th>
                        <th>Numele subcategoriei</th>
                        <th></th>
                    </tr>
                </thead>
                @foreach($authorizations as $auth)
                    <tr>
                        <td>{{$auth->subcategory->category->name}}</td>
                        <td>{{$auth->subcategory->name}}</td>
                        <td>
                            {!! Form::open(['action' => ['AuthorizationsController@destroy', $auth->id], 'method' => 'POST', 'class' => 'float-right']) !!}
                            {{ Form::hidden('_method','DELETE') }}
                            <button type="submit" class="btn btn-danger btn-sm" value="Delete"><i class="fa fa-times" aria-hidden="true"></i> Șterge</button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </table>
            <a class="btn btn-danger float-right" href="/adminpanel" role="button"><i class="fa fa-reply" aria-hidden="true"></i> Înapoi</a>
        </div>
    </div>
    @endif
@endsection