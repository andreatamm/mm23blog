<section>
    <header>
        <h2 class="text-lg font-medium text-base-content">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-base-content">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <fieldset class="fieldset">
            <legend class="fieldset-legend">{{ __('Current Password') }}</legend>
            <input value="{{ old('current_password') }}" name="current_password" type="password" required
                autocomplete="current-password" class="input w-full @error('current_password') input-error @enderror"
                placeholder="Current Password" />
            @error('current_password')
                <p class="label text-error">{{ $message }}</p>
            @enderror
        </fieldset>


        <fieldset class="fieldset">
            <legend class="fieldset-legend">{{ __('New Password') }}</legend>
            <input value="{{ old('password') }}" name="password" type="password" required
                autocomplete="new-password" class="input w-full @error('password') input-error @enderror"
                placeholder="New Password" />
            @error('password')
                <p class="label text-error">{{ $message }}</p>
            @enderror
        </fieldset>

        <fieldset class="fieldset">
            <legend class="fieldset-legend">{{ __('Confirm Password') }}</legend>
            <input value="{{ old('password_confirmation') }}" name="password_confirmation" type="password" required
                autocomplete="new-password" class="input w-full @error('password_confirmation') input-error @enderror"
                placeholder="Confirm Password" />
            @error('password_confirmation')
                <p class="label text-error">{{ $message }}</p>
            @enderror
        </fieldset>



        <div class="flex items-center gap-4">
            <button class="btn btn-primary">{{ __('Save') }}</button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-base-content">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
