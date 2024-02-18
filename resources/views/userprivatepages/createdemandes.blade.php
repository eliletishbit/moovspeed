@extends('otherpages')
@section('displaydemandesform')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>Faire une demande de déménagement</h2>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('storedemande') }}" >
                @csrf

                <div class="mb-3">
                    <label for="lieudep" class="form-label">Lieu de départ</label>
                    <input type="text" class="form-control" id="lieudep" name="lieudep" required>
                </div>

                <div class="mb-3">
                    <label for="lieudest" class="form-label">Lieu de destination</label>
                    <input type="text" class="form-control" id="lieudest" name="lieudest" required>
                </div>

                <div class="mb-3">
                    <label for="dateHeureDem" class="form-label">Date et heure de la demande</label>
                    <input type="datetime-local" class="form-control" id="dateHeureDem" name="dateHeureDem" required>
                </div>

                
                <div class="mb-3">
                    <label for="idtypevoiture" class="form-label">Type de voiture</label>
                    <select class="form-select" id="idtypevoiture" name="idtypevoiture" required>
                        <!-- Ajoutez ici les options pour les types de voiture -->
                        @foreach($typevoitures    as $typevoiture)            
                        <option value="{{$typevoiture->id}}">{{$typevoiture->libtypevoiture}}</option>                
                        @endforeach
                    </select>
                </div>

                <input type="number" class="form-control" id="iduser" value="{{ Auth::user()->id }}" name="iduser" required hidden>

              
                <input type="number" class="form-control" id="dateHeureDem" value="{{$status}}" name="status" required hidden>
                

                <button type="submit" class="btn btn-primary">Créer la demande</button>
            </form>
        </div>
    </div>
</div>
@endsection
