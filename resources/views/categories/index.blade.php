@if(auth()->user()->role === 'provider' || auth()->user()->role === 'admin')
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl leading-tight" style="color: var(--text-header);">
                {{ __('Categories') }}
            </h2>
            <a href="{{ route('categories.create') }}" class="button-success inline-flex items-center gap-2" style="right: 0; position: absolute; margin-right: 10%;">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add New Category
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-8">
                <div class="flex items-center gap-3 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color: var(--secondary-color);">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                    </svg>
                    <h3 class="text-2xl font-bold" style="color: var(--text-header);">Manage Categories</h3>
                </div>
                <p style="color: var(--text-muted);">
                    Organize items by creating and managing categories.
                </p>
            </div>

            <div class="shadow-lg rounded-lg overflow-hidden" style="background-color: var(--bg-card); border: 1px solid var(--border-color);">
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead style="background-color: var(--bg-body); border-bottom: 2px solid var(--border-color);">
                            <tr>
                                <th class="py-4 px-6 text-left text-xs font-semibold uppercase tracking-wider" style="color: var(--text-muted);">
                                    Category Name
                                </th>
                                <th class="py-4 px-6 text-center text-xs font-semibold uppercase tracking-wider" style="color: var(--text-muted);">
                                    Items Count
                                </th>
                                <th class="py-4 px-6 text-right text-xs font-semibold uppercase tracking-wider" style="color: var(--text-muted);">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr class="border-b hover:bg-opacity-50 transition-colors" style="border-color: var(--border-color);">
                                    <td class="py-4 px-6">
                                        <div class="flex items-center gap-3">
                                            <div class="category-icon-small">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                                </svg>
                                            </div>
                                            <span class="font-semibold" style="color: var(--text-header);">{{ $category->label }}</span>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 text-center">
                                        <span class="inline-flex items-center justify-center px-3 py-1 rounded-full text-sm font-semibold" style="background-color: var(--bg-body); color: var(--text-main);">
                                            {{ $category->items_count }} {{ $category->items_count > 1 ? 'items' : 'item' }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="flex items-center justify-end gap-2">
                                            <a href="{{ route('categories.show', $category) }}" class="button-primary text-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                                View
                                            </a>
                                            <a href="{{ route('categories.edit', $category) }}" class="button-success text-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>
                                            <form action="{{ route('categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Delete this category?');" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="button-danger text-sm" {{ $category->items_count > 0 ? 'disabled' : '' }}>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
@else
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight" style="color: var(--danger-color);">
            {{ __('Unauthorized Access') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="shadow-lg rounded-lg p-12 text-center" style="background-color: var(--bg-card); border: 1px solid var(--border-color);">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color: var(--danger-color); opacity: 0.5;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
                <h3 class="text-xl font-bold mb-2" style="color: var(--text-header);">Access Denied</h3>
                <p class="mb-6" style="color: var(--text-muted);">
                    {{ __("You do not have permission to access this page.") }}
                </p>
                <a href="{{ route('dashboard') }}" class="button-primary">Back to Dashboard</a>
            </div>
        </div>
    </div>
</x-app-layout>
@endif

<style>
    table tr:hover {
        background-color: var(--bg-hover);
    }

    .button-primary.text-sm,
    .button-success.text-sm,
    .button-danger.text-sm {
        padding: 0.5rem 0.75rem;
        font-size: 0.875rem;
        display: inline-flex;
        align-items: center;
        gap: 0.25rem;
        margin: 0;
    }

    .category-icon-small {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 2rem;
        height: 2rem;
        border-radius: 0.375rem;
        background-color: rgba(162, 62, 72, 0.1);
        color: var(--secondary-color);
    }
</style>