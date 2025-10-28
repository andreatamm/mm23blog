@extends('partials.layout')
@section('title', 'Dashboard page')
@section('content')
    <div class="card bg-base-300">
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->

                <fieldset class="fieldset">
                    <legend class="fieldset-legend">{{ __('Email') }}</legend>
                    <input value="{{ old('email') }}" name="email" type="email" required autofocus autocomplete="username"
                        class="input w-full @error('email') input-error @enderror" placeholder="Email" />
                    @error('email')
                        <p class="label text-error">{{ $message }}</p>
                    @enderror
                </fieldset>

                <!-- Password -->

                <fieldset class="fieldset">
                    <legend class="fieldset-legend">{{ __('Password') }}</legend>
                    <input value="{{ old('password') }}" name="password" type="password" required
                        autocomplete="current-password" class="input w-full @error('password') input-error @enderror"
                        placeholder="Password" />
                    @error('password')
                        <p class="label text-error">{{ $message }}</p>
                    @enderror
                </fieldset>

                <!-- Remember Me -->
                <label class="label">
                    <input name="remember" type="checkbox" checked="checked" class="toggle" />
                    {{ __('Remember me') }}
                </label>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <button class="btn btn-primary ms-3">
                        {{ __('Log in') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
