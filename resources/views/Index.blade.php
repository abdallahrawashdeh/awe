<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>AW eng</title>


    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/newlogo.png') }}" type="image/png">

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
@vite(['resources/css/app.css', 'resources/js/chatbot.js'])
    @endif

    <style>
        html, body {
            overflow-x: hidden;
            width: 100%;
        }
    </style>
</head>

<body class="h-full">
    <x-header />
    <x-fixednav />
<!-- Slider -->
    <x-slider1 />




 <!-- end of Slider -->


<div class="w-full mt-0 bg-white rounded-xl shadow-2xl p-5 md:p-5 lg:p-20 animate-fadeInUp">
  <h3 class="text-3xl font-bold text-gray-800 mb-4 border-b-2 pb-2 border-[#e9bc64]">
     Advanced Works Engineering Overview:
  </h3>
  <p id="description" class="text-gray-600 leading-relaxed text-lg overflow-hidden transition-[max-height] duration-500 max-h-20">
   Welcome to Advanced Works
Engineering Company , where we
are dedicated to providing
comprehensive engineering services
to our clients, including property
developers, project owners, and
contractors. Our company was
established with the mission of
advancing engineering practices and
enhancing quality standards in the
engineering sector. <br>


We leverage our extensive
experience and knowledge to serve
our clients, with a carefully selected
team of highly skilled engineers
aligned with our vision to position
our company among the top-tier
firms in the fieled. We strive for
excellence and innovation in every
project we undertake, ensuring our
clients' success and achieving their
goals efficiently and professionally. <br>


In summary, we are your ideal
partner for all engineering service
needs, and we are committed to
delivering the best
  </p>


  <button id="toggleBtn" onclick="toggleText()" class="mt-10 before:ease relative h-12 w-40 overflow-hidden border border-[#e9bc64] bg-[#e9bc64] text-white shadow-2xl transition-all before:absolute before:right-0 before:top-0 before:h-12 before:w-6 before:translate-x-12 before:rotate-6 before:bg-white before:opacity-10 before:duration-700 hover:shadow-[#e9bc64] hover:before:-translate-x-40">
    <span id="btnText" class="relative z-10">Read More</span>
  </button>
</div>

<script>
  function toggleText() {
    const para = document.getElementById("description");
    const btnText = document.getElementById("btnText");

    if (para.classList.contains("max-h-20")) {
      para.classList.remove("max-h-20");
      para.classList.add("max-h-[1000px]");
      btnText.textContent = "Read Less";
    } else {
      para.classList.remove("max-h-[1000px]");
      para.classList.add("max-h-20");
      btnText.textContent = "Read More";
    }
  }
</script>
   <style>
        @keyframes fadeInUp {
      0% {
        opacity: 0;
        transform: translateY(20px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .animate-fadeInUp {
      animation: fadeInUp 0.8s ease-out forwards;
    }
  </style>

  <!------------------------------------------------------------------------------------>

<div class="w-full bg-white py-10 px-4 sm:px-10">
    <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center gap-8 shadow-lg  border border-gray-200 p-6 md:p-10 hover:shadow-2xl transition-all duration-300">
        <!-- Image Section -->
        <div class="flex-shrink-0">
            <img src="{{ asset('images/adelimg.png') }}" alt="Eng. Adel"
                class="w-40 h-40 md:w-48 md:h-48 rounded-full object-cover border-4 border-white shadow-md" />
        </div>

        <!-- Text Section -->
        <div class="text-center md:text-left flex-1">
            <h2 class="text-3xl font-bold text-gray-800">Eng. Adel</h2>
            <p class="text-lg text-gray-600 mt-2">Founder &amp; General Manager</p>
            <span href="#" class="text-[#e8bb5b] mt-2 inline-block hover:underline transition">AW Company</span>

            <!-- Optional Description -->
            <p class="mt-4 text-sm text-gray-500 leading-relaxed max-w-xl">
                Passionate about innovation and leadership, Eng. Adel has dedicated his career to building solutions that empower businesses and teams. His vision drives AW Company forward.
            </p>
        </div>
    </div>
</div>




    <!-- First Nav (not sticky) -->



    <!-- Counter Section -->
<section
    class="py-16  bg-cover bg-center bg-no-repeat"
    style="background-image: url('{{ asset('images/earthbackground.jpg') }}'); background-attachment: fixed; min-height: 220px; ">
    <!-- محتوى القسم -->


    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 overflow-x-auto">
    <div class="flex flex-nowrap gap-6 min-w-max"> <!-- Changed to min-w-max -->
      <!-- Counter Boxes (same as your code) -->
<div class="counter-box bg-black/40 rounded-lg shadow-md p-6 flex items-center space-x-4 w-64 shrink-0">
        <i data-feather="folder" class="text-blue-500 w-10 h-10"></i>
        <div>
          <p class="text-white font-medium">Total Projects</p>
          <p class="text-2xl font-bold text-blue-600 counter" data-target="200">0+</p>
        </div>
      </div>

<div class="counter-box bg-black/40 rounded-lg shadow-md p-6 flex items-center space-x-4 w-64 shrink-0">
        <i data-feather="users" class="text-green-500 w-10 h-10"></i>
        <div>
          <p class="text-white font-medium">Total Clients</p>
          <p class="text-2xl font-bold text-green-600 counter" data-target="100">0+</p>
        </div>
      </div>

<div class="counter-box bg-black/40 rounded-lg shadow-md p-6 flex items-center space-x-4 w-64 shrink-0">
        <i data-feather="user-check" class="text-purple-500 w-10 h-10"></i>
        <div>
          <p class="text-white font-medium">Total Employees</p>
          <p class="text-2xl font-bold text-purple-600 counter" data-target="50">0+</p>
        </div>
      </div>

<div class="counter-box bg-black/40 rounded-lg shadow-md p-6 flex items-center space-x-4 w-64 shrink-0">
        <i data-feather="globe" class="text-red-500 w-10 h-10"></i>
        <div>
          <p class="text-white font-medium">Total Countries</p>
          <p class="text-2xl font-bold text-red-600 counter" data-target="25">0+</p>
        </div>
      </div>

<div class="counter-box bg-black/40 rounded-lg shadow-md p-6 flex items-center space-x-4 w-64 shrink-0">
        <i data-feather="map-pin" class="text-yellow-500 w-10 h-10"></i>
        <div>
          <p class="text-white font-medium">Total Cities</p>
          <p class="text-2xl font-bold text-yellow-600 counter" data-target="60">0+</p>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
/* Scrollbar for WebKit (Chrome, Safari, Edge) */
.overflow-x-auto::-webkit-scrollbar {
  margin-top: 3px;
  height: 10px;
}

.overflow-x-auto::-webkit-scrollbar-track {
  background: #f1f1f1;
}

.overflow-x-auto::-webkit-scrollbar-thumb {
  background-color: #e9bc64;
  border-radius: 10px;
  border: 2px solid transparent;
  background-clip: content-box;
}

/* Firefox scrollbar */
.overflow-x-auto {
  scrollbar-color: #e9bc64 #f1f1f1; /* thumb and track */
  scrollbar-width: thin;
}
</style>




<!-- Feather & Counter Script -->
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
<script>
  // Initialize feather icons
  feather.replace();

  // Improved counter animation
  function animateCounter(el) {
    const target = +el.getAttribute("data-target");
    const duration = 2000; // Animation duration in ms
    const startTime = performance.now();

    const updateCounter = (timestamp) => {
      const elapsed = timestamp - startTime;
      const progress = Math.min(elapsed / duration, 1);
      const currentValue = Math.floor(progress * target);

      el.textContent = currentValue + '+';

      if (progress < 1) {
        requestAnimationFrame(updateCounter);
      }
    };

    requestAnimationFrame(updateCounter);
  }

  // Wait for DOM to load
  document.addEventListener("DOMContentLoaded", () => {
    const counters = document.querySelectorAll(".counter");

    // Improved Intersection Observer configuration
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          animateCounter(entry.target);
          observer.unobserve(entry.target);
        }
      });
    }, {
      threshold: 0.5,
      rootMargin: '0px 0px 0px 100px' // Trigger when 100px from entering viewport
    });

    // Observe each counter directly (not the parent box)
    counters.forEach(counter => observer.observe(counter));

    // Fallback for browsers without IntersectionObserver
    if (!('IntersectionObserver' in window)) {
      counters.forEach(counter => animateCounter(counter));
    }
  });
</script>







 <!-----------------------------------------hero------------------------------------------->


 <!----------------------------------------end of hero--------------------------------------->



<!-------------------------------------------------------------------------------------------------------->

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
    </style>
<section class="max-w-6xl w-full mt-4 mx-auto py-12 fade-slide-right" id="Latest_News">
        <!-- Section Header -->
<div class="text-center mb-16 fade-slide-right">
    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 mt-10">Latest News</h2>
    <p class="text-lg text-gray-600 max-w-2xl mx-auto">Stay updated with our most recent announcements and stories</p>
    <div class="w-full h-1 bg-[#e9bc64] mx-auto mt-6 rounded-full"></div>
</div>
<style>
.fade-slide-right {
    opacity: 0;
    transform: translateX(100px);
    transition: all 0.8s ease-out;
}

.fade-slide-right.is-visible {
    opacity: 1;
    transform: translateX(0);
}
</style>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target); // Stop observing once it's visible
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.fade-slide-right').forEach(el => {
        observer.observe(el);
    });
});
</script>






@php use Illuminate\Support\Str; @endphp

<!-- Modal -->
<!-- Modal -->
<div id="modal" class="fixed w-full inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white p-6 rounded-lg max-w-2xl w-full relative">
        <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
        <div id="modalContent" class="break-words whitespace-pre-wrap overflow-y-auto max-h-[70vh]"></div>
    </div>
</div>


<script>
    function openModal(content) {
        const modal = document.getElementById('modal');
        const modalContent = document.getElementById('modalContent');
        modalContent.innerHTML = content;
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeModal() {
        const modal = document.getElementById('modal');
        modal.classList.remove('flex');
        modal.classList.add('hidden');
    }
</script>

<!-- News Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
@foreach($news->sortByDesc('created_at')->take(3) as $item)
        @php
            $cleanContent = strip_tags($item->content);
            $isLongContent = strlen($cleanContent) > 150;
            $previewContent = $isLongContent ? Str::limit($cleanContent, 150, '...') : $cleanContent;
        @endphp

        <div class="news-item bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
            <div class="relative h-48 overflow-hidden">
                @if($item->image)
                    <img src="{{ asset('storage/' . $item->image) }}" alt="News image" class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                @endif

                <div class="absolute top-4 right-4 bg-[#e9bc64] text-white text-xs font-semibold px-3 py-1 rounded-full">
                    {{ $item->title }}
                </div>
            </div>
            <div class="p-6">
                <div class="flex items-center text-sm text-gray-500 mb-2">
                    <span>{{ $item->created_at->format('F j, Y') }}</span>
                    <span class="mx-2">•</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $item->subtitle }}</h3>
                <p class="text-gray-600 mb-4">{{ $previewContent }}</p>

                @if($isLongContent)
                    <button onclick="openModal(`{!! addslashes($item->content) !!}`)"
                            class="text-[#e9bc64] font-medium hover:text-[#f5c361] inline-flex items-center">
                        Read More
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                @endif
            </div>
        </div>
    @endforeach
</div>


        <!-- View More Button -->
<div class="text-center mt-12 animate-slideIn" style="animation-delay: 0.9s;">
    <a href="/allnews" class="inline-flex items-center px-6 py-3 bg-[#e9bc64] text-white font-medium rounded-lg hover:bg-[#e9bc64] transition-colors duration-300 shadow-md hover:shadow-lg">
        View All News
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
        </svg>
    </a>
</div>

    </section>


    <!---------------------------------------------------------------------------------------------------->

    <x-certificationslider />
    <!---------------------------Ours----------------------------------------------------------------------------------->




<div class="min-h-screen h-[600px] flex flex-col items-center justify-center p-4"
     style="background-image: url('/images/background.jpg'); background-size: cover; background-position: center;">


    <script>
  document.addEventListener("DOMContentLoaded", () => {
    const nav = document.getElementById("animated-nav");

    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            nav.classList.add("translate-x-0", "opacity-100");
            nav.classList.remove("-translate-x-10", "opacity-0");
          }
        });
      },
      { threshold: 0.5 } // Adjust as needed
    );

    observer.observe(nav);
  });
</script>

  <!-- Navigation Buttons -->
<nav id="animated-nav"
  class="backdrop-blur-lg bg-white/30 shadow-lg rounded-full w-full max-w-2xl mb-4 md:mb-8 border border-white/20 transition-all duration-700 transform -translate-x-10 opacity-0"
>    <div class="max-w-7xl mx-auto px-2 sm:px-4">
      <div class="flex justify-center h-12 sm:h-16 items-center space-x-1 sm:space-x-2">
        <button
          onclick="showPage('page1')"
          class="relative overflow-hidden bg-white/10 hover:bg-white/20 text-white font-medium py-1 px-3 sm:py-2 sm:px-6 rounded-full transition-all duration-300 border border-white/20 hover:border-white/40 group text-xs sm:text-base"
        >
          <span class="relative z-10">OUR VISION</span>
          <span class="absolute inset-0 bg-gradient-to-r from-[#e9bc64] to-[#fabc40] opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-full"></span>
        </button>
        <button
          onclick="showPage('page2')"
          class="relative overflow-hidden bg-white/10 hover:bg-white/20 text-white font-medium py-1 px-3 sm:py-2 sm:px-6 rounded-full transition-all duration-300 border border-white/20 hover:border-white/40 group text-xs sm:text-base"
        >
          <span class="relative z-10">OUR MISSION</span>
          <span class="absolute inset-0 bg-gradient-to-r from-[#e9bc64] to-[#fabc40] opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-full"></span>
        </button>
        <button
          onclick="showPage('page3')"
          class="relative overflow-hidden bg-white/10 hover:bg-white/20 text-white font-medium py-1 px-3 sm:py-2 sm:px-6 rounded-full transition-all duration-300 border border-white/20 hover:border-white/40 group text-xs sm:text-base"
        >
          <span class="relative z-10">OUR VALUES</span>
          <span class="absolute inset-0 bg-gradient-to-r from-[#e9bc64] to-[#fabc40] opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-full"></span>
        </button>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div id="page1" class="hidden w-full max-w-4xl">
    <div class="backdrop-blur-lg bg-white/20 p-4 sm:p-8 rounded-3xl h-[550px] sm:h-[550px] shadow-2xl border border-white/30 text-center transition-all duration-500 transform hover:scale-[1.01]">
      <h1 class="text-2xl sm:text-4xl font-bold mb-4 sm:mb-6 text-white drop-shadow-md">OUR VISION</h1>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6 mt-6 sm:mt-12">
        <div class="bg-white/10 p-4 sm:p-6 rounded-2xl border border-white/20 hover:bg-white/20 transition-all duration-300">
          <div class="text-2xl sm:text-3xl mb-2 sm:mb-3">🏗️</div>
          <h3 class="text-sm sm:text-base font-semibold text-white">Our engineering firm aspires to establish itself as a
prominent player in the market, providing innovative
and high-quality engineering solutions. We aim to
become a leading engineering firm known for our
commitment to excellence, reliability, and customer
satisfaction. </h3>
        </div>
        <div class="bg-white/10 p-4 sm:p-6 rounded-2xl border border-white/20 hover:bg-white/20 transition-all duration-300">
          <div class="text-2xl sm:text-3xl mb-2 sm:mb-3">🧠</div>
          <h3 class="text-sm sm:text-base font-semibold text-white">By leveraging our expertise across all engineering
disciplines, we seek to consistently deliver exceptional
results and build lasting relationships with our clients.
Our vision is to be at the forefront of driving
technological advancements and setting new industry
standards.</h3>
        </div>
      </div>
    </div>
  </div>

<div id="page2" class="hidden w-full max-w-4xl">
    <div class="backdrop-blur-lg bg-white/20 p-4 sm:p-8 rounded-3xl h-[550px] sm:h-[550px] shadow-2xl border border-white/30 text-center transition-all duration-500 transform hover:scale-[1.01]">
    <h1 class="text-2xl sm:text-4xl font-bold mb-4 sm:mb-6 text-white drop-shadow-md">OUR MISSION</h1>

    <div class="flex flex-col sm:flex-row justify-center items-stretch gap-6 sm:gap-8 mt-6 sm:mt-12">
      <!-- Mission Item 1 -->
      <div class="flex flex-col items-center">

        <div class="bg-white/10 p-4 rounded-xl border border-white/20 flex-1 w-full">
          <h3 class="font-semibold text-white mb-2">Innovation</h3>
          <p class="text-white/90 text-sm sm:text-base">Our primary goal is to deliver exceptional engineering services to our esteemed clients,
            ensuring the highest standards of quality, efficiency,
            and innovation. We are committed to contributing to the success and growth of our clients by
            providing tailored solutions that meet their specific needs. Through the consistent delivery of
             high-quality products and services, we strive to exceed expectations, foster long-term partnerships,
              and maintain a reputation for excellence in the engineering industry.</p>
        </div>
      </div>



      <!-- Mission Item 2 -->


      <!-- Mission Item 3 -->

    </div>
  </div>
</div>
<div id="page3" class="hidden w-full max-w-4xl">
  <div class="backdrop-blur-lg bg-white/20 p-4 sm:p-8 rounded-3xl h-[550px] sm:h-[550px] shadow-2xl border border-white/30 text-center transition-all duration-500 transform hover:scale-[1.01]">
    {{-- <h1 class="text-2xl sm:text-4xl font-bold mb-4 sm:mb-6 text-white drop-shadow-md">OUR VALUES</h1> --}}

<div class="grid grid-cols-1 h-[490px] sm:grid-cols-2 gap-4 sm:gap-6 max-w-2xl mx-auto mt-2 sm:mt-0  overflow-auto sm:overflow-visible">
      <!-- Value 1 -->
      <div class="relative">
        <div class="absolute -inset-1 bg-gradient-to-r rounded-lg blur opacity-75 animate-pulse"></div>
        <div class="relative bg-white/20 rounded-lg px-4 py-3 sm:px-7 sm:py-5 border border-white/30 h-full">
          <h3 class="text-lg sm:text-xl font-semibold text-white">ENVIRONMENTAL STEWARDSHIP</h3>
          <p class="mt-1 sm:mt-2 text-sm sm:text-base text-white/80">We recognize our responsibility to minimize
the environmental impact of our work. Through sustainable practices, we aim
to contribute positively to the welfare of the planet and future generations</p>
        </div>
      </div>

            <div class="relative">
        <div class="absolute -inset-1 bg-gradient-to-r  rounded-lg blur opacity-75 animate-pulse"></div>
        <div class="relative bg-white/20 rounded-lg px-4 py-3 sm:px-7 sm:py-5 border border-white/30 h-full">
          <h3 class="text-lg sm:text-xl font-semibold text-white">CLIENT FOCUS</h3>
          <p class="mt-1 sm:mt-2 text-sm sm:text-base text-white/80">: Our clients' satisfaction is paramount. We are dedicated to understanding and meeting their
needs, fostering strong relationships, and delivering valuable, tailored solutions.</p>
        </div>
      </div>

            <div class="relative">
        <div class="absolute -inset-1 bg-gradient-to-r rounded-lg blur opacity-75 animate-pulse"></div>
        <div class="relative bg-white/20 rounded-lg px-4 py-3 sm:px-7 sm:py-5 border border-white/30 h-full">
          <h3 class="text-lg sm:text-xl font-semibold text-white">PROFESSIONALISM</h3>
          <p class="mt-1 sm:mt-2 text-sm sm:text-base text-white/80">We exemplify professionalism in all our interactions, from
client engagement to internal operations, demonstrating respect,
competence, and a commitment to excellence.</p>
        </div>
      </div>

      <!-- Value 2 -->
      <div class="relative">
        <div class="absolute -inset-1 bg-gradient-to-r rounded-lg blur opacity-75 animate-pulse"></div>
        <div class="relative bg-white/20 rounded-lg px-4 py-3 sm:px-7 sm:py-5 border border-white/30 h-full">
          <h3 class="text-lg sm:text-xl font-semibold text-white">ADAPTABILITY</h3>
          <p class="mt-1 sm:mt-2 text-sm sm:text-base text-white/80">We embrace change and technological advancement, staying
agile and responsive to emerging trends and the needs of a dynamic field</p>
        </div>
      </div>

      <!-- Value 3 -->


      <!-- Value 4 -->

    </div>
  </div>
</div>

</div>

<!-- JavaScript -->
<script>
  function showPage(pageId) {
    const pages = ['page1', 'page2', 'page3'];
    pages.forEach(id => {
      const page = document.getElementById(id);
      if (page) {
        page.classList.add('hidden');
        page.classList.remove('animate-fadeIn');
      }
    });

    const activePage = document.getElementById(pageId);
    if (activePage) {
      activePage.classList.remove('hidden');
      activePage.classList.add('animate-fadeIn');
    }
  }

  // Show the first page by default
  document.addEventListener('DOMContentLoaded', () => {
    showPage('page1');

    // Add animation class to all pages
    const pages = ['page1', 'page2', 'page3'];
    pages.forEach(id => {
      const page = document.getElementById(id);
      if (page) {
        page.classList.add('transition-opacity', 'duration-500', 'ease-in-out');
      }
    });
  });
</script>

<style>
  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
  }
  .animate-fadeIn {
    animation: fadeIn 0.5s ease-out forwards;
  }
</style>




<!-- ====== Services Section Start -->
<section id="Our_Services" class="pb-12 pt-20 border-spacing-2 lg:pb-[90px] lg:pt-[120px] dark:bg-dark border-3 border-solid border-red-500 w-[95%] mx-auto">
    <div class="container mx-auto" >
      <div class="-mx-4 flex flex-wrap">
<div class="w-full px-4">
    <div id="servicesSection" class="mx-auto mb-12 max-w-[510px] text-center lg:mb-20 opacity-0">
      <span class="mb-2 block text-lg font-semibold text-[#e9bc64]">
        Our Services
      </span>
      <h2 class="mb-3 text-3xl font-bold leading-[1.2] text-gray-900 sm:text-4xl md:text-[40px]">
        What We Offer
      </h2>

    </div>
  </div>
<style>
   @keyframes slideInFromLeft {
      0% {
        opacity: 0;
        transform: translateX(-100%);
      }
      100% {
        opacity: 1;
        transform: translateX(0);
      }
    }

    .animate-slide-in {
      animation: slideInFromLeft 1s ease-out forwards;
    }
  </style>

   <script>
    document.addEventListener("DOMContentLoaded", function () {
      const section = document.getElementById("servicesSection");

      const observer = new IntersectionObserver(
        function (entries) {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              section.classList.add("animate-slide-in");
              section.classList.remove("opacity-0");
              observer.unobserve(section); // Only trigger once
            }
          });
        },
        { threshold: 0.3 }
      );

      observer.observe(section);
    });
  </script>
      </div>



      <div class="-mx-4 flex flex-wrap">
        @if(isset($services) && count($services))
            @foreach($services as $service)
        <div class="w-full px-4 md:w-1/2 lg:w-1/3">
          <div class="mb-9 rounded-[20px] shadow-2xl bg-white p-10 shadow-2 hover:shadow-lg md:px-7 xl:px-10 dark:bg-dark-2">

            <h4 class="mb-[14px] text-2xl font-semibold text-dark dark:text-white">
              {{ $service->title }}
            </h4>
            <p class="text-body-color dark:text-dark-6">
              {{ $service->description }}
            </p>
          </div>
        </div>
        @endforeach
    @endif






        </div>

<div class="mt-12 flex justify-center">
    <a href="/allservices" class="inline-flex items-center px-6 py-3 bg-[#e9bc64] text-white font-medium rounded-lg hover:bg-[#f9c357] transition-colors duration-300 shadow-md hover:shadow-lg">
        View All Services
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
        </svg>
    </a>
</div>




      </div>
    </div>
  </section>
  <!-- ====== Services Section End -->



<!---------------------------------------------- our projects ---------------------------------------->


@php
// Sort projects by year descending and take the 3 newest
$newestProjects = isset($projects) ? $projects->sortByDesc('year')->take(3) : collect();
@endphp

<section class="relative py-12 px-4 sm:px-6 lg:px-8" id="Our_Projects">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0 overflow-hidden">
        <img src="{{ asset('images/Background.jpg') }}" alt="Background" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    </div>

    <div class="relative max-w-7xl mx-auto">
        @if($newestProjects->count())
            <h2 class="text-2xl md:text-3xl font-bold text-white mb-6 md:mb-8 text-center">Our Newest Projects</h2>

            <!-- Single column on mobile, responsive grid on larger screens -->
<div class="flex flex-col mx-2 space-y-6 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-6 md:space-y-0">
                @foreach($newestProjects as $project)
                    <div
                        x-data="{ expanded: false }"
                        class="w-full  bg-gray-500/50  bg-opacity-90 backdrop-blur-sm rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-all duration-300 md:hover:scale-[1.02]"
                    >
                        <div class="p-5 sm:p-6">
                            <div class="text-sm font-semibold text-[#e9bc64] mb-2">{{ $project->year }}</div>
                            <h3 class="text-lg sm:text-xl font-bold text-white mb-3">{{ $project->title }}</h3>
                            <p class="text-white mb-4">
                                <template x-if="!expanded">
                                    <span>{{ Illuminate\Support\Str::limit($project->content, 70) }}</span>
                                </template>
                                <template x-if="expanded">
                                    <span class="text-white">{{ $project->content }}</span>
                                </template>
                            </p>
                            <button
                                @click="expanded = !expanded"
                                class="inline-flex items-center text-[#e9bc64] hover:text-[#fcc85f] font-medium"
                            >
                                <span x-text="expanded ? 'Read less' : 'Read more'"></span>
                                <svg
                                    class="w-4 h-4 ml-2 transition-transform duration-300"
                                    :class="{ 'rotate-90': expanded }"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

<div class="mt-12 flex justify-center">
    <a href="/allprojects" class="inline-flex items-center px-6 py-3 bg-[#e9bc64] text-white font-medium rounded-lg hover:bg-[#f8c561] transition-colors duration-300 shadow-md hover:shadow-lg">
        View All Projects
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
        </svg>
    </a>
</div>
        @else
<div class="mt-12 flex justify-center">
    <a href="/allprojects" class="inline-flex items-center px-6 py-3 bg-[#e9bc64] text-white font-medium rounded-lg hover:bg-bg-[#f8c561] transition-colors duration-300 shadow-md hover:shadow-lg">
        View All Projects
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
        </svg>
    </a>
</div>
        @endif
    </div>
</section>


<!-----------------------------------------------------our team --------------------------------------->


<section class="bg-white dark:bg-gray-900" id="Our_Team">
  <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
    <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
      <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Our Team</h2>
    </div>
    <div class="grid gap-8 mb-6 lg:mb-16 md:grid-cols-2">

      <!-- Card 1 -->
      <a href="/team" class="block">
        <div class="items-center h-[100%] bg-gray-50 rounded-lg shadow sm:flex dark:bg-gray-800 dark:border-gray-700 transition hover:shadow-lg hover:scale-[1.01]">
          <div class="text-5xl font-bold ml-5 mt-5 sm:mt-0">1 -</div>
          <div class="p-5">
            <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">Structural Department</h3>
            <span class="text-gray-500 dark:text-gray-400">Structural Services</span>
            <p class="mt-0 mb-1 font-light text-gray-500 dark:text-gray-400">Structural Analysis & Design.</p>
            <p class="mt-0 mb-1 font-light text-gray-500 dark:text-gray-400">Structural Shop Drawings.</p>
            <p class="mt-0 mb-1 font-light text-gray-500 dark:text-gray-400">Inspection & Assessment / Restorations & Forensic Investigations.</p>
            <p class="mt-0 mb-1 font-light text-gray-500 dark:text-gray-400">FEA Consulting Services.</p>
          </div>
        </div>
      </a>

      <!-- Card 2 -->
      <a href="/team" class="block">
        <div class="items-center bg-gray-50 rounded-lg shadow sm:flex dark:bg-gray-800 dark:border-gray-700 transition hover:shadow-lg hover:scale-[1.01]">
          <div class="text-5xl font-bold ml-5 mt-5 sm:mt-0">2 -</div>
          <div class="p-5">
            <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">Architectural Department</h3>
            <span class="text-gray-500 dark:text-gray-400">Architectural Services</span>
            <p class="mt-0 mb-1 font-light text-gray-500 dark:text-gray-400">Architectural Design Service.</p>
            <p class="mt-0 mb-1 font-light text-gray-500 dark:text-gray-400">Interior Design Service.</p>
            <p class="mt-0 mb-1 font-light text-gray-500 dark:text-gray-400">Shop Drawing Service.</p>
          </div>
        </div>
      </a>

      <!-- Card 3 -->
      <a href="/team" class="block">
        <div class="items-center bg-gray-50 rounded-lg shadow sm:flex dark:bg-gray-800 dark:border-gray-700 transition hover:shadow-lg hover:scale-[1.01]">
          <div class="text-5xl font-bold ml-5 mt-5 sm:mt-0">3 -</div>
          <div class="p-5">
            <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">Electrical Department</h3>
            <span class="text-gray-500 dark:text-gray-400">Electrical Services</span>
            <p class="mt-0 mb-1 font-light text-gray-500 dark:text-gray-400">Electrical Design Service.</p>
            <p class="mt-0 mb-1 font-light text-gray-500 dark:text-gray-400">Electrical Shop Drawing Service.</p>
          </div>
        </div>
      </a>

      <!-- Card 4 -->
      <a href="/team" class="block">
        <div class="items-center bg-gray-50 rounded-lg shadow sm:flex dark:bg-gray-800 dark:border-gray-700 transition hover:shadow-lg hover:scale-[1.01]">
          <div class="text-5xl font-bold ml-5 mt-5 sm:mt-0">4 -</div>
          <div class="p-5">
            <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">Mechanical Department</h3>
            <span class="text-gray-500 dark:text-gray-400">Mechanical Services</span>
            <p class="mt-0 mb-1 font-light text-gray-500 dark:text-gray-400">Mechanical Design Service.</p>
            <p class="mt-0 mb-1 font-light text-gray-500 dark:text-gray-400">Mechanical Shop Drawing Service.</p>
          </div>
        </div>
      </a>

      <!-- Card 5 -->



    </div>
         <a href="/team" class="block w-full">
  <div class="w-full items-center bg-gray-50 rounded-lg shadow sm:flex dark:bg-gray-800 dark:border-gray-700 transition hover:shadow-lg hover:scale-[1.01]">
    <div class="text-5xl font-bold ml-5 mt-5 sm:mt-0">5 -</div>
    <div class="p-5">
      <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">BIM Department</h3>
      <span class="text-gray-500 dark:text-gray-400">BIM Services</span>
      <p class="mt-0 mb-1 font-light text-gray-500 dark:text-gray-400">3D BIM Modeling.</p>
      <p class="mt-0 mb-1 font-light text-gray-500 dark:text-gray-400">Clash Detection and Resolution.</p>
      <p class="mt-0 mb-1 font-light text-gray-500 dark:text-gray-400">4D BIM (Time Scheduling).</p>
      <p class="mt-0 mb-1 font-light text-gray-500 dark:text-gray-400">5D BIM (Cost Estimation) Integrate.</p>
      <p class="mt-0 mb-1 font-light text-gray-500 dark:text-gray-400">Facility Management BIM.</p>
      <p class="mt-0 mb-1 font-light text-gray-500 dark:text-gray-400">BIM Coordination and Collaboration.</p>
    </div>
  </div>
</a>
  </div>
</section>




<!-------------------------------------------------------------------------->

<div class="overflow-x-hidden">
  <div id="slideDiv" class="h-1 mt-0 w-[100%] bg-[#e9bc64] slide-in mx-auto"></div>
</div>

<style>

  .slide-in {
    transform: translateX(-50%);
    opacity: 0;
    transition: transform 2s ease-out, opacity 2s ease-out;
  }

  .slide-in-active {
    transform: translateX(0);
    opacity: 1;
  }

</style>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const target = document.getElementById('slideDiv');

    const observer = new IntersectionObserver(
      ([entry]) => {
        if (entry.isIntersecting) {
          target.classList.add('slide-in-active');
        }
      },
      { threshold: 0.5 }
    );

    observer.observe(target);
  });
</script>



<section class="bg-black text-white pt-8 pb-4 w-full mx-auto">
  <!-- HTML -->
  <div>
    <h2 class="text-center text-2xl mb-2 font-bold ">Trusted Partners</h2>
    <p class="text-center text-lg font-extralight ">
      Collaborating with industry leaders worldwide
    </p>
  </div>

  <!-- JavaScript -->
  <script>
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.remove('opacity-0', 'translate-x-20');
          entry.target.classList.add('opacity-100', 'translate-x-0');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.1 });

    const partnersSection = document.querySelector('#partners-section');
    if (partnersSection) {
      observer.observe(partnersSection);
    }
  </script>

  <div
    class="logos group relative overflow-hidden whitespace-nowrap py-10 [mask-image:_linear-gradient(to_right,_transparent_0,_white_128px,white_calc(100%-128px),_transparent_100%)]"
  >
    <div class="animate-partners-scroll flex w-max">
      @foreach ($clients as $client)
        <img class="mx-4 h-16" src="{{ asset('storage/' . $client->image) }}" alt="{{ $client->title }}">
      @endforeach

      @foreach ($clients as $client)
        <img class="mx-4 h-16" src="{{ asset('storage/' . $client->image) }}" alt="{{ $client->title }}">
      @endforeach
    </div>
  </div>
</section>

<style>
@keyframes scroll-partners-left {
  0% {
    transform: translateX(0);
  }
  100% {
    transform: translateX(-50%);
  }
}

.animate-partners-scroll {
  animation: scroll-partners-left 20s linear infinite;
}

.group:hover .animate-partners-scroll {
  animation-play-state: paused;
}
</style>



<div class="overflow-x-hidden">
  <div id="slideDivRight" class="h-1  w-[100%] bg-[#e9bc64] slide-in-right mx-auto "></div>
</div>

<style>
  .slide-in-right {
    transform: translateX(50%);
    opacity: 0;
    transition: transform 2s ease-out, opacity 2s ease-out;
  }

  .slide-in-right-active {
    transform: translateX(0);
    opacity: 1;
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const targetRight = document.getElementById('slideDivRight');

    const observerRight = new IntersectionObserver(
      ([entry]) => {
        if (entry.isIntersecting) {
          targetRight.classList.add('slide-in-right-active');
        }
      },
      { threshold: 0.5 }
    );

    observerRight.observe(targetRight);
  });
</script>








<!-------------------------------------------------------------->



<!-- Floating Chatbot Button -->
<!-- Floating Chatbot Button + Popup -->
<!-- Floating Chatbot Button + Popup -->
<!-- Floating Chatbot Button + Styled Popup -->
<!-- Floating Chatbot Button + Popup -->
<!-- Floating Chatbot Button + Popup -->
{{-- <div class="fixed bottom-6 right-6 z-50 font-sans group">

  <!-- Chatbot Popup -->
  <div id="chatPopup"
    class="hidden w-96 h-[500px] bg-white shadow-2xl rounded-2xl flex flex-col overflow-hidden animate-fade-in">

    <!-- Header -->
    <div class="flex items-center justify-between bg-gradient-to-r from-blue-600 to-indigo-600 p-4">
      <div class="flex items-center space-x-3">
        <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-blue-600 font-bold text-lg">
          🤖
        </div>
        <h2 class="text-white font-semibold text-lg">Chat Assistant</h2>
      </div>
      <button onclick="closeChat()" class="text-white text-2xl font-bold hover:text-gray-200">×</button>
    </div>

    <!-- Chat Body -->
    <div id="chatBody" class="flex-1 p-4 overflow-y-auto space-y-4 bg-gray-50">
      <div class="bg-gray-100 p-3 rounded-xl max-w-[80%] text-sm">
        👋 Hello! I’m your AW Engineering Assistant. Ask me something below.
      </div>

      <!-- Static Response Buttons -->
      <div id="optionButtons" class="flex flex-col gap-2 mt-2">
        <button onclick="selectOption(this)"
          class="bg-blue-600 text-white rounded-lg px-4 py-2 hover:bg-blue-700 transition text-left">When was AW Engineering founded?</button>
        <button onclick="selectOption(this)"
          class="bg-blue-600 text-white rounded-lg px-4 py-2 hover:bg-blue-700 transition text-left">Where is AW Engineering located?</button>
        <button onclick="selectOption(this)"
          class="bg-blue-600 text-white rounded-lg px-4 py-2 hover:bg-blue-700 transition text-left">What services does AW Engineering offer?</button>
      </div>
    </div>

    <!-- Input -->
    <div class="flex items-center p-4 border-t bg-gray-100">
      <input id="chatInput" type="text" placeholder="Type a message..."
        class="flex-1 border border-gray-300 rounded-full px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400" />
      <button onclick="sendMessage()"
        class="ml-3 bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-full shadow-md transition">
        Send
      </button>
    </div>
  </div>

  <!-- Floating Button -->
  <button id="chatButton" onclick="toggleChat()"
    class="bg-blue-600 hover:bg-blue-700 text-white w-16 h-16 rounded-full shadow-xl flex items-center justify-center relative group">

    <!-- Tooltip -->
    <span
      class="absolute -left-28 bottom-5 opacity-0 group-hover:opacity-100 transition bg-gray-800 text-white text-sm py-1 px-3 rounded-lg shadow-lg">
      Chat with us
    </span>

    <!-- Chatbot Icon -->
    <svg xmlns="http://www.w3.org/2000/svg"
      fill="none" viewBox="0 0 24 24" stroke-width="1.5"
      stroke="currentColor" class="w-8 h-8">
      <path stroke-linecap="round" stroke-linejoin="round"
        d="M8.25 9.75h.008v.008H8.25V9.75zm3 0h.008v.008H11.25V9.75zm3
           0h.008v.008H14.25V9.75zm-9 4.5h13.5a2.25 2.25 0 002.25-2.25V6
           A2.25 2.25 0 0018.75 3.75H5.25A2.25 2.25 0 003 6v6
           a2.25 2.25 0 002.25 2.25zm3 3l2.25-2.25m0 0l2.25 2.25m-2.25-2.25V21" />
    </svg>
</button>
</div> --}}

<!-- Animations -->
{{-- <style>
  @keyframes fade-in {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
  }
  .animate-fade-in { animation: fade-in 0.25s ease-out; }
</style> --}}
 <!-- Chatbot Widget -->
       <!-- Chatbot Widget -->
    <div class="fixed bottom-6 right-6 z-50 font-sans group">
        <!-- Chatbot Popup -->
        <div id="chatPopup" class="hidden w-96 h-[500px] bg-white shadow-2xl rounded-2xl flex flex-col overflow-hidden animate-fade-in">
            <!-- Header -->
            <div class="flex items-center justify-between bg-gradient-to-r from-blue-600 to-indigo-600 p-4">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-blue-600 font-bold text-lg">
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
                    <button onclick="selectOption(this)" class="bg-blue-600 text-white rounded-lg px-4 py-2 hover:bg-blue-700 transition text-left">When was AW Engineering founded?</button>
                    <button onclick="selectOption(this)" class="bg-blue-600 text-white rounded-lg px-4 py-2 hover:bg-blue-700 transition text-left">Where is AW Engineering located?</button>
                    <button onclick="selectOption(this)" class="bg-blue-600 text-white rounded-lg px-4 py-2 hover:bg-blue-700 transition text-left">What services does AW Engineering offer?</button>
                    <button onclick="selectOption(this)" class="bg-blue-600 text-white rounded-lg px-4 py-2 hover:bg-blue-700 transition text-left">What career opportunities are available?</button>
                </div>
            </div>

            <!-- Input -->
            <div class="flex items-center p-4 border-t bg-gray-100">
                <input id="chatInput" type="text" placeholder="Type a message..."
                    class="flex-1 border border-gray-300 rounded-full px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400"
                    onkeypress="handleKeyPress(event)">
                <button onclick="sendMessage()" class="ml-3 bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-full shadow-md transition">
                    Send
                </button>
            </div>
        </div>

        <!-- Floating Button -->
        <button id="chatButton" onclick="toggleChat()" class="bg-blue-600 hover:bg-blue-700 text-white w-16 h-16 rounded-full shadow-xl flex items-center justify-center relative group">
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

    <!-- JavaScript Code -->

<!-- JS -->
{{-- <script>
  function toggleChat() {
    const popup = document.getElementById("chatPopup");
    const button = document.getElementById("chatButton");

    popup.classList.toggle("hidden");

    if (!popup.classList.contains("hidden")) {
      button.classList.add("hidden");
    }
  }

  function closeChat() {
    document.getElementById("chatPopup").classList.add("hidden");
    document.getElementById("chatButton").classList.remove("hidden");
  }

  function sendMessage() {
    const input = document.getElementById("chatInput");
    if (input.value.trim() === "") return;
    addUserMessage(input.value);
    setTimeout(() => addBotMessage(`🤖 I received your message: "${input.value}"`), 500);
    input.value = "";
  }

  function addUserMessage(message) {
    const chatBody = document.getElementById("chatBody");
    chatBody.innerHTML += `
      <div class="bg-blue-600 text-white p-3 rounded-xl max-w-[70%] ml-auto text-sm">
        ${message}
      </div>
    `;
    chatBody.scrollTop = chatBody.scrollHeight;
  }

  function addBotMessage(message) {
    const chatBody = document.getElementById("chatBody");
    chatBody.innerHTML += `
      <div class="bg-gray-100 p-3 rounded-xl max-w-[80%] text-sm">
        ${message}
      </div>
    `;
    chatBody.scrollTop = chatBody.scrollHeight;
  }

  // Handles static option clicks
  function selectOption(button) {
    const question = button.innerText;
    const buttonsContainer = document.getElementById("optionButtons");

    addUserMessage(question); // Show as user message

    // Remove all other options except the selected one
    Array.from(buttonsContainer.children).forEach(btn => {
      if (btn !== button) btn.remove();
    });

    let answer = "";
    if (question.includes("founded")) answer = "AW Engineering was founded in 2016.";
    else if (question.includes("located")) answer = "AW Engineering is located in Jordan.";
    else if (question.includes("services")) answer = "AW Engineering offers engineering consulting and IT services.";

    setTimeout(() => addBotMessage(answer), 500);
  }
</script> --}}


<!-- footer section -->


<footer class="w-full">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <!--Grid-->
            <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-6 gap-3 md:gap-8 py-10 max-sm:max-w-sm max-sm:mx-auto gap-y-8">
                <div class="col-span-full mb-10 lg:col-span-2 lg:mb-0">
                    <a href="https://pagedone.io/"  class="flex justify-center lg:justify-start">
                        <img src="{{ asset('images/newlogo.png') }}" width="150" height="30" alt="">
                    </a>
                    <p class="py-8 text-sm text-gray-500 lg:max-w-xs text-center lg:text-left">Have any query ?</p>
<!-- Contact Us Button -->
<!-- Contact Us Button -->
<a href="javascript:;" onclick="toggleContactForm()"
   class="py-2.5 px-5 h-9 block w-fit bg-[#e9bc64] rounded-full shadow-sm text-xs text-white mx-auto transition-all duration-500 hover:bg-[#f6c25c] lg:mx-0">
    Contact us
</a>

<!-- Hidden Contact Form Section -->
<div id="contactForm" class="hidden mt-6">
  <form
    id="customContactForm"
    class="max-w-lg mx-auto bg-white p-6 rounded-lg  space-y-4"
  >
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-1"> email:</label>
      <input
        type="email"
        name="email"
        required
        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#e9bc64]"
        placeholder="you@example.com"
      >
    </div>

    <div>
      <label class="block text-sm font-medium text-gray-700 mb-1">Your message:</label>
      <textarea
        name="message"
        required
        rows="4"
        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#e9bc64]"
        placeholder="Write your message here..."
      ></textarea>
    </div>

    <button
      type="submit"
      class="bg-[#e9bc64] text-white px-6 py-2 rounded-md hover:bg-[#f6c25c] transition-colors"
    >
      Send
    </button>

    <!-- Confirmation Message -->
    <p id="formStatus" class="text-sm text-green-600 mt-4 hidden">Thanks! Your message has been sent.</p>
  </form>
</div>

<!-- JavaScript -->
<script>
  function toggleContactForm() {
    const form = document.getElementById('contactForm');
    form.classList.toggle('hidden');
  }

  document.getElementById('customContactForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);
    const statusMessage = document.getElementById('formStatus');

    try {
      const response = await fetch('https://formspree.io/f/xpwrpngk', {
        method: 'POST',
        body: formData,
        headers: {
          'Accept': 'application/json'
        }
      });

      if (response.ok) {
        form.reset();
        statusMessage.classList.remove('hidden');
        statusMessage.textContent = "Thanks! Your message has been sent.";
      } else {
        statusMessage.classList.remove('hidden');
        statusMessage.textContent = "Oops! Something went wrong.";
        statusMessage.classList.add('text-red-600');
      }
    } catch (error) {
      statusMessage.classList.remove('hidden');
      statusMessage.textContent = "Error submitting form. Try again later.";
      statusMessage.classList.add('text-red-600');
    }
  });
</script>


                </div>
                <!--End Col-->
                <div class="lg:mx-auto text-left ">
                    <h4 class="text-lg text-gray-900 font-medium mb-7">Quick links</h4>
                    <ul class="text-sm  transition-all duration-500">
                        <li class="mb-6"><a href=""  class="text-gray-600 hover:text-gray-900">Home</a></li>
                        <li class="mb-6"><a href="#Our_Services"  class=" text-gray-600 hover:text-gray-900">Our Services</a></li>
                        <li class="mb-6"><a href="#Our_Team"  class=" text-gray-600 hover:text-gray-900">Our Team</a></li>
                        <li><a href="#Our_Projects"  class=" text-gray-600 hover:text-gray-900">Our Projects</a></li>
                    </ul>
                </div>
                <!--End Col-->
                <div class="lg:mx-auto text-left ">
                    <h4 class="text-lg text-gray-900 font-medium mb-7">Address</h4>
                    <ul class="text-sm  transition-all duration-500">
                        <li class="mb-6"><a href="javascript:;"  class="text-gray-600 hover:text-gray-900">Jordan</a></li>
                        <li class="mb-6"><a href="javascript:;"  class=" text-gray-600 hover:text-gray-900">KSA</a></li>

                    </ul>
                </div>
                <!--End Col-->
                <div class="lg:mx-auto text-left">
                    <h4 class="text-lg text-gray-900 font-medium mb-7">Mobile</h4>
                    <ul class="text-sm  transition-all duration-500">
                        <li class="mb-6"><a href="javascript:;"  class="text-gray-600 hover:text-gray-900">Jordan: +962 798984004</a></li>
                        <li class="mb-6"><a href="javascript:;"  class=" text-gray-600 hover:text-gray-900">Jordan: +962 6523472</a></li>
                    </ul>
                </div>
                <!--End Col-->
                <div class="lg:mx-auto text-left">
                    <h4 class="text-lg text-gray-900 font-medium mb-7">Email</h4>
                    <ul class="text-sm  transition-all duration-500">
                        <li class="mb-6"><a href="javascript:;"  class=" text-gray-600 hover:text-gray-900">E-MAIL: INFO@AW-ENGINEERING.NET</a></li>
                    </ul>
                </div>
            </div>
            <!--Grid-->
            <div class="py-7 border-t border-gray-200">
                <div class="flex items-center justify-center flex-col lg:justify-between lg:flex-row">
                    <span class="text-sm text-gray-500 ">©<a>AWEngeering</a> 2025, All rights reserved.</span>
                    <div class="flex mt-4 space-x-4 sm:justify-center lg:mt-0 ">
                        <a href="javascript:;"  class="w-9 h-9 rounded-full bg-gray-700 flex justify-center items-center hover:bg-indigo-600">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <g id="Social Media">
                            <path id="Vector" d="M11.3214 8.93666L16.4919 3.05566H15.2667L10.7772 8.16205L7.1914 3.05566H3.05566L8.47803 10.7774L3.05566 16.9446H4.28097L9.022 11.552L12.8088 16.9446H16.9446L11.3211 8.93666H11.3214ZM9.64322 10.8455L9.09382 10.0765L4.72246 3.95821H6.60445L10.1322 8.8959L10.6816 9.66481L15.2672 16.083H13.3852L9.64322 10.8458V10.8455Z" fill="white"/>
                            </g>
                          </svg>
                        </a>
                        <a href="javascript:;"  class="w-9 h-9 rounded-full bg-gray-700 flex justify-center items-center hover:bg-indigo-900">
                            <svg class="w-[1.25rem] h-[1.125rem] text-white" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.70975 7.93663C4.70975 6.65824 5.76102 5.62163 7.0582 5.62163C8.35537 5.62163 9.40721 6.65824 9.40721 7.93663C9.40721 9.21502 8.35537 10.2516 7.0582 10.2516C5.76102 10.2516 4.70975 9.21502 4.70975 7.93663ZM3.43991 7.93663C3.43991 9.90608 5.05982 11.5025 7.0582 11.5025C9.05658 11.5025 10.6765 9.90608 10.6765 7.93663C10.6765 5.96719 9.05658 4.37074 7.0582 4.37074C5.05982 4.37074 3.43991 5.96719 3.43991 7.93663ZM9.97414 4.22935C9.97408 4.39417 10.0236 4.55531 10.1165 4.69239C10.2093 4.82946 10.3413 4.93633 10.4958 4.99946C10.6503 5.06259 10.8203 5.07916 10.9844 5.04707C11.1484 5.01498 11.2991 4.93568 11.4174 4.81918C11.5357 4.70268 11.6163 4.55423 11.649 4.39259C11.6817 4.23095 11.665 4.06339 11.6011 3.91109C11.5371 3.7588 11.4288 3.6286 11.2898 3.53698C11.1508 3.44536 10.9873 3.39642 10.8201 3.39635H10.8197C10.5955 3.39646 10.3806 3.48424 10.222 3.64043C10.0635 3.79661 9.97434 4.00843 9.97414 4.22935ZM4.21142 13.5892C3.52442 13.5584 3.15101 13.4456 2.90286 13.3504C2.57387 13.2241 2.33914 13.0738 2.09235 12.8309C1.84555 12.588 1.69278 12.3569 1.56527 12.0327C1.46854 11.7882 1.3541 11.4201 1.32287 10.7431C1.28871 10.0111 1.28189 9.79119 1.28189 7.93669C1.28189 6.08219 1.28927 5.86291 1.32287 5.1303C1.35416 4.45324 1.46944 4.08585 1.56527 3.84069C1.69335 3.51647 1.84589 3.28513 2.09235 3.04191C2.3388 2.79869 2.57331 2.64813 2.90286 2.52247C3.1509 2.42713 3.52442 2.31435 4.21142 2.28358C4.95417 2.24991 5.17729 2.24319 7.0582 2.24319C8.9391 2.24319 9.16244 2.25047 9.90582 2.28358C10.5928 2.31441 10.9656 2.42802 11.2144 2.52247C11.5434 2.64813 11.7781 2.79902 12.0249 3.04191C12.2717 3.2848 12.4239 3.51647 12.552 3.84069C12.6487 4.08513 12.7631 4.45324 12.7944 5.1303C12.8285 5.86291 12.8354 6.08219 12.8354 7.93669C12.8354 9.79119 12.8285 10.0105 12.7944 10.7431C12.7631 11.4201 12.6481 11.7881 12.552 12.0327C12.4239 12.3569 12.2714 12.5882 12.0249 12.8309C11.7784 13.0736 11.5434 13.2241 11.2144 13.3504C10.9663 13.4457 10.5928 13.5585 9.90582 13.5892C9.16306 13.6229 8.93994 13.6296 7.0582 13.6296C5.17645 13.6296 4.95395 13.6229 4.21142 13.5892ZM4.15307 1.03424C3.40294 1.06791 2.89035 1.18513 2.4427 1.3568C1.9791 1.53408 1.58663 1.77191 1.19446 2.1578C0.802277 2.54369 0.56157 2.93108 0.381687 3.38797C0.207498 3.82941 0.0885535 4.3343 0.0543922 5.07358C0.0196672 5.81402 0.0117188 6.05074 0.0117188 7.93663C0.0117188 9.82252 0.0196672 10.0592 0.0543922 10.7997C0.0885535 11.539 0.207498 12.0439 0.381687 12.4853C0.56157 12.9419 0.802334 13.3297 1.19446 13.7155C1.58658 14.1012 1.9791 14.3387 2.4427 14.5165C2.89119 14.6881 3.40294 14.8054 4.15307 14.839C4.90479 14.8727 5.1446 14.8811 7.0582 14.8811C8.9718 14.8811 9.212 14.8732 9.96332 14.839C10.7135 14.8054 11.2258 14.6881 11.6737 14.5165C12.137 14.3387 12.5298 14.1014 12.9219 13.7155C13.3141 13.3296 13.5543 12.9419 13.7347 12.4853C13.9089 12.0439 14.0284 11.539 14.062 10.7997C14.0962 10.0587 14.1041 9.82252 14.1041 7.93663C14.1041 6.05074 14.0962 5.81402 14.062 5.07358C14.0278 4.33424 13.9089 3.82913 13.7347 3.38797C13.5543 2.93135 13.3135 2.5443 12.9219 2.1578C12.5304 1.7713 12.137 1.53408 11.6743 1.3568C11.2258 1.18513 10.7135 1.06735 9.96388 1.03424C9.21256 1.00058 8.97236 0.992188 7.05876 0.992188C5.14516 0.992188 4.90479 1.00002 4.15307 1.03424Z" fill="currentColor"/>
                                </svg>

                        </a>
                        <a href="javascript:;"  class="w-9 h-9 rounded-full bg-gray-700 flex justify-center items-center hover:bg-indigo-600">
                            <svg class="w-[1rem] h-[1rem] text-white" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.8794 11.5527V3.86835H0.318893V11.5527H2.87967H2.8794ZM1.59968 2.81936C2.4924 2.81936 3.04817 2.2293 3.04817 1.49188C3.03146 0.737661 2.4924 0.164062 1.61666 0.164062C0.74032 0.164062 0.167969 0.737661 0.167969 1.49181C0.167969 2.22923 0.723543 2.8193 1.5829 2.8193H1.59948L1.59968 2.81936ZM4.29668 11.5527H6.85698V7.26187C6.85698 7.03251 6.87369 6.80255 6.94134 6.63873C7.12635 6.17968 7.54764 5.70449 8.25514 5.70449C9.18141 5.70449 9.55217 6.4091 9.55217 7.44222V11.5527H12.1124V7.14672C12.1124 4.78652 10.8494 3.68819 9.16483 3.68819C7.78372 3.68819 7.17715 4.45822 6.84014 4.98267H6.85718V3.86862H4.29681C4.33023 4.5895 4.29661 11.553 4.29661 11.553L4.29668 11.5527Z" fill="currentColor"/>
                                </svg>

                        </a>
                        <a href="javascript:;"  class="w-9 h-9 rounded-full bg-gray-700 flex justify-center items-center hover:bg-indigo-600">
                            <svg class="w-[1.25rem] h-[0.875rem] text-white" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M13.9346 1.13529C14.5684 1.30645 15.0665 1.80588 15.2349 2.43896C15.5413 3.58788 15.5413 5.98654 15.5413 5.98654C15.5413 5.98654 15.5413 8.3852 15.2349 9.53412C15.0642 10.1695 14.5661 10.669 13.9346 10.8378C12.7886 11.1449 8.19058 11.1449 8.19058 11.1449C8.19058 11.1449 3.59491 11.1449 2.44657 10.8378C1.81277 10.6666 1.31461 10.1672 1.14622 9.53412C0.839844 8.3852 0.839844 5.98654 0.839844 5.98654C0.839844 5.98654 0.839844 3.58788 1.14622 2.43896C1.31695 1.80353 1.81511 1.30411 2.44657 1.13529C3.59491 0.828125 8.19058 0.828125 8.19058 0.828125C8.19058 0.828125 12.7886 0.828125 13.9346 1.13529ZM10.541 5.98654L6.72178 8.19762V3.77545L10.541 5.98654Z" fill="currentColor"/>
                            </svg>

                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
