@extends('layouts.app')

@section('title', 'Products')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Header Section -->
        <x-page-header
            title="Products"
            subtitle="Manage your product inventory"
            :action-route="route('products.create')"
            action-text="Add Product" />

        <!-- Success Message -->
        <x-success-alert :message="session('success')" />

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
            <x-statistics-card
                title="Total Products"
                :value="$totalProducts"
                color="blue">
                <x-slot name="icon">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </x-slot>
            </x-statistics-card>

            <x-statistics-card
                title="Total Value"
                :value="'$' . number_format($totalValue, 2)"
                color="green">
                <x-slot name="icon">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </x-slot>
            </x-statistics-card>

            <x-statistics-card
                title="Low Stock"
                :value="$lowStockCount"
                color="yellow">
                <x-slot name="icon">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </x-slot>
            </x-statistics-card>

            <x-statistics-card
                title="Out of Stock"
                :value="$outOfStockCount"
                color="red">
                <x-slot name="icon">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </x-slot>
            </x-statistics-card>
        </div>

        <!-- Search and Filters -->
        <x-product-filters
            :route="route('products.index')"
            :categories="$categories"
            :suppliers="$suppliers" />

        <!-- Products Table -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Product
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                SKU
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Category
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Pricing
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Stock
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Supplier
                            </th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($products as $product)
                            <x-product-table-row :product="$product" />
                        @empty
                            <x-empty-state
                                title="No products found"
                                message="Get started by creating a new product."
                                :action-route="route('products.create')"
                                action-text="Add Product" />
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination Links -->
            @if($products->hasPages())
                <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                    {{ $products->links() }}
                </div>
            @endif
        </div>


    </div>
</div>
@endsection
