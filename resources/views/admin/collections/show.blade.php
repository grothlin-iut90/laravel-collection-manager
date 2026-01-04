<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl" style="color: var(--text-header);">Manage Collection: {{ $collection->name }}</h2>
            <a href="{{ route('users.edit', $collection->user) }}" class="button-return">Back to User</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-6 p-6 shadow-sm sm:rounded-lg" style="background-color: var(--bg-card);">
                <h3 class="header-title mb-4">Add Item to Collection</h3>
                <form action="{{ route('admin.collections.items.add', $collection) }}" method="POST" class="flex gap-4">
                    @csrf
                    <select name="item_id" class="flex-1">
                        @foreach(App\Models\Item::all() as $item)
                            <option value="{{ $item->id }}">{{ $item->title }} (ID: {{ $item->id }})</option>
                        @endforeach
                    </select>
                    <button type="submit" class="button-primary">Add Item</button>
                </form>
            </div>

            <div class="p-6 shadow-sm sm:rounded-lg" style="background-color: var(--bg-card);">
                <h3 class="header-title mb-4">Items in this collection</h3>
                <table class="min-w-full text-left text-sm">
                    <thead class="border-b" style="border-color: var(--border-color);">
                        <tr>
                            <th class="px-6 py-4">Item</th>
                            <th class="px-6 py-4 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($collection->items as $item)
                            <tr class="border-b" style="border-color: var(--border-color);">
                                <td class="px-6 py-4">{{ $item->title }}</td>
                                <td class="px-6 py-4 text-right">
                                    <form action="{{ route('admin.collections.items.remove', [$collection, $item]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
