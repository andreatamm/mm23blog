@extends('partials.layout')
@section('title', 'Dashboard page')
@section('content')
    <div class="card bg-base-300">
        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">{{ __('Name') }}</legend>
                    <input value="{{ old('name') }}" name="name" type="text" required autofocus autocomplete="name"
                        class="input w-full @error('name') input-error @enderror" placeholder="Name" />
                    @error('name')
                        <p class="label text-error">{{ $message }}</p>
                    @enderror
                </fieldset>


                <!-- Email Address -->

                <fieldset class="fieldset">
                    <legend class="fieldset-legend">{{ __('Email') }}</legend>
                    <input value="{{ old('email') }}" name="email" type="email" required autocomplete="username"
                        class="input w-full @error('email') input-error @enderror" placeholder="Email" />
                    @error('email')
                        <p class="label text-error">{{ $message }}</p>
                    @enderror
                </fieldset>

                <!-- Password -->

                <fieldset class="fieldset">
                    <legend class="fieldset-legend">{{ __('Password') }}</legend>
                    <input value="{{ old('password') }}" name="password" type="password" required
                        autocomplete="new-password" class="input w-full @error('password') input-error @enderror"
                        placeholder="Password" />
                    @error('password')
                        <p class="label text-error">{{ $message }}</p>
                    @enderror
                </fieldset>


                <!-- Confirm Password -->
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">{{ __('Confirm Password') }}</legend>
                    <input value="{{ old('password_confirmation') }}" name="password_confirmation" type="password" required
                        autocomplete="new-password" class="input w-full @error('password_confirmation') input-error @enderror"
                        placeholder="Confirm Password" />
                    @error('password_confirmation')
                        <p class="label text-error">{{ $message }}</p>
                    @enderror
                </fieldset>

                <div class="flex items-center justify-end mt-4">
                    <a class="btn btn-link" href="{{ route('login') }}">{{ __('Already registered?') }}</a>

                    <button class="btn btn-primary ms-4">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
