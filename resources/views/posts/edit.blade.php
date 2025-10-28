@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-10">
    <div class="card bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title">Profile Settings</h2>

            {{-- Success message --}}
            @if (session('status') === 'profile-updated')
                <div class="alert alert-success my-4">
                    Profile updated successfully.
                </div>
            @endif

            <form method="POST" action="{{ route('profile.update') }}" class="space-y-4">
                @csrf
                @method('PATCH')

                <div>
                    <label class="label">
                        <span class="label-text">Name</span>
                    </label>
                    <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}" class="input input-bordered w-full" required>
                    @error('name')
                        <p class="text-error text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="label">
                        <span class="label-text">Email</span>
                    </label>
                    <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}" class="input input-bordered w-full" required>
                    @error('email')
                        <p class="text-error text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end space-x-2">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <a href="{{ route('dashboard') }}" class="btn btn-ghost">Cancel</a>
                </div>
            </form>

            <div class="divider"></div>

            <form method="POST" action="{{ route('profile.destroy') }}" onsubmit="return confirm('Are you sure you want to delete your account?');">
                @csrf
                @method('DELETE')
                <button class="btn btn-error btn-outline w-full">Delete Account</button>
            </form>
        </div>
    </div>
</div>
@endsection
