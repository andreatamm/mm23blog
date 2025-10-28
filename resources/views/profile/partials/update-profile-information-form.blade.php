<section>
    <header>
        <h2 class="text-lg font-medium text-base-content">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-base-content">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <fieldset class="fieldset">
            <legend class="fieldset-legend">{{ __('Name') }}</legend>
            <input value="{{ old('name', $user->name) }}" name="name" type="text" required autofocus
                autocomplete="name" class="input w-full @error('name') input-error @enderror" placeholder="Name" />
            @error('name')
                <p class="label text-error">{{ $message }}</p>
            @enderror
        </fieldset>


        <div>
            <fieldset class="fieldset">
                <legend class="fieldset-legend">{{ __('Email') }}</legend>
                <input value="{{ old('email', $user->email) }}" name="email" type="email" required autocomplete="username"
                    class="input w-full @error('email') input-error @enderror" placeholder="Email" />
                @error('email')
                    <p class="label text-error">{{ $message }}</p>
                @enderror
            </fieldset>

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-base-content">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="btn btn-link">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-success">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button class="btn btn-primary">{{ __('Save') }}</button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-base-content">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
