<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard | client</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <link href="https://ai-public.creatie.ai/gen_page/tailwind-custom.css" rel="stylesheet">
    <script
        src="https://cdn.tailwindcss.com/3.4.5?plugins=forms@0.5.7,typography@0.5.13,aspect-ratio@0.4.2,container-queries@0.1.1">
    </script>





    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://ai-public.creatie.ai/gen_page/tailwind-config.min.js" data-color="#6366f1"
        data-border-radius='small'></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased  bg-gray-900 text-gray-100 min-h-screen">
    <div class="min-h-screen bg-gradient-to-b from-gray-950 to-gray-900">
        <!-- Header Navigation -->
        <nav class="fixed w-full z-50 bg-gray-900/95 backdrop-blur-sm border-b border-gray-800 shadow-lg">
            <div class="max-w-7xl mx-auto">
                <div class="flex items-center justify-between h-16 px-4">
                    <!-- Logo and Navigation -->
                    <div class="flex items-center flex-1">
                        <div class="flex-shrink-0">
                            <img src="https://ai-public.creatie.ai/gen_page/logo_placeholder.png" alt="Logo"
                                class="h-8">
                        </div>

                        <!-- Main Navigation -->
                        <div class="hidden md:flex ml-8 space-x-4">
                            <a href="{{ route('dashboard') }}"
                                class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-800/50 rounded-xl transition-all duration-300 
                                      {{ request()->routeIs('dashboard') ? 'bg-gradient-to-r from-emerald-400/10 via-cyan-400/10 to-blue-400/10 border border-cyan-500/20 text-white' : '' }}">
                                <i class="fas fa-chart-line w-4 h-4"></i>
                                <span class="ml-2 text-sm font-medium">Dashboard</span>
                            </a>

                            <a href="/transactions"
                                class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-800/50 rounded-xl transition-all duration-300">
                                <i class="fas fa-wallet w-4 h-4"></i>
                                <span class="ml-2 text-sm font-medium">Transactions</span>
                            </a>

                            <a href="/savings"
                                class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-800/50 rounded-xl transition-all duration-300">
                                <i class="fas fa-piggy-bank w-4 h-4"></i>
                                <span class="ml-2 text-sm font-medium">Savings</span>
                            </a>

                            <a href="/wishlist"
                                class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-800/50 rounded-xl transition-all duration-300">
                                <i class="fas fa-bullseye w-4 h-4"></i>
                                <span class="ml-2 text-sm font-medium">Wishlist</span>
                            </a>

                            <a href="/alerts"
                                class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-800/50 rounded-xl transition-all duration-300">
                                <i class="fas fa-credit-card w-4 h-4"></i>
                                <span class="ml-2 text-sm font-medium">Alerts</span>
                            </a>
                        </div>
                    </div>

                    <!-- Right Side Navigation -->
                    <div class="flex items-center space-x-4">
                        <!-- Mobile Menu Button -->
                        <div class="md:hidden">
                            <button type="button" @click="mobileMenuOpen = !mobileMenuOpen"
                                class="p-2 text-gray-300 hover:text-white rounded-xl hover:bg-gray-800/50 transition-all duration-300">
                                <i class="fas fa-bars"></i>
                            </button>
                        </div>

                        <!-- Notifications -->
                        <button
                            class="p-2 text-gray-300 hover:text-white rounded-xl hover:bg-gray-800/50 transition-all duration-300">
                            <i class="fas fa-bell"></i>
                        </button>

                        <!-- Profile Dropdown -->
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open"
                                class="flex items-center space-x-3 p-2 text-gray-300 hover:text-white rounded-xl hover:bg-gray-800/50 transition-all duration-300">
                                <img class="h-8 w-8 rounded-xl object-cover border border-cyan-500/20"
                                    src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}"
                                    alt="{{ Auth::user()->name }}">
                                <span class="text-sm font-medium hidden md:block">{{ Auth::user()->name }}</span>
                                <i class="fas fa-chevron-down text-xs hidden md:block"></i>
                            </button>

                            <!-- Dropdown Menu -->
                            <div x-show="open" @click.away="open = false"
                                class="absolute right-0 mt-2 w-48 bg-gray-900 border border-gray-800 rounded-xl shadow-lg py-1">
                                <a href="{{ route('profile.edit') }}"
                                    class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-800 hover:text-white">
                                    <i class="fas fa-user-circle mr-2"></i> Profile
                                </a>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-800 hover:text-white">
                                    <i class="fas fa-cog mr-2"></i> Settings
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="w-full text-left px-4 py-2 text-sm text-red-400 hover:bg-gray-800 hover:text-red-300">
                                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile Navigation Menu -->
            <div x-show="mobileMenuOpen" class="md:hidden bg-gray-900 border-t border-gray-800">
                <div class="px-2 pt-2 pb-3 space-y-1">
                    <a href="{{ route('dashboard') }}"
                        class="block px-3 py-2 text-gray-300 hover:bg-gray-800 rounded-xl">
                        <i class="fas fa-chart-line mr-2"></i> Dashboard
                    </a>
                    <a href="#" class="block px-3 py-2 text-gray-300 hover:bg-gray-800 rounded-xl">
                        <i class="fas fa-wallet mr-2"></i> Transactions
                    </a>
                    <a href="#" class="block px-3 py-2 text-gray-300 hover:bg-gray-800 rounded-xl">
                        <i class="fas fa-piggy-bank mr-2"></i> Savings
                    </a>
                    <a href="#" class="block px-3 py-2 text-gray-300 hover:bg-gray-800 rounded-xl">
                        <i class="fas fa-bullseye mr-2"></i> Wishlist
                    </a>
                    <a href="#" class="block px-3 py-2 text-gray-300 hover:bg-gray-800 rounded-xl">
                        <i class="fas fa-credit-card mr-2"></i> Cards
                    </a>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="pt-16">
            <main class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $slot }}
            </main>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('layout', () => ({
                mobileMenuOpen: false
            }))
        })
    </script>
</body>

</html>
