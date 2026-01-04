<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl leading-tight" style="color: var(--text-header);">
                Create Collection for {{ $user->name }}
            </h2>
            <a href="{{ route('users.edit', $user) }}" class="button-return" style="right: 0; position: absolute; margin-right: 10%;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                </svg>
                Back to User
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
                <h3 class="text-2xl font-bold mb-2" style="color: var(--text-header);">Create Collection for User</h3>
                <p style="color: var(--text-muted);">
                    Add a new collection to <strong>{{ $user->name }}</strong>'s account
                </p>
            </div>

            <div class="shadow-lg rounded-lg overflow-hidden" style="background-color: var(--bg-card); border: 1px solid var(--border-color);">
                <div style="height: 6px; background: linear-gradient(90deg, var(--secondary-color), var(--secondary-color-hover));"></div>
                
                <div class="p-8">
                    <!-- User Info Banner -->
                    <div class="mb-6 p-4 rounded-lg" style="background-color: var(--bg-body); border: 1px solid var(--border-color);">
                        <div class="flex items-center gap-3">
                            <div class="user-avatar-small">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-semibold" style="color: var(--text-header);">Creating for</p>
                                <p class="font-bold" style="color: var(--text-main);">{{ $user->name }}</p>
                                <p class="text-xs" style="color: var(--text-muted);">{{ $user->email }}</p>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('admin.collections.store', $user) }}" method="POST" class="space-y-6">
                        @csrf

                        <div>
                            <label for="name" class="form-label">
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
                                placeholder="e.g., My Awesome Collection..."
                                style="margin-bottom: 0;"
                            >
                            <p class="mt-2 text-xs" style="color: var(--text-muted);">
                                Choose a descriptive name for this collection
                            </p>
                        </div>

                        <div>
                            <label for="description" class="form-label">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                                </svg>
                                Description (Optional)
                            </label>
                            <textarea 
                                id="description" 
                                name="description" 
                                rows="3"
                                placeholder="Add a description to help organize this collection..."
                                style="margin-bottom: 0; resize: vertical;"
                            ></textarea>
                        </div>

                        <div class="flex gap-3 pt-4">
                            <button type="submit" class="button-success flex-1 inline-flex items-center justify-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Create Collection
                            </button>
                            <a href="{{ route('users.edit', $user) }}" class="button-secondary inline-flex items-center justify-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>