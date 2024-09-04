<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\BlogPost;
class BlogPostIndex extends Component
{
    public $posts;

    public function mount()
    {
        $this->posts = BlogPost::latest()->get();
    }

    public function delete($id)
    {
        BlogPost::findOrFail($id)->delete();
        session()->flash('message', 'Blog post deleted successfully.');
        $this->posts = BlogPost::latest()->get();
    }

    public function render()
    {
        return view('livewire.admin.blog-post-index');
    }
}
