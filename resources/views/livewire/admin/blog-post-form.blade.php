<div>
    <h1 class="text-2xl font-bold mb-4">{{ $postId ? 'Edit' : 'Create' }} Blog Post</h1>

    <form wire:submit.prevent="save">
        <div class="mb-4">
            <label class="block text-gray-700">Title</label>
            <input type="text" wire:model="title" class="w-full border rounded px-3 py-2" required>
            @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Content</label>
            <textarea wire:model="content" class="w-full border rounded px-3 py-2" rows="10" required></textarea>
            @error('content') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Author</label>
            <input type="text" wire:model="author" class="w-full border rounded px-3 py-2">
            @error('author') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Published At</label>
            <input type="datetime-local" wire:model="published_at" class="w-full border rounded px-3 py-2">
            @error('published_at') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
            {{ $postId ? 'Update' : 'Create' }} Post
        </button>
    </form>
</div>
