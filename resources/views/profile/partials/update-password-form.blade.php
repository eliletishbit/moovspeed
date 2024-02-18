<section>
    <header>
        <h2 class="text-lg font-medium text-dark">
            {{ __('Modifier le mot de passe') }}
        </h2>

        <p class="mt-1 text-sm text-secondary">
            {{ __('Assurez-vous que votre compte utilise un mot de passe long et aléatoire pour rester sécurisé.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <label for="current_password" class="form-label">{{ __('Mot de passe actuel') }}</label>
            <input id="current_password" name="current_password" type="password" class="form-control" autocomplete="current-password" />
            @error('current_password')
                <div class="mt-2 text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div>
            <label for="password" class="form-label">{{ __('Nouveau mot de passe') }}</label>
            <input id="password" name="password" type="password" class="form-control" autocomplete="new-password" />
            @error('password')
                <div class="mt-2 text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div>
            <label for="password_confirmation" class="form-label">{{ __('Confirmer le mot de passe') }}</label>
            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password" />
            @error('password_confirmation')
                <div class="mt-2 text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="d-flex align-items-center gap-4">
            <button type="submit" class="btn btn-primary">{{ __('Enregistrer') }}</button>

            @if (session('status') === 'password-updated')
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


