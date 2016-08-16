@extends('layouts.app')

@section('title')
    Actualités
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            @include('navbar.jumbotron')
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if(count($actualities) <= 0)
                <h1 class="text-center text-danger">
                    Il n'y a pas d'actualité ...
                </h1>
            @else
                @foreach($actualities as $actuality)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-10">
                                    <span style="font-size: 20px;">{{ ucfirst($actuality->name) }}</span>
                                </div>
                                <div class="col-md-2">
                                    {{ ucfirst(Jenssegers\Date\Date::create($actuality->created_at->year, $actuality->created_at->month, $actuality->created_at->day, $actuality->created_at->hour, $actuality->created_at->minute, $actuality->created_at->second)->ago()) }}
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            {{ $actuality->message }}
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

@endsection