@extends('admin.layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10">
    <h1 class="text-2xl font-bold mb-6">Edit Tag</h1>

    <form method="POST" action="{{ route('admin.tags.update', $tag) }}" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="label">
                <span class="label-text">Tag name</span>
            </label>
            <input type="text" name="name" value="{{ old('name', $tag->name) }}" class="input input-bordered w-full" required>
            @error('name') <p class="text-error text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="flex justify-end space-x-2">
            <a href="{{ route('admin.tags.index') }}" class="btn btn-ghost">Cancel</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection
