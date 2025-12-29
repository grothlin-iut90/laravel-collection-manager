<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('items.store') }}" method="POST">
                        @csrf
                        <div>
                            <label>Title</label>
                            <input type="text" name="title" required>
                        </div>
                        <div>
                            <label>Description</label>
                            <textarea name="description" required></textarea>
                        </div>
                        <div>
                            <label>Rating (1-5)</label>
                            <input type="number" name="rating" min="1" max="5" required>
                        </div>
                        <div>
                            <label>Condition</label>
                            <input type="text" name="condition" required>
                        </div>
                        <div>
                            <label>Category</label>
                            <select name="category_id" required>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->label }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Obligatoire car pour le moment on stocke un user_id -->
                        <!-- Peut etre a retirer car doublon avec provider_id -->
                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                        <button type="submit" class="button-primary">Create Item</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
