@extends('otherpages') 

@section('displaynotifications')
    <div class="container">
        <h1>Notifications</h1>

        @foreach ($notifications as $notification)
            <div class="notification alert alert-info mb-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <strong>{{ $notification->data['message'] }}</strong>
                        <p>{{ $notification->created_at->diffForHumans() }}</p>
                    </div>
                    <div>
                        <a href="{{route('viewdemandes')}}" class="btn btn-sm btn-primary">
                            <i class="fas fa-eye"></i> Voir
                        </a>
                        <a href="#" class="btn btn-sm btn-danger" onclick="deleteNotification({{ $notification->id }})">
                            <i class="fas fa-trash"></i> Supprimer
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        function deleteNotification(notificationId) {
            // Utilisez ici une requête Ajax pour supprimer la notification côté serveur
            // Après la suppression réussie, vous pouvez actualiser la liste des notifications ou cacher la notification côté client
            // Par exemple, vous pouvez utiliser jQuery pour masquer la notification :
            // $('#notification_' + notificationId).hide();
        }
    </script>
@endsection
