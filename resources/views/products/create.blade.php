@extends('layouts.app')

@section('title', 'Add Product')

@section('content')
<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <!-- Header -->
        <x-form-header
            title="Add New Product"
            subtitle="Fill in the product information below"
            :backUrl="route('products.index')" />

        <!-- Form Card -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-8">
                <form action="{{ route('products.store') }}" method="POST">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Name Field -->
                        <x-form-input
                            label="Product Name"
                            name="name"
                            :value="old('name')"
                            placeholder="Enter product name"
                            :required="true"
                            :colspan="2" />

                        <!-- SKU Field -->
                        <x-form-input
                            label="SKU"
                            name="sku"
                            :value="old('sku')"
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
                            :value="old('category')"
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
                            :value="old('cost')"
                            placeholder="0.00"
                            prefix="$"
                            :required="true" />

                        <!-- Price Field -->
                        <x-form-input
                            label="Selling Price"
                            name="price"
                            type="number"
                            step="0.01"
                            :value="old('price')"
                            placeholder="0.00"
                            prefix="$"
                            :required="true" />

                        <!-- Quantity Field -->
                        <x-form-input
                            label="Initial Quantity"
                            name="quantity"
                            type="number"
                            :value="old('quantity', 0)"
                            placeholder="0"
                            :required="true">
                            <x-slot name="icon">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                            </x-slot>
                        </x-form-input>

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
                                <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                                    {{ $supplier->name }}
                                </option>
                            @endforeach
                        </x-form-select>
                    </div>

                    <!-- Action Buttons -->
                    <x-form-actions
                        :cancelUrl="route('products.index')"
                        submitText="Save Product" />
                </form>
            </div>
        </div>

        <!-- Info Box -->
        <x-info-box type="info">
            <strong>Tip:</strong> Make sure the SKU is unique. The selling price should be higher than the cost price for profit margin.
        </x-info-box>
    </div>
</div>
@endsection
