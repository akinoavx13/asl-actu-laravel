@extends('layouts.app')

@section('title')
    Création d'une catégorie
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['route' => ['category.store'], 'class' => 'form-horizontal']) !!}
            <p class="text-right"><i class="text-danger">* Champs obligatoires</i></p>

            <div class="form-group">
                <div class="col-md-3">
                    {!! Form::label('name', 'Nom :', ['class' => 'control-label']) !!}
                    <i class="text-danger">*</i>
                </div>
                <div class="col-md-9">
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'required']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3">
                    {!! Form::label('color', 'Couleur :', ['class' => 'control-label']) !!}
                    <i class="text-danger">*</i>
                </div>
                <div class="col-md-9">
                    {!! Form::select('color', ['orange' => 'Orange', 'red' => 'Rouge', 'clear_blue' => 'Bleu clair', 'dark_blue' => 'Blue foncé', 'green' => 'Vert'], null, ['class' => 'form-control', 'required']) !!}
                </div>
            </div>

            <div class="form-group text-center">
                {!! Form::submit('Créer', ['class' => 'btn btn-success']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@stop