<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function show($id)
    {
        $category = Category::findOrFail($id);
        $posts = $category->posts()->latest()->get();

        return view('categories.show', compact('category', 'posts'));
    }
}