<x-app-layout>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Careers Management') }}
            </h2>
            <div class="text-sm text-gray-600 dark:text-gray-400 mt-2 sm:mt-0">
                Total: {{ $careers->count() }} career opportunities
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header Section -->
        <div class="bg-gradient-to-r from-indigo-50 to-purple-50 dark:from-gray-800 dark:to-gray-900 rounded-2xl shadow-lg border border-indigo-100 dark:border-gray-700 p-6 mb-8">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-2">Career Opportunities</h1>
                    <p class="text-gray-600 dark:text-gray-400">Manage and organize job positions and career openings</p>
                </div>
                <a href="{{ route('careerss.create') }}"
                   class="group bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white font-medium px-6 py-3 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200 flex items-center gap-2 w-fit">
                    <span class="text-lg">➕</span>
                    Create New Career
                </a>
            </div>
        </div>

        <!-- Stats Overview -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex items-center gap-4">
                    <div class="p-3 rounded-xl bg-indigo-100 dark:bg-indigo-900/30">
                        <span class="text-2xl text-indigo-600 dark:text-indigo-400">💼</span>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-gray-900 dark:text-white">{{ $careers->count() }}</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">Total Positions</div>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex items-center gap-4">
                    <div class="p-3 rounded-xl bg-green-100 dark:bg-green-900/30">
                        <span class="text-2xl text-green-600 dark:text-green-400">👤</span>
                    </div>
                    <div>
                        @php
                            $uniqueAuthors = $careers->pluck('user_id')->unique()->count();
                        @endphp
                        <div class="text-2xl font-bold text-gray-900 dark:text-white">{{ $uniqueAuthors }}</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">Recruiters</div>
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
                            $recentCount = $careers->where('created_at', '>=', now()->subDays(7))->count();
                        @endphp
                        <div class="text-2xl font-bold text-gray-900 dark:text-white">{{ $recentCount }}</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">Last 7 Days</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Careers Table -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
            <!-- Table Header -->
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/50">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">All Career Opportunities</h3>
                    <div class="text-sm text-gray-600 dark:text-gray-400">
                        @if($careers->count() > 0)
                            Showing {{ ($careers->currentPage() - 1) * $careers->perPage() + 1 }}-{{ ($careers->currentPage() - 1) * $careers->perPage() + $careers->count() }}
                            @if(method_exists($careers, 'total') && $careers->total() > $careers->perPage())
                                of {{ $careers->total() }}
                            @endif
                        @else
                            No results
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
                                Position
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                Recruiter
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                Date Posted
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                Description
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                Experience
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($careers as $career)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-150">
                                <!-- Title Column -->
                                <td class="px-6 py-4">
                                    <div class="flex items-start gap-3">
                                        <div class="flex-shrink-0 w-10 h-10 bg-indigo-100 dark:bg-indigo-900/30 rounded-lg flex items-center justify-center">
                                            <span class="text-indigo-600 dark:text-indigo-400 text-lg">💼</span>
                                        </div>
                                        <div class="min-w-0 flex-1">
                                            <div class="text-sm font-semibold text-gray-900 dark:text-white line-clamp-2">
                                                {{ $career->title }}
                                            </div>
                                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1 line-clamp-1">
                                                {{ Str::limit($career->subtitle, 40) }}
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                <!-- Author Column -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="flex-shrink-0 w-8 h-8 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center text-white text-xs font-semibold">
                                            {{ strtoupper(substr($career->user->name, 0, 2)) }}
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                {{ $career->user->name }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <!-- Date Column -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 dark:text-white font-medium">
                                        {{ $career->created_at->format('d M Y') }}
                                    </div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">
                                        {{ $career->created_at->format('H:i') }}
                                    </div>
                                </td>

                                <!-- Content Preview -->
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-600 dark:text-gray-400 max-w-xs">
                                        <div class="line-clamp-2">
                                            {{ Str::limit(strip_tags($career->content), 80) }}
                                        </div>
                                    </div>
                                </td>

                                <!-- Experience Column -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <span class="inline-flex items-center gap-1 bg-blue-50 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 px-2.5 py-1 rounded-full text-xs font-medium">
                                            <span>⏳</span>
                                            {{ $career->years_experience ?? 'Not specified' }}
                                        </span>
                                    </div>
                                </td>

                                <!-- Actions Column -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <!-- Edit Button -->
                                        <a href="{{ route('careerss.edit', $career) }}"
                                           class="inline-flex items-center gap-1 bg-amber-50 dark:bg-amber-900/30 hover:bg-amber-100 dark:hover:bg-amber-900/50 text-amber-600 dark:text-amber-400 px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-200 group"
                                           title="Edit Career">
                                            <span class="text-sm">✏️</span>
                                            <span class="hidden sm:inline">Edit</span>
                                        </a>

                                        <!-- Delete Button -->
                                        <form action="{{ route('careerss.destroy', $career) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    onclick="return confirm('Are you sure you want to delete this career opportunity? This action cannot be undone.')"
                                                    class="inline-flex items-center gap-1 bg-red-50 dark:bg-red-900/30 hover:bg-red-100 dark:hover:bg-red-900/50 text-red-600 dark:text-red-400 px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-200 group"
                                                    title="Delete Career">
                                                <span class="text-sm">🗑️</span>
                                                <span class="hidden sm:inline">Delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        @if ($careers->count() === 0)
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center gap-3 text-gray-500 dark:text-gray-400">
                                        <span class="text-4xl">💼</span>
                                        <div class="text-lg font-medium">No career opportunities found</div>
                                        <p class="text-sm">Get started by creating your first career position</p>
                                        <a href="{{ route('careerss.create') }}"
                                           class="mt-2 bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                                            Create Career Opportunity
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if (method_exists($careers, 'hasPages') && $careers->hasPages())
                <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/50">
                    <div class="flex items-center justify-between">
                        <div class="text-sm text-gray-700 dark:text-gray-300">
                            @if($careers->total() > 0)
                                Showing {{ $careers->firstItem() }} to {{ $careers->lastItem() }} of {{ $careers->total() }} results
                            @else
                                No results found
                            @endif
                        </div>
                        <div class="flex gap-1">
                            {{ $careers->links() }}
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Quick Tips -->
        <div class="mt-8 bg-gradient-to-r from-blue-50 to-cyan-50 dark:from-gray-800 dark:to-gray-900 rounded-2xl shadow-lg border border-blue-200 dark:border-gray-700 p-6">
            <div class="flex items-start gap-4">
                <div class="flex-shrink-0 w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-xl flex items-center justify-center">
                    <span class="text-2xl text-blue-600 dark:text-blue-400">💡</span>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-2">Career Management Tips</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-600 dark:text-gray-400">
                        <div class="flex items-center gap-2">
                            <span class="text-blue-500">✓</span>
                            Clearly specify required experience
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-blue-500">✓</span>
                            Include detailed job descriptions
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-blue-500">✓</span>
                            Highlight key responsibilities
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-blue-500">✓</span>
                            Mention application deadlines
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
