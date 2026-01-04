<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            @if (!$editing)
                <div class="flex items-center gap-3">
                    <h2 class="font-semibold text-xl leading-tight" style="color: var(--text-header);">
                        {{ $collection->name }}
                    </h2>
                    <a href="{{ route('collections.show', ['collection' => $collection, 'edit' => true]) }}" class="button-edit" title="Edit Collection">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                        </svg>
                    </a>
                </div>
                <a href="{{ route('collections.index') }}" class="button-return">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                    </svg>
                    Back
                </a>
            @else
                <form action="{{ route('collections.update', $collection) }}" method="POST" class="flex items-center gap-3 flex-1">
                    @csrf
                    @method('PUT')
                    <div class="flex-1 flex flex-col gap-2">
                        <input type="text" name="name" value="{{ $collection->name }}" placeholder="Collection Name" required style="margin-bottom: 0;">
                        <input type="text" name="description" value="{{ $collection->description }}" placeholder="Collection Description" style="margin-bottom: 0;">
                    </div>
                    <button type="button" onclick="window.location.href='{{ route('collections.show', ['collection' => $collection, 'edit' => false]) }}'" class="button-secondary">Cancel</button>
                    <button type="submit" class="button-success">Save</button>
                </form>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if (!$editing && $collection->description)
                <div class="mb-6 shadow-lg rounded-lg p-6" style="background-color: var(--bg-card); border: 1px solid var(--border-color);">
                    <div class="flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color: var(--secondary-color);">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="flex-1">
                            <p style="color: var(--text-main); line-height: 1.6;">{{ $collection->description }}</p>
                        </div>
                        <a href="{{ route('collections.show', ['collection' => $collection, 'edit' => true]) }}" class="button-edit" title="Edit Description">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            @endif

            <div class="mb-6 shadow-lg rounded-lg p-6" style="background-color: var(--bg-card); border: 1px solid var(--border-color);">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold" style="color: var(--text-header);">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color: var(--secondary-color);">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                        Items in Collection ({{ $items->count() }})
                    </h3>
                    <a href="{{ route('dashboard') }}" class="button-primary text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Add Items
                    </a>
                </div>

                @if ($items->isEmpty())
                    <div class="text-center py-12" style="border: 2px dashed var(--border-color); border-radius: 0.5rem;">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color: var(--text-muted); opacity: 0.5;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                        </svg>
                        <p class="text-lg font-medium mb-2" style="color: var(--text-header);">This collection is empty</p>
                        <p class="mb-4" style="color: var(--text-muted);">Start adding items to organize your collection</p>
                        <a href="{{ route('dashboard') }}" class="button-primary inline-flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Browse Items
                        </a>
                    </div>
                @else
                    <div class="overflow-x-auto rounded-lg border" style="border-color: var(--border-color);">
                        <table class="min-w-full" style="background-color: var(--bg-card);">
                            <thead style="background-color: var(--bg-body); border-bottom: 2px solid var(--border-color);">
                                <tr>
                                    <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider" style="color: var(--text-muted);">Title</th>
                                    <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider" style="color: var(--text-muted);">Description</th>
                                    <th class="py-3 px-4 text-center text-xs font-semibold uppercase tracking-wider" style="color: var(--text-muted);">Category</th>
                                    <th class="py-3 px-4 text-center text-xs font-semibold uppercase tracking-wider" style="color: var(--text-muted);">Rating</th>
                                    <th class="py-3 px-4 text-center text-xs font-semibold uppercase tracking-wider" style="color: var(--text-muted);">Condition</th>
                                    <th class="py-3 px-4 text-center text-xs font-semibold uppercase tracking-wider" style="color: var(--text-muted);">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                    <tr class="border-b hover:bg-opacity-50 transition-colors" style="border-color: var(--border-color);">
                                        <td class="py-3 px-4">
                                            <div class="font-medium" style="color: var(--text-header);">{{ $item->title }}</div>
                                        </td>
                                        <td class="py-3 px-4">
                                            <div style="color: var(--text-muted); font-size: 0.875rem;">{{ Str::limit($item->description, 60) }}</div>
                                        </td>
                                        <td class="py-3 px-4 text-center">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium" style="background-color: var(--bg-body); color: var(--text-main);">
                                                {{ $item->category->label }}
                                            </span>
                                        </td>
                                        <td class="py-3 px-4 text-center">
                                            <div class="flex items-center justify-center gap-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20" style="color: #fbbf24;">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                                <span class="font-medium" style="color: var(--text-main);">{{ $item->rating }}/5</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-4 text-center">
                                            <span style="color: var(--text-main); font-size: 0.875rem;">{{ $item->condition }}</span>
                                        </td>
                                        <td class="py-3 px-4 text-center">
                                            <form action="{{ route('collections.removeItem', [$collection, $item->id]) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="button-danger text-sm" onclick="return confirm('Remove this item from the collection?')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
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

            <div class="flex justify-between items-center">
                <a href="{{ route('collections.index') }}" class="button-return">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                    </svg>
                    Back to Collections
                </a>
                
                <form action="{{ route('collections.destroy', $collection) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this collection? This action cannot be undone.');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="button-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Delete Collection
                    </button>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>

<style>
    body {
        font-family: 'Instrument Sans', sans-serif;
        background-color: var(--bg-body);
        color: var(--text-main);
        min-height: 100vh;
    }

    table tr:hover {
        background-color: var(--bg-hover);
    }

    .button-danger.text-sm {
        padding: 0.375rem 0.75rem;
        font-size: 0.875rem;
        display: inline-flex;
        align-items: center;
        gap: 0.25rem;
    }
</style>