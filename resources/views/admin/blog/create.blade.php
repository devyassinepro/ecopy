@extends('layouts.admin')

@section('title', '| Create New Blog Post')

@section('content')
<div class="container-fluid">
  <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-12 pt-3 px-4">

          <h2>Create New Blog Post</h2>
          @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif

        
        <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700">Title</label>
            <input type="text" name="title" class="w-full border rounded px-3 py-2" required>
            @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Content</label>
            <textarea name="content" class="w-full border rounded px-3 py-2" rows="10" required></textarea>
            <!-- <textarea name="content" class="w-full border rounded px-3 py-2" id="content" rows="10" required></textarea> -->

            @error('content') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Author</label>
            <input type="text" name="author" class="w-full border rounded px-3 py-2">
            @error('author') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Feature Image</label>
            <input type="file" name="feature_image" class="w-full border rounded px-3 py-2">
            @error('feature_image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Published At</label>
            <input type="datetime-local" name="published_at" class="w-full border rounded px-3 py-2">
            @error('published_at') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create Post</button>
         </form>
          </div>
          <div>
        </div>
        </main>
      </div>
    </div>

    @endsection