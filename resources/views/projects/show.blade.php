<x-app-layout>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Project Details') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <!-- Header Card -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                                Project Details
                            </h1>
                            <p class="text-gray-600 dark:text-gray-400 mt-1">
                                Complete information about this project
                            </p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="px-3 py-1 text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300 rounded-full">
                                Project ID: {{ $project->id }}
                            </span>
                            @if($project->images->count() > 0)
                                <span class="px-3 py-1 text-xs font-medium bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-300 rounded-full">
                                    🖼️ {{ $project->images->count() }} images
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Card -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8">
                    <!-- Project Header -->
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-6 mb-8">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-3">
                                    {{ $project->title }}
                                </h2>
                                <div class="flex flex-wrap items-center gap-4 mb-4">
                                    <div class="flex items-center px-3 py-1.5 bg-blue-50 dark:bg-blue-900/30 rounded-full">
                                        <svg class="w-4 h-4 text-blue-600 dark:text-blue-400 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-sm font-medium text-blue-800 dark:text-blue-300">
                                            Year: {{ $project->year }}
                                        </span>
                                    </div>
                                    <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                        <svg class="w-4 h-4 mr-1.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                        </svg>
                                        <span>Created by: {{ $project->user->name }}</span>
                                    </div>
                                    @if($project->images->count() > 0)
                                        <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                            <svg class="w-4 h-4 mr-1.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                                            </svg>
                                            <span>{{ $project->images->count() }} image(s)</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                    <svg class="w-4 h-4 mr-1.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                    </svg>
                                    <span>Created on: {{ $project->created_at->format('F j, Y') }} at {{ $project->created_at->format('h:i A') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Image Gallery Section -->
                    @if($project->images->count() > 0)
                        <div class="mb-10">
                            <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                                </svg>
                                Project Gallery
                                <span class="ml-2 text-sm font-normal text-gray-500 dark:text-gray-400">
                                    ({{ $project->images->count() }} images)
                                </span>
                            </h3>
                            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                                @foreach($project->images as $image)
                                    <div class="relative group overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
                                        <img src="{{ asset('storage/' . $image->image_path) }}"
                                             alt="{{ $image->alt_text ?? 'Project image' }}"
                                             class="w-full h-48 object-cover cursor-pointer transition-transform duration-300 group-hover:scale-110"
                                             onclick="openLightbox('{{ asset('storage/' . $image->image_path) }}', '{{ $image->alt_text ?? 'Project image' }}')"
                                             loading="lazy">
                                        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all duration-300 flex items-center justify-center">
                                            <span class="text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 text-sm font-medium bg-black bg-opacity-50 px-3 py-1 rounded-full">
                                                🔍 View
                                            </span>
                                        </div>
                                        @if($image->alt_text)
                                            <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white text-xs p-2 truncate">
                                                {{ $image->alt_text }}
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                            <div class="mt-4 text-sm text-gray-500 dark:text-gray-400 text-center">
                                Click on any image to view full size
                            </div>
                        </div>
                    @else
                        <div class="mb-10">
                            <div class="bg-gray-50 dark:bg-gray-700/30 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-8 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-gray-100">No Images</h3>
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                    This project doesn't have any images yet.
                                </p>
                                <div class="mt-4">
                                    <a href="{{ route('projects.edit', $project) }}"
                                       class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        Add Images
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Project Content -->
                    <div class="mb-10">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                            </svg>
                            Project Description
                        </h3>
                        <div class="bg-gray-50 dark:bg-gray-700/50 border border-gray-200 dark:border-gray-600 rounded-lg p-6">
                            <div class="prose prose-lg dark:prose-invert max-w-none">
                                <p class="text-gray-700 dark:text-gray-300 leading-relaxed whitespace-pre-line">
                                    {{ $project->content }}
                                </p>
                            </div>
                        </div>
                        <div class="mt-4 flex items-center text-sm text-gray-500 dark:text-gray-400">
                            <svg class="w-4 h-4 mr-1.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" />
                            </svg>
                            <span>{{ strlen($project->content) }} characters</span>
                        </div>
                    </div>

                    <!-- Project Information Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <!-- Project Details -->
                        <div class="bg-gray-50 dark:bg-gray-700/30 rounded-lg p-5">
                            <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-3">
                                Project Details
                            </h4>
                            <div class="space-y-3">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 text-gray-400 dark:text-gray-500 mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z" clip-rule="evenodd" />
                                        </svg>
                                        <div>
                                            <p class="text-sm text-gray-600 dark:text-gray-400">Project Title</p>
                                            <p class="font-medium text-gray-900 dark:text-gray-100">{{ $project->title }}</p>
                                        </div>
                                    </div>
                                    <span class="text-xs font-medium text-gray-500">{{ strlen($project->title) }} chars</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 text-gray-400 dark:text-gray-500 mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                        </svg>
                                        <div>
                                            <p class="text-sm text-gray-600 dark:text-gray-400">Project Year</p>
                                            <p class="font-medium text-gray-900 dark:text-gray-100">{{ $project->year }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 text-gray-400 dark:text-gray-500 mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                        </svg>
                                        <div>
                                            <p class="text-sm text-gray-600 dark:text-gray-400">Created By</p>
                                            <p class="font-medium text-gray-900 dark:text-gray-100">{{ $project->user->name }}</p>
                                        </div>
                                    </div>
                                </div>
                                @if($project->images->count() > 0)
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 text-gray-400 dark:text-gray-500 mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                                            </svg>
                                            <div>
                                                <p class="text-sm text-gray-600 dark:text-gray-400">Total Images</p>
                                                <p class="font-medium text-gray-900 dark:text-gray-100">{{ $project->images->count() }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Timeline Information -->
                        <div class="bg-gray-50 dark:bg-gray-700/30 rounded-lg p-5">
                            <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-3">
                                Timeline Information
                            </h4>
                            <div class="space-y-3">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 text-gray-400 dark:text-gray-500 mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                        </svg>
                                        <div>
                                            <p class="text-sm text-gray-600 dark:text-gray-400">Created Date</p>
                                            <p class="font-medium text-gray-900 dark:text-gray-100">{{ $project->created_at->format('F j, Y') }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 text-gray-400 dark:text-gray-500 mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                                        </svg>
                                        <div>
                                            <p class="text-sm text-gray-600 dark:text-gray-400">Last Updated</p>
                                            <p class="font-medium text-gray-900 dark:text-gray-100">{{ $project->updated_at->format('F j, Y') }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 text-gray-400 dark:text-gray-500 mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                        </svg>
                                        <div>
                                            <p class="text-sm text-gray-600 dark:text-gray-400">Years Since Created</p>
                                            <p class="font-medium text-gray-900 dark:text-gray-100">{{ $project->created_at->diffInYears(now()) }} years</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Age Information -->
                    <div class="mb-8">
                        <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-5">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-blue-800 dark:text-blue-300">
                                        Project Age Information
                                    </h3>
                                    <div class="mt-2 text-sm text-blue-700 dark:text-blue-400">
                                        <p>This project was created <span class="font-medium">{{ $project->created_at->diffForHumans() }}</span></p>
                                        <p class="mt-1">It has been <span class="font-medium">{{ $project->created_at->diffInDays(now()) }} days</span> since this project was added to the system.</p>
                                        @if($project->year)
                                            <p class="mt-1">Project completion year: <span class="font-medium">{{ $project->year }}</span>
                                                ({{ now()->year - $project->year }} years ago)</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="pt-6 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0">
                            <div>
                                <a href="{{ route('projects.index') }}"
                                   class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 text-sm font-medium rounded-lg text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150">
                                    <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                                    </svg>
                                    Back to Projects
                                </a>
                            </div>
                            <div class="flex space-x-3">
                                <a href="{{ route('projects.edit', $project) }}"
                                   class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150">
                                    <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                    </svg>
                                    Edit Project
                                </a>
                                <form action="{{ route('projects.destroy', $project) }}" method="POST" class="inline-block"
                                      onsubmit="return confirm('Are you sure you want to delete this project? This action cannot be undone.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-150">
                                        <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                        Delete Project
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Lightbox Modal -->
    <div id="lightbox" class="fixed inset-0 z-50 hidden bg-black bg-opacity-90 flex items-center justify-center p-4" onclick="closeLightbox()">
        <div class="relative max-w-5xl w-full" onclick="event.stopPropagation()">
            <img id="lightbox-image" src="" alt="Full size image" class="w-full h-auto max-h-[90vh] object-contain rounded-lg shadow-2xl">
            <div id="lightbox-caption" class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white text-center py-2 px-4 rounded-b-lg">
            </div>
            <button onclick="closeLightbox()"
                    class="absolute top-4 right-4 bg-black bg-opacity-50 hover:bg-opacity-75 text-white rounded-full p-2 transition duration-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            <button onclick="closeLightbox()"
                    class="absolute bottom-4 right-4 bg-black bg-opacity-50 hover:bg-opacity-75 text-white rounded-full p-2 transition duration-200">
                <span class="text-sm font-medium">Close</span>
            </button>
        </div>
    </div>

    <!-- Lightbox JavaScript -->
    <script>
        function openLightbox(imageUrl, caption) {
            const lightbox = document.getElementById('lightbox');
            const lightboxImage = document.getElementById('lightbox-image');
            const lightboxCaption = document.getElementById('lightbox-caption');

            lightboxImage.src = imageUrl;
            lightboxCaption.textContent = caption || 'Project image';
            lightbox.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            const lightbox = document.getElementById('lightbox');
            lightbox.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Close lightbox with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeLightbox();
            }
        });
    </script>

    <style>
        /* Image gallery hover effects */
        .group:hover .group-hover\:scale-110 {
            transform: scale(1.1);
        }
        .group:hover .group-hover\:bg-opacity-30 {
            background-opacity: 0.3;
        }
        .group:hover .group-hover\:opacity-100 {
            opacity: 1;
        }
        .transition-transform {
            transition: transform 0.3s ease;
        }
        .transition-opacity {
            transition: opacity 0.3s ease;
        }
        .transition-shadow {
            transition: box-shadow 0.3s ease;
        }

        /* Lightbox animation */
        #lightbox {
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        #lightbox-image {
            animation: scaleIn 0.3s ease;
        }

        @keyframes scaleIn {
            from { transform: scale(0.9); }
            to { transform: scale(1); }
        }
    </style>
</x-app-layout>
