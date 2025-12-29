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
                    <!-- Add to collection -->
                    @if(auth()->user()->collections->isNotEmpty())
                        <form action="{{ route('collections.addItem') }}" method="POST" class="inline">
                            @csrf
                            <select name="collection_id" class="border rounded px-2 py-1">
                                @foreach(auth()->user()->collections as $collection)
                                    <option value="{{ $collection->id }}">{{ $collection->name }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" name="item_id" value="{{ $item->id }}">
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add to List</button>
                        </form>
                    @else
                        <p>You have no collections. <a href="{{ route('collections.create') }}">Create one</a> to add items.</p>
                    @endif
                    @endif
                    <a href="{{ route('dashboard') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Back to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>