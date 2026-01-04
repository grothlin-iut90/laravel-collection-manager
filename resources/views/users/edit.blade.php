<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight" style="color: var(--text-header);">
            {{ __('Edit Users') }}
        </h2>
        <a href="{{ route('users.index') }}" class="button-return">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
            </svg>
            Back
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="overflow-hidden shadow-sm sm:rounded-lg mb-6" style="background-color: var(--bg-card);">
                <div class="p-6">
                    <form action="{{ route('users.update', $user) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="block font-bold mb-2" style="color: var(--text-main);">Name</label>
                            <input type="text" name="name" value="{{ $user->name }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="block font-bold mb-2" style="color: var(--text-main);">Email</label>
                            <input type="email" name="email" value="{{ $user->email }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="block font-bold mb-2" style="color: var(--text-main);">Role</label>
                            <select name="role" required>
                                <option value="consumer" {{ $user->role == 'consumer' ? 'selected' : '' }}>User</option>
                                <option value="provider" {{ $user->role == 'provider' ? 'selected' : '' }}>Provider</option>
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                        </div>

                        <button type="submit" class="button-success">Update user</button>
                    </form>
                </div>
            </div>

            @if($user->role === 'consumer')
                <div class="overflow-hidden shadow-sm sm:rounded-lg" style="background-color: var(--bg-card);">
                    <div class="p-6 border-b" style="border-color: var(--border-color);">
                        <h3 class="header-title">{{ __('User Collections') }}</h3>
                        <p class="text-sm mt-1" style="color: var(--text-muted);">
                            Manage collections owned by {{ $user->name }}.
                        </p>
                    </div>

                    <div class="p-6">
                        @if($user->collections->isNotEmpty())
                            <div class="overflow-x-auto">
                                <table class="min-w-full text-left text-sm whitespace-nowrap">
                                    <thead class="uppercase tracking-wider border-b-2" style="border-color: var(--border-color); color: var(--text-muted);">
                                        <tr>
                                            <th scope="col" class="px-6 py-4">Name</th>
                                            <th scope="col" class="px-6 py-4">Description</th>
                                            <th scope="col" class="px-6 py-4">Items count</th>
                                            <th scope="col" class="px-6 py-4 text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody style="color: var(--text-main);">
                                        @foreach($user->collections as $collection)
                                            <tr class="border-b transition duration-300 ease-in-out hover:bg-opacity-10" style="border-color: var(--border-color);">
                                                <td class="px-6 py-4 font-medium">{{ $collection->name }}</td>
                                                <td class="px-6 py-4">
                                                    {{ Str::limit($collection->description, 50) }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    <span class="px-2 py-1 rounded text-xs font-bold" style="background-color: var(--bg-body); color: var(--text-header);">
                                                        {{ $collection->items->count() }}
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 text-right">
                                                    <form action="{{ route('admin.collections.destroy', $collection) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this collection? This action cannot be undone.');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="button-danger text-sm" style="padding: 0.25rem 0.75rem;">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center py-4" style="color: var(--text-muted);">
                                {{ __('No collections found for this user.') }}
                            </div>
                        @endif
                    </div>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
