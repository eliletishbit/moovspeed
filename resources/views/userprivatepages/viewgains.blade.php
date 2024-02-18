@extends('otherpages')
@section('displaygains')
<div class="container mt-4">
    <h1 class="mb-4">Tous mes gains</h1>

    @if(count($usergains) > 0)
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date </th>
                    <th scope="col">Gains recus </th>
                    <th scope="col">Motif du gain</th>                    
                    
                    <!-- Ajoutez d'autres colonnes en fonction de vos besoins -->
                </tr>
            </thead>
            <tbody>
                @foreach($usergains as $gain)
                    <tr>
                        <th scope="row">{{ $gain->id }}</th>
                        <td>{{ $gain->created_at }}</td>
                        <td>{{ $gain->gains_en_cours }}</td>
                        <td>
                            @if($gain->demande)
                               gestion d'un Démenagement de {{ $paiement->demande->lieudep }} à {{ $paiement->demande->lieudest }} le {{ $paiement->demande->dateHeureDem }}
                            @else
                                Demande associée introuvable
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Aucun paiement lié à votre demande en attente.</p>
    @endif
</div>
<div class="container p-4">
    <h5>Total des gains <span style="color:blue;">{{ $totalgains }} XOF</span> </h5>    
</div>
@endsection
