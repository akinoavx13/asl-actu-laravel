@extends('layouts.app')

@section('title')
    Utilisateurs
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            @if(count($users) <= 0)
                <h1 class="text-center text-danger">
                    Il n'y a pas d'utilisateurs
                </h1>
            @else
                <div class="table-responsive">
                    <table class="table table-striped table-hover display" id="userList">
                        <thead>
                        <tr>
                            <th class="text-center">Prénom</th>
                            <th class="text-center">Nom</th>
                            <th class="text-center">E-Mail</th>
                            <th class="text-center">Editer</th>
                            <th class="text-center">Supprimer</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr class="text-center">
                                <td>{{ $user->forname }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="{{ route('user.editAsAdmin', $user->id) }}" class="text-info">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('user.delete', $user->id) }}" class="text-danger">
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
            $('#userList').DataTable( {
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