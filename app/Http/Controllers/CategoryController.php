<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
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
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        Category::create([
            'name' => $request->name,
            'description' => $request->description,

        ]);

        return redirect()->route('categories.index')->with('success', 'categories created successfully.');
    }

    public function show(Category $category)
    {
        return view('categories.show', compact('categories'));
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',

        ]);

        $category->update([
            'name' => $request->name,
            'description' => $request->description,

        ]);

        return redirect()->route('categories.index')->with('success', 'categories updated successfully.');
    }

    public function destroy(Category $category)
    {

        $category->delete();

        return redirect()->route('categories.index')->with('success', 'categories deleted successfully.');
    }
}
