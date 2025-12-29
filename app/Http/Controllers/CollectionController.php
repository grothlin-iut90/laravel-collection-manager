<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collections = auth()->user()->collections()->with(['items' => function($query) {
            $query->limit(5);
        }])->withCount('items')->get();
        return view('collections.index', compact('collections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('collections.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        auth()->user()->collections()->create($request->only(['name', 'description']));

        return redirect()->route('collections.index')->with('success', 'Collection created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Collection $collection)
    {
        $this->authorize('view', $collection);
        $items = $collection->items()->with('category')->get();
        $editing = request('edit', false);
        return view('collections.show', compact('collection', 'items', 'editing'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Collection $collection)
    {
        $this->authorize('update', $collection);
        return view('collections.edit', compact('collection'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Collection $collection)
    {
        $this->authorize('update', $collection);
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $collection->update($request->only(['name', 'description']));

        return redirect()->route('collections.show', $collection)->with('success', 'Collection updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Collection $collection)
    {
        $this->authorize('delete', $collection);
        $collection->delete();
        return redirect()->route('collections.index')->with('success', 'Collection deleted successfully.');
    }

    public function addItem(Request $request, Collection $collection)
    {
        $this->authorize('update', $collection);
        $request->validate([
            'item_id' => 'required|exists:items,id',
        ]);

        $collection->items()->attach($request->item_id);

        return back()->with('success', 'Item added to collection.');
    }

    public function removeItem(Collection $collection, $itemId)
    {
        $this->authorize('update', $collection);
        $collection->items()->detach($itemId);
        return back()->with('success', 'Item removed from collection.');
    }

    public function editTitle(Request $request, Collection $collection)
    {
        $this->authorize('update', $collection);
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $collection->update(['name' => $request->name]);

        return back()->with('success', 'Collection title updated successfully.');
    }

    public function editDescription(Request $request, Collection $collection)
    {
        $this->authorize('update', $collection);
        $request->validate([
            'description' => 'nullable|string',
        ]);

        $collection->update(['description' => $request->description]);

        return back()->with('success', 'Collection description updated successfully.');
    }
}
