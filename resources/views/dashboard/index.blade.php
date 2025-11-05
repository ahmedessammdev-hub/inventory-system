@extends('layouts.app')

@section('content')
<div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Page Header -->
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-900">Dashboard</h2>
            <p class="mt-2 text-gray-600">Welcome back! Here's what's happening with your inventory today.</p>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Total Products Card -->
            <x-dashboard-stat-card
                title="Total Products"
                :value="$totalProducts"
                color="blue">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                </svg>
            </x-dashboard-stat-card>

            <!-- Total Suppliers Card -->
            <x-dashboard-stat-card
                title="Total Suppliers"
                :value="$totalSuppliers"
                color="purple">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
            </x-dashboard-stat-card>

            <!-- Total Inventory Value Card -->
            <x-dashboard-stat-card
                title="Inventory Value"
                :value="'$' . number_format($totalInventoryValue, 2)"
                color="green">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </x-dashboard-stat-card>
        </div>

        <!-- Quick Actions & Low Stock Row -->
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 mb-8">
            <!-- Quick Actions Section -->
            <div class="lg:col-span-3">
                <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-lg overflow-hidden border border-gray-100">
                    <x-section-header
                        title="Quick Actions"
                        subtitle="Frequently used features"
                        color="indigo">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </x-section-header>
                    <div class="p-6">
                        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
                    <!-- Add Product - Admin/Warehouse Manager only -->
                    @if(auth()->user()->hasAnyRole(['admin', 'warehouse_manager']))
                    <div class="group bg-white rounded-xl p-4 text-center border border-gray-200 hover:border-blue-300 hover:shadow-md transition-all duration-300 cursor-pointer" onclick="window.location.href='{{ route('products.create') }}'">
                        <div class="w-12 h-12 mx-auto mb-3 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                            </svg>
                        </div>
                        <h4 class="font-semibold text-gray-900 text-sm mb-1">Add Product</h4>
                        <p class="text-xs text-gray-500">Create new product</p>
                    </div>
                    @endif



                    <!-- Stock In - Admin/Warehouse Manager only -->
                    @if(auth()->user()->hasAnyRole(['admin', 'warehouse_manager']))
                    <div class="group bg-white rounded-xl p-4 text-center border border-gray-200 hover:border-green-300 hover:shadow-md transition-all duration-300 cursor-pointer" onclick="window.location.href='{{ route('stock.create') }}?type=in'">
                        <div class="w-12 h-12 mx-auto mb-3 bg-gradient-to-br from-green-500 to-green-600 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M7 11l5-5m0 0l5 5m-5-5v12"/>
                            </svg>
                        </div>
                        <h4 class="font-semibold text-gray-900 text-sm mb-1">Stock In</h4>
                        <p class="text-xs text-gray-500">Add stock entry</p>
                    </div>
                    @endif

                    <!-- Stock Out - Admin/Warehouse Manager only -->
                    @if(auth()->user()->hasAnyRole(['admin', 'warehouse_manager']))
                    <div class="group bg-white rounded-xl p-4 text-center border border-gray-200 hover:border-orange-300 hover:shadow-md transition-all duration-300 cursor-pointer" onclick="window.location.href='{{ route('stock.create') }}?type=out'">
                        <div class="w-12 h-12 mx-auto mb-3 bg-gradient-to-br from-orange-500 to-orange-600 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 13l-5 5m0 0l-5-5m5 5V6"/>
                            </svg>
                        </div>
                        <h4 class="font-semibold text-gray-900 text-sm mb-1">Stock Out</h4>
                        <p class="text-xs text-gray-500">Remove stock entry</p>
                    </div>
                    @endif

                    <!-- All Products - All authenticated users -->
                    <div class="group bg-white rounded-xl p-4 text-center border border-gray-200 hover:border-cyan-300 hover:shadow-md transition-all duration-300 cursor-pointer" onclick="window.location.href='{{ route('products.index') }}'">
                        <div class="w-12 h-12 mx-auto mb-3 bg-gradient-to-br from-cyan-500 to-cyan-600 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>
                        <h4 class="font-semibold text-gray-900 text-sm mb-1">All Products</h4>
                        <p class="text-xs text-gray-500">View products</p>
                    </div>



                    <!-- Transactions - Admin/Warehouse Manager only -->
                    @if(auth()->user()->hasAnyRole(['admin', 'warehouse_manager']))
                    <div class="group bg-white rounded-xl p-4 text-center border border-gray-200 hover:border-indigo-300 hover:shadow-md transition-all duration-300 cursor-pointer" onclick="window.location.href='{{ route('stock.index') }}'">
                        <div class="w-12 h-12 mx-auto mb-3 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                        </div>
                        <h4 class="font-semibold text-gray-900 text-sm mb-1">Transactions</h4>
                        <p class="text-xs text-gray-500">View history</p>
                    </div>
                    @endif



                    <!-- Users - Admin only -->
                    @if(auth()->user()->isAdmin())
                    <div class="group bg-white rounded-xl p-4 text-center border border-gray-200 hover:border-red-300 hover:shadow-md transition-all duration-300 cursor-pointer" onclick="window.location.href='{{ route('users.index') }}'">
                        <div class="w-12 h-12 mx-auto mb-3 bg-gradient-to-br from-red-500 to-red-600 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                            </svg>
                        </div>
                        <h4 class="font-semibold text-gray-900 text-sm mb-1">Users</h4>
                        <p class="text-xs text-gray-500">Manage users</p>
                    </div>
                    @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Low Stock Products Section -->
            <div class="xl:col-span-1">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden h-fit">
                    <x-section-header
                        title="Low Stock Products"
                        color="orange">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                    </x-section-header>
                    <div class="max-h-96 overflow-y-auto">
                        <div class="divide-y divide-gray-200">
                            @forelse($lowStock as $p)
                                <x-low-stock-item :product="$p" />
                            @empty
                                <div class="p-6 text-center">
                                    <svg class="w-10 h-10 text-green-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <p class="text-sm text-gray-500 font-medium">No low-stock products! 🎉</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Transactions -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <x-section-header
                title="Recent Transactions"
                color="blue">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                </svg>
            </x-section-header>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date & Time</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($recentTransactions as $t)
                            <x-transaction-row :transaction="$t" />
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
