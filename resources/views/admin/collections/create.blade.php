<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl" style="color: var(--text-header);">Create Collection for {{ $user->name }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 shadow-sm sm:rounded-lg" style="background-color: var(--bg-card);">
                <form action="{{ route('admin.collections.store', $user) }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block font-bold mb-2" style="color: var(--text-main);">Name</label>
                        <input type="text" name="name" required placeholder="My Awesome Collection">
                    </div>

                    <div class="mb-4">
                        <label class="block font-bold mb-2" style="color: var(--text-main);">Description</label>
                        <textarea name="description" rows="3"></textarea>
                    </div>

                    <button type="submit" class="button-success">Create Collection</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
