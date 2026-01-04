<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl leading-tight" style="color: var(--text-header);">
                {{ __('Category Details') }}
            </h2>
            <a href="{{ route('categories.index') }}" class="button-return" style="right: 0; position: absolute; margin-right: 10%;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                </svg>
                Back
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Category Info Card -->
            <div class="shadow-lg rounded-lg overflow-hidden mb-6" style="background-color: var(--bg-card); border: 1px solid var(--border-color);">
                <div style="height: 6px; background: linear-gradient(90deg, var(--secondary-color), var(--secondary-color-hover));"></div>
                
                <div class="p-8">
                    <div class="flex items-start justify-between mb-6">
                        <div class="flex items-center gap-4">
                            <div class="category-icon-large">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                </svg>
                            </div>
                            <div>
                                <h1 class="text-3xl font-bold" style="color: var(--text-header);">{{ $category->label }}</h1>
                                <p class="text-sm mt-1" style="color: var(--text-muted);">
                                    <strong>{{ $category->items->count() }}</strong> {{ $category->items->count() > 1 ? 'items' : 'item' }} in this category
                                </p>
                            </div>
                        </div>
                        
                        <div class="flex gap-2">
                            <a href="{{ route('categories.edit', $category) }}" class="button-success">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Edit
                            </a>
                            <form action="{{ route('categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Delete this category?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="button-danger" {{ $category->items->count() > 0 ? 'disabled' : '' }}>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Items Grid -->
            @if($items->isEmpty())
                <div class="shadow-lg rounded-lg p-12 text-center" style="background-color: var(--bg-card); border: 1px solid var(--border-color);">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color: var(--text-muted); opacity: 0.5;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                    </svg>
                    <h3 class="text-xl font-bold mb-2" style="color: var(--text-header);">No Items Yet</h3>
                    <p class="mb-6" style="color: var(--text-muted);">
                        This category doesn't have any items yet.
                    </p>
                    <a href="{{ route('items.create') }}" class="button-primary inline-flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Add First Item
                    </a>
                </div>
            @else
                <div class="object-grid">
                    @foreach($items as $item)
                        <div class="item-card">
                            <div class="item-card-header">
                                <h2>{{ $item->title }}</h2>
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

                            <div class="item-actions">
                                <button onclick="window.location.href='{{ route('items.show', $item->id) }}'" class="button-primary flex-1">
                                    View Item
                                </button>
                                @if(auth()->user()->role === 'provider' || auth()->user()->role === 'admin')
                                    <button onclick="window.location.href='{{ route('items.edit', $item->id) }}'" class="button-success" style="height: fit-content;">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                    <form action="{{ route('items.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Delete this item?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="button-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </div>
</x-app-layout>

<style>
    .button-primary {
        padding: 0;
        margin: 0;
    }

    .category-icon-large {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 4rem;
        height: 4rem;
        border-radius: 0.75rem;
        background-color: rgba(162, 62, 72, 0.1);
        color: var(--secondary-color);
    }

    .object-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 2rem;
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
        background: linear-gradient(90deg, var(--secondary-color), var(--secondary-color-hover));
    }

    .item-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.2);
    }

    .item-card-header h2 {
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--text-header);
        margin: 0;
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
        color: var(--secondary-color);
    }

    .item-actions {
        display: flex;
        gap: 0.5rem;
        margin-top: auto;
        padding-top: 0.5rem;
    }

    .button-success,
    .button-danger {
        padding: 0.5rem;
        min-width: auto;
        margin: 0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    @media (max-width: 768px) {
        .object-grid {
            grid-template-columns: 1fr;
        }
    }
</style>