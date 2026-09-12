<x-app-layout>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <x-slot name="header">
        <div class="ml-[14%] flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Services Management') }}
            </h2>
            <div class="text-sm text-gray-600 dark:text-gray-400 mt-2 sm:mt-0">
                Total: {{ $services->count() }} services
            </div>
        </div>
    </x-slot>

    <div class="max-w-[80%] ml-[19%] px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header Section -->
        <div class="bg-gradient-to-r from-emerald-50 to-teal-50 dark:from-gray-800 dark:to-gray-900 rounded-2xl shadow-lg border border-emerald-100 dark:border-gray-700 p-6 mb-8">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-2">Our Services</h1>
                    <p class="text-gray-600 dark:text-gray-400">Manage and organize your service offerings</p>
                </div>
                <a href="{{ route('services.create') }}"
                   class="group bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white font-medium px-6 py-3 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200 flex items-center gap-2 w-fit">
                    <span class="text-lg">⚙️</span>
                    Create New Service
                </a>
            </div>
        </div>

        <!-- Stats Overview -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex items-center gap-4">
                    <div class="p-3 rounded-xl bg-emerald-100 dark:bg-emerald-900/30">
                        <span class="text-2xl text-emerald-600 dark:text-emerald-400">⚙️</span>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-gray-900 dark:text-white">{{ $services->count() }}</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">Total Services</div>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex items-center gap-4">
                    <div class="p-3 rounded-xl bg-blue-100 dark:bg-blue-900/30">
                        <span class="text-2xl text-blue-600 dark:text-blue-400">👤</span>
                    </div>
                    <div>
                        @php
                            $uniqueAuthors = $services->pluck('user_id')->unique()->count();
                        @endphp
                        <div class="text-2xl font-bold text-gray-900 dark:text-white">{{ $uniqueAuthors }}</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">Service Managers</div>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex items-center gap-4">
                    <div class="p-3 rounded-xl bg-amber-100 dark:bg-amber-900/30">
                        <span class="text-2xl text-amber-600 dark:text-amber-400">📅</span>
                    </div>
                    <div>
                        @php
                            $recentCount = $services->where('created_at', '>=', now()->subDays(7))->count();
                        @endphp
                        <div class="text-2xl font-bold text-gray-900 dark:text-white">{{ $recentCount }}</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">Last 7 Days</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Services Table -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
            <!-- Table Header -->
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/50">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">All Services</h3>
                    <div class="text-sm text-gray-600 dark:text-gray-400">
                        @if($services->count() > 0)
                            {{ $services->count() }} service{{ $services->count() > 1 ? 's' : '' }} available
                        @else
                            No services found
                        @endif
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="bg-gray-50 dark:bg-gray-900/50 border-b border-gray-200 dark:border-gray-700">
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                Service
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                Manager
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                Created Date
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                Description
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($services as $service)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-150">
                                <!-- Title Column -->
                                <td class="px-6 py-4">
                                    <div class="flex items-start gap-3">
                                        <div class="flex-shrink-0 w-10 h-10 bg-emerald-100 dark:bg-emerald-900/30 rounded-lg flex items-center justify-center">
                                            <span class="text-emerald-600 dark:text-emerald-400 text-lg">⚙️</span>
                                        </div>
                                        <div class="min-w-0 flex-1">
                                            <a href="{{ route('services.show', $service) }}"
                                               class="text-sm font-semibold text-gray-900 dark:text-white hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors line-clamp-2">
                                                {{ $service->title }}
                                            </a>
                                        </div>
                                    </div>
                                </td>

                                <!-- Author Column -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="flex-shrink-0 w-8 h-8 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center text-white text-xs font-semibold">
                                            {{ strtoupper(substr($service->user->name, 0, 2)) }}
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                {{ $service->user->name }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <!-- Date Column -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 dark:text-white font-medium">
                                        {{ $service->created_at->format('d M Y') }}
                                    </div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">
                                        {{ $service->created_at->format('H:i') }}
                                    </div>
                                </td>

                                <!-- Description Preview -->
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-600 dark:text-gray-400 max-w-xs">
                                        <div class="line-clamp-2">
                                            {{ Str::limit(strip_tags($service->description), 100) }}
                                        </div>
                                    </div>
                                </td>

                                <!-- Actions Column -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <!-- View Button -->
                                        <a href="{{ route('services.show', $service) }}"
                                           class="inline-flex items-center gap-1 bg-blue-50 dark:bg-blue-900/30 hover:bg-blue-100 dark:hover:bg-blue-900/50 text-blue-600 dark:text-blue-400 px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-200 group"
                                           title="View Service">
                                            <span class="text-sm">👁️</span>
                                            <span class="hidden sm:inline">View</span>
                                        </a>

                                        <!-- Edit Button -->
                                        <a href="{{ route('services.edit', $service) }}"
                                           class="inline-flex items-center gap-1 bg-amber-50 dark:bg-amber-900/30 hover:bg-amber-100 dark:hover:bg-amber-900/50 text-amber-600 dark:text-amber-400 px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-200 group"
                                           title="Edit Service">
                                            <span class="text-sm">✏️</span>
                                            <span class="hidden sm:inline">Edit</span>
                                        </a>

                                        <!-- Delete Button -->
                                        <form action="{{ route('services.destroy', $service) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    onclick="return confirm('Are you sure you want to delete this service? This action cannot be undone.')"
                                                    class="inline-flex items-center gap-1 bg-red-50 dark:bg-red-900/30 hover:bg-red-100 dark:hover:bg-red-900/50 text-red-600 dark:text-red-400 px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-200 group"
                                                    title="Delete Service">
                                                <span class="text-sm">🗑️</span>
                                                <span class="hidden sm:inline">Delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        @if ($services->count() === 0)
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center gap-3 text-gray-500 dark:text-gray-400">
                                        <span class="text-4xl">⚙️</span>
                                        <div class="text-lg font-medium">No services found</div>
                                        <p class="text-sm">Get started by creating your first service</p>
                                        <a href="{{ route('services.create') }}"
                                           class="mt-2 bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                                            Create Service
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <!-- Simple Collection Info (no pagination) -->
            @if ($services->count() > 0 && !method_exists($services, 'hasPages'))
                <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/50">
                    <div class="text-center text-sm text-gray-600 dark:text-gray-400">
                        Showing all {{ $services->count() }} service{{ $services->count() > 1 ? 's' : '' }}
                    </div>
                </div>
            @endif

            <!-- Pagination (if using pagination) -->
            @if (method_exists($services, 'hasPages') && $services->hasPages())
                <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/50">
                    <div class="flex items-center justify-between">
                        <div class="text-sm text-gray-700 dark:text-gray-300">
                            Showing {{ $services->firstItem() }} to {{ $services->lastItem() }} of {{ $services->total() }} results
                        </div>
                        <div class="flex gap-1">
                            {{ $services->links() }}
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Quick Tips -->
        <div class="mt-8 bg-gradient-to-r from-purple-50 to-pink-50 dark:from-gray-800 dark:to-gray-900 rounded-2xl shadow-lg border border-purple-200 dark:border-gray-700 p-6">
            <div class="flex items-start gap-4">
                <div class="flex-shrink-0 w-12 h-12 bg-purple-100 dark:bg-purple-900/30 rounded-xl flex items-center justify-center">
                    <span class="text-2xl text-purple-600 dark:text-purple-400">💡</span>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-2">Service Management Tips</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-600 dark:text-gray-400">
                        <div class="flex items-center gap-2">
                            <span class="text-purple-500">✓</span>
                            Clearly describe service benefits
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-purple-500">✓</span>
                            Highlight unique selling points
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-purple-500">✓</span>
                            Include pricing information
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-purple-500">✓</span>
                            Add high-quality service images
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .line-clamp-1 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 1;
        }
        .line-clamp-2 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
        }
    </style>
</x-app-layout>
