@extends('otherpages')
@section('displaypayements')
<div class="container mt-4">
    <h1 class="mb-4">Paiements effectués</h1>

    @if(count($userpaiements) > 0)
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date </th>
                    <th scope="col">Paiments effectués</th>
                    <th scope="col">Motif du paiement</th>                    
                    
                    <!-- Ajoutez d'autres colonnes en fonction de vos besoins -->
                </tr>
            </thead>
            <tbody>
                @foreach($userpaiements as $paiement)
                    <tr>
                        <th scope="row">{{ $paiement->id }}</th>
                        <td>{{ $paiement->created_at }}</td>
                        <td>{{ $paiement->paiement_en_attente }}</td>
                        <td>
                            @if($paiement->demande)
                                Démenagement de {{ $paiement->demande->lieudep }} à {{ $paiement->demande->lieudest }} le {{ $paiement->demande->dateHeureDem }}
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
    <h5>Total des paiements <span style="color:blue;">{{ $totalpaiement }} XOF</span> </h5>    
</div>
@endsection
