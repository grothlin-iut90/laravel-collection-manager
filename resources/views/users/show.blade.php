<x-app-layout>
    <x-slot name="header">
    <h2 class="header-title">
        {{ __('User Details') }}
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
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2>{{ $user->name }}</h2>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Role:</strong> {{ ucfirst($user->role) }}</p>

                    <button onclick="window.location.href='{{ route('users.edit', $user->id) }}'" class="button-success">
                        Edit User
                    </button>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Delete this user?');" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button-danger"  {{ $user->id === auth()->user()->id ? 'disabled' : '' }}>
                            Delete User
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
