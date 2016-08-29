@extends('layouts.app')

@section('title')
    Création d'une catégorie
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($category->exists)
                {!! Form::open(['route' => ['category.update', $category->id], 'class' => 'form-horizontal']) !!}
            @else
                {!! Form::open(['route' => ['category.store'], 'class' => 'form-horizontal']) !!}
            @endif
            <p class="text-right"><i class="text-danger">* Champs obligatoires</i></p>

            <div class="form-group">
                <div class="col-md-3">
                    {!! Form::label('name', 'Nom :', ['class' => 'control-label']) !!}
                    <i class="text-danger">*</i>
                </div>
                <div class="col-md-9">
                    {!! Form::text('name', $category->exists ? $category->name : old('name'), ['class' => 'form-control', 'required']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3">
                    {!! Form::label('color', 'Couleur :', ['class' => 'control-label']) !!}
                    <i class="text-danger">*</i>
                </div>
                <div class="col-md-9">
                    {!! Form::select('color', ['orange' => 'Orange', 'red' => 'Rouge', 'clear_blue' => 'Bleu clair', 'dark_blue' => 'Blue foncé', 'green' => 'Vert'], $category->exists ? $category->name : null, ['class' => 'form-control', 'required']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3">
                    {!! Form::label('order', 'Ordre :', ['class' => 'control-label']) !!}
                    <i class="text-danger">*</i>
                </div>
                <div class="col-md-9">
                    {!! Form::number('order', $category->exists ? $category->order : old('order'), ['class' => 'form-control', 'required', 'min' => '1']) !!}
                </div>
            </div>

            @if($category->exists)
                <div class="form-group text-center">
                    {!! Form::submit('Sauvegarder', ['class' => 'btn btn-success']) !!}
                </div>
            @else
                <div class="form-group text-center">
                    {!! Form::submit('Créer', ['class' => 'btn btn-success']) !!}
                </div>
            @endif

            {!! Form::close() !!}
        </div>
    </div>
@stop