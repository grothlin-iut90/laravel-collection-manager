<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function index()
    {
        $items = Auth::user()->items()->with('category')->get();
        return view('items.index', compact('items'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'condition' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $item = new Item($validated);
        $item->provider_id = Auth::id();
        $item->save();

        return redirect()->route('dashboard')->with('success', 'Item created successfully.');
    }

    public function show(Item $item)
    {
        $this->authorize('view', $item);
        return view('items.show', compact('item'));
    }

    public function edit(Item $item)
    {
        if (Auth::id() !== $item->provider_id) {
            abort(403, 'Unauthorized action.');
        }

        $categories = Category::all();
        return view('items.edit', compact('item', 'categories'));
    }

    public function update(Request $request, Item $item)
    {
        if (Auth::id() !== $item->provider_id) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'condition' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        $item->update($validated);

        return redirect()->route('dashboard')->with('success', 'Item updated successfully.');
    }

    public function destroy(Item $item)
    {
        if (Auth::id() !== $item->provider_id) {
            abort(403);
        }

        $item->delete();

        return redirect()->route('dashboard')->with('success', 'Item deleted successfully.');
    }
}
