@extends('home')
@section('displaydynamicdataonhome')
<h1>Acheter un bien immobilier ou louez</h1>

<div class="row">
@foreach($biensimmos as $bienimmo)
    <div class="col col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-3 col-xxl-3">
        <div class="card mb-3 shadow">
            <!-- Contenu du bien immobilier -->
            <div class="card-body">
                 <!-- Exemple : Image du bien immobilier -->
                 <img src="{{asset('img/'.$bienimmo->photo)}}" alt="Image du bien immobilier" class="img-fluid">
                <!-- Ajoutez ici le contenu spécifique à chaque bien immobilier -->
                <h3 class="card-title">{{ $bienimmo->lib_bien }}</h3>
                <!-- Autres détails du bien immobilier -->
                <p >
                    {{ $bienimmo->description }}
                </p>
               
                <h5>{{ $bienimmo->prix }} XOF</h5>
                
                @if($bienimmo->status == 1)
                    <span class="badge text-bg-warning">Disponible</span>
                @else
                    <span class="badge text-bg-info">En location</span>
                @endif

            </div>
        </div>
    </div>
@endforeach

</div>

@endsection