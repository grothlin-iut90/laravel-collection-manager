<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Collection;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminCollectionController extends Controller
{
    /**
     * Affiche le formulaire de création pour un utilisateur spécifique.
     */
    public function create(User $user)
    {
        return view('admin.collections.create', compact('user'));
    }

    /**
     * Enregistre la nouvelle collection.
     */
    public function store(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $collection = new Collection();
        $collection->name = $request->name;
        $collection->description = $request->description;
        $collection->user_id = $user->id; // On assigne au user passé en paramètre
        $collection->save();

        // Redirection vers la page d'édition de l'utilisateur
        return redirect()->route('users.edit', $user)->with('success', 'Collection created successfully for ' . $user->name);
    }

    /**
     * Affiche la page de gestion d'une collection (ajout/retrait items).
     */
    public function show(Collection $collection)
    {
        return view('admin.collections.show', compact('collection'));
    }

    /**
     * Ajoute un item existant à la collection via la table pivot.
     */
    public function addItem(Request $request, Collection $collection)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
        ]);

        // La relation 'items' est BelongsToMany, on utilise attach()
        // On vérifie si l'item n'est pas déjà dedans pour éviter les doublons
        if (!$collection->items->contains($request->item_id)) {
            $collection->items()->attach($request->item_id);
            return back()->with('success', 'Item added to collection.');
        }

        return back()->with('warning', 'Item is already in this collection.');
    }

    /**
     * Retire un item de la collection (table pivot).
     */
    public function removeItem(Collection $collection, Item $item)
    {
        $collection->items()->detach($item->id);
        return back()->with('success', 'Item removed from collection.');
    }
}
