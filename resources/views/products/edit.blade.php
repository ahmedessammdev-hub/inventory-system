@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <!-- Header -->
        <x-form-header
            title="Edit Product"
            subtitle="Update the product information below"
            :backUrl="route('products.index')" />

        <!-- Form Card -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-8">
                <form action="{{ route('products.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Name Field -->
                        <x-form-input
                            label="Product Name"
                            name="name"
                            :value="old('name', $product->name)"
                            placeholder="Enter product name"
                            :required="true"
                            :colspan="2" />

                        <!-- SKU Field -->
                        <x-form-input
                            label="SKU"
                            name="sku"
                            :value="old('sku', $product->sku)"
                            placeholder="e.g., PROD-001"
                            :required="true">
                            <x-slot name="icon">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                                </svg>
                            </x-slot>
                        </x-form-input>

                        <!-- Category Field -->
                        <x-form-input
                            label="Category"
                            name="category"
                            :value="old('category', $product->category)"
                            placeholder="e.g., Electronics">
                            <x-slot name="icon">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                </svg>
                            </x-slot>
                        </x-form-input>

                        <!-- Cost Field -->
                        <x-form-input
                            label="Cost Price"
                            name="cost"
                            type="number"
                            step="0.01"
                            :value="old('cost', $product->cost)"
                            placeholder="0.00"
                            prefix="$"
                            :required="true" />

                        <!-- Price Field -->
                        <x-form-input
                            label="Selling Price"
                            name="price"
                            type="number"
                            step="0.01"
                            :value="old('price', $product->price)"
                            placeholder="0.00"
                            prefix="$"
                            :required="true" />

                        <!-- Quantity Field (Read-only) -->
                        <div class="relative">
                            <label for="quantity" class="block text-sm font-medium text-gray-700 mb-1">
                                Current Quantity
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                    </svg>
                                </div>
                                <input
                                    type="number"
                                    id="quantity"
                                    value="{{ $product->quantity }}"
                                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md bg-gray-100 text-gray-600 cursor-not-allowed"
                                    disabled
                                    readonly>
                            </div>
                            <p class="mt-1 text-sm text-blue-600">
                                <svg class="inline-block h-4 w-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                Quantity can only be changed through Stock Transactions
                            </p>
                        </div>

                        <!-- Supplier Field -->
                        <x-form-select
                            label="Supplier"
                            name="supplier_id"
                            :required="true"
                            placeholder="Select a supplier">
                            <x-slot name="icon">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                            </x-slot>
                            @foreach($suppliers as $supplier)
                                <option value="{{ $supplier->id }}" {{ old('supplier_id', $product->supplier_id) == $supplier->id ? 'selected' : '' }}>
                                    {{ $supplier->name }}
                                </option>
                            @endforeach
                        </x-form-select>
                    </div>

                    <!-- Action Buttons -->
                    <x-form-actions
                        :cancelUrl="route('products.index')"
                        submitText="Update Product" />
                </form>
            </div>
        </div>

        <!-- Product Info Summary -->
        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-gray-700">
                            <strong>Product ID:</strong> #{{ $product->id }}<br>
                            <strong>Created:</strong> {{ $product->created_at->format('M d, Y') }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"/>
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-blue-700">
                            <strong>Profit Margin:</strong> ${{ number_format($product->price - $product->cost, 2) }}
                            ({{ $product->cost > 0 ? number_format((($product->price - $product->cost) / $product->cost) * 100, 1) : 0 }}%)
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
