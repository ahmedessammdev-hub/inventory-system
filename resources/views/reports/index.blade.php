@extends('layouts.app')

@section('title', 'Reports & Analytics')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
            <div class="p-6 flex justify-between items-center">
                <div>
                    <h2 class="text-3xl font-bold text-gray-800">Reports & Analytics</h2>
                    <p class="text-gray-600 mt-1">Comprehensive insights into your inventory performance</p>
                </div>

            </div>
        </div>

        <!-- Advanced Filters Section -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                        </svg>
                        Filters & Options
                    </h3>
                    <button onclick="resetFilters()" class="text-sm text-blue-600 hover:text-blue-800 font-medium transition-colors">
                        Reset All
                    </button>
                </div>

                <form id="filterForm" method="GET" action="{{ route('reports.index') }}" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Period Filter -->
                    <div>
                        <label for="period" class="block text-sm font-medium text-gray-700 mb-2">
                            Time Period
                        </label>
                        <select id="period" name="period" onchange="document.getElementById('filterForm').submit()"
                                class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="7" {{ $period == '7' ? 'selected' : '' }}>Last 7 Days</option>
                            <option value="14" {{ $period == '14' ? 'selected' : '' }}>Last 14 Days</option>
                            <option value="30" {{ $period == '30' ? 'selected' : '' }}>Last 30 Days</option>
                            <option value="60" {{ $period == '60' ? 'selected' : '' }}>Last 60 Days</option>
                            <option value="90" {{ $period == '90' ? 'selected' : '' }}>Last 90 Days</option>
                        </select>
                    </div>

                    <!-- Stock Level Filter -->
                    <div>
                        <label for="stock_filter" class="block text-sm font-medium text-gray-700 mb-2">
                            Stock Level
                        </label>
                        <select id="stock_filter" name="stock_filter" onchange="document.getElementById('filterForm').submit()"
                                class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="all" {{ $stockFilter == 'all' ? 'selected' : '' }}>All Products</option>
                            <option value="low" {{ $stockFilter == 'low' ? 'selected' : '' }}>Low Stock (&lt; 10)</option>
                            <option value="medium" {{ $stockFilter == 'medium' ? 'selected' : '' }}>Medium Stock (10-50)</option>
                            <option value="high" {{ $stockFilter == 'high' ? 'selected' : '' }}>High Stock (&gt; 50)</option>
                        </select>
                    </div>

                    <!-- Sort By Filter -->
                    <div>
                        <label for="sort_by" class="block text-sm font-medium text-gray-700 mb-2">
                            Sort Products By
                        </label>
                        <select id="sort_by" name="sort_by" onchange="document.getElementById('filterForm').submit()"
                                class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="quantity" {{ $sortBy == 'quantity' ? 'selected' : '' }}>Quantity (High to Low)</option>
                            <option value="value" {{ $sortBy == 'value' ? 'selected' : '' }}>Total Value (High to Low)</option>
                            <option value="name" {{ $sortBy == 'name' ? 'selected' : '' }}>Name (A-Z)</option>
                        </select>
                    </div>
                </form>

                <!-- Active Filters Display -->
                @if($period != '7' || $stockFilter != 'all' || $sortBy != 'quantity')
                <div class="mt-4 flex flex-wrap gap-2">
                    @if($period != '7')
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                            Period: Last {{ $period }} days
                        </span>
                    @endif
                    @if($stockFilter != 'all')
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            Stock: {{ ucfirst($stockFilter) }}
                        </span>
                    @endif
                    @if($sortBy != 'quantity')
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                            Sort: {{ ucfirst(str_replace('_', ' ', $sortBy)) }}
                        </span>
                    @endif
                </div>
                @endif
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <!-- Total Products Card -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition-shadow duration-200">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-blue-100 rounded-lg p-3">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Total Products</dt>
                                <dd class="flex items-baseline">
                                    <div class="text-2xl font-semibold text-gray-900">{{ $totalProducts }}</div>
                                    <div class="ml-2 flex items-baseline text-sm font-semibold text-green-600">
                                        <svg class="self-center flex-shrink-0 h-4 w-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="sr-only">Increased by</span>
                                        12%
                                    </div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Stock Card -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition-shadow duration-200">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-green-100 rounded-lg p-3">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Total Items in Stock</dt>
                                <dd class="flex items-baseline">
                                    <div class="text-2xl font-semibold text-gray-900">{{ number_format($totalStock) }}</div>
                                    <div class="ml-2 flex items-baseline text-xs font-semibold text-gray-500">
                                        units
                                    </div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Value Card -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition-shadow duration-200">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-yellow-100 rounded-lg p-3">
                            <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Total Inventory Value</dt>
                                <dd class="flex items-baseline">
                                    <div class="text-2xl font-semibold text-gray-900">${{ number_format($totalValue, 2) }}</div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Low Stock Card -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition-shadow duration-200">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-red-100 rounded-lg p-3">
                            <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Low Stock Items</dt>
                                <dd class="flex items-baseline">
                                    <div class="text-2xl font-semibold text-gray-900">{{ $lowStockCount }}</div>
                                    @if($lowStockCount > 0)
                                    <div class="ml-2 flex items-baseline text-sm font-semibold text-red-600">
                                        Action Needed
                                    </div>
                                    @else
                                    <div class="ml-2 flex items-baseline text-sm font-semibold text-green-600">
                                        All Good
                                    </div>
                                    @endif
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Stats Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <!-- Stock Movement Summary -->
            <div class="bg-gradient-to-br from-green-50 to-green-100 overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-green-500">
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-green-800">Total Stock In</p>
                            <p class="text-3xl font-bold text-green-900 mt-2">{{ number_format($totalStockIn) }}</p>
                            <p class="text-xs text-green-700 mt-1">Last {{ $period }} days</p>
                        </div>
                        <div class="bg-green-500 rounded-full p-3">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stock Out Summary -->
            <div class="bg-gradient-to-br from-red-50 to-red-100 overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-red-500">
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-red-800">Total Stock Out</p>
                            <p class="text-3xl font-bold text-red-900 mt-2">{{ number_format($totalStockOut) }}</p>
                            <p class="text-xs text-red-700 mt-1">Last {{ $period }} days</p>
                        </div>
                        <div class="bg-red-500 rounded-full p-3">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 13l-5 5m0 0l-5-5m5 5V6"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Net Change -->
            <div class="bg-gradient-to-br from-purple-50 to-purple-100 overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-purple-500">
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-purple-800">Net Change</p>
                            <p class="text-3xl font-bold text-purple-900 mt-2">
                                {{ $netChange >= 0 ? '+' : '' }}{{ number_format($netChange) }}
                            </p>
                            <p class="text-xs text-purple-700 mt-1">
                                {{ $netChange >= 0 ? 'Inventory Increased' : 'Inventory Decreased' }}
                            </p>
                        </div>
                        <div class="bg-purple-500 rounded-full p-3">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stock Distribution -->
            <div class="bg-gradient-to-br from-blue-50 to-blue-100 overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-blue-500">
                <div class="p-6">
                    <p class="text-sm font-medium text-blue-800 mb-3">Stock Distribution</p>
                    <div class="space-y-2">
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-blue-700">Low Stock</span>
                            <span class="font-bold text-blue-900">{{ $lowStockCount }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-blue-700">Medium</span>
                            <span class="font-bold text-blue-900">{{ $mediumStockCount }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-blue-700">High Stock</span>
                            <span class="font-bold text-blue-900">{{ $highStockCount }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Top Products Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
            <!-- Top 5 by Quantity -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        Top 5 Products by Quantity
                    </h3>
                    <div class="space-y-3">
                        @foreach($topProducts as $index => $product)
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                            <div class="flex items-center space-x-3">
                                <span class="flex items-center justify-center w-8 h-8 rounded-full
                                    {{ $index === 0 ? 'bg-yellow-400 text-white' : ($index === 1 ? 'bg-gray-400 text-white' : ($index === 2 ? 'bg-orange-400 text-white' : 'bg-gray-300 text-gray-700')) }}
                                    font-bold text-sm">
                                    {{ $index + 1 }}
                                </span>
                                <div>
                                    <p class="font-medium text-gray-900">{{ $product->name }}</p>
                                    <p class="text-xs text-gray-500">SKU: {{ $product->sku }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-lg font-bold text-blue-600">{{ number_format($product->quantity) }}</p>
                                <p class="text-xs text-gray-500">units</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Top 5 by Value -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Top 5 Products by Value
                    </h3>
                    <div class="space-y-3">
                        @foreach($topValueProducts as $index => $product)
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                            <div class="flex items-center space-x-3">
                                <span class="flex items-center justify-center w-8 h-8 rounded-full
                                    {{ $index === 0 ? 'bg-yellow-400 text-white' : ($index === 1 ? 'bg-gray-400 text-white' : ($index === 2 ? 'bg-orange-400 text-white' : 'bg-gray-300 text-gray-700')) }}
                                    font-bold text-sm">
                                    {{ $index + 1 }}
                                </span>
                                <div>
                                    <p class="font-medium text-gray-900">{{ $product->name }}</p>
                                    <p class="text-xs text-gray-500">{{ number_format($product->quantity) }} units × ${{ number_format($product->cost, 2) }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-lg font-bold text-green-600">${{ number_format($product->total_value, 2) }}</p>
                                <p class="text-xs text-gray-500">total value</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
            <!-- Product Quantities Chart -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Product Stock Levels</h3>
                    <div class="relative" style="height: 300px;">
                        <canvas id="productQuantitiesChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Inventory Value Chart -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Inventory Value Distribution</h3>
                    <div class="relative" style="height: 300px;">
                        <canvas id="inventoryValueChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stock Movement Chart (Full Width) -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Stock Movement Trends</h3>
                    <div class="mt-3 md:mt-0 flex items-center space-x-4">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-green-500 rounded-full mr-2"></div>
                            <span class="text-sm text-gray-600">Stock In</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-red-500 rounded-full mr-2"></div>
                            <span class="text-sm text-gray-600">Stock Out</span>
                        </div>
                    </div>
                </div>
                <div class="relative" style="height: 300px;">
                    <canvas id="stockMovementChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js Library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

<script>
    // Chart.js Global Configuration
    Chart.defaults.font.family = "'Inter', 'system-ui', 'sans-serif'";
    Chart.defaults.color = '#6B7280';

    // Chart 1: Product Quantities (Bar Chart)
    const productQuantitiesCtx = document.getElementById('productQuantitiesChart').getContext('2d');
    new Chart(productQuantitiesCtx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($productNames) !!},
            datasets: [{
                label: 'Quantity in Stock',
                data: {!! json_encode($productQuantities) !!},
                backgroundColor: 'rgba(59, 130, 246, 0.8)',
                borderColor: 'rgba(59, 130, 246, 1)',
                borderWidth: 2,
                borderRadius: 8,
                borderSkipped: false,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(17, 24, 39, 0.95)',
                    padding: 12,
                    cornerRadius: 8,
                    titleColor: '#fff',
                    bodyColor: '#fff',
                    borderColor: 'rgba(59, 130, 246, 0.5)',
                    borderWidth: 1
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.05)',
                        drawBorder: false
                    },
                    ticks: {
                        padding: 8,
                        font: {
                            size: 12
                        }
                    }
                },
                x: {
                    grid: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        padding: 8,
                        font: {
                            size: 12
                        }
                    }
                }
            }
        }
    });

    // Chart 2: Inventory Value (Pie Chart)
    const inventoryValueCtx = document.getElementById('inventoryValueChart').getContext('2d');
    const inventoryData = {!! json_encode($inventoryValues) !!};

    new Chart(inventoryValueCtx, {
        type: 'doughnut',
        data: {
            labels: inventoryData.map(item => item.name),
            datasets: [{
                label: 'Value ($)',
                data: inventoryData.map(item => parseFloat(item.total_value)),
                backgroundColor: [
                    'rgba(59, 130, 246, 0.8)',
                    'rgba(16, 185, 129, 0.8)',
                    'rgba(251, 146, 60, 0.8)',
                    'rgba(139, 92, 246, 0.8)',
                    'rgba(236, 72, 153, 0.8)',
                    'rgba(34, 197, 94, 0.8)',
                    'rgba(249, 115, 22, 0.8)',
                    'rgba(99, 102, 241, 0.8)'
                ],
                borderColor: '#fff',
                borderWidth: 3,
                hoverOffset: 10
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 15,
                        usePointStyle: true,
                        pointStyle: 'circle',
                        font: {
                            size: 12
                        }
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(17, 24, 39, 0.95)',
                    padding: 12,
                    cornerRadius: 8,
                    titleColor: '#fff',
                    bodyColor: '#fff',
                    borderColor: 'rgba(59, 130, 246, 0.5)',
                    borderWidth: 1,
                    callbacks: {
                        label: function(context) {
                            return context.label + ': $' + context.parsed.toFixed(2);
                        }
                    }
                }
            }
        }
    });

    // Chart 3: Stock Movement (Line Chart)
    const stockMovementCtx = document.getElementById('stockMovementChart').getContext('2d');
    const stockData = {!! json_encode($stockData) !!};

    new Chart(stockMovementCtx, {
        type: 'line',
        data: {
            labels: stockData.map(item => {
                const date = new Date(item.date);
                return date.toLocaleDateString('en-US', { month: 'short', day: 'numeric' });
            }),
            datasets: [
                {
                    label: 'Stock In',
                    data: stockData.map(item => item.stock_in),
                    borderColor: 'rgba(16, 185, 129, 1)',
                    backgroundColor: 'rgba(16, 185, 129, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointRadius: 5,
                    pointHoverRadius: 7,
                    pointBackgroundColor: 'rgba(16, 185, 129, 1)',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2
                },
                {
                    label: 'Stock Out',
                    data: stockData.map(item => item.stock_out),
                    borderColor: 'rgba(239, 68, 68, 1)',
                    backgroundColor: 'rgba(239, 68, 68, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointRadius: 5,
                    pointHoverRadius: 7,
                    pointBackgroundColor: 'rgba(239, 68, 68, 1)',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: {
                mode: 'index',
                intersect: false
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(17, 24, 39, 0.95)',
                    padding: 12,
                    cornerRadius: 8,
                    titleColor: '#fff',
                    bodyColor: '#fff',
                    borderColor: 'rgba(59, 130, 246, 0.5)',
                    borderWidth: 1
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.05)',
                        drawBorder: false
                    },
                    ticks: {
                        padding: 8,
                        font: {
                            size: 12
                        }
                    }
                },
                x: {
                    grid: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        padding: 8,
                        font: {
                            size: 12
                        }
                    }
                }
            }
        }
    });

    // Reset Filters Function
    function resetFilters() {
        window.location.href = '{{ route('reports.index') }}';
    }

    // Add smooth transitions on filter changes
    document.querySelectorAll('select').forEach(select => {
        select.addEventListener('change', function() {
            this.closest('form').style.opacity = '0.6';
        });
    });

    // Export to CSV Function
    function exportToCSV() {
        const productData = {!! json_encode($topProducts->map(function($p) {
            return ['name' => $p->name, 'sku' => $p->sku, 'quantity' => $p->quantity, 'cost' => $p->cost];
        })) !!};

        const csvContent = [
            ['Product Name', 'SKU', 'Quantity', 'Cost', 'Total Value'],
            ...productData.map(item => [
                item.name,
                item.sku,
                item.quantity,
                item.cost,
                (item.quantity * item.cost).toFixed(2)
            ])
        ].map(row => row.join(',')).join('\n');

        const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
        const link = document.createElement('a');
        const url = URL.createObjectURL(blob);

        link.setAttribute('href', url);
        link.setAttribute('download', 'inventory_report_' + new Date().toISOString().split('T')[0] + '.csv');
        link.style.visibility = 'hidden';

        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }

    // Print Styles
    const style = document.createElement('style');
    style.textContent = `
        @media print {
            body * { visibility: hidden; }
            .print-section, .print-section * { visibility: visible; }
            .print-section { position: absolute; left: 0; top: 0; width: 100%; }
            button, .no-print { display: none !important; }
        }
    `;
    document.head.appendChild(style);

    // Add animation on load
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.bg-white, .bg-gradient-to-br');
        cards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            setTimeout(() => {
                card.style.transition = 'all 0.5s ease';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, index * 50);
        });
    });
</script>
@endsection
