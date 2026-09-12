<x-app-layout>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('News Article') }}
            </h2>
        </div>
    </x-slot>

    @php
        $isLongContent = strlen(strip_tags($news->content)) > 150;
        $previewContent = $isLongContent
            ? Str::limit(strip_tags($news->content), 150, '...')
            : $news->content;
    @endphp

    <div class="py-8">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <!-- Header Card -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                                News Article Details
                            </h1>
                            <p class="text-gray-600 dark:text-gray-400 mt-1">
                                View complete information about this news article
                            </p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="px-3 py-1 text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300 rounded-full">
                                Published
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Card -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Featured Image -->
                @if($news->image)
                <div class="relative h-80 overflow-hidden">
                    <img src="{{ asset('storage/' . $news->image) }}"
                         alt="{{ $news->title }}"
                         class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6">
                        <div class="max-w-3xl mx-auto">
                            <span class="inline-block bg-indigo-600 text-white text-sm font-semibold px-4 py-1.5 rounded-full mb-3">
                                Featured News
                            </span>
                            <h2 class="text-3xl font-bold text-white mb-2">{{ $news->title }}</h2>
                            <p class="text-gray-200 text-lg">{{ $news->subtitle }}</p>
                        </div>
                    </div>
                </div>
                @endif

                <div class="p-8">
                    <!-- Article Meta Information -->
                    <div class="flex flex-wrap items-center justify-between mb-8 pb-6 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex items-center space-x-6">
                            <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                </svg>
                                <span>{{ $news->created_at->format('F j, Y') }}</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                </svg>
                                <span>{{ $news->created_at->format('h:i A') }}</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" />
                                </svg>
                                <span>{{ strlen(strip_tags($news->content)) }} characters</span>
                            </div>
                        </div>
                        <div>
                            <span class="px-3 py-1 text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300 rounded-full">
                                ID: {{ $news->id }}
                            </span>
                        </div>
                    </div>

                    <!-- Article Content -->
                    <div class="mb-10">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Article Content</h3>
                        <div class="bg-gray-50 dark:bg-gray-700/50 border border-gray-200 dark:border-gray-600 rounded-lg p-6">
                            <div class="prose prose-lg dark:prose-invert max-w-none">
                                @if($isLongContent)
                                    <div id="contentPreview">
                                        <p class="text-gray-700 dark:text-gray-300 mb-4">{!! nl2br(e($previewContent)) !!}</p>
                                        <button onclick="showFullContent()"
                                                class="inline-flex items-center text-indigo-600 dark:text-indigo-400 font-medium hover:text-indigo-800 dark:hover:text-indigo-300 transition duration-150">
                                            Read Full Article
                                            <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div id="fullContent" class="hidden">
                                        <p class="text-gray-700 dark:text-gray-300 whitespace-pre-line">{!! nl2br(e($news->content)) !!}</p>
                                        <button onclick="showContentPreview()"
                                                class="inline-flex items-center text-indigo-600 dark:text-indigo-400 font-medium hover:text-indigo-800 dark:hover:text-indigo-300 mt-4 transition duration-150">
                                            Show Less
                                            <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M15.707 4.293a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0l-5-5a1 1 0 011.414-1.414L10 8.586l4.293-4.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                @else
                                    <p class="text-gray-700 dark:text-gray-300 whitespace-pre-line">{!! nl2br(e($news->content)) !!}</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Article Information Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <!-- Article Stats -->
                        <div class="bg-gray-50 dark:bg-gray-700/30 rounded-lg p-5">
                            <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-3">
                                Article Statistics
                            </h4>
                            <div class="space-y-3">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 text-gray-400 dark:text-gray-500 mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z" />
                                            <path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z" />
                                        </svg>
                                        <div>
                                            <p class="text-sm text-gray-600 dark:text-gray-400">Title Length</p>
                                            <p class="font-medium text-gray-900 dark:text-gray-100">{{ strlen($news->title) }} characters</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 text-gray-400 dark:text-gray-500 mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" />
                                        </svg>
                                        <div>
                                            <p class="text-sm text-gray-600 dark:text-gray-400">Content Length</p>
                                            <p class="font-medium text-gray-900 dark:text-gray-100">{{ strlen(strip_tags($news->content)) }} characters</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 text-gray-400 dark:text-gray-500 mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                        </svg>
                                        <div>
                                            <p class="text-sm text-gray-600 dark:text-gray-400">Days Since Published</p>
                                            <p class="font-medium text-gray-900 dark:text-gray-100">{{ $news->created_at->diffInDays(now()) }} days</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Additional Information -->
                        <div class="bg-gray-50 dark:bg-gray-700/30 rounded-lg p-5">
                            <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-3">
                                Additional Information
                            </h4>
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 text-gray-400 dark:text-gray-500 mr-3" xmlns="http://www.w3.org2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                    </svg>
                                    <div>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">Published Date</p>
                                        <p class="font-medium text-gray-900 dark:text-gray-100">{{ $news->created_at->format('F j, Y') }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 text-gray-400 dark:text-gray-500 mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                                    </svg>
                                    <div>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">Last Updated</p>
                                        <p class="font-medium text-gray-900 dark:text-gray-100">{{ $news->updated_at->format('F j, Y') }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 text-gray-400 dark:text-gray-500 mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                    </svg>
                                    <div>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">Status</p>
                                        <span class="px-2 py-1 text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300 rounded-full">
                                            Published
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="pt-6 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0">
                            <div>
                                <a href="{{ route('news.index') }}"
                                   class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 text-sm font-medium rounded-lg text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150">
                                    <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                                    </svg>
                                    Back to News
                                </a>
                            </div>
                            <div class="flex space-x-3">
                                <a href="{{ route('news.edit', $news) }}"
                                   class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150">
                                    <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                    </svg>
                                    Edit Article
                                </a>
                                <form action="{{ route('news.destroy', $news) }}" method="POST" class="inline-block"
                                      onsubmit="return confirm('Are you sure you want to delete this news article?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-150">
                                        <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                        Delete Article
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Inline Script -->
    <script>
        function showFullContent() {
            document.getElementById('contentPreview').classList.add('hidden');
            document.getElementById('fullContent').classList.remove('hidden');
        }

        function showContentPreview() {
            document.getElementById('fullContent').classList.add('hidden');
            document.getElementById('contentPreview').classList.remove('hidden');
            // Scroll to content section
            document.getElementById('contentPreview').scrollIntoView({ behavior: 'smooth' });
        }
    </script>
</x-app-layout>
