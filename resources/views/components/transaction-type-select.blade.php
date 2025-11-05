@props(['name', 'value' => '', 'required' => false])

<div class="mb-6">
    <label class="block text-sm font-medium text-gray-700 mb-2">
        Transaction Type
        @if($required)
            <span class="text-red-500">*</span>
        @endif
    </label>
    <div class="grid grid-cols-2 gap-4">
        <!-- Stock In Option -->
        <label class="relative flex cursor-pointer rounded-lg border border-gray-300 bg-white p-4 shadow-sm focus-within:ring-2 focus-within:ring-blue-500 hover:border-gray-400 transition">
            <input type="radio" name="{{ $name }}" value="in" {{ old($name, $value) == 'in' ? 'checked' : '' }} class="sr-only" {{ $required ? 'required' : '' }}>
            <span class="flex flex-1">
                <span class="flex flex-col">
                    <span class="flex items-center text-sm font-medium text-gray-900">
                        <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"/>
                        </svg>
                        Stock In
                    </span>
                    <span class="mt-1 flex items-center text-xs text-gray-500">Add inventory</span>
                </span>
            </span>
            <svg class="h-5 w-5 text-green-600 hidden" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
        </label>

        <!-- Stock Out Option -->
        <label class="relative flex cursor-pointer rounded-lg border border-gray-300 bg-white p-4 shadow-sm focus-within:ring-2 focus-within:ring-blue-500 hover:border-gray-400 transition">
            <input type="radio" name="{{ $name }}" value="out" {{ old($name, $value) == 'out' ? 'checked' : '' }} class="sr-only">
            <span class="flex flex-1">
                <span class="flex flex-col">
                    <span class="flex items-center text-sm font-medium text-gray-900">
                        <svg class="h-5 w-5 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 13l-5 5m0 0l-5-5m5 5V6"/>
                        </svg>
                        Stock Out
                    </span>
                    <span class="mt-1 flex items-center text-xs text-gray-500">Remove inventory</span>
                </span>
            </span>
            <svg class="h-5 w-5 text-red-600 hidden" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
        </label>
    </div>
    @error($name)
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<style>
    input[type="radio"]:checked + span {
        border-color: #3B82F6;
    }
    input[type="radio"]:checked ~ svg {
        display: block;
    }
    label:has(input[type="radio"]:checked) {
        border-color: #3B82F6;
        background-color: #EFF6FF;
    }
</style>
