@extends('layouts.app')

@section('title')
    Mon compte
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['route' => ['user.update'], 'class' => 'form-horizontal']) !!}
            <p class="text-right"><i class="text-danger">* Champs obligatoires</i></p>

            <div class="form-group">
                <div class="col-md-3">
                    {!! Form::label('forname', 'Prénom :', ['class' => 'control-label']) !!}
                    <i class="text-danger">*</i>
                </div>
                <div class="col-md-9">
                    {!! Form::text('forname', $user->forname, ['class' => 'form-control', 'required']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3">
                    {!! Form::label('name', 'Nom :', ['class' => 'control-label']) !!}
                    <i class="text-danger">*</i>
                </div>
                <div class="col-md-9">
                    {!! Form::text('name', $user->name, ['class' => 'form-control', 'required']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3">
                    {!! Form::label('email', 'E-Mail :', ['class' => 'control-label']) !!}
                    <i class="text-danger">*</i>
                </div>
                <div class="col-md-9">
                    {!! Form::text('email', $user->email, ['class' => 'form-control', 'required']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3">
                    {!! Form::label('password', 'Mot de passe :', ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-9">
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3">
                    {!! Form::label('password_confirmation', 'Confirmer mot de passe :', ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-9">
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group text-center">
                {!! Form::submit('Sauvegarder', ['class' => 'btn btn-success']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@stop