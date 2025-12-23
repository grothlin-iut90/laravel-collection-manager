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
            <a href="{{ route('items.index') }}" style="color: black; font-weight: bold; padding: 0.5rem 1rem; border-radius: 0.25rem;">Manage My Items</a>
            @if(auth()->user()->role === 'provider' || auth()->user()->role === 'admin')
            <a href="{{ route('categories.index') }}" style="color: black; font-weight: bold; padding: 0.5rem 1rem; border-radius: 0.25rem;">Manage Categories</a>
            @endif
        </div>
    </div>
</x-app-layout>
<style> 
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
</style>