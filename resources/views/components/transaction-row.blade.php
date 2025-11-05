@props(['transaction'])

<tr class="hover:bg-gray-50 transition duration-150">
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="text-sm font-medium text-gray-900">{{ $transaction->product->name }}</div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        @if($transaction->type == 'in')
            <span class="px-3 py-1 inline-flex items-center text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"/>
                </svg>
                STOCK IN
            </span>
        @else
            <span class="px-3 py-1 inline-flex items-center text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 13l-5 5m0 0l-5-5m5 5V6"/>
                </svg>
                STOCK OUT
            </span>
        @endif
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <span class="text-sm font-semibold text-gray-900">{{ $transaction->quantity }}</span>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
        <div class="flex items-center">
            <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            {{ $transaction->created_at->format('M d, Y H:i') }}
        </div>
    </td>
</tr>
