<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MoneyMind - Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com/3.4.5?plugins=forms@0.5.7"></script>
</head>

<body class="font-inter bg-gradient-to-b from-gray-950 to-gray-900 text-white min-h-screen">
    <nav class="fixed w-full z-50 bg-gray-900/95 backdrop-blur-sm border-b border-gray-800 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex-shrink-0 flex items-center">
                    <a href="/">
                        <img class="h-8 w-auto" src="https://ai-public.creatie.ai/gen_page/logo_placeholder.png" alt="MoneyMind" />
                    </a>
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:items-center">
                    <a href="{{ route('register') }}" class="!rounded-button bg-gradient-to-r from-emerald-400 via-cyan-500 to-blue-500 text-white px-4 py-2 text-sm font-medium hover:from-emerald-500 hover:via-cyan-600 hover:to-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                        Create Account
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-gray-800/50 p-8 rounded-2xl backdrop-blur-sm border border-gray-700/50">
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-br from-emerald-400 via-cyan-500 to-blue-500">
                    Welcome Back
                </h2>
                <p class="mt-2 text-center text-sm text-gray-400">
                    Continue your journey to financial freedom
                </p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form class="mt-8 space-y-6" method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300">Email address</label>
                    <input id="email" name="email" type="email" autocomplete="email" required
                        class="mt-1 appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-700 bg-gray-900 text-gray-300 placeholder-gray-500 focus:outline-none focus:ring-cyan-500 focus:border-cyan-500 focus:z-10 sm:text-sm"
                        placeholder="your@email.com"
                        :value="old('email')">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
                    <input id="password" name="password" type="password" autocomplete="current-password" required
                        class="mt-1 appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-700 bg-gray-900 text-gray-300 placeholder-gray-500 focus:outline-none focus:ring-cyan-500 focus:border-cyan-500 focus:z-10 sm:text-sm"
                        placeholder="••••••••">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember_me" name="remember" type="checkbox"
                            class="h-4 w-4 text-cyan-500 focus:ring-cyan-500 border-gray-700 rounded bg-gray-900">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-300">
                            Remember me
                        </label>
                    </div>

                    @if (Route::has('password.request'))
                    <div class="text-sm">
                        <a href="{{ route('password.request') }}" class="font-medium text-cyan-500 hover:text-cyan-400">
                            Forgot password?
                        </a>
                    </div>
                    @endif
                </div>

                <div>
                    <button type="submit"
                        class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-gradient-to-r from-emerald-400 via-cyan-500 to-blue-500 hover:from-emerald-500 hover:via-cyan-600 hover:to-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 transform hover:scale-105 transition-all duration-300">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <i class="fas fa-sign-in-alt text-emerald-200 group-hover:text-emerald-300"></i>
                        </span>
                        Sign in to Dashboard
                    </button>
                </div>
            </form>

            <div class="mt-6">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-700"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-gray-800 text-gray-400">New to MoneyMind?</span>
                    </div>
                </div>

                <p class="mt-4 text-center text-sm text-gray-400">
                    Create an account to start managing your finances
                    <a href="{{ route('register') }}" class="font-medium text-cyan-500 hover:text-cyan-400 block mt-2">
                        <i class="fas fa-user-plus mr-1"></i>
                        Register Now
                    </a>
                </p>
            </div>
        </div>
    </main>
</body>

</html>