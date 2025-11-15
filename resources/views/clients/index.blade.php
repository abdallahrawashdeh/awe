<x-app-layout>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Clients Management') }}
            </h2>
            <div class="text-sm text-gray-600 dark:text-gray-400 mt-2 sm:mt-0">
                Total: {{ $clients->count() }} clients
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header Section -->
        <div class="bg-gradient-to-r from-violet-50 to-purple-50 dark:from-gray-800 dark:to-gray-900 rounded-2xl shadow-lg border border-violet-100 dark:border-gray-700 p-6 mb-8">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-2">Client Portfolio</h1>
                    <p class="text-gray-600 dark:text-gray-400">Manage and organize your client relationships</p>
                </div>
                <a href="{{ route('clients.create') }}"
                   class="group bg-gradient-to-r from-violet-500 to-purple-600 hover:from-violet-600 hover:to-purple-700 text-white font-medium px-6 py-3 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200 flex items-center gap-2 w-fit">
                    <span class="text-lg">👥</span>
                    Add New Client
                </a>
            </div>
        </div>

        <!-- Stats Overview -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex items-center gap-4">
                    <div class="p-3 rounded-xl bg-violet-100 dark:bg-violet-900/30">
                        <span class="text-2xl text-violet-600 dark:text-violet-400">👥</span>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-gray-900 dark:text-white">{{ $clients->count() }}</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">Total Clients</div>
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
                            $uniqueAuthors = $clients->pluck('user_id')->unique()->count();
                        @endphp
                        <div class="text-2xl font-bold text-gray-900 dark:text-white">{{ $uniqueAuthors }}</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">Account Managers</div>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex items-center gap-4">
                    <div class="p-3 rounded-xl bg-green-100 dark:bg-green-900/30">
                        <span class="text-2xl text-green-600 dark:text-green-400">📅</span>
                    </div>
                    <div>
                        @php
                            $recentCount = $clients->where('created_at', '>=', now()->subDays(7))->count();
                        @endphp
                        <div class="text-2xl font-bold text-gray-900 dark:text-white">{{ $recentCount }}</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">Last 7 Days</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Clients Table -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
            <!-- Table Header -->
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/50">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">All Clients</h3>
                    <div class="text-sm text-gray-600 dark:text-gray-400">
                        @if($clients->count() > 0)
                            {{ $clients->count() }} client{{ $clients->count() > 1 ? 's' : '' }} in portfolio
                        @else
                            No clients found
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
                                Client Details
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                Account Manager
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                Added Date
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($clients as $item)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-150">
                                <!-- Client Details Column -->
                                <td class="px-6 py-4">
                                    <div class="flex items-start gap-3">
                                        <div class="flex-shrink-0 w-10 h-10 bg-violet-100 dark:bg-violet-900/30 rounded-lg flex items-center justify-center">
                                            <span class="text-violet-600 dark:text-violet-400 text-lg">🏢</span>
                                        </div>
                                        <div class="min-w-0 flex-1">
                                            <a href="{{ route('clients.show', $item) }}"
                                               class="text-sm font-semibold text-gray-900 dark:text-white hover:text-violet-600 dark:hover:text-violet-400 transition-colors line-clamp-2">
                                                {{ $item->title }}
                                            </a>
                                            <div class="flex items-center gap-2 mt-1">
                                                <span class="inline-flex items-center gap-1 bg-green-50 dark:bg-green-900/30 text-green-700 dark:text-green-300 px-2 py-1 rounded-full text-xs font-medium">
                                                    <span>⭐</span>
                                                    Active Client
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <!-- Author Column -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="flex-shrink-0 w-8 h-8 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center text-white text-xs font-semibold">
                                            {{ strtoupper(substr($item->user->name, 0, 2)) }}
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                {{ $item->user->name }}
                                            </div>
                                            <div class="text-xs text-gray-500 dark:text-gray-400">
                                                Manager
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <!-- Date Column -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 dark:text-white font-medium">
                                        {{ $item->created_at->format('d M Y') }}
                                    </div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">
                                        {{ $item->created_at->format('H:i') }}
                                    </div>
                                </td>

                                <!-- Actions Column -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <!-- View Button -->
                                        <a href="{{ route('clients.show', $item) }}"
                                           class="inline-flex items-center gap-1 bg-blue-50 dark:bg-blue-900/30 hover:bg-blue-100 dark:hover:bg-blue-900/50 text-blue-600 dark:text-blue-400 px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-200 group"
                                           title="View Client">
                                            <span class="text-sm">👁️</span>
                                            <span class="hidden sm:inline">View</span>
                                        </a>

                                        <!-- Edit Button -->
                                        <a href="{{ route('clients.edit', $item) }}"
                                           class="inline-flex items-center gap-1 bg-amber-50 dark:bg-amber-900/30 hover:bg-amber-100 dark:hover:bg-amber-900/50 text-amber-600 dark:text-amber-400 px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-200 group"
                                           title="Edit Client">
                                            <span class="text-sm">✏️</span>
                                            <span class="hidden sm:inline">Edit</span>
                                        </a>

                                        <!-- Delete Button -->
                                        <form action="{{ route('clients.destroy', $item) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    onclick="return confirm('Are you sure you want to delete this client? This action cannot be undone.')"
                                                    class="inline-flex items-center gap-1 bg-red-50 dark:bg-red-900/30 hover:bg-red-100 dark:hover:bg-red-900/50 text-red-600 dark:text-red-400 px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-200 group"
                                                    title="Delete Client">
                                                <span class="text-sm">🗑️</span>
                                                <span class="hidden sm:inline">Delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        @if ($clients->count() === 0)
                            <tr>
                                <td colspan="4" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center gap-3 text-gray-500 dark:text-gray-400">
                                        <span class="text-4xl">👥</span>
                                        <div class="text-lg font-medium">No clients found</div>
                                        <p class="text-sm">Get started by adding your first client</p>
                                        <a href="{{ route('clients.create') }}"
                                           class="mt-2 bg-violet-600 hover:bg-violet-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                                            Add Client
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <!-- Simple Collection Info (no pagination) -->
            @if ($clients->count() > 0 && !method_exists($clients, 'hasPages'))
                <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/50">
                    <div class="text-center text-sm text-gray-600 dark:text-gray-400">
                        Showing all {{ $clients->count() }} client{{ $clients->count() > 1 ? 's' : '' }}
                    </div>
                </div>
            @endif

            <!-- Pagination (if using pagination) -->
            @if (method_exists($clients, 'hasPages') && $clients->hasPages())
                <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/50">
                    <div class="flex items-center justify-between">
                        <div class="text-sm text-gray-700 dark:text-gray-300">
                            Showing {{ $clients->firstItem() }} to {{ $clients->lastItem() }} of {{ $clients->total() }} results
                        </div>
                        <div class="flex gap-1">
                            {{ $clients->links() }}
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Quick Tips -->
        <div class="mt-8 bg-gradient-to-r from-pink-50 to-rose-50 dark:from-gray-800 dark:to-gray-900 rounded-2xl shadow-lg border border-pink-200 dark:border-gray-700 p-6">
            <div class="flex items-start gap-4">
                <div class="flex-shrink-0 w-12 h-12 bg-pink-100 dark:bg-pink-900/30 rounded-xl flex items-center justify-center">
                    <span class="text-2xl text-pink-600 dark:text-pink-400">💡</span>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-2">Client Management Tips</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-600 dark:text-gray-400">
                        <div class="flex items-center gap-2">
                            <span class="text-pink-500">✓</span>
                            Keep detailed client contact information
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-pink-500">✓</span>
                            Track client preferences and history
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-pink-500">✓</span>
                            Maintain regular communication
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-pink-500">✓</span>
                            Document client feedback and requests
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
