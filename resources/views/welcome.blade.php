@extends('partials.layout')
@section('title', 'Dashboard page')
@section('content')
    {{ $posts->links() }}
    <div class="grid grid-cols-4 gap-2">
        @foreach ($posts as $post)
            <div class="card bg-base-300 shadow-sm">

                @if ($post->images->count() === 1)
                    <figure>
                        <img src="{{ $post->images->first()->url }}" />
                    </figure>
                @elseif($post->images->count() > 1)
                    <div class="carousel rounded-box">
                        @foreach($post->images as $image)
                            <div class="carousel-item w-full">
                                <img src="{{ $image->url }}"/>
                            </div>
                        @endforeach
                    </div>
                @endif

                <div class="card-body">
                    <h2 class="card-title">{{ $post->title }}</h2>
                    <p>{{ $post->snippet }}</p>
                    <p class="text-neutral-content">{{ $post->user->name }}</p>
                    <p class="text-neutral-content">{{ $post->created_at->diffForHumans() }}</p>
                    <p class="text-neutral-content"><b>Comments:</b> {{ $post->comments_count }}</p>
                    <p class="text-neutral-content"><b>Likes:</b> {{ $post->likes_count }}</p>
                    <div class="text-neutral-content flex gap-3">
                        <b>Category:</b>
                        <a href="{{route('category', ['category' => $post->category])}}">
                            <div class="badge badge-info">{{$post->category->name}}</div>
                        </a>
                    </div>
                    <div class="flex flex-wrap gap-1">
                        @foreach($post->tags as $tag)
                            <a href="{{route('tag', ['tag' => $tag])}}">
                                <div class="badge badge-primary">{{$tag->name}}</div>
                            </a>
                        @endforeach
                    </div>
                    <div class="card-actions justify-end">
                        <form action="{{route('post.like', ['post' => $post])}}" method="POST">
                            @csrf
                            @if($post->authHasLiked)
                                <button class="btn btn-error">Unlike</button>
                            @else
                                <button class="btn btn-secondary">Like</button>
                            @endif
                        </form>
                        <a href="{{ route('post', ['post' => $post]) }}" class="btn btn-primary">Read more</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $posts->links() }}
@endsection
