@extends('otherpages')

@section('content')
<div class="container">
    <div class="drivers-page p-4 rounded shadow-lg bg-white">
        <h2 class="mb-4">Liste des chauffeurs</h2>
        
        <!-- Bouton pour ajouter un nouveau chauffeur -->
        <a href="#" class="btn btn-primary mb-3">Ajouter un chauffeur</a>

        <!-- Tableau des chauffeurs -->
        <table id="drivers-table" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Quartier</th>
                    <th>Ville</th>
                    <th>Pays</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Boucle sur les chauffeurs -->
                @foreach($chauffeurs as $driver)
                <tr>
                    <td>{{ $driver->id }}</td>
                    <td>{{ $driver->name }}</td>
                    <td>{{ $driver->prenom }}</td>
                    <td>{{ $driver->quartier }}</td>
                    <td>{{ $driver->ville }}</td>
                    <td>{{ $driver->pays }}</td>
                    <td>
                        <!-- Boutons pour modifier et supprimer -->
                        <button class="btn btn-warning btn-sm mr-2">Modifier</button>
                        <button class="btn btn-danger btn-sm">Supprimer</button>
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
        $('#drivers-table').DataTable();
    });
</script>
@endpush
