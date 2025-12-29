<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        if(Auth::user()->role !== 'admin') {
            return redirect()->route('categories.index')->with('error', 'Unauthorized action.');
        }
        
        $categories = Category::all()->loadCount('items');

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        if(Auth::user()->role !== 'admin') {
            return redirect()->route('categories.index')->with('error', 'Unauthorized action.');
        }

        return view('categories.create');
    }

    public function store(Request $request)
    {
        if(Auth::user()->role !== 'admin') {
            return redirect()->route('categories.index')->with('error', 'Unauthorized action.');
        }

        $request->validate(['label' => 'required|string|max:255|unique:categories']);
        Category::create($request->all() + ['provider_id' => auth()->id()]);
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function show(Category $category)
    {
        if(Auth::user()->role !== 'admin') {
            return redirect()->route('categories.index')->with('error', 'Unauthorized action.');
        }

        $items = $category->items;

        return view('categories.show', compact('category', 'items'));
    }

    public function edit(Category $category)
    {
        if(Auth::user()->role !== 'admin') {
            return redirect()->route('categories.index')->with('error', 'Unauthorized action.');
        }

        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        if(Auth::user()->role !== 'admin') {
            return redirect()->route('categories.index')->with('error', 'Unauthorized action.');
        }

        $request->validate(['label' => 'required|string|max:255|unique:categories,label,' . $category->id]);
        $category->update($request->all());
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        if(Auth::user()->role !== 'admin') {
            return redirect()->route('categories.index')->with('error', 'Unauthorized action.');
        }

        if ($category->items()->exists()) {
            return redirect()->route('categories.index')->with('error', 'Cannot delete category with items.');
        }
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
