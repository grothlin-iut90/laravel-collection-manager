<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl leading-tight" style="color: var(--text-header);">
                {{ __('Edit Item') }}
            </h2>
            <a href="{{ route('items.show', $item) }}" class="button-return" style="right: 0; position: absolute; margin-right: 10%;">
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
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full mb-4" style="background-color: rgba(227, 178, 60, 0.1);">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color: var(--primary-color);">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-2" style="color: var(--text-header);">Edit Item Details</h3>
                <p style="color: var(--text-muted);">
                    Update the information for <strong>{{ $item->title }}</strong>
                </p>
            </div>

            <div class="shadow-lg rounded-lg overflow-hidden" style="background-color: var(--bg-card); border: 1px solid var(--border-color);">
                <div class="gradient-header"></div>
                
                <div class="p-8">
                    <form action="{{ route('items.update', $item) }}" method="POST" class="space-y-6">
                        @csrf 
                        @method('PUT')

                        <div>
                            <label for="title" class="form-label">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                </svg>
                                Title *
                            </label>
                            <input type="text" id="title" name="title" value="{{ $item->title }}" required style="margin-bottom: 0;">
                        </div>

                        <div>
                            <label for="description" class="form-label">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                                </svg>
                                Description *
                            </label>
                            <textarea id="description" name="description" required rows="4" style="margin-bottom: 0; resize: vertical;">{{ $item->description }}</textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="rating" class="form-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    Rating (1-5) *
                                </label>
                                <input type="number" id="rating" name="rating" min="1" max="5" value="{{ $item->rating }}" required style="margin-bottom: 0;">
                            </div>

                            <div>
                                <label for="condition" class="form-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Condition *
                                </label>
                                <input type="text" id="condition" name="condition" value="{{ $item->condition }}" required style="margin-bottom: 0;">
                            </div>
                        </div>

                        <div>
                            <label for="category_id" class="form-label">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                </svg>
                                Category *
                            </label>
                            <select id="category_id" name="category_id" required style="margin-bottom: 0;">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $item->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->label }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        @if(auth()->user()->role === 'admin')
                            <div>
                                <label for="provider_id" class="form-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    Assign Provider *
                                </label>
                                <select id="provider_id" name="provider_id" required style="margin-bottom: 0;">
                                    @foreach($providers as $provider)
                                        <option value="{{ $provider->id }}" {{ $item->provider_id == $provider->id ? 'selected' : '' }}>
                                            {{ $provider->name }} ({{ $provider->email }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        @endif

                        <div class="flex gap-3 pt-4">
                            <button type="submit" class="button-success flex-1 inline-flex items-center justify-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Update Item
                            </button>
                            <a href="{{ route('items.show', $item) }}" class="button-secondary inline-flex items-center justify-center gap-2">
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

<style>
    .gradient-header {
        height: 6px;
        background: linear-gradient(90deg, var(--primary-color), var(--primary-color-hover));
    }

    .form-label {
        display: block;
        font-size: 0.875rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: var(--text-header);
    }

    input[type="text"],
    input[type="number"],
    textarea,
    select {
        transition: all 0.2s ease;
    }

    input[type="text"]:focus,
    input[type="number"]:focus,
    textarea:focus,
    select:focus {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
</style>