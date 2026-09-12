<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
@if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/chatbot.js'])
@endif
<body>

    <x-header />

<div class="relative h-[300px] w-full">
      <img src="{{ asset('images/announce.avif') }}" alt="Career image"
         alt="Background Image" class="object-cover object-center w-full h-full" />
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="absolute inset-0 flex flex-col items-center justify-center">
        <h1 class="text-4xl text-white font-bold">Our News</h1>
    </div>
</div>

<style>
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .news-item {
        animation: slideIn 0.6s ease-out forwards;
        opacity: 0;
    }

    .news-item:nth-child(1) { animation-delay: 0.1s; }
    .news-item:nth-child(2) { animation-delay: 0.3s; }
    .news-item:nth-child(3) { animation-delay: 0.5s; }
    .news-item:nth-child(4) { animation-delay: 0.7s; }

    .fade-slide-right {
        opacity: 0;
        transform: translateX(100px);
        transition: all 0.8s ease-out;
    }

    .fade-slide-right.is-visible {
        opacity: 1;
        transform: translateX(0);
    }

    .news-content {
        white-space: pre-wrap;
        word-wrap: break-word;
    }

    .news-card {
        margin-bottom: 2rem;
    }

    /* Month filter styles */
    .month-filter {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-bottom: 2rem;
        padding: 1rem 0;
    }

    .month-btn {
        padding: 0.5rem 1rem;
        border-radius: 0.375rem;
        background-color: #f3f4f6;
        color: #4b5563;
        border: 1px solid #e5e7eb;
        cursor: pointer;
        transition: all 0.2s;
    }

    .month-btn:hover {
        background-color: #e5e7eb;
    }

    .month-btn.active {
        background-color: #e8bc61;
        color: white;
        border-color: #e8bc61;
    }

    .no-results {
        text-align: center;
        padding: 2rem;
        color: #6b7280;
        font-style: italic;
    }
</style>

<section class="max-w-4xl w-full mt-0 mx-auto py-12 fade-slide-right">
    <!-- Section Header -->
    <div class="text-center mb-8 fade-slide-right">
        <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 mt-0">All News</h2>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">Stay updated with our most recent announcements and stories</p>
        <div class="w-full h-1 bg-[#e8bc61] mx-auto mt-6 rounded-full"></div>
    </div>

    <!-- Month Filter -->
    <div class="month-filter">
        <button class="month-btn active" data-month="all">All Months</button>
        @php
            // Get unique months from news items
            $months = [];
            foreach ($news as $item) {
                $monthYear = $item->created_at->format('Y-m');
                $monthName = $item->created_at->format('F Y');
                if (!isset($months[$monthYear])) {
                    $months[$monthYear] = $monthName;
                }
            }
            krsort($months); // Sort newest first
        @endphp

        @foreach($months as $monthKey => $monthName)
            <button class="month-btn" data-month="{{ $monthKey }}">{{ $monthName }}</button>
        @endforeach
    </div>

    <!-- News Grid -->
    <div class="space-y-8 mr-3 ml-3" id="news-container">
        @foreach($news as $item)
        <div class="news-item news-card" data-month="{{ $item->created_at->format('Y-m') }}">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                <div class="relative h-48 overflow-hidden">
                    @if($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" alt="News image" class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                    @endif

                    <div class="absolute top-4 right-4 bg-[#e8bc61] text-white text-xs font-semibold px-3 py-1 rounded-full">
                        {{ $item->title }}
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center text-sm text-gray-500 mb-2">
                        <span>{{ $item->created_at->format('F j, Y') }}</span>
                        <span class="mx-2">•</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $item->subtitle }}</h3>
                    <div class="news-content text-gray-600 mb-4">
                        {!! $item->content !!}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div id="no-results" class="no-results hidden">
        No news found for the selected month.
    </div>
</section>

<script>
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
    const newsItems = document.querySelectorAll('.news-card');
    const noResults = document.getElementById('no-results');
    const newsContainer = document.getElementById('news-container');

    monthButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Update active button
            monthButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');

            const selectedMonth = this.dataset.month;
            let hasResults = false;

            // Filter news items
            newsItems.forEach(item => {
                const itemMonth = item.dataset.month;

                if (selectedMonth === 'all' || itemMonth === selectedMonth) {
                    item.style.display = 'block';
                    hasResults = true;
                } else {
                    item.style.display = 'none';
                }
            });

            // Show/hide no results message
            if (hasResults) {
                noResults.classList.add('hidden');
                newsContainer.classList.remove('hidden');
            } else {
                noResults.classList.remove('hidden');
                newsContainer.classList.add('hidden');
            }
        });
    });
});
</script>
    <div class="fixed bottom-6 right-6 z-50 font-sans group">
        <!-- Chatbot Popup -->
        <div id="chatPopup" class="hidden w-96 h-[500px] bg-white shadow-2xl rounded-2xl flex flex-col overflow-hidden animate-fade-in">
            <!-- Header -->
            <div class="flex items-center justify-between bg-gradient-to-r from-[#e9bc64] to-[#e9bc64] p-4">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-[#e9bc64] font-bold text-lg">
                        🤖
                    </div>
                    <h2 class="text-white font-semibold text-lg">Chat Assistant</h2>
                </div>
                <button onclick="closeChat()" class="text-white text-2xl font-bold hover:text-gray-200">×</button>
            </div>

            <!-- Chat Body -->
            <div id="chatBody" class="flex-1 p-4 overflow-y-auto space-y-4 bg-gray-50">
                <div class="bg-gray-100 p-3 rounded-xl max-w-[80%] text-sm">
                    👋 Hello! I'm your AW Engineering Assistant. Ask me something below.
                </div>

                <!-- Static Response Buttons -->
                <div id="optionButtons" class="flex flex-col gap-2 mt-2">
                    <button onclick="selectOption(this)" class="bg-[#e9bc64] text-white rounded-lg px-4 py-2 hover:bg-[#f5c15a] transition text-left">When was AW Engineering founded?</button>
                    <button onclick="selectOption(this)" class="bg-[#e9bc64] text-white rounded-lg px-4 py-2 hover:bg-[#f5c15a] transition text-left">Where is AW Engineering located?</button>
                    <button onclick="selectOption(this)" class="bg-[#e9bc64] text-white rounded-lg px-4 py-2 hover:bg-[#f5c15a] transition text-left">What services does AW Engineering offer?</button>
                    <button onclick="selectOption(this)" class="bg-[#e9bc64] text-white rounded-lg px-4 py-2 hover:bg-[#f5c15a] transition text-left">What career opportunities are available?</button>
                </div>
            </div>

            <!-- Input -->
            <div class="flex items-center p-4 border-t bg-gray-100">
                <input id="chatInput" type="text" placeholder="Type a message..."
                    class="flex-1 border border-gray-300 rounded-full px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400"
                    onkeypress="handleKeyPress(event)">
                <button onclick="sendMessage()" class="ml-3 bg-[#e9bc64] hover:bg-[#f5c15a] text-white px-5 py-2 rounded-full shadow-md transition">
                    Send
                </button>
            </div>
        </div>

        <!-- Floating Button -->
        <button id="chatButton" onclick="toggleChat()" class="bg-[#e9bc64] hover:bg-[#f5c15a] text-white w-16 h-16 rounded-full shadow-xl flex items-center justify-center relative group">
            <!-- Tooltip -->
            <span class="absolute -left-28 bottom-5 opacity-0 group-hover:opacity-100 transition bg-gray-800 text-white text-sm py-1 px-3 rounded-lg shadow-lg">
                Chat with us
            </span>
            <!-- Chatbot Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
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

    <!-- Load chatbot.js WITHOUT Vite for now to test -->
    <script src="{{ asset('js/chatbot.js') }}"></script>

        <x-newfooter />

</body>
</html>
