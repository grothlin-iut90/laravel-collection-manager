<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight" style="color: var(--text-header);">
            {{ __('Manage Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-8">
                <div class="flex items-center gap-3 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color: var(--success-color);">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <h3 class="text-2xl font-bold" style="color: var(--text-header);">User Management</h3>
                </div>
                <p style="color: var(--text-muted);">
                    View and manage all registered users on the platform.
                </p>
            </div>

            <div class="shadow-lg rounded-lg overflow-hidden" style="background-color: var(--bg-card); border: 1px solid var(--border-color);">
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead style="background-color: var(--bg-body); border-bottom: 2px solid var(--border-color);">
                            <tr>
                                <th class="py-4 px-6 text-left text-xs font-semibold uppercase tracking-wider" style="color: var(--text-muted);">
                                    User
                                </th>
                                <th class="py-4 px-6 text-left text-xs font-semibold uppercase tracking-wider" style="color: var(--text-muted);">
                                    Email
                                </th>
                                <th class="py-4 px-6 text-center text-xs font-semibold uppercase tracking-wider" style="color: var(--text-muted);">
                                    Role
                                </th>
                                <th class="py-4 px-6 text-right text-xs font-semibold uppercase tracking-wider" style="color: var(--text-muted);">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr class="border-b hover:bg-opacity-50 transition-colors" style="border-color: var(--border-color);">
                                    <td class="py-4 px-6">
                                        <div class="flex items-center gap-3">
                                            <div class="user-avatar">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="font-semibold" style="color: var(--text-header);">
                                                    {{ $user->name }}
                                                    @if($user->id === auth()->user()->id)
                                                        <span class="text-xs ml-2" style="color: var(--primary-color);">(You)</span>
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span style="color: var(--text-main); font-size: 0.875rem;">{{ $user->email }}</span>
                                    </td>
                                    <td class="py-4 px-6 text-center">
                                        <span class="role-badge role-{{ $user->role }}">
                                            {{ ucfirst($user->role) }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="flex items-center justify-end gap-2">
                                            <a href="{{ route('users.show', $user) }}" class="button-primary text-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                                View
                                            </a>
                                            <a href="{{ route('users.edit', $user) }}" class="button-success text-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>
                                            <form action="{{ route('users.destroy', $user) }}" method="POST" onsubmit="return confirm('Delete this user?');" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="button-danger text-sm" {{ $user->id === auth()->user()->id ? 'disabled' : '' }}>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
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

<style>
    table tr:hover {
        background-color: var(--bg-hover);
    }

    .button-primary.text-sm,
    .button-success.text-sm,
    .button-danger.text-sm {
        padding: 0.5rem 0.75rem;
        font-size: 0.875rem;
        display: inline-flex;
        align-items: center;
        gap: 0.25rem;
        margin: 0;
    }

    .user-avatar {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 9999px;
        background-color: rgba(155, 204, 103, 0.1);
        color: var(--success-color);
    }

    .role-badge {
        display: inline-flex;
        align-items: center;
        padding: 0.375rem 0.875rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .role-badge.role-admin {
        background-color: rgba(162, 62, 72, 0.1);
        color: var(--secondary-color);
    }

    .role-badge.role-provider {
        background-color: rgba(227, 178, 60, 0.1);
        color: var(--primary-color);
    }

    .role-badge.role-consumer {
        background-color: rgba(155, 204, 103, 0.1);
        color: var(--success-color);
    }
</style>