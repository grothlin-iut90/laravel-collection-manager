<x-app-layout>
    <x-slot name="header">
        <h2 class="header-title">
            {{ __('Item Details') }}
        </h2>
        <a href="{{ route('dashboard') }}" class="button-return">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
            </svg>
            Back
        </a>
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>