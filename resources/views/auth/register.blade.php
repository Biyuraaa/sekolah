<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Universitas Airlangga</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* Kelas CSS yang sudah ada */
        .bg-pattern {
            background-color: #4f46e5;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewBox='0 0 100 100'%3E%3Cg fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath opacity='.5' d='M96 95h4v1h-4v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9zm-1 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .step-active {
            @apply bg-indigo-600 text-white;
        }

        .step-completed {
            @apply bg-green-500 text-white;
        }

        /* Kelas CSS baru untuk animasi */
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease-out, transform 0.5s ease-out;
        }

        .fade-in.show {
            opacity: 1;
            transform: translateY(0);
        }

        .benefit-item {
            transition: transform 0.3s ease;
        }

        .benefit-item:hover {
            transform: translateX(5px);
        }

        .input-group {
            position: relative;
        }

        .input-group input:focus+.input-icon {
            color: #4f46e5;
        }

        .input-group input:valid+.input-icon {
            color: #10b981;
        }

        .input-group input:invalid+.input-icon {
            color: #ef4444;
        }

        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-5px);
            }

            75% {
                transform: translateX(5px);
            }
        }

        .shake {
            animation: shake 0.5s ease-in-out;
        }
    </style>
</head>

<body class="min-h-screen bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Left Side - Background Image/Pattern -->
        <div class="hidden lg:flex lg:w-1/2 bg-pattern">
            <div class="m-auto text-white px-8 sm:px-12 md:px-16 lg:px-20">
                <div class="space-y-6">
                    <img src="{{ asset('assets/images/airlangga.png') }}" alt="Logo" class="h-32 fade-in"
                        id="logo">
                    <h1 class="text-4xl font-bold fade-in" id="title">Join Universitas Airlangga</h1>
                    <p class="text-xl fade-in" id="subtitle">Start your academic journey with us</p>

                    <!-- Benefits Section -->
                    <div class="mt-12 space-y-4">
                        <div class="flex items-center space-x-3 benefit-item fade-in">
                            <div class="bg-white bg-opacity-10 p-2 rounded-full">
                                <i class="fas fa-check text-sm"></i>
                            </div>
                            <p>Access to world-class education</p>
                        </div>
                        <div class="flex items-center space-x-3 benefit-item fade-in">
                            <div class="bg-white bg-opacity-10 p-2 rounded-full">
                                <i class="fas fa-check text-sm"></i>
                            </div>
                            <p>Join a global academic community</p>
                        </div>
                        <div class="flex items-center space-x-3 benefit-item fade-in">
                            <div class="bg-white bg-opacity-10 p-2 rounded-full">
                                <i class="fas fa-check text-sm"></i>
                            </div>
                            <p>State-of-the-art learning facilities</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Registration Form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-6">
            <div class="w-full max-w-md">
                <div class="bg-white rounded-2xl shadow-xl p-8 fade-in" id="form-container">
                    <div class="text-center mb-8">
                        <h2 class="text-3xl font-bold text-gray-800">Create Account</h2>
                        <p class="text-gray-500 mt-2">Fill in your details to get started</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}" class="space-y-6">
                        @csrf

                        <!-- Full Name -->
                        <div class="input-group space-y-2">
                            <label for="name" class="text-sm font-medium text-gray-700">Full Name</label>
                            <div class="relative">
                                <div
                                    class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none input-icon">
                                    <i class="fas fa-user text-gray-400"></i>
                                </div>
                                <input type="text" name="name" id="name"
                                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-600 focus:border-transparent"
                                    placeholder="Enter your full name" value="{{ old('name') }}" required>
                            </div>
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="space-y-2">
                            <label for="email" class="text-sm font-medium text-gray-700">Email Address</label>
                            <div class="relative">
                                <div
                                    class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none input-icon">
                                    <i class="fas fa-envelope text-gray-400"></i>
                                </div>
                                <input type="email" name="email" id="email"
                                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-600 focus:border-transparent"
                                    placeholder="you@example.com" value="{{ old('email') }}" required>
                            </div>
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="space-y-2">
                            <label for="password" class="text-sm font-medium text-gray-700">Password</label>
                            <div class="relative">
                                <div
                                    class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none input-icon">
                                    <i class="fas fa-lock text-gray-400"></i>
                                </div>
                                <input type="password" name="password" id="password"
                                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-600 focus:border-transparent"
                                    placeholder="Create a strong password" required>
                            </div>
                            @error('password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="space-y-2">
                            <label for="password_confirmation" class="text-sm font-medium text-gray-700">Confirm
                                Password</label>
                            <div class="relative">
                                <div
                                    class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none input-icon">
                                    <i class="fas fa-lock text-gray-400"></i>
                                </div>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-600 focus:border-transparent"
                                    placeholder="Confirm your password" required>
                            </div>
                        </div>

                        <!-- Terms and Conditions -->
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input type="checkbox" name="terms" id="terms"
                                    class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="terms" class="text-gray-500">
                                    I agree to the <a href="#"
                                        class="text-indigo-600 hover:text-indigo-500">Terms of Service</a> and
                                    <a href="#" class="text-indigo-600 hover:text-indigo-500">Privacy Policy</a>
                                </label>
                            </div>
                        </div>

                        <button type="submit"
                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <i class="fas fa-user-plus mr-2"></i>
                            Create Account
                        </button>
                    </form>

                    <div class="mt-6 text-center">
                        <p class="text-sm text-gray-600">
                            Already have an account?
                            <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                                Sign in
                            </a>
                        </p>
                    </div>
                </div>

                <div class="text-center mt-8">
                    <p class="text-sm text-gray-600">
                        Need help? <a href="#" class="text-indigo-600 hover:text-indigo-500">Contact Support</a>
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

            const form = document.querySelector('form');
            const inputs = form.querySelectorAll('input');

            inputs.forEach(input => {
                input.addEventListener('invalid', function(event) {
                    event.preventDefault();
                    this.classList.add('shake');
                    setTimeout(() => {
                        this.classList.remove('shake');
                    }, 500);
                });

                input.addEventListener('input', function() {
                    this.classList.remove('shake');
                });
            });

            form.addEventListener('submit', function(event) {
                event.preventDefault();
                if (form.checkValidity()) {
                    // Add your form submission logic here
                    alert('Form submitted successfully!');
                } else {
                    inputs.forEach(input => {
                        if (!input.validity.valid) {
                            input.classList.add('shake');
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>
