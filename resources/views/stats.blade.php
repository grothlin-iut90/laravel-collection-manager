<x-app-layout>
    <x-slot name="header">
        <h2>Global Statistics</h2>
    </x-slot>
    <div class="py-12">
        <p>Total Items: {{ $totalItems }}</p>
        <p>Total Consumers: {{ $totalUsers }}</p>
        <p>Total Categories: {{ $totalCategories }}</p>
        <p>Average Rating: {{ number_format($avgRating, 1) }}/5</p>
    </div>
</x-app-layout>