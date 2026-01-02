<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($users as $user)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }} {{ $user->id === auth()->user()->id ? '(you)' : '' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ ucfirst($user->role) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button onclick="window.location.href='{{ route('users.show', $user) }}'" class="button-primary">View</button>
                                    <button onclick="window.location.href='{{ route('users.edit', $user) }}'" class="button-success">Edit</button>
                                    <form action="{{ route('users.destroy', $user) }}" method="POST" onsubmit="return confirm('Delete this user?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="button-danger"  {{ $user->id === auth()->user()->id ? 'disabled' : '' }}>Delete</button>
                                    </form>
                                    @if($user->role === 'consumer')
                                        <button onclick="window.location.href='{{ route('collections.indexByUser', $user) }}'" class="button-success">Edit collection</button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
