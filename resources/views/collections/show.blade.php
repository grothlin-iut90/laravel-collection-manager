<x-app-layout>
    <x-slot name="header">
        <h2>{{ $collection->name }}</h2>
        <a href="{{ route('collections.index') }}" class="btn btn-secondary">Back to My Collections</a>
    </x-slot>
    <div class="py-12">
        <p>{{ $collection->description }}</p>
        <table class="min-w-full bg-white">
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
                        <td class="py-2 px-4 border-b">{{ $item->category->label }}</td>
                        <td class="py-2 px-4 border-b">{{ $item->rating }}/5</td>
                        <td class="py-2 px-4 border-b">{{ $item->condition }}</td>
                        <td class="py-2 px-4 border-b">
                            <form action="{{ route('collections.removeItem', [$collection, $item->id]) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>