<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="dashboard-content">
            {{ __("You're logged in!") }}
            <br>
            @if (auth()->user()->role === 'consumer')
            <a href="{{ route('items.index') }}" class="item-link">Manage My Items</a>
            <a href="{{ route('collections.index') }}" class="item-link">Manage My Collections</a>
            @elseif (auth()->user()->role === 'provider' || auth()->user()->role === 'admin')
            <a href="{{ route('categories.index') }}" class="item-link">Manage Categories</a>
            @endif
        </div>
        @if (auth()->user()->role === 'consumer')
        <div class="object-grid">
         @foreach($items as $item)
            <div class="dashboard-content">
                <h2>{{ $item->title }}</h2>
                <p>{{ $item->description }}</p>
                <a href="{{ route('items.show', $item->id) }}" class="item-link">View Item</a>
            </div>
         @endforeach
        </div>
        @endif
    </div>
</x-app-layout>
<style>
    body {
        font-family: 'Instrument Sans', sans-serif;
        background-color: var(--bg-body);
        color: var(--text-main);
        align-items: center;
        justify-content: flex-start;
        min-height: 100vh;
    }

    h2 {
        font-weight: 600; 
        font-size: 1.25rem; 
        color: #1f2937; 
        line-height: 1.25;
    }

    .container {
        padding-top: 3rem; 
        padding-bottom: 3rem;
        max-width: 80rem; 
        margin-left: auto; 
        margin-right: auto; 
        padding-left: 1.5rem; 
        padding-right: 1.5rem;
    }

    .dashboard-content {
        background-color: white; 
        overflow: hidden; 
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06); 
        border-radius: 0.5rem;
        padding: 1.5rem; 
        color: #1a202c;
    }

    .item-link {
        display: inline-block; 
        margin-top: 1rem; 
        padding: 0.5rem 1.5rem; 
        background-color: var(--primary-blue); 
        color: white; 
        text-decoration: none; 
        border-radius: 0.125rem; 
        font-size: 0.875rem; 
        transition: background-color 0.2s;
    }

    .item-link:hover {
        background-color: var(--primary-blue-hover); 
    }

    .object-grid {
        margin-top: 2rem;
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 1.5rem;
    }
</style>