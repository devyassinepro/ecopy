<div>
    <h1 class="text-2xl font-bold mb-4">Manage Blog Posts</h1>

    @if (session()->has('message'))
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">
            {{ session('message') }}
        </div>
    @endif

    <a href="{{ route('admin.blog.create') }}" class="mb-4 inline-block bg-blue-500 text-white px-4 py-2 rounded">
        Create New Post
    </a>

    <table class="min-w-full bg-white border">
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
                    <td class="py-2 px-4 border-b">{{ $post->title }}</td>
                    <td class="py-2 px-4 border-b">{{ $post->author }}</td>
                    <td class="py-2 px-4 border-b">{{ $post->published_at ? $post->published_at->format('F j, Y') : 'Not Published' }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('blog.edit', $post->id) }}" class="text-blue-500">Edit</a> |
                        <button wire:click="delete({{ $post->id }})" class="text-red-500">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
