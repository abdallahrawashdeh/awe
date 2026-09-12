<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('CEO Information Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl ml-[18%] sm:px-6 lg:px-8">
            <!-- Success/Error Messages -->
            @if(session('success'))
                <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded-lg shadow-sm" role="alert">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 bg-red-100 border-l-4 border-red-500 text-red-700 px-4 py-3 rounded-lg shadow-sm" role="alert">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                </div>
            @endif

            @if($ceoInfo)
                <!-- Display CEO Information - Matching Frontend Design -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden border border-gray-100 dark:border-gray-700">
                    <div class="flex flex-col lg:flex-row items-center lg:items-stretch">
                        <!-- Image Section -->
                        <div class="relative lg:w-2/5 p-6 lg:p-8 bg-gradient-to-br from-[#f8f5ec] to-[#fdfbf5] dark:from-gray-700 dark:to-gray-800 flex items-center justify-center">
                            <div class="relative w-full h-full flex items-center justify-center">
                                <!-- Decorative background elements -->
                                <div class="absolute top-1/4 -left-8 w-48 h-48 bg-[#e8bb5b]/10 rounded-full blur-xl"></div>
                                <div class="absolute bottom-1/4 -right-8 w-40 h-40 bg-[#e8bb5b]/5 rounded-full blur-xl"></div>

                                <!-- Main Image -->
                                <div class="relative z-10 p-4 lg:p-8">
                                    @if($ceoInfo->ceo_image)
                                        <img src="{{ asset('storage/' . $ceoInfo->ceo_image) }}"
                                             alt="{{ $ceoInfo->ceo_name }}"
                                             class="w-64 h-64 md:w-80 md:h-80 lg:w-96 lg:h-96 rounded-full object-cover border-8 border-white shadow-2xl mx-auto" />
                                    @else
                                        <div class="w-64 h-64 md:w-80 md:h-80 lg:w-96 lg:h-96 rounded-full bg-gray-200 dark:bg-gray-600 flex items-center justify-center border-8 border-white shadow-2xl mx-auto">
                                            <svg class="w-32 h-32 text-gray-400 dark:text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                            </svg>
                                        </div>
                                    @endif

                                    <!-- Floating Badge -->
                                    <div class="absolute -bottom-4 right-8 lg:right-16 bg-white dark:bg-gray-700 rounded-2xl shadow-lg px-6 py-3 border border-gray-200 dark:border-gray-600">
                                        <div class="flex items-center gap-2">
                                            <div class="w-10 h-10 bg-[#e8bb5b] rounded-full flex items-center justify-center">
                                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="text-xs text-gray-500 dark:text-gray-400">Leading</p>
                                                <p class="font-bold text-gray-900 dark:text-white">{{ $ceoInfo->company_name }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Text Section -->
                        <div class="lg:w-3/5 p-8 lg:p-12 flex flex-col justify-center">
                            <!-- Title & Position -->
                            <div class="mb-6">
                                <div class="inline-flex items-center gap-3 mb-4 bg-[#e8bb5b]/10 px-4 py-2 rounded-full">
                                    <span class="text-sm font-semibold text-[#b89430] uppercase tracking-wider">Visionary Leader</span>
                                </div>
                                <h1 class="text-4xl lg:text-5xl xl:text-6xl font-bold text-gray-900 dark:text-white leading-tight">
                                    {{ $ceoInfo->ceo_name }}
                                </h1>
                                <div class="flex items-center gap-3 mt-4">
                                    <div class="h-2 w-16 bg-gradient-to-r from-[#e8bb5b] to-[#d4a84c] rounded-full"></div>
                                    <p class="text-xl lg:text-2xl text-gray-600 dark:text-gray-300 font-medium">{{ $ceoInfo->ceo_title }}</p>
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="mb-8">
                                <p class="text-gray-700 dark:text-gray-300 leading-relaxed text-lg lg:text-xl">
                                    {{ $ceoInfo->ceo_content }}
                                </p>
                            </div>

                            <!-- Stats/Highlights -->
                            <div class="mb-10">
                                <div class="grid grid-cols-2 lg:grid-cols-3 gap-6">
                                    <div class="bg-gradient-to-br from-gray-50 to-white dark:from-gray-700 dark:to-gray-600 p-5 rounded-xl border border-gray-200 dark:border-gray-600">
                                        <p class="text-3xl font-bold text-[#e8bb5b] mb-1">{{ $ceoInfo->ceo_years }}+</p>
                                        <p class="text-sm text-gray-600 dark:text-gray-300 font-medium">Years of Excellence</p>
                                    </div>
                                    <div class="bg-gradient-to-br from-gray-50 to-white dark:from-gray-700 dark:to-gray-600 p-5 rounded-xl border border-gray-200 dark:border-gray-600">
                                        <p class="text-3xl font-bold text-[#e8bb5b] mb-1">{{ $ceoInfo->ceo_projects }}+</p>
                                        <p class="text-sm text-gray-600 dark:text-gray-300 font-medium">Successful Projects</p>
                                    </div>
                                    <div class="bg-gradient-to-br from-gray-50 to-white dark:from-gray-700 dark:to-gray-600 p-5 rounded-xl border border-gray-200 dark:border-gray-600 col-span-2 lg:col-span-1">
                                        <p class="text-3xl font-bold text-[#e8bb5b] mb-1">{{ $ceoInfo->ceo_client_satisfaction }}%</p>
                                        <p class="text-sm text-gray-600 dark:text-gray-300 font-medium">Client Satisfaction</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Expertise Tags -->
                            <div class="mb-10">
                                <p class="text-gray-700 dark:text-gray-300 font-semibold mb-3">Core Expertise:</p>
                                <div class="flex flex-wrap gap-3">
                                    @php
                                        $expertise = [];
                                        if($ceoInfo && $ceoInfo->ceo_core_expertise) {
                                            $expertise = is_array($ceoInfo->ceo_core_expertise)
                                                ? $ceoInfo->ceo_core_expertise
                                                : json_decode($ceoInfo->ceo_core_expertise, true) ?? explode(',', $ceoInfo->ceo_core_expertise);
                                        }
                                    @endphp

                                    @if(!empty($expertise))
                                        @foreach($expertise as $skill)
                                            <span class="px-4 py-2 bg-[#e8bb5b]/10 text-[#b89430] rounded-full text-sm font-medium">{{ trim($skill) }}</span>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <!-- Admin Actions -->
                            <div class="pt-6 border-t border-gray-200 dark:border-gray-600">
                                <div class="flex flex-wrap items-center justify-between gap-4">
                                    <div class="text-sm text-gray-500 dark:text-gray-400">
                                        <p>Last updated: {{ $ceoInfo->updated_at->format('d M Y, h:i A') }}</p>
                                        <p>Updated by: {{ $ceoInfo->updater ? $ceoInfo->updater->name : 'N/A' }}</p>
                                    </div>
                                    <div class="flex flex-wrap gap-3">
                                        <button type="button"
                                                onclick="toggleUpdateForm()"
                                                class="group relative inline-flex items-center justify-center px-6 py-2 bg-gradient-to-r from-[#e8bb5b] to-[#d4a84c] text-white font-semibold rounded-lg hover:shadow-lg transition-all duration-300 overflow-hidden">
                                            <span class="relative z-10">Update Information</span>
                                            <div class="absolute inset-0 bg-gradient-to-r from-[#d4a84c] to-[#e8bb5b] opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                        </button>

                                        <form action="{{ route('ceo.destroy', $ceoInfo->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this CEO information?')" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-6 py-2 bg-red-500 text-white font-semibold rounded-lg hover:bg-red-600 transition-all duration-300">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Update Form (Hidden by default) -->
                <div id="updateFormContainer" style="display: none;" class="mt-8 bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden border border-gray-100 dark:border-gray-700 p-8">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Update CEO Information</h3>
                        <button type="button" onclick="toggleUpdateForm()" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>

                    <form action="{{ route('ceo.update', $ceoInfo->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Company Name *</label>
                                <input type="text" name="company_name" value="{{ old('company_name', $ceoInfo->company_name) }}"
                                       class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-[#e8bb5b] focus:ring focus:ring-[#e8bb5b]/20" required>
                                @error('company_name')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">CEO Name *</label>
                                <input type="text" name="ceo_name" value="{{ old('ceo_name', $ceoInfo->ceo_name) }}"
                                       class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-[#e8bb5b] focus:ring focus:ring-[#e8bb5b]/20" required>
                                @error('ceo_name')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">CEO Title *</label>
                                <input type="text" name="ceo_title" value="{{ old('ceo_title', $ceoInfo->ceo_title) }}"
                                       class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-[#e8bb5b] focus:ring focus:ring-[#e8bb5b]/20" required>
                                @error('ceo_title')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Years of Experience *</label>
                                <input type="number" name="ceo_years" value="{{ old('ceo_years', $ceoInfo->ceo_years) }}"
                                       class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-[#e8bb5b] focus:ring focus:ring-[#e8bb5b]/20" min="0" required>
                                @error('ceo_years')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Projects Completed *</label>
                                <input type="number" name="ceo_projects" value="{{ old('ceo_projects', $ceoInfo->ceo_projects) }}"
                                       class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-[#e8bb5b] focus:ring focus:ring-[#e8bb5b]/20" min="0" required>
                                @error('ceo_projects')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Client Satisfaction (%) *</label>
                                <input type="number" name="ceo_client_satisfaction" value="{{ old('ceo_client_satisfaction', $ceoInfo->ceo_client_satisfaction) }}"
                                       class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-[#e8bb5b] focus:ring focus:ring-[#e8bb5b]/20" min="0" max="100" required>
                                @error('ceo_client_satisfaction')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">CEO Content *</label>
                                <textarea name="ceo_content" rows="4"
                                          class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-[#e8bb5b] focus:ring focus:ring-[#e8bb5b]/20" required>{{ old('ceo_content', $ceoInfo->ceo_content) }}</textarea>
                                @error('ceo_content')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Core Expertise *</label>
                                <textarea name="ceo_core_expertise" rows="2"
                                          class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-[#e8bb5b] focus:ring focus:ring-[#e8bb5b]/20" required>{{ old('ceo_core_expertise', $ceoInfo->ceo_core_expertise) }}</textarea>
                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Enter expertise separated by commas (e.g., Strategic Leadership, Business Innovation)</p>
                                @error('ceo_core_expertise')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">CEO Image</label>
                                @if($ceoInfo->ceo_image)
                                    <div class="mb-3">
                                        <img src="{{ asset('storage/' . $ceoInfo->ceo_image) }}" alt="Current Image" class="h-24 w-24 object-cover rounded-lg border-2 border-gray-200 dark:border-gray-600">
                                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Current image</p>
                                    </div>
                                @endif
                                <input type="file" name="ceo_image" accept="image/*"
                                       class="w-full text-sm text-gray-500 dark:text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[#e8bb5b]/10 file:text-[#b89430] hover:file:bg-[#e8bb5b]/20">
                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Allowed: jpeg, png, jpg, gif, webp. Max: 2MB</p>
                                @error('ceo_image')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-6 flex gap-3">
                            <button type="submit" class="px-6 py-2 bg-gradient-to-r from-[#e8bb5b] to-[#d4a84c] text-white font-semibold rounded-lg hover:shadow-lg transition-all duration-300">
                                Update CEO Information
                            </button>
                            <button type="button" onclick="toggleUpdateForm()" class="px-6 py-2 bg-gray-500 text-white font-semibold rounded-lg hover:bg-gray-600 transition-all duration-300">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>

            @else
                <!-- Create Form - Matching Design -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden border border-gray-100 dark:border-gray-700 p-8">
                    <div class="text-center mb-8">
                        <h3 class="text-3xl font-bold text-gray-900 dark:text-white">Create CEO Information</h3>
                        <p class="text-gray-600 dark:text-gray-400 mt-2">Fill in the details below to add CEO information</p>
                    </div>

                    <form action="{{ route('ceo.store') }}" method="POST" enctype="multipart/form-data" class="max-w-4xl mx-auto">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Company Name *</label>
                                <input type="text" name="company_name" value="{{ old('company_name') }}"
                                       class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-[#e8bb5b] focus:ring focus:ring-[#e8bb5b]/20" required>
                                @error('company_name')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">CEO Name *</label>
                                <input type="text" name="ceo_name" value="{{ old('ceo_name') }}"
                                       class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-[#e8bb5b] focus:ring focus:ring-[#e8bb5b]/20" required>
                                @error('ceo_name')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">CEO Title *</label>
                                <input type="text" name="ceo_title" value="{{ old('ceo_title') }}"
                                       class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-[#e8bb5b] focus:ring focus:ring-[#e8bb5b]/20" required>
                                @error('ceo_title')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Years of Experience *</label>
                                <input type="number" name="ceo_years" value="{{ old('ceo_years') }}"
                                       class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-[#e8bb5b] focus:ring focus:ring-[#e8bb5b]/20" min="0" required>
                                @error('ceo_years')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Projects Completed *</label>
                                <input type="number" name="ceo_projects" value="{{ old('ceo_projects') }}"
                                       class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-[#e8bb5b] focus:ring focus:ring-[#e8bb5b]/20" min="0" required>
                                @error('ceo_projects')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Client Satisfaction (%) *</label>
                                <input type="number" name="ceo_client_satisfaction" value="{{ old('ceo_client_satisfaction') }}"
                                       class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-[#e8bb5b] focus:ring focus:ring-[#e8bb5b]/20" min="0" max="100" required>
                                @error('ceo_client_satisfaction')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">CEO Content *</label>
                                <textarea name="ceo_content" rows="4"
                                          class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-[#e8bb5b] focus:ring focus:ring-[#e8bb5b]/20" required>{{ old('ceo_content') }}</textarea>
                                @error('ceo_content')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Core Expertise *</label>
                                <textarea name="ceo_core_expertise" rows="2"
                                          class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-[#e8bb5b] focus:ring focus:ring-[#e8bb5b]/20" required>{{ old('ceo_core_expertise') }}</textarea>
                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Enter expertise separated by commas (e.g., Strategic Leadership, Business Innovation)</p>
                                @error('ceo_core_expertise')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">CEO Image</label>
                                <input type="file" name="ceo_image" accept="image/*"
                                       class="w-full text-sm text-gray-500 dark:text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[#e8bb5b]/10 file:text-[#b89430] hover:file:bg-[#e8bb5b]/20">
                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Allowed: jpeg, png, jpg, gif, webp. Max: 2MB</p>
                                @error('ceo_image')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-8 text-center">
                            <button type="submit" class="px-8 py-3 bg-gradient-to-r from-[#e8bb5b] to-[#d4a84c] text-white font-semibold rounded-lg hover:shadow-lg transition-all duration-300">
                                Create CEO Information
                            </button>
                        </div>
                    </form>
                </div>
            @endif
        </div>
    </div>

    {{--
      IMPORTANT: Script is placed DIRECTLY here (not inside @push).
      This guarantees it renders with the page — no need for @stack('scripts')
      in your app layout.
    --}}
    <script>
        // Define globally so inline onclick handlers can always find it
        window.toggleUpdateForm = function () {
            const form = document.getElementById('updateFormContainer');
            if (!form) {
                console.error('Update form container (#updateFormContainer) not found');
                return;
            }

            const isHidden = (form.style.display === 'none' || form.style.display === '');

            if (isHidden) {
                form.style.display = 'block';
                // Smooth scroll after layout has updated
                setTimeout(function () {
                    form.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }, 50);
            } else {
                form.style.display = 'none';
            }
        };

        // Auto-open the update form if there are validation errors (after a failed update submit)
        document.addEventListener('DOMContentLoaded', function () {
            @if($errors->any() && $ceoInfo)
                const form = document.getElementById('updateFormContainer');
                if (form) {
                    form.style.display = 'block';
                    setTimeout(function () {
                        form.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }, 100);
                }
            @endif

            console.log('CEO Management loaded. toggleUpdateForm available:', typeof window.toggleUpdateForm);
        });
    </script>
</x-app-layout>
