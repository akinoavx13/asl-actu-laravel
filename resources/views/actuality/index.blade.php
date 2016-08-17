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
                                    dans la section
                                    <span style="font-weight: bold;">
                                    @if($actuality->category == 'general')
                                        <i class="text-warning">Général</i>
                                    @elseif($actuality->category == 'athletics')
                                        <i class="text-primary">Athlétisme</i>
                                    @elseif($actuality->category == 'badminton')
                                        <i class="text-success">Badminton</i>
                                    @elseif($actuality->category == 'basketball')
                                        <i class="text-info">Basketball</i>
                                    @elseif($actuality->category == 'football')
                                        <i class="text-warning">Football</i>
                                    @elseif($actuality->category == 'gym')
                                        <i class="text-danger">Gym</i>
                                    @elseif($actuality->category == 'yoga_cestas')
                                        <i class="text-danger">Yoga Cestas</i>
                                    @elseif($actuality->category == 'ball')
                                        <i class="text-warning">Pelote</i>
                                    @elseif($actuality->category == 'soccer5')
                                        <i class="text-info">Soccer5</i>
                                    @elseif($actuality->category == 'tennis')
                                        <i class="text-success">Tennis</i>
                                    @elseif($actuality->category == 'volleyball')
                                        <i class="text-primary">Volley</i>
                                    @elseif($actuality->category == 'yoga_chalgrin')
                                        <i class="text-warning">Yoga Chalgrin</i>
                                    @endif
                                    </span>
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