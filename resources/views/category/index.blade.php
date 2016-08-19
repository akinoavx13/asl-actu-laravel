@extends('layouts.app')

@section('title')
    Catégories
@endsection

@section('content')

    <div class="row">
        <div class="col-md-offset-4 col-md-4">
            <a href="{{ route('category.create') }}" class="btn btn-block btn-success">Ajouter une catégorie</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            @if(count($categories) <= 0)
                <h1 class="text-center text-danger">
                    Il n'y a pas de catégorie ...
                </h1>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Nom</th>
                                <th class="text-center">Couleur</th>
                                <th class="text-center">Nombre d'actualité</th>
                                <th class="text-center">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr class="text-center">
                                <td>{{ $category->name }}</td>
                                <td>
                                    @if($category->color == 'orange')
                                        <i class="text-warning">
                                            Orange
                                        </i>
                                    @elseif($category->color == 'red')
                                        <i class="text-danger">
                                            Rouge
                                        </i>
                                    @elseif($category->color == 'clear_blue')
                                        <i class="text-primary">
                                            Bleu clair
                                        </i>
                                    @elseif($category->color == 'dark_blue')
                                        <i class="text-info">
                                            Bleu foncé
                                        </i>
                                    @elseif($category->color == 'green')
                                        <i class="text-success">
                                            Vert
                                        </i>
                                    @endif
                                </td>
                                <td>
                                    {{ count($category->actualities) }}
                                </td>
                                <td>
                                    <a href="{{ route('category.delete', $category->id) }}" class="text-danger">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

@endsection