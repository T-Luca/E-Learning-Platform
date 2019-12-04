@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Rezultatele tale</div>
                <div class="card-body">
                    @if(count($results) > 0)
                    <table class="table table-striped table-bordered table-hover table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th style="width: 65%">Numele setului</th>
                                <th style="width: 35%"></th>
                            </tr>
                        </thead>
                        @foreach($results as $result)
                        <tr>
                            <td>{{$result->set->name}}</td>
                            <td><a class="btn btn-success btn-sm float-right" href="/results/{{$result->set_id}}" role="button"><i class="fa fa-reply" aria-hidden="true"></i> Verificați progresul</a></td>
                        </tr>
                        @endforeach
                    </table>
                    @else
                        <p>Niciun rezultat</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
