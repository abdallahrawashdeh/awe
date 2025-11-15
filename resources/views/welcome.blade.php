<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AW Engineering Administrator</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom Animation -->
    <style>
        @keyframes fadeInScale {
            from {
                opacity: 0;
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .animate-fade-in-scale {
            animation: fadeInScale 0.6s ease-out forwards;
        }

        /* Background */
        body {
            background: linear-gradient(135deg, #f0f4f8, #e2e8f0);
        }
    </style>

    <!-- Vite / Laravel Mix -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="font-['Inter'] h-screen w-screen m-0 p-0 overflow-hidden">

    <main class="h-full w-full flex flex-col">
        <!-- Full-Width/Height Card/Container -->
        <div class="flex-1 flex items-center justify-center p-4 sm:p-6 md:p-8">
             <div class="bg-white rounded-2xl shadow-xl overflow-hidden w-full h-full max-w-none animate-fade-in-scale flex flex-col">

                <!-- Hero/Header Section -->
                <div class="h-1/4 min-h-[120px] md:min-h-[150px] bg-gradient-to-r from-indigo-500 to-indigo-700 flex items-center justify-center">
                    <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white text-center px-4 drop-shadow-md">
                        Welcome to AW Engineering Administrator
                    </h1>
                </div>

                <!-- Content Section -->
                <div class="flex-1 flex flex-col md:flex-row p-4 sm:p-6 md:p-8 overflow-auto">
                    <!-- Left: Placeholder/Graphic (Optional) -->
                    <div class="md:w-2/5 flex items-center justify-center p-4 text-gray-400">
                        <!-- You can replace this div with an actual image or graphic -->
                        <div class="bg-gray-100 border-2 border-dashed rounded-xl w-full h-48 md:h-full flex items-center justify-center">
                           <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                    </div>

                     <!-- Right: Content and Buttons -->
                    <div class="md:w-3/5 flex flex-col justify-center p-4 sm:p-6">
                         <div class="mb-6">
                            <h2 class="text-xl font-semibold text-gray-800 mb-3 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                Why Choose Us?
                            </h2>
                            <ul class="space-y-2 pl-7">
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-gray-700">Industry-leading technology for efficient solutions.</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-gray-700">Dedicated 24/7 customer support team.</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                     <span class="text-gray-700">Highly customizable solutions tailored to your needs.</span>
                                </li>
                            </ul>
                        </div>

                        <div class="flex flex-col sm:flex-row sm:space-x-4 space-y-4 sm:space-y-0">
                            @auth
                                <a href="{{ route('dashboard') }}" class="flex-1 text-center bg-indigo-600 text-white font-medium px-5 py-3 rounded-lg hover:bg-indigo-700 transition duration-300 shadow hover:shadow-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 whitespace-nowrap">
                                    Go to Dashboard
                                </a>
                            @endauth

                            @guest
                                <a href="{{ route('login') }}" class="flex-1 text-center bg-indigo-600 text-white font-medium px-5 py-3 rounded-lg hover:bg-indigo-700 transition duration-300 shadow hover:shadow-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 whitespace-nowrap">
                                    Log in
                                </a>
                                <a href="{{ route('register') }}" class="flex-1 text-center border border-indigo-600 text-indigo-600 font-medium px-5 py-3 rounded-lg hover:bg-indigo-50 transition duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 whitespace-nowrap">
                                    Register
                                </a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="py-3 px-4 text-center text-gray-600 text-sm bg-white border-t">
            &copy; {{ date('Y') }} AW Engineering. All rights reserved.
        </footer>
    </main>

</body>
</html>
