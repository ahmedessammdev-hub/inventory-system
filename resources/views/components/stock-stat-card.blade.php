@props(['icon', 'label', 'value', 'color' => 'blue'])

@php
    $colors = [
        'blue' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-600'],
        'green' => ['bg' => 'bg-green-100', 'text' => 'text-green-600'],
        'red' => ['bg' => 'bg-red-100', 'text' => 'text-red-600'],
        'purple' => ['bg' => 'bg-purple-100', 'text' => 'text-purple-600'],
        'orange' => ['bg' => 'bg-orange-100', 'text' => 'text-orange-600'],
        'indigo' => ['bg' => 'bg-indigo-100', 'text' => 'text-indigo-600'],
    ];
    $colorClasses = $colors[$color] ?? $colors['blue'];
@endphp

<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
    <div class="flex items-center">
        <div class="flex-shrink-0 {{ $colorClasses['bg'] }} rounded-lg p-3">
            {{ $icon }}
        </div>
        <div class="ml-4">
            <p class="text-sm text-gray-600">{{ $label }}</p>
            <p class="text-2xl font-bold {{ $colorClasses['text'] }}">{{ $value }}</p>
        </div>
    </div>
</div>
