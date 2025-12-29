<x-app-layout>
    <x-slot name="header">
        <h2 class="header-title">My Collections</h2>
        <a href="{{ route('collections.create') }}" class="button-primary">Create New Collection</a>
    </x-slot>
    <div class="container">
        @if($collections->isEmpty())
            <p>You have no collections yet. <a href="{{ route('collections.create') }}" class="button-primary">Create one</a>.</p>
        @else
            <div class="grid-collections">
                @foreach($collections as $collection)
                    <div class="collection-card">
                        <div style="background-color: var(--bg-card); border-radius: 8px;">
                            <h3 class="text-lg font-semibold">{{ $collection->name }}</h3>
                            <p style="color: var(--text-muted);">{{ $collection->description }}</p>
                            <div class="mt-4">
                                <h4 class="font-medium">Items ({{ $collection->items_count }})</h4>
                                <ul class="list-disc list-inside">
                                    @foreach($collection->items as $item)
                                        <li>{{ $item->title }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <button onclick="window.location.href='{{ route('collections.show', $collection) }}'" class="button-primary">View Full List</button>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
<style>
    .container {
        max-width: 800px;
        height: auto;
        margin: 0 auto;
        padding: 20px;
        background-color: var(--bg-main);
        border-radius: 8px;
    }

    .grid-collections {
        display: grid;
        grid-template-columns: repeat(minmax(250px, 1fr));
        gap: 20px;
    }

    .collection-card {
        background-color: var(--bg-card);
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
</style>