<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AW Engineering · Administrator</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800" rel="stylesheet" />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom Modern Styles & Animations -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: radial-gradient(circle at 20% 30%, #f8fafc, #eef2f6);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            margin: 0;
        }

        /* Glassmorphism + modern card */
        .glass-card {
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.6);
            border-radius: 2.5rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25), 0 0 0 1px rgba(255, 255, 255, 0.5) inset;
            transition: all 0.3s ease;
            width: 100%;
            max-width: 1440px;
            max-height: 900px;
            height: 92vh;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        /* Hero header with animated gradient */
        .hero-gradient {
            background: linear-gradient(135deg, #d4a14b 0%, #e9bc64 45%, #f5d48e 100%);
            background-size: 200% 200%;
            animation: shimmer 6s ease-in-out infinite alternate;
            position: relative;
        }

        @keyframes shimmer {
            0% { background-position: 0% 50%; }
            100% { background-position: 100% 50%; }
        }

        /* Decorative glow orbs */
        .hero-gradient::after {
            content: '';
            position: absolute;
            top: -40%;
            right: -10%;
            width: 300px;
            height: 300px;
            background: rgba(255, 215, 120, 0.3);
            filter: blur(80px);
            border-radius: 50%;
            pointer-events: none;
        }

        .hero-gradient::before {
            content: '';
            position: absolute;
            bottom: -40%;
            left: -10%;
            width: 250px;
            height: 250px;
            background: rgba(255, 215, 120, 0.2);
            filter: blur(70px);
            border-radius: 50%;
            pointer-events: none;
        }

        /* Floating animation for logo */
        @keyframes float {
            0% { transform: translateY(0px) scale(1); }
            50% { transform: translateY(-8px) scale(1.02); }
            100% { transform: translateY(0px) scale(1); }
        }

        .logo-float {
            animation: float 5s ease-in-out infinite;
            filter: drop-shadow(0 10px 20px rgba(0, 0, 0, 0.08));
        }

        /* Button modern hover */
        .btn-primary {
            background: #e9bc64;
            color: white;
            font-weight: 600;
            padding: 0.9rem 2rem;
            border-radius: 60px;
            transition: all 0.25s ease;
            box-shadow: 0 4px 14px rgba(233, 188, 100, 0.4);
            border: none;
            letter-spacing: 0.3px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-primary:hover {
            background: #dba84d;
            transform: translateY(-3px);
            box-shadow: 0 12px 28px rgba(233, 188, 100, 0.5);
        }

        .btn-primary:active {
            transform: scale(0.97);
        }

        .btn-outline {
            background: transparent;
            color: #e9bc64;
            font-weight: 600;
            padding: 0.9rem 2rem;
            border-radius: 60px;
            border: 2px solid #e9bc64;
            transition: all 0.25s ease;
            backdrop-filter: blur(4px);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-outline:hover {
            background: #e9bc64;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 12px 28px rgba(233, 188, 100, 0.3);
        }

        .btn-outline:active {
            transform: scale(0.97);
        }

        /* Responsive fine-tune */
        @media (max-width: 768px) {
            body { padding: 1rem; }
            .glass-card {
                border-radius: 1.8rem;
                height: 95vh;
                max-height: none;
            }
            .hero-gradient h1 {
                font-size: 1.6rem;
            }
            .btn-primary, .btn-outline {
                padding: 0.75rem 1.5rem;
                font-size: 0.95rem;
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            .glass-card {
                border-radius: 1.2rem;
            }
        }

        /* subtle scroll */
        .content-scroll {
            scrollbar-width: thin;
            scrollbar-color: #e9bc64 #f1f3f5;
        }
        .content-scroll::-webkit-scrollbar {
            width: 5px;
        }
        .content-scroll::-webkit-scrollbar-track {
            background: #f1f3f5;
        }
        .content-scroll::-webkit-scrollbar-thumb {
            background: #e9bc64;
            border-radius: 20px;
        }

        /* footer subtle */
        .footer-modern {
            background: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(6px);
            border-top: 1px solid rgba(255, 255, 255, 0.7);
        }
    </style>

    <!-- Vite / Laravel Mix (preserved) -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body>

    <div class="glass-card">

        <!-- Hero / Header with animated gradient -->
        <div class="hero-gradient flex items-center justify-center px-6 py-5 md:py-7 relative" style="min-height: 130px;">
            <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-extrabold text-white tracking-tight text-center drop-shadow-lg z-10 relative">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-white to-[#fef3d7]">
                    AW Engineering · Admin
                </span>
                <span class="block text-sm sm:text-base font-medium text-white/80 mt-1 tracking-wide">
                    administrator portal
                </span>
            </h1>
        </div>

        <!-- Content Section (flexible) -->
        <div class="flex-1 flex flex-col md:flex-row p-5 sm:p-7 md:p-9 gap-6 md:gap-8 overflow-auto content-scroll">

            <!-- Left: Logo / Graphic with modern floating effect -->
            <div class="md:w-2/5 flex items-center justify-center">
                <div class="w-full max-w-[240px] md:max-w-[280px] logo-float">
                    <img src="{{ asset('images/logoAWD.png') }}"
                         alt="AW Engineering"
                         class="w-full h-auto object-contain drop-shadow-xl"
                         style="filter: drop-shadow(0 15px 25px rgba(0,0,0,0.08));">
                </div>
            </div>

            <!-- Right: Content + Buttons (modern layout) -->
            <div class="md:w-3/5 flex flex-col justify-center space-y-6 md:space-y-8">

                <!-- Tagline / micro-copy -->
                <div class="space-y-2">
                    <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 tracking-tight">
                        Welcome back
                    </h2>
                    <p class="text-gray-500 text-sm sm:text-base max-w-md leading-relaxed">
                        Manage your engineering projects, teams, and insights — all from one streamlined dashboard.
                    </p>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row sm:flex-wrap gap-4 sm:gap-5">
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn-primary flex-1 sm:flex-none">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                            Dashboard
                        </a>
                    @endauth

                    @guest
                        <a href="{{ route('login') }}" class="btn-primary flex-1 sm:flex-none">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                            Log in
                        </a>

                    @endguest
                </div>

                <!-- small extra: status hint (optional) -->
                <div class="flex items-center gap-3 text-xs text-gray-400 pt-2 border-t border-gray-100/60">
                    <span class="flex items-center gap-1">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 inline-block"></span>
                        system ready
                    </span>
                    <span>·</span>
                    <span>v1</span>
                </div>
            </div>
        </div>

        <!-- Footer (modern glass) -->
        <footer class="footer-modern py-3 px-6 text-center text-gray-500 text-sm flex flex-col sm:flex-row items-center justify-between gap-2">
            <span>&copy; {{ date('Y') }} AW Engineering. All rights reserved.</span>
        </footer>
    </div>

</body>
</html>
