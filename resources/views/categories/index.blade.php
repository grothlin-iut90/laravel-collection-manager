@if(auth()->user()->role === 'provider' || auth()->user()->role === 'admin')
<x-app-layout>
    <x-slot name="header">
        <h2 class="header-title">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('categories.create') }}" class="button-success">Add new category</a>
                    <table class="min-w-full mt-4">
                        <thead></thead>
                            <tr>
                                <th>Label</th>
                                <th>Actions</th>
                                <th>Stats</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->label }}</td>
                                <td>
                                    <a href="{{ route('categories.show', $category) }}" class="button-primary">View</a>
                                    <a href="{{ route('categories.edit', $category) }}" class="button-edit">Edit</a>
                                    <form action="{{ route('categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Delete this category?');" class="inline">
                                        @csrf
                                        <button type="submit" class="button-danger" {{ $category->items_count > 0 ? 'disabled' : '' }}>
                                            Delete
                                        </button>
                                    </form>
                                </td>
                                <td> Has {{ $category->items_count }} item{{ $category->items_count > 1 ? 's' : '' }}</td>
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
        <h2 class="font-semibold text-xl text-red-500 leading-tight">
            {{ __('Unauthorized Access') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You do not have permission to access this page.") }}
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4 flex justify-end">
            <a href="{{ route('dashboard') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back to Dashboard</a>
        </div>
    </div>
</x-app-layout>
@endif
