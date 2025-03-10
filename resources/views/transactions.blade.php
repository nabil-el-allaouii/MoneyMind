<x-app-layout>
    @if (session('error'))
        <div class="mb-6 relative" x-data="{ show: true }" x-show="show"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform -translate-y-2"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform -translate-y-2">
            <div class="bg-red-500/10 border border-red-500/20 text-red-400 px-4 py-3 rounded-lg flex items-start">
                <div class="flex-shrink-0 mt-0.5">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="ml-3 flex-1">
                    <p class="text-sm font-medium">{{ session('error') }}</p>
                </div>
                <button @click="show = false"
                    class="ml-4 flex-shrink-0 text-red-400 hover:text-red-300 focus:outline-none">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    @endif
    <div x-data="{ isOpen: false }" @keydown.escape.window="isOpen = false" class="min-h-screen">
        <div class="py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Page Header -->
                <div class="mb-8">
                    <h1 class="text-2xl font-bold text-white">Transactions</h1>
                    <p class="text-gray-400 mt-1">Track and manage your financial activities</p>
                </div>

                <!-- Action Bar -->
                <div class="flex flex-wrap justify-between items-center gap-4 mb-8">
                    <div class="flex space-x-2">
                        <button
                            class="px-4 py-2 bg-gray-800/50 hover:bg-gray-700/50 border border-gray-700/50 rounded-lg text-sm text-gray-300 transition-colors">
                            All
                        </button>
                        <button
                            class="px-4 py-2 bg-gray-800/50 hover:bg-gray-700/50 border border-gray-700/50 rounded-lg text-sm text-gray-300 transition-colors">
                            Income
                        </button>
                        <button
                            class="px-4 py-2 bg-gray-800/50 hover:bg-gray-700/50 border border-gray-700/50 rounded-lg text-sm text-gray-300 transition-colors">
                            Expenses
                        </button>
                    </div>
                    <button @click="isOpen = true"
                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-medium flex items-center transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Add Transaction
                    </button>
                </div>
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">
                    <div class="bg-gray-800/30 backdrop-blur-sm rounded-xl border border-gray-700/50 p-5">
                        <div class="flex items-center justify-between mb-3">
                            <div class="bg-green-500/10 p-2 rounded-lg">
                                <svg class="w-5 h-5 text-green-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <span
                                class="text-xs font-medium px-2 py-1 bg-green-500/10 text-green-400 rounded-lg">+12.5%</span>
                        </div>
                        <h3 class="text-gray-400 text-sm">Total Income</h3>
                        <div class="text-xl font-bold text-white mt-1">15,890 DH</div>
                        <p class="text-xs text-gray-500 mt-2">vs. 14,120 DH last month</p>
                    </div>

                    <div class="bg-gray-800/30 backdrop-blur-sm rounded-xl border border-gray-700/50 p-5">
                        <div class="flex items-center justify-between mb-3">
                            <div class="bg-red-500/10 p-2 rounded-lg">
                                <svg class="w-5 h-5 text-red-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <span
                                class="text-xs font-medium px-2 py-1 bg-red-500/10 text-red-400 rounded-lg">+8.4%</span>
                        </div>
                        <h3 class="text-gray-400 text-sm">Total Expenses</h3>
                        <div class="text-xl font-bold text-white mt-1">{{ $total ?? 0 }} DH</div>
                        <p class="text-xs text-gray-500 mt-2">Total spending this month</p>
                    </div>

                    <div class="bg-gray-800/30 backdrop-blur-sm rounded-xl border border-gray-700/50 p-5">
                        <div class="flex items-center justify-between mb-3">
                            <div class="bg-blue-500/10 p-2 rounded-lg">
                                <svg class="w-5 h-5 text-blue-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                            </div>
                            <span
                                class="text-xs font-medium px-2 py-1 bg-blue-500/10 text-blue-400 rounded-lg">+4.1%</span>
                        </div>
                        <h3 class="text-gray-400 text-sm">Net Flow</h3>
                        <div class="text-xl font-bold text-white mt-1">9,650 DH</div>
                        <p class="text-xs text-gray-500 mt-2">vs. 8,360 DH last month</p>
                    </div>
                </div>

                <!-- Transactions List -->
                <div class="bg-gray-800/30 backdrop-blur-sm border border-gray-700/50 rounded-xl overflow-hidden">
                    <div class="flex items-center justify-between p-5 border-b border-gray-700/50">
                        <h3 class="text-lg font-medium text-white">Recent Transactions</h3>
                        <div class="flex items-center space-x-2 text-sm text-gray-400">
                            <span>View:</span>
                            <select
                                class="bg-gray-700/50 border-none rounded-md text-sm text-gray-300 py-1 pl-2 pr-6 focus:ring-1 focus:ring-gray-500">
                                <option>All</option>
                                <option>This Week</option>
                                <option>This Month</option>
                            </select>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-700/50">
                            <thead>
                                <tr class="bg-gray-800/40">
                                    <th
                                        class="px-5 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                        Date</th>
                                    <th
                                        class="px-5 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                        Description</th>
                                    <th
                                        class="px-5 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                        Category</th>
                                    <th
                                        class="px-5 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                        Amount</th>
                                    <th
                                        class="px-5 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                        Status</th>
                                    <th
                                        class="px-5 py-3 text-right text-xs font-medium text-gray-400 uppercase tracking-wider">
                                        Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-gray-800/20 divide-y divide-gray-700/50">
                                @foreach ($depenses as $depense)
                                    <tr class="hover:bg-gray-700/20 transition-colors">
                                        <td class="px-5 py-3.5 text-sm font-medium text-gray-300">
                                            {{ $depense->depense_date ?? $depense->created_at->format('M d, Y') }}</td>
                                        <td class="px-5 py-3.5">
                                            <div class="flex items-center">
                                                <div
                                                    class="h-8 w-8 rounded-md flex items-center justify-center bg-red-500/10 border border-red-500/20 mr-3">
                                                    <svg class="w-4 h-4 text-red-400" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <div class="text-sm font-medium text-white">
                                                        {{ $depense->category->name }}</div>
                                                    <div class="text-xs text-gray-400">
                                                        {{ $depense->category->description }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-3.5 text-sm text-gray-300">Expense</td>
                                        <td class="px-5 py-3.5 text-sm font-medium text-red-400">
                                            -{{ number_format($depense->price, 2) }} DH</td>
                                        <td class="px-5 py-3.5">
                                            <span
                                                class="px-2 py-1 text-xs font-medium bg-green-500/10 text-green-400 rounded-lg">
                                                {{ $depense->status ?? 'Done' }}
                                            </span>
                                        </td>
                                        <td class="px-5 py-3.5 text-right">
                                            <div class="flex justify-end space-x-2">
                                                <button
                                                    class="p-1.5 rounded hover:bg-gray-700/50 text-gray-400 hover:text-white transition-colors">
                                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                </button>
                                                @if ($depense->type === 'recurrentes')
                                                    <form action="{{ route('depense.destroy', $depense->id) }}"
                                                        method="GET">
                                                        <button type="submit"
                                                            class="p-1.5 rounded hover:bg-red-500/10 text-gray-400 hover:text-red-400 transition-colors">
                                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                                                stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div x-show="isOpen" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
            <div class="fixed inset-0 bg-black/60 backdrop-blur-sm" @click="isOpen = false"></div>
            <div class="relative min-h-screen flex items-center justify-center p-4">
                <div
                    class="relative bg-gray-800/80 backdrop-blur-xl rounded-xl border border-gray-700/50 shadow-xl w-full max-w-md overflow-hidden">
                    <div class="p-5 border-b border-gray-700/50 flex justify-between items-center">
                        <h3 class="text-lg font-medium text-white">Add New Transaction</h3>
                        <button @click="isOpen = false" class="text-gray-400 hover:text-white">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <form action="{{ Route('transaction.submit') }}" method="POST" class="p-5"
                        x-data="{ transactionType: 'ponctuelle' }">
                        @csrf
                        <div class="space-y-4">
                            <!-- Type Selection -->
                            <div>
                                <label class="block text-sm text-gray-400 mb-1">Transaction Type</label>
                                <div class="grid grid-cols-2 gap-2">
                                    <button type="button" @click="transactionType = 'ponctuelle'"
                                        :class="{ 'bg-blue-600 border-blue-600 text-white': transactionType === 'ponctuelle', 'bg-gray-800/50 border-gray-600 text-gray-300': transactionType !== 'ponctuelle' }"
                                        class="py-2 border rounded-lg text-sm font-medium transition-colors">
                                        Simple
                                    </button>
                                    <button type="button" @click="transactionType = 'recurrentes'"
                                        :class="{ 'bg-blue-600 border-blue-600 text-white': transactionType === 'recurrentes', 'bg-gray-800/50 border-gray-600 text-gray-300': transactionType !== 'recurrentes' }"
                                        class="py-2 border rounded-lg text-sm font-medium transition-colors">
                                        Subscription
                                    </button>
                                </div>
                                <input type="hidden" name="transaction_type" x-bind:value="transactionType">
                            </div>

                            <!-- Amount -->
                            <div>
                                <label class="block text-sm text-gray-400 mb-1">Amount (DH)</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <span class="text-gray-500">DH</span>
                                    </div>
                                    <input type="number" name="amount" required step="0.01" placeholder="0.00"
                                        class="w-full bg-gray-700/40 border border-gray-600 rounded-lg py-2 pl-10 pr-3 text-white placeholder-gray-500 focus:border-blue-500 focus:ring focus:ring-blue-500/20">
                                </div>
                            </div>

                            <!-- Category -->
                            <div>
                                <label class="block text-sm text-gray-400 mb-1">Category</label>
                                <select name="category" required
                                    class="w-full bg-gray-700/40 border border-gray-600 rounded-lg py-2 px-3 text-white focus:border-blue-500 focus:ring focus:ring-blue-500/20">
                                    <option value="" disabled selected>Select category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Date - Subscription only -->
                            <div x-show="transactionType === 'recurrentes'" x-transition>
                                <label class="block text-sm text-gray-400 mb-1">Start Date (Day of month)</label>
                                <input type="number" name="date" min="1" max="31"
                                    placeholder="1-31" x-bind:required="transactionType === 'recurrentes'"
                                    class="w-full bg-gray-700/40 border border-gray-600 rounded-lg py-2 px-3 text-white focus:border-blue-500 focus:ring focus:ring-blue-500/20">
                            </div>

                            <!-- Submit Button -->
                            <div class="pt-2">
                                <button type="submit"
                                    class="w-full py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
                                    Add Transaction
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
