<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('home');
    }
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

Route::get('/dashboard', function () {
    if (auth()->user()->role === 'consumer' || auth()->user()->role === 'admin') {
        $items = \App\Models\Item::all();
    } elseif (auth()->user()->role === 'provider') {
        $items = \App\Models\Item::where('provider_id', auth()->user()->id)->get();
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

Route::delete('/admin/collections/{collection}', [UserController::class, 'destroyCollection'])->name('admin.collections.destroy');

Route::resource('items', ItemController::class)->middleware('auth');
Route::resource('users', UserController::class)->middleware('auth');
Route::get('users/{user}/collections', [UserController::class, 'collection'])->name('user.collections')->middleware('auth');
Route::resource('categories', CategoryController::class)->middleware('auth');

Route::resource('collections', CollectionController::class)->middleware('auth');
Route::post('collections/add-item', [CollectionController::class, 'addItem'])->name('collections.addItem')->middleware('auth');
Route::delete('collections/{collection}/remove-item/{itemId}', [CollectionController::class, 'removeItem'])->name('collections.removeItem')->middleware('auth');
Route::post('collections/{collection}/edit/title', [CollectionController::class, 'editTitle'])->name('collections.editTitle')->middleware('auth');
Route::post('collections/{collection}/edit/description', [CollectionController::class, 'editDescription'])->name('collections.editDescription')->middleware('auth');

require __DIR__.'/auth.php';
