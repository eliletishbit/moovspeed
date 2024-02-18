@extends('otherpages')

@section('verifyemailpage')


<div class="container w-50 mt-4 mb-4 py-4 px-4" style="border:0px solid blue;" >
<div class="title-forgotpassword">
    <h2>Verifiez votre adresse email</h2>
</div>

<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Merci pour l'inscription! Avant de demarrer, vueillez verifier votre adresse mail en cliquant sur le lien que nous vous avons envoyé par mail? Si vous n'avez pas reçu de mail, nous pouvons vous le renvoyer.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('Un nouveau lien a été envoyer à l'adresse mail que vous avez renseigner à l'inscription') }}
        </div>
    @endif

    <div class="mt-4 d-flex justify-content-between align-items-center">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <button type="submit" class="btn btn-primary">
                    {{ __('Renvoyer l'email de verification') }}
                </button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Se deconnecter') }}
            </button>
        </form>
    </div>
</x-guest-layout>



</div>


@endsection

