@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-semibold mb-4">Create New Post</h1>

    @if($errors->any())
        <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" id="title" class="mt-1 block w-full rounded border-gray-300 shadow-sm" value="{{ old('title') }}" required>
        </div>

        <div>
            <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
            <input type="text" name="slug" id="slug" class="mt-1 block w-full rounded border-gray-300 shadow-sm" value="{{ old('slug') }}" required>
        </div>

        <div>
            <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
            <textarea name="content" id="content" class="mt-1 block w-full rounded border-gray-300 shadow-sm" rows="10" required>{{ old('content') }}</textarea>
        </div>

        <div>
            <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
            <input type="file" name="image" id="image" class="mt-1 block w-full">
        </div>

        <div>
            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
            <select name="status" id="status" class="mt-1 block w-full rounded border-gray-300 shadow-sm" required>
                <option value="">Select Status</option>
                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                <option value="archived" {{ old('status') == 'archived' ? 'selected' : '' }}>Archived</option>
                <option value="deleted" {{ old('status') == 'deleted' ? 'selected' : '' }}>Deleted</option>
            </select>
        </div>

        <div>
            <label for="author_id" class="block text-sm font-medium text-gray-700">Author</label>
            <select name="author_id" id="author_id" class="mt-1 block w-full rounded border-gray-300 shadow-sm" required>
                <option value="">Select Author</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ old('author_id') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex items-center gap-3">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Create Post</button>
            <a href="{{ route('posts.index') }}" class="px-4 py-2 bg-gray-300 rounded text-gray-800">Cancel</a>
        </div>
    </form>
</div>
@endsection
