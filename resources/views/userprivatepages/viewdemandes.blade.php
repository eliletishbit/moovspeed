@extends('otherpages')

@section('displaydemandes')
<div class="container mt-4">
    <h1 class="mb-4">Mes demandes de déménagement</h1>

    @if(Auth::check())
        @if(Auth::user()->idtypeutilisateur == 2)
            <!-- Afficher les demandes effectuées par l'utilisateur -->
            @if(count($userdemandes) > 0)
                <!-- Tableau des demandes de déménagement -->
                <table class="table table-bordered table-striped table-hover">
                    <!-- En-têtes du tableau -->
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Date de création</th>
                            <th scope="col">Origine</th>
                            <th scope="col">Destination</th>
                            <th scope="col">Date et heure souhaitée</th>
                            <th scope="col">Statut</th>
                            <th scope="col">Type de voiture souhaitée</th>
                            <!-- Ajoutez d'autres colonnes en fonction de vos besoins -->
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Parcours des demandes de déménagement -->
                        @foreach($userdemandes as $demande)
                            <tr>
                                <th scope="row">{{ $demande->id }}</th>
                                <td>{{ $demande->created_at }}</td>
                                <td>{{ $demande->lieudep }}</td>
                                <td>{{ $demande->lieudest }}</td>
                                <td>{{ $demande->dateHeureDem }}</td>
                                <!-- Affichage du statut en fonction de la valeur de $demande->status -->
                                @if($demande->status == 0)
                                    <td><span class="text-primary">En attente d'approbation</span></td>
                                @elseif($demande->status == 1)
                                    <td><span class="text-success">En cours</span></td>
                                @elseif($demande->status == 2)
                                    <td><span class="text-danger">Terminé</span></td>
                                @endif
                                <td>{{ $demande->typevoiture->libtypevoiture }}</td>
                                <!-- Ajoutez d'autres cellules en fonction de vos besoins -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>Aucune demande de déménagement trouvée.</p>
            @endif
        @elseif(Auth::user()->idtypeutilisateur == 1)
            <!-- Afficher les demandes attribuées au chauffeur -->
            <table  class="table table-bordered table-striped table-hover">
                <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Date de création</th>
                            <th scope="col">Origine</th>
                            <th scope="col">Destination</th>
                            <th scope="col">Date et heure souhaitée</th>
                            <th scope="col">Statut</th>
                            <th scope="col">Type de voiture souhaitée</th>
                            <!-- Ajoutez d'autres colonnes en fonction de vos besoins -->
                        </tr>
                </thead>
                <tbody>
                        @foreach($driverdemandes as $demande)
                            <tr>
                                <th scope="row">{{ $demande->id }}</th>
                                <td>{{ $demande->created_at }}</td>
                                <td>{{ $demande->lieudep }}</td>
                                <td>{{ $demande->lieudest }}</td>
                                <td>{{ $demande->dateHeureDem }}</td>
                                <!-- Affichage du statut en fonction de la valeur de $demande->status -->
                                @if($demande->status == 0)
                                    <td><span class="text-primary">En attente d'approbation</span></td>
                                @elseif($demande->status == 1)
                                    <td><span class="text-success">En cours</span></td>
                                @elseif($demande->status == 2)
                                    <td><span class="text-danger">Terminé</span></td>
                                @endif
                                <td>{{ $demande->typevoiture->libtypevoiture }}</td>
                                <!-- Ajoutez d'autres cellules en fonction de vos besoins -->
                            </tr>
                        @endforeach
                </tbody>
            </table>
            <!-- Votre code pour afficher les demandes attribuées au chauffeur -->
        @endif
    @else
        <!-- Redirection ou message d'erreur -->
    @endif
</div>

@endsection
