<x-app-layout>
    <x-slot name="header">
        <h2>My Collections</h2>
        <a href="{{ route('collections.create') }}" class="button-primary">Create New Collection</a>
    </x-slot>
    <div class="container">
        @if($collections->isEmpty())
            <p>You have no collections yet. <a href="{{ route('collections.create') }}" class="button-primary">Create one</a>.</p>
        @else
            <div class="grid grid-cols-1 gap-6">
                @foreach($collections as $collection)
                    <div class="col-span-1" style="background-color: var(--bg-main); border-radius: 8px; padding: 10px;">
                        <div class="p-7" style="background-color: var(--bg-card); border-radius: 8px;">
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
                            <a href="{{ route('collections.show', $collection) }}" class="button-primary">View Full List</a>
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
</style>