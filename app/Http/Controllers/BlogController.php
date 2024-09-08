<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;

class BlogController extends Controller
{
    //

    public function index()
    {
        $posts = BlogPost::whereNotNull('published_at')->orderBy('published_at', 'desc')->paginate(10);
        return view('blog.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = BlogPost::where('slug', $slug)->whereNotNull('published_at')->firstOrFail();
         // Set dynamic title and meta description
         $pageTitle = $post->title . ' | Ecopy';
         $pageDescription = substr(strip_tags($post->content), 0, 160); // Get the first 160 characters for the meta description
 
        // return view('blog.show', compact('post'));

        return view('blog.show', [
            'post' => $post,
            'pageTitle' => $pageTitle,
            'pageDescription' => $pageDescription,
        ]);
    }
}
