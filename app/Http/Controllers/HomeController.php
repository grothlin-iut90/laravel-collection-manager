<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\User;
use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // Get total number of items
        $totalItems = Item::count();
        // Get total number of categories
        $totalCategories = Category::count();
        // Get total number of users
        $totalUsers = User::count();

        // Medium number of collections per user
        $totalCollections = Collection::count();
        $totalUsersForCollections = User::has('collections')->count();
        $avgCollectionsPerUser = $totalUsersForCollections ? round($totalCollections / $totalUsersForCollections, 2) : 0;

        // Medium number of items per collection
        $totalItemsInCollections = Collection::withCount('items')->get()->sum('items_count');
        $totalCollectionsWithItems = Collection::has('items')->count();
        $avgItemsPerCollection = $totalCollectionsWithItems ? round($totalItemsInCollections / $totalCollectionsWithItems, 2) : 0;

        // Number of providers
        $totalProviders = User::where('role', 'provider')->count();

        // Number of consumers
        $totalConsumers = User::where('role', 'consumer')->count();

        // Note moyenne globale des items
        $globalRating = round(Item::avg('rating'), 1);

        // Top 3 collectors (consumer avec le plus d'items dans ses collections)
        $topCollectors = User::where('role', 'consumer')
            ->select('users.*') // On sélectionne toutes les infos du user
            ->selectSub(function ($query) {
                $query->from('item_collection') // On cible la table pivot définie dans votre Modèle
                    ->join('collections', 'collections.id', '=', 'item_collection.collection_id')
                    ->whereColumn('collections.user_id', 'users.id')
                    ->selectRaw('COUNT(*)');
            }, 'total_items_in_collections')
            ->orderByDesc('total_items_in_collections')
            ->take(3)
            ->get();

        return view('home', compact(
            'totalItems',
            'totalCategories',
            'totalUsers',
            'avgCollectionsPerUser',
            'avgItemsPerCollection',
            'totalProviders',
            'totalConsumers'
            ,'globalRating',
            'topCollectors'
        ));
    }
}
