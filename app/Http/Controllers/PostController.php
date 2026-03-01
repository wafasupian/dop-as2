<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // ✅ PUBLIC VIEW (keep this)
    public function show(Post $post)
    {
        return view('post', compact('post'));
    }

    // =========================
    // 🔐 ADMIN CRUD (Progress Check #3)
    // =========================

    // List posts
    public function index()
    {
        $posts = Post::with('category')->latest()->get();
        return view('posts.index', compact('posts'));
    }

    // Show create form
    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    // Store new post
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255', // ⭐ custom field
            'text' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        Post::create($data);

        return redirect()->route('posts.index')
            ->with('success', 'Post created successfully.');
    }

    // Show edit form
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    // Update post
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'text' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $post->update($data);

        return redirect()->route('posts.index')
            ->with('success', 'Post updated successfully.');
    }

    // Delete post
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully.');
    }
}