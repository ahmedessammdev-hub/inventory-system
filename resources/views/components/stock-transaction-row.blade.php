@props(['transaction'])

<tr class="hover:bg-gray-50 transition duration-150">
    <!-- Transaction ID -->
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="text-sm font-mono text-gray-900">
            #{{ $transaction->id }}
        </div>
    </td>

    <!-- Product -->
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="flex items-center">
            <div class="flex-shrink-0 h-10 w-10 {{ $transaction->product->trashed() ? 'bg-gray-100' : 'bg-indigo-100' }} rounded-lg flex items-center justify-center">
                <svg class="h-6 w-6 {{ $transaction->product->trashed() ? 'text-gray-400' : 'text-indigo-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                </svg>
            </div>
            <div class="ml-4">
                <div class="flex items-center gap-2">
                    <span class="text-sm font-medium {{ $transaction->product->trashed() ? 'text-gray-500 line-through' : 'text-gray-900' }}">
                        {{ $transaction->product->name }}
                    </span>
                    @if($transaction->product->trashed())
                        <span class="px-2 py-0.5 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                            Deleted
                        </span>
                    @endif
                </div>
                <div class="text-sm text-gray-500">SKU: {{ $transaction->product->sku }}</div>
            </div>
        </div>
    </td>

    <!-- Type Badge -->
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

    <!-- Quantity -->
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="text-sm font-bold {{ $transaction->type == 'in' ? 'text-green-600' : 'text-red-600' }}">
            {{ $transaction->type == 'in' ? '+' : '-' }}{{ $transaction->quantity }}
        </div>
    </td>

    <!-- Reason -->
    <td class="px-6 py-4">
        <div class="text-sm text-gray-600">
            {{ $transaction->reason ?: 'No reason provided' }}
        </div>
    </td>

    <!-- User -->
    <td class="px-6 py-4 whitespace-nowrap">
        @if($transaction->user)
            <div class="flex items-center">
                <div class="flex-shrink-0 h-8 w-8 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center">
                    <span class="text-white text-xs font-bold">{{ strtoupper(substr($transaction->user->name, 0, 1)) }}</span>
                </div>
                <div class="ml-3">
                    <div class="text-sm font-medium text-gray-900">{{ $transaction->user->name }}</div>
                    <div class="text-xs text-gray-500">{{ ucfirst(str_replace('_', ' ', $transaction->user->role)) }}</div>
                </div>
            </div>
        @else
            <span class="text-sm text-gray-400 italic">System</span>
        @endif
    </td>

    <!-- Date & Time -->
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="text-sm text-gray-900">{{ $transaction->created_at->format('M d, Y') }}</div>
        <div class="text-xs text-gray-500">{{ $transaction->created_at->format('h:i A') }}</div>
    </td>

    <!-- Actions -->
    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
        <form action="{{ route('stock.reverse', $transaction->id) }}" method="POST" class="inline-block">
            @csrf
            <button type="submit"
                    class="inline-flex items-center px-3 py-1.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-md transition duration-150 shadow-sm"
                    onclick="return confirm('Are you sure you want to reverse this transaction? This will create an opposite transaction to undo the effect.')">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                </svg>
                Reverse
            </button>
        </form>
    </td>
</tr>
