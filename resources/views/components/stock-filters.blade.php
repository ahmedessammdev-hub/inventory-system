@props(['route', 'products' => [], 'users' => []])

<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
    <div class="p-6">
        <!-- Header with gradient background -->
        <div class="bg-gradient-to-r from-indigo-500 to-blue-600 rounded-lg p-4 mb-6">
            <div class="flex items-center text-white">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                </svg>
                <h3 class="text-lg font-semibold">Search & Filter Transactions</h3>
            </div>
        </div>

        <form method="GET" action="{{ $route }}" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-6 gap-4">
                <!-- Search -->
                <div class="md:col-span-2">
                    <label for="search" class="flex items-center text-sm font-medium text-gray-700 mb-1">
                        <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        Search
                    </label>
                    <input type="text"
                           name="search"
                           id="search"
                           value="{{ request('search') }}"
                           placeholder="Search by product, user, or reason..."
                           class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>

                <!-- Transaction Type Filter -->
                <div>
                    <label for="type_filter" class="flex items-center text-sm font-medium text-gray-700 mb-1">
                        <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/>
                        </svg>
                        Type
                    </label>
                    <select name="type_filter" id="type_filter"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="">All Types ⚡</option>
                        <option value="in" {{ request('type_filter') === 'in' ? 'selected' : '' }}>📈 Stock In</option>
                        <option value="out" {{ request('type_filter') === 'out' ? 'selected' : '' }}>📉 Stock Out</option>
                    </select>
                </div>

                <!-- Product Filter -->
                <div>
                    <label for="product_filter" class="flex items-center text-sm font-medium text-gray-700 mb-1">
                        <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                        Product
                    </label>
                    <select name="product_filter" id="product_filter"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="">All Products 📦</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}"
                                    {{ request('product_filter') == $product->id ? 'selected' : '' }}
                                    @if($product->trashed()) style="color: #9ca3af; font-style: italic;" @endif>
                                {{ $product->name }} ({{ $product->sku }}){{ $product->trashed() ? ' - Deleted' : '' }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- User Filter -->
                <div>
                    <label for="user_filter" class="flex items-center text-sm font-medium text-gray-700 mb-1">
                        <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        User
                    </label>
                    <select name="user_filter" id="user_filter"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="">All Users 👤</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ request('user_filter') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Date From -->
                <div>
                    <label for="date_from" class="flex items-center text-sm font-medium text-gray-700 mb-1">
                        <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        From Date
                    </label>
                    <input type="date"
                           name="date_from"
                           id="date_from"
                           value="{{ request('date_from') }}"
                           class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>

                <!-- Date To -->
                <div>
                    <label for="date_to" class="flex items-center text-sm font-medium text-gray-700 mb-1">
                        <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        To Date
                    </label>
                    <input type="date"
                           name="date_to"
                           id="date_to"
                           value="{{ request('date_to') }}"
                           class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
            </div>

            <div class="flex items-center justify-between pt-2 border-t border-gray-200">
                <!-- Sort Options -->
                <div class="flex items-center space-x-4">
                    <div>
                        <label for="sort_by" class="flex items-center text-sm font-medium text-gray-700 mb-1">
                            <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"/>
                            </svg>
                            Sort By
                        </label>
                        <select name="sort_by" id="sort_by"
                                class="rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="created_at" {{ request('sort_by') === 'created_at' ? 'selected' : '' }}>📅 Date</option>
                            <option value="quantity" {{ request('sort_by') === 'quantity' ? 'selected' : '' }}>🔢 Quantity</option>
                            <option value="type" {{ request('sort_by') === 'type' ? 'selected' : '' }}>🔄 Type</option>
                        </select>
                    </div>

                    <div class="flex items-center space-x-2">
                        <!-- Sort Direction Radio Buttons -->
                        <label for="sort_asc" class="flex items-center px-3 py-2 rounded-lg cursor-pointer transition-all duration-200 {{ request('sort_direction', 'desc') === 'asc' ? 'bg-blue-100 text-blue-700 font-medium' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                            <input type="radio" name="sort_direction" value="asc" id="sort_asc"
                                   {{ request('sort_direction', 'desc') === 'asc' ? 'checked' : '' }}
                                   class="sr-only">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"/>
                            </svg>
                            Ascending
                        </label>

                        <label for="sort_desc" class="flex items-center px-3 py-2 rounded-lg cursor-pointer transition-all duration-200 {{ request('sort_direction', 'desc') === 'desc' ? 'bg-blue-100 text-blue-700 font-medium' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                            <input type="radio" name="sort_direction" value="desc" id="sort_desc"
                                   {{ request('sort_direction', 'desc') === 'desc' ? 'checked' : '' }}
                                   class="sr-only">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h9m5-4v12m0 0l-4-4m4 4l4-4"/>
                            </svg>
                            Descending
                        </label>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex space-x-2">
                    <button type="submit"
                            class="inline-flex items-center px-6 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-medium rounded-lg transition duration-150 shadow-md hover:shadow-lg transform hover:scale-105">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        Search
                    </button>

                    @if(request()->hasAny(['search', 'type_filter', 'product_filter', 'user_filter', 'date_from', 'date_to', 'sort_by', 'sort_direction']))
                        <a href="{{ $route }}"
                           class="inline-flex items-center px-6 py-2 bg-gradient-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 text-white font-medium rounded-lg transition duration-150 shadow-md hover:shadow-lg transform hover:scale-105">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            Clear
                        </a>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>
