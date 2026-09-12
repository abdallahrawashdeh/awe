<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Our Projects</title>
</head>
@if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@endif
<body>

    <x-header />

    <!-- Hero Section - Premium Design -->
<div class="relative w-full h-[300px] overflow-hidden">
    <img
        src="{{ asset('images/projects.jpeg') }}"
        alt="Career image"
        class="absolute inset-0 w-full h-full object-cover object-center"
    />

    <div class="absolute inset-0 bg-black/50"></div>

    <div class="absolute inset-0 flex items-center justify-center">
        <h1 class="text-4xl font-bold text-white">
            Our Projects
        </h1>
    </div>
</div>
    <style>
        /* ===== Global Styles ===== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #f8fafc;
        }

        /* ===== Animations ===== */
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        @keyframes shimmer {
            0% { background-position: -1000px 0; }
            100% { background-position: 1000px 0; }
        }

        .projects-item {
            animation: slideIn 0.6s ease-out forwards;
            opacity: 0;
        }

        .projects-item:nth-child(1) { animation-delay: 0.1s; }
        .projects-item:nth-child(2) { animation-delay: 0.2s; }
        .projects-item:nth-child(3) { animation-delay: 0.3s; }
        .projects-item:nth-child(4) { animation-delay: 0.4s; }
        .projects-item:nth-child(5) { animation-delay: 0.5s; }
        .projects-item:nth-child(6) { animation-delay: 0.6s; }

        .fade-slide-right {
            opacity: 0;
            transform: translateX(50px);
            transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .fade-slide-right.is-visible {
            opacity: 1;
            transform: translateX(0);
        }

        /* ===== Stats Bar ===== */
        .stats-bar {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 1rem;
            padding: 1.5rem 2rem;
            background: white;
            border-radius: 1rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            margin-bottom: 2rem;
        }

        .stat-item {
            text-align: center;
        }

        .stat-item .stat-number {
            font-size: 1.8rem;
            font-weight: 700;
            color: #1a202c;
        }

        .stat-item .stat-label {
            font-size: 0.8rem;
            color: #718096;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-top: 0.25rem;
        }

        /* ===== Filter Buttons ===== */
        .month-filter {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 0.75rem;
            margin-bottom: 2.5rem;
            padding: 0.5rem;
        }

        .month-btn {
            padding: 0.6rem 1.5rem;
            border-radius: 50px;
            background: white;
            color: #4a5568;
            border: 2px solid #e2e8f0;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-weight: 500;
            font-size: 0.875rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.02);
        }

        .month-btn:hover {
            background: #f7fafc;
            border-color: #cbd5e0;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .month-btn.active {
            background: #e8bc61;
            color: white;
            border-color: #e8bc61;
            box-shadow: 0 4px 15px rgba(232, 188, 97, 0.35);
            transform: translateY(-2px);
        }

        .month-btn.active:hover {
            background: #d4a84a;
            border-color: #d4a84a;
            box-shadow: 0 6px 20px rgba(232, 188, 97, 0.4);
        }

        /* ===== Project Cards ===== */
        .project-card {
            background: white;
            border-radius: 1.25rem;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid rgba(0, 0, 0, 0.04);
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .project-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.12);
            border-color: rgba(232, 188, 97, 0.2);
        }

        /* ===== Image Carousel ===== */
        .project-image-wrapper {
            position: relative;
            overflow: hidden;
            background: #f1f5f9;
            flex-shrink: 0;
        }

        .carousel-container {
            position: relative;
            width: 100%;
            height: 220px;
            overflow: hidden;
        }

        .carousel-slide {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .project-card:hover .carousel-slide {
            transform: scale(1.05);
        }

        /* Carousel Navigation Arrows */
        .carousel-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(8px);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            opacity: 0;
            z-index: 10;
        }

        .project-image-wrapper:hover .carousel-arrow {
            opacity: 1;
        }

        .carousel-arrow:hover {
            background: rgba(232, 188, 97, 0.9);
            transform: translateY(-50%) scale(1.1);
        }

        .carousel-arrow-left {
            left: 8px;
        }

        .carousel-arrow-right {
            right: 8px;
        }

        .carousel-arrow svg {
            width: 18px;
            height: 18px;
        }

        /* Carousel Dots */
        .carousel-dots {
            position: absolute;
            bottom: 12px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 6px;
            z-index: 10;
        }

        .carousel-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            padding: 0;
        }

        .carousel-dot.active {
            background: #e8bc61;
            width: 24px;
            border-radius: 4px;
        }

        .carousel-dot:hover {
            background: rgba(255, 255, 255, 0.8);
        }

        .carousel-dot.active:hover {
            background: #e8bc61;
        }

        /* Image Counter Badge */
        .badge-image-count {
            position: absolute;
            top: 12px;
            right: 12px;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(8px);
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 4px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
            z-index: 10;
        }

        .project-card:hover .badge-image-count {
            background: rgba(232, 188, 97, 0.9);
            transform: scale(1.05);
        }

        /* Year Badge */
        .badge-year {
            position: absolute;
            bottom: 12px;
            left: 12px;
            background: rgba(232, 188, 97, 0.95);
            backdrop-filter: blur(8px);
            color: white;
            padding: 4px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 12px rgba(232, 188, 97, 0.3);
            transition: all 0.3s ease;
            z-index: 10;
        }

        .project-card:hover .badge-year {
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(232, 188, 97, 0.4);
        }

        /* No Image Placeholder */
        .no-image-placeholder {
            width: 100%;
            height: 220px;
            background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            color: #94a3b8;
        }

        .no-image-placeholder svg {
            width: 48px;
            height: 48px;
            opacity: 0.5;
        }

        .no-image-placeholder p {
            margin-top: 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
        }

        /* ===== Content Section ===== */
        .project-content-wrapper {
            padding: 1.5rem;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .project-meta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 0.75rem;
            font-size: 0.8rem;
        }

        .project-meta .date {
            color: #94a3b8;
            font-weight: 500;
        }

        .project-meta .image-count-label {
            color: #94a3b8;
            font-size: 0.7rem;
            padding: 2px 10px;
            background: #f1f5f9;
            border-radius: 20px;
        }

        .project-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #1a202c;
            margin-bottom: 0.75rem;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .project-title a {
            color: inherit;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .project-title a:hover {
            color: #e8bc61;
        }

        .project-description {
            color: #64748b;
            font-size: 0.9rem;
            line-height: 1.6;
            margin-bottom: 1rem;
            flex: 1;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* ===== View Details Button ===== */
        .btn-view-details {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: #e8bc61;
            font-weight: 600;
            font-size: 0.875rem;
            text-decoration: none;
            transition: all 0.3s ease;
            padding: 0.5rem 0;
            border-bottom: 2px solid transparent;
            width: fit-content;
        }

        .btn-view-details:hover {
            color: #d4a84a;
            border-bottom-color: #e8bc61;
            gap: 0.75rem;
        }

        .btn-view-details svg {
            transition: transform 0.3s ease;
        }

        .btn-view-details:hover svg {
            transform: translateX(4px);
        }

        /* ===== No Results ===== */
        .no-results {
            text-align: center;
            padding: 4rem 2rem;
            background: white;
            border-radius: 1.25rem;
            border: 2px dashed #e2e8f0;
        }

        .no-results .no-results-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
            display: block;
        }

        .no-results h3 {
            font-size: 1.5rem;
            font-weight: 600;
            color: #1a202c;
            margin-bottom: 0.5rem;
        }

        .no-results p {
            color: #94a3b8;
        }

        /* ===== Responsive ===== */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem !important;
            }

            .stats-bar {
                grid-template-columns: repeat(2, 1fr);
                padding: 1rem;
            }

            .month-btn {
                padding: 0.4rem 1rem;
                font-size: 0.75rem;
            }

            .carousel-container {
                height: 180px;
            }

            .no-image-placeholder {
                height: 180px;
            }

            .carousel-arrow {
                width: 30px;
                height: 30px;
            }

            .carousel-arrow svg {
                width: 14px;
                height: 14px;
            }
        }

        @media (max-width: 480px) {
            .stats-bar {
                grid-template-columns: 1fr 1fr;
                gap: 0.5rem;
            }

            .stat-item .stat-number {
                font-size: 1.4rem;
            }
        }

        /* ===== Scrollbar Styling ===== */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: #e8bc61;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #d4a84a;
        }
    </style>

    <section class="max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-12 fade-slide-right" id="Latest_projects">


        <!-- Section Header -->
        <div class="text-center mb-10 fade-slide-right">

            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-3">
                Featured <span class="text-[#e8bc61]">Projects</span>
            </h2>

            <div class="w-20 h-1 bg-[#e8bc61] mx-auto mt-4 rounded-full"></div>
        </div>

        <!-- Month Filter -->
        <div class="month-filter">
            <button class="month-btn active" data-month="all">
              All Projects
            </button>
            @php
                $months = [];
                foreach ($projects as $item) {
                    $monthYear = $item->created_at->format('Y-m');
                    $monthName = $item->created_at->format('F Y');
                    if (!isset($months[$monthYear])) {
                        $months[$monthYear] = $monthName;
                    }
                }
                krsort($months);
            @endphp

            @foreach($months as $monthKey => $monthName)
                <button class="month-btn" data-month="{{ $monthKey }}">
                     {{ $monthName }}
                </button>
            @endforeach
        </div>

        <!-- Projects Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="projects-container">
            @foreach($projects as $projectIndex => $item)
            @php
                $images = $item->images;
                $hasImages = $images->count() > 0;
                $imageUrls = $images->map(function($img) {
                    return asset('storage/' . $img->image_path);
                })->toArray();
                $imageJson = json_encode($imageUrls);
            @endphp
            <div class="projects-item" data-month="{{ $item->created_at->format('Y-m') }}">
                <div class="project-card">
                    <!-- Image Carousel Section -->
                    <div class="project-image-wrapper">
                        @if($hasImages)
                            <div class="carousel-container" data-project="{{ $projectIndex }}">
                                <img src="{{ $imageUrls[0] }}"
                                     alt="{{ $item->title }}"
                                     class="carousel-slide"
                                     loading="lazy"
                                     data-project="{{ $projectIndex }}"
                                     data-index="0">

                                <!-- Image Counter Badge -->
                                <span class="badge-image-count">
                                     <span class="carousel-counter" data-project="{{ $projectIndex }}">1/{{ $images->count() }}</span>
                                </span>

                                <!-- Left Arrow -->
                                @if($images->count() > 1)
                                <button class="carousel-arrow carousel-arrow-left" onclick="changeImage({{ $projectIndex }}, 'prev')" aria-label="Previous image">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                    </svg>
                                </button>

                                <!-- Right Arrow -->
                                <button class="carousel-arrow carousel-arrow-right" onclick="changeImage({{ $projectIndex }}, 'next')" aria-label="Next image">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </button>

                                <!-- Dots -->
                                <div class="carousel-dots" data-project="{{ $projectIndex }}">
                                    @foreach($images as $index => $image)
                                        <button class="carousel-dot {{ $index === 0 ? 'active' : '' }}"
                                                onclick="goToImage({{ $projectIndex }}, {{ $index }})"
                                                data-project="{{ $projectIndex }}"
                                                data-index="{{ $index }}"
                                                aria-label="Go to image {{ $index + 1 }}"></button>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        @else
                            <div class="no-image-placeholder">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <p>No images</p>
                            </div>
                        @endif

                        <!-- Year Badge -->
                        <span class="badge-year">
                            {{ $item->year }}
                        </span>
                    </div>

                    <!-- Content Section -->
                    <div class="project-content-wrapper">
                        <div class="project-meta">
                            <span class="date">{{ $item->created_at->format('M d, Y') }}</span>
                            @if($item->images->count() > 0)
                                <span class="image-count-label">
                                    {{ $item->images->count() }} image{{ $item->images->count() > 1 ? 's' : '' }}
                                </span>
                            @endif
                        </div>

                        <h3 class="project-title">
                            <a href="{{ route('projects.show', $item) }}">{{ $item->title }}</a>
                        </h3>

                        <div class="project-description">
                            {!! Str::limit(strip_tags($item->content), 1020) !!}
                        </div>


                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- No Results -->
        <div id="no-results" class="no-results hidden">
            <span class="no-results-icon">🔍</span>
            <h3>No Projects Found</h3>
            <p>We couldn't find any projects for the selected month. Try selecting a different filter.</p>
        </div>
    </section>

    <!-- Footer -->
 

    <script>
    // ===== Image Carousel JavaScript =====
    // Store all project images
    const projectImages = @json($projects->map(function($project) {
        return $project->images->map(function($img) {
            return asset('storage/' . $img->image_path);
        })->toArray();
    })->toArray());

    let currentIndices = {};

    // Initialize current indices for each project
    @foreach($projects as $index => $project)
        currentIndices[{{ $index }}] = 0;
    @endforeach

    function changeImage(projectIndex, direction) {
        const images = projectImages[projectIndex];
        if (!images || images.length === 0) return;

        if (direction === 'next') {
            currentIndices[projectIndex] = (currentIndices[projectIndex] + 1) % images.length;
        } else {
            currentIndices[projectIndex] = (currentIndices[projectIndex] - 1 + images.length) % images.length;
        }

        updateCarousel(projectIndex);
    }

    function goToImage(projectIndex, imageIndex) {
        const images = projectImages[projectIndex];
        if (!images || imageIndex >= images.length) return;

        currentIndices[projectIndex] = imageIndex;
        updateCarousel(projectIndex);
    }

    function updateCarousel(projectIndex) {
        const images = projectImages[projectIndex];
        if (!images || images.length === 0) return;

        const currentIndex = currentIndices[projectIndex];
        const imageUrl = images[currentIndex];

        // Update main image
        const imgElement = document.querySelector(`.carousel-slide[data-project="${projectIndex}"]`);
        if (imgElement) {
            imgElement.src = imageUrl;
            imgElement.dataset.index = currentIndex;
        }

        // Update counter
        const counterElement = document.querySelector(`.carousel-counter[data-project="${projectIndex}"]`);
        if (counterElement) {
            counterElement.textContent = `${currentIndex + 1}/${images.length}`;
        }

        // Update dot indicators
        const dots = document.querySelectorAll(`.carousel-dots[data-project="${projectIndex}"] .carousel-dot`);
        dots.forEach((dot, index) => {
            if (index === currentIndex) {
                dot.classList.add('active');
            } else {
                dot.classList.remove('active');
            }
        });
    }

    // ===== Month Filter =====
    document.addEventListener('DOMContentLoaded', function () {
        // Intersection Observer for animations
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.fade-slide-right').forEach(el => {
            observer.observe(el);
        });

        // Month filter functionality
        const monthButtons = document.querySelectorAll('.month-btn');
        const projectItems = document.querySelectorAll('.projects-item');
        const noResults = document.getElementById('no-results');
        const projectsContainer = document.getElementById('projects-container');

        monthButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Update active button
                monthButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');

                const selectedMonth = this.dataset.month;
                let hasResults = false;

                // Filter project items with smooth transition
                projectItems.forEach(item => {
                    const itemMonth = item.dataset.month;

                    if (selectedMonth === 'all' || itemMonth === selectedMonth) {
                        item.style.display = 'block';
                        item.style.opacity = '0';
                        item.style.transform = 'translateY(20px)';
                        setTimeout(() => {
                            item.style.opacity = '1';
                            item.style.transform = 'translateY(0)';
                        }, 50);
                        hasResults = true;
                    } else {
                        item.style.display = 'none';
                    }
                });

                // Show/hide no results message
                if (hasResults) {
                    noResults.classList.add('hidden');
                    projectsContainer.classList.remove('hidden');
                } else {
                    noResults.classList.remove('hidden');
                    projectsContainer.classList.add('hidden');
                }
            });
        });

        // Counter animation for stats
        const statNumbers = document.querySelectorAll('.stat-number');
        statNumbers.forEach(stat => {
            const text = stat.textContent;
            const number = parseInt(text);
            if (!isNaN(number) && number > 0) {
                let current = 0;
                const increment = Math.ceil(number / 30);
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= number) {
                        stat.textContent = number;
                        clearInterval(timer);
                    } else {
                        stat.textContent = current;
                    }
                }, 30);
            }
        });
    });
    </script>

        <x-newfooter />


</body>
</html>
