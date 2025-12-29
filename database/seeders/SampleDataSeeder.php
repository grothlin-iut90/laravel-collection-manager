<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SampleDataSeeder extends Seeder
{
    public function run(): void
    {
        // Insert users
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Amazon',
                'email' => 'amazon@example.com',
                'email_verified_at' => null,
                'password' => Hash::make('password'),
                'role' => 'provider',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Consumer One',
                'email' => 'consumer1@example.com',
                'email_verified_at' => null,
                'password' => Hash::make('password'),
                'role' => 'consumer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Admin One',
                'email' => 'admin1@example.com',
                'email_verified_at' => null,
                'password' => Hash::make('password'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'CDiscount',
                'email' => 'cdiscount2@example.com',
                'email_verified_at' => null,
                'password' => Hash::make('password'),
                'role' => 'provider',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Insert categories
        DB::table('categories')->insert([
            [
                'id' => 1,
                'label' => 'Books',
                'provider_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'label' => 'Movies',
                'provider_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'label' => 'Music',
                'provider_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'label' => 'Games',
                'provider_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'label' => 'Vinyles',
                'provider_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'label' => 'BD / Mangas',
                'provider_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'label' => 'Montres',
                'provider_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'label' => 'Art et Posters',
                'provider_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Insert items
        DB::table('items')->insert([
            [
                'id' => 1,
                'title' => 'The Great Gatsby',
                'description' => 'A classic novel by F. Scott Fitzgerald.',
                'rating' => 5,
                'condition' => 'New',
                'user_id' => 2,
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'title' => 'Inception',
                'description' => 'A mind-bending sci-fi movie.',
                'rating' => 4,
                'condition' => 'Good',
                'user_id' => 2,
                'category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'title' => '1984',
                'description' => 'Dystopian novel by George Orwell.',
                'rating' => 4,
                'condition' => 'Used',
                'user_id' => 2,
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Fournisseur 4 / Utilisateur 3
            [
                'id' => 4,
                'title' => 'Bohemian Rhapsody Album',
                'description' => 'Queen\'s iconic album.',
                'rating' => 5,
                'condition' => 'Excellent',
                'user_id' => 3,
                'category_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'title' => 'The Witcher 3',
                'description' => 'Epic RPG game.',
                'rating' => 5,
                'condition' => 'Like New',
                'user_id' => 3,
                'category_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'title' => 'Le Petit Prince',
                'description' => 'Livre de Saint-Exupéry, édition poche.',
                'rating' => 4,
                'condition' => 'Good',
                'user_id' => 3,
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'title' => 'Pikachu Illustrator',
                'description' => 'Carte Pokémon rare, édition 1999.',
                'rating' => 5,
                'condition' => 'New',
                'user_id' => 3,
                'category_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'title' => 'Dark Side of the Moon',
                'description' => 'Vinyle de Pink Floyd, réédition 2016.',
                'rating' => 5,
                'condition' => 'Excellent',
                'user_id' => 3,
                'category_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'title' => 'Funko Pop - Darth Vader',
                'description' => 'Figurine Star Wars, édition limitée.',
                'rating' => 4,
                'condition' => 'Used',
                'user_id' => 3,
                'category_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 10,
                'title' => 'One Piece - Tome 1',
                'description' => 'Manga d’Eiichiro Oda, édition originale.',
                'rating' => 5,
                'condition' => 'New',
                'user_id' => 3,
                'category_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Fournisseur 1 / Utilisateur 1
            [
                'id' => 11,
                'title' => 'Rolex Submariner',
                'description' => 'Montre vintage, années 80.',
                'rating' => 5,
                'condition' => 'Excellent',
                'user_id' => 1,
                'category_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 12,
                'title' => 'Poster Star Wars Episode IV',
                'description' => 'Poster original signé.',
                'rating' => 4,
                'condition' => 'Used',
                'user_id' => 1,
                'category_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 13,
                'title' => 'Super Mario Bros 3',
                'description' => 'Cartouche NES, édition américaine.',
                'rating' => 4,
                'condition' => 'Good',
                'user_id' => 1,
                'category_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 14,
                'title' => 'Charizard 1ère édition',
                'description' => 'Carte Pokémon holographique.',
                'rating' => 5,
                'condition' => 'New',
                'user_id' => 1,
                'category_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Insert collections
        DB::table('collections')->insert([
            [
                'id' => 1,
                'name' => 'My Favorite Books',
                'description' => 'A collection of my favorite books.',
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Sci-Fi Movies',
                'description' => 'Movies that bend reality.',
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Rare Items',
                'description' => 'Valuable and rare collectibles.',
                'user_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Insert item_collection pivot
        DB::table('item_collection')->insert([
            ['item_id' => 1, 'collection_id' => 1], // The Great Gatsby in Favorite Books
            ['item_id' => 3, 'collection_id' => 1], // 1984 in Favorite Books
            ['item_id' => 2, 'collection_id' => 2], // Inception in Sci-Fi Movies
            ['item_id' => 4, 'collection_id' => 3], // Bohemian Rhapsody in Rare Items
            ['item_id' => 5, 'collection_id' => 3], // The Witcher 3 in Rare Items
            ['item_id' => 7, 'collection_id' => 3], // Pikachu Illustrator in Rare Items
            ['item_id' => 8, 'collection_id' => 3], // Dark Side of the Moon in Rare Items
            ['item_id' => 10, 'collection_id' => 3], // One Piece Tome 1 in Rare Items
            ['item_id' => 14, 'collection_id' => 3], // Charizard in Rare Items
        ]);
    }
}