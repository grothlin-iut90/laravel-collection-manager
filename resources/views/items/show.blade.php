<x-app-layout>
    <x-slot name="header">
        <h2 class="header-title">
            {{ __('Item Details') }}
        </h2>
        <a href="{{ route('dashboard') }}" class="button-return">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
            </svg>
            Back
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2>{{ $item->title }}</h2>
                    <p><strong>Description:</strong> {{ $item->description }}</p>
                    <p><strong>Rating:</strong> {{ $item->rating }}/5</p>
                    <p><strong>Condition:</strong> {{ $item->condition }}</p>
                    <p><strong>Category:</strong> {{ $item->category->label }}</p>
                    <p><strong>Provider:</strong> {{ $item->provider->name }} ({{ $item->provider->email }})</p>
                    @if (auth()->user()->role === 'provider' && auth()->id() === $item->provider_id || auth()->user()->role === 'admin')
                    <button onclick="window.location.href='{{ route('items.edit', $item->id) }}'" class="button-success">
                        Edit
                    </button>
                    <form action="{{ route('items.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Delete this item?');" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button-danger">
                            Delete
                        </button>
                    </form>
                    @elseif (auth()->user()->role === 'consumer')

                    <br/>
                    <!-- Add to collection -->
                    <h4 class="font-bold text-lg mb-4">Manage within your collections:</h4>

                    @if(auth()->user()->collections->isNotEmpty())

                    <div class="space-y-3">
                        @foreach(auth()->user()->collections as $collection)
                        <div class="flex items-center justify-between bg-gray-50 p-3 rounded border">

                            <span class="font-semibold">{{ $collection->name }}</span>

                            @if($collection->items->contains($item->id))

                            <form action="{{ route('collections.removeItem', ['collection' => $collection->id, 'itemId' => $item->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 font-bold text-sm">
                                    Remove
                                </button>
                            </form>

                            @else

                            <form action="{{ route('collections.addItem') }}" method="POST">
                                @csrf
                                <input type="hidden" name="item_id" value="{{ $item->id }}">
                                <input type="hidden" name="collection_id" value="{{ $collection->id }}">
                                <button type="submit" class="text-green-600 hover:text-green-900 font-bold text-sm">
                                    Add
                                </button>
                            </form>

                            @endif
                        </div>
                        @endforeach
                    </div>
                    @endif

                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
