<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    if (auth()->user()->role === 'consumer') {
        $items = \App\Models\Item::with('category')->get();
    } else {
        $items = auth()->user()->items()->with('category')->get();
    }
    return view('dashboard', compact('items'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('items', ItemController::class)->middleware('auth');
Route::get('items/{item}/request', [ItemController::class, 'request'])->name('items.request')->middleware('auth');
Route::resource('categories', CategoryController::class)->middleware('auth');

require __DIR__.'/auth.php';
