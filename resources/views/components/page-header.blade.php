@props(['title', 'subtitle' => null, 'actionRoute' => null, 'actionText' => null])

<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
    <div class="p-6 flex justify-between items-center">
        <div>
            <h2 class="text-3xl font-bold text-gray-800">{{ $title }}</h2>
            @if($subtitle)
                <p class="text-gray-600 mt-1">{{ $subtitle }}</p>
            @endif
        </div>
        @if(isset($action))
            <div>
                {{ $action }}
            </div>
        @elseif($actionRoute && $actionText)
            <a href="{{ $actionRoute }}"
               class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition duration-150 ease-in-out">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                {{ $actionText }}
            </a>
        @endif
    </div>
</div>
