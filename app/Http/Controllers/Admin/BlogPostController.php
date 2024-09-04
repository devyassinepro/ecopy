<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function index()
    {
        $posts = BlogPost::latest()->get();
        return view('admin.blog.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'nullable|string|max:255',
            'published_at' => 'nullable|date',
            'feature_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('feature_image')) {
            $path = $request->file('feature_image')->store('feature_images', 'public');
            $validatedData['feature_image'] = $path;
        }

        BlogPost::create($validatedData);

        return redirect()->route('admin.blog.index')->with('message', 'Post created successfully.');
    }

    public function edit(BlogPost $post)
    {
        return view('admin.blog.edit', compact('post'));
    }

    public function update(Request $request, BlogPost $post)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'nullable|string|max:255',
            'published_at' => 'nullable|date',
            'feature_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('feature_image')) {
            // Delete the old image
            if ($post->feature_image) {
                Storage::disk('public')->delete($post->feature_image);
            }

            $path = $request->file('feature_image')->store('feature_images', 'public');
            $validatedData['feature_image'] = $path;
        }

        $post->update($validatedData);

        return redirect()->route('admin.blog.index')->with('message', 'Post updated successfully.');
    }

    public function destroy(BlogPost $post)
    {
        $post->delete();

        return redirect()->route('admin.blog.index')->with('message', 'Post deleted successfully.');
    }
}
