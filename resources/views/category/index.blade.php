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
                    Il n'y a pas de catégorie
                </h1>
            @else
                <div class="table-responsive">
                    <table class="table table-striped table-hover display" id="categoriesList">
                        <thead>
                            <tr>
                                <th class="text-center">Ordre</th>
                                <th class="text-center">Nom</th>
                                <th class="text-center">Couleur</th>
                                <th class="text-center">Nombre d'actualité</th>
                                <th class="text-center">Editer</th>
                                <th class="text-center">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr class="text-center">
                                <td>{{ $category->order }}</td>
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
                                    <a href="{{ route('category.edit', $category->id) }}" class="text-info">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                    </a>
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

@section('javascript')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#categoriesList').DataTable( {
                "pageLength": 100,
                language: {
                    processing:     "Traitement en cours...",
                    search:         "Rechercher&nbsp;:",
                    lengthMenu:    "Afficher _MENU_ &eacute;l&eacute;ments",
                    info:           "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                    infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                    infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                    infoPostFix:    "",
                    loadingRecords: "Chargement en cours...",
                    zeroRecords:    "Aucun &eacute;l&eacute;ment &agrave; afficher",
                    emptyTable:     "Aucune donnée disponible dans le tableau",
                    paginate: {
                        first:      "Premier",
                        previous:   "Pr&eacute;c&eacute;dent",
                        next:       "Suivant",
                        last:       "Dernier"
                    },
                    aria: {
                        sortAscending:  ": activer pour trier la colonne par ordre croissant",
                        sortDescending: ": activer pour trier la colonne par ordre décroissant"
                    }
                }
            } );
        } );
    </script>
@stop