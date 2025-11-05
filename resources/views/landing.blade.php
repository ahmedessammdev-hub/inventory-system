@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Brandology Inventory System') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .pattern-dots {
            background-image: radial-gradient(circle, #e5e7eb 1px, transparent 1px);
            background-size: 20px 20px;
        }

        .hover-lift {
            transition: all 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50">


    <!-- Hero Section -->
    <section class="relative py-16 bg-gradient-to-br from-blue-50 via-white to-indigo-50 pattern-dots">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">


                <!-- Main Hero Content -->
                <div class="bg-white/80 backdrop-blur-sm overflow-hidden shadow-lg rounded-2xl p-12 hover-lift">
                    <h1 class="text-5xl md:text-7xl font-bold text-gray-900 mb-6 leading-tight">
                        <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                            Brandology
                        </span>
                        <br>
                        <span class="text-gray-800">Inventory System</span>
                    </h1>

                    <p class="text-xl md:text-2xl text-gray-600 mb-10 max-w-4xl mx-auto leading-relaxed">
                        Smart stock management for modern retail operations. Streamline your inventory,
                        optimize your workflow, and grow your business with confidence.
                    </p>

                    <!-- Statistics Banner -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10 max-w-3xl mx-auto">
                        <div class="bg-blue-50 rounded-xl p-4">
                            <div class="text-2xl font-bold text-blue-600">1000+</div>
                            <div class="text-sm text-blue-700">Products Managed</div>
                        </div>
                        <div class="bg-green-50 rounded-xl p-4">
                            <div class="text-2xl font-bold text-green-600">50+</div>
                            <div class="text-sm text-green-700">Active Suppliers</div>
                        </div>
                        <div class="bg-purple-50 rounded-xl p-4">
                            <div class="text-2xl font-bold text-purple-600">24/7</div>
                            <div class="text-sm text-purple-700">Real-time Tracking</div>
                        </div>
                    </div>

                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                        <a href="{{ route('login') }}"
                           class="group inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                            <svg class="w-5 h-5 mr-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                            </svg>
                            Access Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Features Header -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Powerful Features
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Everything you need to manage your inventory efficiently and scale your operations
                </p>
            </div>

            <!-- Features Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Real-time Stock Tracking -->
                <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 hover-lift">
                    <div class="p-8">
                        <div class="relative mb-6">
                            <div class="flex items-center justify-center w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v4"/>
                                </svg>
                            </div>
                            <div class="absolute -top-2 -right-2 w-6 h-6 bg-green-500 rounded-full flex items-center justify-center">
                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Real-time Stock Tracking</h3>
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            Monitor your inventory levels in real-time with automatic updates and low-stock alerts to prevent stockouts.
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1 text-xs font-semibold bg-green-100 text-green-700 rounded-full">Live Updates</span>
                            <span class="px-3 py-1 text-xs font-semibold bg-blue-100 text-blue-700 rounded-full">Alerts</span>
                        </div>
                    </div>
                </div>

                <!-- Supplier Management -->
                <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 hover-lift">
                    <div class="p-8">
                        <div class="relative mb-6">
                            <div class="flex items-center justify-center w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            </div>
                            <div class="absolute -top-2 -right-2 w-6 h-6 bg-orange-500 rounded-full flex items-center justify-center">
                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"/>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Supplier Management</h3>
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            Manage supplier relationships, track contact information, and maintain organized vendor databases.
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1 text-xs font-semibold bg-purple-100 text-purple-700 rounded-full">Admin Only</span>
                            <span class="px-3 py-1 text-xs font-semibold bg-orange-100 text-orange-700 rounded-full">Secure</span>
                        </div>
                    </div>
                </div>

                <!-- Transaction History -->
                <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 hover-lift">
                    <div class="p-8">
                        <div class="relative mb-6">
                            <div class="flex items-center justify-center w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                                </svg>
                            </div>
                            <div class="absolute -top-2 -right-2 w-6 h-6 bg-indigo-500 rounded-full flex items-center justify-center">
                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"/>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Transaction History</h3>
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            Complete audit trail of all inventory movements with detailed transaction logs and user tracking.
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1 text-xs font-semibold bg-yellow-100 text-yellow-700 rounded-full">Full Audit</span>
                            <span class="px-3 py-1 text-xs font-semibold bg-indigo-100 text-indigo-700 rounded-full">Detailed</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Advanced Features -->
            <div class="mt-16">
                <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-3xl shadow-2xl overflow-hidden">
                    <div class="px-8 py-12 sm:px-12 lg:px-16 lg:py-16">
                        <div class="lg:grid lg:grid-cols-2 lg:gap-8 lg:items-center">
                            <div>
                                <h3 class="text-3xl font-bold text-white mb-4">
                                    Advanced Analytics & Reporting
                                </h3>
                                <p class="text-xl text-blue-100 mb-6">
                                    Generate comprehensive reports, analyze inventory trends, and make data-driven decisions with our powerful analytics dashboard.
                                </p>
                                <div class="flex flex-wrap gap-3">
                                    <span class="px-4 py-2 bg-white/20 text-white rounded-full text-sm font-semibold">Dashboard Analytics</span>
                                    <span class="px-4 py-2 bg-white/20 text-white rounded-full text-sm font-semibold">Stock Reports</span>
                                    <span class="px-4 py-2 bg-white/20 text-white rounded-full text-sm font-semibold">Performance Metrics</span>
                                    <span class="px-4 py-2 bg-white/20 text-white rounded-full text-sm font-semibold">Export Data</span>
                                </div>
                            </div>
                            <div class="mt-8 lg:mt-0">
                                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6">
                                    <div class="grid grid-cols-2 gap-4">
                                        <div class="bg-white/20 rounded-xl p-4 text-center">
                                            <div class="text-2xl font-bold text-white">95%</div>
                                            <div class="text-sm text-blue-100">Accuracy Rate</div>
                                        </div>
                                        <div class="bg-white/20 rounded-xl p-4 text-center">
                                            <div class="text-2xl font-bold text-white">2.5x</div>
                                            <div class="text-sm text-blue-100">Faster Processing</div>
                                        </div>
                                        <div class="bg-white/20 rounded-xl p-4 text-center">
                                            <div class="text-2xl font-bold text-white">30%</div>
                                            <div class="text-sm text-blue-100">Cost Reduction</div>
                                        </div>
                                        <div class="bg-white/20 rounded-xl p-4 text-center">
                                            <div class="text-2xl font-bold text-white">24/7</div>
                                            <div class="text-sm text-blue-100">Support</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Contact Header -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-center">
                    <h2 class="text-3xl font-bold text-gray-800">Get in Touch</h2>
                    <p class="text-gray-600 mt-2">Have questions about our inventory management system? We're here to help.</p>
                </div>
            </div>

            <!-- Contact Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-center">
                        <div class="flex items-center justify-center mb-4">
                            <div class="flex-shrink-0 h-10 w-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Email</h3>
                        <p class="text-sm text-gray-600">email@brandology.com</p>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-center">
                        <div class="flex items-center justify-center mb-4">
                            <div class="flex-shrink-0 h-10 w-10 bg-green-100 rounded-lg flex items-center justify-center">
                                <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Phone</h3>
                        <p class="text-sm text-gray-600">+1 (555) 123-4567</p>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-center">
                        <div class="flex items-center justify-center mb-4">
                            <div class="flex-shrink-0 h-10 w-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                <svg class="h-6 w-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Address</h3>
                        <p class="text-sm text-gray-600">123 Business Ave<br>Suite 100, City, State 12345</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-center">
                    <p class="text-sm text-gray-500">
                        © 2025 Brandology. All rights reserved. created by ahmed essam
                    </p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
@endsection
