@extends('layouts.guest')
@section('title', 'About Us')
@section('content')
    <!-- Hero Section -->
    <section class="relative py-24 bg-gradient-to-br from-blue-100 via-white to-blue-100 overflow-hidden">
        <!-- Background Shapes -->
        <div class="absolute inset-0">
            <svg class="absolute top-0 left-0 transform -translate-x-1/2 -translate-y-1/2 text-blue-200" width="800"
                height="800" fill="none" viewBox="0 0 800 800">
                <circle cx="400" cy="400" r="400" stroke-width="2" stroke="currentColor" />
                <circle cx="400" cy="400" r="300" stroke-width="2" stroke="currentColor" />
                <circle cx="400" cy="400" r="200" stroke-width="2" stroke="currentColor" />
            </svg>
            <svg class="absolute bottom-0 right-0 transform translate-x-1/2 translate-y-1/2 text-blue-200" width="600"
                height="600" fill="none" viewBox="0 0 600 600">
                <circle cx="300" cy="300" r="300" stroke-width="2" stroke="currentColor" />
                <circle cx="300" cy="300" r="200" stroke-width="2" stroke="currentColor" />
                <circle cx="300" cy="300" r="100" stroke-width="2" stroke="currentColor" />
            </svg>
        </div>

        <div class="container mx-auto px-4 relative">
            <div class="text-center">
                <h1 class="text-5xl md:text-6xl font-bold text-gray-900 mb-6 leading-tight">Empowering Minds, <span
                        class="text-blue-600">Shaping Futures</span></h1>
                <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">
                    Discover our passion for education and our commitment to nurturing the next generation of leaders and
                    innovators.
                </p>
                <a href="#our-story"
                    class="inline-block bg-blue-600 text-white px-8 py-4 rounded-full text-lg font-semibold shadow-lg hover:bg-blue-700 transform hover:scale-105 transition-all duration-300 ease-in-out">
                    Our Story
                </a>
            </div>
        </div>
    </section>
    <!-- Our Story Section -->
    <section id="our-story" class="py-24 bg-gradient-to-br from-white to-blue-50 relative overflow-hidden">

        <div class="container mx-auto px-4 relative">
            <div class="max-w-6xl mx-auto">
                <!-- Header -->
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Our Journey of Excellence</h2>
                    <div class="w-24 h-1 bg-blue-600 mx-auto rounded-full mb-6"></div>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">Three decades of shaping minds and building futures
                        through innovative education.</p>
                </div>

                <!-- Timeline -->
                <div class="grid md:grid-cols-3 gap-8 mb-16">
                    <div class="group bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="text-blue-600 font-bold text-lg mb-2">1990</div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">The Beginning</h3>
                        <p class="text-gray-600">Founded with a vision to revolutionize education through innovative
                            teaching methods.</p>
                        <div class="w-full h-1 bg-blue-100 group-hover:bg-blue-600 transition-colors duration-300 mt-4">
                        </div>
                    </div>

                    <div class="group bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="text-blue-600 font-bold text-lg mb-2">2005</div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Digital Revolution</h3>
                        <p class="text-gray-600">Pioneered technology integration in classrooms, setting new standards in
                            digital learning.</p>
                        <div class="w-full h-1 bg-blue-100 group-hover:bg-blue-600 transition-colors duration-300 mt-4">
                        </div>
                    </div>

                    <div class="group bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="text-blue-600 font-bold text-lg mb-2">Today</div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Leading Innovation</h3>
                        <p class="text-gray-600">Continues to push boundaries in education with cutting-edge programs and
                            methodologies.</p>
                        <div class="w-full h-1 bg-blue-100 group-hover:bg-blue-600 transition-colors duration-300 mt-4">
                        </div>
                    </div>
                </div>

                <!-- Story Content -->
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <div class="space-y-6">
                        <p class="text-lg text-gray-600 leading-relaxed">Founded in 1990, our institution has been at the
                            forefront of educational innovation for over three decades. We began with a simple yet powerful
                            vision: to create a learning environment where curiosity is celebrated, creativity is nurtured,
                            and every student is empowered to reach their full potential.</p>
                        <p class="text-lg text-gray-600 leading-relaxed">Over the years, we've grown from a small local
                            school to a renowned educational institution, always adapting to the changing needs of our
                            students and the evolving landscape of education.</p>
                    </div>

                    <!-- Stats -->
                    <div class="grid grid-cols-2 gap-6">
                        <div
                            class="bg-white p-6 rounded-xl shadow-md text-center group hover:shadow-lg transition-all duration-300">
                            <div class="text-4xl font-bold text-blue-600 mb-2">30+</div>
                            <div class="text-gray-600">Years of Excellence</div>
                        </div>
                        <div
                            class="bg-white p-6 rounded-xl shadow-md text-center group hover:shadow-lg transition-all duration-300">
                            <div class="text-4xl font-bold text-blue-600 mb-2">5000+</div>
                            <div class="text-gray-600">Alumni Worldwide</div>
                        </div>
                        <div
                            class="bg-white p-6 rounded-xl shadow-md text-center group hover:shadow-lg transition-all duration-300">
                            <div class="text-4xl font-bold text-blue-600 mb-2">100+</div>
                            <div class="text-gray-600">Expert Teachers</div>
                        </div>
                        <div
                            class="bg-white p-6 rounded-xl shadow-md text-center group hover:shadow-lg transition-all duration-300">
                            <div class="text-4xl font-bold text-blue-600 mb-2">95%</div>
                            <div class="text-gray-600">Success Rate</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Core Values Section -->
    <section class="py-24 bg-gradient-to-br from-white to-blue-50 relative overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute inset-0">
            <div class="absolute top-0 right-0 -mr-20 -mt-20 w-80 h-80 rounded-full bg-blue-100 opacity-20 blur-3xl"></div>
            <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-80 h-80 rounded-full bg-indigo-100 opacity-20 blur-3xl">
            </div>
        </div>

        <div class="container mx-auto px-4 relative">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Our Core Values</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto rounded-full mb-6"></div>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Guiding principles that shape our educational excellence
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-7xl mx-auto">
                <!-- Excellence -->
                <div
                    class="group bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-500 hover:-translate-y-2">
                    <div class="relative mb-8">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center transform group-hover:scale-110 transition-transform duration-500">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                </path>
                            </svg>
                        </div>
                        <div
                            class="absolute top-0 left-0 w-16 h-16 bg-blue-500 rounded-xl blur-xl opacity-30 group-hover:opacity-40 transition-opacity duration-500">
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Excellence</h3>
                    <p class="text-gray-600 leading-relaxed">Committed to delivering the highest quality educational
                        management solutions that exceed expectations.</p>
                    <div
                        class="mt-6 w-full h-1 bg-gradient-to-r from-blue-500 to-blue-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left">
                    </div>
                </div>

                <!-- Collaboration -->
                <div
                    class="group bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-500 hover:-translate-y-2">
                    <div class="relative mb-8">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-xl flex items-center justify-center transform group-hover:scale-110 transition-transform duration-500">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                        </div>
                        <div
                            class="absolute top-0 left-0 w-16 h-16 bg-indigo-500 rounded-xl blur-xl opacity-30 group-hover:opacity-40 transition-opacity duration-500">
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Collaboration</h3>
                    <p class="text-gray-600 leading-relaxed">Building strong partnerships between educators, students, and
                        administrators for collective success.</p>
                    <div
                        class="mt-6 w-full h-1 bg-gradient-to-r from-indigo-500 to-indigo-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left">
                    </div>
                </div>

                <!-- Innovation -->
                <div
                    class="group bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-500 hover:-translate-y-2">
                    <div class="relative mb-8">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center transform group-hover:scale-110 transition-transform duration-500">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <div
                            class="absolute top-0 left-0 w-16 h-16 bg-purple-500 rounded-xl blur-xl opacity-30 group-hover:opacity-40 transition-opacity duration-500">
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Innovation</h3>
                    <p class="text-gray-600 leading-relaxed">Pioneering educational technology solutions that transform the
                        learning experience.</p>
                    <div
                        class="mt-6 w-full h-1 bg-gradient-to-r from-purple-500 to-purple-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="relative py-24 bg-gradient-to-br from-blue-600 via-indigo-600 to-purple-700 overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0">
            <div
                class="absolute w-full h-full bg-[radial-gradient(circle_at_50%_50%,rgba(255,255,255,0.1),transparent)] opacity-70">
            </div>
            <div class="absolute inset-0 bg-blue-600/30 backdrop-blur-[100px]"></div>
        </div>

        <div class="container mx-auto px-4 relative">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Stats Cards -->
                @foreach ([
            ['number' => '1000+', 'label' => 'Active Students', 'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z'],
            ['number' => '50+', 'label' => 'Expert Teachers', 'icon' => 'M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z'],
            ['number' => '95%', 'label' => 'Satisfaction Rate', 'icon' => 'M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z'],
            ['number' => '24/7', 'label' => 'Support Available', 'icon' => 'M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z'],
        ] as $stat)
                    <div
                        class="bg-white/10 backdrop-blur-md rounded-2xl p-8 transform hover:scale-105 transition-all duration-500">
                        <div class="text-center">
                            <div
                                class="inline-flex items-center justify-center w-16 h-16 rounded-xl bg-white/20 mb-6 group-hover:bg-white/30 transition-colors duration-300">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="{{ $stat['icon'] }}"></path>
                                </svg>
                            </div>
                            <div class="text-5xl font-bold text-white mb-3" x-data="{ count: 0 }"
                                x-init="setTimeout(() => count = parseInt('{{ str_replace(['%', '+'], '', $stat['number']) }}'), 100)">
                                <span
                                    x-text="count">0</span>{{ str_contains($stat['number'], '%') ? '%' : (str_contains($stat['number'], '+') ? '+' : '') }}
                            </div>
                            <div class="text-blue-100 uppercase tracking-wide font-semibold text-sm">{{ $stat['label'] }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Vision & Mission Section -->
    <section class="py-24 bg-gradient-to-br from-white to-blue-50 relative overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute inset-0">
            <div
                class="absolute top-0 right-0 w-72 h-72 bg-blue-100 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob">
            </div>
            <div
                class="absolute bottom-0 left-0 w-72 h-72 bg-indigo-100 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000">
            </div>
        </div>

        <div class="container mx-auto px-4 relative">
            <div class="text-center mb-16">
                <span class="text-blue-600 font-semibold text-sm tracking-wider uppercase mb-2 block">Our Purpose</span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Vision & Mission</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-indigo-600 mx-auto rounded-full mb-6"></div>
            </div>

            <div class="grid md:grid-cols-2 gap-12 max-w-7xl mx-auto">
                <!-- Vision Card -->
                <div
                    class="group bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-500 hover:-translate-y-2">
                    <div class="relative mb-8">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center transform group-hover:scale-110 transition-transform duration-500">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                        </div>
                        <div
                            class="absolute top-0 left-0 w-16 h-16 bg-blue-500 rounded-xl blur-xl opacity-30 group-hover:opacity-40 transition-opacity duration-500">
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Our Vision</h3>
                    <p class="text-gray-600 leading-relaxed mb-6">To revolutionize educational management through
                        innovative technology, making administration more efficient and allowing educators to focus on what
                        matters most - teaching and inspiring students.</p>
                    <ul class="space-y-3 text-gray-600">
                        <li
                            class="flex items-center bg-blue-50 p-3 rounded-lg group-hover:bg-blue-100 transition-colors duration-300">
                            <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            <span>Digital Transformation</span>
                        </li>
                        <li
                            class="flex items-center bg-blue-50 p-3 rounded-lg group-hover:bg-blue-100 transition-colors duration-300">
                            <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            Enhanced Efficiency
                        </li>
                        <li
                            class="flex items-center bg-blue-50 p-3 rounded-lg group-hover:bg-blue-100 transition-colors duration-300">
                            <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            Educational Excellence
                        </li>
                    </ul>
                </div>
                <div
                    class="group bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-500 hover:-translate-y-2">
                    <div class="relative mb-8">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center transform group-hover:scale-110 transition-transform duration-500">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                        </div>
                        <div
                            class="absolute top-0 left-0 w-16 h-16 bg-blue-500 rounded-xl blur-xl opacity-30 group-hover:opacity-40 transition-opacity duration-500">
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Our Mission</h3>
                    <p class="text-gray-600 leading-relaxed mb-6"> To provide cutting-edge educational management solutions
                        that streamline administrative tasks,
                        foster collaboration, and create an environment where education thrives through technological
                        innovation.</p>
                    <ul class="space-y-3 text-gray-600">
                        <li
                            class="flex items-center bg-blue-50 p-3 rounded-lg group-hover:bg-blue-100 transition-colors duration-300">
                            <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            <span> Innovative Solutions
                            </span>
                        </li>
                        <li
                            class="flex items-center bg-blue-50 p-3 rounded-lg group-hover:bg-blue-100 transition-colors duration-300">
                            <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            <span> Seamless Integration
                            </span>
                        </li>
                        <li
                            class="flex items-center bg-blue-50 p-3 rounded-lg group-hover:bg-blue-100 transition-colors duration-300">
                            <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            <span> Continuous Improvement
                            </span>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-24 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <span class="text-blue-600 font-semibold text-sm tracking-wider uppercase mb-2 block">Our Team</span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Meet Our Leadership</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-indigo-600 mx-auto rounded-full"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-7xl mx-auto">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <img src="https://via.placeholder.com/150" alt="John Doe"
                        class="w-32 h-32 rounded-full mx-auto mb-4">
                    <h3 class="text-xl font-semibold text-center mb-2">John Doe</h3>
                    <p class="text-gray-600 text-center mb-4">Principal</p>
                    <p class="text-gray-600 text-center">With over 20 years of experience in education, John leads our
                        institution with passion and innovation.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <img src="https://via.placeholder.com/150" alt="Jane Smith"
                        class="w-32 h-32 rounded-full mx-auto mb-4">
                    <h3 class="text-xl font-semibold text-center mb-2">Jane Smith</h3>
                    <p class="text-gray-600 text-center mb-4">Academic Director</p>
                    <p class="text-gray-600 text-center">Jane's expertise in curriculum development ensures our programs
                        remain cutting-edge and effective.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <img src="https://via.placeholder.com/150" alt="Mike Johnson"
                        class="w-32 h-32 rounded-full mx-auto mb-4">
                    <h3 class="text-xl font-semibold text-center mb-2">Mike Johnson</h3>
                    <p class="text-gray-600 text-center mb-4">Student Affairs Director</p>
                    <p class="text-gray-600 text-center">Mike's dedication to student well-being creates a supportive and
                        enriching campus environment.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="relative py-24 bg-gradient-to-br from-blue-600 to-indigo-700 overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0">
            <svg class="absolute w-full h-full" xmlns="http://www.w3.org/2000/svg">
                <pattern id="pattern" x="0" y="0" width="40" height="40" patternUnits="userSpaceOnUse">
                    <circle cx="20" cy="20" r="2" fill="white" fill-opacity="0.1" />
                </pattern>
                <rect x="0" y="0" width="100%" height="100%" fill="url(#pattern)" />
            </svg>
        </div>

        <div class="container mx-auto px-4 relative">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">Ready to Join Our Community?</h2>
                <p class="text-xl text-blue-100 mb-8">Discover the opportunities waiting for you at our institution.</p>
                <div class="flex justify-center space-x-4">
                    <a href="/contact"
                        class="inline-flex items-center px-8 py-4 bg-white text-blue-600 rounded-full font-semibold shadow-lg hover:bg-blue-50 transform hover:scale-105 transition-all duration-300">
                        Get Started
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>


@endsection

@push('styles')
    <style>
        [x-cloak] {
            display: none;
        }

        .animate-count-up {
            animation: count-up 1s ease-out;
        }

        @keyframes count-up {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes blob {
            0% {
                transform: translate(0px, 0px) scale(1);
            }

            33% {
                transform: translate(30px, -50px) scale(1.1);
            }

            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }

            100% {
                transform: translate(0px, 0px) scale(1);
            }
        }

        .animate-blob {
            animation: blob 7s infinite;
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }
    </style>
@endpush
@push('scripts')
    <script>
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Animation for key figures
        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.1
        };

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-count-up');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        document.querySelectorAll('.text-4xl.font-bold.text-blue-600').forEach(el => {
            observer.observe(el);
        });
    </script>
@endpush
