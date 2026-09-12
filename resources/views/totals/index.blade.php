<x-app-layout>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <x-slot name="header">
        <div class="ml-[14%] flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Total Information Management') }}
            </h2>
            <div class="text-sm text-gray-600 dark:text-gray-400 mt-2 sm:mt-0">
                Total: {{ $totals->count() }} records
            </div>
        </div>
    </x-slot>

    <div class="max-w-[80%] ml-[19%] px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header Section -->
        <div class="bg-gradient-to-r from-indigo-50 to-blue-50 dark:from-gray-800 dark:to-gray-900 rounded-2xl shadow-lg border border-indigo-100 dark:border-gray-700 p-6 mb-8">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-2">Statistics Dashboard</h1>
                    <p class="text-gray-600 dark:text-gray-400">Manage and track your organization's key metrics</p>
                </div>
                <button id="createNewTotal"
                   class="group bg-gradient-to-r from-indigo-500 to-blue-600 hover:from-indigo-600 hover:to-blue-700 text-white font-medium px-6 py-3 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200 flex items-center gap-2 w-fit">
                    <span class="text-lg">📊</span>
                    Add New Total
                </button>
            </div>
        </div>

        <!-- Stats Overview -->
        @php
            $totalCities = $totals->sum('total_cities');
            $totalCountries = $totals->sum('total_countries');
            $totalEmployees = $totals->sum('total_employees');
            $totalClients = $totals->sum('total_clients');
            $totalProjects = $totals->sum('total_projects');
            $totalRecords = $totals->count();
        @endphp

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6 mb-8">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex items-center gap-4">
                    <div class="p-3 rounded-xl bg-blue-100 dark:bg-blue-900/30">
                        <span class="text-2xl text-blue-600 dark:text-blue-400">🏙️</span>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-gray-900 dark:text-white">{{ number_format($totalCities) }}</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">Total Cities</div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex items-center gap-4">
                    <div class="p-3 rounded-xl bg-green-100 dark:bg-green-900/30">
                        <span class="text-2xl text-green-600 dark:text-green-400">🌍</span>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-gray-900 dark:text-white">{{ number_format($totalCountries) }}</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">Total Countries</div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex items-center gap-4">
                    <div class="p-3 rounded-xl bg-purple-100 dark:bg-purple-900/30">
                        <span class="text-2xl text-purple-600 dark:text-purple-400">👥</span>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-gray-900 dark:text-white">{{ number_format($totalEmployees) }}</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">Total Employees</div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex items-center gap-4">
                    <div class="p-3 rounded-xl bg-amber-100 dark:bg-amber-900/30">
                        <span class="text-2xl text-amber-600 dark:text-amber-400">🤝</span>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-gray-900 dark:text-white">{{ number_format($totalClients) }}</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">Total Clients</div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex items-center gap-4">
                    <div class="p-3 rounded-xl bg-red-100 dark:bg-red-900/30">
                        <span class="text-2xl text-red-600 dark:text-red-400">🚀</span>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-gray-900 dark:text-white">{{ number_format($totalProjects) }}</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">Total Projects</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Totals Table -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
            <!-- Table Header -->
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/50">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">All Records</h3>
                    <div class="text-sm text-gray-600 dark:text-gray-400">
                        @if($totals->count() > 0)
                            {{ $totals->count() }} record{{ $totals->count() > 1 ? 's' : '' }} in database
                        @else
                            No records found
                        @endif
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full" id="totalsTable">
                    <thead>
                        <tr class="bg-gray-50 dark:bg-gray-900/50 border-b border-gray-200 dark:border-gray-700">
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                ID
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                Statistics
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                Updated By
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                Created Date
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                Updated Date
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($totals as $item)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-150">
                                <!-- ID Column -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="flex-shrink-0 w-10 h-10 bg-indigo-100 dark:bg-indigo-900/30 rounded-lg flex items-center justify-center">
                                            <span class="text-indigo-600 dark:text-indigo-400 text-sm font-bold">#{{ $item->id }}</span>
                                        </div>
                                    </div>
                                </td>

                                <!-- Statistics Column -->
                                <td class="px-6 py-4">
                                    <div class="grid grid-cols-2 gap-1">
                                        <div class="text-xs">
                                            <span class="text-gray-500 dark:text-gray-400">Cities:</span>
                                            <span class="font-medium text-gray-900 dark:text-white">{{ $item->total_cities }}</span>
                                        </div>
                                        <div class="text-xs">
                                            <span class="text-gray-500 dark:text-gray-400">Countries:</span>
                                            <span class="font-medium text-gray-900 dark:text-white">{{ $item->total_countries }}</span>
                                        </div>
                                        <div class="text-xs">
                                            <span class="text-gray-500 dark:text-gray-400">Employees:</span>
                                            <span class="font-medium text-gray-900 dark:text-white">{{ $item->total_employees }}</span>
                                        </div>
                                        <div class="text-xs">
                                            <span class="text-gray-500 dark:text-gray-400">Clients:</span>
                                            <span class="font-medium text-gray-900 dark:text-white">{{ $item->total_clients }}</span>
                                        </div>
                                        <div class="text-xs col-span-2">
                                            <span class="text-gray-500 dark:text-gray-400">Projects:</span>
                                            <span class="font-medium text-gray-900 dark:text-white">{{ $item->total_projects }}</span>
                                        </div>
                                    </div>
                                </td>

                                <!-- Created By Column -->


                                <!-- Updated By Column -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="flex-shrink-0 w-8 h-8 bg-gradient-to-br from-emerald-400 to-emerald-600 rounded-full flex items-center justify-center text-white text-xs font-semibold">
                                            {{ $item->updater ? strtoupper(substr($item->updater->name, 0, 2)) : 'N/A' }}
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                {{ $item->updater ? $item->updater->name : 'N/A' }}
                                            </div>
                                            <div class="text-xs text-gray-500 dark:text-gray-400">
                                                Updater
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <!-- Created Date Column -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 dark:text-white font-medium">
                                        {{ $item->created_at->format('d M Y') }}
                                    </div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">
                                        {{ $item->created_at->format('H:i') }}
                                    </div>
                                </td>

                                <!-- Updated Date Column -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 dark:text-white font-medium">
                                        {{ $item->updated_at->format('d M Y') }}
                                    </div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">
                                        {{ $item->updated_at->format('H:i') }}
                                    </div>
                                </td>

                                <!-- Actions Column -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <!-- Edit Button -->
                                        <button class="editBtn inline-flex items-center gap-1 bg-amber-50 dark:bg-amber-900/30 hover:bg-amber-100 dark:hover:bg-amber-900/50 text-amber-600 dark:text-amber-400 px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-200 group"
                                                data-id="{{ $item->id }}"
                                                title="Edit Record">
                                            <span class="text-sm">✏️</span>
                                            <span class="hidden sm:inline">Edit</span>
                                        </button>

                                        <!-- Delete Button -->
                                        <button class="deleteBtn inline-flex items-center gap-1 bg-red-50 dark:bg-red-900/30 hover:bg-red-100 dark:hover:bg-red-900/50 text-red-600 dark:text-red-400 px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-200 group"
                                                data-id="{{ $item->id }}"
                                                title="Delete Record">
                                            <span class="text-sm">🗑️</span>
                                            <span class="hidden sm:inline">Delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        @if ($totals->count() === 0)
                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center gap-3 text-gray-500 dark:text-gray-400">
                                        <span class="text-4xl">📊</span>
                                        <div class="text-lg font-medium">No records found</div>
                                        <p class="text-sm">Get started by adding your first statistics record</p>
                                        <button id="createNewTotalEmpty"
                                                class="mt-2 bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                                            Add New Record
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <!-- Simple Collection Info -->
            @if ($totals->count() > 0)
                <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/50">
                    <div class="text-center text-sm text-gray-600 dark:text-gray-400">
                        Showing all {{ $totals->count() }} record{{ $totals->count() > 1 ? 's' : '' }}
                    </div>
                </div>
            @endif
        </div>

        <!-- Quick Tips -->
        <div class="mt-8 bg-gradient-to-r from-indigo-50 to-blue-50 dark:from-gray-800 dark:to-gray-900 rounded-2xl shadow-lg border border-indigo-200 dark:border-gray-700 p-6">
            <div class="flex items-start gap-4">
                <div class="flex-shrink-0 w-12 h-12 bg-indigo-100 dark:bg-indigo-900/30 rounded-xl flex items-center justify-center">
                    <span class="text-2xl text-indigo-600 dark:text-indigo-400">💡</span>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-2">Statistics Management Tips</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-600 dark:text-gray-400">
                        <div class="flex items-center gap-2">
                            <span class="text-indigo-500">✓</span>
                            Keep your statistics up to date regularly
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-indigo-500">✓</span>
                            Track trends by recording historical data
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-indigo-500">✓</span>
                            Verify data accuracy before submission
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-indigo-500">✓</span>
                            Review statistics quarterly for insights
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create/Edit Modal -->
    <div id="totalModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 dark:bg-gray-900 dark:bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <div class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-2xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <!-- Modal Header -->
                <div class="bg-gradient-to-r from-indigo-50 to-blue-50 dark:from-gray-700 dark:to-gray-800 px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white" id="modalTitle">
                            <span class="text-xl mr-2">📊</span>
                            Add New Record
                        </h3>
                        <button type="button" class="closeModal text-gray-400 hover:text-gray-500 dark:text-gray-500 dark:hover:text-gray-400 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 p-1 transition-colors">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Enter the statistics for your organization</p>
                </div>

                <!-- Modal Body -->
                <div class="px-6 py-6">
                    <form id="totalForm">
                        @csrf
                        <input type="hidden" id="totalId" name="total_id">

                        <div class="grid grid-cols-1 gap-5">
                            <div>
                                <label for="total_cities" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    <span class="text-blue-600 dark:text-blue-400">🏙️</span>
                                    Total Cities
                                </label>
                                <input type="number"
                                       class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 dark:focus:ring-indigo-800 focus:ring-opacity-50 transition-colors"
                                       id="total_cities"
                                       name="total_cities"
                                       required
                                       min="0"
                                       placeholder="Enter number of cities">
                            </div>

                            <div>
                                <label for="total_countries" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    <span class="text-green-600 dark:text-green-400">🌍</span>
                                    Total Countries
                                </label>
                                <input type="number"
                                       class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 dark:focus:ring-indigo-800 focus:ring-opacity-50 transition-colors"
                                       id="total_countries"
                                       name="total_countries"
                                       required
                                       min="0"
                                       placeholder="Enter number of countries">
                            </div>

                            <div>
                                <label for="total_employees" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    <span class="text-purple-600 dark:text-purple-400">👥</span>
                                    Total Employees
                                </label>
                                <input type="number"
                                       class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 dark:focus:ring-indigo-800 focus:ring-opacity-50 transition-colors"
                                       id="total_employees"
                                       name="total_employees"
                                       required
                                       min="0"
                                       placeholder="Enter number of employees">
                            </div>

                            <div>
                                <label for="total_clients" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    <span class="text-amber-600 dark:text-amber-400">🤝</span>
                                    Total Clients
                                </label>
                                <input type="number"
                                       class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 dark:focus:ring-indigo-800 focus:ring-opacity-50 transition-colors"
                                       id="total_clients"
                                       name="total_clients"
                                       required
                                       min="0"
                                       placeholder="Enter number of clients">
                            </div>

                            <div>
                                <label for="total_projects" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    <span class="text-red-600 dark:text-red-400">🚀</span>
                                    Total Projects
                                </label>
                                <input type="number"
                                       class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 dark:focus:ring-indigo-800 focus:ring-opacity-50 transition-colors"
                                       id="total_projects"
                                       name="total_projects"
                                       required
                                       min="0"
                                       placeholder="Enter number of projects">
                            </div>
                        </div>

                        <!-- Validation Errors -->
                        <div id="validationErrors" class="mt-4 hidden">
                            <div class="bg-red-50 dark:bg-red-900/30 border border-red-200 dark:border-red-700 rounded-xl px-4 py-3">
                                <div class="flex items-start gap-3">
                                    <span class="text-red-600 dark:text-red-400 text-lg">⚠️</span>
                                    <div class="flex-1">
                                        <h4 class="text-sm font-medium text-red-800 dark:text-red-300 mb-1">Please fix the following errors:</h4>
                                        <ul class="list-disc list-inside text-sm text-red-700 dark:text-red-400 space-y-1"></ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Modal Footer -->
                <div class="bg-gray-50 dark:bg-gray-700/50 px-6 py-4 border-t border-gray-200 dark:border-gray-700 flex flex-col sm:flex-row justify-end gap-3">
                    <button type="button" class="closeModal w-full sm:w-auto inline-flex justify-center rounded-xl border border-gray-300 dark:border-gray-600 shadow-sm px-4 py-2 bg-white dark:bg-gray-700 text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                        Cancel
                    </button>
                    <button type="button" id="saveTotal" class="w-full sm:w-auto inline-flex justify-center rounded-xl border border-transparent shadow-sm px-6 py-2 bg-gradient-to-r from-indigo-500 to-blue-600 hover:from-indigo-600 hover:to-blue-700 text-sm font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                        <span id="saveButtonText">Save Record</span>
                        <span id="saveButtonLoading" class="hidden">
                            <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Saving...
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 dark:bg-gray-900 dark:bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <div class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-2xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <!-- Modal Header -->
                <div class="bg-gradient-to-r from-red-50 to-rose-50 dark:from-gray-700 dark:to-gray-800 px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center gap-3">
                        <div class="flex-shrink-0 w-12 h-12 bg-red-100 dark:bg-red-900/30 rounded-xl flex items-center justify-center">
                            <span class="text-2xl text-red-600 dark:text-red-400">🗑️</span>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Delete Record</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">This action cannot be undone</p>
                        </div>
                    </div>
                </div>

                <!-- Modal Body -->
                <div class="px-6 py-6">
                    <div class="bg-amber-50 dark:bg-amber-900/20 border border-amber-200 dark:border-amber-700 rounded-xl p-4">
                        <div class="flex items-start gap-3">
                            <span class="text-amber-600 dark:text-amber-400 text-lg">⚠️</span>
                            <div>
                                <p class="text-sm text-gray-700 dark:text-gray-300">
                                    Are you sure you want to delete this record? This action cannot be undone and all associated data will be permanently removed.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="bg-gray-50 dark:bg-gray-700/50 px-6 py-4 border-t border-gray-200 dark:border-gray-700 flex flex-col sm:flex-row justify-end gap-3">
                    <button type="button" class="closeDeleteModal w-full sm:w-auto inline-flex justify-center rounded-xl border border-gray-300 dark:border-gray-600 shadow-sm px-4 py-2 bg-white dark:bg-gray-700 text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                        Cancel
                    </button>
                    <button type="button" id="confirmDelete" class="w-full sm:w-auto inline-flex justify-center rounded-xl border border-transparent shadow-sm px-6 py-2 bg-gradient-to-r from-red-500 to-rose-600 hover:from-red-600 hover:to-rose-700 text-sm font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors">
                        <span id="deleteButtonText">Delete Record</span>
                        <span id="deleteButtonLoading" class="hidden">
                            <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Deleting...
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Modal handlers
            function openModal(modalId) {
                $(modalId).removeClass('hidden');
                $('body').addClass('overflow-hidden');
            }

            function closeModal(modalId) {
                $(modalId).addClass('hidden');
                $('body').removeClass('overflow-hidden');
            }

            // Close modals with X button or cancel
            $('.closeModal, .closeDeleteModal').click(function() {
                closeModal($(this).closest('.fixed.inset-0'));
            });

            // Close modal on overlay click
            $('.fixed.inset-0 > .fixed.inset-0').click(function() {
                closeModal($(this).closest('.fixed.inset-0'));
            });

            // Create new total
            $('#createNewTotal, #createNewTotalEmpty').click(function() {
                $('#modalTitle').text('📊 Add New Record');
                $('#totalForm')[0].reset();
                $('#totalId').val('');
                $('#validationErrors').addClass('hidden').find('ul').empty();
                $('#saveButtonText').show();
                $('#saveButtonLoading').hide();
                openModal('#totalModal');
            });

            // Edit total
            $(document).on('click', '.editBtn', function() {
                var id = $(this).data('id');
                $('#modalTitle').text('✏️ Edit Record');
                $('#validationErrors').addClass('hidden').find('ul').empty();

                // Show loading state
                $('#saveButtonText').hide();
                $('#saveButtonLoading').show();
                $('#saveTotal').prop('disabled', true);

                $.ajax({
                    url: '/totals/' + id + '/edit',
                    type: 'GET',
                    dataType: 'json',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    success: function(response) {
                        $('#totalId').val(response.id);
                        $('#total_cities').val(response.total_cities);
                        $('#total_countries').val(response.total_countries);
                        $('#total_employees').val(response.total_employees);
                        $('#total_clients').val(response.total_clients);
                        $('#total_projects').val(response.total_projects);
                        openModal('#totalModal');
                        $('#saveButtonText').show();
                        $('#saveButtonLoading').hide();
                        $('#saveTotal').prop('disabled', false);
                    },
                    error: function(xhr) {
                        let errorMessage = 'Error loading data. ';
                        if (xhr.status === 404) {
                            errorMessage += 'Record not found.';
                        } else if (xhr.status === 500) {
                            errorMessage += 'Server error. Please check the logs.';
                        } else {
                            errorMessage += 'Please try again.';
                        }
                        alert(errorMessage);
                        $('#saveButtonText').show();
                        $('#saveButtonLoading').hide();
                        $('#saveTotal').prop('disabled', false);
                    }
                });
            });

            // Save total
            $('#saveTotal').click(function() {
                var id = $('#totalId').val();
                var url = id ? '/totals/' + id : '/totals';
                var method = id ? 'PUT' : 'POST';

                // Show loading state
                $('#saveButtonText').hide();
                $('#saveButtonLoading').show();
                $(this).prop('disabled', true);

                $.ajax({
                    url: url,
                    type: method,
                    data: $('#totalForm').serialize(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    success: function(response) {
                        closeModal('#totalModal');
                        location.reload();
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON.errors;
                            var errorHtml = '';
                            $.each(errors, function(key, value) {
                                errorHtml += '<li>' + value[0] + '</li>';
                            });
                            $('#validationErrors').find('ul').html(errorHtml);
                            $('#validationErrors').removeClass('hidden');
                        } else {
                            alert('Error saving data. Please try again.');
                        }
                        $('#saveButtonText').show();
                        $('#saveButtonLoading').hide();
                        $('#saveTotal').prop('disabled', false);
                    }
                });
            });

            // Delete total
            var deleteId = null;
            $(document).on('click', '.deleteBtn', function() {
                deleteId = $(this).data('id');
                $('#deleteButtonText').show();
                $('#deleteButtonLoading').hide();
                $('#confirmDelete').prop('disabled', false);
                openModal('#deleteModal');
            });

            $('#confirmDelete').click(function() {
                if (deleteId) {
                    // Show loading state
                    $('#deleteButtonText').hide();
                    $('#deleteButtonLoading').show();
                    $(this).prop('disabled', true);

                    $.ajax({
                        url: '/totals/' + deleteId,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        success: function(response) {
                            closeModal('#deleteModal');
                            location.reload();
                        },
                        error: function(xhr) {
                            alert('Error deleting data. Please try again.');
                            $('#deleteButtonText').show();
                            $('#deleteButtonLoading').hide();
                            $('#confirmDelete').prop('disabled', false);
                        }
                    });
                }
            });

            // Reset modal state when closed
            $('#totalModal, #deleteModal').on('hidden', function() {
                $('#saveButtonText').show();
                $('#saveButtonLoading').hide();
                $('#saveTotal').prop('disabled', false);
                $('#deleteButtonText').show();
                $('#deleteButtonLoading').hide();
                $('#confirmDelete').prop('disabled', false);
                $('#validationErrors').addClass('hidden').find('ul').empty();
            });
        });
    </script>

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

        /* Custom scrollbar for modal */
        .modal-scroll {
            scrollbar-width: thin;
            scrollbar-color: rgba(156, 163, 175, 0.5) transparent;
        }

        .modal-scroll::-webkit-scrollbar {
            width: 6px;
        }

        .modal-scroll::-webkit-scrollbar-track {
            background: transparent;
        }

        .modal-scroll::-webkit-scrollbar-thumb {
            background-color: rgba(156, 163, 175, 0.5);
            border-radius: 3px;
        }

        /* Input focus styles */
        input:focus {
            outline: none;
            ring: 2px solid rgba(99, 102, 241, 0.5);
        }
    </style>
</x-app-layout>
