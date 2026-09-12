<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <h2 class="ml-[14%] font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4 sm:mb-0">
                {{ __('Dashboard Overview') }}
            </h2>
           <div
    id="welcomeMessage"
    class="text-sm text-gray-600 dark:text-gray-400"
>
    Welcome back, {{ Auth::user()->name }}
    <span id="waveHand" class="wave-hand">👋</span>
</div>
<style>
.wave-hand {
    display: inline-block;
    transform-origin: 70% 70%;
    animation: wave 1.2s infinite;
}

@keyframes wave {
    0%   { transform: rotate(0deg); }
    15%  { transform: rotate(14deg); }
    30%  { transform: rotate(-8deg); }
    45%  { transform: rotate(14deg); }
    60%  { transform: rotate(-4deg); }
    100% { transform: rotate(0deg); }
}
</style>

        </div>
    </x-slot>

    <!-- Stats Cards Grid -->
    <div class="max-w-[80%] ml-[19%] px-4 sm:px-6 lg:px-8 py-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 gap-6 mb-8">
            <!-- Total Careers Card -->
            <div class="bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900  shadow-lg border border-gray-200 dark:border-gray-700 p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-xl">
                <div class="flex items-center justify-between mb-4">
                <div class="flex items-center text-lg font-bold text-gray-700 dark:text-gray-300">
                    <span>Careers</span>
                </div>
                    <div class="text-right">
                        <div class="text-5xl font-bold text-gray-900 dark:text-white" data-total="careerTotal">
                            {{ $careerTotal }}
                        </div>
                        <div class="text-sm text-gray-600 dark:text-gray-400 mt-1">Total</div>
                    </div>
                </div>


            </div>

            <!-- Total News Card -->
            <div class="bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 shadow-lg border border-gray-200 dark:border-gray-700 p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-xl">
                <div class="flex items-center justify-between mb-4">
                   <div class="flex items-center text-lg font-bold text-gray-700 dark:text-gray-300">
                    <span>News Articles</span>
                </div>
                    <div class="text-right">
                        <div class="text-5xl font-bold text-gray-900 dark:text-white" data-total="newsTotal">
                            {{ $newsTotal }}
                        </div>
                        <div class="text-sm text-gray-600 dark:text-gray-400 mt-1">Total</div>
                    </div>
                </div>


            </div>

            <!-- Total Projects Card -->
            <div class="bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900  shadow-lg border border-gray-200 dark:border-gray-700 p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-xl">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center text-lg font-bold text-gray-700 dark:text-gray-300">
                    <span>Projects</span>
                </div>
                    <div class="text-right">
                        <div class="text-5xl font-bold text-gray-900 dark:text-white" data-total="projectsTotal">
                            {{ $projectsTotal }}
                        </div>
                        <div class="text-sm text-gray-600 dark:text-gray-400 mt-1">Total</div>
                    </div>
                </div>


            </div>

            <!-- Total Service Card -->
            <div class="bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900  shadow-lg border border-gray-200 dark:border-gray-700 p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-xl">
                <div class="flex items-center justify-between mb-4">
                   <div class="flex items-center text-lg font-bold text-gray-700 dark:text-gray-300">
                    <span>Services</span>
                </div>
                    <div class="text-right">
                        <div class="text-5xl font-bold text-gray-900 dark:text-white" data-total="serviceTotal">
                            {{ $serviceTotal }}
                        </div>
                        <div class="text-sm text-gray-600 dark:text-gray-400 mt-1">Total</div>
                    </div>
                </div>

            </div>

            <!-- Total Clients Card -->
            <div class="bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900  shadow-lg border border-gray-200 dark:border-gray-700 p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-xl">
                <div class="flex items-center justify-between mb-4">
                      <div class="flex items-center text-lg font-bold text-gray-700 dark:text-gray-300">
                    <span>Clients</span>
                </div>
                    <div class="text-right">
                        <div class="text-5xl font-bold text-gray-900 dark:text-white" data-total="clientsTotal">
                            {{ $clientsTotal }}
                        </div>
                        <div class="text-sm text-gray-600 dark:text-gray-400 mt-1">Total</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enhanced Filter Section -->
<!-- Toggle Button to show/hide the filter -->
<button id="toggleFilterBtn"
        class="mb-4 bg-gradient-to-r from-[#e9bc64] to-[#e9bc64] hover:from-[#f7c156] hover:to-[#e9bc64] text-white px-6 py-2 rounded-lg font-medium shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200 focus:ring-2 focus:ring-[#e9bc64] focus:ring-offset-2 flex items-center gap-2">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
    </svg>
    Filters
</button>

<!-- Your filter div with id for toggling -->
<div id="filterContainer" style="display: none;">
    <div class="bg-white dark:bg-gray-800  shadow-lg border border-gray-200 dark:border-gray-700 p-6 mb-8">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6 mb-6">
            <div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">Advanced Statistics Filter</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400">Apply multiple filters to get detailed insights</p>
            </div>
            <div class="flex items-center gap-3">
                <button type="button" id="resetFilterBtn"
                        class="px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200 font-medium">
                    Reset All
                </button>
                <button type="button" id="applyFilterBtn"
                        class="bg-gradient-to-r from-[#e9bc64] to-[#e9bc64] hover:from-[#f7c156] hover:to-[#e9bc64] text-white px-6 py-2 rounded-lg font-medium shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200 focus:ring-2 focus:ring-[#e9bc64] focus:ring-offset-2 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                    </svg>
                    Apply Filters
                </button>
            </div>
        </div>

        <div id="filterForm" class="space-y-6">
            <!-- Date Range Filter -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Quick Date Presets</label>
                    <div class="flex flex-wrap gap-2">
                        <button type="button" data-preset="today" class="quick-date-btn px-3 py-1.5 text-xs rounded-lg border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">Today</button>
                        <button type="button" data-preset="yesterday" class="quick-date-btn px-3 py-1.5 text-xs rounded-lg border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">Yesterday</button>
                        <button type="button" data-preset="week" class="quick-date-btn px-3 py-1.5 text-xs rounded-lg border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">This Week</button>
                        <button type="button" data-preset="month" class="quick-date-btn px-3 py-1.5 text-xs rounded-lg border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">This Month</button>
                        <button type="button" data-preset="year" class="quick-date-btn px-3 py-1.5 text-xs rounded-lg border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">This Year</button>
                    </div>
                </div>

                <div>
                    <label for="fromDate" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">From Date</label>
                    <input type="date" name="from" id="fromDate" value="{{ $from ?? date('Y-m-d') }}"
                           class="w-full rounded-lg border border-gray-300 dark:border-gray-600 px-3 py-2 text-sm bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-[#e9bc64] focus:border-transparent transition-all duration-200">
                </div>

                <div>
                    <label for="toDate" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">To Date</label>
                    <input type="date" name="to" id="toDate" value="{{ $to ?? date('Y-m-d') }}"
                           class="w-full rounded-lg border border-gray-300 dark:border-gray-600 px-3 py-2 text-sm bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-[#e9bc64] focus:border-transparent transition-all duration-200">
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Toggle filter visibility when button is clicked
    document.getElementById('toggleFilterBtn').addEventListener('click', function() {
        const container = document.getElementById('filterContainer');
        if (container.style.display === 'none') {
            container.style.display = 'block';
        } else {
            container.style.display = 'none';
        }
    });
</script>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 xl:grid-cols-2 gap-8">
            <!-- Donut Chart -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Content Distribution</h3>
                    <div class="text-sm text-gray-500 dark:text-gray-400">Percentage</div>
                </div>
                <div class="h-80 relative">
                    <canvas id="overviewDonutChart" class="w-full h-full"></canvas>
                </div>
            </div>

            <!-- Line Chart -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Content Trends</h3>
                    <div class="text-sm text-gray-500 dark:text-gray-400">Count Overview</div>
                </div>
                <div class="h-80 relative">
                    <canvas id="overviewLineChart" class="w-full h-full"></canvas>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
      <div class="mt-8 bg-[#e9bc64]/20 from-blue-50 to-indigo-50 dark:from-gray-800 dark:to-gray-900 rounded-2xl shadow-lg border border-[#e9bc64]/20 dark:border-gray-700 p-6">
    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Quick Actions</h3>
    <div class="flex flex-wrap gap-4">
        <a href="{{ route('news.index') }}"
           class="flex items-center px-6 py-3 bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-md transition-all duration-200 hover:scale-105 border border-gray-200 dark:border-gray-700">
            <span class="font-medium text-gray-700 dark:text-gray-300 whitespace-nowrap">Manage News</span>
        </a>
        <a href="{{ route('careerss.index') }}"
           class="flex items-center px-6 py-3 bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-md transition-all duration-200 hover:scale-105 border border-gray-200 dark:border-gray-700">
            <span class="font-medium text-gray-700 dark:text-gray-300 whitespace-nowrap">Manage Careers</span>
        </a>
        <a href="{{ route('projects.index') }}"
           class="flex items-center px-6 py-3 bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-md transition-all duration-200 hover:scale-105 border border-gray-200 dark:border-gray-700">
            <span class="font-medium text-gray-700 dark:text-gray-300 whitespace-nowrap">Manage Projects</span>
        </a>
        <a href="{{ route('services.index') }}"
           class="flex items-center px-6 py-3 bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-md transition-all duration-200 hover:scale-105 border border-gray-200 dark:border-gray-700">
            <span class="font-medium text-gray-700 dark:text-gray-300 whitespace-nowrap">Manage Services</span>
        </a>
        <a href="{{ route('clients.index') }}"
           class="flex items-center px-6 py-3 bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-md transition-all duration-200 hover:scale-105 border border-gray-200 dark:border-gray-700">
            <span class="font-medium text-gray-700 dark:text-gray-300 whitespace-nowrap">Manage Clients</span>
        </a>
        <a href="{{ route('totals.index') }}"
           class="flex items-center px-6 py-3 bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-md transition-all duration-200 hover:scale-105 border border-gray-200 dark:border-gray-700">
            <span class="font-medium text-gray-700 dark:text-gray-300 whitespace-nowrap">Manage Statistics</span>
        </a>
    </div>
</div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>

    <script>
        // Setup initial charts data from filtered counts
        const labels = ['Careers', 'News', 'Projects', 'Services', 'Clients'];
        let dataValues = [
            {{ $careerCount }},
            {{ $newsCount }},
            {{ $projectsCount }},
            {{ $serviceCount }},
            {{ $clientsCount }}
        ];

        const donutCtx = document.getElementById('overviewDonutChart').getContext('2d');
        const lineCtx = document.getElementById('overviewLineChart').getContext('2d');

        // Color scheme
        const colors = {
            blue: '#3B82F6',
            green: '#10B981',
            amber: '#F59E0B',
            purple: '#8B5CF6',
            indigo: '#6366F1',
            red: '#EF4444'
        };

        // Donut Chart
        const overviewDonutChart = new Chart(donutCtx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    data: dataValues,
                    backgroundColor: [
                        colors.blue,
                        colors.green,
                        colors.amber,
                        colors.purple,
                        colors.indigo
                    ],
                    borderColor: document.documentElement.classList.contains('dark') ? '#374151' : '#fff',
                    borderWidth: 3,
                    hoverBorderWidth: 4,
                    hoverOffset: 10
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '65%',
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 20,
                            usePointStyle: true,
                            pointStyle: 'circle',
                            color: document.documentElement.classList.contains('dark') ? 'white' : 'black',
                            font: {
                                size: 12,
                                weight: '500'
                            }
                        }
                    },
                    tooltip: {
                        backgroundColor: document.documentElement.classList.contains('dark') ? '#1F2937' : '#fff',
                        titleColor: document.documentElement.classList.contains('dark') ? 'white' : 'black',
                        bodyColor: document.documentElement.classList.contains('dark') ? 'white' : 'black',
                        borderColor: '#E5E7EB',
                        borderWidth: 1,
                        cornerRadius: 8,
                        displayColors: true
                    },
                    datalabels: {
                        color: '#fff',
                        font: {
                            weight: 'bold',
                            size: 11
                        },
                        formatter: (value, context) => {
                            return value > 0 ? value : '';
                        }
                    }
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                }
            },
            plugins: [ChartDataLabels]
        });

        // Line Chart
        const overviewLineChart = new Chart(lineCtx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Content Count',
                    data: dataValues,
                    fill: true,
                    backgroundColor: document.documentElement.classList.contains('dark')
                        ? 'rgba(59, 130, 246, 0.1)'
                        : 'rgba(59, 130, 246, 0.05)',
                    borderColor: colors.blue,
                    borderWidth: 3,
                    tension: 0.4,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: colors.blue,
                    pointBorderWidth: 3,
                    pointRadius: 6,
                    pointHoverRadius: 8,
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: colors.blue,
                    pointHoverBorderWidth: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: document.documentElement.classList.contains('dark')
                                ? 'rgba(255, 255, 255, 0.1)'
                                : 'rgba(0, 0, 0, 0.1)'
                        },
                        ticks: {
                            color: document.documentElement.classList.contains('dark') ? 'white' : 'black',
                            font: {
                                size: 11
                            }
                        }
                    },
                    x: {
                        grid: {
                            color: document.documentElement.classList.contains('dark')
                                ? 'rgba(255, 255, 255, 0.1)'
                                : 'rgba(0, 0, 0, 0.1)'
                        },
                        ticks: {
                            color: document.documentElement.classList.contains('dark') ? 'white' : 'black',
                            font: {
                                size: 11,
                                weight: '500'
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: document.documentElement.classList.contains('dark') ? '#1F2937' : '#fff',
                        titleColor: document.documentElement.classList.contains('dark') ? 'white' : 'black',
                        bodyColor: document.documentElement.classList.contains('dark') ? 'white' : 'black',
                        borderColor: '#E5E7EB',
                        borderWidth: 1,
                        cornerRadius: 8
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index'
                },
                animation: {
                    duration: 1000,
                    easing: 'easeOutQuart'
                }
            }
        });

        // NEW: Flag to track if filters have been applied on page load
        let filtersAppliedOnLoad = false;

        // Enhanced Filter Functions
        document.addEventListener('DOMContentLoaded', function() {
            const filterForm = document.getElementById('filterForm');
            const resetBtn = document.getElementById('resetFilterBtn');
            const applyBtn = document.getElementById('applyFilterBtn');
            const toggleAdvancedBtn = document.getElementById('toggleAdvancedFilters');
            const advancedFilters = document.getElementById('advancedFilters');
            const quickDateBtns = document.querySelectorAll('.quick-date-btn');

            // NEW: Auto-apply filters for today's date on page load
            function autoApplyTodayFilter() {
                console.log('Auto-applying today filter...');

                // Set today's date in inputs
                const today = new Date();
                const todayStr = today.toISOString().split('T')[0];

                const fromDate = document.getElementById('fromDate');
                const toDate = document.getElementById('toDate');

                if (fromDate && !fromDate.value) {
                    fromDate.value = todayStr;
                }
                if (toDate && !toDate.value) {
                    toDate.value = todayStr;
                }

                // Highlight "Today" button
                quickDateBtns.forEach(btn => {
                    if (btn.dataset.preset === 'today') {
                        btn.classList.add('bg-blue-500', 'text-white', 'border-blue-500');
                    }
                });

                // Apply filters
                if (!filtersAppliedOnLoad) {
                    filtersAppliedOnLoad = true;
                    setTimeout(() => {
                        applyFilters();
                    }, 500); // Small delay to ensure everything is loaded
                }
            }

            // Call auto-apply function
            autoApplyTodayFilter();

            // Toggle advanced filters
            if (toggleAdvancedBtn) {
                toggleAdvancedBtn.addEventListener('click', function() {
                    const isHidden = advancedFilters.classList.contains('hidden');
                    advancedFilters.classList.toggle('hidden');

                    // Update icon and text
                    if (isHidden) {
                        this.innerHTML = '<svg class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="transform: rotate(180deg);"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg> Hide Advanced';
                    } else {
                        this.innerHTML = '<svg class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg> Show Advanced';
                    }
                });
            }

            // Quick date preset buttons
            if (quickDateBtns.length > 0) {
                quickDateBtns.forEach(btn => {
                    btn.addEventListener('click', function() {
                        const preset = this.dataset.preset;
                        const today = new Date();
                        const fromDate = document.getElementById('fromDate');
                        const toDate = document.getElementById('toDate');

                        let from, to;

                        switch(preset) {
                            case 'today':
                                from = today.toISOString().split('T')[0];
                                to = today.toISOString().split('T')[0];
                                break;
                            case 'yesterday':
                                const yesterday = new Date(today);
                                yesterday.setDate(today.getDate() - 1);
                                from = yesterday.toISOString().split('T')[0];
                                to = yesterday.toISOString().split('T')[0];
                                break;
                            case 'week':
                                const weekStart = new Date(today);
                                weekStart.setDate(today.getDate() - today.getDay());
                                from = weekStart.toISOString().split('T')[0];
                                to = today.toISOString().split('T')[0];
                                break;
                            case 'month':
                                from = new Date(today.getFullYear(), today.getMonth(), 1).toISOString().split('T')[0];
                                to = today.toISOString().split('T')[0];
                                break;
                            case 'year':
                                from = new Date(today.getFullYear(), 0, 1).toISOString().split('T')[0];
                                to = today.toISOString().split('T')[0];
                                break;
                        }

                        if (fromDate) fromDate.value = from;
                        if (toDate) toDate.value = to;

                        // Highlight active preset
                        quickDateBtns.forEach(b => b.classList.remove('bg-blue-500', 'text-white', 'border-blue-500'));
                        this.classList.add('bg-blue-500', 'text-white', 'border-blue-500');

                        // Apply filters
                        applyFilters();
                    });
                });
            }

            // Reset all filters
            if (resetBtn) {
                resetBtn.addEventListener('click', function() {
                    // Clear date inputs
                    const fromDate = document.getElementById('fromDate');
                    const toDate = document.getElementById('toDate');
                    if (fromDate) fromDate.value = '';
                    if (toDate) toDate.value = '';

                    // Reset checkboxes
                    document.querySelectorAll('.content-type-checkbox').forEach(cb => {
                        cb.checked = true;
                    });
                    document.querySelectorAll('.status-checkbox').forEach(cb => {
                        cb.checked = cb.value === 'published';
                    });

                    // Reset other inputs
                    document.getElementById('rangeType').value = 'created_at';
                    document.getElementById('sortBy').value = 'count_desc';
                    document.getElementById('minCount').value = '';
                    document.getElementById('maxCount').value = '';
                    document.getElementById('searchTerm').value = '';

                    // Remove active class from quick date buttons
                    quickDateBtns.forEach(b => b.classList.remove('bg-blue-500', 'text-white', 'border-blue-500'));

                    // Apply reset immediately
                    applyFilters();
                });
            }

            // Apply filters button
            if (applyBtn) {
                applyBtn.addEventListener('click', function() {
                    applyFilters();
                });
            }

            // Auto-apply when date inputs change
            const fromDate = document.getElementById('fromDate');
            const toDate = document.getElementById('toDate');
            if (fromDate) fromDate.addEventListener('change', applyFilters);
            if (toDate) toDate.addEventListener('change', applyFilters);
        });

        // Main function to apply filters
        function applyFilters() {
            // Collect all filter values
            const filters = {
                from: document.getElementById('fromDate')?.value || '',
                to: document.getElementById('toDate')?.value || '',
                range_type: document.getElementById('rangeType')?.value || 'created_at',
                sort_by: document.getElementById('sortBy')?.value || 'count_desc',
                min_count: document.getElementById('minCount')?.value || '',
                max_count: document.getElementById('maxCount')?.value || '',
                search: document.getElementById('searchTerm')?.value || ''
            };

            // Get checked content types
            const contentTypes = [];
            document.querySelectorAll('.content-type-checkbox:checked').forEach(cb => {
                contentTypes.push(cb.value);
            });
            filters.content_types = contentTypes;

            // Get checked statuses
            const statuses = [];
            document.querySelectorAll('.status-checkbox:checked').forEach(cb => {
                statuses.push(cb.value);
            });
            filters.status = statuses;

            // Show loading state
            const applyBtn = document.getElementById('applyFilterBtn');
            if (applyBtn) {
                const originalText = applyBtn.innerHTML;
                applyBtn.innerHTML = '<svg class="animate-spin h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Applying...';
                applyBtn.disabled = true;

                // Build query string
                const params = new URLSearchParams();
                Object.entries(filters).forEach(([key, value]) => {
                    if (Array.isArray(value)) {
                        value.forEach(v => params.append(key + '[]', v));
                    } else if (value !== '') {
                        params.append(key, value);
                    }
                });

                console.log('Applying filters:', filters);
                console.log('Query params:', params.toString());

                fetch(`?${params.toString()}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                })
                .then(response => {
                    console.log('Response status:', response.status);
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Received data:', data);

                    if (data.success) {
                        const newValues = [
                            data.careerCount || 0,
                            data.newsCount || 0,
                            data.projectsCount || 0,
                            data.serviceCount || 0,
                            data.clientsCount || 0
                        ];

                        // Update charts
                        overviewDonutChart.data.datasets[0].data = newValues;
                        overviewDonutChart.update('active');

                        overviewLineChart.data.datasets[0].data = newValues;
                        overviewLineChart.update('active');

                        // Update totals if provided
                        if (data.totals) {
                            document.querySelectorAll('[data-total]').forEach(el => {
                                const type = el.dataset.total;
                                if (data.totals[type]) {
                                    el.textContent = data.totals[type];
                                }
                            });
                        }

                        // Show success notification only if not initial load
                        if (filtersAppliedOnLoad) {
                        }
                    } else {
                        throw new Error(data.message || 'Failed to apply filters');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showNotification('Failed to apply filters: ' + error.message, 'error');
                })
                .finally(() => {
                    applyBtn.innerHTML = originalText;
                    applyBtn.disabled = false;
                });
            }
        }

        // Notification function
        function showNotification(message, type = 'info') {
            // Remove existing notification
            const existing = document.getElementById('filterNotification');
            if (existing) existing.remove();

            const notification = document.createElement('div');
            notification.id = 'filterNotification';
            notification.className = `fixed top-4 right-4 z-50 px-6 py-3 rounded-lg shadow-lg transform transition-all duration-300 ${
                type === 'success' ? 'bg-green-500 text-white' :
                type === 'error' ? 'bg-red-500 text-white' :
                'bg-blue-500 text-white'
            }`;
            notification.innerHTML = `
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="${type === 'success' ? 'M5 13l4 4L19 7' : 'M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z'}"></path>
                    </svg>
                    <span>${message}</span>
                </div>
            `;

            document.body.appendChild(notification);

            // Auto-remove after 3 seconds
            setTimeout(() => {
                notification.style.opacity = '0';
                notification.style.transform = 'translateX(100%)';
                setTimeout(() => notification.remove(), 300);
            }, 3000);
        }

        // Debug initialization
        console.log('Dashboard initialized successfully');
        console.log('Initial values:', dataValues);
    </script>
</x-app-layout>
