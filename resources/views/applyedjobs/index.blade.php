<x-app-layout>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <x-slot name="header">
        <div class="ml-[14%] flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Job Applications') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div >
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Bootstrap 5 CSS -->
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
                    <!-- Font Awesome 6 -->
                    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

                    <style>
                        /* ===== Global Styles ===== */
                        .main-container {
                            max-width: 1400px;
                            margin: 0 auto;
                        }

                        /* ===== Card Styles ===== */
                        .card {
                            border: none;
                            border-radius: 12px;
                            box-shadow: 0 0 20px rgba(0, 0, 0, 0.08);
                            overflow: hidden;
                            background: white;
                        }

                        .card-header {
                            background: linear-gradient(135deg, #e9bc64 0%, #e9bc64 100%);
                            color: white;
                            padding: 20px 25px;
                            border-bottom: none;
                        }

                        .card-header h3 {
                            margin: 0;
                            font-weight: 600;
                            font-size: 1.5rem;
                        }

                        .card-header .card-tools {
                            display: flex;
                            gap: 10px;
                            align-items: center;
                        }

                        .card-body {
                            padding: 25px;
                            background: white;
                        }

                        /* ===== Statistics Cards ===== */
                        .stats-row {
                            display: grid;
                            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
                            gap: 15px;
                            margin-bottom: 25px;
                        }

                        .stat-card {
                            border-radius: 10px;
                            padding: 18px 20px;
                            color: white;
                            position: relative;
                            overflow: hidden;
                            transition: transform 0.3s ease, box-shadow 0.3s ease;
                            cursor: default;
                        }

                        .stat-card:hover {
                            transform: translateY(-3px);
                            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
                        }

                        .stat-card .stat-number {
                            font-size: 2rem;
                            font-weight: 700;
                            line-height: 1.2;
                        }

                        .stat-card .stat-label {
                            font-size: 0.9rem;
                            opacity: 0.9;
                            margin-top: 2px;
                        }

                        .stat-card .stat-icon {
                            position: absolute;
                            right: 15px;
                            top: 50%;
                            transform: translateY(-50%);
                            font-size: 3rem;
                            opacity: 0.2;
                        }

                        .stat-total { background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); }
                        .stat-pending { background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); }
                        .stat-reviewed { background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); }
                        .stat-accepted { background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%); }
                        .stat-rejected { background: linear-gradient(135deg, #fa709a 0%, #fee140 100%); }

                        /* ===== Filter Section ===== */
                        .filter-section {
                            background: #f8f9fa;
                            padding: 18px 20px;
                            border-radius: 10px;
                            margin-bottom: 25px;
                        }

                        .filter-section .form-control,
                        .filter-section .form-select {
                            border-radius: 8px;
                            border: 1px solid #e0e0e0;
                            padding: 10px 15px;
                            font-size: 0.95rem;
                        }

                        .filter-section .form-control:focus,
                        .filter-section .form-select:focus {
                            border-color: #667eea;
                            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
                        }

                        .btn-filter {
                            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                            color: white;
                            border: none;
                            padding: 10px 25px;
                            border-radius: 8px;
                            font-weight: 500;
                            transition: all 0.3s ease;
                        }

                        .btn-filter:hover {
                            transform: translateY(-2px);
                            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
                            color: white;
                        }

                        .btn-reset {
                            background: #6c757d;
                            color: white;
                            border: none;
                            padding: 10px 25px;
                            border-radius: 8px;
                            font-weight: 500;
                            transition: all 0.3s ease;
                        }

                        .btn-reset:hover {
                            background: #5a6268;
                            color: white;
                        }

                        /* ===== Alerts ===== */
                        .alert {
                            border-radius: 10px;
                            border: none;
                            padding: 15px 20px;
                        }

                        .alert-success {
                            background: #d4edda;
                            color: #155724;
                        }

                        .alert-danger {
                            background: #f8d7da;
                            color: #721c24;
                        }

                        .alert-info {
                            background: #d1ecf1;
                            color: #0c5460;
                        }

                        /* ===== Table Styles ===== */
                        .table-responsive {
                            overflow-x: auto;
                        }

                        .table {
                            margin-bottom: 0;
                            font-size: 0.95rem;
                            color: #333;
                        }

                        .table thead th {
                            background: #f8f9fa;
                            color: #495057;
                            font-weight: 600;
                            padding: 12px 15px;
                            border-bottom: 2px solid #dee2e6;
                            white-space: nowrap;
                        }

                        .table thead th a {
                            color: #495057;
                            text-decoration: none;
                            display: inline-flex;
                            align-items: center;
                            gap: 5px;
                        }

                        .table thead th a:hover {
                            color: #667eea;
                        }

                        .table tbody td {
                            padding: 12px 15px;
                            vertical-align: middle;
                            border-bottom: 1px solid #f0f0f0;
                        }

                        .table tbody tr:hover {
                            background: #f8f9fa;
                        }

                        /* ===== Status Badges ===== */
                        .badge-status {
                            padding: 6px 14px;
                            border-radius: 20px;
                            font-weight: 500;
                            font-size: 0.8rem;
                            text-transform: capitalize;
                            letter-spacing: 0.3px;
                        }

                        .badge-pending { background: #fff3cd; color: #856404; }
                        .badge-reviewed { background: #cce5ff; color: #004085; }
                        .badge-accepted { background: #d4edda; color: #155724; }
                        .badge-rejected { background: #f8d7da; color: #721c24; }

                        /* ===== Action Buttons ===== */
                        .action-group {
                            display: flex;
                            gap: 4px;
                            flex-wrap: wrap;
                        }

                        .action-group .btn {
                            padding: 5px 10px;
                            font-size: 0.8rem;
                            border-radius: 6px;
                            border: none;
                            transition: all 0.2s ease;
                        }

                        .action-group .btn:hover {
                            transform: scale(1.05);
                        }

                        .btn-view { background: #17a2b8; color: white; }
                        .btn-view:hover { background: #138496; color: white; }

                        .btn-download { background: #007bff; color: white; }
                        .btn-download:hover { background: #0056b3; color: white; }

                        .btn-status { background: #6c757d; color: white; }
                        .btn-status:hover { background: #5a6268; color: white; }

                        /* ===== Dropdown ===== */
                        .dropdown-menu {
                            border-radius: 10px;
                            border: none;
                            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
                            padding: 8px 0;
                        }

                        .dropdown-item {
                            padding: 8px 20px;
                            font-size: 0.9rem;
                            transition: all 0.2s ease;
                        }

                        .dropdown-item:hover {
                            background: #f8f9fa;
                        }

                        .dropdown-item .badge {
                            font-size: 0.75rem;
                        }

                        .dropdown-divider {
                            margin: 5px 0;
                        }

                        /* ===== Pagination ===== */
                        .pagination-container {
                            display: flex;
                            justify-content: space-between;
                            align-items: center;
                            margin-top: 20px;
                            flex-wrap: wrap;
                            gap: 15px;
                        }

                        .pagination-info {
                            color: #6c757d;
                            font-size: 0.9rem;
                        }

                        .pagination .page-link {
                            color: #667eea;
                            border-radius: 8px;
                            margin: 0 3px;
                            border: 1px solid #dee2e6;
                            padding: 8px 14px;
                        }

                        .pagination .page-link:hover {
                            background: #667eea;
                            color: white;
                            border-color: #667eea;
                        }

                        .pagination .page-item.active .page-link {
                            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                            border-color: #667eea;
                            color: white;
                        }

                        .pagination .page-item.disabled .page-link {
                            color: #6c757d;
                        }

                        /* ===== Export Button ===== */
                        .btn-export {
                            background: rgba(255, 255, 255, 0.2);
                            color: white;
                            border: 1px solid rgba(255, 255, 255, 0.3);
                            padding: 8px 18px;
                            border-radius: 8px;
                            transition: all 0.3s ease;
                            text-decoration: none;
                        }

                        .btn-export:hover {
                            background: rgba(255, 255, 255, 0.3);
                            color: white;
                        }

                        /* ===== Empty State ===== */
                        .empty-state {
                            padding: 50px 20px;
                            text-align: center;
                        }

                        .empty-state i {
                            font-size: 4rem;
                            color: #dee2e6;
                            margin-bottom: 15px;
                        }

                        .empty-state h5 {
                            color: #6c757d;
                            font-weight: 400;
                        }

                        /* ===== Mobile Responsive ===== */
                        @media (max-width: 768px) {
                            .card-header {
                                flex-direction: column;
                                gap: 10px;
                                align-items: flex-start;
                            }

                            .card-header .card-tools {
                                width: 100%;
                            }

                            .card-header .card-tools .btn-export {
                                width: 100%;
                                text-align: center;
                            }

                            .stats-row {
                                grid-template-columns: repeat(2, 1fr);
                            }

                            .stat-card .stat-number {
                                font-size: 1.5rem;
                            }

                            .stat-card .stat-icon {
                                font-size: 2rem;
                            }

                            .filter-section .row {
                                gap: 10px;
                            }

                            .pagination-container {
                                flex-direction: column;
                                align-items: center;
                            }

                            .table thead th {
                                font-size: 0.8rem;
                                padding: 8px 10px;
                            }

                            .table tbody td {
                                font-size: 0.85rem;
                                padding: 8px 10px;
                            }

                            .action-group .btn {
                                padding: 4px 8px;
                                font-size: 0.7rem;
                            }

                            .badge-status {
                                font-size: 0.7rem;
                                padding: 4px 10px;
                            }
                        }

                        @media (max-width: 480px) {
                            .stats-row {
                                grid-template-columns: 1fr 1fr;
                                gap: 10px;
                            }

                            .stat-card {
                                padding: 12px 15px;
                            }

                            .stat-card .stat-number {
                                font-size: 1.3rem;
                            }
                        }
                    </style>

                    <div class="main-container" style="margin-left: 14%;">
                        <!-- ============================================================ -->
                        <!-- MAIN CARD -->
                        <!-- ============================================================ -->
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
                                <h3><i class="fas fa-briefcase me-2"></i>Job Applications</h3>
                                <div class="card-tools">
                                    
                                </div>
                            </div>

                            <div class="card-body">
                                <!-- ===== STATISTICS ===== -->
                                <div class="stats-row">
                                    <div class="stat-card stat-total">
                                        <div class="stat-number">{{ $stats['total'] ?? 0 }}</div>
                                        <div class="stat-label">Total Applications</div>
                                        <div class="stat-icon"><i class="fas fa-users"></i></div>
                                    </div>
                                    <div class="stat-card stat-pending">
                                        <div class="stat-number">{{ $stats['pending'] ?? 0 }}</div>
                                        <div class="stat-label">Pending</div>
                                        <div class="stat-icon"><i class="fas fa-clock"></i></div>
                                    </div>
                                    <div class="stat-card stat-reviewed">
                                        <div class="stat-number">{{ $stats['reviewed'] ?? 0 }}</div>
                                        <div class="stat-label">Reviewed</div>
                                        <div class="stat-icon"><i class="fas fa-eye"></i></div>
                                    </div>
                                    <div class="stat-card stat-accepted">
                                        <div class="stat-number">{{ $stats['accepted'] ?? 0 }}</div>
                                        <div class="stat-label">Accepted</div>
                                        <div class="stat-icon"><i class="fas fa-check-circle"></i></div>
                                    </div>
                                    <div class="stat-card stat-rejected">
                                        <div class="stat-number">{{ $stats['rejected'] ?? 0 }}</div>
                                        <div class="stat-label">Rejected</div>
                                        <div class="stat-icon"><i class="fas fa-times-circle"></i></div>
                                    </div>
                                </div>

                                <!-- ===== FILTERS ===== -->
                                <div class="filter-section">
                                    <form method="GET" action="/applyedjobs">
                                        <div class="row g-3 align-items-end">
                                            <div class="col-md-4">
                                                <label class="form-label fw-semibold">Search</label>
                                                <input type="text"
                                                       name="search"
                                                       class="form-control"
                                                       placeholder="Name, email, phone, position..."
                                                       value="{{ request('search') }}">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label fw-semibold">Status</label>
                                                <select name="status" class="form-select">
                                                    <option value="">All Statuses</option>
                                                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                                    <option value="reviewed" {{ request('status') == 'reviewed' ? 'selected' : '' }}>Reviewed</option>
                                                    <option value="accepted" {{ request('status') == 'accepted' ? 'selected' : '' }}>Accepted</option>
                                                    <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <button type="submit" class="btn btn-filter w-100">
                                                    <i class="fas fa-search me-1"></i> Filter
                                                </button>
                                            </div>
                                            <div class="col-md-3">
                                                <a href="/applyedjobs" class="btn btn-reset w-100">
                                                    <i class="fas fa-undo me-1"></i> Reset Filters
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <!-- ===== ALERTS ===== -->
                                @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show">
                                        <i class="fas fa-check-circle me-2"></i>
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif

                                @if(session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show">
                                        <i class="fas fa-exclamation-circle me-2"></i>
                                        {{ session('error') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif

                                <!-- ===== TABLE ===== -->
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <a href="/applyedjobs?sort=id&direction={{ request('direction') == 'asc' ? 'desc' : 'asc' }}{{ request()->has('search') ? '&search='.request('search') : '' }}{{ request()->has('status') ? '&status='.request('status') : '' }}">
                                                        ID
                                                        @if(request('sort') == 'id')
                                                            <i class="fas fa-sort-{{ request('direction') == 'asc' ? 'up' : 'down' }}"></i>
                                                        @endif
                                                    </a>
                                                </th>
                                                <th>
                                                    <a href="/applyedjobs?sort=career_title&direction={{ request('direction') == 'asc' ? 'desc' : 'asc' }}{{ request()->has('search') ? '&search='.request('search') : '' }}{{ request()->has('status') ? '&status='.request('status') : '' }}">
                                                        Position
                                                        @if(request('sort') == 'career_title')
                                                            <i class="fas fa-sort-{{ request('direction') == 'asc' ? 'up' : 'down' }}"></i>
                                                        @endif
                                                    </a>
                                                </th>
                                                <th>
                                                    <a href="/applyedjobs?sort=name&direction={{ request('direction') == 'asc' ? 'desc' : 'asc' }}{{ request()->has('search') ? '&search='.request('search') : '' }}{{ request()->has('status') ? '&status='.request('status') : '' }}">
                                                        Name
                                                        @if(request('sort') == 'name')
                                                            <i class="fas fa-sort-{{ request('direction') == 'asc' ? 'up' : 'down' }}"></i>
                                                        @endif
                                                    </a>
                                                </th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>
                                                    <a href="/applyedjobs?sort=status&direction={{ request('direction') == 'asc' ? 'desc' : 'asc' }}{{ request()->has('search') ? '&search='.request('search') : '' }}{{ request()->has('status') ? '&status='.request('status') : '' }}">
                                                        Status
                                                        @if(request('sort') == 'status')
                                                            <i class="fas fa-sort-{{ request('direction') == 'asc' ? 'up' : 'down' }}"></i>
                                                        @endif
                                                    </a>
                                                </th>
                                                <th>
                                                    <a href="/applyedjobs?sort=created_at&direction={{ request('direction') == 'asc' ? 'desc' : 'asc' }}{{ request()->has('search') ? '&search='.request('search') : '' }}{{ request()->has('status') ? '&status='.request('status') : '' }}">
                                                        Date
                                                        @if(request('sort') == 'created_at')
                                                            <i class="fas fa-sort-{{ request('direction') == 'asc' ? 'up' : 'down' }}"></i>
                                                        @endif
                                                    </a>
                                                </th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($applications as $application)
                                                <tr>
                                                    <td><strong>{{ $application->id }}</strong></td>
                                                    <td>{{ $application->career_title }}</td>
                                                    <td>{{ $application->name }}</td>
                                                    <td><a href="mailto:{{ $application->email }}">{{ $application->email }}</a></td>
                                                    <td>{{ $application->phone }}</td>
                                                    <td>
                                                        <span class="badge-status badge-{{ $application->status }}">
                                                            {{ $application->status }}
                                                        </span>
                                                    </td>
                                                    <td>{{ $application->created_at->format('M d, Y') }}</td>
                                                    <td>
                                                        <div class="action-group">
                                                            <!-- View -->
                                                            <a href="/applyedjobs/{{ $application->id }}"
                                                               class="btn btn-view"
                                                               title="View Details">
                                                                <i class="fas fa-eye"></i>
                                                            </a>

                                                            <!-- Download CV -->
                                                            @if($application->cv_path)
                                                                <a href="/applyedjobs/{{ $application->id }}/download-cv"
                                                                   class="btn btn-download"
                                                                   title="Download CV">
                                                                    <i class="fas fa-file-pdf"></i>
                                                                </a>
                                                            @endif

                                                            <!-- Status Dropdown -->
                                                            <div class="dropdown d-inline-block">
                                                                <button class="btn btn-status dropdown-toggle"
                                                                        type="button"
                                                                        data-bs-toggle="dropdown">
                                                                    <i class="fas fa-cog"></i>
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    <li>
                                                                        <form action="/applyedjobs/{{ $application->id }}/status" method="POST">
                                                                            @csrf
                                                                            @method('PATCH')
                                                                            <input type="hidden" name="status" value="pending">
                                                                            <button type="submit" class="dropdown-item">
                                                                                <span class="badge bg-warning text-dark">Pending</span>
                                                                            </button>
                                                                        </form>
                                                                    </li>
                                                                    <li>
                                                                        <form action="/applyedjobs/{{ $application->id }}/status" method="POST">
                                                                            @csrf
                                                                            @method('PATCH')
                                                                            <input type="hidden" name="status" value="reviewed">
                                                                            <button type="submit" class="dropdown-item">
                                                                                <span class="badge bg-primary">Reviewed</span>
                                                                            </button>
                                                                        </form>
                                                                    </li>
                                                                    <li>
                                                                        <form action="/applyedjobs/{{ $application->id }}/status" method="POST">
                                                                            @csrf
                                                                            @method('PATCH')
                                                                            <input type="hidden" name="status" value="accepted">
                                                                            <button type="submit" class="dropdown-item">
                                                                                <span class="badge bg-success">Accepted</span>
                                                                            </button>
                                                                        </form>
                                                                    </li>
                                                                    <li>
                                                                        <form action="/applyedjobs/{{ $application->id }}/status" method="POST">
                                                                            @csrf
                                                                            @method('PATCH')
                                                                            <input type="hidden" name="status" value="rejected">
                                                                            <button type="submit" class="dropdown-item">
                                                                                <span class="badge bg-danger">Rejected</span>
                                                                            </button>
                                                                        </form>
                                                                    </li>
                                                                    <li><hr class="dropdown-divider"></li>
                                                                    <li>
                                                                        <form action="/applyedjobs/{{ $application->id }}"
                                                                              method="POST"
                                                                              onsubmit="return confirm('Delete this application?')">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" class="dropdown-item text-danger">
                                                                                <i class="fas fa-trash me-1"></i> Delete
                                                                            </button>
                                                                        </form>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="8">
                                                        <div class="empty-state">
                                                            <i class="fas fa-inbox"></i>
                                                            <h5>No applications found</h5>
                                                            <p class="text-muted">Try adjusting your filters or search terms.</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                <!-- ===== PAGINATION ===== -->
                                <div class="pagination-container">
                                    <div class="pagination-info">
                                        Showing {{ $applications->firstItem() ?? 0 }} to {{ $applications->lastItem() ?? 0 }} of {{ $applications->total() }} entries
                                    </div>
                                    <div>
                                        {{ $applications->appends(request()->query())->links('pagination::bootstrap-5') }}
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.main-container -->

                    <!-- ============================================================ -->
                    <!-- SCRIPTS -->
                    <!-- ============================================================ -->
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

                    <script>
                        // Auto-hide alerts after 5 seconds
                        document.addEventListener('DOMContentLoaded', function() {
                            const alerts = document.querySelectorAll('.alert');
                            alerts.forEach(function(alert) {
                                setTimeout(function() {
                                    const bsAlert = new bootstrap.Alert(alert);
                                    bsAlert.close();
                                }, 5000);
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
