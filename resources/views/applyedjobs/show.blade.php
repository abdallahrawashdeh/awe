<x-app-layout>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <x-slot name="header">
        <div class="ml-[14%] flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Application Details') }}
            </h2>
            <a href="/applyedjobs" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                <i class="fas fa-arrow-left me-2"></i> Back to Applications
            </a>
        </div>
    </x-slot>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome 6 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        .details-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .detail-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .detail-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 25px 30px;
        }

        .detail-header h3 {
            margin: 0;
            font-weight: 600;
        }

        .detail-body {
            padding: 30px;
        }

        .detail-row {
            display: flex;
            padding: 15px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .detail-label {
            font-weight: 600;
            color: #495057;
            width: 150px;
            flex-shrink: 0;
        }

        .detail-value {
            color: #333;
            flex: 1;
        }

        .detail-value .badge-status {
            padding: 6px 14px;
            border-radius: 20px;
            font-weight: 500;
            font-size: 0.85rem;
            text-transform: capitalize;
        }

        .badge-pending { background: #fff3cd; color: #856404; }
        .badge-reviewed { background: #cce5ff; color: #004085; }
        .badge-accepted { background: #d4edda; color: #155724; }
        .badge-rejected { background: #f8d7da; color: #721c24; }

        .detail-actions {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 2px solid #f0f0f0;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn-action {
            padding: 10px 25px;
            border-radius: 8px;
            border: none;
            font-weight: 500;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-action:hover {
            transform: translateY(-2px);
        }

        .btn-download-cv {
            background: #007bff;
            color: white;
        }

        .btn-download-cv:hover {
            background: #0056b3;
            color: white;
        }

        .btn-edit-status {
            background: #6c757d;
            color: white;
        }

        .btn-edit-status:hover {
            background: #5a6268;
            color: white;
        }

        .btn-delete {
            background: #dc3545;
            color: white;
        }

        .btn-delete:hover {
            background: #c82333;
            color: white;
        }

        .btn-view-cv {
            background: #28a745;
            color: white;
        }

        .btn-view-cv:hover {
            background: #218838;
            color: white;
        }

        .status-dropdown .dropdown-item {
            padding: 8px 20px;
        }

        .status-dropdown .dropdown-item:hover {
            background: #f8f9fa;
        }

        .status-dropdown .badge {
            font-size: 0.8rem;
        }

        /* CV Viewer Styles */
        .cv-viewer-container {
            margin-top: 25px;
            border-top: 2px solid #f0f0f0;
            padding-top: 25px;
        }

        .cv-viewer-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .cv-viewer-header h5 {
            margin: 0;
            color: #495057;
            font-weight: 600;
        }

        .cv-viewer {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            overflow: hidden;
            background: #f8f9fa;
            min-height: 500px;
            position: relative;
        }

        .cv-viewer iframe {
            width: 100%;
            height: 700px;
            border: none;
            display: block;
        }

        .cv-viewer .cv-loading {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #6c757d;
            font-size: 1.1rem;
        }

        .cv-viewer .cv-loading i {
            font-size: 2rem;
            display: block;
            margin-bottom: 10px;
        }

        .cv-viewer .cv-error {
            padding: 40px;
            text-align: center;
            color: #dc3545;
        }

        .cv-viewer .cv-error i {
            font-size: 3rem;
            display: block;
            margin-bottom: 15px;
        }

        .cv-controls {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .cv-controls .btn {
            padding: 6px 15px;
            font-size: 0.9rem;
        }

        @media (max-width: 768px) {
            .detail-row {
                flex-direction: column;
                gap: 5px;
            }

            .detail-label {
                width: 100%;
            }

            .detail-actions {
                flex-direction: column;
            }

            .btn-action {
                width: 100%;
                justify-content: center;
            }

            .cv-viewer-header {
                flex-direction: column;
                gap: 10px;
                align-items: flex-start;
            }

            .cv-viewer iframe {
                height: 400px;
            }

            .cv-controls {
                width: 100%;
            }

            .cv-controls .btn {
                flex: 1;
                justify-content: center;
            }
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="details-container">
                        <div class="detail-card">
                            <!-- Header -->
                            <div class="detail-header">
                                <h3><i class="fas fa-user-circle me-2"></i>Application Details</h3>
                            </div>

                            <!-- Body -->
                            <div class="detail-body">
                                <!-- Success/Error Messages -->
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

                                <!-- Application Information -->
                                <div class="detail-row">
                                    <div class="detail-label">Application ID</div>
                                    <div class="detail-value"><strong>#{{ $application->id }}</strong></div>
                                </div>

                                <div class="detail-row">
                                    <div class="detail-label">Position</div>
                                    <div class="detail-value">{{ $application->career_title }}</div>
                                </div>

                                <div class="detail-row">
                                    <div class="detail-label">Full Name</div>
                                    <div class="detail-value">{{ $application->name }}</div>
                                </div>

                                <div class="detail-row">
                                    <div class="detail-label">Email</div>
                                    <div class="detail-value">
                                        <a href="mailto:{{ $application->email }}">{{ $application->email }}</a>
                                    </div>
                                </div>

                                <div class="detail-row">
                                    <div class="detail-label">Phone</div>
                                    <div class="detail-value">
                                        <a href="tel:{{ $application->phone }}">{{ $application->phone }}</a>
                                    </div>
                                </div>

                                <div class="detail-row">
                                    <div class="detail-label">Status</div>
                                    <div class="detail-value">
                                        <span class="badge-status badge-{{ $application->status }}">
                                            {{ ucfirst($application->status) }}
                                        </span>
                                    </div>
                                </div>

                                @if($application->message)
                                    <div class="detail-row">
                                        <div class="detail-label">Message</div>
                                        <div class="detail-value">{{ $application->message }}</div>
                                    </div>
                                @endif

                                <div class="detail-row">
                                    <div class="detail-label">Applied Date</div>
                                    <div class="detail-value">{{ $application->created_at->format('F d, Y h:i A') }}</div>
                                </div>

                                <div class="detail-row">
                                    <div class="detail-label">Last Updated</div>
                                    <div class="detail-value">{{ $application->updated_at->format('F d, Y h:i A') }}</div>
                                </div>

                                <!-- CV Viewer -->
                                @if($application->cv_path)
                                    <div class="cv-viewer-container">
                                        <div class="cv-viewer-header">
                                            <h5><i class="fas fa-file-pdf me-2"></i>CV / Resume</h5>
                                            <div class="cv-controls">
                                                <a href="/applyedjobs/{{ $application->id }}/download-cv" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-download me-1"></i> Download
                                                </a>
                                                <button onclick="window.open('/applyedjobs/{{ $application->id }}/download-cv', '_blank')" class="btn btn-success btn-sm">
                                                    <i class="fas fa-external-link-alt me-1"></i> Open in New Tab
                                                </button>
                                            </div>
                                        </div>
                                        <div class="cv-viewer">
                                            <div class="cv-loading" id="cvLoading">
                                                <i class="fas fa-spinner fa-spin"></i>
                                                <span>Loading CV...</span>
                                            </div>
                                            <iframe
                                                id="cvFrame"
                                                src="/applyedjobs/{{ $application->id }}/download-cv?view=inline"
                                                onload="document.getElementById('cvLoading').style.display='none'"
                                                onerror="document.getElementById('cvLoading').innerHTML='<div class=\'cv-error\'><i class=\'fas fa-file-pdf\'></i><p>Unable to display CV. Please download it instead.</p></div>'"
                                            ></iframe>
                                        </div>
                                        <div class="mt-2 text-muted small">
                                            <i class="fas fa-info-circle me-1"></i>
                                            If the CV doesn't display, try opening in a new tab or downloading it.
                                        </div>
                                    </div>
                                @endif

                                <!-- Actions -->
                                <div class="detail-actions">
                                    <!-- Status Update Dropdown -->
                                    <div class="dropdown status-dropdown">
                                        <button class="btn btn-edit-status btn-action dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            <i class="fas fa-cog me-1"></i> Update Status
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
                                        </ul>
                                    </div>

                                    <!-- Delete Button -->
                                    <form action="/applyedjobs/{{ $application->id }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this application? This action cannot be undone.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-delete btn-action">
                                            <i class="fas fa-trash me-1"></i> Delete Application
                                        </button>
                                    </form>

                                    <!-- Back Button -->
                                    <a href="/applyedjobs" class="btn btn-secondary btn-action">
                                        <i class="fas fa-arrow-left me-1"></i> Back to List
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

            // Handle iframe load errors
            const iframe = document.getElementById('cvFrame');
            if (iframe) {
                iframe.addEventListener('error', function() {
                    document.getElementById('cvLoading').innerHTML = `
                        <div class="cv-error">
                            <i class="fas fa-file-pdf"></i>
                            <p>Unable to display CV. Please download it instead.</p>
                        </div>
                    `;
                });
            }
        });
    </script>
</x-app-layout>
