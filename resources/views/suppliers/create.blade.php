@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        <!-- Header -->
        <x-form-header
            title="Add New Supplier"
            subtitle="Fill in the information below to create a new supplier"
            :backUrl="route('suppliers.index')" />

        <!-- Form Card -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-8">
                <form action="{{ route('suppliers.store') }}" method="POST">
                    @csrf

                    <!-- Name Field -->
                    <x-form-input
                        label="Name"
                        name="name"
                        type="text"
                        :value="old('name')"
                        :required="true"
                        placeholder="Enter supplier name" />

                    <!-- Email Field -->
                    <x-form-input
                        label="Email"
                        name="email"
                        type="email"
                        :value="old('email')"
                        placeholder="supplier@example.com">
                        <x-slot name="icon">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </x-slot>
                    </x-form-input>

                    <!-- Phone Field -->
                    <x-form-input
                        label="Phone"
                        name="phone"
                        type="text"
                        :value="old('phone')"
                        placeholder="+1 234 567 8900">
                        <x-slot name="icon">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </x-slot>
                    </x-form-input>

                    <!-- Address Field -->
                    <div class="mb-6">
                        <label for="address" class="block text-sm font-medium text-gray-700 mb-2">
                            Address
                        </label>
                        <div class="relative">
                            <div class="absolute top-3 left-3 pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <textarea name="address"
                                      id="address"
                                      rows="3"
                                      class="w-full pl-10 pr-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition @error('address') border-red-500 @else border-gray-300 @enderror"
                                      placeholder="Enter full address">{{ old('address') }}</textarea>
                        </div>
                        @error('address')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Action Buttons -->
                    <x-form-actions
                        :cancelUrl="route('suppliers.index')"
                        submitText="Save Supplier" />
                </form>
            </div>
        </div>

        <!-- Info Box -->
        <x-info-box type="info">
            <strong>Note:</strong> Only the name field is required. You can add other details later by editing the supplier.
        </x-info-box>
    </div>
</div>
@endsection
