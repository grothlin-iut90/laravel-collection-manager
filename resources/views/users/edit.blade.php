<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl leading-tight" style="color: var(--text-header);">
                {{ __('Edit User') }}
            </h2>
            <a href="{{ route('users.index') }}" class="button-return" style="right: 0; position: absolute; margin-right: 10%;">
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
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full mb-4" style="background-color: rgba(155, 204, 103, 0.1);">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color: var(--success-color);">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-2" style="color: var(--text-header);">Edit User Information</h3>
                <p style="color: var(--text-muted);">
                    Update user details and permissions
                </p>
            </div>

            <div class="shadow-lg rounded-lg overflow-hidden mb-6" style="background-color: var(--bg-card); border: 1px solid var(--border-color);">
                <div style="height: 6px; background: linear-gradient(90deg, var(--success-color), var(--success-color-hover));"></div>

                <div class="p-8">
                    <form action="{{ route('users.update', $user) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="name" class="form-label">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Name *
                            </label>
                            <input type="text" id="name" name="name" value="{{ $user->name }}" required style="margin-bottom: 0;">
                        </div>

                        <div>
                            <label for="email" class="form-label">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                Email *
                            </label>
                            <input type="email" id="email" name="email" value="{{ $user->email }}" required style="margin-bottom: 0;">
                        </div>

                        <div>
                            <label for="role" class="form-label">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                                Role *
                            </label>
                            <select id="role" name="role" required style="margin-bottom: 0;">
                                <option value="consumer" {{ $user->role == 'consumer' ? 'selected' : '' }}>Consumer</option>
                                <option value="provider" {{ $user->role == 'provider' ? 'selected' : '' }}>Provider</option>
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                        </div>

                        <div class="flex gap-3 pt-4">
                            <button type="submit" class="button-success flex-1 inline-flex items-center justify-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Update User
                            </button>
                            <a href="{{ route('users.show', $user) }}" class="button-secondary inline-flex items-center justify-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            @if($user->role === 'consumer')
                <div class="shadow-lg rounded-lg overflow-hidden" style="background-color: var(--bg-card); border: 1px solid var(--border-color);">
                    <div class="p-6 border-b" style="border-color: var(--border-color);">
                        <h3 class="text-lg font-bold" style="color: var(--text-header);">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color: var(--secondary-color);">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                            {{ __('User Collections') }}
                        </h3>
                        <p class="text-sm mt-1" style="color: var(--text-muted);">
                            Manage collections owned by {{ $user->name }}.
                        </p>
                    </div>

                    <div class="p-6">
                        @if($user->collections->isNotEmpty())
                            <div class="overflow-x-auto rounded-lg border" style="border-color: var(--border-color);">
                                <table class="min-w-full">
                                    <thead style="background-color: var(--bg-body); border-bottom: 2px solid var(--border-color);">
                                        <tr>
                                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase" style="color: var(--text-muted);">Name</th>
                                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase" style="color: var(--text-muted);">Description</th>
                                            <th class="px-6 py-4 text-center text-xs font-semibold uppercase" style="color: var(--text-muted);">Items</th>
                                            <th class="px-6 py-4 text-right text-xs font-semibold uppercase" style="color: var(--text-muted);">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($user->collections as $collection)
                                            <tr class="border-b hover:bg-opacity-50 transition-colors" style="border-color: var(--border-color);">
                                                <td class="px-6 py-4 font-medium" style="color: var(--text-header);">{{ $collection->name }}</td>
                                                <td class="px-6 py-4" style="color: var(--text-muted);">
                                                    {{ Str::limit($collection->description, 50) }}
                                                </td>
                                                <td class="px-6 py-4 text-center">
                                                    <span class="px-2 py-1 rounded text-xs font-bold" style="background-color: var(--bg-body); color: var(--text-header);">
                                                        {{ $collection->items->count() }}
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 text-right space-x-2 flex justify-end items-center">
                                                    <button onclick="window.location='{{ route('admin.collections.show', $collection) }}'" class="button-success text-sm">Edit</button>
                                                    <form action="{{ route('admin.collections.destroy', $collection) }}" method="POST" onsubmit="return confirm('Delete this collection?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="button-danger text-sm">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-4">
                                <button class="button-primary" onclick="window.location='{{ route('admin.collections.create', ['user' => $user->id]) }}'">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    New Collection
                                </button>
                            </div>
                        @else
                            <div class="text-center py-8" style="color: var(--text-muted);">
                                {{ __('No collections found for this user.') }}
                            </div>
                        @endif
                    </div>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
