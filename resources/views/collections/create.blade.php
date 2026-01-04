<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl leading-tight" style="color: var(--text-header);">
                {{ __('Create New Collection') }}
            </h2>
            <a href="{{ route('collections.index') }}" class="button-return">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                </svg>
                Back
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-8 text-center">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full mb-4" style="background-color: rgba(162, 62, 72, 0.1);">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color: var(--secondary-color);">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-2" style="color: var(--text-header);">Create a New Collection</h3>
                <p style="color: var(--text-muted);">
                    Organize your items into a personalized collection with a name and description.
                </p>
            </div>

            <div class="shadow-lg rounded-lg overflow-hidden" style="background-color: var(--bg-card); border: 1px solid var(--border-color);">
                <div class="p-8">
                    <form action="{{ route('collections.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div>
                            <label for="name" class="block text-sm font-semibold mb-2" style="color: var(--text-header);">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                </svg>
                                Collection Name *
                            </label>
                            <input 
                                type="text" 
                                id="name" 
                                name="name" 
                                required 
                                placeholder="e.g., My Favorite Books, Rare Vinyl Collection..."
                                value="{{ old('name') }}"
                                style="margin-bottom: 0;"
                            >
                            <p class="mt-2 text-xs" style="color: var(--text-muted);">
                                Choose a descriptive name that represents your collection.
                            </p>
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-semibold mb-2" style="color: var(--text-header);">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                                </svg>
                                Description (Optional)
                            </label>
                            <textarea 
                                id="description" 
                                name="description" 
                                rows="4" 
                                placeholder="Add a description to help you remember what this collection is about..."
                                style="margin-bottom: 0; resize: vertical;"
                            >{{ old('description') }}</textarea>
                            <p class="mt-2 text-xs" style="color: var(--text-muted);">
                                Provide additional context or notes about this collection.
                            </p>
                        </div>

                        <div class="bg-opacity-50 rounded-lg p-4" style="background-color: var(--bg-body); border: 1px solid var(--border-color);">
                            <div class="flex items-start gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color: var(--secondary-color);">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <div>
                                    <p class="text-sm font-medium mb-1" style="color: var(--text-header);">Quick Tip</p>
                                    <p class="text-xs" style="color: var(--text-muted);">
                                        After creating your collection, you can add items from the dashboard by viewing any item and selecting this collection.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="flex gap-3 pt-4">
                            <button type="submit" class="button-primary flex-1 inline-flex items-center justify-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Create Collection
                            </button>
                            <a href="{{ route('collections.index') }}" class="button-secondary inline-flex items-center justify-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="text-center p-4 rounded-lg" style="background-color: var(--bg-card); border: 1px solid var(--border-color);">
                    <div class="inline-flex items-center justify-center w-12 h-12 rounded-full mb-3" style="background-color: rgba(227, 178, 60, 0.1);">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color: var(--primary-color);">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                    </div>
                    <h4 class="font-semibold mb-1" style="color: var(--text-header);">Organize</h4>
                    <p class="text-xs" style="color: var(--text-muted);">Group related items together</p>
                </div>

                <div class="text-center p-4 rounded-lg" style="background-color: var(--bg-card); border: 1px solid var(--border-color);">
                    <div class="inline-flex items-center justify-center w-12 h-12 rounded-full mb-3" style="background-color: rgba(162, 62, 72, 0.1);">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color: var(--secondary-color);">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </div>
                    <h4 class="font-semibold mb-1" style="color: var(--text-header);">Track</h4>
                    <p class="text-xs" style="color: var(--text-muted);">Keep tabs on your items</p>
                </div>

                <div class="text-center p-4 rounded-lg" style="background-color: var(--bg-card); border: 1px solid var(--border-color);">
                    <div class="inline-flex items-center justify-center w-12 h-12 rounded-full mb-3" style="background-color: rgba(155, 204, 103, 0.1);">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color: var(--success-color);">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h4 class="font-semibold mb-1" style="color: var(--text-header);">Manage</h4>
                    <p class="text-xs" style="color: var(--text-muted);">Easy to update anytime</p>
                </div>
            </div>

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

    input[type="text"],
    textarea {
        transition: all 0.2s ease;
    }

    input[type="text"]:focus,
    textarea:focus {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
</style>