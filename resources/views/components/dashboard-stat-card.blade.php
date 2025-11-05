@props(['title', 'value', 'color' => 'blue'])

@php
    $gradients = [
        'blue' => 'from-blue-500 to-blue-600',
        'purple' => 'from-purple-500 to-purple-600',
        'green' => 'from-green-500 to-green-600',
        'orange' => 'from-orange-500 to-orange-600',
        'red' => 'from-red-500 to-red-600',
        'indigo' => 'from-indigo-500 to-indigo-600',
    ];

    $gradient = $gradients[$color] ?? $gradients['blue'];
    $colorClass = $color . '-100';
    $borderColor = $color . '-400';
@endphp

<div class="relative overflow-hidden bg-gradient-to-br {{ $gradient }} rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
    <div class="p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-{{ $color }}-100 text-sm font-medium mb-1">{{ $title }}</p>
                <h3 class="text-4xl font-bold text-white">{{ $value }}</h3>
            </div>
            <div class="bg-white bg-opacity-20 rounded-full p-4">
                {{ $slot }}
            </div>
        </div>
    </div>
    <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-{{ $color }}-400 to-{{ $color }}-300"></div>
</div>
