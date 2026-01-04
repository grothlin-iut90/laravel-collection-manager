<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl leading-tight" style="color: var(--text-header);">
                Manage collection : <span class="highlight">{{ $collection->name }}</span>
            </h2>
            <p class="text-sm mt-1" style="color: var(--text-muted);">
                Owned by {{ $collection->user->name }}
            </p>
        </div>

        <a href="{{ route('users.edit', $collection->user) }}" class="button-return">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
            </svg>
            Back to user
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-8 shadow-sm sm:rounded-lg overflow-hidden" style="background-color: var(--bg-card);">
                <div class="p-6 border-b" style="border-color: var(--border-color);">
                    <h3 class="header-title">Collection content ({{ $collection->items->count() }} items)</h3>
                </div>

                <div class="p-6">
                    @if($collection->items->isEmpty())
                    <p class="text-center italic" style="color: var(--text-muted);">This collection is empty.</p>
                    @else
                    <table class="min-w-full text-left text-sm whitespace-nowrap">
                        <thead class="uppercase tracking-wider border-b" style="border-color: var(--border-color); color: var(--text-muted);">
                            <tr>
                                <th class="px-6 py-4">Item Title</th>
                                <th class="px-6 py-4">Category</th>
                                <th class="px-6 py-4">Condition</th>
                                <th class="px-6 py-4 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody style="color: var(--text-main);">
                            @foreach($collection->items as $item)
                            <tr class="border-b hover:bg-opacity-10 transition" style="border-color: var(--border-color);">
                                <td class="px-6 py-4 font-bold">{{ $item->title }}</td>
                                <td class="px-6 py-4">{{ $item->category->label ?? 'N/A' }}</td>
                                <td class="px-6 py-4">{{ $item->condition }}</td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end items-center gap-3">


                                        <button onclick="window.location='{{ route('items.edit', $item) }}'" class="button-primary">
                                            Edit item
                                        </button>

                                        <form action="{{ route('admin.collections.items.remove', [$collection, $item]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="button-danger"
                                                onclick="return confirm('Remove this item from the collection?')">
                                                Remove
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>

            <div class="shadow-sm sm:rounded-lg" style="background-color: var(--bg-card);">
                <div class="p-6 border-b" style="border-color: var(--border-color);">
                    <h3 class="header-title">Add item to this collection</h3>
                </div>
                <div class="p-6">
                    <form action="{{ route('admin.collections.items.add', $collection) }}" method="POST" class="flex gap-4 items-end items-center">
                        @csrf

                        <div class="flex-grow">
                            <select name="item_id" class="w-full" required>
                                <option value="" disabled selected>Choose an item</option>
                                @foreach(App\Models\Item::all() as $item)
                                <option value="{{ $item->id }}" {{ $collection->items->contains($item->id) ? 'disabled' : '' }}>
                                    {{ $item->title }} ({{ $item->category->label ?? 'No Cat' }})
                                    {{ $collection->items->contains($item->id) ? '[Already in collection]' : '' }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="button-primary mb-4">
                            + Add item
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
