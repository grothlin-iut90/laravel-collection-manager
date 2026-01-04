<x-app-layout>
    <x-slot name="header">
        <h2 class="header-title">
            {{ __('Category Details') }}
        </h2>
        <a href="{{ route('categories.index') }}" class="button-return">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
            </svg>
            Back
        </a>
    </x-slot>

    <div class="container">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3>{{ $category->label }}</h3>
                    <p><strong>Items in this category:</strong> {{ $category->items->count() }}</p>
                    <div style="margin-top: 20px;">
                        <a href="{{ route('categories.edit', $category) }}" class="button-primary mt-4">Edit</a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Delete this category?');" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button-danger mt-4" {{ $category->items->count() > 0 ? 'disabled' : '' }}>
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="object-grid">

            @foreach($items as $item)
            <div class="item-card">
                <h2>{{ $item->title }}</h2>
                <p>{{ $item->description }}</p>
                <div class="mt-4 flex gap-2">
                    <button onclick="window.location.href='{{ route('items.show', $item->id) }}'" class="button-primary w-full">
                        View Item
                    </button>

                    @if(auth()->user()->role === 'provider' || auth()->user()->role === 'admin')
                    <button onclick="window.location.href='{{ route('items.edit', $item->id) }}'" class="button-success w-full">
                        Edit
                    </button>
                    <form action="{{ route('items.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Delete this item?');" class="inline">
                        @csrf   
                        @method('DELETE')
                        <button type="submit" class="button-danger w-full" {{ $item->category->items_count > 0 ? 'disabled' : '' }}>
                            Delete
                        </button>
                    </form>
                    @endif
                </div>
            </div>
            @endforeach
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

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 1.5rem 0;
    }

    .object-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 2rem;
        margin-top: 2rem;
    }

    .item-card {
        background-color: var(--bg-card);
        border-radius: 0 0 0.5rem 0.5rem;
        padding: 1.5rem;
        box-shadow: 0 6px 24px rgba(0, 0, 0, 0.1);
        border: 1px solid var(--border-color);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
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

    .item-card h2 {
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--text-main);
        margin-bottom: 0.5rem;
    }

    .item-card p {
        color: var(--text-muted);
        margin-bottom: 1rem;
        line-height: 1.5;
    }

    .item-card .item-link {
        margin-top: 1rem;
    }

    @media (max-width: 768px) {
        .object-grid {
            grid-template-columns: 1fr;
        }

        .dashboard-header h2 {
            font-size: 2rem;
        }
    }
</style>
