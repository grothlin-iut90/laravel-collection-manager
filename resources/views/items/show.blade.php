<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl leading-tight" style="color: var(--text-header);">
                {{ __('Item Details') }}
            </h2>
            <a href="{{ route('dashboard') }}" class="button-return" style="right: 0; position: absolute; margin-right: 10%;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                </svg>
                Back to Dashboard
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Main Item Card -->
            <div class="shadow-lg rounded-lg overflow-hidden mb-6" style="background-color: var(--bg-card); border: 1px solid var(--border-color);">
                <div class="gradient-header"></div>
                
                <div class="p-8">
                    <div class="flex items-start justify-between mb-6">
                        <div class="flex-1">
                            <h1 class="text-3xl font-bold mb-2" style="color: var(--text-header);">{{ $item->title }}</h1>
                            <div class="flex items-center gap-2">
                                <span class="category-badge">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                    </svg>
                                    {{ $item->category->label }}
                                </span>
                            </div>
                        </div>
                        
                        @if (auth()->user()->role === 'provider' && auth()->id() === $item->provider_id || auth()->user()->role === 'admin')
                            <div class="flex gap-2">
                                <button onclick="window.location.href='{{ route('items.edit', $item->id) }}'" class="button-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    Edit
                                </button>
                                <form action="{{ route('items.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Delete this item?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="button-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        Delete
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>

                    <!-- Description -->
                    <div class="mb-6">
                        <h3 class="text-sm font-semibold uppercase tracking-wider mb-2" style="color: var(--text-muted);">Description</h3>
                        <p style="color: var(--text-main); line-height: 1.8;">{{ $item->description }}</p>
                    </div>

                    <!-- Item Details Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                        <div class="detail-card">
                            <div class="detail-icon" style="background-color: rgba(227, 178, 60, 0.1);">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20" style="color: var(--primary-color);">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            </div>
                            <div>
                                <p class="detail-label">Rating</p>
                                <p class="detail-value">{{ $item->rating }}/5</p>
                            </div>
                        </div>

                        <div class="detail-card">
                            <div class="detail-icon" style="background-color: rgba(162, 62, 72, 0.1);">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color: var(--secondary-color);">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="detail-label">Condition</p>
                                <p class="detail-value">{{ $item->condition }}</p>
                            </div>
                        </div>

                        <div class="detail-card">
                            <div class="detail-icon" style="background-color: rgba(155, 204, 103, 0.1);">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color: var(--success-color);">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <div>
                                <p class="detail-label">Provider</p>
                                <p class="detail-value">{{ $item->provider->name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Consumer Collections Section -->
            @if (auth()->user()->role === 'consumer')
                <div class="shadow-lg rounded-lg overflow-hidden" style="background-color: var(--bg-card); border: 1px solid var(--border-color);">
                    <div class="p-6 border-b" style="border-color: var(--border-color);">
                        <h3 class="text-lg font-bold" style="color: var(--text-header);">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color: var(--secondary-color);">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                            Manage in Collections
                        </h3>
                        <p class="text-sm mt-1" style="color: var(--text-muted);">
                            Add or remove this item from your collections
                        </p>
                    </div>

                    <div class="p-6">
                        @if(auth()->user()->collections->isNotEmpty())
                            <div class="space-y-3">
                                @foreach(auth()->user()->collections as $collection)
                                    <div class="collection-item-card">
                                        <div class="flex items-center gap-3 flex-1">
                                            <div class="collection-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="font-semibold" style="color: var(--text-header);">{{ $collection->name }}</p>
                                                <p class="text-xs" style="color: var(--text-muted);">{{ $collection->items->count() }} items</p>
                                            </div>
                                        </div>

                                        @if($collection->items->contains($item->id))
                                            <form action="{{ route('collections.removeItem', ['collection' => $collection->id, 'itemId' => $item->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="action-button remove">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                    Remove
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('collections.addItem') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="item_id" value="{{ $item->id }}">
                                                <input type="hidden" name="collection_id" value="{{ $collection->id }}">
                                                <button type="submit" class="action-button add">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                                    </svg>
                                                    Add
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-8">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color: var(--text-muted); opacity: 0.5;">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                                <p class="font-medium mb-2" style="color: var(--text-header);">No collections yet</p>
                                <p class="text-sm mb-4" style="color: var(--text-muted);">Create a collection to organize this item</p>
                                <a href="{{ route('collections.create') }}" class="button-primary inline-flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    Create Collection
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>

<style>
    .gradient-header {
        height: 6px;
        background: linear-gradient(90deg, var(--primary-color), var(--primary-color-hover));
    }

    .category-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
        padding: 0.375rem 0.875rem;
        border-radius: 9999px;
        font-size: 0.875rem;
        font-weight: 500;
        background-color: var(--bg-body);
        color: var(--text-main);
        border: 1px solid var(--border-color);
    }

    .detail-card {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem;
        border-radius: 0.5rem;
        background-color: var(--bg-body);
        border: 1px solid var(--border-color);
        transition: all 0.2s;
    }

    .detail-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .detail-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 3rem;
        height: 3rem;
        border-radius: 0.5rem;
        flex-shrink: 0;
    }

    .detail-label {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        font-weight: 600;
        color: var(--text-muted);
        margin-bottom: 0.25rem;
    }

    .detail-value {
        font-size: 1.125rem;
        font-weight: 600;
        color: var(--text-header);
    }

    .collection-item-card {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1rem;
        border-radius: 0.5rem;
        background-color: var(--bg-body);
        border: 1px solid var(--border-color);
        transition: all 0.2s;
    }

    .collection-item-card:hover {
        background-color: var(--bg-hover);
    }

    .collection-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 0.375rem;
        background-color: rgba(162, 62, 72, 0.1);
        color: var(--secondary-color);
    }

    .action-button {
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
        padding: 0.5rem 1rem;
        border-radius: 0.25rem;
        font-size: 0.875rem;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: all 0.2s;
    }

    .action-button.add {
        background-color: var(--success-color);
        color: var(--text-button);
    }

    .action-button.add:hover {
        background-color: var(--success-color-hover);
    }

    .action-button.remove {
        background-color: var(--danger-color);
        color: var(--text-button);
    }

    .action-button.remove:hover {
        background-color: var(--danger-color-hover);
    }
</style>