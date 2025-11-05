@props(['quantity'])

@if($quantity > 10)
    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
        {{ $quantity }} in stock
    </span>
@elseif($quantity > 0)
    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
        {{ $quantity }} low stock
    </span>
@else
    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
        Out of stock
    </span>
@endif
