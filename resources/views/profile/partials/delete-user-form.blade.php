<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-dark">
            {{ __('Supprimer le compte') }}
        </h2>

        <p class="mt-1 text-sm text-secondary">
            {{ __("Une fois votre compte supprimé, toutes ses ressources et données seront définitivement effacées. Avant de supprimer votre compte, veuillez télécharger toutes les données ou informations que vous souhaitez conserver.") }}
        </p>
    </header>

    <button class="btn btn-danger"
        data-bs-toggle="modal"
        data-bs-target="#confirmUserDeletionModal"
    >{{ __('Supprimer le compte') }}</button>

    <div class="modal fade" id="confirmUserDeletionModal" tabindex="-1" aria-labelledby="confirmUserDeletionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                    @csrf
                    @method('delete')

                    <h2 class="text-lg font-medium text-dark">
                        {{ __('Êtes-vous sûr de vouloir supprimer votre compte ?') }}
                    </h2>

                    <p class="mt-1 text-sm text-secondary">
                        {{ __("Une fois votre compte supprimé, toutes ses ressources et données seront définitivement effacées. Veuillez entrer votre mot de passe pour confirmer que vous souhaitez supprimer définitivement votre compte.") }}
                    </p>

                    <div class="mt-6">
                        <label for="password" class="sr-only">{{ __('Mot de passe') }}</label>
                        <input
                            id="password"
                            name="password"
                            type="password"
                            class="form-control"
                            placeholder="{{ __('Mot de passe') }}"
                        />

                        @error('password')
                            <div class="mt-2 text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mt-6 d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            {{ __('Annuler') }}
                        </button>

                        <button type="submit" class="btn btn-danger ml-3">
                            {{ __('Supprimer le compte') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
