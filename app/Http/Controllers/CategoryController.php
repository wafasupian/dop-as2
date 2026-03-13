<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Public category page
    public function show($id)
    {
        $category = Category::findOrFail($id);
        $posts = $category->posts()->latest()->get();

        return view('categories.show', compact('category', 'posts'));
    }

    // Dashboard list
    public function index()
    {
        $categories = Category::withCount('posts')->latest()->get();

        return view('categories.index', compact('categories'));
    }

    // Dashboard create form
    public function create()
    {
        return view('categories.create');
    }

    // Store new category
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:categories,name'],
        ]);

        Category::create($validated);

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    // Dashboard edit form
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // Update category
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:categories,name,' . $category->id],
        ]);

        $category->update($validated);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    // Delete category safely
    public function destroy(Category $category)
    {
        $uncategorized = Category::firstOrCreate(
            ['name' => 'Uncategorized']
        );

        if ($category->id === $uncategorized->id) {
            return redirect()->route('categories.index')->with('error', 'Uncategorized cannot be deleted.');
        }

        Post::where('category_id', $category->id)->update([
            'category_id' => $uncategorized->id
        ]);

        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}