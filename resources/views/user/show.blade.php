@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto mt-10">

    <div class="text-center mb-10">
        <h1 class="text-3xl font-bold">{{ $user->name }}</h1>
        <p class="text-gray-500">Posts by this user</p>
    </div>

    @if ($posts->count())
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($posts as $post)
                <div class="card bg-base-100 shadow-md hover:shadow-lg transition">
                    @if ($post->image)
                        <figure>
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                        </figure>
                    @endif
                    <div class="card-body">
                        <h2 class="card-title">
                            <a href="{{ route('posts.show', $post) }}" class="hover:underline">{{ $post->title }}</a>
                        </h2>
                        <p class="text-sm text-gray-500">
                            {{ Str::limit(strip_tags($post->excerpt ?? $post->content), 100) }}
                        </p>
                        <div class="card-actions justify-between items-center mt-4">
                            <a href="{{ route('posts.show', $post) }}" class="btn btn-sm btn-primary">Read</a>
                            <span class="text-xs text-gray-400">
                                {{ $post->created_at->format('M d, Y') }}
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-10">
            {{ $posts->links('pagination::daisyui') }}
        </div>
    @else
        <div class="text-center text-gray-500 mt-10">
            This user hasn’t posted anything yet.
        </div>
    @endif
</div>
@endsection
