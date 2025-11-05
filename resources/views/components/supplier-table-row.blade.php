@props(['supplier'])

<tr class="hover:bg-gray-50 transition duration-150">
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="text-sm font-medium text-gray-900">{{ $supplier->name }}</div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="text-sm text-gray-600">
            @if($supplier->email)
                <a href="mailto:{{ $supplier->email }}" class="text-blue-600 hover:text-blue-800">
                    {{ $supplier->email }}
                </a>
            @else
                <span class="text-gray-400 italic">Not provided</span>
            @endif
        </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="text-sm text-gray-600">
            @if($supplier->phone)
                <a href="tel:{{ $supplier->phone }}" class="text-blue-600 hover:text-blue-800">
                    {{ $supplier->phone }}
                </a>
            @else
                <span class="text-gray-400 italic">Not provided</span>
            @endif
        </div>
    </td>
    <td class="px-6 py-4">
        <div class="text-sm text-gray-600">
            {{ $supplier->address ?? 'Not provided' }}
        </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
        <a href="{{ route('suppliers.edit', $supplier->id) }}"
           class="inline-flex items-center px-3 py-1.5 bg-yellow-500 hover:bg-yellow-600 text-white rounded-md mr-2 transition duration-150">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
            </svg>
            Edit
        </a>
        <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" class="inline-block">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="inline-flex items-center px-3 py-1.5 bg-red-500 hover:bg-red-600 text-white rounded-md transition duration-150"
                    onclick="return confirm('Are you sure you want to delete this supplier?')">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                </svg>
                Delete
            </button>
        </form>
    </td>
</tr>
