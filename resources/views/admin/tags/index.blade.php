@extends('admin.layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Tags</h1>
        <a href="{{ route('admin.tags.create') }}" class="btn btn-primary btn-sm">+ New Tag</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success mb-4">{{ session('success') }}</div>
    @endif

    <div class="overflow-x-auto">
        <table class="table table-zebra w-full">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tags as $tag)
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td>{{ $tag->name }}</td>
                        <td>{{ $tag->slug }}</td>
                        <td class="space-x-2">
                            <a href="{{ route('admin.tags.edit', $tag) }}" class="btn btn-xs">Edit</a>
                            <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-xs btn-error" onclick="return confirm('Delete tag?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center text-gray-500">No tags yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $tags->links('pagination::daisyui') }}
    </div>
</div>
@endsection
