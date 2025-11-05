@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        <!-- Header -->
        <x-form-header
            title="New Stock Transaction"
            subtitle="Record inventory movement or adjustment"
            :backUrl="route('stock.index')" />

        <!-- Form Card -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-8">
                <form action="{{ route('stock.store') }}" method="POST">
                    @csrf

                    <!-- Product Field -->
                    <div class="mb-6">
                        <x-form-select
                            label="Product"
                            name="product_id"
                            :value="old('product_id')"
                            required>
                            <x-slot:icon>
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                            </x-slot:icon>
                            <option value="">Select a product</option>
                            @foreach($products as $p)
                                <option value="{{ $p->id }}">
                                    {{ $p->name }} (Current Stock: {{ $p->quantity }})
                                </option>
                            @endforeach
                        </x-form-select>
                    </div>

                    <!-- Type Field -->
                    <x-transaction-type-select
                        name="type"
                        :value="old('type')"
                        required />

                    <!-- Quantity Field -->
                    <x-form-input
                        label="Quantity"
                        name="quantity"
                        type="number"
                        :value="old('quantity')"
                        placeholder="Enter quantity"
                        required>
                        <x-slot:icon>
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                            </svg>
                        </x-slot:icon>
                    </x-form-input>

                    <!-- Reason Field -->
                    <x-form-textarea
                        label="Reason / Notes"
                        name="reason"
                        :value="old('reason')"
                        placeholder="e.g., New shipment arrived, Damaged goods, Customer return, etc."
                        :rows="3">
                        <x-slot:icon>
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </x-slot:icon>
                    </x-form-textarea>

                    <!-- Action Buttons -->
                    <x-form-actions
                        cancelUrl="{{ route('stock.index') }}"
                        submitText="Record Transaction"
                        submitColor="blue" />
                </form>
            </div>
        </div>

        <!-- Warning Box -->
        <div class="mt-6">
            <x-alert-box type="warning">
                <strong>Important:</strong> Stock Out transactions will be prevented if there is insufficient inventory. The system will automatically update the product quantity based on this transaction.
            </x-alert-box>
        </div>
    </div>
</div>
@endsection
