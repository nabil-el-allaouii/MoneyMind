<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-gray-950 to-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Admin Dashboard Header -->
            <div
                class="mb-8 bg-gradient-to-br from-gray-900/50 to-gray-800/50 backdrop-blur-sm rounded-2xl border border-gray-700 shadow-lg p-6">
                <h2 class="text-xl font-semibold text-white">Admin Control Center</h2>
                <p class="text-gray-400">Manage your application settings and monitor user data</p>
            </div>

            <!-- Admin Stats Section -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
                <!-- Left Column - Main Stats -->
                <div class="lg:col-span-2">
                    <div
                        class="bg-gradient-to-br from-gray-900/50 to-gray-800/50 backdrop-blur-sm p-8 rounded-2xl border border-gray-700 shadow-lg">
                        <div class="flex justify-between items-start mb-8">
                            <div>
                                <h3 class="text-gray-400 text-sm mb-1">Application Overview</h3>
                                <div class="flex items-baseline">
                                    <span
                                        class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 via-cyan-500 to-blue-500">{{ $UsersCount }}</span>
                                    <span class="ml-2 text-gray-400">users</span>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-6">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-white mb-1">{{ $average }}</div>
                                <div class="text-sm text-gray-400">Avg. Income (DH)</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-emerald-400 mb-1">+15%</div>
                                <div class="text-sm text-gray-400">User Growth</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-white mb-1">{{ $inactifCount }}</div>
                                <div class="text-sm text-gray-400">Inactive Accounts</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Remove Inactive Accounts -->
                <div
                    class="bg-gradient-to-br from-gray-900/50 to-gray-800/50 backdrop-blur-sm p-8 rounded-2xl border border-gray-700 shadow-lg">
                    <h3 class="text-lg font-semibold text-white mb-6">Account Management</h3>
                    <div class="space-y-6">
                        <div>
                            <p class="text-gray-400 mb-2">Remove inactive accounts (no activity in last 2 months)</p>
                            <form action="{{route('inactif.destroy')}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button
                                    class="w-full py-3 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-lg hover:from-red-600 hover:to-red-700 transition-all duration-300 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Remove Inactive Accounts
                                </button>
                            </form>
                        </div>
                        <div>
                            <p class="text-gray-400 mb-2">Export user data</p>
                            <button
                                class="w-full py-3 bg-gradient-to-r from-gray-600 to-gray-700 text-white rounded-lg hover:from-gray-700 hover:to-gray-800 transition-all duration-300 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                                Export Data
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity & Analytics -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
                <!-- User Activity -->
                <div
                    class="lg:col-span-2 bg-gradient-to-br from-gray-900/50 to-gray-800/50 backdrop-blur-sm rounded-2xl border border-gray-700 shadow-lg">
                    <div class="p-6 border-b border-gray-700">
                        <h3 class="text-lg font-semibold text-white">Recent User Activity</h3>
                    </div>
                    <div class="p-6 space-y-6">
                        <!-- Activity Item -->
                        <div
                            class="flex items-center justify-between group hover:bg-gray-800/50 p-4 rounded-xl transition-all duration-300">
                            <div class="flex items-center space-x-4">
                                <div class="p-3 bg-cyan-500/10 rounded-xl border border-cyan-500/20">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-white font-medium">John Doe</h4>
                                    <p class="text-sm text-gray-400">Added a new transaction</p>
                                </div>
                            </div>
                            <span class="text-gray-400 font-medium">Mar 14, 2024</span>
                        </div>

                        <div
                            class="flex items-center justify-between group hover:bg-gray-800/50 p-4 rounded-xl transition-all duration-300">
                            <div class="flex items-center space-x-4">
                                <div class="p-3 bg-emerald-500/10 rounded-xl border border-emerald-500/20">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-400"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-white font-medium">Jane Smith</h4>
                                    <p class="text-sm text-gray-400">Updated profile</p>
                                </div>
                            </div>
                            <span class="text-gray-400 font-medium">Mar 13, 2024</span>
                        </div>

                        <div
                            class="flex items-center justify-between group hover:bg-gray-800/50 p-4 rounded-xl transition-all duration-300">
                            <div class="flex items-center space-x-4">
                                <div class="p-3 bg-red-500/10 rounded-xl border border-red-500/20">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-white font-medium">Alice Johnson</h4>
                                    <p class="text-sm text-gray-400">Deleted a transaction</p>
                                </div>
                            </div>
                            <span class="text-gray-400 font-medium">Mar 12, 2024</span>
                        </div>
                    </div>
                </div>

                <!-- System Metrics -->
                <div
                    class="bg-gradient-to-br from-gray-900/50 to-gray-800/50 backdrop-blur-sm p-6 rounded-2xl border border-gray-700 shadow-lg">
                    <div class="flex items-center space-x-4 mb-6">
                        <div class="p-3 bg-gradient-to-r from-emerald-400 via-cyan-500 to-blue-500 rounded-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-white">System Metrics</h3>
                    </div>
                    <div class="space-y-4">
                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <span class="text-gray-400">Server Uptime</span>
                                <span class="text-white">99.9%</span>
                            </div>
                            <div class="relative">
                                <div class="overflow-hidden h-2 text-xs flex rounded-full bg-gray-800">
                                    <div class="bg-gradient-to-r from-emerald-400 to-cyan-500 w-[99.9%]"></div>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <span class="text-gray-400">Database Load</span>
                                <span class="text-white">42%</span>
                            </div>
                            <div class="relative">
                                <div class="overflow-hidden h-2 text-xs flex rounded-full bg-gray-800">
                                    <div class="bg-gradient-to-r from-emerald-400 to-cyan-500 w-[42%]"></div>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <span class="text-gray-400">API Requests</span>
                                <span class="text-white">78%</span>
                            </div>
                            <div class="relative">
                                <div class="overflow-hidden h-2 text-xs flex rounded-full bg-gray-800">
                                    <div class="bg-gradient-to-r from-emerald-400 to-cyan-500 w-[78%]"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Manage Categories Section -->
            <div
                class="bg-gradient-to-br from-gray-900/50 to-gray-800/50 backdrop-blur-sm rounded-2xl border border-gray-700 shadow-lg p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-white">Manage Categories</h3>
                    <button id="toggleCategoryForm"
                        class="px-4 py-2 bg-gradient-to-r from-emerald-400 via-cyan-500 to-blue-500 text-white rounded-lg text-sm font-medium hover:from-emerald-500 hover:via-cyan-600 hover:to-blue-600 transition-all duration-300 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Add Category
                    </button>
                </div>

                <!-- Input Fields for Adding Category -->
                <div id="categoryForm" style="display: none;"
                    class="mb-6 bg-gray-800/30 p-6 rounded-xl border border-gray-700">
                    <form action="{{ Route('category.create') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="category_name" class="block text-sm font-medium text-gray-400 mb-2">Category
                                Name</label>
                            <input type="text" id="category_name" name="category_name" required
                                class="w-full bg-gray-800/50 border border-gray-700 rounded-lg py-2 px-4 text-white placeholder-gray-500 focus:ring-2 focus:ring-cyan-500 focus:border-transparent">
                        </div>
                        <div>
                            <label for="description"
                                class="block text-sm font-medium text-gray-400 mb-2">Description</label>
                            <textarea id="description" name="description" rows="3" required
                                class="w-full bg-gray-800/50 border border-gray-700 rounded-lg py-2 px-4 text-white placeholder-gray-500 focus:ring-2 focus:ring-cyan-500 focus:border-transparent"
                                placeholder="Enter category description..."></textarea>
                        </div>
                        <div class="flex justify-end space-x-3">
                            <button type="button" id="cancelCategory"
                                class="px-4 py-2 bg-gray-700 text-white rounded-lg hover:bg-gray-600 transition-all duration-300">
                                Cancel
                            </button>
                            <button type="submit"
                                class="px-4 py-2 bg-gradient-to-r from-emerald-400 via-cyan-500 to-blue-500 text-white rounded-lg hover:from-emerald-500 hover:via-cyan-600 hover:to-blue-600 transition-all duration-300">
                                Add Category
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Categories Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-700">
                        <thead>
                            <tr>
                                <th
                                    class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                    Category Name</th>
                                <th
                                    class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                    Description</th>
                                <th
                                    class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700">
                            @foreach ($categories as $category)
                                <tr class="hover:bg-gray-800/30 transition duration-150">
                                    <td class="px-4 py-3 text-sm text-gray-300">{{ $category->name }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-300">{{ $category->description }}</td>
                                    <td class="px-4 py-3">
                                        <div class="flex space-x-3">
                                            <button
                                                class="text-cyan-400 hover:text-cyan-300 transition-colors duration-300">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </button>
                                            <form action="#">
                                                @csrf
                                                <button
                                                    class="text-red-400 hover:text-red-300 transition-colors duration-300">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
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

    <script>
        document.getElementById('toggleCategoryForm').addEventListener('click', function() {
            var form = document.getElementById('categoryForm');
            form.style.display = 'block';
        });

        document.getElementById('cancelCategory').addEventListener('click', function() {
            var form = document.getElementById('categoryForm');
            form.style.display = 'none';
        });
    </script>
</x-app-layout>
