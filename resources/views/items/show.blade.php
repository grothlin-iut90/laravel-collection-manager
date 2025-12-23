<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Item Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3>{{ $item->title }}</h3>
                    <p><strong>Description:</strong> {{ $item->description }}</p>
                    <p><strong>Rating:</strong> {{ $item->rating }}/5</p>
                    <p><strong>Condition:</strong> {{ $item->condition }}</p>
                    <p><strong>Category:</strong> {{ $item->category->label }}</p>
                    @if (auth()->user()->role === 'provider' && auth()->id() === $item->provider_id)
                    <a href="{{ route('items.edit', $item) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                    @elseif (auth()->user()->role === 'consumer')
                    <a href="{{ route('items.request', $item) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Request Item</a>
                    @endif
                    <a href="{{ route('items.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Back to Items</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>