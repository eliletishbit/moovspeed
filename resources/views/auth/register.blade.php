@extends('otherpages')

@section('registerpage')

<div class="container w-50 mt-4 mb-4 py-4 px-4" style="border: 0px solid blue;">
    <div class="title-register">
        <h2>Formulaire d'inscription</h2>
    </div>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Prenom -->
        <div class="mb-3">
            <label for="prenom" class="form-label">{{ __('Prenom') }}</label>
            <input id="prenom" class="form-control" type="text" name="prenom" :value="old('prenom')" required autocomplete="prenom" />
            <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Type Utilisateur -->
        <div class="mb-3">
            <label for="typeutilisateur" class="form-label">{{ __('Type Utilisateur') }}</label>
            
            <select id="idtypeutilisateur" class="form-control" name="idtypeutilisateur" required>
                @foreach($typesusers    as $typeuser)            
                <option value="{{$typeuser->id}}">{{$typeuser->libtypeuser}}</option>                
                @endforeach
            </select>
           
            <x-input-error :messages="$errors->get('typeutilisateur')" class="mt-2" />
        </div>

        <!-- Quartier -->
        <div class="mb-3">
            <label for="quartier" class="form-label">{{ __('Quartier') }}</label>
            <input id="quartier" class="form-control" type="text" name="quartier" :value="old('quartier')" required autocomplete="quartier" />
            <x-input-error :messages="$errors->get('quartier')" class="mt-2" />
        </div>

        <!-- Ville -->
        <div class="mb-3">
            <label for="ville" class="form-label">{{ __('Ville') }}</label>
            <input id="ville" class="form-control" type="text" name="ville" :value="old('ville')" required autocomplete="ville" />
            <x-input-error :messages="$errors->get('ville')" class="mt-2" />
        </div>

        <!-- Pays -->
        <div class="mb-3">
            <label for="pays" class="form-label">{{ __('Pays') }}</label>
            <input id="pays" class="form-control" type="text" name="pays" :value="old('pays')" required autocomplete="pays" />
            <x-input-error :messages="$errors->get('pays')" class="mt-2" />
        </div>

        <!-- Photo -->
        <div class="mb-3">
            <label for="photo" class="form-label">{{ __('Photo') }}</label>
            <input id="photo" class="form-control" type="file" name="photo" :value="old('photo')" required accept="image/*" />            
            <x-input-error :messages="$errors->get('photo')" class="mt-2" />
        </div>

        <!-- Tel -->
        <div class="mb-3">
            <label for="tel" class="form-label">{{ __('Tel') }}</label>
            <input id="tel" class="form-control" type="tel" name="tel" :value="old('tel')" required autocomplete="tel" />
            <x-input-error :messages="$errors->get('tel')" class="mt-2" />
        </div>

        <div class="d-flex justify-content-end mt-4">
            <a class="text-muted text-decoration-none me-4" href="{{ route('login') }}">
                {{ __('Déjà inscrit ?') }}
            </a>

            <button type="submit" class="btn btn-primary">{{ __('Inscription') }}</button>
        </div>
    </form>
</div>

@endsection
