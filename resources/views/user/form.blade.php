@extends('layouts.app')

@section('title')
    Mon compte
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['route' => ['user.update'], 'class' => 'form-horizontal', 'files' => true]) !!}
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
                    {!! Form::label('avatar', 'Avatar :', ['class' => 'control-label']) !!}
                </div>

                <div class="col-md-9">
                    {!! Form::file('avatar', ['class' => 'form-control']) !!}
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

            <div class="form-group">
                <div class="col-md-3">
                    {!! Form::label('newsletter', "Recevoir les actualités par mail", ['class' => 'control-label']) !!}
                    <i class="text-danger">*</i>
                </div>

                <div class="col-md-9">
                    <div class="radio-inline">
                        <label>
                            {!! Form::radio('newsletter', '1', $user->exists ? $user->newsletter == true ? true : false : false, ['required']) !!}
                            Oui
                        </label>
                    </div>
                    <div class="radio-inline">
                        <label>
                            {!! Form::radio('newsletter', '0', $user->exists ? $user->newsletter == false ? true : false : false, ['required']) !!}
                            Non
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group text-center">
                {!! Form::submit('Sauvegarder', ['class' => 'btn btn-success']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@stop