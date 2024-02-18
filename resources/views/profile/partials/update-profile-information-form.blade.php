<section>
    <header>
        <h2 class="text-lg font-medium text-dark">
            {{ __('Informations du profil') }}
        </h2>

        <p class="mt-1 text-sm text-secondary">
            {{ __("Mettez à jour les informations de votre compte et votre adresse e-mail.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <label for="name" class="form-label">{{ __('Nom') }}</label>
            <input id="name" name="name" type="text" class="form-control" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
            @error('name')
                <div class="mt-2 text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Prenom -->
        <div class="mb-3">
            <label for="prenom" class="form-label">{{ __('Prenom') }}</label>
            <input id="prenom" class="form-control" type="text" name="prenom" value="{{ old('prenom', $user->prenom) }}" required autocomplete="prenom" />
            <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
        </div>
    <!-- email -->
        <div>
            <label for="email" class="form-label">{{ __('E-mail') }}</label>
            <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" required autocomplete="username" />
            @error('email')
                <div class="mt-2 text-danger">
                    {{ $message }}
                </div>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-dark">
                        {{ __('Votre adresse e-mail n\'est pas vérifiée.') }}

                        <button form="send-verification" class="underline text-sm text-secondary hover:text-dark rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                            {{ __('Cliquez ici pour renvoyer l\'e-mail de vérification.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-success">
                            {{ __('Un nouveau lien de vérification a été envoyé à votre adresse e-mail.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Quartier -->
        <div class="mb-3">
            <label for="quartier" class="form-label">{{ __('Quartier') }}</label>
            <input id="quartier" class="form-control" type="text" name="quartier" value="{{ old('quartier', $user->quartier) }}" required autocomplete="quartier" />
            <x-input-error :messages="$errors->get('quartier')" class="mt-2" />
        </div>

        <!-- Ville -->
        <div class="mb-3">
            <label for="ville" class="form-label">{{ __('Ville') }}</label>
            <input id="ville" class="form-control" type="text" name="ville" value="{{ old('ville', $user->ville) }}" required autocomplete="ville" />
            <x-input-error :messages="$errors->get('ville')" class="mt-2" />
        </div>

        <!-- Pays -->
        <div class="mb-3">
            <label for="pays" class="form-label">{{ __('Pays') }}</label>
            <input id="pays" class="form-control" type="text" name="pays" value="{{ old('pays', $user->pays) }}" required autocomplete="pays" />
            <x-input-error :messages="$errors->get('pays')" class="mt-2" />
        </div>

        <!-- Photo -->
        <div class="mb-3">
            <label for="photo" class="form-label">{{ __('Photo') }}</label>
            <input id="photo" class="form-control" type="file" name="photo" value="{{ old('photo') }}" accept="image/*" />
            <x-input-error :messages="$errors->get('photo')" class="mt-2" />
        </div>

        <!-- Tel -->
        <div class="mb-3">
            <label for="tel" class="form-label">{{ __('Tel') }}</label>
            <input id="tel" class="form-control" type="tel" name="tel" value="{{ old('tel', $user->tel) }}" required autocomplete="tel" />
            <x-input-error :messages="$errors->get('tel')" class="mt-2" />
        </div>

        <div class="d-flex align-items-center gap-4">
            <button type="submit" class="btn btn-primary">{{ __('Enregistrer') }}</button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-secondary"
                >{{ __('Enregistré.') }}</p>
            @endif
        </div>
    </form>
</section>


<!-- <section>
    <header>
        <h2 class="text-lg font-medium text-dark">
            {{ __('Informations du profil') }}
        </h2>

        <p class="mt-1 text-sm text-secondary">
            {{ __("Mettez à jour les informations de votre compte et votre adresse e-mail.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <label for="name" class="form-label">{{ __('Nom') }}</label>
            <input id="name" name="name" type="text" class="form-control" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
            @error('name')
                <div class="mt-2 text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div>
            <label for="email" class="form-label">{{ __('E-mail') }}</label>
            <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" required autocomplete="username" />
            @error('email')
                <div class="mt-2 text-danger">
                    {{ $message }}
                </div>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-dark">
                        {{ __('Votre adresse e-mail n\'est pas vérifiée.') }}

                        <button form="send-verification" class="underline text-sm text-secondary hover:text-dark rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                            {{ __('Cliquez ici pour renvoyer l\'e-mail de vérification.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-success">
                            {{ __('Un nouveau lien de vérification a été envoyé à votre adresse e-mail.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="d-flex align-items-center gap-4">
            <button type="submit" class="btn btn-primary">{{ __('Enregistrer') }}</button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-secondary"
                >{{ __('Enregistré.') }}</p>
            @endif
        </div>
    </form>
</section> -->
