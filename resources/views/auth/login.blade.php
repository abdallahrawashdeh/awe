<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login · AW Engineering</title>

    <!-- Google Fonts (Inter) -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap" rel="stylesheet" />

    <!-- Tailwind via CDN (lightweight) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Vite / Laravel Mix (preserved) -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <style>
        /* ---------- GLOBAL ---------- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: radial-gradient(circle at 30% 20%, #f9f6ef, #ece7de);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            margin: 0;
        }

        /* ---------- GLASS CARD ---------- */
        .glass-login {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.7);
            border-radius: 2.5rem;
            box-shadow: 0 30px 60px -20px rgba(0, 0, 0, 0.25), 0 0 0 1px rgba(255, 255, 255, 0.5) inset;
            padding: 2.5rem 2.2rem;
            width: 100%;
            max-width: 440px;
            transition: all 0.2s ease;
        }

        /* ---------- GOLDEN ACCENTS ---------- */
        .golden-gradient {
            background: linear-gradient(135deg, #d4a14b, #e9bc64, #f5d48e);
        }

        .golden-text {
            color: #d4a14b;
        }

        .golden-border {
            border-color: #e9bc64;
        }

        .golden-focus:focus {
            border-color: #e9bc64;
            box-shadow: 0 0 0 3px rgba(233, 188, 100, 0.3);
            outline: none;
        }

        /* ---------- CUSTOM BUTTON (golden) ---------- */
        .btn-golden {
            background: #e9bc64;
            color: #fff;
            font-weight: 600;
            font-size: 1rem;
            padding: 0.85rem 1.8rem;
            border-radius: 60px;
            border: none;
            width: 100%;
            transition: all 0.25s ease;
            box-shadow: 0 6px 18px rgba(233, 188, 100, 0.35);
            letter-spacing: 0.3px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            cursor: pointer;
        }

        .btn-golden:hover {
            background: #dba84d;
            transform: translateY(-2px);
            box-shadow: 0 12px 28px rgba(233, 188, 100, 0.45);
        }

        .btn-golden:active {
            transform: scale(0.97);
        }

        /* ---------- INPUTS (modern) ---------- */
        .input-modern {
            width: 100%;
            padding: 0.8rem 1.2rem;
            border-radius: 40px;
            border: 1.5px solid #e9e4dc;
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(4px);
            font-size: 0.95rem;
            transition: all 0.2s ease;
            color: #1f1f1f;
        }

        .input-modern::placeholder {
            color: #b0aaa0;
            font-weight: 400;
        }

        .input-modern:focus {
            border-color: #e9bc64;
            box-shadow: 0 0 0 4px rgba(233, 188, 100, 0.15);
            background: #fff;
            outline: none;
        }

        /* ---------- CHECKBOX (golden accent) ---------- */
        input[type="checkbox"] {
            accent-color: #e9bc64;
            width: 18px;
            height: 18px;
            border-radius: 6px;
            border: 1.5px solid #d4c9bc;
            transition: all 0.15s ease;
            cursor: pointer;
        }

        input[type="checkbox"]:checked {
            border-color: #e9bc64;
        }

        /* ---------- RESPONSIVE ---------- */
        @media (max-width: 480px) {
            .glass-login {
                padding: 2rem 1.5rem;
                border-radius: 2rem;
            }
            .btn-golden {
                font-size: 0.95rem;
                padding: 0.75rem 1.5rem;
            }
        }

        /* ---------- ANIMATION (subtle) ---------- */
        @keyframes fadeSlide {
            0% { opacity: 0; transform: translateY(12px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        .animate-fade-slide {
            animation: fadeSlide 0.5s ease-out forwards;
        }

        /* error / session messages */
        .error-text {
            color: #b91c1c;
            font-size: 0.8rem;
            margin-top: 0.3rem;
        }

        .session-status {
            background: #e9bc6430;
            border-left: 4px solid #e9bc64;
            padding: 0.6rem 1rem;
            border-radius: 30px;
            font-size: 0.9rem;
            color: #5f4a1e;
        }

        /* link hover */
        .link-golden {
            color: #b58a3e;
            font-weight: 500;
            transition: color 0.2s;
        }
        .link-golden:hover {
            color: #d4a14b;
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="glass-login animate-fade-slide">

        <!-- Logo / Brand (golden) -->
        <div class="text-center mb-7">
            <h2 class="text-2xl font-extrabold text-gray-800 tracking-tight">
                Welcome Back
            </h2>
            <p class="text-sm text-gray-500 mt-1">Sign in to your administrator account</p>
        </div>

        <!-- Session Status -->
        @if (session('status'))
            <div class="session-status mb-5 flex items-center gap-2">
                <svg class="w-5 h-5 text-[#e9bc64]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                {{ session('status') }}
            </div>
        @endif

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">Email address</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    autocomplete="username"
                    placeholder="you@company.com"
                    class="input-modern @error('email') border-red-400 @enderror"
                />
                @error('email')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <div class="flex items-center justify-between mb-1.5">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                </div>
                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    placeholder="••••••••"
                    class="input-modern @error('password') border-red-400 @enderror"
                />
                @error('password')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me -->

            <!-- Submit Button -->
            <div class="pt-2">
                <button type="submit" class="btn-golden">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                    {{ __('Log in') }}
                </button>
            </div>

            <!-- Register link (guest) -->

        </form>

        <!-- Footer micro -->
        <div class="mt-6 text-center text-[0.7rem] text-gray-400 border-t border-gray-200/60 pt-4">
            &copy; {{ date('Y') }} AW Engineering · login
        </div>
    </div>

</body>
</html>
