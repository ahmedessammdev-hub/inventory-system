@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <!-- Header Section -->
        <x-page-header
            title="Create New User"
            subtitle="Add a new user to the system">
            <x-slot:action>
                <a href="{{ route('users.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white font-semibold rounded-lg shadow-md transition duration-150 ease-in-out">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Back to Users
                </a>
            </x-slot:action>
        </x-page-header>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <form method="POST" action="{{ route('users.store') }}" class="space-y-6">
                    @csrf

                    <!-- Name -->
                    <x-form-input
                        label="Name"
                        name="name"
                        type="text"
                        :value="old('name')"
                        :required="true"
                        placeholder="Enter user name" />

                    <!-- Email -->
                    <x-form-input
                        label="Email"
                        name="email"
                        type="email"
                        :value="old('email')"
                        :required="true"
                        placeholder="user@example.com" />

                    <!-- Password -->
                    <x-form-input
                        label="Password"
                        name="password"
                        type="password"
                        :required="true"
                        placeholder="Minimum 6 characters" />

                    <!-- Role -->
                    <x-form-select
                        label="Role"
                        name="role"
                        :value="old('role')"
                        :required="true"
                        placeholder="Select a role">
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="warehouse_manager" {{ old('role') == 'warehouse_manager' ? 'selected' : '' }}>Warehouse Manager</option>
                    </x-form-select>

                    <!-- Role Description -->
                    <x-alert-box type="info">
                        <strong>Admin:</strong> Full access to all features including user management, suppliers, products, and reports.<br>
                        <strong>Warehouse Manager:</strong> Access to products, stock management, and reports.
                    </x-alert-box>

                    <!-- Submit Buttons -->
                    <x-form-actions
                        :cancelUrl="route('users.index')"
                        submitText="Create User" />
                </form>
            </div>
        </div>
        </div>
    </div>
@endsection
