<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', $title ?? 'Welcome') - {{ config('app.name', 'Inventory System') }}</title>

        <!-- Favicon -->
        <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 relative overflow-hidden">
            <!-- Background Pattern -->
            <div class="absolute inset-0 bg-white/20 backdrop-blur-3xl"></div>
            <div class="absolute top-0 left-0 w-full h-full opacity-30">
                <div class="absolute top-10 left-10 w-72 h-72 bg-blue-300 rounded-full mix-blend-multiply filter blur-xl animate-pulse"></div>
                <div class="absolute top-20 right-10 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-2000"></div>
                <div class="absolute bottom-10 left-20 w-72 h-72 bg-pink-300 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-4000"></div>
            </div>

            <!-- Logo Section -->
            <div class="relative z-10 mb-8">
                <a href="/" class="block transition-transform hover:scale-105 duration-300 group">
                    <div class="flex items-center space-x-3 bg-white/90 backdrop-blur-sm rounded-2xl p-4 shadow-lg border border-white/20">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-600 to-purple-600 rounded-xl flex items-center justify-center">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>
                        <div class="text-left">
                            <h1 class="text-xl font-bold text-gray-800 group-hover:text-blue-600 transition duration-300">Inventory Pro</h1>
                            <p class="text-sm text-gray-600">Smart Inventory Management</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Main Content Card -->
            <div class="relative z-10 w-full sm:max-w-md">
                <div class="bg-white/95 backdrop-blur-sm shadow-2xl overflow-hidden rounded-3xl border border-white/20 transition-all duration-300 hover:shadow-3xl">
                    <div class="px-8 py-10">
                        {{ $slot }}
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="relative z-10 mt-8 text-center">
                <p class="text-sm text-gray-600/80 bg-white/30 backdrop-blur-sm rounded-full px-4 py-2 border border-white/20">
                    &copy; {{ date('Y') }} Inventory Pro. All rights reserved.
                </p>
            </div>
        </div>

        <!-- Custom Animation Styles -->
        <style>
            .animation-delay-2000 {
                animation-delay: 2s;
            }
            .animation-delay-4000 {
                animation-delay: 4s;
            }
            .shadow-3xl {
                box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            }
        </style>
    </body>
</html>
