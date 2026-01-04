<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl leading-tight" style="color: var(--text-header);">
                Manage Collection: {{ $collection->name }}
            </h2>
            <a href="{{ route('users.edit', $collection->user) }}" class="button-return">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                </svg>
                Back to User
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Collection Info Card -->
            <div class="shadow-lg rounded-lg overflow-hidden mb-6" style="background-color: var(--bg-card); border: 1px solid var(--border-color);">
                <div style="height: 6px; background: linear-gradient(90deg, var(--secondary-color), var(--secondary-color-hover));"></div>
                
                <div class="p-6">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center gap-4 flex-1">
                            <div class="collection-icon-large">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold" style="color: var(--text-header);">{{ $collection->name }}</h3>
                                <p class="text-sm" style="color: var(--text-muted);">
                                    Owner: <strong>{{ $collection->user->name }}</strong> • 
                                    {{ $collection->items->count() }} {{ $collection->items->count() === 1 ? 'item' : 'items' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    @if($collection->description)
                        <div class="p-3 rounded" style="background-color: var(--bg-body);">
                            <p style="color: var(--text-main);">{{ $collection->description }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Add Item Section -->
            <div class="shadow-lg rounded-lg overflow-hidden mb-6" style="background-color: var(--bg-card); border: 1px solid var(--border-color);">
                <div class="p-6 border-b" style="border-color: var(--border-color);">
                    <h3 class="text-lg font-bold" style="color: var(--text-header);">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color: var(--primary-color);">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Add Item to Collection
                    </h3>
                </div>
                
                <div class="p-6">
                    <form action="{{ route('admin.collections.items.add', $collection) }}" method="POST" class="flex gap-3">
                        @csrf
                        <select name="item_id" class="flex-1" style="margin-bottom: 0;">
                            @foreach(App\Models\Item::all() as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->title }} ({{ $item->category->label }}) - ID: {{ $item->id }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="button-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Add Item
                        </button>
                    </form>
                </div>
            </div>

            <!-- Items in Collection -->
            <div class="shadow-lg rounded-lg overflow-hidden" style="background-color: var(--bg-card); border: 1px solid var(--border-color);">
                <div class="p-6 border-b" style="border-color: var(--border-color);">
                    <h3 class="text-lg font-bold" style="color: var(--text-header);">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color: var(--secondary-color);">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                        Items in this Collection
                    </h3>
                </div>
                
                <div class="p-6">
                    @if($collection->items->isEmpty())
                        <div class="text-center py-12" style="border: 2px dashed var(--border-color); border-radius: 0.5rem;">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color: var(--text-muted); opacity: 0.5;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                            </svg>
                            <p class="font-medium mb-1" style="color: var(--text-header);">No items in this collection</p>
                            <p class="text-sm" style="color: var(--text-muted);">Add items using the form above</p>
                        </div>
                    @else
                        <div class="overflow-x-auto rounded-lg border" style="border-color: var(--border-color);">
                            <table class="min-w-full">
                                <thead style="background-color: var(--bg-body); border-bottom: 2px solid var(--border-color);">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider" style="color: var(--text-muted);">
                                            Item
                                        </th>
                                        <th class="px-6 py-3 text-center text-xs font-semibold uppercase tracking-wider" style="color: var(--text-muted);">
                                            Category
                                        </th>
                                        <th class="px-6 py-3 text-center text-xs font-semibold uppercase tracking-wider" style="color: var(--text-muted);">
                                            Rating
                                        </th>
                                        <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wider" style="color: var(--text-muted);">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($collection->items as $item)
                                        <tr class="border-b hover:bg-opacity-50 transition-colors" style="border-color: var(--border-color);">
                                            <td class="px-6 py-4">
                                                <div>
                                                    <p class="font-semibold" style="color: var(--text-header);">{{ $item->title }}</p>
                                                    <p class="text-xs" style="color: var(--text-muted);">{{ Str::limit($item->description, 50) }}</p>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                <span class="category-badge-small">
                                                    {{ $item->category->label }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                <div class="flex items-center justify-center gap-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20" style="color: #fbbf24;">
                                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                    </svg>
                                                    <span style="color: var(--text-main); font-weight: 500;">{{ $item->rating }}/5</span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 text-right">
                                                <form action="{{ route('admin.collections.items.remove', [$collection, $item]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="button-danger text-sm" onclick="return confirm('Remove this item from the collection?')">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                        </svg>
                                                        Remove
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-app-layout>

<style>
    .user-avatar-small {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 3rem;
        height: 3rem;
        border-radius: 9999px;
        background-color: rgba(155, 204, 103, 0.1);
        color: var(--success-color);
    }

    .collection-icon-large {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 3.5rem;
        height: 3.5rem;
        border-radius: 0.75rem;
        background-color: rgba(162, 62, 72, 0.1);
        color: var(--secondary-color);
    }

    .category-badge-small {
        display: inline-flex;
        padding: 0.25rem 0.625rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 500;
        background-color: var(--bg-body);
        color: var(--text-main);
    }

    .form-label {
        display: block;
        font-size: 0.875rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: var(--text-header);
    }

    input[type="text"],
    textarea,
    select {
        transition: all 0.2s ease;
    }

    input[type="text"]:focus,
    textarea:focus,
    select:focus {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    table tr:hover {
        background-color: var(--bg-hover);
    }

    .button-danger.text-sm,
    .button-primary.text-sm {
        padding: 0.5rem 0.75rem;
        font-size: 0.875rem;
        display: inline-flex;
        align-items: center;
        gap: 0.25rem;
        margin: 0;
    }
</style>