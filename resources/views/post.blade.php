@extends('partials.layout')
@section('title', 'Home page')
@section('content')
    <div class="card bg-base-300 shadow-sm">
        @if ($post->images->count() === 1)
            <figure>
                <img src="{{ $post->images->first()->url }}" />
            </figure>
        @elseif($post->images->count() > 1)
            <div class="carousel rounded-box">
                @foreach ($post->images as $image)
                    <div class="carousel-item w-full">
                        <img src="{{ $image->url }}" />
                    </div>
                @endforeach
            </div>
        @endif
        <div class="card-body">
            <h2 class="card-title">{{ $post->title }}</h2>
            <p>{!! $post->displayBody !!}</p>
            <p class="text-neutral-content">{{ $post->user->name }}</p>
            <p class="text-neutral-content">{{ $post->created_at->diffForHumans() }}</p>
            <div class="card-actions justify-end">

            </div>
        </div>
    </div>
    @foreach($post->comments()->latest()->get() as $comment)
        <div class="card bg-base-300 shadow-sm mt-3">
            <div class="card-body">
                <p>{{ $comment->body }}</p>
                <p class="text-neutral-content">{{ $comment->user->name }}</p>
                <p class="text-neutral-content">{{ $comment->created_at->diffForHumans() }}</p>
            </div>
        </div>
    @endforeach
@endsection
