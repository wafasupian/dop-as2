<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        // Dashboard summary widgets (dynamic)
        $totalPosts = Post::count();
        $totalCategories = Category::count();

        $latestPost = Post::latest()->first();
        $latestPostTitle = $latestPost?->title; // safe if no posts yet

        return view('dashboard', compact(
            'totalPosts',
            'totalCategories',
            'latestPostTitle'
        ));
    }
}