<x-app-layout>
    <x-slot name="header">
        <h2>My Collections</h2>
        <a href="{{ route('collections.create') }}" class="btn btn-primary">Create New Collection</a>
    </x-slot>
    <div class="py-12">
        @if($collections->isEmpty())
            <p>You have no collections yet. <a href="{{ route('collections.create') }}">Create one</a>.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($collections as $collection)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <h3 class="text-lg font-semibold">{{ $collection->name }}</h3>
                            <p class="text-gray-600">{{ $collection->description }}</p>
                            <div class="mt-4">
                                <h4 class="font-medium">Items ({{ $collection->items_count }})</h4>
                                <ul class="list-disc list-inside">
                                    @foreach($collection->items as $item)
                                        <li>{{ $item->title }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <a href="{{ route('collections.show', $collection) }}" class="mt-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">View Full List</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>