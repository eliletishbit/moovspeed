@extends('otherpages')

@section('content')
<div class="container">
    <div class="payments-page p-4 rounded shadow-lg bg-white">
        <h2 class="mb-4">Mes Paiements</h2>
        
        <!-- Liste des paiements -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Paiements en attente</th>
                    <th scope="col">Paiments totales</th>
                    <th scope="col">Identifiant de l'utilisateur</th>
                    <th scope="col">Identifiant de la demande</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payments as $payment)
                <tr>
                    <td>{{ $payment->created_at}}</td>
                    <td><span class="badge text-bg-warning">{{ $payment->paiement_en_attente}}</span></td>
                    <td><span class="badge text-bg-info">{{ $payment->paiement_total}}</span></td>
                    <td>{{ $payment->iduser }}</td>
                    <td>{{ $payment->demande_id }}</td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
