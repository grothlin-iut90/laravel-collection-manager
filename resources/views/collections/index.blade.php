<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl leading-tight" style="color: var(--text-header);">
                {{ __('My Collections') }}
            </h2>
            <a href="{{ route('collections.create') }}" class="button-return" style="right: 0; position: absolute; margin-right: 10%;">
                + Create New Collection
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-8">
                <div class="flex items-center gap-3 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color: var(--primary-color);">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    <h3 class="text-2xl font-bold" style="color: var(--text-header);">Your Collections</h3>
                </div>
                <p style="color: var(--text-muted);">
                    Organize and manage your personal collections of items.
                </p>
            </div>

            @if($collections->isEmpty())
            <div class="shadow-lg rounded-lg p-12 text-center" style="background-color: var(--bg-card); border: 1px solid var(--border-color);">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color: var(--text-muted); opacity: 0.5;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
                <h3 class="text-xl font-bold mb-2" style="color: var(--text-header);">No Collections Yet</h3>
                <p class="mb-6" style="color: var(--text-muted);">
                    Start organizing your items by creating your first collection.
                </p>
                <a href="{{ route('collections.create') }}" class="button-primary inline-flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Create Your First Collection
                </a>
            </div>
            @else
            <div class="collections-grid">
                @foreach($collections as $collection)
                <div class="collection-card">
                    <div class="collection-card-header">
                        <h3>{{ $collection->name }}</h3>
                        <span class="collection-count-badge">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                            {{ $collection->items_count }}
                        </span>
                    </div>

                    @if($collection->description)
                    <p class="collection-description">{{ Str::limit($collection->description, 120) }}</p>
                    @else
                    <p class="collection-description" style="opacity: 0.6; font-style: italic;">No description provided</p>
                    @endif

                    @if($collection->items->isNotEmpty())
                    <div class="collection-preview">
                        <p class="collection-preview-label">Recent items:</p>
                        <ul class="collection-items-list">
                            @foreach($collection->items as $item)
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                                {{ $item->title }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @else
                    <div class="collection-empty">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                        </svg>
                        <p>Empty collection</p>
                    </div>
                    @endif

                    <div class="collection-actions">
                        <button onclick="window.location.href='{{ route('collections.show', $collection) }}'" class="button-primary flex-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            View Collection
                        </button>
                    </div>
                </div>
                @endforeach

                <div class="collection-card add-collection-card">
                    <div class="add-collection-content">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4v16m8-8H4" />
                        </svg>
                        <button onclick="window.location.href='{{ route('collections.create') }}'" class="button-primary">
                            Create New Collection
                        </button>
                    </div>
                </div>
            </div>
            @endif

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

    .collections-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 2rem;
        margin-top: 2rem;
    }

    .collection-card {
        background-color: var(--bg-card);
        border-radius: 0.5rem;
        padding: 1.5rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        border: 1px solid var(--border-color);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .collection-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--secondary-color), var(--secondary-color-hover));
    }

    .collection-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.2);
    }

    .collection-card-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 0.75rem;
    }

    .collection-card h3 {
        font-size: 1.375rem;
        font-weight: 600;
        color: var(--text-header);
        margin: 0;
        flex: 1;
    }

    .collection-count-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.25rem;
        font-size: 0.875rem;
        padding: 0.375rem 0.75rem;
        border-radius: 9999px;
        background-color: var(--bg-body);
        color: var(--text-main);
        font-weight: 600;
        white-space: nowrap;
    }

    .collection-description {
        color: var(--text-muted);
        line-height: 1.6;
        margin: 0;
        font-size: 0.9375rem;
    }

    .collection-preview {
        padding: 1rem;
        background-color: var(--bg-body);
        border-radius: 0.375rem;
        border: 1px solid var(--border-color);
    }

    .collection-preview-label {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        font-weight: 600;
        color: var(--text-muted);
        margin-bottom: 0.5rem;
    }

    .collection-items-list {
        list-style: none;
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .collection-items-list li {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.875rem;
        color: var(--text-main);
    }

    .collection-items-list svg {
        color: var(--secondary-color);
        flex-shrink: 0;
    }

    .collection-empty {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.5rem;
        padding: 2rem 1rem;
        color: var(--text-muted);
        opacity: 0.6;
    }

    .collection-empty svg {
        opacity: 0.5;
    }

    .collection-empty p {
        font-size: 0.875rem;
        font-style: italic;
    }

    .collection-actions {
        display: flex;
        gap: 0.5rem;
        margin-top: auto;
        padding-top: 0.5rem;
    }

    .add-collection-card {
        border: 2px dashed var(--border-color);
        background-color: transparent;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 300px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .add-collection-card::before {
        display: none;
    }

    .add-collection-card:hover {
        border-color: var(--secondary-color);
        background-color: var(--bg-card);
        transform: none;
    }

    .add-collection-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 1.5rem;
    }

    .add-collection-content svg {
        color: var(--text-muted);
        opacity: 0.5;
    }

    .add-collection-card:hover .add-collection-content svg {
        color: var(--secondary-color);
        opacity: 1;
    }

    @media (max-width: 768px) {
        .collections-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
