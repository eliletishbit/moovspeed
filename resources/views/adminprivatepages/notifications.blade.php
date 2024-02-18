@extends('otherpages')

@section('content')
<div class="container">
    <div class="notifications-page p-4 rounded shadow-lg bg-white">
        <h2 class="mb-4">Notifications demandes soumises</h2>
        
        <!-- Liste des notifications -->
        <ul class="list-group">
            @foreach($notifications as $notification)
            <li class="list-group-item">
                <!-- Affichage du contenu de la notification -->
                <div>
                    <i class="fas fa-bell mr-2" style="color: #FFC107;"></i>
                    <strong>{{ $notification->title }}</strong>
                    <p>{{ $notification->data }}</p>
                </div>
                <!-- Affichage de la date de la notification -->
                <small class="text-muted">{{ $notification->created_at->format('d/m/Y H:i') }}</small>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
