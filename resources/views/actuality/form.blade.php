@extends('layouts.app')

@section('title')
    Création d'une actualité
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['route' => ['actuality.store'], 'class' => 'form-horizontal']) !!}
            <p class="text-right"><i class="text-danger">* Champs obligatoires</i></p>

            <div class="form-group">
                <div class="col-md-3">
                    {!! Form::label('category', 'Catégorie :', ['class' => 'control-label']) !!}
                    <i class="text-danger">*</i>
                </div>
                <div class="col-md-9">
                    {!! Form::select('category', ['general' => 'Général', 'athletics' => 'Athlétisme', 'badminton' => 'Badminton','basketball' => 'Basketball', 'football' => 'Football', 'gym' => 'Gym', 'yoga_cestas' => 'Yoga (Cestas)', 'ball' => 'Pelote', 'soccer5' => 'Soccer5', 'tennis' => 'Tennis', 'volleyball' => 'Volley', 'yoga_chalgrin' => 'Yoga (Chalgrin)'], null, ['class' => 'form-control', 'required']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3">
                    {!! Form::label('message', 'Message :', ['class' => 'control-label']) !!}
                    <i class="text-danger">*</i>
                </div>
                <div class="col-md-9">
                    {!! Form::textarea('message',  null, ['class' => 'form-control', 'rows' => '3', 'placeholder' => 'Votre message ...', 'required']) !!}
                </div>
            </div>

            <div class="form-group text-center">
                {!! Form::submit('Créer', ['class' => 'btn btn-success']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@stop