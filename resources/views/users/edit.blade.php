<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
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
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('users.update', $user) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div>
                            <label>Name</label>
                            <input type="text" name="name" value="{{ $user->name }}" required>
                        </div>

                        <div>
                            <label>Email</label>
                            <input type="email" name="email" value="{{ $user->email }}" required>
                        </div>

                        <div>
                            <label>Role</label>
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
        </div>
    </div>
</x-app-layout>
