@extends('partials.layout')
@section('title', 'Dashboard page')
@section('content')

    <h2 class="font-semibold text-xl text-base-content leading-tight">
        {{ __('Profile') }}
    </h2>


    <div class="py-12 flex flex-col gap-3">
        <div class="card bg-base-300">
            <div class="card-body">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="card bg-base-300">
            <div class="card-body">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="card bg-base-300">
            <div class="card-body">
                @include('profile.partials.delete-user-form')
            </div>
        </div>

    </div>
@endsection
