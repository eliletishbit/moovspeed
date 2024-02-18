@extends('otherpages')

@section('content')
<div class="container-fluid">
    <div class="demands-page p-4 rounded shadow-lg bg-white w-100">
        <h2 class="mb-4">Liste des demandes des utilisateurs (déménageurs)</h2>
        
        <!-- Bouton pour ajouter une nouvelle demande -->
        <a href="#" class="btn btn-primary mb-3">Ajouter une demande</a>

        <!-- Tableau des demandes -->
        <table id="demands-table" class="table table-striped table-bordered ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom et prénom du demandeur</th>
                    <th>Lieu de départ</th>
                    <th>Destination</th>
                    <th>Date et heure souhaitées</th>
                    <th>Status</th>
                    <th>Type de voiture souhaitée</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Boucle sur les demandes -->
                @foreach($demandes as $demand)
                <tr>
                    <td>{{ $demand->id }}</td>
                    <td>{{ $demand->demenageur->name }}  {{ $demand->demenageur->prenom}}</td>
                    <td>{{ $demand->lieudep }}</td>
                    <td>{{ $demand->lieudest }}</td>
                    <td>{{ $demand->dateHeureDem }}</td>
                    <td>
                        @if($demand->status == 0)                            
                            <span class="badge text-bg-success">En attente</span>
                        @elseif($demand->status == 1)
                            <span class="badge text-bg-warning">En Cours</span>
                        @elseif($demand->status == 2)
                            <span class="badge text-bg-danger">Terminé</span>                          
                        @endif
                    </td>
                    <td>{{ $demand->typevoiture->libtypevoiture }}</td>
                    <td>
                        <!-- Formulaire pour envoyer une notification -->
                        <form action="{{ route('envoyernotification') }}" method="POST">
                            @csrf
                            <input type="hidden" name="demand_id" value="{{ $demand->id }}">
                            <div class="form-group">
                                <select name="notification_type" class="form-control">
                                    <option value="AnalyseDemande">Analyse Demande</option>
                                    <option value="ValidationDemande">Validation Demande</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-info btn-sm">Notifier</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Initialisation de DataTables
        $('#demands-table').DataTable();
    });
</script>
@endpush
