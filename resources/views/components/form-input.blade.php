@props([
    'label',
    'name',
    'type' => 'text',
    'value' => '',
    'required' => false,
    'placeholder' => '',
    'icon' => null,
    'prefix' => null,
    'step' => null,
    'colspan' => 1
])

@php
    $colspanClass = $colspan === 2 ? 'md:col-span-2' : '';
@endphp

<div class="{{ $colspanClass }}">
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
        @elseif($prefix)
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <span class="text-gray-500 sm:text-sm">{{ $prefix }}</span>
            </div>
        @endif

        <input type="{{ $type }}"
               name="{{ $name }}"
               id="{{ $name }}"
               value="{{ $value }}"
               @if($step) step="{{ $step }}" @endif
               class="w-full {{ $icon ? 'pl-10' : ($prefix ? 'pl-7' : 'pl-4') }} pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition @error($name) border-red-500 @enderror"
               @if($required) required @endif
               placeholder="{{ $placeholder }}">
    </div>
    @error($name)
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
