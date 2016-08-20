@extends('layouts.app')

@section('title')
    Préférences
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['route' => ['preference.store'], 'class' => 'form-horizontal']) !!}
            <p class="text-right"><i class="text-danger">* Champs obligatoires</i></p>

            <div class="form-group">
                <div class="col-md-3">
                    {!! Form::label('categories[]', 'Catégorie :', ['class' => 'control-label']) !!}
                    <i class="text-danger">*</i>
                </div>
                <div class="col-md-9">
                    @foreach($categories as $category)
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('categories[' . $category->id . ']', $category->id, $category->user_id != null ? true : false, []) !!}
                                {{ $category->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group text-center">
                {!! Form::submit('Sauvegarder', ['class' => 'btn btn-success']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@stop