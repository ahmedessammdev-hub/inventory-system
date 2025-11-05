@props([
    'label',
    'name',
    'value' => '',
    'required' => false,
    'icon' => null,
    'options' => [],
    'placeholder' => 'Select an option'
])

<div>
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 mb-2">
        {{ $label }}
        @if($required)
            <span class="text-red-500">*</span>
        @endif
    </label>
    <div class="relative">
        @if($icon)
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                {{ $icon }}
            </div>
        @endif

        <select name="{{ $name }}"
                id="{{ $name }}"
                class="w-full {{ $icon ? 'pl-10' : 'pl-4' }} pr-10 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition @error($name) border-red-500 @enderror appearance-none"
                @if($required) required @endif>
            <option value="">{{ $placeholder }}</option>
            {{ $slot }}
        </select>

        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </div>
    </div>
    @error($name)
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
