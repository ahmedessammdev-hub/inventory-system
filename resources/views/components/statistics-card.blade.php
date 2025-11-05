@props(['icon', 'title', 'value', 'color' => 'blue'])

@php
    $colorClasses = [
        'blue' => 'bg-blue-100 text-blue-600',
        'green' => 'bg-green-100 text-green-600',
        'yellow' => 'bg-yellow-100 text-yellow-600',
        'red' => 'bg-red-100 text-red-600',
        'purple' => 'bg-purple-100 text-purple-600',
    ];
    $iconColorClass = $colorClasses[$color] ?? $colorClasses['blue'];
@endphp

<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
    <div class="flex items-center">
        <div class="flex-shrink-0 {{ $iconColorClass }} rounded-lg p-3">
            {{ $icon }}
        </div>
        <div class="ml-4">
            <p class="text-sm text-gray-600">{{ $title }}</p>
            <p class="text-2xl font-bold text-gray-900">{{ $value }}</p>
        </div>
    </div>
</div>
