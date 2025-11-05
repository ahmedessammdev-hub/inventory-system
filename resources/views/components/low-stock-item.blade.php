@props(['product'])

<div class="p-4 hover:bg-gray-50 transition duration-150">
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-3">
            <div class="flex-shrink-0 h-8 w-8 bg-orange-100 rounded-lg flex items-center justify-center">
                <svg class="h-4 w-4 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                </svg>
            </div>
            <div class="min-w-0 flex-1">
                <p class="text-sm font-medium text-gray-900 truncate">{{ $product->name }}</p>
                <p class="text-xs text-gray-500 truncate">{{ $product->supplier->name ?? 'N/A' }}</p>
            </div>
        </div>
        <div class="flex-shrink-0">
            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                {{ $product->quantity }}
            </span>
        </div>
    </div>
</div>
