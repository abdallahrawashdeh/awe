<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Project') }}
        </h2>
    </x-slot>

    <div class="min-h-screen bg-gray-50 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-2xl">
            <!-- IMPORTANT: Added enctype="multipart/form-data" -->
            <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data"
                  class="bg-white border border-gray-200 shadow-md rounded-lg p-8 space-y-6">
                @csrf

                <!-- Year -->
                <div>
                    <label for="year" class="block text-sm font-medium text-gray-700 mb-2">
                        Year <span class="text-red-500">*</span>
                    </label>
                    <input type="number" name="year" id="year" value="{{ old('year') }}" required
                           class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150">
                    @error('year')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                        Title <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" required
                           class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150">
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Content -->
                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-2">
                        Content <span class="text-red-500">*</span>
                    </label>
                    <textarea name="content" id="content" rows="5" required
                              class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm resize-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150">{{ old('content') }}</textarea>
                    @error('content')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Images -->
                <div>
                    <label for="images" class="block text-sm font-medium text-gray-700 mb-2">
                        Project Images (Optional - Select one or multiple)
                    </label>
                    <input type="file" name="images[]" id="images" multiple accept="image/*"
                           class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    <p class="text-xs text-gray-500 mt-1">You can select multiple images. Max 2MB each. Supported formats: JPEG, PNG, JPG, GIF, SVG.</p>
                    @error('images.*')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Image Preview -->
                <div id="image-preview" class="grid grid-cols-3 gap-4"></div>

                <!-- Actions -->
                <div class="pt-4 flex justify-between">
                    <a href="{{ route('projects.index') }}"
                       class="inline-flex items-center bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold px-6 py-2 rounded-md shadow transition duration-150">
                        Cancel
                    </a>

                    <button type="submit"
                            class="inline-flex items-center bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded-md shadow focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-150">
                        ➕ Create Project
                    </button>
                </div>
            </form>
        </div>
    </div>

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
                            <img src="${e.target.result}" class="w-full h-32 object-cover rounded-lg shadow">
                            <span class="absolute top-2 right-2 bg-black bg-opacity-50 text-white text-xs px-2 py-1 rounded">${file.name}</span>
                        `;
                        preview.appendChild(div);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
    </script>
</x-app-layout>
