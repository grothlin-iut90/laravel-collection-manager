<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight" style="color: var(--text-header);">
            {{ __('Dashboard') }}
        </h2>

        <div class="flex items-center gap-3">

            @if (auth()->user()->role === 'consumer')
            <a href="{{ route('collections.index') }}" class="button-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
                Manage My Collections
            </a>

            @elseif (auth()->user()->role === 'provider' || auth()->user()->role === 'admin')
            <a href="{{ route('items.create') }}" class="button-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add Item
            </a>

            @if (auth()->user()->role === 'admin')
            <a href="{{ route('categories.index') }}" class="button-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                </svg>
                Manage Categories
            </a>
            @endif
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(auth()->user()->role === 'provider')
            <div class="mb-8">
                <div class="flex items-center gap-3 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color: var(--primary-color);">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                    <h3 class="text-2xl font-bold" style="color: var(--text-header);">Your Provided Items</h3>
                </div>
                <p style="color: var(--text-muted);">
                    Manage and view all the items you're providing to the platform.
                </p>
            </div>
            @elseif(auth()->user()->role === 'consumer')
            <div class="mb-8">
                <div class="flex items-center gap-3 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color: var(--primary-color);">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                    <h3 class="text-2xl font-bold" style="color: var(--text-header);">Available Items</h3>
                </div>
                <p style="color: var(--text-muted);">
                    Browse all available items and add them to your collections.
                </p>
            </div>
            @elseif(auth()->user()->role === 'admin')
            <div class="mb-8">
                <div class="flex items-center gap-3 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color: var(--primary-color);">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                    <h3 class="text-2xl font-bold" style="color: var(--text-header);">All Items</h3>
                </div>
                <p style="color: var(--text-muted);">
                    View and manage all items across the platform.
                </p>
            </div>
            @endif

            @if($items->isEmpty())
            <div class="shadow-lg rounded-lg p-12 text-center" style="background-color: var(--bg-card); border: 1px solid var(--border-color);">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color: var(--text-muted); opacity: 0.5;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                </svg>
                <h3 class="text-xl font-bold mb-2" style="color: var(--text-header);">No Items Yet</h3>
                <p class="mb-6" style="color: var(--text-muted);">
                    @if(auth()->user()->role === 'provider' || auth()->user()->role === 'admin')
                    Start adding items to your inventory.
                    @else
                    There are no items available at the moment.
                    @endif
                </p>
                @if(auth()->user()->role === 'provider' || auth()->user()->role === 'admin')
                <a href="{{ route('items.create') }}" class="button-primary inline-flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Add Your First Item
                </a>
                @endif
            </div>
            @else
            <div class="object-grid">
                @foreach($items as $item)
                <div class="item-card">
                    <div class="item-card-header">
                        <h2>{{ $item->title }}</h2>
                        <span class="item-category-badge">{{ $item->category->label }}</span>
                    </div>

                    <p class="item-description">{{ Str::limit($item->description, 100) }}</p>

                    <div class="item-meta">
                        <div class="item-meta-item">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <span>{{ $item->rating }}/5</span>
                        </div>
                        <div class="item-meta-item">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>{{ $item->condition }}</span>
                        </div>
                    </div>

                    <div class="item-actions flex items-center gap-2 mt-4 w-full">

                        <a href="{{ route('items.show', $item->id) }}"
                            class="button-primary flex-1 flex items-center justify-center text-center"
                            style="text-decoration: none;">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            View
                        </a>

                        @if(auth()->user()->role === 'provider' || auth()->user()->role === 'admin')

                        <a href="{{ route('items.edit', $item->id) }}"
                            class="button-success flex items-center justify-center"
                            style="width: 42px; padding: 0.5rem; text-decoration: none;"
                            title="Edit">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </a>

                        <form action="{{ route('items.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Delete this item?');" class="flex">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="button-danger flex items-center justify-center"
                                style="width: 42px; padding: 0.5rem;"
                                title="Delete">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </form>
                        @endif
                    </div>
                </div>
                @endforeach

                @if (auth()->user()->role === 'provider' || auth()->user()->role === 'admin')
                <div class="item-card add-item-card">
                    <div class="add-item-content">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4v16m8-8H4" />
                        </svg>
                        <button onclick="window.location.href='{{ route('items.create') }}'" class="button-primary">
                            Add New Item
                        </button>
                    </div>
                </div>
                @endif
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

    .object-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 2rem;
        margin-top: 2rem;
    }

    .item-card {
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

    .item-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-color), var(--primary-color-hover));
    }

    .item-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.2);
    }

    .item-card-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 0.5rem;
    }

    .item-card h2 {
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--text-header);
        margin: 0;
        flex: 1;
    }

    .item-category-badge {
        font-size: 0.75rem;
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        background-color: var(--bg-body);
        color: var(--text-main);
        font-weight: 500;
        white-space: nowrap;
    }

    .item-description {
        color: var(--text-muted);
        line-height: 1.6;
        margin: 0;
    }

    .item-meta {
        display: flex;
        gap: 1rem;
        padding-top: 0.5rem;
        border-top: 1px solid var(--border-color);
    }

    .item-meta-item {
        display: flex;
        align-items: center;
        gap: 0.375rem;
        font-size: 0.875rem;
        color: var(--text-muted);
    }

    .item-meta-item svg {
        color: var(--primary-color);
    }

    .item-actions {
        display: flex;
        gap: 0.5rem;
        margin-top: auto;
        padding-top: 0.5rem;
    }

    .item-actions button,
    .item-actions form {
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .button-success,
    .button-danger {
        padding: 0.5rem;
        min-width: auto;
        margin: 0;
    }

    .add-item-card {
        border: 2px dashed var(--border-color);
        background-color: transparent;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 250px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .add-item-card::before {
        display: none;
    }

    .add-item-card:hover {
        border-color: var(--primary-color);
        background-color: var(--bg-card);
        transform: none;
    }

    .add-item-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 1.5rem;
    }

    .add-item-content svg {
        color: var(--text-muted);
        opacity: 0.5;
    }

    .add-item-card:hover .add-item-content svg {
        color: var(--primary-color);
        opacity: 1;
    }

    @media (max-width: 768px) {
        .object-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
