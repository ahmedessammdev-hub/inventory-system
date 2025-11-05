<x-guest-layout title="Register">
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Create Account</h1>
        <p class="text-gray-600">Join us and start managing your inventory</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <!-- Name -->
        <div class="space-y-2">
            <x-input-label for="name" :value="__('Full Name')" class="text-sm font-medium text-gray-700" />
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <x-text-input id="name"
                    class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                    type="text"
                    name="name"
                    :value="old('name')"
                    placeholder="Enter your full name"
                    required
                    autofocus
                    autocomplete="name" />
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="space-y-2">
            <x-input-label for="email" :value="__('Email Address')" class="text-sm font-medium text-gray-700" />
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                    </svg>
                </div>
                <x-text-input id="email"
                    class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                    type="email"
                    name="email"
                    :value="old('email')"
                    placeholder="Enter your email address"
                    required
                    autocomplete="username" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="space-y-2">
            <x-input-label for="password" :value="__('Password')" class="text-sm font-medium text-gray-700" />
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <x-text-input id="password"
                    class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                    type="password"
                    name="password"
                    placeholder="Choose a strong password"
                    required
                    autocomplete="new-password" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="space-y-2">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-sm font-medium text-gray-700" />
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <x-text-input id="password_confirmation"
                    class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                    type="password"
                    name="password_confirmation"
                    placeholder="Confirm your password"
                    required
                    autocomplete="new-password" />
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Submit Button -->
        <div class="space-y-4">
            <button type="submit"
                class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition duration-200 transform hover:scale-[1.02] active:scale-[0.98]">
                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                    <svg class="h-5 w-5 text-green-300 group-hover:text-green-200 transition duration-200"
                         fill="currentColor" viewBox="0 0 20 20">
                        <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
                    </svg>
                </span>
                {{ __('Create Account') }}
            </button>
        </div>
    </form>

    <!-- Additional Links -->
    <div class="mt-8 text-center">
        <p class="text-sm text-gray-600">
            Already have an account?
            <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-500 transition duration-200 hover:underline">
                Sign in here
            </a>
        </p>
    </div>
</x-guest-layout>
