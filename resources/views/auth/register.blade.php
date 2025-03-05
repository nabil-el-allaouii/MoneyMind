<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MoneyMind - Registration</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <link href="https://ai-public.creatie.ai/gen_page/tailwind-custom.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com/3.4.5?plugins=forms@0.5.7"></script>
</head>

<body class="font-inter bg-gradient-to-b from-gray-950 to-gray-900 text-white min-h-screen">
    <nav class="fixed w-full z-50 bg-gray-900/95 backdrop-blur-sm border-b border-gray-800 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex-shrink-0 flex items-center">
                    <img class="h-8 w-auto" src="https://ai-public.creatie.ai/gen_page/logo_placeholder.png"
                        alt="MoneyMind" />
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:items-center">
                    <a href="{{ route('login') }}"
                        class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                        Already have an account? Login
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="pt-16">
        <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
            <div
                class="max-w-md w-full space-y-8 bg-gray-800/50 p-8 rounded-2xl backdrop-blur-sm border border-gray-700/50">
                <div>
                    <h2
                        class="mt-6 text-center text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-br from-emerald-400 via-cyan-500 to-blue-500">
                        Create your account
                    </h2>
                    <p class="mt-2 text-center text-sm text-gray-400">
                        Start your journey to financial freedom
                    </p>
                </div>
                <form class="mt-8 space-y-6" action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="rounded-md shadow-sm space-y-4">
                        <div>
                            <label for="name" class="text-sm font-medium text-gray-300">Full Name</label>
                            <input id="name" name="name" type="text" required
                                class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-700 bg-gray-900 text-gray-300 placeholder-gray-500 focus:outline-none focus:ring-cyan-500 focus:border-cyan-500 focus:z-10 sm:text-sm"
                                placeholder="John Doe">
                        </div>
                        <div>
                            <label for="email" class="text-sm font-medium text-gray-300">Email address</label>
                            <input id="email" name="email" type="email" autocomplete="email" required
                                class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-700 bg-gray-900 text-gray-300 placeholder-gray-500 focus:outline-none focus:ring-cyan-500 focus:border-cyan-500 focus:z-10 sm:text-sm"
                                placeholder="john@example.com">
                        </div>
                        <div>
                            <label for="password" class="text-sm font-medium text-gray-300">Password</label>
                            <input id="password" name="password" type="password" autocomplete="new-password" required
                                class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-700 bg-gray-900 text-gray-300 placeholder-gray-500 focus:outline-none focus:ring-cyan-500 focus:border-cyan-500 focus:z-10 sm:text-sm"
                                placeholder="••••••••">
                        </div>
                        <div>
                            <label for="password_confirmation" class="text-sm font-medium text-gray-300">Confirm
                                Password</label>
                            <input id="password_confirmation" name="password_confirmation" type="password" required
                                class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-700 bg-gray-900 text-gray-300 placeholder-gray-500 focus:outline-none focus:ring-cyan-500 focus:border-cyan-500 focus:z-10 sm:text-sm"
                                placeholder="••••••••">
                        </div>
                        <div>
                            <label for="monthly_salary" class="text-sm font-medium text-gray-300">Monthly Salary
                                (DH)</label>
                            <input id="monthly_salary" name="monthly_salary" type="number" required
                                class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-700 bg-gray-900 text-gray-300 placeholder-gray-500 focus:outline-none focus:ring-cyan-500 focus:border-cyan-500 focus:z-10 sm:text-sm"
                                placeholder="5000">
                        </div>
                        <div>
                            <label for="monthly_budget" class="text-sm font-medium text-gray-300">Current Budget
                                (DH)</label>
                            <input id="monthly_budget" name="current_budget" type="number" required
                                class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-700 bg-gray-900 text-gray-300 placeholder-gray-500 focus:outline-none focus:ring-cyan-500 focus:border-cyan-500 focus:z-10 sm:text-sm"
                                placeholder="3000">
                        </div>
                        <div>
                            <label for="salary_date" class="text-sm font-medium text-gray-300">Salary Credit
                                Day</label>
                            <input placeholder="31" id="salary_date" name="salary_date" type="number" required
                                class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-700 bg-gray-900 text-gray-300 placeholder-gray-500 focus:outline-none focus:ring-cyan-500 focus:border-cyan-500 focus:z-10 sm:text-sm"
                                </div>
                        </div>

                        @if ($errors->any())
                            <div class="rounded-md bg-red-500/10 p-4">
                                <div class="flex">
                                    <div class="ml-3">
                                        <h3 class="text-sm font-medium text-red-400">
                                            Please fix the following errors:
                                        </h3>
                                        <div class="mt-2 text-sm text-red-400">
                                            <ul class="list-disc pl-5 space-y-1">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div>
                            <button type="submit"
                                class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-gradient-to-r from-emerald-400 via-cyan-500 to-blue-500 hover:from-emerald-500 hover:via-cyan-600 hover:to-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 transform hover:scale-105 transition-all duration-300">
                                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                    <i class="fas fa-user-plus text-emerald-200 group-hover:text-emerald-300"></i>
                                </span>
                                Create Account
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>
