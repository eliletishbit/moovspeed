@extends('otherpages')

@section('dashboarduserpage')

<!-- Au-dessus de la fermeture du body (</body>) -->

<script>
    document.getElementById('logoutForm').addEventListener('submit', function (event) {
        // Soumettre le formulaire lorsque le bouton est cliqué
        event.preventDefault(); // Empêcher le comportement par défaut du formulaire
        this.submit();
    });
</script>


<div class="container-fluid mt-4 mb-4 py-4 px-4">
    <div class="container-fluid  shadow-lg p-3 mb-5 bg-white rounded">
        <div class="row" name="header">
            <div class="col-md-6 col-lg-8">
                <!-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Tableau de bord') }}
                </h2> -->
            </div>
            <div class="col-md-6 col-lg-4 text-right">
                <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-primary" type="submit">Se déconnecter</button>
                </form>
            </div>
        </div>

        <div class="row py-12">
            <div class="col-md-6 col-lg-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="p-6 text-gray-900">
                        {{ __("Vous êtes connecté!") }}
                    </div>
                    @auth()                    
                        @if(Auth::user()->idtypeutilisateur == 2)
                        <h3>Profil : Démenageur</h3>
                        <a href="{{ route('createdemande') }}" type="button" class="btn btn-secondary">Faire une demande</a>
                        <a href="{{ route('viewdemandes') }}" type="button" class="btn btn-primary">Mes demandes </a>
                        <a href="{{ route('viewpayements') }}" type="button" class="btn btn-danger">Mes Paiements</a>
                        <a href="{{ route('profile.edit') }}" type="button" class="btn btn-info">mon Profil</a>
                        <a href="{{ route('viewnotifications') }}" type="button" class="btn btn-warning">
                            Mes Notifications
                            <span id="notificationCount" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            <!-- Le compteur de notifications va ici -->
                            </span>
                            
                        </a>
                       
                     
                        
                        @elseif(Auth::user()->idtypeutilisateur == 1)
                        
                        <h3>Profil : Chauffeur</h3>
                        <a href="{{ route('viewdemandes') }}" type="button" class="btn btn-secondary">Demandes gérées</a>
                        <a href="{{ route('profile.edit') }}" type="button" class="btn btn-info">Mon profil</a>
                        <a href="{{ route('viewgains') }}" type="button" class="btn btn-danger">Mes Gains</a>
                        <a href="{{ route('viewnotifications') }}" type="button" class="btn btn-warning">Mes Notifications</a>
                       
                        @elseif(Auth::user()->idtypeutilisateur == 3)                        
                        <h3>Profil : Administrateur</h3>
                        <a href="{{ route('adminhome') }}" type="button" class="btn btn-danger">Aller sur le tableau de bord</a>
                        
                        
                        @endif
                                                             
                    @endauth()
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg text-center">
                    <div class="p-6 text-gray-900">
                        <!-- Afficher la photo ici -->
                        <img src="{{ asset('/storage/'.Auth::user()->photo) }}" alt="" class="img rounded-circle" style="width:150px; height:150px;">
                        {{Auth::user()->name}}
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection







