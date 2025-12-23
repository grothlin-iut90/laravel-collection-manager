<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    <br>
                    <a href="{{ route('items.index') }}" class="text-black font-bold py-2 px-4 rounded">Manage My Items</a>
                    @if(auth()->user()->role === 'provider' || auth()->user()->role === 'admin')
                    <a href="{{ route('categories.index') }}" class="text-black font-bold py-2 px-4 rounded">Manage Categories</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>