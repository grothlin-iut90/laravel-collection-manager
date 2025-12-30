<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a users detail
     */
    public function index()
    {
        if(Auth::user()->role !== 'admin') {
            return redirect()->route('dashboard')->with('error', 'Unauthorized action.');
        }
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Display the specified user
     */
    public function show(User $user)
    {
        if(Auth::user()->role !== 'admin') {
            return redirect()->route('dashboard')->with('error', 'Unauthorized action.');
        }
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user
     */
    public function edit(User $user)
    {
        if(Auth::user()->role !== 'admin') {
            return redirect()->route('users.index')->with('error', 'Unauthorized action.');
        }
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, User $user)
    {
        if(Auth::user()->role !== 'admin') {
            return redirect()->route('users.index')->with('error', 'Unauthorized action.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,provider,consumer',
        ]);

        $user->update($request->all());

        return redirect()->route('users.show', $user)->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user)
    {
        if(Auth::user()->role !== 'admin') {
            return redirect()->route('users.index')->with('error', 'Unauthorized action.');
        }

        if($user->id === Auth::user()->id) {
            return redirect()->route('users.index')->with('error', 'You cannot delete your own account.');
        }

        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
