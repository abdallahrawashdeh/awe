<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4 sm:mb-0">
                {{ __('Dashboard Overview') }}
            </h2>
            <div class="text-sm text-gray-600 dark:text-gray-400">
                Welcome back, {{ Auth::user()->name }}!
            </div>
        </div>
    </x-slot>

    <!-- Stats Cards Grid -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 gap-6 mb-8">
            <!-- Total Careers Card -->
            <div class="bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-xl">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 shadow-lg">
                        <span class="text-2xl">💼</span>
                    </div>
                    <div class="text-right">
                        <div class="text-3xl font-bold text-gray-900 dark:text-white">
                            {{ $careerTotal }}
                        </div>
                        <div class="text-sm text-gray-600 dark:text-gray-400 mt-1">Total</div>
                    </div>
                </div>
                <div class="flex items-center text-sm font-medium text-gray-700 dark:text-gray-300">
                    <span>Careers</span>
                </div>
                <div class="mt-3 w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                    <div class="bg-blue-500 h-2 rounded-full" style="width: 85%"></div>
                </div>
            </div>

            <!-- Total News Card -->
            <div class="bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-xl">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 rounded-xl bg-gradient-to-br from-green-500 to-green-600 shadow-lg">
                        <span class="text-2xl">📰</span>
                    </div>
                    <div class="text-right">
                        <div class="text-3xl font-bold text-gray-900 dark:text-white">
                            {{ $newsTotal }}
                        </div>
                        <div class="text-sm text-gray-600 dark:text-gray-400 mt-1">Total</div>
                    </div>
                </div>
                <div class="flex items-center text-sm font-medium text-gray-700 dark:text-gray-300">
                    <span>News Articles</span>
                </div>
                <div class="mt-3 w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                    <div class="bg-green-500 h-2 rounded-full" style="width: 70%"></div>
                </div>
            </div>

            <!-- Total Projects Card -->
            <div class="bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-xl">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 rounded-xl bg-gradient-to-br from-amber-500 to-amber-600 shadow-lg">
                        <span class="text-2xl">📁</span>
                    </div>
                    <div class="text-right">
                        <div class="text-3xl font-bold text-gray-900 dark:text-white">
                            {{ $projectsTotal }}
                        </div>
                        <div class="text-sm text-gray-600 dark:text-gray-400 mt-1">Total</div>
                    </div>
                </div>
                <div class="flex items-center text-sm font-medium text-gray-700 dark:text-gray-300">
                    <span>Projects</span>
                </div>
                <div class="mt-3 w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                    <div class="bg-amber-500 h-2 rounded-full" style="width: 60%"></div>
                </div>
            </div>

            <!-- Total Service Card -->
            <div class="bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-xl">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 rounded-xl bg-gradient-to-br from-purple-500 to-purple-600 shadow-lg">
                        <span class="text-2xl">⚙️</span>
                    </div>
                    <div class="text-right">
                        <div class="text-3xl font-bold text-gray-900 dark:text-white">
                            {{ $serviceTotal }}
                        </div>
                        <div class="text-sm text-gray-600 dark:text-gray-400 mt-1">Total</div>
                    </div>
                </div>
                <div class="flex items-center text-sm font-medium text-gray-700 dark:text-gray-300">
                    <span>Services</span>
                </div>
                <div class="mt-3 w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                    <div class="bg-purple-500 h-2 rounded-full" style="width: 75%"></div>
                </div>
            </div>

            <!-- Total Clients Card -->
            <div class="bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-xl">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 rounded-xl bg-gradient-to-br from-indigo-500 to-indigo-600 shadow-lg">
                        <span class="text-2xl">👥</span>
                    </div>
                    <div class="text-right">
                        <div class="text-3xl font-bold text-gray-900 dark:text-white">
                            {{ $clientsTotal }}
                        </div>
                        <div class="text-sm text-gray-600 dark:text-gray-400 mt-1">Total</div>
                    </div>
                </div>
                <div class="flex items-center text-sm font-medium text-gray-700 dark:text-gray-300">
                    <span>Clients</span>
                </div>
                <div class="mt-3 w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                    <div class="bg-indigo-500 h-2 rounded-full" style="width: 90%"></div>
                </div>
            </div>
        </div>

        <!-- Date Filter Section -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 mb-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">Filter by Date Range</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Select a date range to view filtered statistics</p>
                </div>
                <form id="dateFilterForm" class="flex flex-col sm:flex-row items-center gap-4">
                    <div class="flex items-center gap-3">
                        <label class="text-sm font-medium text-gray-700 dark:text-gray-300 whitespace-nowrap">From:</label>
                        <input type="date" name="from" id="fromDate" value="{{ $from ?? '' }}"
                               class="rounded-lg border border-gray-300 dark:border-gray-600 px-3 py-2 text-sm bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                    </div>
                    <div class="flex items-center gap-3">
                        <label class="text-sm font-medium text-gray-700 dark:text-gray-300 whitespace-nowrap">To:</label>
                        <input type="date" name="to" id="toDate" value="{{ $to ?? '' }}"
                               class="rounded-lg border border-gray-300 dark:border-gray-600 px-3 py-2 text-sm bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                    </div>
                    <button type="submit"
                            class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-6 py-2 rounded-lg font-medium shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Apply Filter
                    </button>
                </form>
            </div>
        </div>

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
        <div class="mt-8 bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-gray-800 dark:to-gray-900 rounded-2xl shadow-lg border border-blue-200 dark:border-gray-700 p-6">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Quick Actions</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <a href="{{ route('news.index') }}"
                   class="flex items-center p-4 bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-md transition-all duration-200 hover:scale-105 border border-gray-200 dark:border-gray-700">
                    <span class="text-2xl mr-3">📰</span>
                    <span class="font-medium text-gray-700 dark:text-gray-300">Manage News</span>
                </a>
                <a href="{{ route('careerss.index') }}"
                   class="flex items-center p-4 bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-md transition-all duration-200 hover:scale-105 border border-gray-200 dark:border-gray-700">
                    <span class="text-2xl mr-3">💼</span>
                    <span class="font-medium text-gray-700 dark:text-gray-300">Manage Careers</span>
                </a>
                <a href="{{ route('projects.index') }}"
                   class="flex items-center p-4 bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-md transition-all duration-200 hover:scale-105 border border-gray-200 dark:border-gray-700">
                    <span class="text-2xl mr-3">📁</span>
                    <span class="font-medium text-gray-700 dark:text-gray-300">Manage Projects</span>
                </a>
                <a href="{{ route('clients.index') }}"
                   class="flex items-center p-4 bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-md transition-all duration-200 hover:scale-105 border border-gray-200 dark:border-gray-700">
                    <span class="text-2xl mr-3">👥</span>
                    <span class="font-medium text-gray-700 dark:text-gray-300">Manage Clients</span>
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

        // Update charts on form submit with AJAX fetch
        document.getElementById('dateFilterForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const from = document.getElementById('fromDate').value;
            const to = document.getElementById('toDate').value;

            // Show loading state
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Loading...';
            submitBtn.disabled = true;

            fetch(`?from=${from}&to=${to}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                const newValues = [
                    data.careerCount,
                    data.newsCount,
                    data.projectsCount,
                    data.serviceCount,
                    data.clientsCount
                ];

                overviewDonutChart.data.datasets[0].data = newValues;
                overviewDonutChart.update('active');

                overviewLineChart.data.datasets[0].data = newValues;
                overviewLineChart.update('active');
            })
            .finally(() => {
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            });
        });
    </script>
</x-app-layout>
