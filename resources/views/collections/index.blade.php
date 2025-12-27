<x-app-layout>
    <x-slot name="header">
        <h2>Public Collections</h2>
    </x-slot>
    <div class="py-12">
        @foreach($users as $user)
            <h3>{{ $user->name }}'s Collection</h3>
            @foreach($user->items as $item)
                <div>
                    <h4>{{ $item->title }}</h4>
                    <p>Category: {{ $item->category->label }}</p>
                    <p>Rating: {{ $item->rating }}/5</p>
                </div>
            @endforeach
        @endforeach
    </div>
</x-app-layout>