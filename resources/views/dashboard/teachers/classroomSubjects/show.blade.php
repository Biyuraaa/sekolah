@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumb -->
            <nav class="flex mb-8" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                </path>
                            </svg>
                            <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-blue-600">
                                Dashboard
                            </a>
                        </div>
                    </li>
                    <li>
                        <a href="{{ route('classroomSubjects.index') }}"
                            class="flex items-center text-gray-600 hover:text-blue-600">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Jadwal Pelajaran
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-500 ml-1 md:ml-2">Detail Jadwal Pelajaran</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Header Section -->
            <div class="container mx-auto px-4 py-8">
                <div class="flex justify-between items-center mb-8">
                    <div class="flex items-center space-x-4">
                        <div class="bg-blue-600 p-3 rounded-xl shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900">Detail Mata Pelajaran</h1>
                            <p class="text-gray-600">Informasi lengkap jadwal dan kelas</p>
                        </div>
                    </div>

                    <div>
                        @if ($classroomSubject->status === 'active')
                            <span class="inline-flex items-center px-4 py-2 rounded-lg bg-green-100 text-green-800">
                                <span class="w-3 h-3 bg-green-500 rounded-full mr-2"></span>
                                Aktif
                            </span>
                        @else
                            <span class="inline-flex items-center px-4 py-2 rounded-lg bg-red-100 text-red-800">
                                <span class="w-3 h-3 bg-red-500 rounded-full mr-2"></span>
                                Tidak Aktif
                            </span>
                        @endif
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    {{-- Kelas Information Card --}}
                    <div
                        class="bg-white border border-blue-100 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-xl font-semibold text-blue-900">Informasi Kelas</h3>
                            <div class="bg-blue-500 text-white p-3 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-center space-x-4">
                                <div class="bg-blue-50 p-3 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-blue-900">Kelas</p>
                                    <p class="text-lg font-bold text-blue-700">
                                        {{ $classroomSubject->classroom->year_level }}-{{ $classroomSubject->classroom->group_numbers }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-4">
                                <div class="bg-blue-50 p-3 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-blue-900">Tahun Ajaran</p>
                                    <p class="text-lg font-bold text-blue-700">
                                        {{ $classroomSubject->classroom->academic_year }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Mata Pelajaran Information Card --}}
                    <div
                        class="bg-white border border-green-100 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-xl font-semibold text-green-900">Informasi Mata Pelajaran</h3>
                            <div class="bg-green-500 text-white p-3 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-center space-x-4">
                                <div class="bg-green-50 p-3 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-green-900">Mata Pelajaran</p>
                                    <p class="text-lg font-bold text-green-700">
                                        {{ $classroomSubject->subject->name }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-4">
                                <div class="bg-green-50 p-3 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-green-900">Deskripsi</p>
                                    <p class="text-base text-green-700">
                                        {{ $classroomSubject->subject->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Jadwal Information Card --}}
                    <div
                        class="bg-white border border-purple-100 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-xl font-semibold text-purple-900">Informasi Jadwal</h3>
                            <div class="bg-purple-500 text-white p-3 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>
                        <div class="space-y-4">
                            @foreach ($classroomSubjectDays as $day => $schedules)
                                <div class="border-b border-purple-100 pb-4 last:border-b-0">
                                    <p class="text-sm font-medium text-purple-900 mb-2">Hari</p>
                                    <p class="text-lg font-bold text-purple-700 mb-3">{{ ucfirst($day) }}</p>

                                    @foreach ($schedules as $schedule)
                                        @foreach ($schedule['hours'] as $hour)
                                            <div class="flex items-center space-x-4 mb-2">
                                                <div class="bg-purple-50 p-3 rounded-lg">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-6 w-6 text-purple-600" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <p class="text-sm text-purple-900">Jam</p>
                                                    <p class="text-lg font-bold text-purple-700">
                                                        {{ \Carbon\Carbon::parse($hour['start_time'])->format('H:i') }}
                                                        -
                                                        {{ \Carbon\Carbon::parse($hour['end_time'])->format('H:i') }}
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Weeks Section -->
            <div class="bg-white/80 backdrop-blur-sm rounded-xl border border-gray-200 shadow-lg mt-8 overflow-hidden">
                <div class="px-6 py-5 bg-gradient-to-r from-green-50 to-green-100 border-b border-gray-200">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center space-x-4">
                            <div class="bg-green-600 p-3 rounded-xl shadow-md">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-3xl font-bold text-gray-800">Course Weeks</h2>
                                <p class="text-gray-600 text-sm">Comprehensive overview of course progression</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <button id="openCreateWeekModal"
                                class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-md shadow-sm">
                                <i class="fas fa-plus mr-2"></i>
                                Create Week
                            </button>
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    @if ($weeks->isEmpty())
                        <div
                            class="bg-gray-50 rounded-xl border-2 border-dashed border-gray-300 text-center p-10 transition-all duration-300 hover:border-green-400">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="w-28 h-28 text-gray-400 mb-5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                                <h3 class="text-2xl font-semibold text-gray-700 mb-3">No Weeks Scheduled</h3>
                                <p class="text-gray-500 max-w-md mx-auto mb-6">
                                    Your course journey begins here. Start by creating your first week to outline the
                                    learning path.
                                </p>
                                <a href="{{ route('weeks.create', $classroomSubject) }}"
                                    class="px-6 py-2.5 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-all duration-300 shadow-md hover:shadow-lg">
                                    Get Started
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="space-y-5">
                            @foreach ($weeks as $week)
                                <div
                                    class="bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md transition-all duration-300 ease-in-out overflow-hidden group">
                                    <div class="week-header cursor-pointer flex items-center justify-between p-5 bg-gray-50 hover:bg-gray-100 transition-colors"
                                        data-week-id="{{ $week->id }}">
                                        <div class="flex items-center space-x-4">
                                            <div
                                                class="bg-blue-100 text-blue-700 px-4 py-2 rounded-lg font-bold tracking-wide">
                                                Week {{ $week->week_number }}
                                            </div>
                                            <h4
                                                class="text-xl font-semibold text-gray-800 group-hover:text-blue-600 transition-colors">
                                                {{ $week->title }}
                                            </h4>
                                        </div>
                                        <svg class="h-6 w-6 text-gray-500 transform transition-transform duration-300 week-arrow"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                    <div class="hidden week-content" id="week-{{ $week->id }}">
                                        <div class="p-6 pt-0">
                                            <div class="border-t border-gray-200 pt-6 space-y-6">
                                                <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                                                    <div
                                                        class="px-6 py-5 bg-gradient-to-r from-blue-100 via-blue-50 to-blue-100 border-b border-blue-200 flex justify-between items-center">
                                                        <h5
                                                            class="text-2xl font-bold text-gray-800 flex items-center space-x-2">
                                                            <span class="tracking-wide">Attendance</span>
                                                        </h5>

                                                        <a href="{{ route('weeks.absences.show', [$classroomSubject, $week]) }}"
                                                            class="inline-flex items-center px-5 py-2 border border-transparent rounded-lg text-sm font-medium text-white bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 transition-all duration-300 ease-in-out transform hover:-translate-y-0.5 shadow-md hover:shadow-lg focus:ring-4 focus:ring-blue-300">
                                                            <svg class="-ml-1 mr-2 h-5 w-5"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                                fill="currentColor">
                                                                <path fill-rule="evenodd"
                                                                    d="M10 5a1 1 0 011 1v4h4a1 1 0 110 2h-4v4a1 1 0 11-2 0v-4H5a1 1 0 110-2h4V6a1 1 0 011-1z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                            Mark Attendance
                                                        </a>
                                                    </div>
                                                </div>

                                                <!-- Learning Materials Section -->
                                                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                                                    <div
                                                        class="px-6 py-5 bg-gradient-to-r from-blue-50 to-blue-100 border-b border-blue-200 flex justify-between items-center">
                                                        <h5 class="text-2xl font-bold text-gray-800 flex items-center">
                                                            <svg class="w-8 h-8 mr-4 text-blue-600" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                                </path>
                                                            </svg>
                                                            Learning Materials
                                                        </h5>

                                                        <a href="{{ route('weeks.materials.create', [$classroomSubject, $week]) }}"
                                                            class="inline-flex items-center px-4 py-2 border border-transparent rounded-lg text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 transition-colors duration-300 ease-in-out transform hover:-translate-y-0.5 shadow-md hover:shadow-lg">
                                                            <svg class="-ml-1 mr-2 h-5 w-5"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                                fill="currentColor">
                                                                <path fill-rule="evenodd"
                                                                    d="M10 5a1 1 0 011 1v4h4a1 1 0 110 2h-4v4a1 1 0 11-2 0v-4H5a1 1 0 110-2h4V6a1 1 0 011-1z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                            Add Material
                                                        </a>
                                                    </div>

                                                    <div class="p-6">
                                                        @if ($week->materials->isNotEmpty())
                                                            <ul class="space-y-4">
                                                                @foreach ($week->materials as $material)
                                                                    <li
                                                                        class="bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md transition-all duration-300 ease-in-out">
                                                                        <div class="p-4 flex items-center justify-between">
                                                                            <div class="flex items-center space-x-4">
                                                                                <div class="bg-blue-100 p-3 rounded-lg">
                                                                                    <svg class="w-6 h-6 text-blue-600"
                                                                                        fill="none"
                                                                                        stroke="currentColor"
                                                                                        viewBox="0 0 24 24">
                                                                                        <path stroke-linecap="round"
                                                                                            stroke-linejoin="round"
                                                                                            stroke-width="2"
                                                                                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0013.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                                                                    </svg>
                                                                                </div>
                                                                                <div>
                                                                                    <h3
                                                                                        class="text-lg font-semibold text-gray-800">
                                                                                        {{ $material->title }}</h3>
                                                                                    <p
                                                                                        class="text-sm text-gray-500 max-w-md truncate">
                                                                                        {{ Str::limit($material->description, 100) }}
                                                                                    </p>
                                                                                </div>
                                                                            </div>

                                                                            <div class="flex items-center space-x-3">
                                                                                @if ($material->file_path)
                                                                                    <a href="{{ asset('storage/files/materials/' . $material->file_path) }}"
                                                                                        class="text-blue-600 hover:text-blue-800 bg-blue-50 hover:bg-blue-100 px-3 py-1.5 rounded-full text-sm font-medium flex items-center space-x-2 transition-all duration-300">
                                                                                        <svg class="w-5 h-5"
                                                                                            fill="none"
                                                                                            stroke="currentColor"
                                                                                            viewBox="0 0 24 24">
                                                                                            <path stroke-linecap="round"
                                                                                                stroke-linejoin="round"
                                                                                                stroke-width="2"
                                                                                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                                                                        </svg>
                                                                                        <span>Download</span>
                                                                                    </a>
                                                                                @endif

                                                                                <div class="flex space-x-2">
                                                                                    <a href="{{ route('weeks.materials.edit', [$classroomSubject, $week, $material]) }}"
                                                                                        class="text-gray-600 hover:text-gray-800 bg-gray-100 hover:bg-gray-200 px-3 py-1.5 rounded-full text-sm font-medium transition-all duration-300">
                                                                                        Edit
                                                                                    </a>

                                                                                    <form
                                                                                        action="{{ route('weeks.materials.destroy', [$classroomSubject, $week, $material]) }}"
                                                                                        method="POST"
                                                                                        onsubmit="return confirm('Are you sure you want to delete this material?')">
                                                                                        @csrf
                                                                                        @method('DELETE')
                                                                                        <button type="submit"
                                                                                            class="text-red-600 hover:text-red-800 bg-red-50 hover:bg-red-100 px-3 py-1.5 rounded-full text-sm font-medium transition-all duration-300">
                                                                                            Delete
                                                                                        </button>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @else
                                                            <div
                                                                class="text-center py-12 bg-gray-50 rounded-xl border border-gray-200">
                                                                <svg class="mx-auto h-16 w-16 text-gray-400"
                                                                    fill="none" viewBox="0 0 24 24"
                                                                    stroke="currentColor">
                                                                    <path vector-effect="non-scaling-stroke"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                                                </svg>
                                                                <h3 class="mt-4 text-lg font-semibold text-gray-900">No
                                                                    Learning Materials</h3>
                                                                <p class="mt-2 text-sm text-gray-600">Get started by
                                                                    creating your first learning material.</p>
                                                                <div class="mt-6">
                                                                    <a href="{{ route('weeks.materials.create', [$classroomSubject, $week]) }}"
                                                                        class="inline-flex items-center px-6 py-2.5 border border-transparent text-base font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 transition-colors duration-300 ease-in-out transform hover:-translate-y-0.5 shadow-md hover:shadow-lg">
                                                                        <svg class="-ml-1 mr-3 h-6 w-6"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 20 20" fill="currentColor">
                                                                            <path fill-rule="evenodd"
                                                                                d="M10 5a1 1 0 011 1v4h4a1 1 0 110 2h-4v4a1 1 0 11-2 0v-4H5a1 1 0 110-2h4V6a1 1 0 011-1z"
                                                                                clip-rule="evenodd" />
                                                                        </svg>
                                                                        Add First Material
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <!-- Assignments Section -->
                                                <div
                                                    class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                                                    <!-- Header -->
                                                    <div
                                                        class="px-6 py-4 bg-gradient-to-r from-green-50 to-green-100 border-b border-green-200 flex justify-between items-center">
                                                        <h5 class="text-xl font-bold text-gray-800 flex items-center">
                                                            <svg class="w-7 h-7 mr-3 text-green-600 transform rotate-6"
                                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                            </svg>
                                                            <span class="tracking-wide">Assignments</span>
                                                        </h5>
                                                        <a href="{{ route('weeks.tasks.create', [$classroomSubject, $week]) }}"
                                                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-semibold rounded-lg text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transform transition hover:scale-105">
                                                            <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 20 20" fill="currentColor">
                                                                <path fill-rule="evenodd"
                                                                    d="M10 5a1 1 0 011 1v4h4a1 1 0 110 2h-4v4a1 1 0 11-2 0v-4H5a1 1 0 110-2h4V6a1 1 0 011-1z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                            New Assignment
                                                        </a>
                                                    </div>

                                                    <!-- Content -->
                                                    <div class="p-6">
                                                        @if ($week->tasks->isNotEmpty())
                                                            <ul class="space-y-4">
                                                                @foreach ($week->tasks as $task)
                                                                    <li
                                                                        class="bg-gray-50 rounded-lg p-4 hover:bg-gray-100 transition-colors duration-200">
                                                                        <div class="flex items-center justify-between">
                                                                            <div class="flex-1">
                                                                                <!-- Task Title and Due Date -->
                                                                                <div class="flex items-center space-x-3">
                                                                                    <div class="flex-shrink-0">
                                                                                        <span
                                                                                            class="flex h-8 w-8 items-center justify-center rounded-full bg-green-100">
                                                                                            <svg class="w-5 h-5 text-green-600"
                                                                                                fill="none"
                                                                                                stroke="currentColor"
                                                                                                viewBox="0 0 24 24">
                                                                                                <path
                                                                                                    stroke-linecap="round"
                                                                                                    stroke-linejoin="round"
                                                                                                    stroke-width="2"
                                                                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                                            </svg>
                                                                                        </span>
                                                                                    </div>
                                                                                    <div>
                                                                                        <h4
                                                                                            class="text-lg font-semibold text-gray-900">
                                                                                            {{ $task->title }}</h4>
                                                                                        <p class="text-sm text-gray-600">
                                                                                            <svg class="inline w-4 h-4 mr-1 text-gray-500"
                                                                                                fill="none"
                                                                                                stroke="currentColor"
                                                                                                viewBox="0 0 24 24">
                                                                                                <path
                                                                                                    stroke-linecap="round"
                                                                                                    stroke-linejoin="round"
                                                                                                    stroke-width="2"
                                                                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                                                            </svg>
                                                                                            Due:
                                                                                            {{ \Carbon\Carbon::parse($task->due_date)->format('M d, Y') }}
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <!-- Actions -->
                                                                            <div class="flex items-center space-x-3">
                                                                                <a href="{{ route('weeks.tasks.show', [$classroomSubject, $week, $task]) }}"
                                                                                    class="inline-flex items-center px-3 py-1.5 rounded-md bg-blue-50 text-blue-700 hover:bg-blue-100 transition-colors duration-200">
                                                                                    <svg class="w-4 h-4 mr-1"
                                                                                        fill="none"
                                                                                        stroke="currentColor"
                                                                                        viewBox="0 0 24 24">
                                                                                        <path stroke-linecap="round"
                                                                                            stroke-linejoin="round"
                                                                                            stroke-width="2"
                                                                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                                        <path stroke-linecap="round"
                                                                                            stroke-linejoin="round"
                                                                                            stroke-width="2"
                                                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                                                    </svg>
                                                                                    View
                                                                                </a>
                                                                                <a href="{{ route('weeks.tasks.edit', [$classroomSubject, $week, $task]) }}"
                                                                                    class="inline-flex items-center px-3 py-1.5 rounded-md bg-yellow-50 text-yellow-700 hover:bg-yellow-100 transition-colors duration-200">
                                                                                    <svg class="w-4 h-4 mr-1"
                                                                                        fill="none"
                                                                                        stroke="currentColor"
                                                                                        viewBox="0 0 24 24">
                                                                                        <path stroke-linecap="round"
                                                                                            stroke-linejoin="round"
                                                                                            stroke-width="2"
                                                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                                                    </svg>
                                                                                    Edit
                                                                                </a>
                                                                                <form
                                                                                    action="{{ route('weeks.tasks.destroy', [$classroomSubject, $week, $task]) }}"
                                                                                    method="POST" class="inline"
                                                                                    onsubmit="return confirm('Are you sure you want to delete this assignment?');">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <button type="submit"
                                                                                        class="inline-flex items-center px-3 py-1.5 rounded-md bg-red-50 text-red-700 hover:bg-red-100 transition-colors duration-200">
                                                                                        <svg class="w-4 h-4 mr-1"
                                                                                            fill="none"
                                                                                            stroke="currentColor"
                                                                                            viewBox="0 0 24 24">
                                                                                            <path stroke-linecap="round"
                                                                                                stroke-linejoin="round"
                                                                                                stroke-width="2"
                                                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                                        </svg>
                                                                                        Delete
                                                                                    </button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @else
                                                            <div class="text-center py-12">
                                                                <div
                                                                    class="mx-auto h-24 w-24 bg-gray-50 rounded-full flex items-center justify-center">
                                                                    <svg class="h-12 w-12 text-gray-400" fill="none"
                                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path vector-effect="non-scaling-stroke"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            stroke-width="2"
                                                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                                                    </svg>
                                                                </div>
                                                                <h3 class="mt-4 text-lg font-medium text-gray-900">No
                                                                    assignments yet</h3>
                                                                <p class="mt-2 text-sm text-gray-500 max-w-sm mx-auto">Get
                                                                    started by creating your first assignment for this week.
                                                                </p>
                                                                <div class="mt-6">
                                                                    <a href="{{ route('weeks.tasks.create', [$classroomSubject, $week]) }}"
                                                                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                                                        <svg class="h-5 w-5 mr-2"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 20 20" fill="currentColor">
                                                                            <path fill-rule="evenodd"
                                                                                d="M10 5a1 1 0 011 1v4h4a1 1 0 110 2h-4v4a1 1 0 11-2 0v-4H5a1 1 0 110-2h4V6a1 1 0 011-1z"
                                                                                clip-rule="evenodd" />
                                                                        </svg>
                                                                        Create Assignment
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- Create Week Modal -->
        <div id="createWeekModal"
            class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden z-50 px-4 py-6">
            <div
                class="bg-white rounded-xl shadow-2xl w-full max-w-md p-6 relative transform transition-all duration-300 ease-out scale-95 opacity-0 modal-container">
                <div class="absolute top-0 right-0 pt-4 pr-4">
                    <button id="closeCreateWeekModal"
                        class="text-gray-400 hover:text-gray-600 focus:outline-none transition ease-in-out duration-150 group">
                        <svg class="h-6 w-6 group-hover:rotate-90 transition-transform" stroke="currentColor"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="sm:flex sm:items-start">
                    <div
                        class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10 animate-pulse">
                        <svg class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                    </div>

                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                        <h3 class="text-lg leading-6 font-semibold text-gray-900" id="modal-headline">
                            Create New Week
                        </h3>

                        <form id="createWeekForm" action="{{ route('weeks.store', $classroomSubject) }}" method="POST"
                            class="mt-4 space-y-4">
                            @csrf
                            <div>
                                <label for="week_number" class="block text-sm font-medium text-gray-700 mb-1">Week
                                    Number</label>
                                <input type="number" name="week_number" id="week_number" required min="1"
                                    class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm 
                                focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 
                                transition duration-200 ease-in-out"
                                    placeholder="Enter week number">
                            </div>

                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                                <input type="text" name="title" id="title" required
                                    class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm 
                                focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 
                                transition duration-200 ease-in-out"
                                    placeholder="Enter week title">
                            </div>
                        </form>
                    </div>
                </div>

                <div class="mt-6 sm:flex sm:flex-row-reverse space-y-3 sm:space-y-0 sm:space-x-3">
                    <button type="submit" form="createWeekForm"
                        class="w-full sm:w-auto inline-flex justify-center rounded-md border border-transparent 
                    shadow-md px-4 py-2 bg-green-600 text-white font-medium 
                    hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 
                    transition duration-200 ease-in-out transform hover:scale-105 active:scale-95">
                        Create Week
                    </button>

                    <button type="button" id="cancelCreateWeek"
                        class="w-full sm:w-auto inline-flex justify-center rounded-md border border-gray-300 
                    shadow-sm px-4 py-2 bg-white text-gray-700 font-medium 
                    hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 
                    transition duration-200 ease-in-out transform hover:scale-105 active:scale-95">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle week content
            const weekHeaders = document.querySelectorAll('.week-header');
            weekHeaders.forEach(header => {
                header.addEventListener('click', function() {
                    const weekId = this.dataset.weekId;
                    const content = document.getElementById(`week-${weekId}`);
                    const arrow = this.querySelector('svg');

                    content.classList.toggle('hidden');
                    arrow.classList.toggle('rotate-180');
                });
            });

            // Modal functionality
            const modal = document.getElementById('createWeekModal');
            const openModalButton = document.getElementById('openCreateWeekModal');
            const closeModalButton = document.getElementById('closeCreateWeekModal');
            const cancelButton = document.getElementById('cancelCreateWeek');
            const form = document.getElementById('createWeekForm');

            function openModal() {
                modal.classList.remove('hidden');
                const modalContainer = modal.querySelector('.modal-container');
                setTimeout(() => {
                    modalContainer.classList.add('show');
                    modal.querySelector('input').focus();
                }, 50);
            }

            function closeModal() {
                const modalContainer = modal.querySelector('.modal-container');
                modalContainer.classList.remove('show');
                setTimeout(() => {
                    modal.classList.add('hidden');
                    form.reset();
                }, 200); // Sesuaikan dengan waktu transisi di CSS
            }

            openModalButton.addEventListener('click', openModal);
            closeModalButton.addEventListener('click', closeModal);
            cancelButton.addEventListener('click', closeModal);

            modal.addEventListener('click', (e) => {
                if (!e.target.closest('.modal-container')) {
                    closeModal();
                }
            });

            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                    closeModal();
                }
            });

            // Form validation (optional)
            form.addEventListener('submit', (e) => {
                const weekNumber = document.getElementById('week_number').value;
                const title = document.getElementById('title').value;

                if (!weekNumber || !title) {
                    e.preventDefault();
                    alert('Please fill out all fields.');
                }
            });
        });
    </script>
@endpush

@push('styles')
    <style>
        .modal-container {
            transform: scale(0.9);
            opacity: 0;
            transition: transform 0.2s ease, opacity 0.2s ease;
        }

        .modal-container.show {
            transform: scale(1);
            opacity: 1;
        }
    </style>
@endpush
