@extends('layouts.admin')

@section('title', '| Create New Blog Post')

@section('content')
<div class="container-fluid">
  <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-12 pt-3 px-4">

        <h1 class="text-2xl font-bold mb-4">Edit Blog Post</h1>
        <form action="{{ route('admin.blog.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700">Title</label>
            <input type="text" name="title" value="{{ old('title', $post->title) }}" class="w-full border rounded px-3 py-2" required>
            @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Content</label>
            <textarea name="content" class="w-full border rounded px-3 py-2" rows="10" required>{{ old('content', $post->content) }}</textarea>
            @error('content') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Author</label>
            <input type="text" name="author" value="{{ old('author', $post->author) }}" class="w-full border rounded px-3 py-2">
            @error('author') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        
        <div class="mb-4">
            <label class="block text-gray-700">Feature Image</label>
            <input type="file" name="feature_image" class="w-full border rounded px-3 py-2">
            @if ($post->feature_image)
                <img src="{{ asset('storage/' . $post->feature_image) }}" alt="Feature Image" class="mt-2 h-48">
            @endif
            @error('feature_image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Published At</label>
            <input type="datetime-local" name="published_at" value="{{ old('published_at', $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : '') }}" class="w-full border rounded px-3 py-2">
            @error('published_at') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Post</button>
    </form>
          </div>
          <div>
        </div>
        </main>
      </div>
    </div>
    @endsection