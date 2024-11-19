@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumb -->
            <nav class="flex mb-8" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li>
                        <a href="{{ route('dashboard') }}" class="flex items-center text-gray-600 hover:text-blue-600">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                </path>
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('classroom-subjects.index') }}"
                            class="flex items-center text-gray-600 hover:text-blue-600">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Jadwal Pelajaran
                        </a>
                    </li>
                    <li>
                        <span class="flex items-center text-gray-400">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Detail Jadwal Mata Pelajaran
                        </span>
                    </li>
                </ol>
            </nav>

            <!-- Header Section -->
            <div class="flex justify-between items-center mb-8">
                <div class="flex items-center space-x-3">
                    <div class="bg-blue-500 p-2 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Detail Jadwal Mata Pelajaran</h2>
                        <p class="text-gray-500 text-sm">Informasi lengkap jadwal mata pelajaran</p>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <a href="{{ route('classrooms.show', $classroomSubject->classroom) }}"
                        class="inline-flex items-center px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                                clip-rule="evenodd" />
                        </svg>
                        Kembali
                    </a>
                </div>
            </div>
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-6 space-y-8">
                    <!-- Homeroom Teacher Section -->
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <img class="h-20 w-20 rounded-full object-cover"
                                src="{{ $classroomSubject->teacher->user->image ?? 'https://ui-avatars.com/api/?name=' . urlencode($classroomSubject->teacher->user->name) }}"
                                alt="{{ $classroomSubject->teacher->user->name }}">
                        </div>
                        <div class="ml-6">
                            <h3 class="text-lg font-medium text-gray-900">Pengajar</h3>
                            <p class="text-xl font-semibold text-gray-900">{{ $classroomSubject->teacher->user->name }}</p>
                            <p class="text-sm text-gray-500">{{ $classroomSubject->teacher->user->email }}</p>
                            <div class="mt-2 flex items-center space-x-4">
                                <div class="flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                    <span
                                        class="text-gray-500 text-sm">{{ $classroomSubject->teacher->subject->name }}</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                    <span
                                        class="text-gray-500 text-sm">{{ $classroomSubject->teacher->user->phone_number }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 bg-white">
                        <div class="border-t border-gray-200 pt-6">
                            <div class="flex items-center justify-between mb-6">
                                <h3 class="text-2xl font-bold text-gray-900">Ringkasan Jadwal</h3>
                                <span class="text-sm text-gray-500">Terakhir diperbarui:
                                    {{ now()->format('d M Y') }}</span>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                                <!-- Jumlah Materi -->
                                <div class="relative group">
                                    <div
                                        class="absolute inset-0 bg-gradient-to-r from-blue-500 to-blue-600 opacity-10 group-hover:opacity-15 transition-opacity duration-300 rounded-lg">
                                    </div>
                                    <div
                                        class="relative p-6 bg-white border border-gray-100 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300">
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <p class="text-sm font-medium text-gray-500">Materi</p>
                                                <p class="mt-2 text-2xl font-bold text-gray-900">{{ $totalMateri ?? '24' }}
                                                </p>
                                            </div>
                                            <div class="p-3 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg">
                                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Jumlah Jam Pelajaran -->
                                <div class="relative group">
                                    <div
                                        class="absolute inset-0 bg-gradient-to-r from-emerald-500 to-emerald-600 opacity-10 group-hover:opacity-15 transition-opacity duration-300 rounded-lg">
                                    </div>
                                    <div
                                        class="relative p-6 bg-white border border-gray-100 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300">
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <p class="text-sm font-medium text-gray-500">Jam Pelajaran</p>
                                                <p class="mt-2 text-2xl font-bold text-gray-900">{{ $totalJam ?? '48' }}
                                                    Jam</p>
                                            </div>
                                            <div class="p-3 bg-gradient-to-r from-emerald-500 to-emerald-600 rounded-lg">
                                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Materi Belum Diajarkan -->
                                <div class="relative group">
                                    <div
                                        class="absolute inset-0 bg-gradient-to-r from-amber-500 to-amber-600 opacity-10 group-hover:opacity-15 transition-opacity duration-300 rounded-lg">
                                    </div>
                                    <div
                                        class="relative p-6 bg-white border border-gray-100 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300">
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <p class="text-sm font-medium text-gray-500">Belum Diajarkan</p>
                                                <p class="mt-2 text-2xl font-bold text-gray-900">
                                                    {{ $materiBelum ?? '22' }}</p>
                                            </div>
                                            <div class="p-3 bg-gradient-to-r from-amber-500 to-amber-600 rounded-lg">
                                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Progress Materi -->
                                <div class="relative group">
                                    <div
                                        class="absolute inset-0 bg-gradient-to-r from-violet-500 to-violet-600 opacity-10 group-hover:opacity-15 transition-opacity duration-300 rounded-lg">
                                    </div>
                                    <div
                                        class="relative p-6 bg-white border border-gray-100 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300">
                                        <div class="flex items-center justify-between">
                                            <div class="w-full">
                                                <p class="text-sm font-medium text-gray-500">Progress Materi</p>
                                                <div class="mt-2">
                                                    <div class="flex items-center">
                                                        <div class="flex-grow">
                                                            <div
                                                                class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                                                                <div class="bg-gradient-to-r from-violet-500 to-violet-600 h-2.5 rounded-full transition-all duration-500"
                                                                    style="width: {{ $progress ?? '7' }}%">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <span
                                                            class="ml-3 text-lg font-bold text-gray-900">{{ $progress ?? '7' }}%</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="p-3 bg-gradient-to-r from-violet-500 to-violet-600 rounded-lg ml-4">
                                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
            <div class="max-w-7xl mx-auto">
                <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-100">
                    <div class="p-6 space-y-8">
                        <!-- Header Section with Quick Actions -->
                        <div class="flex justify-between items-center">
                            <h2 class="text-2xl font-bold text-gray-900">Detail Pembelajaran</h2>
                            <div class="flex space-x-3">
                                @if ($classroomSubject->status === 'active')
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                        <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                                        Aktif
                                    </span>
                                @else
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                        <span class="w-2 h-2 bg-red-500 rounded-full mr-2"></span>
                                        Tidak Aktif
                                    </span>
                                @endif
                                <button
                                    class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                    Edit
                                </button>
                            </div>
                        </div>

                        <!-- Main Information Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <!-- Class Information Card -->
                            <div
                                class="group hover:shadow-lg transition-all duration-300 ease-in-out bg-gradient-to-br from-blue-50 to-blue-100/50 rounded-xl p-6 border border-blue-100">
                                <div class="flex justify-between items-start mb-4">
                                    <h3 class="text-lg font-semibold text-blue-900">Informasi Kelas</h3>
                                    <div
                                        class="p-2 bg-blue-500 rounded-lg transform group-hover:scale-110 transition-transform duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="space-y-4">
                                    <div class="flex items-center space-x-3 group">
                                        <div
                                            class="flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-lg bg-blue-500/10 group-hover:bg-blue-500/20 transition-colors duration-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-sm font-medium text-blue-900">Kelas</p>
                                            <p class="text-lg font-semibold text-blue-700">
                                                {{ $classroomSubject->classroom->year_level }}-{{ $classroomSubject->classroom->group_numbers }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex items-center space-x-3 group">
                                        <div
                                            class="flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-lg bg-blue-500/10 group-hover:bg-blue-500/20 transition-colors duration-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-sm font-medium text-blue-900">Tahun Ajaran</p>
                                            <p class="text-lg font-semibold text-blue-700">
                                                {{ $classroomSubject->classroom->academic_year }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Subject Information Card -->
                            <div
                                class="group hover:shadow-lg transition-all duration-300 ease-in-out bg-gradient-to-br from-green-50 to-green-100/50 rounded-xl p-6 border border-green-100">
                                <div class="flex justify-between items-start mb-4">
                                    <h3 class="text-lg font-semibold text-green-900">Informasi Mata Pelajaran</h3>
                                    <div
                                        class="p-2 bg-green-500 rounded-lg transform group-hover:scale-110 transition-transform duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="space-y-4">
                                    <div class="flex items-center space-x-3 group">
                                        <div
                                            class="flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-lg bg-green-500/10 group-hover:bg-green-500/20 transition-colors duration-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-sm font-medium text-green-900">Mata Pelajaran</p>
                                            <p class="text-lg font-semibold text-green-700">
                                                {{ $classroomSubject->subject->name }}</p>
                                        </div>
                                    </div>

                                    <div class="flex items-center space-x-3 group">
                                        <div
                                            class="flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-lg bg-green-500/10 group-hover:bg-green-500/20 transition-colors duration-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-sm font-medium text-green-900">Jumlah SKS</p>
                                            <p class="text-lg font-semibold text-green-700">
                                                {{ $classroomSubject->subject->credit_hours }} SKS</p>
                                        </div>
                                    </div>

                                    <div class="flex items-center space-x-3 group">
                                        <div
                                            class="flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-lg bg-green-500/10 group-hover:bg-green-500/20 transition-colors duration-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-sm font-medium text-green-900">Deskripsi</p>
                                            <p class="text-base text-green-700">
                                                {{ $classroomSubject->subject->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Schedule Information Card -->
                            <div
                                class="group hover:shadow-lg transition-all duration-300 ease-in-out bg-gradient-to-br from-purple-50 to-purple-100/50 rounded-xl p-6 border border-purple-100">
                                <div class="flex justify-between items-start mb-4">
                                    <h3 class="text-lg font-semibold text-purple-900">Informasi Jadwal</h3>
                                    <div
                                        class="p-2 bg-purple-500 rounded-lg transform group-hover:scale-110 transition-transform duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="space-y-4">
                                    <div class="flex items-center space-x-3 group">
                                        <div
                                            class="flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-lg bg-purple-500/10 group-hover:bg-purple-500/20 transition-colors duration-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-600"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-sm font-medium text-purple-900">Hari</p>
                                            <p class="text-lg font-semibold text-purple-700">
                                                {{ ucfirst($classroomSubject->day) }}</p>
                                        </div>
                                    </div>

                                    <div class="flex items-center space-x-3 group">
                                        <div
                                            class="flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-lg bg-purple-500/10 group-hover:bg-purple-500/20 transition-colors duration-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-600"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-sm font-medium text-purple-900">Waktu</p>
                                            <p class="text-lg font-semibold text-purple-700">
                                                {{ $classroomSubject->start_time }} - {{ $classroomSubject->end_time }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex items-center space-x-3 group">
                                        <div
                                            class="flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-lg bg-purple-500/10 group-hover:bg-purple-500/20 transition-colors duration-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-600"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-sm font-medium text-purple-900">Ruangan</p>
                                            <p class="text-lg font-semibold text-purple-700">{{ $classroomSubject->room }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
