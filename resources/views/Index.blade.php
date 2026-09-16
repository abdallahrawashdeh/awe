<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>AW eng</title>


    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/awdlogo.png') }}" type="image/png">

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


<div class="w-full mt-0 bg-white  shadow-2xl p-5 md:p-5 lg:p-20 animate-fadeInUp relative overflow-hidden transition-all duration-500 hover:shadow-[0_20px_70px_-10px_rgba(233,188,100,0.3)] border border-transparent hover:border-[#e9bc64]/20">

  <!-- Modern Gradient Accent Line (top) -->
  <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-r from-[#e9bc64] via-amber-300 to-[#e9bc64] bg-[length:200%_auto] animate-[shimmer_3s_linear_infinite]"></div>

  <!-- Subtle background pattern (modern touch) -->
  <div class="absolute -right-20 -top-20 w-72 h-72 bg-[#e9bc64]/5 rounded-full blur-3xl pointer-events-none"></div>
  <div class="absolute -left-20 -bottom-20 w-64 h-64 bg-amber-100/30 rounded-full blur-3xl pointer-events-none"></div>

  <!-- Header with icon & modern badge -->
  <div class="relative z-10 flex flex-wrap items-center gap-3 mb-5">
    <div class="flex items-center gap-3">
      <span class="text-3xl md:text-4xl text-[#e9bc64]">
        <i class="fas fa-cogs"></i>
      </span>
      <h3 class="text-3xl md:text-4xl font-extrabold text-gray-800 tracking-tight">
        Advanced Works <span class="text-[#e9bc64]">Engineering</span>
      </h3>
    </div>
    <span class="ml-auto text-xs font-semibold uppercase tracking-wider bg-[#e9bc64]/10 text-[#b8963c] px-4 py-1.5 rounded-full border border-[#e9bc64]/20 shadow-sm backdrop-blur-sm">
      <i class="fas fa-star mr-1.5 text-[#e9bc64]"></i> Since 2016
    </span>
  </div>

  <!-- Divider with gradient + animation -->
  <div class="relative z-10 w-full h-0.5 mb-6 bg-gradient-to-r from-[#e9bc64]/60 via-[#e9bc64] to-[#e9bc64]/20 rounded-full overflow-hidden">
    <div class="absolute inset-0 w-1/3 bg-white/30 blur-sm animate-pulse"></div>
  </div>

  <!-- Description with smooth expand/collapse and modern typography -->
  <p id="description" class="relative z-10 text-gray-700 leading-relaxed text-base md:text-lg overflow-hidden transition-[max-height,opacity,transform] duration-700 ease-[cubic-bezier(0.22,1,0.36,1)] max-h-20 [&.expanded]:max-h-[1200px] [&.expanded]:opacity-100 [&.expanded]:translate-y-0 opacity-100 translate-y-0">
    <span class="font-medium text-[#e9bc64]">Welcome to Advanced Works Engineering Company</span>, Established in2016,our engineering firm is a comprehensive provider of all engineering disciplines.
    
    With a dedicated team of professionals, we offer a wide range of engineering services to meet the needs of our clients.    
    Our commitment to excellence and innovation sets us apart, and we take pride in delivering high-quality solutions across various engineering sectors.

    <br><br>

 Advanced Works Design Company where we are dedicated to providing comprehensive engineering services to our clients, including property developers, project owners, and contractors. Our company was established with the mission of advancing engineering practices and enhancing quality standards in the engineering sector. We leverage our extensive experience and knowledge to serve our clients, with a carefully selected team of highly skilled engineers aligned with our vision to position our company among the top-tier firms in the field. We strive for excellence and innovation in every project we undertake, ensuring our clients' success and achieving their goals efficiently and professionally. In summary, we are your ideal partner for all engineering service needs, and we are committed to delivering the best

  </p>


  <!-- Modern Read More / Read Less button with glow & micro-interactions -->
  <button id="toggleBtn" onclick="toggleText()" class="relative z-10 mt-8 group flex items-center gap-2 px-7 py-3.5 bg-[#e9bc64] text-white font-semibold rounded-xl shadow-lg shadow-[#e9bc64]/30 hover:shadow-[#e9bc64]/50 transition-all duration-300 hover:scale-[1.02] active:scale-[0.97] border border-[#e9bc64]/40 overflow-hidden">
    <!-- button background shimmer effect -->
    <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/10 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-700"></span>

    <span id="btnText" class="relative flex items-center gap-2">
      <i class="fas fa-chevron-down text-sm transition-transform duration-300 group-hover:rotate-180" id="btnIcon"></i>
      Read More
    </span>
    <span class="relative w-5 h-5 rounded-full bg-white/15 flex items-center justify-center text-[10px] transition-all duration-300 group-hover:bg-white/30">
      <i class="fas fa-arrow-right"></i>
    </span>
  </button>

  <!-- Decorative corner accent (modern) -->
  <div class="absolute bottom-4 right-4 w-16 h-16 border-r-2 border-b-2 border-[#e9bc64]/10 rounded-br-2xl pointer-events-none"></div>
  <div class="absolute top-4 left-4 w-12 h-12 border-l-2 border-t-2 border-[#e9bc64]/10 rounded-tl-2xl pointer-events-none"></div>
</div>

<script>
  function toggleText() {
    const para = document.getElementById("description");
    const btnText = document.getElementById("btnText");
    const btnIcon = document.getElementById("btnIcon");

    // Toggle expanded class on paragraph (clean, no inline style manipulation)
    const isExpanded = para.classList.contains("expanded");

    if (isExpanded) {
      para.classList.remove("expanded");
      btnText.innerHTML = `<i class="fas fa-chevron-down text-sm transition-transform duration-300"></i> Read More`;
      // re-add icon reference
      const newIcon = btnText.querySelector("i");
      if (newIcon) newIcon.id = "btnIcon";
    } else {
      para.classList.add("expanded");
      btnText.innerHTML = `<i class="fas fa-chevron-up text-sm transition-transform duration-300"></i> Read Less`;
      const newIcon = btnText.querySelector("i");
      if (newIcon) newIcon.id = "btnIcon";
    }
  }

  // Ensure initial icon is set correctly (in case of re-render)
  document.addEventListener("DOMContentLoaded", function() {
    const btnText = document.getElementById("btnText");
    if (btnText && !btnText.querySelector("i")) {
      btnText.innerHTML = `<i class="fas fa-chevron-down text-sm transition-transform duration-300" id="btnIcon"></i> Read More`;
    }
  });
</script>

<style>
  /* keep your original fadeInUp + add shimmer used in accent */
  @keyframes fadeInUp {
    0% {
      opacity: 0;
      transform: translateY(24px) scale(0.98);
    }
    100% {
      opacity: 1;
      transform: translateY(0) scale(1);
    }
  }

  @keyframes shimmer {
    0% {
      background-position: -200% center;
    }
    100% {
      background-position: 200% center;
    }
  }

  .animate-fadeInUp {
    animation: fadeInUp 0.7s cubic-bezier(0.23, 1, 0.32, 1) forwards;
    opacity: 0;
  }

  /* smooth expand/collapse with easing */
  #description {
    transition: max-height 0.65s cubic-bezier(0.22, 1, 0.36, 1),
                opacity 0.4s ease,
                transform 0.4s ease;
    transform-origin: top center;
  }

  #description.expanded {
    max-height: 1200px;
    opacity: 1;
    transform: translateY(0);
  }

  /* button hover extra glow */
  #toggleBtn {
    transition: all 0.3s cubic-bezier(0.22, 1, 0.36, 1);
  }

  #toggleBtn:hover {
    box-shadow: 0 12px 30px -8px rgba(233, 188, 100, 0.6);
  }

  /* better text selection */
  ::selection {
    background: #e9bc64;
    color: #1e293b;
  }
</style>

  <!------------------------------------------------------------------------------------>



{{-- <div class="w-full bg-gradient-to-br from-gray-50 to-white py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-8xl mx-auto">
        <!-- Card Container -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-1">
            <div class="flex flex-col lg:flex-row items-center lg:items-stretch">
                <!-- Image Section - Much Larger -->
                <div class="relative lg:w-2/5 p-6 lg:p-0 bg-gradient-to-br from-[#f8f5ec] to-[#fdfbf5] flex items-center justify-center">
                    <div class="relative w-full h-full flex items-center justify-center">
                        <!-- Decorative background elements -->
                        <div class="absolute top-1/4 -left-8 w-48 h-48 bg-[#e8bb5b]/10 rounded-full blur-xl"></div>
                        <div class="absolute bottom-1/4 -right-8 w-40 h-40 bg-[#e8bb5b]/5 rounded-full blur-xl"></div>

                        <!-- Main Image - Much Larger -->
                        <div class="relative z-10 p-4 lg:p-8">
                            <img src="{{ asset('images/adelimg.png') }}" alt="Eng. Adel"
                                class="w-64 h-64 md:w-80 md:h-80 lg:w-96 lg:h-96 rounded-full object-cover border-8 border-white shadow-2xl mx-auto" />

                            <!-- Floating Badge on Image -->
                            <div class="absolute -bottom-4 right-8 lg:right-16 bg-white rounded-2xl shadow-lg px-6 py-3 border border-gray-200">
                                <div class="flex items-center gap-2">
                                    <div class="w-10 h-10 bg-[#e8bb5b] rounded-full flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500">Leading</p>
                                        <p class="font-bold text-gray-900">AW Company</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Text Section - Slightly Narrower to accommodate larger image -->
                <div class="lg:w-3/5 p-8 lg:p-12 flex flex-col justify-center">
                    <!-- Title & Position -->
                    <div class="mb-6">
                        <div class="inline-flex items-center gap-3 mb-4 bg-[#e8bb5b]/10 px-4 py-2 rounded-full">
                            <span class="text-sm font-semibold text-[#b89430] uppercase tracking-wider">Visionary Leader</span>
                        </div>
                        <h1 class="text-4xl lg:text-5xl xl:text-6xl font-bold text-gray-900 leading-tight">
                            Eng. <span class="text-[#e8bb5b]">Adel</span>
                        </h1>
                        <div class="flex items-center gap-3 mt-4">
                            <div class="h-2 w-16 bg-gradient-to-r from-[#e8bb5b] to-[#d4a84c] rounded-full"></div>
                            <p class="text-xl lg:text-2xl text-gray-600 font-medium">Founder & General Manager</p>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mb-8">
                        <p class="text-gray-700 leading-relaxed text-lg lg:text-xl">
                            A distinguished leader with an unwavering commitment to innovation and excellence. With over 15 years of pioneering experience, Eng. Adel has transformed industry standards through visionary solutions that empower organizations and inspire exceptional team performance. His strategic acumen continues to propel AW Company to new heights of success and industry leadership.
                        </p>
                    </div>

                    <!-- Stats/Highlights -->
                    <div class="mb-10">
                        <div class="grid grid-cols-2 lg:grid-cols-3 gap-6">
                            <div class="bg-gradient-to-br from-gray-50 to-white p-5 rounded-xl border border-gray-200">
                                <p class="text-3xl font-bold text-[#e8bb5b] mb-1">15+</p>
                                <p class="text-sm text-gray-600 font-medium">Years of Excellence</p>
                            </div>
                            <div class="bg-gradient-to-br from-gray-50 to-white p-5 rounded-xl border border-gray-200">
                                <p class="text-3xl font-bold text-[#e8bb5b] mb-1">200+</p>
                                <p class="text-sm text-gray-600 font-medium">Successful Projects</p>
                            </div>
                            <div class="bg-gradient-to-br from-gray-50 to-white p-5 rounded-xl border border-gray-200 col-span-2 lg:col-span-1">
                                <p class="text-3xl font-bold text-[#e8bb5b] mb-1">100%</p>
                                <p class="text-sm text-gray-600 font-medium">Client Satisfaction</p>
                            </div>
                        </div>
                    </div>

                    <!-- Expertise Tags -->
                    <div class="mb-10">
                        <p class="text-gray-700 font-semibold mb-3">Core Expertise:</p>
                        <div class="flex flex-wrap gap-3">
                            <span class="px-4 py-2 bg-[#e8bb5b]/10 text-[#b89430] rounded-full text-sm font-medium">Strategic Leadership</span>
                            <span class="px-4 py-2 bg-[#e8bb5b]/10 text-[#b89430] rounded-full text-sm font-medium">Business Innovation</span>
                            <span class="px-4 py-2 bg-[#e8bb5b]/10 text-[#b89430] rounded-full text-sm font-medium">Team Development</span>
                            <span class="px-4 py-2 bg-[#e8bb5b]/10 text-[#b89430] rounded-full text-sm font-medium">Digital Transformation</span>
                        </div>
                    </div>

                    <!-- CTA Button -->
                    <div class="pt-6 border-t border-gray-200">
                        <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                            <div class="flex items-center gap-3 text-gray-600">
                                <svg class="w-5 h-5 text-[#e8bb5b]" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                                </svg>
                                <span>adel@awcompany.com</span>
                            </div>
                            <a href="#" class="group relative inline-flex items-center justify-center px-8 py-3 bg-gradient-to-r from-[#e8bb5b] to-[#d4a84c] text-white font-semibold rounded-lg hover:shadow-lg transition-all duration-300 overflow-hidden">
                                <span class="relative z-10">Schedule a Meeting</span>
                                <div class="absolute inset-0 bg-gradient-to-r from-[#d4a84c] to-[#e8bb5b] opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                <svg class="w-5 h-5 ml-2 relative z-10 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Inspirational Quote -->
        <div class="mt-12 text-center max-w-3xl mx-auto">
            <div class="relative">
                <svg class="w-12 h-12 text-[#e8bb5b]/20 mx-auto mb-4" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                </svg>
                <p class="text-2xl text-gray-700 italic font-light leading-relaxed">
                    "True leadership is not about being in charge. It's about taking care of those in your charge and innovating for their success."
                </p>
                <p class="mt-4 text-gray-500 font-medium">— Eng. Adel</p>
            </div>
        </div>
    </div>
</div> --}}

<div class="w-full bg-gradient-to-br from-gray-50 to-white py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-8xl mx-auto">
        <!-- Card Container -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-1">
            <div class="flex flex-col lg:flex-row items-center lg:items-stretch">
                <!-- Image Section - Much Larger -->
                <div class="relative lg:w-2/5 p-6 lg:p-0 bg-gradient-to-br from-[#f8f5ec] to-[#fdfbf5] flex items-center justify-center">
                    <div class="relative w-full h-full flex items-center justify-center">
                        <!-- Decorative background elements -->
                        <div class="absolute top-1/4 -left-8 w-48 h-48 bg-[#e8bb5b]/10 rounded-full blur-xl"></div>
                        <div class="absolute bottom-1/4 -right-8 w-40 h-40 bg-[#e8bb5b]/5 rounded-full blur-xl"></div>

                        <!-- Main Image - Much Larger -->
                        <div class="relative z-10 p-4 lg:p-8">
                            @if($ceoInfo && $ceoInfo->ceo_image)
                                <img src="{{ asset('storage/' . $ceoInfo->ceo_image) }}" alt="{{ $ceoInfo->ceo_name ?? 'CEO' }}"
                                    class="w-64 h-64 md:w-80 md:h-80 lg:w-96 lg:h-96 rounded-full object-cover border-8 border-white shadow-2xl mx-auto" />
                            @else
                                <img src="{{ asset('images/adelimg.png') }}" alt="Eng. Adel"
                                    class="w-64 h-64 md:w-80 md:h-80 lg:w-96 lg:h-96 rounded-full object-cover border-8 border-white shadow-2xl mx-auto" />
                            @endif

                            <!-- Floating Badge on Image -->
                            <div class="absolute -bottom-4 right-8 lg:right-16 bg-white rounded-2xl shadow-lg px-6 py-3 border border-gray-200">
                                <div class="flex items-center gap-2">
                                    <div class="w-10 h-10 bg-[#e8bb5b] rounded-full flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500">Leading</p>
                                        <p class="font-bold text-gray-900">{{ $ceoInfo->company_name ?? 'AW Company' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Text Section - Slightly Narrower to accommodate larger image -->
                <div class="lg:w-3/5 p-8 lg:p-12 flex flex-col justify-center">
                    <!-- Title & Position -->
                    <div class="mb-6">
                        <div class="inline-flex items-center gap-3 mb-4 bg-[#e8bb5b]/10 px-4 py-2 rounded-full">
                            <span class="text-sm font-semibold text-[#b89430] uppercase tracking-wider">Visionary Leader</span>
                        </div>
                        <h1 class="text-4xl lg:text-5xl xl:text-6xl font-bold text-gray-900 leading-tight">
                            {{ $ceoInfo->ceo_name ?? 'Eng. Adel' }}
                        </h1>
                        <div class="flex items-center gap-3 mt-4">
                            <div class="h-2 w-16 bg-gradient-to-r from-[#e8bb5b] to-[#d4a84c] rounded-full"></div>
                            <p class="text-xl lg:text-2xl text-gray-600 font-medium">{{ $ceoInfo->ceo_title ?? 'Founder & General Manager' }}</p>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mb-8">
                        <p class="text-gray-700 leading-relaxed text-lg lg:text-xl">
                            {{ $ceoInfo->ceo_content ?? 'A distinguished leader with an unwavering commitment to innovation and excellence. With over 15 years of pioneering experience, Eng. Adel has transformed industry standards through visionary solutions that empower organizations and inspire exceptional team performance. His strategic acumen continues to propel AW Company to new heights of success and industry leadership.' }}
                        </p>
                    </div>

                    <!-- Stats/Highlights -->
                    <div class="mb-10">
                        <div class="grid grid-cols-2 lg:grid-cols-3 gap-6">
                            <div class="bg-gradient-to-br from-gray-50 to-white p-5 rounded-xl border border-gray-200">
                                <p class="text-3xl font-bold text-[#e8bb5b] mb-1">{{ $ceoInfo->ceo_years ?? '15' }}+</p>
                                <p class="text-sm text-gray-600 font-medium">Years of Excellence</p>
                            </div>
                            <div class="bg-gradient-to-br from-gray-50 to-white p-5 rounded-xl border border-gray-200">
                                <p class="text-3xl font-bold text-[#e8bb5b] mb-1">{{ $ceoInfo->ceo_projects ?? '200' }}+</p>
                                <p class="text-sm text-gray-600 font-medium">Successful Projects</p>
                            </div>
                            <div class="bg-gradient-to-br from-gray-50 to-white p-5 rounded-xl border border-gray-200 col-span-2 lg:col-span-1">
                                <p class="text-3xl font-bold text-[#e8bb5b] mb-1">{{ $ceoInfo->ceo_client_satisfaction ?? '100' }}%</p>
                                <p class="text-sm text-gray-600 font-medium">Client Satisfaction</p>
                            </div>
                        </div>
                    </div>

                    <!-- Expertise Tags -->
                    {{-- <div class="mb-10">
                        <p class="text-gray-700 font-semibold mb-3">Core Expertise:</p>
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
                            @else
                                <span class="px-4 py-2 bg-[#e8bb5b]/10 text-[#b89430] rounded-full text-sm font-medium">Strategic Leadership</span>
                                <span class="px-4 py-2 bg-[#e8bb5b]/10 text-[#b89430] rounded-full text-sm font-medium">Business Innovation</span>
                                <span class="px-4 py-2 bg-[#e8bb5b]/10 text-[#b89430] rounded-full text-sm font-medium">Team Development</span>
                                <span class="px-4 py-2 bg-[#e8bb5b]/10 text-[#b89430] rounded-full text-sm font-medium">Digital Transformation</span>
                            @endif
                        </div>
                    </div> --}}

                    <!-- CTA Button -->
                    <div class="pt-6 border-t border-gray-200">
                        <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                            <div class="flex items-center gap-3 text-gray-600">
                                <svg class="w-5 h-5 text-[#e8bb5b]" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                                </svg>
                                <span>{{ $ceoInfo->ceo_email ?? 'adel@awcompany.com' }}</span>
                            </div>
                            <a href="#" class="group relative inline-flex items-center justify-center px-8 py-3 bg-gradient-to-r from-[#e8bb5b] to-[#d4a84c] text-white font-semibold rounded-lg hover:shadow-lg transition-all duration-300 overflow-hidden">
                                <span class="relative z-10">Schedule a Meeting</span>
                                <div class="absolute inset-0 bg-gradient-to-r from-[#d4a84c] to-[#e8bb5b] opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                <svg class="w-5 h-5 ml-2 relative z-10 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Inspirational Quote -->
        <div class="mt-12 text-center max-w-3xl mx-auto">
            <div class="relative">
                <svg class="w-12 h-12 text-[#e8bb5b]/20 mx-auto mb-4" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                </svg>
                <p class="text-2xl text-gray-700 italic font-light leading-relaxed">
                    {{ $ceoInfo->ceo_quote ?? '"True leadership is not about being in charge. It\'s about taking care of those in your charge and innovating for their success."' }}
                </p>
                <p class="mt-4 text-gray-500 font-medium">— {{ $ceoInfo->ceo_name ?? 'Eng. Adel' }}</p>
            </div>
        </div>
    </div>
</div>
<!-- CEO Section - Add this anywhere in your Index.blade.php -->

        <!-- First Nav (not sticky) -->




    <!-- Counter Section -->
<section
    class="py-16 bg-cover bg-center bg-no-repeat"
    style="background-image: url('{{ asset('images/earthbackground.jpg') }}'); background-attachment: fixed; min-height: 220px;">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 overflow-x-auto">
        <div class="flex flex-nowrap gap-6 min-w-max">
            <!-- Total Projects -->
            <div class="counter-box bg-black/60 rounded-lg shadow-md p-6 flex items-center space-x-4 w-64 shrink-0">
                <i data-feather="folder" class="text-blue-500 w-10 h-10"></i>
                <div>
                    <p class="text-white font-medium">Total Projects</p>
                    <p class="text-2xl font-bold text-blue-600 counter"
                       data-target="{{ $totals->total_projects ?? 0 }}">
                        {{ number_format($totals->total_projects ?? 0) }}
                    </p>
                </div>
            </div>

            <!-- Total Clients -->
            <div class="counter-box bg-black/60 rounded-lg shadow-md p-6 flex items-center space-x-4 w-64 shrink-0">
                <i data-feather="users" class="text-green-500 w-10 h-10"></i>
                <div>
                    <p class="text-white font-medium">Total Clients</p>
                    <p class="text-2xl font-bold text-green-600 counter"
                       data-target="{{ $totals->total_clients ?? 0 }}">
                        {{ number_format($totals->total_clients ?? 0) }}
                    </p>
                </div>
            </div>

            <!-- Total Employees -->
            <div class="counter-box bg-black/60 rounded-lg shadow-md p-6 flex items-center space-x-4 w-64 shrink-0">
                <i data-feather="user-check" class="text-purple-500 w-10 h-10"></i>
                <div>
                    <p class="text-white font-medium">Total Employees</p>
                    <p class="text-2xl font-bold text-purple-600 counter"
                       data-target="{{ $totals->total_employees ?? 0 }}">
                        {{ number_format($totals->total_employees ?? 0) }}
                    </p>
                </div>
            </div>

            <!-- Total Countries -->
            <div class="counter-box bg-black/60 rounded-lg shadow-md p-6 flex items-center space-x-4 w-64 shrink-0">
                <i data-feather="globe" class="text-red-500 w-10 h-10"></i>
                <div>
                    <p class="text-white font-medium">Total Countries</p>
                    <p class="text-2xl font-bold text-red-600 counter"
                       data-target="{{ $totals->total_countries ?? 0 }}">
                        {{ number_format($totals->total_countries ?? 0) }}
                    </p>
                </div>
            </div>

            <!-- Total Cities -->
            <div class="counter-box bg-black/60 rounded-lg shadow-md p-6 flex items-center space-x-4 w-64 shrink-0">
                <i data-feather="map-pin" class="text-yellow-500 w-10 h-10"></i>
                <div>
                    <p class="text-white font-medium">Total Cities</p>
                    <p class="text-2xl font-bold text-yellow-600 counter"
                       data-target="{{ $totals->total_cities ?? 0 }}">
                        {{ number_format($totals->total_cities ?? 0) }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Last Updated Indicator -->
        @if(isset($lastUpdated) && $lastUpdated)
            <div class="text-center text-white/70 text-sm mt-4">
                <i data-feather="clock" class="inline-block w-4 h-4 mr-1"></i>
                Last updated: {{ $lastUpdated->updated_at->format('F d, Y H:i') }}
            </div>
        @endif
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
        scrollbar-color: #e9bc64 #f1f1f1;
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
        const target = parseInt(el.getAttribute("data-target")) || 0;

        // If target is 0, just display 0
        if (target === 0) {
            el.textContent = '0';
            return;
        }

        const duration = 2000;
        const startTime = performance.now();
        const startValue = 0;

        const updateCounter = (timestamp) => {
            const elapsed = timestamp - startTime;
            const progress = Math.min(elapsed / duration, 1);
            const easeOutQuart = 1 - Math.pow(1 - progress, 4);
            const currentValue = Math.floor(startValue + (target - startValue) * easeOutQuart);

            el.textContent = currentValue.toLocaleString();

            if (progress < 1) {
                requestAnimationFrame(updateCounter);
            } else {
                el.textContent = target.toLocaleString();
            }
        };

        requestAnimationFrame(updateCounter);
    }

    // Wait for DOM to load
    document.addEventListener("DOMContentLoaded", () => {
        const counters = document.querySelectorAll(".counter");

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.3,
            rootMargin: '0px 0px -50px 0px'
        });

        counters.forEach(counter => observer.observe(counter));

        if (!('IntersectionObserver' in window)) {
            counters.forEach(counter => animateCounter(counter));
        }
    });
</script>






 <!-----------------------------------------hero------------------------------------------->


 <!----------------------------------------end of hero--------------------------------------->



<!-------------------------------------------------------------------------------------------------------->

   <style>
    /* ===== ENHANCED ANIMATIONS ===== */
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(30px) scale(0.97);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    @keyframes fadeSlideRight {
        0% {
            opacity: 0;
            transform: translateX(60px);
        }
        100% {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes pulseGlow {
        0% {
            box-shadow: 0 0 0 0 rgba(233, 188, 100, 0.3);
        }
        70% {
            box-shadow: 0 0 0 10px rgba(233, 188, 100, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(233, 188, 100, 0);
        }
    }

    .news-item {
        animation: slideIn 0.7s cubic-bezier(0.22, 1, 0.36, 1) forwards;
        opacity: 0;
    }

    .news-item:nth-child(1) {
        animation-delay: 0.1s;
    }
    .news-item:nth-child(2) {
        animation-delay: 0.3s;
    }
    .news-item:nth-child(3) {
        animation-delay: 0.5s;
    }
    .news-item:nth-child(4) {
        animation-delay: 0.7s;
    }

    .fade-slide-right {
        opacity: 0;
        transform: translateX(60px);
        transition: all 0.8s cubic-bezier(0.22, 1, 0.36, 1);
    }

    .fade-slide-right.is-visible {
        opacity: 1;
        transform: translateX(0);
    }

    /* Modern Card Hover Effects */
    .news-card {
        transition: all 0.4s cubic-bezier(0.22, 1, 0.36, 1);
        border: 1px solid transparent;
    }

    .news-card:hover {
        transform: translateY(-8px) scale(1.01);
        box-shadow: 0 20px 60px -12px rgba(0, 0, 0, 0.15), 0 0 0 1px rgba(233, 188, 100, 0.15);
        border-color: rgba(233, 188, 100, 0.2);
    }

    .news-card .image-wrapper {
        position: relative;
        overflow: hidden;
        transition: all 0.5s ease;
    }

    .news-card .image-wrapper img {
        transition: transform 0.6s cubic-bezier(0.22, 1, 0.36, 1);
    }

    .news-card:hover .image-wrapper img {
        transform: scale(1.05);
    }

    .news-card .image-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, transparent 40%, rgba(0, 0, 0, 0.2) 100%);
        pointer-events: none;
    }

    .news-card .badge {
        background: rgba(233, 188, 100, 0.95);
        backdrop-filter: blur(4px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: all 0.3s ease;
    }

    .news-card:hover .badge {
        background: #e9bc64;
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(233, 188, 100, 0.4);
    }

    /* Read More Button */
    .read-more-btn {
        position: relative;
        transition: all 0.3s ease;
        background: transparent;
        color: #e9bc64;
        font-weight: 600;
        padding: 0;
        border: none;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .read-more-btn::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 0%;
        height: 2px;
        background: #e9bc64;
        transition: width 0.3s cubic-bezier(0.22, 1, 0.36, 1);
    }

    .read-more-btn:hover::after {
        width: 100%;
    }

    .read-more-btn .arrow-icon {
        display: inline-block;
        transition: transform 0.3s ease;
    }

    .read-more-btn:hover .arrow-icon {
        transform: translateX(4px);
    }

    .read-more-btn.active .arrow-icon {
        transform: rotate(180deg);
    }

    /* View All Button */
    .view-all-btn {
        position: relative;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.22, 1, 0.36, 1);
        background: #e9bc64;
        border: none;
        color: #fff;
        font-weight: 600;
        padding: 14px 32px;
        border-radius: 12px;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        box-shadow: 0 4px 20px rgba(233, 188, 100, 0.3);
    }

    .view-all-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(233, 188, 100, 0.45);
        background: #d4a84a;
    }

    .view-all-btn:active {
        transform: translateY(0) scale(0.97);
    }

    .view-all-btn .btn-shimmer {
        position: absolute;
        inset: 0;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.15), transparent);
        transform: translateX(-100%);
        transition: transform 0.6s ease;
    }

    .view-all-btn:hover .btn-shimmer {
        transform: translateX(100%);
    }

    .view-all-btn svg {
        transition: transform 0.3s ease;
    }

    .view-all-btn:hover svg {
        transform: translateX(4px);
    }

    /* Section Divider */
    .section-divider {
        width: 80px;
        height: 4px;
        background: linear-gradient(90deg, #e9bc64, #f5d48a);
        border-radius: 4px;
        margin: 16px auto 0;
        position: relative;
    }

    .section-divider::after {
        content: '';
        position: absolute;
        width: 20px;
        height: 4px;
        background: #fff;
        border-radius: 4px;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        animation: pulseGlow 2s ease-in-out infinite;
    }

    /* Content transition */
    .news-content {
        transition: all 0.4s cubic-bezier(0.22, 1, 0.36, 1);
    }

    .news-content.hidden-content {
        display: none;
    }

    .date-badge {
        background: rgba(0, 0, 0, 0.04);
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        color: #666;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    /* Responsive fine-tune */
    @media (max-width: 640px) {
        .news-item {
            margin-left: 0 !important;
            margin-right: 0 !important;
        }
    }
</style>

<section class="max-w-6xl w-full mt-4 mx-auto py-12 px-4 sm:px-6 fade-slide-right" id="Latest_News">

    <!-- ===== Section Header ===== -->
    <div class="text-center mb-16 fade-slide-right">
        <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4 mt-10 tracking-tight">
            Latest <span class="text-[#e9bc64]">News</span>
        </h2>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">Stay updated with our most recent announcements and stories</p>
        <div class="section-divider"></div>
    </div>

    <!-- ===== News Grid ===== -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        @php use Illuminate\Support\Str; @endphp
        @foreach($news->sortByDesc('created_at')->take(3) as $item)
            @php
                $cleanContent = strip_tags($item->content);
                $isLong = strlen($cleanContent) > 150;
                $preview = $isLong ? Str::limit($cleanContent, 150, '...') : $cleanContent;
                $fullContent = $cleanContent;
            @endphp

            <div class="news-item bg-white rounded-2xl shadow-lg overflow-hidden news-card">

                <!-- Image -->
                <div class="image-wrapper h-52 overflow-hidden relative">
                    @if($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" class="w-full h-full object-cover" alt="{{ $item->title }}" loading="lazy" />
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-[#e9bc64]/20 to-[#e9bc64]/5 flex items-center justify-center text-gray-400">
                            <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                        </div>
                    @endif
                    <div class="image-overlay"></div>

                    <!-- Badge -->
                    <div class="absolute top-4 right-4 badge text-white text-xs font-semibold px-4 py-1.5 rounded-full shadow-lg backdrop-blur-sm">
                        {{ Str::limit($item->title, 20) }}
                    </div>
                </div>

                <!-- Content -->
                <div class="p-6">
                    <!-- Date -->
                    <div class="flex items-center text-sm text-gray-500 mb-3">
                        <span class="date-badge">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                            {{ $item->created_at->format('M j, Y') }}
                        </span>
                    </div>

                    <!-- Title -->
                    <h3 class="text-xl font-bold text-gray-900 mb-3 leading-snug line-clamp-2">{{ $item->subtitle }}</h3>

                    <!-- Preview -->
                    <p id="preview-{{ $item->id }}" class="text-gray-600 leading-relaxed text-sm news-content">
                        {{ $preview }}
                    </p>

                    <!-- Full content (hidden initially) -->
                    @if($isLong)
                        <p id="full-{{ $item->id }}" class="text-gray-700 leading-relaxed text-sm news-content hidden-content">
                            {{ $fullContent }}
                        </p>

                        <button onclick="toggleExpand({{ $item->id }})" class="read-more-btn mt-3 text-sm">
                            <span id="btnText-{{ $item->id }}">Read More</span>
                            <span class="arrow-icon">→</span>
                        </button>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    <!-- ===== View More Button ===== -->
    <div class="text-center mt-14">
        <a href="/allnews" class="view-all-btn relative">
            <span class="btn-shimmer"></span>
            <span>View All News</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
            </svg>
        </a>
    </div>

</section>

<script>
    // ===== Intersection Observer for fade-slide-right =====
    document.addEventListener('DOMContentLoaded', function() {
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.15 });

        document.querySelectorAll('.fade-slide-right').forEach(el => {
            observer.observe(el);
        });
    });

    // ===== Toggle Read More / Less =====
    function toggleExpand(id) {
        const preview = document.getElementById('preview-' + id);
        const full = document.getElementById('full-' + id);
        const btn = document.getElementById('btnText-' + id);
        const btnContainer = btn.closest('.read-more-btn');

        if (full.classList.contains('hidden-content')) {
            // Show full content
            full.classList.remove('hidden-content');
            preview.classList.add('hidden-content');
            btn.textContent = 'Show Less';
            btnContainer.classList.add('active');
        } else {
            // Show preview
            full.classList.add('hidden-content');
            preview.classList.remove('hidden-content');
            btn.textContent = 'Read More';
            btnContainer.classList.remove('active');
        }
    }
</script>

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
          class="relative overflow-hidden bg-white/10 hover:bg-white/15 text-white font-medium py-1 px-3 sm:py-2 sm:px-6 rounded-full transition-all duration-300 border border-white/20 hover:border-white/40 group text-xs sm:text-base"
        >
          <span class="relative z-10">OUR VISION</span>
          <span class="absolute inset-0 bg-gradient-to-r from-[#e9bc64] to-[#fabc40] opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-full"></span>
        </button>
        <button
          onclick="showPage('page2')"
          class="relative overflow-hidden bg-white/10 hover:bg-white/15 text-white font-medium py-1 px-3 sm:py-2 sm:px-6 rounded-full transition-all duration-300 border border-white/20 hover:border-white/40 group text-xs sm:text-base"
        >
          <span class="relative z-10">OUR MISSION</span>
          <span class="absolute inset-0 bg-gradient-to-r from-[#e9bc64] to-[#fabc40] opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-full"></span>
        </button>
        <button
          onclick="showPage('page3')"
          class="relative overflow-hidden bg-white/10 hover:bg-white/15 text-white font-medium py-1 px-3 sm:py-2 sm:px-6 rounded-full transition-all duration-300 border border-white/20 hover:border-white/40 group text-xs sm:text-base"
        >
          <span class="relative z-10">OUR VALUES</span>
          <span class="absolute inset-0 bg-gradient-to-r from-[#e9bc64] to-[#fabc40] opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-full"></span>
        </button>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div id="page1" class="hidden w-full max-w-4xl">
    <div class="backdrop-blur-lg bg-white/15 p-4 sm:p-8 rounded-3xl h-[550px] sm:h-[550px] shadow-2xl border border-white/30 text-center transition-all duration-500 transform hover:scale-[1.01]">
  <h1 class="text-2xl sm:text-4xl font-bold mb-4 sm:mb-6 text-white drop-shadow-md">OUR VISION</h1>

  <div class="grid grid-cols-1 gap-4 sm:gap-6 mt-6 sm:mt-12">
    <div class="w-full bg-white/10 p-4 sm:p-6 rounded-2xl border border-white/20 hover:bg-white/15 transition-all duration-300">
      <div class="text-2xl sm:text-3xl mb-2 sm:mb-3">🏗️</div>
      <p class="text-sm sm:text-base font-semibold text-white leading-relaxed max-w-3xl mx-auto">
        Our engineering firm aspires to establish itself as a prominent player in the market, providing innovative and high-quality engineering solutions. We aim to become a leading engineering firm known for our commitment to excellence, reliability, and customer satisfaction. By leveraging our expertise across all engineering disciplines, we seek to consistently deliver exceptional results and build lasting relationships with our clients. Our vision is to be at the forefront of driving technological advancements and setting new industry standards.
      </p>
    </div>
  </div>
</div>
  </div>

<div id="page2" class="hidden w-full max-w-4xl">
    <div class="backdrop-blur-lg bg-white/15 p-4 sm:p-8 rounded-3xl h-[550px] sm:h-[550px] shadow-2xl border border-white/30 text-center transition-all duration-500 transform hover:scale-[1.01]">
    <h1 class="text-2xl sm:text-4xl font-bold mb-4 sm:mb-6 text-white drop-shadow-md">OUR MISSION</h1>

    <div class="flex flex-col sm:flex-row justify-center items-stretch gap-6 sm:gap-8 mt-6 sm:mt-12">
      <!-- Mission Item 1 -->
      <div class="flex flex-col items-center">

        <div class="bg-white/10 p-4 rounded-xl border border-white/20 flex-1 w-full">
          <p class="text-white/90 text-sm sm:text-base">To provide the best engineering services to our client and contribute by delivering high-quality products.</p>
        </div>
      </div>



      <!-- Mission Item 2 -->


      <!-- Mission Item 3 -->

    </div>
  </div>
</div>
<div id="page3" class="hidden w-full max-w-6xl">
  <div class="backdrop-blur-lg bg-white/15 p-4 sm:p-8 rounded-3xl shadow-2xl border border-white/30 text-center transition-all duration-500 transform hover:scale-[1.01]">
    {{-- <h1 class="text-2xl sm:text-4xl font-bold mb-4 sm:mb-6 text-white drop-shadow-md">OUR VALUES</h1> --}}

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 max-w-6xl mx-auto mt-2 sm:mt-0 max-h-[70vh] overflow-y-auto sm:max-h-none sm:overflow-visible">

      <!-- Excellence -->
      <div class="relative">
        <div class="absolute -inset-1 bg-gradient-to-r rounded-lg blur opacity-75 animate-pulse"></div>
        <div class="relative bg-white/15 rounded-lg px-4 py-3 sm:px-6 sm:py-5 border border-white/30 h-full">
          <h3 class="text-lg sm:text-xl font-semibold text-white">EXCELLENCE</h3>
          <p class="mt-1 sm:mt-2 text-sm sm:text-base text-white/80">We are committed to upholding the highest standards of quality in our work, striving for precision and continuous improvement in all aspects of our engineering services.</p>
        </div>
      </div>

      <!-- Innovation -->
      <div class="relative">
        <div class="absolute -inset-1 bg-gradient-to-r rounded-lg blur opacity-75 animate-pulse"></div>
        <div class="relative bg-white/15 rounded-lg px-4 py-3 sm:px-6 sm:py-5 border border-white/30 h-full">
          <h3 class="text-lg sm:text-xl font-semibold text-white">INNOVATION</h3>
          <p class="mt-1 sm:mt-2 text-sm sm:text-base text-white/80">Embracing creativity and forward thinking, we seek out innovative solutions and technologies to address complex engineering challenges, driving progress and pushing boundaries.</p>
        </div>
      </div>

      <!-- Integrity -->
      <div class="relative">
        <div class="absolute -inset-1 bg-gradient-to-r rounded-lg blur opacity-75 animate-pulse"></div>
        <div class="relative bg-white/15 rounded-lg px-4 py-3 sm:px-6 sm:py-5 border border-white/30 h-full">
          <h3 class="text-lg sm:text-xl font-semibold text-white">INTEGRITY</h3>
          <p class="mt-1 sm:mt-2 text-sm sm:text-base text-white/80">We conduct our business with honesty, transparency, and a strong ethical framework. Upholding moral and professional standards is fundamental to our identity as an engineering office.</p>
        </div>
      </div>

      <!-- Client Focus -->
      <div class="relative">
        <div class="absolute -inset-1 bg-gradient-to-r rounded-lg blur opacity-75 animate-pulse"></div>
        <div class="relative bg-white/15 rounded-lg px-4 py-3 sm:px-6 sm:py-5 border border-white/30 h-full">
          <h3 class="text-lg sm:text-xl font-semibold text-white">CLIENT FOCUS</h3>
          <p class="mt-1 sm:mt-2 text-sm sm:text-base text-white/80">Our clients' satisfaction is paramount. We are dedicated to understanding and meeting their needs, fostering strong relationships, and delivering valuable, tailored solutions.</p>
        </div>
      </div>

      <!-- Collaboration -->
      <div class="relative">
        <div class="absolute -inset-1 bg-gradient-to-r rounded-lg blur opacity-75 animate-pulse"></div>
        <div class="relative bg-white/15 rounded-lg px-4 py-3 sm:px-6 sm:py-5 border border-white/30 h-full">
          <h3 class="text-lg sm:text-xl font-semibold text-white">COLLABORATION</h3>
          <p class="mt-1 sm:mt-2 text-sm sm:text-base text-white/80">We foster a culture of teamwork and collaboration, where diverse perspectives and expertise converge to create robust, integrated solutions for our clients' projects.</p>
        </div>
      </div>

      <!-- Environmental Stewardship -->
      <div class="relative">
        <div class="absolute -inset-1 bg-gradient-to-r rounded-lg blur opacity-75 animate-pulse"></div>
        <div class="relative bg-white/15 rounded-lg px-4 py-3 sm:px-6 sm:py-5 border border-white/30 h-full">
          <h3 class="text-lg sm:text-xl font-semibold text-white">ENVIRONMENTAL STEWARDSHIP</h3>
          <p class="mt-1 sm:mt-2 text-sm sm:text-base text-white/80">We recognize our responsibility to minimize the environmental impact of our work. Through sustainable practices, we aim to contribute positively to the welfare of the planet and future generations.</p>
        </div>
      </div>

      <!-- Adaptability -->
      <div class="relative">
        <div class="absolute -inset-1 bg-gradient-to-r rounded-lg blur opacity-75 animate-pulse"></div>
        <div class="relative bg-white/15 rounded-lg px-4 py-3 sm:px-6 sm:py-5 border border-white/30 h-full">
          <h3 class="text-lg sm:text-xl font-semibold text-white">ADAPTABILITY</h3>
          <p class="mt-1 sm:mt-2 text-sm sm:text-base text-white/80">We embrace change and technological advancement, staying agile and responsive to emerging trends and the needs of a dynamic field.</p>
        </div>
      </div>

      <!-- Professionalism -->
      <div class="relative">
        <div class="absolute -inset-1 bg-gradient-to-r rounded-lg blur opacity-75 animate-pulse"></div>
        <div class="relative bg-white/15 rounded-lg px-4 py-3 sm:px-6 sm:py-5 border border-white/30 h-full">
          <h3 class="text-lg sm:text-xl font-semibold text-white">PROFESSIONALISM</h3>
          <p class="mt-1 sm:mt-2 text-sm sm:text-base text-white/80">We exemplify professionalism in all our interactions, from client engagement to internal operations, demonstrating respect, competence, and a commitment to excellence.</p>
        </div>
      </div>

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
<style>
    /* ===== OUR SERVICES - MODERN STYLES ===== */

    /* Section background with subtle gradient */
    #Our_Services {
        background: linear-gradient(180deg, #faf8f5 0%, #ffffff 100%);
        position: relative;
        overflow: hidden;
    }

    /* Decorative background elements */
    #Our_Services::before {
        content: '';
        position: absolute;
        top: -30%;
        right: -10%;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(233, 188, 100, 0.06) 0%, transparent 70%);
        border-radius: 50%;
        pointer-events: none;
    }

    #Our_Services::after {
        content: '';
        position: absolute;
        bottom: -20%;
        left: -10%;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(233, 188, 100, 0.04) 0%, transparent 70%);
        border-radius: 50%;
        pointer-events: none;
    }

    /* Service Card */
    .service-card {
        position: relative;
        background: #ffffff;
        border-radius: 24px;
        padding: 32px 28px;
        transition: all 0.5s cubic-bezier(0.22, 1, 0.36, 1);
        border: 1px solid rgba(233, 188, 100, 0.08);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
        overflow: hidden;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    /* Card accent line */
    .service-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 0;
        background: linear-gradient(180deg, #e9bc64, #f5d48a);
        border-radius: 0 0 4px 0;
        transition: height 0.5s cubic-bezier(0.22, 1, 0.36, 1);
    }

    .service-card:hover::before {
        height: 100%;
    }

    /* Card hover effects */
    .service-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 60px -12px rgba(233, 188, 100, 0.2), 0 0 0 1px rgba(233, 188, 100, 0.1);
        border-color: rgba(233, 188, 100, 0.15);
    }

    /* Card icon */
    .service-icon {
        width: 56px;
        height: 56px;
        background: linear-gradient(135deg, rgba(233, 188, 100, 0.12), rgba(233, 188, 100, 0.04));
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 18px;
        transition: all 0.4s cubic-bezier(0.22, 1, 0.36, 1);
        flex-shrink: 0;
    }

    .service-card:hover .service-icon {
        background: linear-gradient(135deg, #e9bc64, #d4a84a);
        transform: scale(1.05) rotate(-3deg);
        box-shadow: 0 8px 25px rgba(233, 188, 100, 0.3);
    }

    .service-icon svg {
        width: 26px;
        height: 26px;
        color: #e9bc64;
        transition: all 0.4s ease;
    }

    .service-card:hover .service-icon svg {
        color: #ffffff;
    }

    /* Card title */
    .service-title {
        font-size: 1.35rem;
        font-weight: 700;
        color: #1a1d27;
        margin-bottom: 12px;
        transition: color 0.3s ease;
        line-height: 1.3;
    }

    .service-card:hover .service-title {
        color: #e9bc64;
    }

    /* Card description */
    .service-description {
        color: #6b7280;
        line-height: 1.7;
        font-size: 0.95rem;
        flex: 1;
    }

    /* Card link/arrow (appears on hover) */
    .service-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-top: 18px;
        color: #e9bc64;
        font-weight: 600;
        font-size: 0.9rem;
        opacity: 0;
        transform: translateX(-10px);
        transition: all 0.4s cubic-bezier(0.22, 1, 0.36, 1);
        text-decoration: none;
    }

    .service-card:hover .service-link {
        opacity: 1;
        transform: translateX(0);
    }

    .service-link svg {
        width: 18px;
        height: 18px;
        transition: transform 0.3s ease;
    }

    .service-link:hover svg {
        transform: translateX(4px);
    }

    /* Card number badge (subtle) */
    .service-number {
        position: absolute;
        top: 16px;
        right: 20px;
        font-size: 0.7rem;
        font-weight: 700;
        color: rgba(233, 188, 100, 0.15);
        letter-spacing: 1px;
        transition: color 0.3s ease;
    }

    .service-card:hover .service-number {
        color: rgba(233, 188, 100, 0.3);
    }

    /* Section header animation */
    @keyframes slideInFromLeft {
        0% {
            opacity: 0;
            transform: translateX(-60px);
        }
        100% {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(30px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-slide-in {
        animation: slideInFromLeft 0.8s cubic-bezier(0.22, 1, 0.36, 1) forwards;
    }

    .animate-fade-up {
        animation: fadeInUp 0.7s cubic-bezier(0.22, 1, 0.36, 1) forwards;
        opacity: 0;
    }

    /* Staggered card animation */
    .service-card-wrapper {
        opacity: 0;
        animation: fadeInUp 0.7s cubic-bezier(0.22, 1, 0.36, 1) forwards;
    }

    .service-card-wrapper:nth-child(1) {
        animation-delay: 0.1s;
    }
    .service-card-wrapper:nth-child(2) {
        animation-delay: 0.2s;
    }
    .service-card-wrapper:nth-child(3) {
        animation-delay: 0.3s;
    }
    .service-card-wrapper:nth-child(4) {
        animation-delay: 0.4s;
    }
    .service-card-wrapper:nth-child(5) {
        animation-delay: 0.5s;
    }
    .service-card-wrapper:nth-child(6) {
        animation-delay: 0.6s;
    }

    /* View All Button - Enhanced */
    .view-all-services {
        position: relative;
        overflow: hidden;
        background: linear-gradient(135deg, #e9bc64, #d4a84a);
        color: #ffffff;
        font-weight: 600;
        padding: 14px 36px;
        border-radius: 14px;
        border: none;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: all 0.4s cubic-bezier(0.22, 1, 0.36, 1);
        box-shadow: 0 4px 25px rgba(233, 188, 100, 0.3);
        text-decoration: none;
        cursor: pointer;
    }

    .view-all-services:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 40px rgba(233, 188, 100, 0.4);
        background: linear-gradient(135deg, #d4a84a, #c49a3a);
    }

    .view-all-services:active {
        transform: translateY(0) scale(0.97);
    }

    .view-all-services .btn-shimmer {
        position: absolute;
        inset: 0;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.15), transparent);
        transform: translateX(-100%);
        transition: transform 0.6s ease;
    }

    .view-all-services:hover .btn-shimmer {
        transform: translateX(100%);
    }

    .view-all-services svg {
        transition: transform 0.3s ease;
    }

    .view-all-services:hover svg {
        transform: translateX(4px);
    }

    /* Responsive adjustments */
    @media (max-width: 640px) {
        .service-card {
            padding: 24px 20px;
        }
        .service-title {
            font-size: 1.15rem;
        }
        .service-description {
            font-size: 0.9rem;
        }
        .service-icon {
            width: 48px;
            height: 48px;
        }
        .service-icon svg {
            width: 22px;
            height: 22px;
        }
    }
</style>

<section id="Our_Services" class="pb-12 pt-20 lg:pb-[90px] lg:pt-[120px] w-[95%] mx-auto relative">
    <div class="container mx-auto">

        <!-- Section Header -->
        <div class="-mx-4 flex flex-wrap">
            <div class="w-full px-4">
                <div id="servicesSection" class="mx-auto mb-12 max-w-[510px] text-center lg:mb-16 opacity-0">
                    <span class="mb-2 block text-lg font-semibold text-[#e9bc64] uppercase tracking-wider">
                        Our Services
                    </span>
                    <h2 class="mb-3 text-3xl font-extrabold leading-[1.2] text-gray-900 sm:text-4xl md:text-[42px]">
                        What <span class="text-[#e9bc64]">We Offer</span>
                    </h2>
                    <p class="text-gray-500 text-base mt-2">Comprehensive solutions tailored to your needs</p>
                </div>
            </div>
        </div>

        <!-- Services Grid -->
        <div class="-mx-4 flex flex-wrap">
            @if(isset($services) && count($services))
                @foreach($services as $service)
                    <div class="w-full px-4 md:w-1/2 lg:w-1/3 service-card-wrapper">
                        <div class="service-card">

                            <!-- Number badge -->
                            <span class="service-number">{{ sprintf('%02d', $loop->iteration) }}</span>

                            <!-- Icon -->
                            <div class="service-icon">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>

                            <!-- Title -->
                            <h4 class="service-title">
                                {{ $service->title }}
                            </h4>

                            <!-- Description -->
                            {{-- <p class="service-description">
                                {{ $service->description }}
                            </p> --}}

                            <!-- Link (appears on hover) -->
                            {{-- <a href="#" class="service-link">
                                Learn More
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </a> --}}
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <!-- View All Button -->
        {{-- <div class="mt-14 flex justify-center">
            <a href="/allservices" class="view-all-services relative">
                <span class="btn-shimmer"></span>
                View All Services
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </a>
        </div> --}}

    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Header animation observer
        const section = document.getElementById("servicesSection");

        const observer = new IntersectionObserver(
            function(entries) {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        section.classList.add("animate-slide-in");
                        section.classList.remove("opacity-0");
                        observer.unobserve(section);
                    }
                });
            }, { threshold: 0.3 }
        );

        observer.observe(section);

        // Card animation trigger - cards already have animation-delay via CSS
        // but we ensure they become visible when the section comes into view
        const cardWrapper = document.querySelectorAll('.service-card-wrapper');

        const cardObserver = new IntersectionObserver(
            function(entries) {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        // The cards already have the animation class, just ensure they're visible
                        entry.target.style.opacity = '1';
                        cardObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1 }
        );

        cardWrapper.forEach((card) => {
            cardObserver.observe(card);
        });
    });
</script>
  <!-- ====== Services Section End -->



<!---------------------------------------------- our projects ---------------------------------------->


@php
// Sort projects by year descending and take the 3 newest
$newestProjects = isset($projects) ? $projects->sortByDesc('year')->take(3) : collect();
@endphp

<section class="relative py-12 px-4 sm:px-6 lg:px-8" id="Our_Projects">
    <!-- Background Image with Overlay -->


    <!-- Decorative Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 left-10 w-64 h-64 bg-[#e9bc64]/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 right-10 w-80 h-80 bg-[#e9bc64]/5 rounded-full blur-3xl"></div>
    </div>

    <div class="relative max-w-7xl mx-auto">
        @if($newestProjects->count())
            <div class="text-center mb-8 md:mb-12">
                <span class="inline-block px-4 py-1.5 bg-[#e9bc64]/20 backdrop-blur-sm text-[#e9bc64] text-xs sm:text-sm font-semibold rounded-full mb-3 tracking-wider uppercase border border-[#e9bc64]/20">
                    Latest Work
                </span>
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-3 text-[#1f283a]">
                    Our Newest <span class="text-[#e9bc64]">Projects</span>
                </h2>
                <div class="w-20 h-1 bg-[#e9bc64] mx-auto rounded-full"></div>
            </div>

            <!-- Projects Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 mx-2 text-[#1f283a]">
                @foreach($newestProjects as $projectIndex => $project)
                    @php
                        $images = $project->images;
                        $hasImages = $images->count() > 0;
                        $fullContent = strip_tags($project->content);
                        $shortContent = Illuminate\Support\Str::limit($fullContent, 50);
                        $isLongContent = strlen($fullContent) > 50;
                        $contentId = 'content-' . $projectIndex . '-' . uniqid();
                    @endphp

                    <div class="group bg-white/10 backdrop-blur-md rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-white/10 hover:border-[#e9bc64]/30">
                        <!-- Image Carousel Section -->
                        <div class="relative overflow-hidden bg-gray-800/50 h-48 md:h-56">
                            @if($hasImages)
                                <div class="relative w-full h-full carousel-container" data-project="{{ $projectIndex }}">
                                    <!-- Main Image -->
                                    <img
                                        src="{{ asset('storage/' . $images->first()->image_path) }}"
                                        alt="{{ $images->first()->alt_text ?? $project->title }}"
                                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 carousel-image"
                                        loading="lazy"
                                        data-project="{{ $projectIndex }}"
                                        data-index="0"
                                    >

                                    <!-- Image Counter -->
                                    <div class="absolute top-3 right-3 bg-black/60 backdrop-blur-sm text-white text-xs font-semibold px-3 py-1.5 rounded-full flex items-center gap-1.5 border border-white/10">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                        <span class="image-counter" data-project="{{ $projectIndex }}">1/{{ $images->count() }}</span>
                                    </div>

                                    <!-- Navigation Arrows (visible on hover) -->
                                    @if($images->count() > 1)
                                        <div class="absolute inset-0 flex items-center justify-between px-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                            <!-- Left Arrow -->
                                            <button
                                                onclick="changeImage({{ $projectIndex }}, 'prev')"
                                                class="bg-black/50 hover:bg-black/70 text-white rounded-full p-2 transition-all duration-300 hover:scale-110 w-8 h-8 flex items-center justify-center backdrop-blur-sm border border-white/10"
                                                aria-label="Previous image"
                                            >
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                                </svg>
                                            </button>

                                            <!-- Right Arrow -->
                                            <button
                                                onclick="changeImage({{ $projectIndex }}, 'next')"
                                                class="bg-black/50 hover:bg-black/70 text-white rounded-full p-2 transition-all duration-300 hover:scale-110 w-8 h-8 flex items-center justify-center backdrop-blur-sm border border-white/10"
                                                aria-label="Next image"
                                            >
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                                </svg>
                                            </button>
                                        </div>
                                    @endif

                                    <!-- Dot Indicators -->
                                    @if($images->count() > 1)
                                        <div class="absolute bottom-3 left-1/2 transform -translate-x-1/2 flex gap-1.5">
                                            @foreach($images as $index => $image)
                                                <button
                                                    onclick="goToImage({{ $projectIndex }}, {{ $index }})"
                                                    class="w-2 h-2 rounded-full transition-all duration-300 dot-indicator {{ $index === 0 ? 'bg-[#e9bc64] w-4' : 'bg-white/150 hover:bg-white/80' }}"
                                                    data-project="{{ $projectIndex }}"
                                                    data-index="{{ $index }}"
                                                    aria-label="Go to image {{ $index + 1 }}"
                                                ></button>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            @else
                                <!-- No Image Placeholder -->
                                <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-gray-700/50 to-gray-800/50">
                                    <svg class="w-16 h-16 text-gray-500/50 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <span class="text-gray-400 text-sm font-medium">No Images</span>
                                </div>
                            @endif

                            <!-- Year Badge -->
                            <div class="absolute bottom-3 left-3 bg-[#e9bc64] text-white text-xs font-semibold px-3 py-1.5 rounded-full shadow-lg">
                                {{ $project->year }}
                            </div>
                        </div>

                        <!-- Content Section -->
                        <div class="p-5 sm:p-6">
                            <div class="flex items-center justify-between mb-2">
                                <div class="text-xs text-[#e9bc64] font-semibold flex items-center gap-2">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    {{ $project->created_at->format('M d, Y') }}
                                </div>
                                @if($project->images->count() > 0)
                                    <span class="text-xs text-white/50 flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                        {{ $project->images->count() }}
                                    </span>
                                @endif
                            </div>

                            <h3 class="text-lg text-black sm:text-xl font-bold text-white mb-2 line-clamp-2 group-hover:text-[#e9bc64] transition-colors duration-300">
                                {{ $project->title }}
                            </h3>

                            <!-- Content with Read More functionality (Plain JavaScript) -->
                            <div class="text-white/80 text-sm leading-relaxed mb-3  text-black " >
                                @if($isLongContent)
                                    <div class="project-content-wrapper" id="wrapper-{{ $contentId }}">
                                        <p class="project-content-short" id="short-{{ $contentId }}">
                                            {{ $shortContent }}
                                            <span class="text-[#e9bc64]">...</span>
                                        </p>
                                        <p class="project-content-full  text-black  hidden" id="full-{{ $contentId }}">
                                            {{ $fullContent }}
                                        </p>
                                        <button
                                            onclick="toggleContent('{{ $contentId }}')"
                                            class="inline-flex items-center text-[#e9bc64] hover:text-[#fcc85f] font-medium text-sm transition-colors duration-200 mt-1 read-more-btn"
                                            id="btn-{{ $contentId }}"
                                        >
                                            <span>Read More</span>
                                            <svg
                                                class="w-4 h-4 ml-2 transition-transform duration-300"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                            </svg>
                                        </button>
                                    </div>
                                @else
                                    <p class="text-white/80">{{ $fullContent }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- View All Button -->
            <div class="mt-12 flex justify-center">
                <a href="/allprojects"
                   class="group inline-flex items-center px-8 py-4 bg-[#e9bc64] text-white font-semibold rounded-xl hover:bg-[#f8c561] transition-all duration-300 shadow-lg hover:shadow-2xl transform hover:-translate-y-1">
                    <span>View All Projects</span>
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-5 w-5 ml-3 transition-transform duration-300 group-hover:translate-x-1"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
        @else
            <!-- No Projects State -->
            <div class="text-center py-16">
                <div class="inline-block p-6 bg-white/15 backdrop-blur-sm rounded-full mb-6">
                    <svg class="w-16 h-16 text-[#e9bc64]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-white mb-2">No Projects Yet</h3>
                <p class="text-white/70 max-w-md mx-auto">Check back soon for our latest projects and updates.</p>

                <div class="mt-8 flex justify-center">
                    <a href="/allprojects"
                       class="group inline-flex items-center px-8 py-4 bg-[#e9bc64] text-white font-semibold rounded-xl hover:bg-[#f8c561] transition-all duration-300 shadow-lg hover:shadow-2xl transform hover:-translate-y-1">
                        <span>View All Projects</span>
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-5 w-5 ml-3 transition-transform duration-300 group-hover:translate-x-1"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
            </div>
        @endif
    </div>

    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        #Our_Projects {
            scrollbar-width: thin;
            scrollbar-color: #e9bc64 transparent;
        }

        #Our_Projects::-webkit-scrollbar {
            width: 6px;
        }

        #Our_Projects::-webkit-scrollbar-track {
            background: transparent;
        }

        #Our_Projects::-webkit-scrollbar-thumb {
            background: #e9bc64;
            border-radius: 10px;
        }

        .group:hover .backdrop-blur-md {
            backdrop-filter: blur(12px);
        }

        .group img {
            backface-visibility: hidden;
        }

        .group .opacity-0 {
            opacity: 0;
        }

        .group:hover .opacity-0 {
            opacity: 1;
        }

        .w-2.h-2 {
            transition: all 0.3s ease;
        }

        .w-4 {
            width: 1rem;
        }

        button {
            user-select: none;
        }

        /* Smooth content transitions */
        .project-content-short,
        .project-content-full {
            transition: all 0.3s ease;
        }

        .project-content-full {
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Read More button hover effect */
        .read-more-btn:hover svg {
            transform: translateX(3px);
        }
    </style>
</section>

<script>
// Read More / Read Less functionality
function toggleContent(contentId) {
    const shortContent = document.getElementById('short-' + contentId);
    const fullContent = document.getElementById('full-' + contentId);
    const button = document.getElementById('btn-' + contentId);
    const buttonSpan = button.querySelector('span');
    const buttonSvg = button.querySelector('svg');

    if (shortContent.classList.contains('hidden')) {
        // Currently showing full content, switch to short
        shortContent.classList.remove('hidden');
        fullContent.classList.add('hidden');
        buttonSpan.textContent = 'Read More';
        buttonSvg.style.transform = 'rotate(0deg)';
    } else {
        // Currently showing short content, switch to full
        shortContent.classList.add('hidden');
        fullContent.classList.remove('hidden');
        buttonSpan.textContent = 'Read Less';
        buttonSvg.style.transform = 'rotate(180deg)';
    }
}

// Image carousel JavaScript
const projectImages = @json($newestProjects->map(function($project) {
    return $project->images->map(function($img) {
        return [
            'url' => asset('storage/' . $img->image_path),
            'alt' => $img->alt_text ?? ''
        ];
    })->toArray();
})->toArray());

let currentIndices = {};

// Initialize current indices for each project
@foreach($newestProjects as $index => $project)
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

    updateImage(projectIndex);
}

function goToImage(projectIndex, imageIndex) {
    const images = projectImages[projectIndex];
    if (!images || imageIndex >= images.length) return;

    currentIndices[projectIndex] = imageIndex;
    updateImage(projectIndex);
}

function updateImage(projectIndex) {
    const images = projectImages[projectIndex];
    if (!images || images.length === 0) return;

    const currentIndex = currentIndices[projectIndex];
    const image = images[currentIndex];

    // Update main image
    const imgElement = document.querySelector(`.carousel-image[data-project="${projectIndex}"]`);
    if (imgElement) {
        imgElement.src = image.url;
        imgElement.alt = image.alt;
        imgElement.dataset.index = currentIndex;
    }

    // Update counter
    const counterElement = document.querySelector(`.image-counter[data-project="${projectIndex}"]`);
    if (counterElement) {
        counterElement.textContent = `${currentIndex + 1}/${images.length}`;
    }

    // Update dot indicators
    const dots = document.querySelectorAll(`.dot-indicator[data-project="${projectIndex}"]`);
    dots.forEach((dot, index) => {
        if (index === currentIndex) {
            dot.className = 'w-2 h-2 rounded-full transition-all duration-300 bg-[#e9bc64] w-4 dot-indicator';
        } else {
            dot.className = 'w-2 h-2 rounded-full transition-all duration-300 bg-white/150 hover:bg-white/80 dot-indicator';
        }
    });
}
</script>


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

       <!-- Chatbot Widget -->
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

<!-- footer section -->


    <x-newfooter />

</body>
</html>
