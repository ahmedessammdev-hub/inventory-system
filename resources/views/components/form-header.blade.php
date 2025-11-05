@props(['title', 'subtitle' => null, 'backUrl' => null])

<div class="mb-6">
    <div class="flex items-center mb-2">
        @if($backUrl)
            <a href="{{ $backUrl }}"
               class="text-gray-600 hover:text-gray-900 mr-3 transition duration-150">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </a>
        @endif
        <h2 class="text-3xl font-bold text-gray-800">{{ $title }}</h2>
    </div>
    @if($subtitle)
        <p class="text-gray-600 {{ $backUrl ? 'ml-9' : '' }}">{{ $subtitle }}</p>
    @endif
</div>
