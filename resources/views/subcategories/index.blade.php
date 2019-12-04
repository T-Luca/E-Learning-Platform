@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-4">
            <a class="btn btn-danger float-left" href="/category" role="button"><i class="fa fa-reply" aria-hidden="true"></i> Înapoi</a>
        </div>
    </div>
    <br/>
    <h1>{{$name}}</h1>
    <h3>Subcategorii</h3>
    <hr>
    @if(!Auth::guest() && Auth::user()->role_id == 10)
        <a class="btn btn-primary btn-sm" href="/subcategory/{{$current_id}}/create" role="button"><i class="fa fa-plus" aria-hidden="true"></i> Adăugați o subcategorie</a>
        <hr>
    @endif

    @if(count($subcategories) > 0)
        @for($hidden = 0; $hidden < 2; $hidden++)
            @if($hidden == 1 && !Auth::guest() && Auth::user()->role_id == 10)
            <br/>
            <h1>Subcategorii ascunse</h1>
            <hr>
            @endif
            @if(($hidden == 1 && !Auth::guest() && Auth::user()->role_id == 10) || ($hidden == 0))
            <?php $i = 0; ?>
            @foreach($subcategories as $subcategory)
                @if($subcategory->hidden == $hidden)
                    @if($i%3 == 0)
                        <div class="row">
                    @endif
                    <div class="col-sm-4">
                        <div class="card border-info mb-3">
                            <div class="card-header">
                                <h3><a href="/subcategory/{{$subcategory->id}}">{{$subcategory->name}}</a></h3>
                            </div>
                            <div class="card-body">
                                <h6>{{$subcategory->description}}</h6>
                                @if(!Auth::guest() && Auth::user()->role_id == 10)
                                    <p>
                                    {!! Form::open(['action' => ['SubcategoriesController@destroy', $subcategory->id], 'method' => 'POST', 'class' => 'float-right']) !!}
                                        {{ Form::hidden('_method','DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-sm" value="Delete"><i class="fa fa-times" aria-hidden="true"></i> Şterge</button>
                                    {!! Form::close() !!}
                                    @if($hidden == 0)
                                    {!! Form::open(['action' => ['SubcategoriesController@hideCategory', $subcategory->id, 'hide'], 'method' => 'POST', 'class' => 'float-right']) !!}
                                        {{ Form::hidden('_method','PUT') }}
                                        <button type="submit" class="btn btn-default btn-sm" value="Hide"><i class="fa fa-eye-slash" aria-hidden="true"></i> Ascunde</button>
                                    @else
                                    {!! Form::open(['action' => ['SubcategoriesController@hideCategory', $subcategory->id, 'unhide'], 'method' => 'POST', 'class' => 'float-right']) !!}
                                        {{ Form::hidden('_method','PUT') }}
                                        <button type="submit" class="btn btn-default btn-sm" value="Show"><i class="fa fa-eye" aria-hidden="true"></i> Afișare</button>
                                    @endif
                                    {!! Form::close() !!}
                                    <a class="btn btn-primary btn-sm float-right" href="/subcategory/{{$subcategory->id}}/edit" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> Editați</a>
                                    </p>
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
    @else
        <h3>Subcategoriile nu au fost găsite</h3>
    @endif
@endsection

    