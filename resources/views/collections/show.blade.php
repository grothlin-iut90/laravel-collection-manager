<x-app-layout>
    <x-slot name="header" style="display: flex; justify-content: space-between; align-items: center;">
        <div class="header-title header-first">
            @if (!$editing)
            <h2>{{ $collection->name }}</h2>
            <!-- When clicked, switch to edit mode -->
            <a href="{{ route('collections.show', ['collection' => $collection, 'edit' => true]) }}" class="button-edit" title="Edit Collection">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                </svg>
            </a>
            @else
            <form action="{{ route('collections.update', $collection) }}" method="POST" class="inline">
                @csrf
                @method('PUT')
                <div style="display: flex; flex-direction: column; gap: 10px;">
                    <label for="">Title</label><input type="text" name="name" value="{{ $collection->name }}" class="border-b border-gray-300 focus:outline-none focus:border-blue-500" placeholder="Collection Name" required>
                    <label for="">Description</label><input type="text" name="description" value="{{ $collection->description }}" class="border-b border-gray-300 focus:outline-none focus:border-blue-500" placeholder="Collection Description">
                </div>
                <button type="button" onclick="window.location.href='{{ route('collections.show', ['collection' => $collection, 'edit' => false]) }}'" class="button-secondary ml-2">Stop Editing</button>
                <button type="submit" class="button-primary ml-2">Finish Edit</button>
            </form>
            @endif 
        </div>
        @if (!$editing)
        <a href="{{ route('collections.index') }}" class="button-return">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
            </svg>
            Back
        </a>
        @endif
    </x-slot>
    <div class="container">
        <div class="description-first">
            @if (!$editing)
            <h3>{{ $collection->description }}</h3>
            <a href="{{ route('collections.show', ['collection' => $collection, 'edit' => true]) }}" class="button-edit" title="Edit Collection">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                </svg>
            </a>
            @endif
        </div>
        <hr>
        @if ($items->isEmpty())
            <p>This collection is empty.</p>
        @else
            <table class="min-w-full" style="background-color: var(--bg-card); margin-top: 20px; border-radius: 8px; overflow: hidden;">
                <thead style="border-bottom: 2px solid var(--border-color);">
                    <tr>
                        <th class="py-2 px-4 border-b">Title</th>
                        <th class="py-2 px-4 border-b">Description</th>
                        <th class="py-2 px-4 border-b">Category</th>
                        <th class="py-2 px-4 border-b">Rating</th>
                        <th class="py-2 px-4 border-b">Condition</th>
                        <th class="py-2 px-4 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody style="border-bottom: 2px solid var(--border-color);">
                    @foreach($items as $item)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $item->title }}</td>
                            <td class="py-2 px-4 border-b">{{ $item->description }}</td>
                            <td class="py-2 px-4 border-b text-center">{{ $item->category->label }}</td>
                            <td class="py-2 px-4 border-b text-center">{{ $item->rating }}/5</td>
                            <td class="py-2 px-4 border-b text-center">{{ $item->condition }}</td>
                            <td class="py-2 px-4 border-b text-center">
                                <form action="{{ route('collections.removeItem', [$collection, $item->id]) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="button-danger">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        <a href="{{ route('dashboard') }}" class="button-return">Want to add an item ?</a>
        <hr>
    </div>
</x-app-layout>
<style>
    .container {
        padding: 20px;
        background-color: var(--bg-main);
        border-radius: 8px;
        margin: 0 auto;
    }

    .header-first, .description-first {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    
</style>