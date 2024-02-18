@extends('otherpages')

@section('content')
<div class="container">
    <div class="reviews-page p-4 rounded shadow-lg bg-white">
        <h2 class="mb-4">Liste des avis</h2>
        
        <!-- Bouton pour ajouter un nouvel avis -->
        <a href="#" class="btn btn-primary mb-3">Ajouter un avis</a>

        <!-- Tableau des avis -->
        <table id="reviews-table" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom Utilisateur</th>
                    <th>Prenom </th>
                    <th>Note</th>
                    
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Boucle sur les avis -->
                @foreach($reviews as $review)
                <tr>
                    <td>{{ $review->id }}</td>                   
                    <td>{{ $review->user->name }}</td>
                    <td>{{ $review->user->prenom }}</td>                                    
                    
                    <td>{{ $review->stars }} <i class="fa-solid fa-star" style="color: #FFD43B;"></i> /5</td>                    
                    <td>{{ $review->created_at }}</td>
                    
                    <td>
                        <!-- Boutons pour modifier et supprimer -->
                        <button class="btn btn-warning btn-sm mr-2"> <i class="fas fa-edit"></i>Modifier</button>
                        <button class="btn btn-danger btn-sm"> <i class="fas fa-trash-alt"></i>Supprimer</button>
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
        $('#reviews-table').DataTable();
    });
</script>
@endpush
