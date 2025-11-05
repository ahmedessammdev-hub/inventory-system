@props(['route', 'categories', 'suppliers'])

<div class="bg-white overflow-hidden shadow-lg sm:rounded-xl mb-6 border border-gray-200">
    <!-- Filter Header -->
    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 px-6 py-4 border-b border-gray-200">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="bg-blue-600 rounded-lg p-2">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Filter & Search Products</h3>
                    <p class="text-sm text-gray-600">Refine your product search with advanced filters</p>
                </div>
            </div>
            @if(request()->hasAny(['search', 'stock_filter', 'category_filter', 'supplier_filter', 'sort_by', 'sort_direction']))
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd"/>
                    </svg>
                    Filters Active
                </span>
            @endif
        </div>
    </div>

    <div class="p-6">
        <form method="GET" action="{{ $route }}" class="space-y-6">
            <!-- Main Filters Row -->
            <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                <!-- Search -->
                <div class="md:col-span-2">
                    <label for="search" class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                        <svg class="w-4 h-4 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        Search Products
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                        <input type="text"
                               name="search"
                               id="search"
                               value="{{ request('search') }}"
                               placeholder="Search by name, SKU, category, or supplier..."
                               class="w-full pl-10 pr-4 py-2.5 rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-150">
                    </div>
                </div>

                <!-- Stock Level Filter -->
                <div>
                    <label for="stock_filter" class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                        <svg class="w-4 h-4 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                        Stock Level
                    </label>
                    <div class="relative">
                        <select name="stock_filter" id="stock_filter"
                                class="w-full pl-4 pr-10 py-2.5 rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-150 appearance-none bg-white">
                            <option value="">All Stock Levels</option>
                            <option value="out_of_stock" {{ request('stock_filter') === 'out_of_stock' ? 'selected' : '' }}>🔴 Out of Stock (0)</option>
                            <option value="low_stock" {{ request('stock_filter') === 'low_stock' ? 'selected' : '' }}>🟡 Low Stock (≤10)</option>
                            <option value="medium_stock" {{ request('stock_filter') === 'medium_stock' ? 'selected' : '' }}>🟢 Medium Stock (11-50)</option>
                            <option value="high_stock" {{ request('stock_filter') === 'high_stock' ? 'selected' : '' }}>🟢 High Stock (>50)</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Category Filter -->
                <div>
                    <label for="category_filter" class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                        <svg class="w-4 h-4 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                        </svg>
                        Category
                    </label>
                    <div class="relative">
                        <select name="category_filter" id="category_filter"
                                class="w-full pl-4 pr-10 py-2.5 rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-150 appearance-none bg-white">
                            <option value="">All Categories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category }}" {{ request('category_filter') === $category ? 'selected' : '' }}>
                                    {{ $category }}
                                </option>
                            @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Supplier Filter -->
                <div>
                    <label for="supplier_filter" class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                        <svg class="w-4 h-4 mr-2 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                        Supplier
                    </label>
                    <div class="relative">
                        <select name="supplier_filter" id="supplier_filter"
                                class="w-full pl-4 pr-10 py-2.5 rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-150 appearance-none bg-white">
                            <option value="">All Suppliers</option>
                            @foreach($suppliers as $supplier)
                                <option value="{{ $supplier->id }}" {{ request('supplier_filter') == $supplier->id ? 'selected' : '' }}>
                                    {{ $supplier->name }}
                                </option>
                            @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sort Options Section -->
            <div class="border-t border-gray-200 pt-4">

            <div class="bg-gray-50 rounded-lg p-4">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <!-- Sort Options -->
                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
                        <div class="flex items-center space-x-3">
                            <div class="flex items-center space-x-2">
                                <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"/>
                                </svg>
                                <label for="sort_by" class="text-sm font-semibold text-gray-700">Sort By:</label>
                            </div>
                            <div class="relative">
                                <select name="sort_by" id="sort_by"
                                        class="pl-4 pr-10 py-2 rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-150 appearance-none bg-white text-sm">
                                    <option value="created_at" {{ request('sort_by') === 'created_at' ? 'selected' : '' }}>📅 Date Added</option>
                                    <option value="name" {{ request('sort_by') === 'name' ? 'selected' : '' }}>🔤 Name</option>
                                    <option value="sku" {{ request('sort_by') === 'sku' ? 'selected' : '' }}>🏷️ SKU</option>
                                    <option value="quantity" {{ request('sort_by') === 'quantity' ? 'selected' : '' }}>📦 Quantity</option>
                                    <option value="price" {{ request('sort_by') === 'price' ? 'selected' : '' }}>💰 Price</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                    <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-2 bg-white rounded-lg p-1 shadow-sm border border-gray-200">
                            <input type="radio" name="sort_direction" value="asc" id="sort_asc"
                                   {{ request('sort_direction', 'desc') === 'asc' ? 'checked' : '' }}
                                   class="sr-only peer/asc">
                            <label for="sort_asc"
                                   class="flex items-center px-3 py-1.5 rounded-md text-sm font-medium cursor-pointer transition-all duration-200 peer-checked/asc:bg-blue-600 peer-checked/asc:text-white text-gray-600 hover:bg-gray-100 peer-checked/asc:hover:bg-blue-700">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h9m5-4v12m0 0l-4-4m4 4l4-4"/>
                                </svg>
                                Ascending
                            </label>

                            <input type="radio" name="sort_direction" value="desc" id="sort_desc"
                                   {{ request('sort_direction', 'desc') === 'desc' ? 'checked' : '' }}
                                   class="sr-only peer/desc">
                            <label for="sort_desc"
                                   class="flex items-center px-3 py-1.5 rounded-md text-sm font-medium cursor-pointer transition-all duration-200 peer-checked/desc:bg-blue-600 peer-checked/desc:text-white text-gray-600 hover:bg-gray-100 peer-checked/desc:hover:bg-blue-700">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"/>
                                </svg>
                                Descending
                            </label>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex space-x-2">
                        <button type="submit"
                                class="inline-flex items-center justify-center px-6 py-2.5 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            Apply Filters
                        </button>

                        @if(request()->hasAny(['search', 'stock_filter', 'category_filter', 'supplier_filter', 'sort_by', 'sort_direction']))
                            <a href="{{ $route }}"
                               class="inline-flex items-center justify-center px-6 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-lg shadow-sm hover:shadow-md transform hover:-translate-y-0.5 transition-all duration-200 border border-gray-300">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                </svg>
                                Reset
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
