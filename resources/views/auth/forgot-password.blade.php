@extends('otherpages')

@section('forgotpasswordpage')


<div class="container w-50 mt-4 mb-4 py-4 px-4" style="border:0px solid blue;" >
<div class="title-forgotpassword">
    <h2>Mot de passe oublié ?</h2>
</div>

    <div class="mb-4 text-sm text-gray-600">
        {{ __('Mot de passe oublié?? rentrez votre adrese mail et nous vos enverrons un lien de recuperaction de mot de passe.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="d-flex justify-content-end mt-4">
            <button type="submit" class="btn btn-primary">{{ __('Lien de recuperation mot de passe') }}</button>
        </div>
    </form>


</div>


@endsection

