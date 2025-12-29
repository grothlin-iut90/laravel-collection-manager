<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\User;
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
        $providers = [];

        if (Auth::user()->role === 'admin') {
            $providers = User::where('role', 'provider')->get();
        }

        return view('items.create', compact('categories', 'providers'));
    }

    public function store(Request $request)
    {
        $rules =[
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'condition' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'user_id' => 'required|exists:users,id',
        ];

        // Si un admin cree l'item, il doit specifier le provider
        if (Auth::user()->role === 'admin') {
            $rules['provider_id'] = 'required|exists:users,id';
        }

        $validated = $request->validate($rules);

        $item = new Item($validated);

        // Si un admin cree l'item, il choisit le provider
        if (Auth::user()->role === 'admin') {
            $item->provider_id = $request->input('provider_id');
        }
        // Sinon, le provider est l'utilisateur connecte
        else {
            $item->provider_id = Auth::id();
        }

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
        if (Auth::user()->role !== 'admin' && Auth::id() !== $item->provider_id) {
            abort(403, 'Unauthorized action.');
        }

        $categories = Category::all();
        $providers = [];

        if (Auth::user()->role === 'admin') {
            $providers = User::where('role', 'provider')->get();
        }

        return view('items.edit', compact('item', 'categories', 'providers'));
    }

    public function update(Request $request, Item $item)
    {
        if (Auth::user()->role !== 'admin' && Auth::id() !== $item->provider_id) {
            abort(403, 'Unauthorized action.');
        }

        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'condition' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ];

        if (Auth::user()->role === 'admin') {
            $rules['provider_id'] = 'required|exists:users,id';
        }

        $validated = $request->validate($rules);

        $item->update($validated);

        return redirect()->route('dashboard')->with('success', 'Item updated successfully.');
    }

    public function destroy(Item $item)
{
    if (Auth::user()->role !== 'admin' && Auth::id() !== $item->provider_id) {
        abort(403, 'Unauthorized action.');
    }

    $previousUrl = url()->previous();
    $itemShowUrl = route('items.show', $item);

    $item->delete();

    if ($previousUrl === $itemShowUrl) {
        return redirect()->route('dashboard')->with('success', 'Item deleted successfully.');
    }

    return back()->with('success', 'Item deleted successfully.');
}
}
