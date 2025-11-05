@props(['title', 'value', 'color' => 'blue'])

@php
    $colors = [
        'blue' => 'bg-blue-100 text-blue-600',
        'green' => 'bg-green-100 text-green-600',
        'yellow' => 'bg-yellow-100 text-yellow-600',
        'purple' => 'bg-purple-100 text-purple-600',
        'orange' => 'bg-orange-100 text-orange-600',
        'red' => 'bg-red-100 text-red-600',
    ];

    $colorClass = $colors[$color] ?? $colors['blue'];
@endphp

<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
    <div class="flex items-center">
        <div class="flex-shrink-0 {{ $colorClass }} rounded-lg p-3">
            {{ $slot }}
        </div>
        <div class="ml-4">
            <p class="text-sm text-gray-600">{{ $title }}</p>
            <p class="text-2xl font-bold text-gray-900">{{ $value }}</p>
        </div>
    </div>
</div>
