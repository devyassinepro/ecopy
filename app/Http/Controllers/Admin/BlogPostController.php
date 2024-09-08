<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Support\Facades\Storage;
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

//     public function store(Request $request)
// {
//     // Validate incoming request
//     $validatedData = $request->validate([
//         'title' => 'required|string|max:255',
//         'content' => 'required|string', // Content with TinyMCE rich text editor
//         'author' => 'nullable|string|max:255',
//         'published_at' => 'nullable|date',
//         'feature_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate feature image
//     ]);

//     // Handle feature image upload if present
//     if ($request->hasFile('feature_image')) {
//         $path = $request->file('feature_image')->store('feature_images', 'public'); // Store in public disk
//         $validatedData['feature_image'] = $path; // Store the path in the database
//     }

//     // Create a new blog post with the validated data
//     BlogPost::create($validatedData);

//     return redirect()->route('admin.blog.index')->with('message', 'Post created successfully.');
// }


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

    public function upload(Request $request)
    {
            // Validate the request
            $request->validate([
                'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Check if the file exists and store it
            if ($request->hasFile('file')) {
                $path = $request->file('file')->store('content_images', 'public');

                // Return the URL in the correct format for TinyMCE
                return response()->json(['location' => Storage::url($path)]);
            }

            // Return error response if something went wrong
            return response()->json(['error' => 'Image upload failed'], 400);
    }
    


}
