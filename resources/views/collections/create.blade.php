<x-app-layout>
    <x-slot name="header">
        <h2>Create New Collection</h2>
    </x-slot>
    <div class="container">
        <form action="{{ route('collections.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="mt-1 block w-full" required>
            </div>
            <div class="mb-4">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="mt-1 block w-full"></textarea>
            </div>
            <button type="submit" class="button-primary">Create Collection</button>
        </form>
    </div>
</x-app-layout>
<style>
    .container {
        padding: 20px;
        background-color: var(--bg-main);
        border-radius: 8px;
        margin: 0 auto;
    }

    label {
        font-weight: 600;
        color: var(--text-main);
    }
</style>