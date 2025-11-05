@props([
    'label',
    'name',
    'value' => '',
    'required' => false,
    'placeholder' => '',
    'rows' => 3
])

<div class="mb-6">
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 mb-2">
        {{ $label }}
        @if($required)
            <span class="text-red-500">*</span>
        @endif
    </label>
    <div class="relative">
        @isset($icon)
            <div class="absolute top-3 left-3 pointer-events-none">
                {{ $icon }}
            </div>
        @endisset
        <textarea
            name="{{ $name }}"
            id="{{ $name }}"
            rows="{{ $rows }}"
            {{ $required ? 'required' : '' }}
            @isset($icon)
                class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition @error($name) border-red-500 @enderror"
            @else
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition @error($name) border-red-500 @enderror"
            @endisset
            placeholder="{{ $placeholder }}">{{ old($name, $value) }}</textarea>
    </div>
    @error($name)
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
