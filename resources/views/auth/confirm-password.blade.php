@extends('otherpages')

@section('confirmpasswordpage')


<div class="container w-50 mt-4 mb-4 py-4 px-4" style="border:0px solid blue;" >
<div class="title-forgotpassword">
    <h2>Confirmez votre mot de passe</h2>
</div>


    <div class="mb-4 text-sm text-gray-600">
        {{ __('Ceci est un espace securisé. vueillez confirmer votre mot de passe avant de continuer.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">{{ __('Mot de passe') }}</label>

            <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="d-flex justify-content-end mt-4">
            <button type="submit" class="btn btn-primary">{{ __('Confirmer') }}</button>
        </div>
    </form>



</div>


@endsection


