<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl leading-tight" style="color: var(--text-header);">
                {{ __('User Details') }}
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
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            <!-- User Info Card -->
            <div class="shadow-lg rounded-lg overflow-hidden mb-6" style="background-color: var(--bg-card); border: 1px solid var(--border-color);">
                <div style="height: 6px; background: linear-gradient(90deg, var(--success-color), var(--success-color-hover));"></div>
                
                <div class="p-8">
                    <div class="flex items-start justify-between mb-6">
                        <div class="flex items-center gap-4">
                            <div class="user-avatar-large">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <div>
                                <h1 class="text-3xl font-bold mb-1" style="color: var(--text-header);">{{ $user->name }}</h1>
                                <p style="color: var(--text-muted);">{{ $user->email }}</p>
                                <span class="role-badge role-{{ $user->role }} mt-2 inline-block">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </div>
                        </div>
                        
                        <div class="flex gap-2">
                            <a href="{{ route('users.edit', $user) }}" class="button-success">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Edit User
                            </a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Delete this user?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="button-danger" {{ $user->id === auth()->user()->id ? 'disabled' : '' }}>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Delete User
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
<style>
    .user-avatar-large {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 5rem;
        height: 5rem;
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

    .form-label {
        display: block;
        font-size: 0.875rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: var(--text-header);
    }

    input[type="text"],
    input[type="email"],
    select {
        transition: all 0.2s ease;
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    select:focus {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    table tr:hover {
        background-color: var(--bg-hover);
    }

    .button-danger.text-sm {
        padding: 0.375rem 0.75rem;
        font-size: 0.875rem;
        display: inline-flex;
        align-items: center;
        gap: 0.25rem;
    }
</style>