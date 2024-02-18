@extends('otherpages')

@section('content')
<div class="container">
    <div class="earnings-page p-4 rounded shadow-lg bg-white">
        <h2 class="mb-4">Gains des chauffeurs</h2>
        
        <!-- Tableau des gains -->
        <table id="earnings-table" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Gains en cours</th>                                       
                    <th>Date </th>
                    <th>identifiant de l'utilisateur</th>

                    
                    
                </tr>
            </thead>
            <tbody>
                <!-- Boucle sur les gains -->
                @foreach($earnings as $earning)
                <tr>
                    <td>{{ $earning->id }}</td>
                    <td>{{$earning->gains_en_cours}}</td>                                       
                    <td>{{ $earning->created_at }}</td>
                    <td>{{ $earning->iduser }}</td>
                    
                    
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
        $('#earnings-table').DataTable();
    });
</script>
@endpush
