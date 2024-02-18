@extends('otherpages')

@section('content')
<div class="container">
    <div class="movers-page p-4 rounded shadow-lg bg-white">
        <h2 class="mb-4">Liste des déménageurs</h2>
        
        <!-- Bouton pour ajouter un nouveau déménageur -->
        <a href="#" class="btn btn-primary mb-3">Ajouter un déménageur</a>

        <!-- Tableau des déménageurs -->
        <table id="movers-table" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>quartier</th>
                    <th>ville</th>
                    <th>pays</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Photo</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Boucle sur les déménageurs -->
                @foreach($movers as $mover)
                <tr>
                    <td>{{ $mover->id }}</td>
                    <td>{{ $mover->name }}</td>
                    <td>{{ $mover->prenom }}</td>
                    <td>{{ $mover->quartier }}</td>
                    <td>{{ $mover->ville }}</td>
                    <td>{{ $mover->pays }}</td>
                    <td>{{ $mover->tel }}</td>
                    <td>{{ $mover->phone }}</td>
                    <td>
                    <div class="p-6 text-gray-900">
                        <!-- Afficher la photo ici -->
                        <img src="{{ asset('/storage/'.Auth::user()->photo) }}" alt="" class="img rounded-circle" style="width:50px; height:50px;">
                                                
                    </div>
                </td>
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
        $('#movers-table').DataTable();
    });
</script>
@endpush
