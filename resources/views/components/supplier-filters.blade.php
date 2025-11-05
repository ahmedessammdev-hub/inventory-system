@props(['route'])

<div class="bg-gradient-to-br from-white to-gray-50 overflow-hidden shadow-lg sm:rounded-xl mb-6 border border-gray-100">
    <!-- Header -->
    <div class="bg-gradient-to-r from-purple-500 via-purple-600 to-indigo-600 px-6 py-4 border-b border-purple-700">
        <div class="flex items-center">
            <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-lg p-2 mr-3">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                </svg>
            </div>
            <div>
                <h3 class="text-lg font-bold text-white">Search & Filter</h3>
                <p class="text-purple-100 text-sm">Find suppliers quickly</p>
            </div>
        </div>
    </div>

    <!-- Form Content -->
    <div class="p-6">
        <form method="GET" action="{{ $route }}" class="space-y-6">
            <!-- Search and Filters Grid -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <!-- Search Input -->
                <div class="md:col-span-2">
                    <label for="search" class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                        <svg class="w-4 h-4 mr-1.5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        Search Suppliers
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
                               placeholder="Search by name, email, phone, or address..."
                               class="w-full pl-10 pr-4 py-2.5 rounded-lg border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all duration-200 shadow-sm">
                    </div>
                </div>

                <!-- Contact Filter -->
                <div>
                    <label for="contact_filter" class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                        <svg class="w-4 h-4 mr-1.5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Contact Info
                    </label>
                    <div class="relative">
                        <select name="contact_filter" id="contact_filter"
                                class="w-full px-4 py-2.5 rounded-lg border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all duration-200 shadow-sm appearance-none bg-white">
                            <option value="">All Suppliers</option>
                            <option value="with_email" {{ request('contact_filter') === 'with_email' ? 'selected' : '' }}>📧 With Email</option>
                            <option value="with_phone" {{ request('contact_filter') === 'with_phone' ? 'selected' : '' }}>📞 With Phone</option>
                            <option value="complete_info" {{ request('contact_filter') === 'complete_info' ? 'selected' : '' }}>✅ Complete Info</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Sort By -->
                <div>
                    <label for="sort_by" class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                        <svg class="w-4 h-4 mr-1.5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/>
                        </svg>
                        Sort By
                    </label>
                    <div class="relative">
                        <select name="sort_by" id="sort_by"
                                class="w-full px-4 py-2.5 rounded-lg border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all duration-200 shadow-sm appearance-none bg-white">
                            <option value="created_at" {{ request('sort_by') === 'created_at' ? 'selected' : '' }}>📅 Date Added</option>
                            <option value="name" {{ request('sort_by') === 'name' ? 'selected' : '' }}>🏷️ Name</option>
                            <option value="email" {{ request('sort_by') === 'email' ? 'selected' : '' }}>📧 Email</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sort Direction and Action Buttons -->
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 pt-4 border-t border-gray-200">
                <!-- Sort Direction Toggle -->
                <div class="flex items-center space-x-1 bg-gray-100 rounded-lg p-1">
                    <input type="radio" name="sort_direction" value="asc" id="sort_asc"
                           {{ request('sort_direction', 'desc') === 'asc' ? 'checked' : '' }}
                           class="sr-only peer/asc">
                    <label for="sort_asc"
                           class="flex items-center px-4 py-2 text-sm font-medium rounded-md cursor-pointer transition-all duration-200
                                  peer-checked/asc:bg-white peer-checked/asc:text-purple-700 peer-checked/asc:shadow-sm
                                  text-gray-600 hover:text-gray-900">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"/>
                        </svg>
                        Ascending
                    </label>

                    <input type="radio" name="sort_direction" value="desc" id="sort_desc"
                           {{ request('sort_direction', 'desc') === 'desc' ? 'checked' : '' }}
                           class="sr-only peer/desc">
                    <label for="sort_desc"
                           class="flex items-center px-4 py-2 text-sm font-medium rounded-md cursor-pointer transition-all duration-200
                                  peer-checked/desc:bg-white peer-checked/desc:text-purple-700 peer-checked/desc:shadow-sm
                                  text-gray-600 hover:text-gray-900">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h9m5-4v12m0 0l-4-4m4 4l4-4"/>
                        </svg>
                        Descending
                    </label>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center space-x-3">
                    @if(request()->hasAny(['search', 'contact_filter', 'sort_by', 'sort_direction']))
                        <a href="{{ $route }}"
                           class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 text-white font-semibold rounded-lg transition-all duration-200 shadow-md hover:shadow-lg transform hover:scale-105">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            Clear Filters
                        </a>
                    @endif

                    <button type="submit"
                            class="inline-flex items-center px-6 py-2.5 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white font-semibold rounded-lg transition-all duration-200 shadow-md hover:shadow-lg transform hover:scale-105">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        Apply Filters
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
