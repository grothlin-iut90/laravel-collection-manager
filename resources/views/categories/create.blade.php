<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf
                        <div>
                            <label>Label</label>
                            <input type="text" name="label" required>
                        </div>
                        <button type="submit" class="button-primary">Create Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
