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
                'name' => 'Provider One',
                'email' => 'provider1@example.com',
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
                'name' => 'Provider Two',
                'email' => 'provider2@example.com',
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
                'provider_id' => 1,
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
                'provider_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'title' => 'Bohemian Rhapsody Album',
                'description' => 'Queen\'s iconic album.',
                'rating' => 5,
                'condition' => 'Excellent',
                'user_id' => 3,
                'category_id' => 3,
                'provider_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'title' => 'The Witcher 3',
                'description' => 'Epic RPG game.',
                'rating' => 5,
                'condition' => 'Like New',
                'user_id' => 3,
                'category_id' => 4,
                'provider_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'title' => '1984',
                'description' => 'Dystopian novel by George Orwell.',
                'rating' => 4,
                'condition' => 'Used',
                'user_id' => 2,
                'category_id' => 1,
                'provider_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}