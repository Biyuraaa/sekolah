<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Universitas Airlangga</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        .bg-pattern {
            background-color: #374151;
            /* Dark gray background that won't clash with the logo */
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewBox='0 0 100 100'%3E%3Cg fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath opacity='.5' d='M96 95h4v1h-4v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9zm-1 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9z'/%3E%3Cpath d='M6 5V0H5v5H0v1h5v94h1V6h94V5H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease-out, transform 0.5s ease-out;
        }

        .fade-in.show {
            opacity: 1;
            transform: translateY(0);
        }

        .icon-box {
            transition: transform 0.3s ease;
        }

        .icon-box:hover {
            transform: scale(1.05);
        }

        .icon-box:active {
            transform: scale(0.95);
        }
    </style>
</head>

<body class="min-h-screen bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Left Side - Background Image/Pattern -->
        <div class="hidden lg:flex lg:w-1/2 bg-pattern" id="loginSection">
            <div class="m-auto text-white px-8 sm:px-12 md:px-16 lg:px-20">
                <div class="space-y-6">
                    <img src="{{ asset('assets/images/logo.svg') }}" alt="Logo" class="h-32 fade-in" id="logo">
                    <h1 class="text-4xl font-bold fade-in" id="title">ONE</h1>
                    <div class="flex space-x-4 mt-8">
                        <div class="bg-white bg-opacity-10 p-4 rounded-lg icon-box fade-in" id="box1">
                            <i class="fas fa-graduation-cap text-3xl"></i>
                            <p class="mt-2 text-sm">Quality Education</p>
                        </div>
                        <div class="bg-white bg-opacity-10 p-4 rounded-lg icon-box fade-in" id="box2">
                            <i class="fas fa-users text-3xl"></i>
                            <p class="mt-2 text-sm">Global Community</p>
                        </div>
                        <div class="bg-white bg-opacity-10 p-4 rounded-lg icon-box fade-in" id="box3">
                            <i class="fas fa-brain text-3xl"></i>
                            <p class="mt-2 text-sm">Innovation Hub</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Login Form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-6">
            <div class="w-full max-w-md">
                <div class="bg-white rounded-2xl shadow-xl p-8">
                    <div class="text-center mb-8">
                        <h2 class="text-3xl font-bold text-gray-800">Welcome Back!</h2>
                        <p class="text-gray-500 mt-2">Please sign in to your account</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        <div class="space-y-2">
                            <label for="email" class="text-sm font-medium text-gray-700">Email/Username</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-user text-gray-400"></i>
                                </div>
                                <input type="text" name="email" id="email"
                                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-600 focus:border-transparent"
                                    placeholder="Enter your email or username" value="{{ old('email') }}" required
                                    autofocus>
                            </div>
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="password" class="text-sm font-medium text-gray-700">Password</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-lock text-gray-400"></i>
                                </div>
                                <input type="password" name="password" id="password"
                                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-600 focus:border-transparent"
                                    placeholder="Enter your password" required>
                            </div>
                            @error('password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input type="checkbox" name="remember" id="remember"
                                    class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                <label for="remember" class="ml-2 block text-sm text-gray-700">
                                    Remember me
                                </label>
                            </div>
                            <a href="{{ route('password.request') }}"
                                class="text-sm text-indigo-600 hover:text-indigo-500">
                                Forgot password?
                            </a>
                        </div>

                        <button type="submit"
                            class="w-full flex items-center justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-[#374151] hover:bg-[#111827] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <i class="fas fa-sign-in-alt mr-2 flex-shrink-0"></i>
                            <span>Sign in</span>
                        </button>
                        <div class="mt-6 text-center">
                            <p class="text-sm text-gray-600">
                                Dont have an account?
                                <a href="{{ route('register') }}"
                                    class="font-medium text-indigo-600 hover:text-indigo-500">
                                    Sign up
                                </a>
                            </p>
                        </div>


                    </form>

                    <div class="mt-6">
                        <div class="relative">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-2 bg-white text-gray-500">Need Help?</span>
                            </div>
                        </div>

                        <div class="mt-6 grid grid-cols-2 gap-3">
                            <a href="#"
                                class="flex items-center justify-center px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                                <i class="fas fa-question-circle mr-2"></i>
                                Support
                            </a>
                            <a href="#"
                                class="flex items-center justify-center px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                                <i class="fas fa-book mr-2"></i>
                                Guide
                            </a>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-8">
                    <p class="text-sm text-gray-600">
                        &copy; {{ date('Y') }} ONE. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const elements = document.querySelectorAll('.fade-in');
            let delay = 300;

            elements.forEach(element => {
                setTimeout(() => {
                    element.classList.add('show');
                }, delay);
                delay += 200;
            });
        });
    </script>
</body>

</html>
