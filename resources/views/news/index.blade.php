<x-app-layout>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('News Management') }}
            </h2>
            <div class="text-sm text-gray-600 dark:text-gray-400 mt-2 sm:mt-0">
                Total: {{ $news->total() }} news articles
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header Section -->
        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-gray-800 dark:to-gray-900 rounded-2xl shadow-lg border border-blue-100 dark:border-gray-700 p-6 mb-8">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-2">News Articles</h1>
                    <p class="text-gray-600 dark:text-gray-400">Manage and organize your news content efficiently</p>
                </div>
                <a href="{{ route('news.create') }}"
                   class="group bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-medium px-6 py-3 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200 flex items-center gap-2 w-fit">
                    <span class="text-lg">📝</span>
                    Create New Article
                </a>
            </div>
        </div>

        <!-- Stats Overview -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex items-center gap-4">
                    <div class="p-3 rounded-xl bg-blue-100 dark:bg-blue-900/30">
                        <span class="text-2xl text-blue-600 dark:text-blue-400">📰</span>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-gray-900 dark:text-white">{{ $news->total() }}</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">Total Articles</div>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex items-center gap-4">
                    <div class="p-3 rounded-xl bg-green-100 dark:bg-green-900/30">
                        <span class="text-2xl text-green-600 dark:text-green-400">👤</span>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-gray-900 dark:text-white">{{ $news->unique('user_id')->count() }}</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">Authors</div>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex items-center gap-4">
                    <div class="p-3 rounded-xl bg-amber-100 dark:bg-amber-900/30">
                        <span class="text-2xl text-amber-600 dark:text-amber-400">📅</span>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-gray-900 dark:text-white">{{ $news->where('created_at', '>=', now()->subDays(7))->count() }}</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">Last 7 Days</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- News Table -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
            <!-- Table Header -->
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/50">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">All News Articles</h3>
                    <div class="text-sm text-gray-600 dark:text-gray-400">
                        Showing {{ $news->firstItem() ?? 0 }}-{{ $news->lastItem() ?? 0 }} of {{ $news->total() }}
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="bg-gray-50 dark:bg-gray-900/50 border-b border-gray-200 dark:border-gray-700">
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                Article
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                Author
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                Date
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                Preview
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($news as $item)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-150">
                                <!-- Title Column -->
                                <td class="px-6 py-4">
                                    <div class="flex items-start gap-3">
                                        <div class="flex-shrink-0 w-10 h-10 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center">
                                            <span class="text-blue-600 dark:text-blue-400 text-lg">📰</span>
                                        </div>
                                        <div class="min-w-0 flex-1">
                                            <a href="{{ route('news.show', $item) }}"
                                               class="text-sm font-semibold text-gray-900 dark:text-white hover:text-blue-600 dark:hover:text-blue-400 transition-colors line-clamp-2">
                                                {{ $item->title }}
                                            </a>
                                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1 line-clamp-1">
                                                {{ Str::limit($item->subtitle, 40) }}
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                <!-- Author Column -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="flex-shrink-0 w-8 h-8 bg-gradient-to-br from-blue-400 to-indigo-600 rounded-full flex items-center justify-center text-white text-xs font-semibold">
                                            {{ strtoupper(substr($item->user->name, 0, 2)) }}
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                {{ $item->user->name }}
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

                                <!-- Content Preview -->
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-600 dark:text-gray-400 max-w-xs">
                                        <div class="line-clamp-2">
                                            {{ Str::limit(strip_tags($item->content), 80) }}
                                        </div>
                                    </div>
                                </td>

                                <!-- Actions Column -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <!-- View Button -->
                                        <a href="{{ route('news.show', $item) }}"
                                           class="inline-flex items-center gap-1 bg-blue-50 dark:bg-blue-900/30 hover:bg-blue-100 dark:hover:bg-blue-900/50 text-blue-600 dark:text-blue-400 px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-200 group"
                                           title="View Article">
                                            <span class="text-sm">👁️</span>
                                            <span class="hidden sm:inline">View</span>
                                        </a>

                                        <!-- Edit Button -->
                                        <a href="{{ route('news.edit', $item) }}"
                                           class="inline-flex items-center gap-1 bg-amber-50 dark:bg-amber-900/30 hover:bg-amber-100 dark:hover:bg-amber-900/50 text-amber-600 dark:text-amber-400 px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-200 group"
                                           title="Edit Article">
                                            <span class="text-sm">✏️</span>
                                            <span class="hidden sm:inline">Edit</span>
                                        </a>

                                        <!-- Delete Button -->
                                        <form action="{{ route('news.destroy', $item) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    onclick="return confirm('Are you sure you want to delete this news article? This action cannot be undone.')"
                                                    class="inline-flex items-center gap-1 bg-red-50 dark:bg-red-900/30 hover:bg-red-100 dark:hover:bg-red-900/50 text-red-600 dark:text-red-400 px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-200 group"
                                                    title="Delete Article">
                                                <span class="text-sm">🗑️</span>
                                                <span class="hidden sm:inline">Delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        @if ($news->isEmpty())
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center gap-3 text-gray-500 dark:text-gray-400">
                                        <span class="text-4xl">📰</span>
                                        <div class="text-lg font-medium">No news articles found</div>
                                        <p class="text-sm">Get started by creating your first news article</p>
                                        <a href="{{ route('news.create') }}"
                                           class="mt-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                                            Create News Article
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if ($news->hasPages())
                <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/50">
                    <div class="flex items-center justify-between">
                        <div class="text-sm text-gray-700 dark:text-gray-300">
                            Showing {{ $news->firstItem() }} to {{ $news->lastItem() }} of {{ $news->total() }} results
                        </div>
                        <div class="flex gap-1">
                            {{ $news->links() }}
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Quick Tips -->
        <div class="mt-8 bg-gradient-to-r from-green-50 to-emerald-50 dark:from-gray-800 dark:to-gray-900 rounded-2xl shadow-lg border border-green-200 dark:border-gray-700 p-6">
            <div class="flex items-start gap-4">
                <div class="flex-shrink-0 w-12 h-12 bg-green-100 dark:bg-green-900/30 rounded-xl flex items-center justify-center">
                    <span class="text-2xl text-green-600 dark:text-green-400">💡</span>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-2">Quick Tips</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-600 dark:text-gray-400">
                        <div class="flex items-center gap-2">
                            <span class="text-green-500">✓</span>
                            Keep titles clear and descriptive
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-green-500">✓</span>
                            Use subtitles to provide context
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-green-500">✓</span>
                            Add relevant images to articles
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-green-500">✓</span>
                            Regular updates keep content fresh
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
