<?php

namespace App\Livewire;

use Livewire\Component;

class BlogIndex extends Component
{
    public $posts;

    public function mount()
    {
        $this->posts = BlogPost::latest()->get();
    }

    public function render()
    {
        return view('livewire.blog-index');
    }
}
