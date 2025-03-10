<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" x-data="{ showEditModal: false, editingRule: null }">
            <!-- Page Header -->
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-white">Budget Rules</h1>
                <p class="text-gray-400 text-sm">Set alerts and thresholds for your spending</p>
            </div>

            <!-- Main Content -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <!-- Simplified Global Budget Rule Card -->
                <div
                    class="md:col-span-2 bg-gray-800/30 backdrop-blur-sm rounded-xl border border-gray-700/50 shadow-lg p-6">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="bg-blue-500/20 p-2 rounded-lg">
                            <svg class="w-5 h-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <h3 class="text-white text-lg font-semibold">Global Budget Alert</h3>
                    </div>
                    @if (!$globals)
                        <form action="{{ route('alert.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="type" value="global">
                            <div class="flex items-center gap-6 mb-4">
                                <div class="text-sm text-gray-300">Alert me when I spend:</div>
                                <div class="flex gap-3">
                                    <label class="flex items-center">
                                        <input type="radio" name="threshold" value="50" checked
                                            class="text-blue-500 bg-gray-700 border-gray-600 focus:ring-blue-500">
                                        <span class="ml-2 text-white">50%</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" name="threshold" value="75"
                                            class="text-blue-500 bg-gray-700 border-gray-600 focus:ring-blue-500">
                                        <span class="ml-2 text-white">75%</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" name="threshold" value="90"
                                            class="text-blue-500 bg-gray-700 border-gray-600 focus:ring-blue-500">
                                        <span class="ml-2 text-white">90%</span>
                                    </label>
                                </div>
                            </div>

                            <div class="flex justify-between items-center">
                                <p class="text-xs text-gray-400">You'll be notified when you reach this percentage of
                                    your monthly income</p>
                                <button type="submit"
                                    class="px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white text-sm rounded-lg transition-colors">
                                    Save
                                </button>
                            </div>
                        </form>
                    @else
                        <div class="mb-4">
                            <div class="flex items-center justify-between mb-3">
                                <div class="text-sm text-gray-300">Current threshold:</div>
                                <div class="px-3 py-1 bg-blue-500/20 text-blue-300 rounded-full text-sm font-medium">
                                    {{ $globals[0]->percentage }}% of monthly income
                                </div>
                            </div>

                            <div class="bg-gray-800/50 rounded-lg p-3 mb-4">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-blue-400 mr-2" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-sm text-gray-300">
                                        You'll receive an email notification when your spending reaches
                                        {{ $globals[0]->percentage }}% of your monthly budget
                                    </span>
                                </div>
                            </div>

                            <form action="{{ route('alert.update', $globals[0]->id) }}" method="POST" class="mt-5">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="type" value="global">

                                <div class="flex flex-wrap items-center gap-4 mb-4">
                                    <span class="text-sm text-gray-300">Change threshold to:</span>
                                    <div class="flex gap-3">
                                        <label class="flex items-center">
                                            <input type="radio" name="threshold" value="50"
                                                {{ $globals[0]->percentage == 50 ? 'checked' : '' }}
                                                class="text-blue-500 bg-gray-700 border-gray-600 focus:ring-blue-500">
                                            <span class="ml-2 text-white">50%</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="radio" name="threshold" value="75"
                                                {{ $globals[0]->percentage == 75 ? 'checked' : '' }}
                                                class="text-blue-500 bg-gray-700 border-gray-600 focus:ring-blue-500">
                                            <span class="ml-2 text-white">75%</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="radio" name="threshold" value="90"
                                                {{ $globals[0]->percentage == 90 ? 'checked' : '' }}
                                                class="text-blue-500 bg-gray-700 border-gray-600 focus:ring-blue-500">
                                            <span class="ml-2 text-white">90%</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white text-sm rounded-lg transition-colors">
                                        Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    @endif
                </div>

                <!-- Notification Settings -->
                <div class="bg-gray-800/30 backdrop-blur-sm rounded-xl border border-gray-700/50 shadow-lg p-6">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="bg-purple-500/20 p-2 rounded-lg">
                            <svg class="w-5 h-5 text-purple-400" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </div>
                        <h3 class="text-white text-lg font-semibold">Notifications</h3>
                    </div>

                    <div class="space-y-3">
                        <label class="flex items-center justify-between p-3 bg-gray-800/50 rounded-lg cursor-pointer">
                            <span class="text-sm text-gray-300">Email alerts</span>
                            <input type="checkbox" checked
                                class="rounded bg-gray-700 border-gray-600 text-blue-500 focus:ring-blue-600">
                        </label>

                        <label class="flex items-center justify-between p-3 bg-gray-800/50 rounded-lg cursor-pointer">
                            <span class="text-sm text-gray-300">Push notifications</span>
                            <input type="checkbox"
                                class="rounded bg-gray-700 border-gray-600 text-blue-500 focus:ring-blue-600">
                        </label>
                    </div>
                </div>
            </div>

            <!-- Category Rules -->
            <div class="bg-gray-800/30 backdrop-blur-sm rounded-xl border border-gray-700/50 shadow-lg">
                <div class="p-5 border-b border-gray-700/50 flex justify-between items-center">
                    <h3 class="text-white text-lg font-semibold">Category Budget Rules</h3>
                    <button type="button"
                        class="px-3 py-1.5 bg-gray-700/70 hover:bg-gray-700 text-gray-300 text-sm rounded-lg flex items-center">
                        <svg class="w-4 h-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Add Rule
                    </button>
                </div>

                <div class="divide-y divide-gray-700/50">
                    <!-- Category Rule Items -->
                    @foreach ($categorized as $item)
                        <div class="p-5 flex flex-wrap items-center justify-between gap-4">
                            <div class="flex items-center">
                                <div
                                    class="h-10 w-10 rounded-lg flex items-center justify-center bg-red-500/20 border border-red-500/20">
                                    <svg class="w-5 h-5 text-red-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-white font-medium">{{$item->category->name}}</h4>
                                    <p class="text-gray-400 text-xs">Alert at {{$item->percentage}}% of income</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-3">
                                <button type="button" 
                                    @click="showEditModal = true; editingRule = {id: {{$item->id}}, category_name: '{{$item->category->name}}', percentage: {{$item->percentage}} }"
                                    class="p-1.5 rounded hover:bg-gray-700/50 text-gray-300 hover:text-white">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </button>
                                <form action="{{route('alert.destroy',$item->id)}}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="p-1.5 rounded hover:bg-gray-700/50 text-gray-300 hover:text-red-400">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Add Rule Form -->
                <form action="{{ route('alert.category') }}" method="POST">
                    @csrf
                    <input type="hidden" value="category" name="type">
                    <div class="bg-gray-800/40 p-5 border-t border-gray-700/50">
                        <h4 class="text-white font-medium mb-4">Add New Category Rule</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm text-gray-300 mb-1">Category</label>
                                <select name="id"
                                    class="w-full bg-gray-700/60 border border-gray-600 rounded-lg px-3 py-2 text-white">
                                    <option>Select a category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm text-gray-300 mb-1">Threshold (%)</label>
                                <div class="relative">
                                    <input name="threshold" type="number" min="1" max="100"
                                        placeholder="20"
                                        class="w-full bg-gray-700/60 border border-gray-600 rounded-lg px-3 py-2 text-white">
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <span class="text-gray-400">%</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end space-x-3 mt-4">
                            <button type="button" class="px-3 py-1.5 text-gray-400 hover:text-gray-300">
                                Cancel
                            </button>
                            <button type="submit"
                                class="px-4 py-1.5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">
                                Save Rule
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Edit Category Rule Modal -->
            <div x-show="showEditModal" 
                class="fixed inset-0 z-50 overflow-y-auto" 
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                style="display: none;">
                
                <!-- Background overlay -->
                <div class="fixed inset-0 bg-black/60 backdrop-blur-sm" @click="showEditModal = false"></div>
                
                <!-- Modal panel -->
                <div class="relative flex items-center justify-center min-h-screen p-4">
                    <div class="bg-gray-800/90 backdrop-blur-lg rounded-xl border border-gray-700/50 shadow-xl w-full max-w-md overflow-hidden">
                        <div class="p-5 border-b border-gray-700/50 flex justify-between items-center">
                            <h3 class="text-lg font-medium text-white flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                                Edit Category Rule
                            </h3>
                            <button @click="showEditModal = false" class="text-gray-400 hover:text-white">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        
                        <form x-bind:action="'{{ route('alert.category.update', '') }}/' + editingRule?.id" method="POST" class="p-5">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="type" value="category">
                            
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm text-gray-300 mb-1">Category</label>
                                    <div class="bg-gray-700/40 px-3 py-2 rounded-lg border border-gray-600/50 text-white">
                                        <span x-text="editingRule?.category_name"></span>
                                    </div>
                                </div>
                                
                                <div>
                                    <label class="block text-sm text-gray-300 mb-1">Threshold (%)</label>
                                    <div class="relative">
                                        <input name="threshold" type="number" min="1" max="100" 
                                            x-bind:value="editingRule?.percentage"
                                            class="w-full bg-gray-700/60 border border-gray-600 rounded-lg px-3 py-2 text-white">
                                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                            <span class="text-gray-400">%</span>
                                        </div>
                                    </div>
                                    <p class="mt-1 text-xs text-gray-400">Set the percentage of your monthly income to trigger an alert</p>
                                </div>
                            </div>
                            
                            <div class="mt-6 flex justify-end space-x-3">
                                <button type="button" @click="showEditModal = false" 
                                    class="px-3 py-2 text-gray-400 hover:text-gray-300">
                                    Cancel
                                </button>
                                <button type="submit"
                                    class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">
                                    Save Changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</x-app-layout>