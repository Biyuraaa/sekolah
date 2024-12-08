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
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                            <div>
                                <div class="flex flex-col md:flex-row items-center md:items-start md:space-x-3">
                                    <h1
                                        class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent text-center md:text-left">
                                        Selamat Datang, {{ Auth::user()->name }}!
                                    </h1>
                                    <span class="px-3 py-1 text-sm bg-blue-100 text-blue-700 rounded-full mt-2 md:mt-0">
                                        {{ Auth::user()->role }}
                                    </span>
                                </div>
                                <p class="text-gray-600 mt-3 text-lg text-center md:text-left">
                                    Kelola aktivitas pendidikan Anda dengan efisien dan cerdas.
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
                            <p class="text-sm font-medium text-gray-500">Total Mata Pelajaran</p>
                            <p class="text-3xl font-bold text-gray-800">8</p>
                        </div>
                        <div class="bg-blue-100 p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div
                    class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 transition-all duration-300 hover:shadow-xl">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Rata-rata Nilai</p>
                            <p class="text-3xl font-bold text-gray-800">85.5</p>
                        </div>
                        <div class="bg-green-100 p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none"
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
                            <p class="text-sm font-medium text-gray-500">Ujian Mendatang</p>
                            <p class="text-3xl font-bold text-gray-800">2</p>
                        </div>
                        <div class="bg-yellow-100 p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
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
                    Quick Actions
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <a href="{{ route('classroomSubjects.index') }}"
                        class="group relative overflow-hidden rounded-2xl p-6 bg-gradient-to-br from-blue-50 to-blue-100 transition-all duration-300 hover:shadow-lg hover:translate-y-[-5px]">
                        <div
                            class="absolute top-0 right-0 w-20 h-20 bg-blue-200 rounded-full opacity-20 transform translate-x-8 -translate-y-8">
                        </div>
                        <div
                            class="bg-blue-600 text-white p-4 rounded-xl inline-block mb-4 group-hover:rotate-6 transition-transform">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h4 class="font-semibold text-gray-800 text-lg mb-2">Jadwal Pelajaran</h4>
                        <p class="text-gray-600 text-sm">Lihat jadwal pelajaran Anda</p>
                    </a>

                    <a href="{{ route('consultations.index') }}"
                        class="group relative overflow-hidden rounded-2xl p-6 bg-gradient-to-br from-green-50 to-green-100 transition-all duration-300 hover:shadow-lg hover:translate-y-[-5px]">
                        <div
                            class="absolute top-0 right-0 w-20 h-20 bg-green-200 rounded-full opacity-20 transform translate-x-8 -translate-y-8">
                        </div>
                        <div
                            class="bg-green-600 text-white p-4 rounded-xl inline-block mb-4 group-hover:rotate-6 transition-transform">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <h4 class="font-semibold text-gray-800 text-lg mb-2">Konsultasi</h4>
                        <p class="text-gray-600 text-sm">Jadwalkan konsultasi dengan guru Anda</p>
                    </a>

                    <a href="{{ route('examClassrooms.index') }}"
                        class="group relative overflow-hidden rounded-2xl p-6 bg-gradient-to-br from-yellow-50 to-yellow-100 transition-all duration-300 hover:shadow-lg hover:translate-y-[-5px]">
                        <div
                            class="absolute top-0 right-0 w-20 h-20 bg-yellow-200 rounded-full opacity-20 transform translate-x-8 -translate-y-8">
                        </div>
                        <div
                            class="bg-yellow-600 text-white p-4 rounded-xl inline-block mb-4 group-hover:rotate-6 transition-transform">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 3v3H6a3 3 0 00-3 3v12a3 3 0 003 3h12a3 3 0 003-3V9a3 3 0 00-3-3h-3V3H9z" />
                            </svg>
                        </div>
                        <h4 class="font-semibold text-gray-800 text-lg mb-2">Jadwal Ujian</h4>
                        <p class="text-gray-600 text-sm">Lihat jadwal ujian Anda</p>
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
                <div class="space-y-4">
                    <div class="space-y-4">
                        <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                            <div class="bg-blue-100 p-3 rounded-full mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">Tugas Matematika dikumpulkan</p>
                                <p class="text-sm text-gray-500">2 jam yang lalu</p>
                            </div>
                        </div>
                        <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                            <div class="bg-green-100 p-3 rounded-full mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">Nilai Ujian Bahasa Inggris: 85</p>
                                <p class="text-sm text-gray-500">1 hari yang lalu</p>
                            </div>
                        </div>
                        <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                            <div class="bg-yellow-100 p-3 rounded-full mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">Pengumuman: Ujian Tengah Semester</p>
                                <p class="text-sm text-gray-500">3 hari yang lalu</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @push('styles')
        <style>
            .group:hover .group-hover\:rotate-6 {
                transform: rotate(6deg);
            }
        </style>
    @endpush
