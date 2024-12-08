@extends('layouts.app')
@section('content')
    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-purple-50 py-8">
        <div class="container mx-auto px-4">
            {{-- Welcome Header --}}
            <div class="mb-8">
                <div
                    class="bg-white backdrop-filter backdrop-blur-lg bg-opacity-80 shadow-2xl rounded-3xl p-8 overflow-hidden relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-indigo-600 opacity-5"></div>
                    <div
                        class="absolute -right-20 -top-20 w-64 h-64 bg-gradient-to-br from-blue-100 to-purple-100 rounded-full opacity-20">
                    </div>
                    <div class="relative z-10">
                        <div class="flex flex-col md:flex-row items-center md:space-x-8">
                            <div
                                class="bg-gradient-to-br from-blue-600 to-indigo-700 p-5 rounded-2xl shadow-lg transform transition-all hover:scale-110 hover:rotate-3 mb-4 md:mb-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <div>
                                <div class="flex flex-col md:flex-row items-center md:items-start md:space-x-3">
                                    <h1
                                        class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent text-center md:text-left">
                                        Selamat Datang, {{ Auth::user()->name }}!
                                    </h1>
                                    <span class="px-3 py-1 text-sm bg-blue-100 text-blue-700 rounded-full mt-2 md:mt-0">
                                        Orang Tua
                                    </span>
                                </div>
                                <p class="text-gray-600 mt-3 text-lg text-center md:text-left">
                                    Pantau perkembangan pendidikan anak Anda dengan mudah.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Quick Stats --}}
            <div class="mb-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                <div
                    class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 transition-all duration-300 hover:shadow-xl">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Nilai Rata-rata Anak</p>
                            <p class="text-3xl font-bold text-gray-800">85.5</p>
                        </div>
                        <div class="bg-blue-100 p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div
                    class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 transition-all duration-300 hover:shadow-xl">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Kehadiran Bulan Ini</p>
                            <p class="text-3xl font-bold text-gray-800">95%</p>
                        </div>
                        <div class="bg-green-100 p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div
                    class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 transition-all duration-300 hover:shadow-xl">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Tugas Pending</p>
                            <p class="text-3xl font-bold text-gray-800">3</p>
                        </div>
                        <div class="bg-yellow-100 p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Quick Actions --}}
            <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100">
                <h2 class="text-2xl font-bold text-gray-800 mb-8 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500 mr-3" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    Menu Cepat
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <a href=""
                        class="group relative overflow-hidden rounded-2xl p-6 bg-gradient-to-br from-blue-50 to-blue-100 transition-all duration-300 hover:shadow-lg hover:translate-y-[-5px]">
                        <div
                            class="absolute top-0 right-0 w-20 h-20 bg-blue-200 rounded-full opacity-20 transform translate-x-8 -translate-y-8">
                        </div>
                        <div
                            class="bg-blue-600 text-white p-4 rounded-xl inline-block mb-4 group-hover:rotate-6 transition-transform">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <h4 class="font-semibold text-gray-800 text-lg mb-2">Perkembangan Akademik</h4>
                        <p class="text-gray-600 text-sm">Pantau nilai dan perkembangan anak</p>
                    </a>

                    <a href=""
                        class="group relative overflow-hidden rounded-2xl p-6 bg-gradient-to-br from-green-50 to-green-100 transition-all duration-300 hover:shadow-lg hover:translate-y-[-5px]">
                        <div
                            class="absolute top-0 right-0 w-20 h-20 bg-green-200 rounded-full opacity-20 transform translate-x-8 -translate-y-8">
                        </div>
                        <div
                            class="bg-green-600 text-white p-4 rounded-xl inline-block mb-4 group-hover:rotate-6 transition-transform">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h4 class="font-semibold text-gray-800 text-lg mb-2">Kehadiran</h4>
                        <p class="text-gray-600 text-sm">Lihat rekap kehadiran anak</p>
                    </a>

                    <a href=""
                        class="group relative overflow-hidden rounded-2xl p-6 bg-gradient-to-br from-yellow-50 to-yellow-100 transition-all duration-300 hover:shadow-lg hover:translate-y-[-5px]">
                        <div
                            class="absolute top-0 right-0 w-20 h-20 bg-yellow-200 rounded-full opacity-20 transform translate-x-8 -translate-y-8">
                        </div>
                        <div
                            class="bg-yellow-600 text-white p-4 rounded-xl inline-block mb-4 group-hover:rotate-6 transition-transform">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                        </div>
                        <h4 class="font-semibold text-gray-800 text-lg mb-2">Konsultasi Guru</h4>
                        <p class="text-gray-600 text-sm">Diskusi dengan guru pengajar</p>
                    </a>
                </div>
            </div>

            {{-- Recent Activities --}}
            <div class="mt-8 bg-white rounded-3xl shadow-xl p-8 border border-gray-100">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-500 mr-3" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Aktivitas Terbaru
                </h2>
                <div class="space-y-6">
                    {{-- @foreach ($recentActivities as $activity)
                        <div
                            class="flex items-start space-x-4 p-4 rounded-xl bg-gray-50 hover:bg-gray-100 transition-colors">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                    </svg>
                                </div>
                            </div>
                            <div class="flex-grow">
                                <h4 class="text-lg font-semibold text-gray-800">{{ $activity->title }}</h4>
                                <p class="text-gray-600">{{ $activity->description }}</p>
                                <span class="text-sm text-gray-500">{{ $activity->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    @endforeach --}}
                </div>
            </div>

            {{-- Upcoming Events --}}
            <div class="mt-8 bg-white rounded-3xl shadow-xl p-8 border border-gray-100">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500 mr-3" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Agenda Mendatang
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- @foreach ($upcomingEvents as $event)
                        <div class="p-6 rounded-xl bg-gradient-to-br from-red-50 to-red-100">
                            <div class="flex items-center justify-between mb-4">
                                <span
                                    class="px-3 py-1 bg-red-200 text-red-700 rounded-full text-sm">{{ $event->type }}</span>
                                <span class="text-gray-600 text-sm">{{ $event->date->format('d M Y') }}</span>
                            </div>
                            <h4 class="text-lg font-semibold text-gray-800 mb-2">{{ $event->title }}</h4>
                            <p class="text-gray-600">{{ $event->description }}</p>
                        </div>
                    @endforeach --}}
                </div>
            </div>
        </div>
    </div>
@endsection
