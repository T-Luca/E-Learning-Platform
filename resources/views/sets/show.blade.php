@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-4">
            <a class="btn btn-danger float-left" href="/subcategory/{{$set->subcategory->id}}" role="button"><i class="fa fa-reply" aria-hidden="true"></i> Înapoi</a>
        </div>
    </div>
    <br/>
    @if(!is_null($set))
        <h1>{{$set->subcategory->name}}</h1>
        <hr>
        <?php $split = explode(';', $set->set); ?>
        <div class="card">
            <div class="card-header"><h3>{{$set->name}}</h3></div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover table-sm">
                    <thead class="thead-dark">
                        <tr>
                            <th style="width: 50%">Engleză</th>
                            <th style="width: 50%">Română</th>
                        </tr>
                    </thead>
                    @for($i = 0; $i<count($split); $i+=2)
                        @if($i%2 == 0)
                            <tr>
                                <td align="center">{{$split[$i+1]}}
                                    <input onclick="responsiveVoice.speak('{{$split[$i+1]}}');" type="button" style="margin:0 auto;display:block;" value="🔊 Redă"  />
                                </td>

                                <td align="center">{{$split[$i]}}</td>
                        @else
                                <td>{{$split[$i]}}</td>
                            </tr>
                        @endif
                    @endfor
                </table>
                <small>Autor: {{$set->user->name}}</small>
                @if(!is_null($set->created_at))
                    <p><small>Data adăugării: {{$set->created_at}}</small></p>
                @endif
                <hr>
                {!!Form::open(array('url' => '/set/learn')) !!}
                    {!! Form::hidden('current_id', $set->id) !!}
                <div class="row">
                    <div class="col-12">
                        <div class="text-center">
                            <h3>Moduri de învățare și verificare a cunoștințelor</h3>
                        </div>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-2">
                        {{ Form::label('choose','Alegeți metoda de introducere:') }}
                    </div>
                    <div class="col-2">
                        {{ Form::select('lang', array(1 => 'RO - EN', 2 => 'EN - RO'), null, ['class' => 'form-control']) }}
                    </div>
                    <div class="col-8">
                        <button type="submit" class="btn btn-primary" name="learn1" value="Test (one attempt)"><i class="fa fa-angle-right" aria-hidden="true"></i> Test (o încercare)</button>
                        <button type="submit" class="btn btn-primary" name="learnm" value="Test (many attempts)"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Test (Întrebări repetitive)</button>
                        <button type="submit" class="btn btn-primary" name="flashcards" value="Flashcards"><i class="fa fa-square-o" aria-hidden="true"></i> Cartonașe</button>
                        <button type="submit" class="btn btn-danger" name="test" value="Check knowledge"><i class="fa fa-tablet" aria-hidden="true"></i> Verificați cunoștințele</button>
                    </div>
                </div>
                {!! Form::close() !!}
                <br/>
            </div>
        </div>
    @else
    <h3>Setul nu există</h3>
    @endif
    <script src="https://code.responsivevoice.org/responsivevoice.js"></script>
@endsection
