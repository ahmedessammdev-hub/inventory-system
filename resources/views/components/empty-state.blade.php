@props(['title', 'message', 'actionRoute' => null, 'actionText' => null, 'icon' => null])

<tr>
    <td colspan="7" class="px-6 py-12 text-center">
        <div class="flex flex-col items-center">
            @if($icon)
                {{ $icon }}
            @else
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                </svg>
            @endif
            <h3 class="mt-2 text-sm font-medium text-gray-900">{{ $title }}</h3>
            <p class="mt-1 text-sm text-gray-500">{{ $message }}</p>
            @if($actionRoute && $actionText)
                <div class="mt-6">
                    <a href="{{ $actionRoute }}"
                       class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md transition duration-150">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        {{ $actionText }}
                    </a>
                </div>
            @endif
        </div>
    </td>
</tr>
