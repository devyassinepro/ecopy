<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\BlogPost;

class BlogPostForm extends Component
{
    public $postId;
    public $title;
    public $content;
    public $author;
    public $published_at;

    public function mount($postId = null)
    {
        if ($postId) {
            $post = BlogPost::findOrFail($postId);
            $this->postId = $post->id;
            $this->title = $post->title;
            $this->content = $post->content;
            $this->author = $post->author;
            $this->published_at = $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : null;
        }
    }

    public function save()
    {
        $validatedData = $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'nullable|string|max:255',
            'published_at' => 'nullable|date',
        ]);

        if ($this->postId) {
            $post = BlogPost::findOrFail($this->postId);
            $post->update($validatedData);
        } else {
            BlogPost::create($validatedData);
        }

        session()->flash('message', $this->postId ? 'Post updated successfully.' : 'Post created successfully.');
        return redirect()->route('admin.blog.index');
    }

    public function render()
    {
        return view('livewire.admin.blog-post-form');
    }
}
