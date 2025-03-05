<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div x-data="{ isOpen: false }" @keydown.escape.window="isOpen = false">
        <div class="py-12 bg-gradient-to-b from-gray-950 to-gray-900">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Add Money Button -->
                <div class="flex justify-end mb-4">
                    <button @click="isOpen = true"
                        class="bg-gradient-to-r from-emerald-400 via-cyan-500 to-blue-500 text-white px-4 py-2 rounded-lg text-sm font-medium hover:from-emerald-500 hover:via-cyan-600 hover:to-blue-600 transition-all duration-300">
                        Add Money
                    </button>
                </div>

                <!-- Add Money Form -->
                <div x-show="isOpen" class="bg-gradient-to-br from-gray-900/50 to-gray-800/50 backdrop-blur-sm rounded-2xl border border-gray-700 shadow-lg p-6 mb-8">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-semibold text-white">Add Money to Account</h3>
                        <button @click="isOpen = false" class="text-gray-400 hover:text-white transition-colors duration-300">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <form action="{{route('money.add')}}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="amount" class="block text-sm font-medium text-gray-400 mb-2">Amount (DH)</label>
                            <input type="number" id="amount" name="amount" required
                                class="w-full bg-gray-800 border border-gray-700 rounded-lg py-2 px-4 text-white placeholder-gray-500 focus:ring-2 focus:ring-cyan-500 focus:border-transparent">
                        </div>
                        <div class="flex justify-between">
                            <button type="submit"
                                class="px-6 py-2 bg-gradient-to-r from-emerald-400 via-cyan-500 to-blue-500 text-white rounded-lg text-sm font-medium hover:from-emerald-500 hover:via-cyan-600 hover:to-blue-600 transition-all duration-300">
                                Add Money
                            </button>
                            <button type="button" @click="isOpen = false"
                                class="px-4 py-2 bg-gray-600 text-white rounded-lg text-sm font-medium hover:bg-gray-700 transition-all duration-300">
                                Close
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Main Stats Section -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
                    <!-- Left Column - Main Balance -->
                    <div class="lg:col-span-2">
                        <div class="bg-gradient-to-br from-gray-900/50 to-gray-800/50 backdrop-blur-sm p-8 rounded-2xl border border-gray-700 shadow-lg">
                            <div class="flex justify-between items-start mb-8">
                                <div>
                                    <h3 class="text-gray-400 text-sm mb-1">Total Balance</h3>
                                    <div class="flex items-baseline">
                                        <span class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 via-cyan-500 to-blue-500">{{$info->budget??0}}</span>
                                        <span class="ml-2 text-gray-400">DH</span>
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-3 gap-6">
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-white mb-1">65%</div>
                                    <div class="text-sm text-gray-400">Monthly Goal</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-emerald-400 mb-1">+12%</div>
                                    <div class="text-sm text-gray-400">Growth</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-white mb-1">{{$totalExpenses}}<span class="ml-2 text-gray-400">DH</span></div>
                                    <div class="text-sm text-gray-400">Expenses</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column - Categories Breakdown -->
                    <div class="bg-gradient-to-br from-gray-900/50 to-gray-800/50 backdrop-blur-sm p-8 rounded-2xl border border-gray-700 shadow-lg">
                        <h3 class="text-lg font-semibold text-white mb-6">Categories Breakdown</h3>
                        <table class="min-w-full divide-y divide-gray-700">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 text-left text-gray-400">Category Name</th>
                                    <th class="px-4 py-2 text-left text-gray-400">Percentage</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-700">
                                @foreach ($CategoryBreak as $category)
                                <tr>
                                    <td class="px-4 py-2 text-gray-300">{{$category->category->name}}</td>
                                    <td class="px-4 py-2 text-gray-300">{{ $category->percentage }}%</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Recent Activity & AI Section -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
                    <!-- Recent Transactions -->
                    <div class="lg:col-span-2 bg-gradient-to-br from-gray-900/50 to-gray-800/50 backdrop-blur-sm rounded-2xl border border-gray-700 shadow-lg">
                        <div class="p-6 border-b border-gray-700">
                            <h3 class="text-lg font-semibold text-white">Recent Activity</h3>
                        </div>
                        <div class="p-6 space-y-6">
                            <!-- Transaction Item -->
                            <div class="flex items-center justify-between group hover:bg-gray-800/50 p-4 rounded-xl transition-all duration-300">
                                <div class="flex items-center space-x-4">
                                    <div class="p-3 bg-cyan-500/10 rounded-xl border border-cyan-500/20">
                                        <i class="fas fa-shopping-bag text-cyan-400"></i>
                                    </div>
                                    <div>
                                        <h4 class="text-white font-medium">Shopping</h4>
                                        <p class="text-sm text-gray-400">Today, 2:30 PM</p>
                                    </div>
                                </div>
                                <span class="text-red-400 font-medium">-320 DH</span>
                            </div>

                            <div class="flex items-center justify-between group hover:bg-gray-800/50 p-4 rounded-xl transition-all duration-300">
                                <div class="flex items-center space-x-4">
                                    <div class="p-3 bg-emerald-500/10 rounded-xl border border-emerald-500/20">
                                        <i class="fas fa-arrow-down text-emerald-400"></i>
                                    </div>
                                    <div>
                                        <h4 class="text-white font-medium">Salary Deposit</h4>
                                        <p class="text-sm text-gray-400">Yesterday</p>
                                    </div>
                                </div>
                                <span class="text-emerald-400 font-medium">+5,400 DH</span>
                            </div>
                        </div>
                    </div>

                    <!-- AI Insights -->
                    <div class="bg-gradient-to-br from-gray-900/50 to-gray-800/50 backdrop-blur-sm p-6 rounded-2xl border border-gray-700 shadow-lg">
                        <div class="flex items-center space-x-4 mb-6">
                            <div class="p-3 bg-gradient-to-r from-emerald-400 via-cyan-500 to-blue-500 rounded-xl">
                                <i class="fas fa-robot text-white text-xl"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-white">AI Insights</h3>
                        </div>
                        <div class="space-y-4">
                            <div class="p-4 bg-gray-800/50 rounded-xl border border-gray-700">
                                <p class="text-gray-300"><span class="text-cyan-400 font-medium">Tip:</span> Based on your spending, you could save 200 DH by reducing entertainment expenses.</p>
                            </div>
                            <div class="p-4 bg-gray-800/50 rounded-xl border border-gray-700">
                                <p class="text-gray-300"><span class="text-emerald-400 font-medium">Goal:</span> You're on track to reach your savings goal by next month!</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Goals Progress -->
                <div class="bg-gradient-to-br from-gray-900/50 to-gray-800/50 backdrop-blur-sm p-6 rounded-2xl border border-gray-700 shadow-lg">
                    <h3 class="text-lg font-semibold text-white mb-6">Financial Goals</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Goal Item -->
                        <div class="space-y-4">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h4 class="text-white font-medium">Emergency Fund</h4>
                                    <p class="text-sm text-gray-400">6,000 / 10,000 DH</p>
                                </div>
                                <span class="text-lg font-bold text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-cyan-400">60%</span>
                            </div>
                            <div class="relative">
                                <div class="overflow-hidden h-2 text-xs flex rounded-full bg-gray-800">
                                    <div class="bg-gradient-to-r from-emerald-400 via-cyan-500 to-blue-500 w-[60%] transition-all duration-500"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Goal Item -->
                        <div class="space-y-4">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h4 class="text-white font-medium">New Car</h4>
                                    <p class="text-sm text-gray-400">45,000 / 150,000 DH</p>
                                </div>
                                <span class="text-lg font-bold text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-cyan-400">30%</span>
                            </div>
                            <div class="relative">
                                <div class="overflow-hidden h-2 text-xs flex rounded-full bg-gray-800">
                                    <div class="bg-gradient-to-r from-emerald-400 via-cyan-500 to-blue-500 w-[30%] transition-all duration-500"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Goal Item -->
                        <div class="space-y-4">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h4 class="text-white font-medium">Vacation</h4>
                                    <p class="text-sm text-gray-400">8,000 / 20,000 DH</p>
                                </div>
                                <span class="text-lg font-bold text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-cyan-400">40%</span>
                            </div>
                            <div class="relative">
                                <div class="overflow-hidden h-2 text-xs flex rounded-full bg-gray-800">
                                    <div class="bg-gradient-to-r from-emerald-400 via-cyan-500 to-blue-500 w-[40%] transition-all duration-500"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>