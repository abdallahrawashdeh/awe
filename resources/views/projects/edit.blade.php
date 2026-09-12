<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Edit Project') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Header Card -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                                Update Project
                            </h1>
                            <p class="text-gray-600 dark:text-gray-400 mt-1">
                                Modify the project details and manage images below
                            </p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="px-3 py-1 text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300 rounded-full">
                                Editing
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

            <!-- Main Form Card -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <!-- IMPORTANT: Added enctype="multipart/form-data" -->
                <form action="{{ route('projects.update', $project) }}" method="POST" enctype="multipart/form-data"
                      class="p-6 space-y-8">
                    @csrf
                    @method('PUT')

                    <!-- Form Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Left Column -->
                        <div class="space-y-6">
                            <!-- Year Field -->
                            <div>
                                <label for="year" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Year <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input type="number" name="year" id="year" value="{{ old('year', $project->year) }}" required
                                           class="pl-10 w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-100 transition duration-150">
                                </div>
                                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                                    Enter the year when the project was completed
                                </p>
                                @error('year')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Title Field -->
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Title <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input type="text" name="title" id="title" value="{{ old('title', $project->title) }}" required
                                           class="pl-10 w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-100 transition duration-150">
                                </div>
                                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                                    Enter a descriptive title for the project
                                </p>
                                @error('title')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Right Column - Image Management -->
                        <div>
                            <div class="h-full p-6 border-2 border-gray-300 dark:border-gray-600 rounded-lg">
                                <div class="text-center mb-4">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <h3 class="mt-2 text-sm font-medium text-gray-700 dark:text-gray-300">Project Images</h3>
                                </div>

                                <!-- Current Images -->
                                @if($project->images->count() > 0)
                                    <div class="mb-4">
                                        <p class="text-xs text-gray-500 dark:text-gray-400 mb-2">Current Images (click ✕ to delete)</p>
                                        <div class="grid grid-cols-2 gap-2">
                                            @foreach($project->images as $image)
                                                <div class="relative group">
                                                    <img src="{{ asset('storage/' . $image->image_path) }}"
                                                         alt="{{ $image->alt_text }}"
                                                         class="w-full h-24 object-cover rounded-lg shadow-sm group-hover:opacity-75 transition-opacity">
                                                    <div class="absolute top-1 right-1">
                                                        <label class="cursor-pointer bg-red-500 hover:bg-red-700 text-white rounded-full p-1 inline-flex items-center justify-center transition-colors shadow-lg">
                                                            <input type="checkbox" name="delete_images[]" value="{{ $image->id }}"
                                                                   class="hidden" onchange="this.parentElement.classList.toggle('bg-red-700')">
                                                            <span class="text-xs font-bold">✕</span>
                                                        </label>
                                                    </div>
                                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1 truncate">{{ Str::limit($image->alt_text, 15) }}</p>
                                                </div>
                                            @endforeach
                                        </div>
                                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">Click the ✕ button on any image to mark it for deletion</p>
                                    </div>
                                @else
                                    <div class="mb-4 p-4 bg-gray-50 dark:bg-gray-700 rounded-lg text-center">
                                        <p class="text-sm text-gray-500 dark:text-gray-400">No images uploaded yet</p>
                                    </div>
                                @endif

                                <!-- Upload New Images -->
                                <div>
                                    <label for="images" class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">
                                        Add More Images (Optional)
                                    </label>
                                    <input type="file" name="images[]" id="images" multiple accept="image/*"
                                           class="block w-full text-xs text-gray-500 dark:text-gray-400 file:mr-2 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 dark:file:bg-blue-900/30 dark:file:text-blue-400">
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Select multiple images. Max 2MB each.</p>
                                    @error('images.*')
                                        <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Image Preview -->
                                <div id="image-preview" class="grid grid-cols-2 gap-2 mt-3"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Field - Full Width -->
                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Content <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute top-0 left-0 pl-3 pt-3 pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <textarea name="content" id="content" rows="6" required
                                      class="pl-10 w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-100 resize-y transition duration-150">{{ old('content', $project->content) }}</textarea>
                        </div>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                            Describe the project details, technologies used, and outcomes
                        </p>
                        @error('content')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
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
                            <div class="flex flex-wrap gap-2 justify-center">
                                <button type="button" onclick="window.location.href='{{ route('projects.show', $project) }}'"
                                        class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 text-sm font-medium rounded-lg text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition duration-150">
                                    <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                    </svg>
                                    View Project
                                </button>
                                <button type="submit"
                                        class="inline-flex items-center px-6 py-3 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition duration-150">
                                    <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    Update Project
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Status Information Card -->
            <div class="mt-6 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-4">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-blue-800 dark:text-blue-300">
                            Project Information
                        </h3>
                        <div class="mt-2 text-sm text-blue-700 dark:text-blue-400">
                            <p>You are currently editing: <span class="font-medium">"{{ $project->title }}"</span></p>
                            @if($project->created_at)
                                <p class="mt-1">Created: {{ $project->created_at->format('F j, Y') }} • Last updated: {{ $project->updated_at->format('F j, Y') }}</p>
                            @endif
                            @if($project->year)
                                <p class="mt-1">Project Year: <span class="font-medium">{{ $project->year }}</span></p>
                            @endif
                            @if($project->images->count() > 0)
                                <p class="mt-1">Images: <span class="font-medium">{{ $project->images->count() }}</span></p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Image Preview -->
    <script>
        document.getElementById('images').addEventListener('change', function(e) {
            const preview = document.getElementById('image-preview');
            preview.innerHTML = '';

            if (this.files.length > 0) {
                for (let file of this.files) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const div = document.createElement('div');
                        div.className = 'relative';
                        div.innerHTML = `
                            <img src="${e.target.result}" class="w-full h-24 object-cover rounded-lg shadow">
                            <span class="absolute bottom-1 right-1 bg-black bg-opacity-50 text-white text-xs px-1 py-0.5 rounded truncate max-w-full">${file.name}</span>
                        `;
                        preview.appendChild(div);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });

        // Visual feedback for delete checkboxes
        document.querySelectorAll('input[name="delete_images[]"]').forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                const parent = this.closest('.relative');
                if (this.checked) {
                    parent.style.opacity = '0.5';
                    parent.querySelector('img').style.filter = 'grayscale(100%)';
                } else {
                    parent.style.opacity = '1';
                    parent.querySelector('img').style.filter = 'none';
                }
            });
        });
    </script>
</x-app-layout>
