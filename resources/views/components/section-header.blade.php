@props(['title', 'subtitle' => null, 'color' => 'blue'])

@php
    $colorClasses = [
        'blue' => ['gradient' => 'from-blue-50 to-indigo-50', 'border' => 'border-blue-100', 'icon' => 'text-blue-600'],
        'orange' => ['gradient' => 'from-orange-50 to-red-50', 'border' => 'border-orange-100', 'icon' => 'text-orange-500'],
        'purple' => ['gradient' => 'from-purple-50 to-pink-50', 'border' => 'border-purple-100', 'icon' => 'text-purple-600'],
        'green' => ['gradient' => 'from-green-50 to-emerald-50', 'border' => 'border-green-100', 'icon' => 'text-green-600'],
        'indigo' => ['gradient' => 'from-indigo-600 via-purple-600 to-pink-600', 'border' => 'border-transparent', 'icon' => 'text-white'],
    ];

    $colors = $colorClasses[$color] ?? $colorClasses['blue'];
@endphp

<div class="relative bg-gradient-to-r {{ $colors['gradient'] }} px-6 py-4 border-b {{ $colors['border'] }}">
    @if($color === 'indigo')
        <div class="absolute inset-0 bg-black opacity-10"></div>
    @endif
    <div class="{{ $color === 'indigo' ? 'relative' : '' }} flex items-center">
        @if(isset($icon))
            <div class="{{ $color === 'indigo' ? 'bg-white bg-opacity-20 backdrop-blur-sm' : 'flex-shrink-0' }} rounded-lg p-2 {{ $color === 'indigo' ? 'mr-3' : '' }}">
                {{ $icon }}
            </div>
        @endif
        <div {{ $color === 'indigo' ? '' : 'class=ml-3' }}>
            <h3 class="text-lg font-bold {{ $color === 'indigo' ? 'text-white' : 'text-gray-900' }}">{{ $title }}</h3>
            @if($subtitle)
                <p class="text-sm {{ $color === 'indigo' ? 'text-indigo-100' : 'text-gray-600' }}">{{ $subtitle }}</p>
            @endif
        </div>
    </div>
</div>
