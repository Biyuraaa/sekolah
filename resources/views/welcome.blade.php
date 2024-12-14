@extends('layouts.guest')
@section('title', 'Home')
@section('content')
    <section class="relative bg-gradient-to-br from-blue-50 via-white to-blue-50 py-24">
        <!-- Decorative Elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -right-10 -top-10 h-40 w-40 rounded-full bg-blue-100/50"></div>
            <div class="absolute -left-10 bottom-10 h-40 w-40 rounded-full bg-blue-100/50"></div>
        </div>

        <div class="container mx-auto px-4 relative">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <!-- Text Content -->
                <div class="text-left space-y-6">
                    <div class="inline-block px-3 py-1 rounded-full bg-blue-100 text-blue-800 text-sm font-medium">
                        Welcome to ONE
                    </div>
                    <h1 class="text-4xl md:text-5xl font-bold text-gray-900 leading-tight">
                        Transform Your School Management Experience
                    </h1>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        Streamline administrative tasks, enhance communication, and elevate education management to new
                        heights with our comprehensive solution.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ url('/login') }}"
                            class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-medium rounded-lg shadow-lg hover:bg-blue-700 transform hover:-translate-y-0.5 transition-all duration-200">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                </path>
                            </svg>
                            Get Started
                        </a>
                        <a href="{{ url('/register') }}"
                            class="inline-flex items-center px-6 py-3 bg-white text-blue-600 font-medium rounded-lg shadow-lg hover:bg-gray-50 transform hover:-translate-y-0.5 transition-all duration-200 border border-blue-100">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z">
                                </path>
                            </svg>
                            Create Account
                        </a>
                    </div>
                </div>

                <!-- Illustration -->
                <div class="hidden md:block">
                    <img src="https://illustrations.popsy.co/blue/student-taking-online-course.svg"
                        alt="Education Illustration"
                        class="w-full max-w-lg mx-auto transform hover:scale-105 transition-transform duration-300">
                </div>
            </div>
        </div>
    </section>
    <section class="py-24 bg-gradient-to-b from-white to-blue-50">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Powerful Features</h2>
                <p class="text-xl text-gray-600">Empowering education with cutting-edge technology solutions</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-7xl mx-auto">
                <!-- Feature 1 -->
                <div class="group hover:-translate-y-2 transition-all duration-300">
                    <div
                        class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all h-full border border-gray-100">
                        <div
                            class="bg-blue-100 text-blue-600 rounded-xl w-14 h-14 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Attendance Management</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">Track student attendance efficiently with our
                            automated system. Get real-time insights and detailed reports.</p>
                        <div class="flex items-center justify-between text-sm border-t border-gray-100 pt-4">
                            <span class="text-blue-600 font-semibold">98% Accuracy</span>
                            <span class="text-gray-500">Used by 2000+ schools</span>
                        </div>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="group hover:-translate-y-2 transition-all duration-300">
                    <div
                        class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all h-full border border-gray-100">
                        <div
                            class="bg-green-100 text-green-600 rounded-xl w-14 h-14 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Finance Management</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">Streamline financial operations with automated
                            billing, payment tracking, and comprehensive reporting tools.</p>
                        <div class="flex items-center justify-between text-sm border-t border-gray-100 pt-4">
                            <span class="text-green-600 font-semibold">100% Accurate</span>
                            <span class="text-gray-500">$2M+ Processed</span>
                        </div>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="group hover:-translate-y-2 transition-all duration-300">
                    <div
                        class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all h-full border border-gray-100">
                        <div
                            class="bg-purple-100 text-purple-600 rounded-xl w-14 h-14 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Consultation Scheduling</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">Enable seamless communication between teachers,
                            students, and parents with our intuitive scheduling system.</p>
                        <div class="flex items-center justify-between text-sm border-t border-gray-100 pt-4">
                            <span class="text-purple-600 font-semibold">24/7 Available</span>
                            <span class="text-gray-500">50k+ Meetings</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-24 bg-gradient-to-b from-gray-50 to-white relative overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute top-0 left-0 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-blue-50 rounded-full opacity-50">
        </div>
        <div
            class="absolute bottom-0 right-0 translate-x-1/2 translate-y-1/2 w-96 h-96 bg-indigo-50 rounded-full opacity-50">
        </div>

        <div class="container mx-auto px-4 relative">
            <div class="max-w-3xl mx-auto text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">What Our Users Say</h2>
                <p class="text-xl text-gray-600">Trusted by educators, parents, and administrators worldwide</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-7xl mx-auto">
                <!-- Testimonial 1 -->
                <div class="group hover:-translate-y-2 transition-all duration-300">
                    <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all relative overflow-hidden">
                        <div
                            class="absolute top-0 left-0 w-full h-1 bg-purple-500 origin-left transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300">
                        </div>
                        <div
                            class="absolute -top-4 -right-4 w-12 h-12 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center text-2xl font-serif">
                            "</div>

                        <div class="flex items-center mb-6">
                            <img class="w-12 h-12 rounded-full object-cover mr-4" src="https://i.pravatar.cc/100?img=1"
                                alt="John Doe">
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900">Rizal Hidayatullah</h4>
                                <p class="text-sm text-gray-500">164221002</p>
                            </div>
                        </div>

                        <div class="flex mb-4">
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </div>

                        <p class="text-gray-600 leading-relaxed mb-6">"This system has transformed how we manage our school
                            operations. The interface is intuitive, and the features are exactly what we needed for
                            efficient administration."</p>

                        <div class="text-sm text-gray-500 flex items-center mt-4">
                            <span class="mr-4">2 months ago</span>
                            <span>via EduSync Web</span>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="group hover:-translate-y-2 transition-all duration-300">
                    <div
                        class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all relative overflow-hidden">
                        <div
                            class="absolute top-0 left-0 w-full h-1 bg-purple-500 origin-left transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300">
                        </div>
                        <div
                            class="absolute -top-4 -right-4 w-12 h-12 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center text-2xl font-serif">
                            "</div>

                        <div class="flex items-center mb-6">
                            <img class="w-12 h-12 rounded-full object-cover mr-4" src="https://i.pravatar.cc/100?img=5"
                                alt="Jane Smith">
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900">Dara Devinta Faradhilla</h4>
                                <p class="text-sm text-gray-500">164221002</p>
                            </div>
                        </div>

                        <div class="flex mb-4">
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </div>
                        <p class="text-gray-600 leading-relaxed mb-6">"This system has transformed how we manage our school
                            operations. The interface is intuitive, and the features are exactly what we needed for
                            efficient administration."</p>

                        <div class="text-sm text-gray-500 flex items-center mt-4">
                            <span class="mr-4">2 months ago</span>
                            <span>via EduSync Web</span>
                        </div>
                    </div>
                </div>
                <div class="group hover:-translate-y-2 transition-all duration-300">
                    <div
                        class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all relative overflow-hidden">
                        <div
                            class="absolute top-0 left-0 w-full h-1 bg-purple-500 origin-left transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300">
                        </div>
                        <div
                            class="absolute -top-4 -right-4 w-12 h-12 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center text-2xl font-serif">
                            "</div>

                        <div class="flex items-center mb-6">
                            <img class="w-12 h-12 rounded-full object-cover mr-4 border-2 border-purple-100"
                                src="https://i.pravatar.cc/100?img=3" alt="Michael Johnson">
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900">Tasyfia Farhah Subrina Lubis</h4>
                                <p class="text-sm text-gray-500">164221031</p>
                            </div>
                        </div>

                        <div class="flex mb-4">
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </div>

                        <p class="text-gray-600 leading-relaxed mb-6 italic">"EduSync has revolutionized our district-wide
                            communication and data management. The comprehensive analytics and user-friendly interface have
                            been game-changers for our administrative processes."</p>

                        <div class="text-sm text-gray-500 flex items-center justify-between mt-4">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>3 months ago</span>
                            </div>
                            <span class="text-purple-500 font-medium">via EduSync Mobile</span>
                        </div>
                    </div>
                </div>
                <div class="group hover:-translate-y-2 transition-all duration-300">
                    <div
                        class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all relative overflow-hidden">
                        <div
                            class="absolute top-0 left-0 w-full h-1 bg-purple-500 origin-left transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300">
                        </div>
                        <div
                            class="absolute -top-4 -right-4 w-12 h-12 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center text-2xl font-serif">
                            "</div>

                        <div class="flex items-center mb-6">
                            <img class="w-12 h-12 rounded-full object-cover mr-4 border-2 border-purple-100"
                                src="https://i.pravatar.cc/100?img=3" alt="Michael Johnson">
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900">Dhiwa Abqarriyah</h4>
                                <p class="text-sm text-gray-500">164221117</p>
                            </div>
                        </div>

                        <div class="flex mb-4">
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </div>

                        <p class="text-gray-600 leading-relaxed mb-6 italic">"EduSync has revolutionized our district-wide
                            communication and data management. The comprehensive analytics and user-friendly interface have
                            been game-changers for our administrative processes."</p>

                        <div class="text-sm text-gray-500 flex items-center justify-between mt-4">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>3 months ago</span>
                            </div>
                            <span class="text-purple-500 font-medium">via EduSync Mobile</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection
