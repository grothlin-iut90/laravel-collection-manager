<x-app-layout>
    <x-slot name="header">
        <h2 class="dashboard-title">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="dashboard-content">
            {{ __("You're logged in!") }}
            <br>
            @if (auth()->user()->role === 'consumer')
            <button onclick="window.location.href='{{ route('collections.index') }}'" class="item-link">Manage my lists</button>
            @elseif (auth()->user()->role === 'provider' || auth()->user()->role === 'admin')
            <button onclick="window.location.href='{{ route('categories.index') }}'" class="item-link">Manage Categories</button>
            @endif
        </div>
        @if (auth()->user()->role === 'consumer')
        <div class="object-grid">
         @foreach($items as $item)
            <div class="item-card">
                <h2>{{ $item->title }}</h2>
                <p>{{ $item->description }}</p>
                <button onclick="window.location.href='{{ route('items.show', $item->id) }}'" class="item-link">View Item</button>
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
        min-height: 100vh;
    }

    .dashboard-header {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-color-hover) 100%);
        color: var(--white);
        padding: 2rem 0;
        text-align: center;
        border-radius: 0.5rem;
        margin-bottom: 2rem;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .dashboard-header h2 {
        font-size: 2.5rem;
        font-weight: 700;
        margin: 0;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 1.5rem 0;
    }

    .dashboard-content {
        background-color: var(--bg-card);
        color: var(--text-main);
        border-radius: 1rem;
        padding: 2rem;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        border: 1px solid var(--border-color);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        margin-bottom: 2rem;
    }

    .dashboard-content:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
    }

    .dashboard-content h2 {
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--primary-color);
        margin-bottom: 0.5rem;
    }

    .dashboard-content p {
        color: var(--text-muted);
        margin-bottom: 1rem;
    }

    .item-link {
        display: inline-block;
        padding: 0.75rem 1.5rem;
        background-color: var(--primary-color);
        color: var(--white);
        text-decoration: none;
        border-radius: 0.5rem;
        font-weight: 500;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .item-link:hover {
        background-color: var(--primary-color-hover);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
    }

    .object-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 2rem;
        margin-top: 2rem;
    }

    .item-card {
        background-color: var(--bg-card);
        border-radius:0 0 1rem 1rem;
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