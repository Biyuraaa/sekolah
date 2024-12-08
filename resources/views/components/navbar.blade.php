<nav class="bg-white shadow-md" x-data="{ isOpen: false }">
    <div class="container mx-auto px-6 py-3">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <!-- Logo -->
                <a href="{{ route('home') }}"
                    class="flex items-center space-x-2 hover:opacity-75 transition-opacity duration-300">
                    <img src="{{ asset('assets/images/logo.svg') }}" alt="ONE Logo" class="h-8 w-auto" loading="lazy">
                    <span class="text-2xl font-bold text-gray-800">ONE</span>
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button @click="isOpen = !isOpen" class="text-gray-500 hover:text-gray-600 focus:outline-none">
                    <svg class="h-6 w-6" x-show="!isOpen" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg class="h-6 w-6" x-show="isOpen" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>

            <!-- Desktop Menu -->
            <ul class="hidden md:flex items-center space-x-8">
                <li>
                    <a href="{{ url('/') }}"
                        class="text-gray-600 hover:text-blue-600 font-medium transition-colors duration-300 relative after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 hover:after:w-full after:bg-blue-600 after:transition-all">
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ url('/about') }}"
                        class="text-gray-600 hover:text-blue-600 font-medium transition-colors duration-300 relative after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 hover:after:w-full after:bg-blue-600 after:transition-all">
                        About
                    </a>
                </li>
                <li>
                    <a href="{{ url('/contact') }}"
                        class="text-gray-600 hover:text-blue-600 font-medium transition-colors duration-300 relative after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 hover:after:w-full after:bg-blue-600 after:transition-all">
                        Contact
                    </a>
                </li>

                @auth
                    <li>
                        <a href="{{ url('/dashboard') }}"
                            class="text-gray-600 hover:text-blue-600 font-medium transition-colors duration-300 relative after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 hover:after:w-full after:bg-blue-600 after:transition-all">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit"
                                class="px-4 py-2 text-sm font-medium text-red-600 border border-red-600 rounded-lg hover:bg-red-50 transition-colors duration-300">
                                Logout
                            </button>
                        </form>
                    </li>
                @else
                    <li>
                        <a href="{{ route('login') }}"
                            class="text-blue-600 font-medium hover:text-blue-700 transition-colors duration-300">
                            Login
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}"
                            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors duration-300">
                            Register
                        </a>
                    </li>
                @endauth
            </ul>
        </div>

        <!-- Mobile Menu -->
        <div class="md:hidden" x-show="isOpen" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 transform scale-90"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-90">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="{{ url('/') }}"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">Home</a>
                <a href="{{ url('/about') }}"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">About</a>
                <a href="{{ url('/contact') }}"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">Contact</a>

                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}" class="block px-3 py-2">
                        @csrf
                        <button type="submit"
                            class="w-full text-left text-base font-medium text-red-600 hover:text-red-700">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                        class="block px-3 py-2 rounded-md text-base font-medium text-blue-600 hover:text-blue-700">Login</a>
                    <a href="{{ route('register') }}"
                        class="block px-3 py-2 rounded-md text-base font-medium text-white bg-blue-600 hover:bg-blue-700">Register</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
