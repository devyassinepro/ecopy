@extends('layouts.admin')

@section('title', '| BlogAdmin')

@section('content')
<div class="container-fluid">
  <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-12 pt-3 px-4">

          <h2>List Articles</h2>
          <a class="btn btn-success" href="{{ route('admin.blog.create') }}">Add Article</a>

          <!-- <a class="btn btn-success" href="/exportstores">Export Stores</a> -->

        </br></br>
          @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="table-responsive">
        <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Title</th>
                        <th class="py-2 px-4 border-b">Author</th>
                        <th class="py-2 px-4 border-b">Published At</th>
                        <th class="py-2 px-4 border-b">Actions</th>
                    </tr>
                </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                @if ($post->feature_image)
                    <td class="py-2 px-4 border-b">
                    <img src="{{ asset('storage/' . $post->feature_image) }}" alt="Feature Image" width="200" class="h-16 w-16 mr-4 object-cover">
                    </td>
                 @endif
                    <td class="py-2 px-4 border-b">{{ $post->title }}</td>
                    <td class="py-2 px-4 border-b">{{ $post->author }}</td>
                    <td class="py-2 px-4 border-b">{{ $post->published_at ? $post->published_at->format('F j, Y') : 'Not Published' }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('admin.blog.edit', $post->id) }}" class="text-blue-500">Edit</a> |
                        <form action="{{ route('admin.blog.destroy', $post->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
            </table>
          </div>

          <div>

        </div>
        </main>
        
      </div>
    </div>
    @endsection