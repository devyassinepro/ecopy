<?php

namespace App\Livewire;
use App\Models\BlogPost;
use App\Models\Plan;

use Livewire\Component;

class BlogPostHome extends Component
{
    public $post;

    public function mount($postId)
    {
        $this->post = BlogPost::findOrFail($postId);
    }

    public function render()
    {
        return view('livewire.blog-post');
    }
}
