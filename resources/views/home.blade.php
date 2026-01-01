<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-8 text-center">
                <h1 class="mb-2">
                    {!! __("Welcome to <span class=\"highlight\">the</span> Collection Manager Application !") !!}
                </h1>
                <p style="color: var(--text-muted);" class="text-lg">
                    {{ __("Use the navigation menu to explore your collections, manage categories, and customize your experience.") }}
                </p>
            </div>

            <div class="mt-8 mb-8 text-center">
                <a href="{{ route('dashboard') }}" class="button-primary text-lg inline-flex items-center gap-2 transition-transform hover:scale-105"
                    style="padding: 1rem 3rem; font-family: 'BBH Bartle', cursive;">
                    {{ __("Go to Dashboard") }}
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

                <div class="shadow-lg rounded-lg p-6 flex items-center justify-between transition-transform hover:scale-105 duration-300"
                    style="background-color: var(--bg-card); border: 1px solid var(--border-color);">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-wider" style="color: var(--text-muted);">
                            {{ __("Total Items") }}
                        </p>
                        <p class="text-3xl font-bold mt-1" style="color: var(--primary-color);">
                            {{ $totalItems }}
                        </p>
                    </div>
                    <div class="p-3 rounded-full bg-opacity-10" style="background-color: rgba(227, 178, 60, 0.1);">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color: var(--primary-color);">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                </div>

                <div class="shadow-lg rounded-lg p-6 flex items-center justify-between transition-transform hover:scale-105 duration-300"
                    style="background-color: var(--bg-card); border: 1px solid var(--border-color);">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-wider" style="color: var(--text-muted);">
                            {{ __("Total Categories") }}
                        </p>
                        <p class="text-3xl font-bold mt-1" style="color: var(--secondary-color);">
                            {{ $totalCategories }}
                        </p>
                    </div>
                    <div class="p-3 rounded-full bg-opacity-10" style="background-color: rgba(162, 62, 72, 0.1);">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color: var(--secondary-color);">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                    </div>
                </div>

                <div class="shadow-lg rounded-lg p-6 flex items-center justify-between transition-transform hover:scale-105 duration-300"
                    style="background-color: var(--bg-card); border: 1px solid var(--border-color);">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-wider" style="color: var(--text-muted);">
                            {{ __("Total Users") }}
                        </p>
                        <p class="text-3xl font-bold mt-1" style="color: var(--success-color);">
                            {{ $totalUsers }}
                        </p>
                    </div>
                    <div class="p-3 rounded-full bg-opacity-10" style="background-color: rgba(155, 204, 103, 0.1);">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color: var(--success-color);">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                </div>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div class="shadow-lg rounded-lg p-6" style="background-color: var(--bg-card); border: 1px solid var(--border-color);">
                    <h2 class="header-title mb-4 border-b pb-2" style="border-color: var(--border-color);">
                        {{ __("Analytics") }}
                    </h2>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <span style="color: var(--text-main);">{{ __("Avg. Collections / User") }}</span>
                            <span class="font-bold px-3 py-1 rounded" style="background-color: var(--bg-body); color: var(--text-header);">
                                {{ $avgCollectionsPerUser }}
                            </span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span style="color: var(--text-main);">{{ __("Avg. Items / Collection") }}</span>
                            <span class="font-bold px-3 py-1 rounded" style="background-color: var(--bg-body); color: var(--text-header);">
                                {{ $avgItemsPerCollection }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="shadow-lg rounded-lg p-6" style="background-color: var(--bg-card); border: 1px solid var(--border-color);">
                    <h2 class="header-title mb-4 border-b pb-2" style="border-color: var(--border-color);">
                        {{ __("User Roles Distribution") }}
                    </h2>
                    <div class="space-y-4">
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-sm font-medium" style="color: var(--text-main);">Providers</span>
                                <span class="text-sm font-medium" style="color: var(--text-main);">{{ $totalProviders }}</span>
                            </div>
                            <div class="w-full rounded-full h-2.5" style="background-color: var(--bg-body);">
                                <div class="h-2.5 rounded-full" style="width: {{ ($totalUsers > 0) ? ($totalProviders / $totalUsers) * 100 : 0 }}%; background-color: var(--primary-color);"></div>
                            </div>
                        </div>

                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-sm font-medium" style="color: var(--text-main);">Consumers</span>
                                <span class="text-sm font-medium" style="color: var(--text-main);">{{ $totalConsumers }}</span>
                            </div>
                            <div class="w-full rounded-full h-2.5" style="background-color: var(--bg-body);">
                                <div class="h-2.5 rounded-full" style="width: {{ ($totalUsers > 0) ? ($totalConsumers / $totalUsers) * 100 : 0 }}%; background-color: var(--secondary-color);"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8 mt-6">
                <div class="shadow-lg rounded-lg p-6 flex flex-col justify-center items-center text-center transition-transform hover:scale-105 duration-300"
                    style="background-color: var(--bg-card); border: 1px solid var(--border-color);">

                    <p class="text-sm font-semibold uppercase tracking-wider mb-4" style="color: var(--text-muted);">
                        {{ __("Global Collection Quality") }}
                    </p>

                    <div class="flex items-center justify-center mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-yellow-400 drop-shadow-md" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    </div>

                    <div class="flex items-baseline justify-center">
                        <span class="text-5xl font-bold mr-2" style="color: var(--text-header);">{{ $globalRating }}</span>
                        <span class="text-xl" style="color: var(--text-muted);">/ 5</span>
                    </div>
                    <p class="text-xs mt-2" style="color: var(--text-muted);">Based on user reviews</p>
                </div>

                <div class="shadow-lg rounded-lg p-6 flex flex-col"
                    style="background-color: var(--bg-card); border: 1px solid var(--border-color);">

                    <div class="flex justify-between items-center mb-6 border-b pb-2" style="border-color: var(--border-color);">
                        <h3 class="header-title text-lg">{{ __("Top 3 Collectors") }}</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color: var(--primary-color);">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>

                    <div class="flex-1 space-y-4">
                        @forelse($topCollectors as $index => $collector)
                        <div class="flex items-center justify-between p-3 rounded transition hover:bg-opacity-50"
                            style="background-color: var(--bg-body);">

                            <div class="flex items-center gap-4">
                                <div class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full font-bold shadow-sm"
                                    style="background-color: {{ $index == 0 ? 'var(--primary-color)' : ($index == 1 ? 'var(--secondary-color)' : 'var(--text-muted)') }};
                                                    color: var(--white);">
                                    {{ $index + 1 }}
                                </div>

                                <div>
                                    <p class="font-bold text-lg" style="color: var(--text-header);">
                                        {{ $collector->name }}
                                    </p>
                                    @if($index == 0)
                                    <p class="text-xs uppercase tracking-wide" style="color: var(--primary-color);">
                                        Champion
                                    </p>
                                    @endif
                                </div>
                            </div>

                            <div class="text-right">
                                <span class="block text-xl font-bold" style="color: var(--text-main);">
                                    {{ $collector->total_items_in_collections }}
                                </span>
                                <span class="text-xs" style="color: var(--text-muted);">items</span>
                            </div>
                        </div>
                        @empty
                        <p class="text-center py-4" style="color: var(--text-muted);">
                            {{ __("No collectors yet. Be the first!") }}
                        </p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
