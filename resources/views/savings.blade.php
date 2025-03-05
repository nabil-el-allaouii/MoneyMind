<x-app-layout>
    <div x-data="{ isOpen: false, showInput: false }" @keydown.escape.window="isOpen = false; showInput = false">
        <div class="py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Page Header -->
                <div class="mb-8">
                    <h1 class="text-2xl font-bold text-white">Savings Tracker</h1>
                    <p class="text-gray-400 text-sm">Monitor your financial progress</p>
                </div>

                <!-- Stats Overview Card -->
                <div class="bg-gray-800/30 backdrop-blur-sm rounded-xl border border-gray-700/50 shadow-lg p-6 mb-8">
                    <div class="flex flex-wrap items-center justify-between gap-4">
                        <div>
                            <h3 class="text-gray-400 text-sm font-medium mb-1">Total Savings</h3>
                            <div class="flex items-baseline gap-3">
                                <span class="text-3xl font-bold text-white">{{ $savings->current_amount ?? 0 }} DH</span>
                                <span class="text-emerald-400 text-xs px-2 py-1 bg-emerald-500/10 rounded-lg border border-emerald-500/20 flex items-center">
                                    <svg class="w-3 h-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                    </svg>
                                    +10.0%
                                </span>
                            </div>
                        </div>
                        
                        @if($savings)
                        <div class="ml-auto flex items-center gap-2">
                            <div class="h-2 w-40 bg-gray-700/50 rounded-full overflow-hidden">
                                @php 
                                    $percentage = ($savings->current_amount / $savings->target_amount) * 100;
                                @endphp
                                <div class="h-full bg-gradient-to-r from-blue-500 to-indigo-500" style="width: {{ $percentage }}%"></div>
                            </div>
                            <span class="text-xs font-medium text-blue-400">{{ number_format($percentage, 0) }}%</span>
                        </div>
                        @endif
                        
                        
                    </div>
                </div>

                <!-- Main Content -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Savings Details Card -->
                    <div class="bg-gray-800/30 backdrop-blur-sm rounded-xl border border-gray-700/50 shadow-lg p-6">
                        <div class="flex items-center justify-between mb-5">
                            <h3 class="text-white text-lg font-semibold flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2z" />
                                </svg>
                                Your Savings
                            </h3>
                            @if($savings)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-500/20 text-blue-300">
                                    Active Plan
                                </span>
                            @endif
                        </div>
                        
                        @if($savings)
                            <div class="space-y-4">
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="bg-gray-800/40 rounded-lg p-4">
                                        <p class="text-gray-400 text-xs mb-1">Target Amount</p>
                                        <p class="text-lg font-medium text-white">{{ $savings->target_amount }} DH</p>
                                    </div>
                                    <div class="bg-gray-800/40 rounded-lg p-4">
                                        <p class="text-gray-400 text-xs mb-1">Monthly Contribution</p>
                                        <p class="text-lg font-medium text-emerald-400">{{ $savings->monthly_contribution }} DH</p>
                                    </div>
                                </div>
                                
                                <div class="bg-gray-800/20 rounded-lg p-4 space-y-2">
                                    <div class="flex justify-between">
                                        <span class="text-gray-300 text-sm">Started On:</span>
                                        <span class="text-gray-300 text-sm">{{ $savings->created_at->format('M d, Y') }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-300 text-sm">Description:</span>
                                        <span class="text-white text-sm">Monthly savings</span>
                                    </div>
                                </div>

                                <div class="flex space-x-3 pt-2">
                                    <button @click="showInput = !showInput" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white rounded-lg px-4 py-2 transition-colors duration-200 flex items-center justify-center">
                                        <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        Modify
                                    </button>
                                    <form action="{{ route('saving.destroy', $savings->id) }}" method="GET" class="flex-1">
                                        @csrf
                                        @if($savings->current_amount == $savings->target_amount)
                                            <div class="text-center bg-green-500/20 text-green-400 rounded-lg px-4 py-2">
                                                <svg class="w-4 h-4 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>
                                                Goal Reached
                                            </div>
                                        @else
                                            <button type="submit" class="w-full bg-gray-700/50 hover:bg-gray-700 text-red-400 border border-red-500/20 rounded-lg px-4 py-2 transition-colors duration-200 flex items-center justify-center">
                                                <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                                Cancel
                                            </button>
                                        @endif
                                    </form>
                                </div>
                                
                                <!-- Modify Form -->
                                <div x-show="showInput" 
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0 transform -translate-y-2"
                                    x-transition:enter-end="opacity-100 transform translate-y-0"
                                    class="mt-4 bg-gray-800/40 rounded-lg p-5">
                                    <form action="{{ route('savings.update') }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="space-y-4">
                                            <div>
                                                <label class="block text-sm text-gray-400 mb-1">New Monthly Contribution</label>
                                                <div class="relative">
                                                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">DH</span>
                                                    <input name="newContribution" type="number" placeholder="{{ $savings->monthly_contribution }}"
                                                        class="w-full bg-gray-700/60 border border-gray-600 rounded-lg pl-10 pr-4 py-2 text-white">
                                                </div>
                                            </div>
                                            
                                            <div>
                                                <label class="block text-sm text-gray-400 mb-1">New Target Amount</label>
                                                <div class="relative">
                                                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">DH</span>
                                                    <input name="newTarget" type="number" placeholder="{{ $savings->target_amount }}"
                                                        class="w-full bg-gray-700/60 border border-gray-600 rounded-lg pl-10 pr-4 py-2 text-white">
                                                </div>
                                            </div>
                                            
                                            <div class="flex justify-end space-x-3 pt-2">
                                                <button @click="showInput = false" type="button"
                                                    class="px-4 py-1.5 text-gray-400 hover:text-gray-300 transition-colors">
                                                    Cancel
                                                </button>
                                                <button type="submit"
                                                    class="px-4 py-1.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg transition-colors">
                                                    Save Changes
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @else
                            <div class="flex flex-col items-center justify-center py-10 text-center">
                                <div class="bg-blue-500/10 p-4 rounded-full mb-4">
                                    <svg class="w-10 h-10 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-medium text-white mb-2">No savings found</h3>
                                <p class="text-gray-400 mb-5">Start saving today to reach your financial goals</p>
                                <button @click="isOpen = true" class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors duration-200">
                                    Create Savings Plan
                                </button>
                            </div>
                        @endif
                    </div>

                    <!-- Right Column -->
                    @if(!$savings)
                        <div class="bg-gray-800/30 backdrop-blur-sm rounded-xl border border-gray-700/50 shadow-lg p-6">
                            <h3 class="text-white text-lg font-semibold flex items-center mb-5">
                                <svg class="w-5 h-5 mr-2 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                Add Savings
                            </h3>
                            
                            <form action="{{ route('saving.submit') }}" method="POST" class="space-y-4">
                                @csrf
                                <div>
                                    <label for="amount" class="block text-sm text-gray-400 mb-1">Monthly Amount</label>
                                    <div class="relative">
                                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">DH</span>
                                        <input type="number" id="amount" name="amount" required
                                            class="w-full bg-gray-700/50 border border-gray-600 rounded-lg pl-10 pr-4 py-2 text-white">
                                    </div>
                                </div>
                                
                                <div>
                                    <label for="goal" class="block text-sm text-gray-400 mb-1">Saving Goal</label>
                                    <div class="relative">
                                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">DH</span>
                                        <input type="number" id="goal" name="goal"
                                            class="w-full bg-gray-700/50 border border-gray-600 rounded-lg pl-10 pr-4 py-2 text-white">
                                    </div>
                                </div>
                                
                                <div>
                                    <label for="description" class="block text-sm text-gray-400 mb-1">Plan Name</label>
                                    <input type="text" id="description" name="name"
                                        class="w-full bg-gray-700/50 border border-gray-600 rounded-lg px-4 py-2 text-white">
                                </div>
                                
                                <div class="flex justify-end pt-2">
                                    <button type="submit"
                                        class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-colors">
                                        Start Saving
                                    </button>
                                </div>
                            </form>
                        </div>
                    @else
                        <div class="bg-gray-800/30 backdrop-blur-sm rounded-xl border border-gray-700/50 shadow-lg p-6">
                            <h3 class="text-white text-lg font-semibold flex items-center mb-5">
                                <svg class="w-5 h-5 mr-2 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                                Insights
                            </h3>
                            
                            <div class="space-y-3">
                                <div class="p-4 bg-blue-500/10 border border-blue-500/20 rounded-lg">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <svg class="w-5 h-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm text-gray-300">You'll reach your goal in approximately <span class="text-white font-medium">{{ ceil(($savings->target_amount - $savings->current_amount) / $savings->monthly_contribution) }} months</span>.</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="p-4 bg-purple-500/10 border border-purple-500/20 rounded-lg">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <svg class="w-5 h-5 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm text-gray-300">Increasing your monthly contribution by just 10% could help you reach your goal faster.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div x-show="isOpen" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
            <div class="fixed inset-0 bg-black/60 backdrop-blur-sm" @click="isOpen = false"></div>
            <div class="relative min-h-screen flex items-center justify-center p-4">
                <div class="relative bg-gray-800/80 backdrop-blur-xl rounded-xl border border-gray-700/50 shadow-xl w-full max-w-md">
                    <div class="p-5 border-b border-gray-700/50 flex justify-between items-center">
                        <h3 class="text-lg font-medium text-white">Create Savings Plan</h3>
                        <button @click="isOpen = false" class="text-gray-400 hover:text-white">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    
                    <form action="{{ route('saving.submit') }}" method="POST" class="p-5 space-y-4">
                        @csrf
                        <div>
                            <label class="block text-sm text-gray-300 mb-1">Monthly Amount</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">DH</span>
                                <input type="number" name="amount" required
                                    class="w-full bg-gray-700/60 border border-gray-600 rounded-lg pl-10 pr-4 py-2 text-white focus:border-blue-500 focus:ring focus:ring-blue-500/20">
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm text-gray-300 mb-1">Target Goal</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">DH</span>
                                <input type="number" name="goal" required
                                    class="w-full bg-gray-700/60 border border-gray-600 rounded-lg pl-10 pr-4 py-2 text-white focus:border-blue-500 focus:ring focus:ring-blue-500/20">
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm text-gray-300 mb-1">Plan Name</label>
                            <input type="text" name="name"
                                class="w-full bg-gray-700/60 border border-gray-600 rounded-lg px-4 py-2 text-white focus:border-blue-500 focus:ring focus:ring-blue-500/20">
                        </div>
                        
                        <div class="pt-2">
                            <button type="submit"
                                class="w-full py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
                                Create Plan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>