<x-app-layout>
    <x-slot name="header" style="display: flex; justify-content: space-between; align-items: center;">
        <h2>{{ $collection->name }}</h2>
        <a href="{{ route('collections.index') }}" class="button-return">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
            </svg>
            Back
        </a>
    </x-slot>
    <div class="container">
        <h3>{{ $collection->description }}</h3>
        <hr>
        <table class="min-w-full" style="background-color: var(--bg-card); margin-top: 20px; border-radius: 8px; overflow: hidden;">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Title</th>
                    <th class="py-2 px-4 border-b">Description</th>
                    <th class="py-2 px-4 border-b">Category</th>
                    <th class="py-2 px-4 border-b">Rating</th>
                    <th class="py-2 px-4 border-b">Condition</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
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
                                <button type="submit" class="button-secondary">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
</style>