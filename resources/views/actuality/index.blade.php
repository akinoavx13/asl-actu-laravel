@extends('layouts.app')

@section('title')
    Actualités
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            @if(Request::is('/'))
                <h2 class="text-center">
                    Vos préférences
                </h2>
                <hr>
            @endif
        </div>
    </div>

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
                    <div class="panel {{ $actuality->color == 'orange' ? 'panel-warning' : '' }} {{ $actuality->color == 'red' ? 'panel-danger' :  '' }} {{ $actuality->color == 'clear_blue' ? 'panel-primary' : '' }} {{ $actuality->color == 'dark_blue' ? 'panel-info' : '' }} {{ $actuality->color == 'green' ? 'panel-success' : ''}}"
                         id="{{ $actuality->id }}"
                         style="{{ $actuality->color == 'clear_blue' ? 'border-color: rgba(51, 122, 183, 0.5)' : '' }}">
                        <div class="panel-heading"
                             style="{{ $actuality->color == 'clear_blue' ? 'background-color: rgba(51, 122, 183, 0.5);border-color: rgba(51, 122, 183, 0.5)' : '' }}">
                            <div class="row">
                                <div class="col-md-10">
                                    @if($actuality->avatar)
                                        <img src="{{ asset('img/avatars/' . $actuality->user_id . '.jpg') }}"
                                             alt="avatar" width="35" height="35" class="img-rounded"/>
                                    @endif
                                    <span style="font-size: 20px; color:black;">{{ ucfirst($actuality->forname) }} {{ ucfirst($actuality->name) }}</span>
                                    <span style="color:black;">
                                    dans la section
                                    </span>
                                    <span style="font-weight: bold;">
                                        <i class="{{ $actuality->color == 'orange' ? 'text-warning' : '' }} {{ $actuality->color == 'red' ? 'text-danger' :  '' }} {{ $actuality->color == 'clear_blue' ? 'text-primary' : '' }} {{ $actuality->color == 'dark_blue' ? 'text-info' : '' }} {{ $actuality->color == 'green' ? 'text-success' : ''}}">
                                        {{ $actuality->category }}
                                        </i>
                                   </span>
                                </div>
                                <div class="col-md-2">
                                    {{ ucfirst(Jenssegers\Date\Date::create($actuality->created_at->year, $actuality->created_at->month, $actuality->created_at->day, $actuality->created_at->hour, $actuality->created_at->minute, $actuality->created_at->second)->ago()) }}
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            {{ $actuality->message }}

                            <hr style="margin-top: 7px; margin-bottom: 7px;">

                            {!! Form::open(['route' => ['actuality.comment', $actuality->id], 'class' => 'form-horizontal']) !!}
                            <div class="row">
                                <div class="col-md-2">
                                    <a href="{{ route('actuality.like', $actuality->id) }}"
                                       style="text-decoration: none;">
                                        <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
                                        {{ count($actuality->likes) }} J'aime
                                    </a>
                                </div>
                                <div class="col-md-10">
                                    <a href="#" onclick="$(this).closest('form').submit()"
                                       style="text-decoration: none;">
                                        <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
                                        Commenter
                                    </a>
                                </div>
                            </div>
                            <hr style="margin-top: 7px; margin-bottom: 7px;">

                            @foreach($actuality->comments as $comment)
                                <div class="row" style="margin-top: 10px; margin-bottom: 10px;">
                                    <div class="col-md-12">
                                        <span class="text-info" style="font-weight: bold; margin-right: 20px;">
                                            @if($actuality->avatar)
                                                <img src="{{ asset('img/avatars/' . $comment->user->id . '.jpg') }}"
                                                     alt="avatar" width="20" height="20" class="img-rounded"/>
                                            @endif
                                            {{ $comment->user->forname }} {{ $comment->user->name }}
                                        </span>
                                        {{ $comment->message }}
                                        <p style="font-size: 11px;">
                                            {{ ucfirst(Jenssegers\Date\Date::create($comment->created_at->year, $comment->created_at->month, $comment->created_at->day, $comment->created_at->hour, $comment->created_at->minute, $comment->created_at->second)->ago()) }}
                                            <a href="{{ route('actuality.like', $comment->id) }}"
                                               style="text-decoration: none; margin-left: 10px;">
                                                <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
                                                {{ count($comment->likes) }} J'aime
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            @endforeach

                            <div class="row">
                                <div class="col-md-12">
                                    {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '1', 'placeholder' => 'Votre commentaire ...']) !!}
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                @endforeach

                <div class="text-center">
                    {{ $actualities->links() }}
                </div>

            @endif
        </div>
    </div>

@endsection