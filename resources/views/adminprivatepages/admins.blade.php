@extends('otherpages')

@section('content')
<div class="container">
    <div class="admins-page p-4 rounded shadow-lg bg-white">
        <h2 class="mb-4">Liste des administrateurs</h2>
        
        <!-- Bouton pour ajouter un nouvel administrateur -->
        <a href="#" class="btn btn-primary mb-3">Ajouter un administrateur</a>

        <!-- Tableau des administrateurs -->
        <table id="admins-table" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Boucle sur les administrateurs -->
                @foreach($admins as $admin)
                <tr>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>
                        <!-- Boutons pour modifier et supprimer -->
                        <button class="btn btn-warning btn-sm mr-2">
                            <i class="fas fa-edit"></i> Modifier
                        </button>
                        <button class="btn btn-danger btn-sm">
                            <i class="fas fa-trash-alt"></i> Supprimer
                        </button>

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
        $('#admins-table').DataTable();
    });
</script>
@endpush
