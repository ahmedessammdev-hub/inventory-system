@props(['type' => 'info'])

@php
    $colors = [
        'info' => ['bg' => 'bg-blue-50', 'border' => 'border-blue-200', 'icon' => 'text-blue-400', 'text' => 'text-blue-700'],
        'warning' => ['bg' => 'bg-yellow-50', 'border' => 'border-yellow-200', 'icon' => 'text-yellow-400', 'text' => 'text-yellow-700'],
        'success' => ['bg' => 'bg-green-50', 'border' => 'border-green-200', 'icon' => 'text-green-400', 'text' => 'text-green-700'],
        'danger' => ['bg' => 'bg-red-50', 'border' => 'border-red-200', 'icon' => 'text-red-400', 'text' => 'text-red-700'],
    ];
    $color = $colors[$type];
@endphp

<div class="mt-6 {{ $color['bg'] }} border {{ $color['border'] }} rounded-lg p-4">
    <div class="flex">
        <div class="flex-shrink-0">
            <svg class="h-5 w-5 {{ $color['icon'] }}" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
            </svg>
        </div>
        <div class="ml-3">
            <p class="text-sm {{ $color['text'] }}">
                {{ $slot }}
            </p>
        </div>
    </div>
</div>
