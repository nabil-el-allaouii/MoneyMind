<x-app-layout>
    <div class="py-12 bg-gradient-to-b from-gray-950 to-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Admin Dashboard Header -->
            <div
                class="mb-8 bg-gradient-to-br from-gray-900/50 to-gray-800/50 backdrop-blur-sm rounded-2xl border border-gray-700 shadow-lg p-6">
                <h2 class="text-xl font-semibold text-white">Admin Dashboard</h2>
                <p class="text-gray-400">Manage your application settings and user data</p>
            </div>

            <!-- Admin Stats Section -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div
                    class="bg-gradient-to-br from-gray-900/50 to-gray-800/50 backdrop-blur-sm rounded-2xl border border-gray-700 shadow-lg p-6">
                    <h3 class="text-gray-400 text-sm">Total Users</h3>
                    <div class="text-2xl font-bold text-white">1,250</div>
                </div>

                <div
                    class="bg-gradient-to-br from-gray-900/50 to-gray-800/50 backdrop-blur-sm rounded-2xl border border-gray-700 shadow-lg p-6">
                    <h3 class="text-gray-400 text-sm">Total Transactions</h3>
                    <div class="text-2xl font-bold text-white">5,430</div>
                </div>

                <div
                    class="bg-gradient-to-br from-gray-900/50 to-gray-800/50 backdrop-blur-sm rounded-2xl border border-gray-700 shadow-lg p-6">
                    <h3 class="text-gray-400 text-sm">Total Revenue</h3>
                    <div class="text-2xl font-bold text-white">150,000 DH</div>
                </div>
            </div>

            <!-- Recent Activity Section -->
            <div
                class="bg-gradient-to-br from-gray-900/50 to-gray-800/50 backdrop-blur-sm rounded-2xl border border-gray-700 shadow-lg p-6 mb-8">
                <h3 class="text-lg font-semibold text-white mb-4">Recent Activity</h3>
                <table class="min-w-full divide-y divide-gray-700">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left text-gray-400">User</th>
                            <th class="px-4 py-2 text-left text-gray-400">Action</th>
                            <th class="px-4 py-2 text-left text-gray-400">Date</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700">
                        <tr>
                            <td class="px-4 py-2 text-gray-300">John Doe</td>
                            <td class="px-4 py-2 text-gray-300">Added a new transaction</td>
                            <td class="px-4 py-2 text-gray-300">Mar 14, 2024</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 text-gray-300">Jane Smith</td>
                            <td class="px-4 py-2 text-gray-300">Updated profile</td>
                            <td class="px-4 py-2 text-gray-300">Mar 13, 2024</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 text-gray-300">Alice Johnson</td>
                            <td class="px-4 py-2 text-gray-300">Deleted a transaction</td>
                            <td class="px-4 py-2 text-gray-300">Mar 12, 2024</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Manage Categories Section -->
            <div
                class="bg-gradient-to-br from-gray-900/50 to-gray-800/50 backdrop-blur-sm rounded-2xl border border-gray-700 shadow-lg p-6">
                <h3 class="text-lg font-semibold text-white mb-4">Manage Categories</h3>
                <div class="mb-4">
                    <button id="toggleCategoryForm"
                        class="px-4 py-2 bg-gradient-to-r from-emerald-400 via-cyan-500 to-blue-500 text-white rounded-lg">
                        Add Category
                    </button>
                </div>

                <!-- Input Fields for Adding Category -->
                <div id="categoryForm" style="display: none;" class="mb-4">
                    <form action="{{ Route('category.create') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="category_name" class="block text-sm font-medium text-gray-400 mb-2">Category
                                Name</label>
                            <input type="text" id="category_name" name="category_name" required
                                class="w-full bg-gray-800/50 border border-gray-700 rounded-xl py-2 px-4 text-white placeholder-gray-500 focus:ring-2 focus:ring-cyan-500 focus:border-transparent">
                        </div>
                        <div>
                            <label for="description"
                                class="block text-sm font-medium text-gray-400 mb-2">Description</label>
                            <textarea id="description" name="description" rows="3" required
                                class="w-full bg-gray-800/50 border border-gray-700 rounded-xl py-2 px-4 text-white placeholder-gray-500 focus:ring-2 focus:ring-cyan-500 focus:border-transparent"
                                placeholder="Enter category description..."></textarea>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit"
                                class="px-4 py-2 bg-gradient-to-r from-emerald-400 via-cyan-500 to-blue-500 text-white rounded-lg">Add
                                Category</button>
                        </div>
                    </form>
                </div>

                <!-- Categories Table -->
                <table class="min-w-full divide-y divide-gray-700 mb-4">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left text-gray-400">Category Name</th>
                            <th class="px-4 py-2 text-left text-gray-400">Description</th>
                            <th class="px-4 py-2 text-left text-gray-400">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700">
                        @foreach ($categories as $category)
                            <tr>
                                <td class="px-4 py-2 text-gray-300">{{$category->name}}</td>
                                <td class="px-4 py-2 text-gray-300">{{$category->description}}</td>
                                <td class="px-4 py-2">
                                    <form action="#">
                                        @csrf
                                        <button class="text-red-400 hover:text-red-300 ml-2">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('toggleCategoryForm').addEventListener('click', function() {
            var form = document.getElementById('categoryForm');
            if (form.style.display === 'none' || form.style.display === '') {
                form.style.display = 'block';
            } else {
                form.style.display = 'none';
            }
        });
    </script>
</x-app-layout>
