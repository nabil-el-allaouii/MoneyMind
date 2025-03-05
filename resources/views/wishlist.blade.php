<x-app-layout>
    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <!-- Page Header -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-bold text-white">My Wishlist</h1>
            <span class="bg-gray-700 text-sm text-gray-300 py-1 px-3 rounded-full">
                <i class="fas fa-heart mr-1 text-pink-500"></i> {{ count($wishlist) }} items
            </span>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content Area -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Stats Summary Card -->
                <div class="bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-700">
                    <h2 class="text-lg font-semibold mb-4 flex items-center">
                        <i class="fas fa-chart-pie text-blue-400 mr-2"></i> Savings Overview
                    </h2>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                        <div class="bg-gray-700/50 p-4 rounded-lg">
                            <p class="text-xs uppercase tracking-wider text-gray-400 mb-1">Total Items</p>
                            <p class="text-2xl font-bold">{{ count($wishlist) }}</p>
                        </div>
                        <div class="bg-gray-700/50 p-4 rounded-lg">
                            <p class="text-xs uppercase tracking-wider text-gray-400 mb-1">Total Value</p>
                            <p class="text-2xl font-bold">
                                <span class="text-custom">DH</span>
                            </p>
                        </div>
                        <div class="bg-gray-700/50 p-4 rounded-lg">
                            <p class="text-xs uppercase tracking-wider text-gray-400 mb-1">Saved</p>
                            <p class="text-2xl font-bold">
                                <span class="text-green-500">DH</span>
                            </p>
                        </div>
                        <div class="bg-gray-700/50 p-4 rounded-lg">
                            <p class="text-xs uppercase tracking-wider text-gray-400 mb-1">Progress</p>
                            <p class="text-2xl font-bold text-custom">%</p>
                        </div>
                    </div>
                </div>

                <!-- Wishlist Items -->
                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <h2 class="text-lg font-semibold flex items-center">
                            <i class="fas fa-list text-purple-400 mr-2"></i> Your Items
                        </h2>
                        <div class="flex space-x-2">
                            <button
                                class="text-xs bg-gray-700 hover:bg-gray-600 py-1 px-3 rounded-full flex items-center">
                                <i class="fas fa-sort mr-1"></i> Sort
                            </button>
                            <button
                                class="text-xs bg-gray-700 hover:bg-gray-600 py-1 px-3 rounded-full flex items-center">
                                <i class="fas fa-filter mr-1"></i> Filter
                            </button>
                        </div>
                    </div>

                    <!-- Grid of items -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach ($wishlist as $item)
                                @php
                                    $percentage = ($item->saved_amount/$item->target_price) * 100;
                                @endphp
                            <div
                                class="bg-gray-800 rounded-xl shadow-lg overflow-hidden border border-gray-700 transition-transform hover:scale-[1.02] hover:shadow-xl">
                                <div class="relative">
                                    <img src="https://via.placeholder.com/400x225" alt="{{ $item->name }}"
                                        class="w-full h-48 object-cover">
                                    <div class="absolute top-3 right-3 bg-black/60 rounded-full p-1.5">
                                        <i class="fas fa-heart text-pink-500"></i>
                                    </div>
                                </div>
                                <div class="p-5">
                                    <div class="flex justify-between items-start mb-3">
                                        <h3 class="text-lg font-semibold line-clamp-1">{{ $item->name }}</h3>
                                        <span class="font-bold text-custom">{{ $item->target_price }} DH</span>
                                    </div>
                                    <div class="mb-4">
                                        <div class="w-full bg-gray-700 rounded-full h-2.5 overflow-hidden">
                                            <div class="bg-gradient-to-r from-blue-500 to-custom h-2.5 rounded-full"
                                                style="width: {{ $percentage }}%">
                                            </div>
                                        </div>
                                        <div class="flex justify-between text-sm mt-2">
                                            <span class="text-gray-400">{{ $item->saved_amount }} DH saved</span>
                                            <span class="font-medium">
                                                {{$percentage}} %
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-sm bg-gray-700/50 py-1 px-2 rounded-full">
                                            <i class="far fa-calendar-alt mr-1 text-gray-400"></i>
                                            {{ $item->months_left }} months left
                                        </span>
                                        <div class="flex space-x-1">
                                            <button class="p-2 rounded-full hover:bg-gray-700 transition-colors">
                                                <i class="fas fa-edit text-gray-400 hover:text-white"></i>
                                            </button>
                                            <form action="{{ route('wishlist.delete', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="p-2 rounded-full hover:bg-gray-700 transition-colors">
                                                    <i class="fas fa-trash text-gray-400 hover:text-red-400"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Sidebar Area -->
            <div class="lg:col-span-1 space-y-8">
                <!-- AI Insights Card -->
                <div class="bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-700">
                    <h2 class="text-lg font-semibold mb-4 flex items-center">
                        <i class="fas fa-robot text-blue-400 mr-2"></i> AI Insights
                    </h2>
                    <div class="space-y-4">
                        <div class="p-4 bg-gradient-to-br from-gray-700 to-gray-800 rounded-lg border border-gray-600">
                            <div class="flex items-center mb-2">
                                <div
                                    class="w-8 h-8 bg-yellow-500/20 rounded-full flex items-center justify-center mr-3">
                                    <i class="fas fa-lightbulb text-yellow-400"></i>
                                </div>
                                <h3 class="font-medium">Smart Suggestion</h3>
                            </div>
                            <p class="text-sm text-gray-300 ml-11">Consider saving an extra 500 DH monthly to reach your
                                goal 2 months earlier.</p>
                        </div>
                        <div class="p-4 bg-gradient-to-br from-gray-700 to-gray-800 rounded-lg border border-gray-600">
                            <div class="flex items-center mb-2">
                                <div class="w-8 h-8 bg-green-500/20 rounded-full flex items-center justify-center mr-3">
                                    <i class="fas fa-chart-line text-green-400"></i>
                                </div>
                                <h3 class="font-medium">Savings Optimization</h3>
                            </div>
                            <p class="text-sm text-gray-300 ml-11">You're on track to reach your goal by the end of next
                                quarter!</p>
                        </div>
                    </div>
                </div>

                <!-- Quick Add Form -->
                <div class="bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-700">
                    <h2 class="text-lg font-semibold mb-4 flex items-center">
                        <i class="fas fa-plus-circle text-green-400 mr-2"></i> Quick Add
                    </h2>
                    <form action="{{ route('wishlist.add') }}" class="space-y-5" method="POST">
                        @csrf
                        <div>
                            <label class="block text-sm font-medium mb-2 text-gray-300">
                                <i class="fas fa-tag mr-1"></i> Item Name
                            </label>
                            <input name="item_name" type="text"
                                class="w-full bg-gray-700 border-gray-600 rounded-lg focus:ring-custom focus:border-custom text-white px-4 py-2.5"
                                placeholder="What do you want to save for?">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-2 text-gray-300">
                                <i class="fas fa-money-bill mr-1"></i> Price
                            </label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">DH</span>
                                <input name="target_amount" type="number"
                                    class="w-full bg-gray-700 border-gray-600 rounded-lg focus:ring-custom focus:border-custom text-white pl-10 pr-4 py-2.5"
                                    placeholder="0.00">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-2 text-gray-300">
                                <i class="fas fa-piggy-bank mr-1"></i> Monthly Contribution
                            </label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">DH</span>
                                <input name="monthly_contribution" type="number"
                                    class="w-full bg-gray-700 border-gray-600 rounded-lg focus:ring-custom focus:border-custom text-white pl-10 pr-4 py-2.5"
                                    placeholder="0.00">
                            </div>
                        </div>
                        <button type="submit"
                            class="w-full bg-gradient-to-r from-blue-500 to-custom rounded-lg text-white py-3 px-4 font-medium hover:opacity-90 transition-opacity flex items-center justify-center">
                            <i class="fas fa-plus-circle mr-2"></i> Add to Wishlist
                        </button>
                    </form>
                </div>

                <!-- Tips Section -->
                <div class="bg-gray-800/50 rounded-xl p-4 border border-gray-700/50">
                    <div class="flex items-center text-gray-400 text-sm">
                        <i class="fas fa-info-circle mr-2 text-blue-400"></i>
                        <p>Add images to your items by editing them after creation</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
