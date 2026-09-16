<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Our Projects</title>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

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
            font-weight: 500;
            font-size: 0.875rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.02);
        }

        .month-btn:hover {
            background: #f7fafc;
            border-color: #cbd5e0;
        }

        .month-btn.active {
            background: #e8bc61;
            color: white;
            border-color: #e8bc61;
            box-shadow: 0 4px 15px rgba(232, 188, 97, 0.35);
        }

        .month-btn.active:hover {
            background: #d4a84a;
            border-color: #d4a84a;
        }

        /* ===== Project Cards ===== */
        .project-card {
            background: white;
            border-radius: 1.25rem;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            border: 1px solid rgba(0, 0, 0, 0.04);
            height: 100%;
            display: flex;
            flex-direction: column;
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
            z-index: 10;
        }

        .carousel-arrow:hover {
            background: rgba(232, 188, 97, 0.9);
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
            z-index: 10;
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
            padding: 0.5rem 0;
            border-bottom: 2px solid transparent;
            width: fit-content;
        }

        .btn-view-details:hover {
            color: #d4a84a;
            border-bottom-color: #e8bc61;
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
            .stats-bar {
                grid-template-columns: repeat(2, 1fr);
                padding: 1rem;
            }

            .month-filter {
                gap: 0.5rem;
            }

            .month-btn {
                padding: 0.4rem 1rem;
                font-size: 0.75rem;
            }

            .carousel-container,
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

            .project-content-wrapper {
                padding: 1.25rem;
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

            .carousel-container,
            .no-image-placeholder {
                height: 200px;
            }
        }

        /* Arrows/dots rely on :hover, which touch devices don't have.
           Always show them on touch screens so the carousel is usable. */
        @media (hover: none) {
            .carousel-arrow {
                opacity: 1;
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
</head>
<body>

    <x-header />

    <!-- Hero Section -->
    <div class="relative w-full h-[220px] sm:h-[260px] md:h-[300px] overflow-hidden">
        <img
            src="{{ asset('images/projects.jpeg') }}"
            alt="Career image"
            class="absolute inset-0 w-full h-full object-cover object-center"
        />

        <div class="absolute inset-0 bg-black/50"></div>

        <div class="absolute inset-0 flex items-center justify-center px-4">
            <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white text-center">
                Our Projects
            </h1>
        </div>
    </div>

    <section class="max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-12" id="Latest_projects">

        <!-- Section Header -->
        <div class="text-center mb-10">
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-gray-900 mb-3">
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
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8" id="projects-container">
            @foreach($projects as $projectIndex => $item)
            @php
                $images = $item->images;
                $hasImages = $images->count() > 0;
                $imageUrls = $images->map(function($img) {
                    return asset('storage/' . $img->image_path);
                })->toArray();
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

                                @if($images->count() > 1)
                                <!-- Left Arrow -->
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

    <script>
    // ===== Image Carousel JavaScript =====
    const projectImages = @json($projects->map(function($project) {
        return $project->images->map(function($img) {
            return asset('storage/' . $img->image_path);
        })->toArray();
    })->toArray());

    let currentIndices = {};

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

        const imgElement = document.querySelector('.carousel-slide[data-project="' + projectIndex + '"]');
        if (imgElement) {
            imgElement.src = imageUrl;
            imgElement.dataset.index = currentIndex;
        }

        const counterElement = document.querySelector('.carousel-counter[data-project="' + projectIndex + '"]');
        if (counterElement) {
            counterElement.textContent = (currentIndex + 1) + '/' + images.length;
        }

        const dots = document.querySelectorAll('.carousel-dots[data-project="' + projectIndex + '"] .carousel-dot');
        dots.forEach(function (dot, index) {
            if (index === currentIndex) {
                dot.classList.add('active');
            } else {
                dot.classList.remove('active');
            }
        });
    }

    // ===== Month Filter (no transition/animation, instant show-hide) =====
    document.addEventListener('DOMContentLoaded', function () {
        const monthButtons = document.querySelectorAll('.month-btn');
        const projectItems = document.querySelectorAll('.projects-item');
        const noResults = document.getElementById('no-results');
        const projectsContainer = document.getElementById('projects-container');

        monthButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                monthButtons.forEach(function (btn) { btn.classList.remove('active'); });
                this.classList.add('active');

                const selectedMonth = this.dataset.month;
                let hasResults = false;

                projectItems.forEach(function (item) {
                    const itemMonth = item.dataset.month;

                    if (selectedMonth === 'all' || itemMonth === selectedMonth) {
                        item.style.display = 'block';
                        hasResults = true;
                    } else {
                        item.style.display = 'none';
                    }
                });

                if (hasResults) {
                    noResults.classList.add('hidden');
                    projectsContainer.classList.remove('hidden');
                } else {
                    noResults.classList.remove('hidden');
                    projectsContainer.classList.add('hidden');
                }
            });
        });
    });
    </script>

    <div class="fixed bottom-4 right-4 sm:bottom-6 sm:right-6 z-50 font-sans group">
    <!-- Chatbot Popup -->
    <div id="chatPopup" class="hidden fixed sm:absolute inset-0 sm:inset-auto sm:bottom-20 sm:right-0
                w-full h-full sm:w-96 sm:h-[500px]
                bg-white shadow-2xl sm:rounded-2xl flex flex-col overflow-hidden animate-fade-in">
        <!-- Header -->
        <div class="flex items-center justify-between bg-gradient-to-r from-[#e9bc64] to-[#e9bc64] p-4 shrink-0">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-[#e9bc64] font-bold text-lg">
                    🤖
                </div>
                <h2 class="text-white font-semibold text-lg">AWD Assistant</h2>
            </div>
            <button onclick="closeChat()" class="text-white text-2xl font-bold hover:text-gray-200">×</button>
        </div>

        <!-- Chat Body -->
        <div id="chatBody" class="flex-1 p-4 overflow-y-auto space-y-4 bg-gray-50 min-h-0">
            <div class="bg-gray-100 p-3 rounded-xl max-w-[85%] sm:max-w-[80%] text-sm">
                👋 Hello! I'm your AWD Engineering Assistant. Ask me something below.
            </div>

            <!-- Static Response Buttons -->
            <div id="optionButtons" class="flex flex-col gap-2 mt-2">
                <button onclick="selectOption(this)" class="bg-[#e9bc64] text-white rounded-lg px-4 py-2 hover:bg-[#f5c15a] transition text-left text-sm sm:text-base">When was AW Engineering founded?</button>
                <button onclick="selectOption(this)" class="bg-[#e9bc64] text-white rounded-lg px-4 py-2 hover:bg-[#f5c15a] transition text-left text-sm sm:text-base">Where is AW Engineering located?</button>
                <button onclick="selectOption(this)" class="bg-[#e9bc64] text-white rounded-lg px-4 py-2 hover:bg-[#f5c15a] transition text-left text-sm sm:text-base">What services does AW Engineering offer?</button>
                <button onclick="selectOption(this)" class="bg-[#e9bc64] text-white rounded-lg px-4 py-2 hover:bg-[#f5c15a] transition text-left text-sm sm:text-base">What career opportunities are available?</button>
            </div>
        </div>

        <!-- Input -->
      
    </div>

    <!-- Floating Button -->
    <button id="chatButton" onclick="toggleChat()" class="bg-[#e9bc64] hover:bg-[#f5c15a] text-white w-14 h-14 sm:w-16 sm:h-16 rounded-full shadow-xl flex items-center justify-center relative group">
        <!-- Tooltip: hidden on touch/small screens -->
        <span class="hidden sm:block absolute -left-28 bottom-5 opacity-0 group-hover:opacity-100 transition bg-gray-800 text-white text-sm py-1 px-3 rounded-lg shadow-lg whitespace-nowrap">
            Chat with us
        </span>
        <!-- Chatbot Icon -->
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 sm:w-8 sm:h-8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9.75h.008v.008H8.25V9.75zm3 0h.008v.008H11.25V9.75zm3 0h.008v.008H14.25V9.75zm-9 4.5h13.5a2.25 2.25 0 002.25-2.25V6 A2.25 2.25 0 0018.75 3.75H5.25A2.25 2.25 0 003 6v6 a2.25 2.25 0 002.25 2.25zm3 3l2.25-2.25m0 0l2.25 2.25m-2.25-2.25V21" />
        </svg>
    </button>
</div>

<!-- Animations -->
<style>
    @keyframes fade-in {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in { animation: fade-in 0.25s ease-out; }

    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-5px); }
    }
    .animate-bounce {
        animation: bounce 1s infinite;
    }
</style>
    <script src="{{ asset('js/chatbot.js') }}"></script>


    <x-newfooter />

</body>
</html>