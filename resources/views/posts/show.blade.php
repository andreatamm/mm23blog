@extends('admin.layouts.app') {{-- või mis iganes layout sul on --}}

@section('content')
<div class="container mx-auto py-8">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-bold">Vaata postitust: {{ $post->title }}</h1>
        <div class="space-x-2">
            <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-sm">Muuda</a>
            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger" onclick="return confirm('Kustutada?')">Kustuta</button>
            </form>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-sm">Tagasi</a>
        </div>
    </div>

    <div class="card p-6">
        <p class="text-gray-600 mb-2">Autor: {{ $post->author?->name ?? '—' }}</p>
        <p class="text-gray-600 mb-2">Loodud: {{ $post->created_at->format('d.m.Y H:i') }}</p>
        <hr class="my-4">
        <div class="prose">
            {!! $post->content !!} {{-- kui HTML on lubatud; muidu kasutage {{ $post->content }} --}}
        </div>
    </div>
</div>
@endsection
