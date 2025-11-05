@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
<div class="py-12">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <!-- Header Section -->
        <x-page-header
            title="Edit User: {{ $user->name }}"
            subtitle="Update user information and role">
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
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('users.update', $user) }}" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <x-form-input
                            label="Name"
                            name="name"
                            :value="old('name', $user->name)"
                            required />

                        <!-- Email -->
                        <x-form-input
                            label="Email"
                            name="email"
                            type="email"
                            :value="old('email', $user->email)"
                            required />

                        <!-- Password -->
                        <div>
                            <x-form-input
                                label="Password"
                                name="password"
                                type="password"
                                placeholder="Leave blank to keep current password" />
                            <p class="mt-1 text-sm text-gray-500">Leave blank to keep the current password. Minimum 6 characters if changing.</p>
                        </div>

                        <!-- Role -->
                        <x-form-select
                            label="Role"
                            name="role"
                            :value="old('role', $user->role)"
                            required>
                            <option value="">Select a role</option>
                            <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="warehouse_manager" {{ old('role', $user->role) == 'warehouse_manager' ? 'selected' : '' }}>Warehouse Manager</option>
                        </x-form-select>

                        <!-- Role Description -->
                        <x-alert-box type="info">
                            <strong>Admin:</strong> Full access to all features including user management, suppliers, products, and reports.<br>
                            <strong>Warehouse Manager:</strong> Access to products, stock management, and reports.
                        </x-alert-box>

                        <!-- Current User Warning -->
                        @if($user->id === auth()->id())
                            <x-alert-box type="warning">
                                <strong>Warning:</strong> You are editing your own account. Be careful when changing your role or you might lose access to certain features.
                            </x-alert-box>
                        @endif

                        <!-- Submit Button -->
                        <x-form-actions
                            cancelUrl="{{ route('users.index') }}"
                            submitText="Update User"
                            submitColor="blue" />
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
