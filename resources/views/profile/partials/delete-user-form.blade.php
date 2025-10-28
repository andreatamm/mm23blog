<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-base-content">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-base-content">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <button class="btn btn-error" onclick="delete_user.showModal()">{{ __('Delete Account') }}</button>

    <dialog name="confirm-user-deletion" id="delete_user" class="modal">
        <div class="modal-box">
        <form id="delete_user_form" method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-base-content">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-base-content">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <fieldset class="fieldset">
                <legend class="fieldset-legend">{{ __('Password') }}</legend>
                <input value="{{ old('password') }}" name="password" type="password" required
                    autocomplete="current-password" class="input w-full @error('password') input-error @enderror"
                    placeholder="Password" />
                @error('password')
                    <p class="label text-error">{{ $message }}</p>
                @enderror
            </fieldset>


        </form>
            <div class="modal-action">
                <form method="dialog">
                    <button class="btn btn-secondary">
                        {{ __('Cancel') }}
                    </button>
                </form>
                <button type="submit" form="delete_user_form" class="btn btn-error" class="ms-3">
                    {{ __('Delete Account') }}
                </button>
            </div>
        </div>
    </dialog>
</section>
