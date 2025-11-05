@props(['type' => 'info', 'title' => null])

@php
    $styles = [
        'info' => 'bg-blue-50 border-blue-400 text-blue-700',
        'warning' => 'bg-yellow-50 border-yellow-400 text-yellow-700',
        'error' => 'bg-red-50 border-red-400 text-red-700',
        'success' => 'bg-green-50 border-green-400 text-green-700',
    ];

    $icons = [
        'info' => 'M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z',
        'warning' => 'M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z',
        'error' => 'M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z',
        'success' => 'M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z',
    ];

    $colorClass = $styles[$type] ?? $styles['info'];
    $iconPath = $icons[$type] ?? $icons['info'];
@endphp

<div class="border-l-4 p-4 rounded-r-lg {{ $colorClass }}">
    <div class="flex">
        <div class="flex-shrink-0">
            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="{{ $iconPath }}" clip-rule="evenodd"/>
            </svg>
        </div>
        <div class="ml-3">
            @if($title)
                <p class="text-sm font-semibold mb-1">{{ $title }}</p>
            @endif
            <div class="text-sm">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
