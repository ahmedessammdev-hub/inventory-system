@props(['title', 'subtitle', 'url', 'color' => 'blue'])

@php
    $gradients = [
        'blue' => 'from-blue-500 to-blue-600',
        'green' => 'from-green-500 to-green-600',
        'orange' => 'from-orange-500 to-orange-600',
        'cyan' => 'from-cyan-500 to-cyan-600',
        'indigo' => 'from-indigo-500 to-indigo-600',
        'red' => 'from-red-500 to-red-600',
        'purple' => 'from-purple-500 to-purple-600',
    ];

    $borderColors = [
        'blue' => 'border-blue-300',
        'green' => 'border-green-300',
        'orange' => 'border-orange-300',
        'cyan' => 'border-cyan-300',
        'indigo' => 'border-indigo-300',
        'red' => 'border-red-300',
        'purple' => 'border-purple-300',
    ];

    $gradient = $gradients[$color] ?? $gradients['blue'];
    $borderColor = $borderColors[$color] ?? $borderColors['blue'];
@endphp

<div class="group bg-white rounded-xl p-4 text-center border border-gray-200 hover:{{ $borderColor }} hover:shadow-md transition-all duration-300 cursor-pointer" onclick="window.location.href='{{ $url }}'">
    <div class="w-12 h-12 mx-auto mb-3 bg-gradient-to-br {{ $gradient }} rounded-full flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
        {{ $slot }}
    </div>
    <h4 class="font-semibold text-gray-900 text-sm mb-1">{{ $title }}</h4>
    <p class="text-xs text-gray-500">{{ $subtitle }}</p>
</div>
