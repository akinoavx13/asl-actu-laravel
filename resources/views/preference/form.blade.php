@extends('layouts.app')

@section('title')
    Préférences
@stop

@section('content')
    <div class="row">
        <p class="text-center">
            Sélectionnez au maximum 3 catégories à afficher sur la page d'accueil
        </p>
        <hr>

        <div class="col-md-12">
            {!! Form::open(['route' => ['preference.store'], 'class' => 'form-horizontal']) !!}
            <p class="text-right"><i class="text-danger">* Champs obligatoires</i></p>

            <div class="form-group">
                <div class="col-md-3">
                    {!! Form::label('category[]', 'Catégorie :', ['class' => 'control-label']) !!}
                    <i class="text-danger">*</i>
                </div>
                <div class="col-md-9">
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('category[general]', 1, $preference != null && $preference->general == 1, []) !!}
                            Général
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('category[athletics]', 1, $preference != null && $preference->athletics == 1, []) !!}
                            Athlétisme
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('category[badminton]', 1, $preference != null && $preference->badminton == 1, []) !!}
                            Badminton
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('category[basketball]', 1, $preference != null && $preference->basketball == 1, []) !!}
                            Basketball
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('category[football]', 1, $preference != null && $preference->football == 1, []) !!}
                            Football
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('category[gym]', 1, $preference != null && $preference->gym == 1, []) !!}
                            Gym
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('category[yoga_cestas]', 1, $preference != null && $preference->yoga_cestas == 1, []) !!}
                            Yoga (Cestas)
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('category[ball]', 1, $preference != null && $preference->ball == 1, []) !!}
                            Pelote
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('category[soccer5]', 1, $preference != null && $preference->soccer5 == 1, []) !!}
                            Soccer5
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('category[tennis]', 1, $preference != null && $preference->tennis == 1, []) !!}
                            Tennis
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('category[volleyball]', 1, $preference != null && $preference->volleyball == 1, []) !!}
                            Volley
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('category[yoga_chalgrin]', 1, $preference != null && $preference->yoga_chalgrin == 1, []) !!}
                            Yoga (Chalgrin)
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