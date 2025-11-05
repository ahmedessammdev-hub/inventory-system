@props(['cancelUrl' => null, 'submitText' => 'Save', 'submitColor' => 'blue'])

@php
    $buttonColors = [
        'blue' => 'bg-blue-600 hover:bg-blue-700',
        'green' => 'bg-green-600 hover:bg-green-700',
        'purple' => 'bg-purple-600 hover:bg-purple-700',
        'red' => 'bg-red-600 hover:bg-red-700',
    ];

    $colorClass = $buttonColors[$submitColor] ?? $buttonColors['blue'];
@endphp

<div class="flex items-center justify-end space-x-3 pt-6 mt-6 border-t border-gray-200">
    @if($cancelUrl)
        <a href="{{ $cancelUrl }}"
           class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition duration-150 font-medium">
            Cancel
        </a>
    @endif
    <button type="submit"
            class="px-6 py-2 {{ $colorClass }} text-white rounded-lg transition duration-150 font-medium shadow-md inline-flex items-center">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
        </svg>
        {{ $submitText }}
    </button>
</div>
