<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }
    public function create()
    {
        return view('categories.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:categories',
            'description' => 'required|string|max:255',
        ]);
        Category::create($validatedData);
        return redirect()->route('categories.index')->with('success', 'Category created successfully!');
    }
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }
    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'description' => 'required|string|max:255',
        ]);
        $category->update($validatedData);
        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
    }
}
