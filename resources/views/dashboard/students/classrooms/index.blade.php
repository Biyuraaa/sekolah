@extends('layouts.app')
@section('content')
    <div class="min-h-screen bg-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
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
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-500 ml-1 md:ml-2">Kelas</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Header Section -->
            <div class="flex justify-between items-center mb-8">
                <div class="flex items-center space-x-3">
                    <div class="bg-blue-500 p-2 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Kelas Saya</h2>
                        <p class="text-gray-500 text-sm">Lihat informasi kelas aktif dan jadwal pelajaran Anda saat ini.</p>
                    </div>
                </div>
            </div>


            <div class="grid grid-cols-1 gap-5 sm:grid-cols-4 mb-8">
                <!-- Kelas Aktif -->
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="bg-blue-100 rounded-md p-3">
                                    <svg class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Kelas Aktif</dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl font-semibold text-gray-900">
                                            {{ $activeClassroom->year_level . '-' . $activeClassroom->group_numbers }}</div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Jumlah Pelajaran -->
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="bg-green-100 rounded-md p-3">
                                    <svg class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Jumlah Pelajaran</dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl font-semibold text-gray-900">{{ $subjectCount }}</div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Jumlah Guru -->
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="bg-green-100 rounded-md p-3">
                                    <svg class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Jumlah Guru</dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl font-semibold text-gray-900">{{ $teacherCount }}</div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Jam Pelajaran -->
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="bg-purple-100 rounded-md p-3">
                                    <svg class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Total Jam Pelajaran</dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl font-semibold text-gray-900">
                                            {{ $activeClassroom->classroomSubjects->sum(function ($subject) {
                                                return $subject->classroomSubjectDays->sum(function ($day) {
                                                    return $day->classroomSubjectDayHours->count();
                                                });
                                            }) }}
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-2xl rounded-3xl overflow-hidden mb-8 transition-all duration-300 hover:shadow-xl">
                {{-- Header Section --}}
                <div class="bg-gradient-to-r from-indigo-50 to-indigo-100 px-6 py-5 border-b border-gray-200">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-indigo-600 mr-4" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                        </svg>
                        <div>
                            <h3 class="text-2xl font-bold text-indigo-900">Informasi Kelas</h3>
                            <p class="text-sm text-indigo-700 opacity-80">Detail lengkap mengenai kelas Anda</p>
                        </div>
                    </div>
                </div>

                {{-- Content Section --}}
                <div class="p-6">
                    <div class="grid md:grid-cols-2 gap-6">
                        {{-- Kolom Kiri --}}
                        <div class="space-y-6">
                            {{-- Tingkat Kelas --}}
                            <div class="bg-gray-50 rounded-2xl p-5 hover:bg-gray-100 transition-all duration-300 group">
                                <div class="flex items-center space-x-4">
                                    <div class="p-3 bg-indigo-100 rounded-xl group-hover:bg-indigo-200 transition-colors">
                                        <svg class="h-7 w-7 text-indigo-600" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-xs font-medium text-gray-500 uppercase tracking-wider">Tingkat
                                            Kelas</div>
                                        <div class="text-base font-bold text-indigo-900">
                                            {{ $activeClassroom->year_level }} - {{ $activeClassroom->group_numbers }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Tahun Akademik --}}
                            <div class="bg-gray-50 rounded-2xl p-5 hover:bg-gray-100 transition-all duration-300 group">
                                <div class="flex items-center space-x-4">
                                    <div class="p-3 bg-green-100 rounded-xl group-hover:bg-green-200 transition-colors">
                                        <svg class="h-7 w-7 text-green-600" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-xs font-medium text-gray-500 uppercase tracking-wider">Tahun
                                            Akademik</div>
                                        <div class="text-base font-bold text-green-900">
                                            {{ $activeClassroom->academic_year }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Kolom Kanan --}}
                        <div class="space-y-6">
                            {{-- Wali Kelas --}}
                            <div class="bg-gray-50 rounded-2xl p-5 hover:bg-gray-100 transition-all duration-300 group">
                                <div class="flex items-center space-x-4">
                                    <div class="p-3 bg-purple-100 rounded-xl group-hover:bg-purple-200 transition-colors">
                                        <svg class="h-7 w-7 text-purple-600" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-xs font-medium text-gray-500 uppercase tracking-wider">Wali Kelas
                                        </div>
                                        <div class="text-base font-bold text-purple-900">
                                            {{ $activeClassroom->teacher->user->name ?? 'Belum Ditentukan' }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Nama Angkatan --}}
                            <div class="bg-gray-50 rounded-2xl p-5 hover:bg-gray-100 transition-all duration-300 group">
                                <div class="flex items-center space-x-4">
                                    <div class="p-3 bg-pink-100 rounded-xl group-hover:bg-pink-200 transition-colors">
                                        <svg class="h-7 w-7 text-pink-600" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                                            Angkatan</div>
                                        <div class="text-base font-bold text-pink-900">
                                            {{ $activeClassroom->batch_name }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-2xl rounded-3xl overflow-hidden mb-8 transition-all duration-300 hover:shadow-xl">
                {{-- Enhanced Header Section --}}
                <div class="bg-gradient-to-r from-green-400 to-green-600 px-6 py-6 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="bg-white p-3 rounded-lg shadow-md mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-white">Jadwal Pelajaran</h3>
                                <p class="text-green-100">Lihat jadwal pelajaran Anda saat ini</p>
                            </div>
                        </div>
                        <div class="hidden md:block">
                            <span class="bg-green-700 text-white px-4 py-2 rounded-full text-sm">
                                {{ now()->format('l, d F Y') }}
                            </span>
                        </div>
                    </div>
                </div>

                {{-- Improved Empty State --}}
                @if ($groupedSchedule->isEmpty())
                    <div class="flex flex-col items-center justify-center py-20 px-6 text-center bg-gray-50">
                        <div class="bg-white p-6 rounded-full shadow-md mb-6">
                            <svg class="h-16 w-16 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <p class="text-xl text-gray-600 font-medium mb-2">
                            Belum ada jadwal pelajaran
                        </p>
                        <p class="text-gray-400">
                            Jadwal pelajaran untuk kelas ini akan ditampilkan di sini
                        </p>
                    </div>
                @else
                    <div class="divide-y divide-gray-200 sm:rounded-lg sm:shadow">
                        @foreach ($groupedSchedule as $day => $daySchedules)
                            <div class="bg-white mb-4 last:mb-0">
                                <!-- Day Header -->
                                <div class="bg-green-50 px-6 py-3 flex items-center justify-between">
                                    <h3 class="font-medium text-green-800 text-lg">
                                        {{ ucfirst($daySchedules->first()['day']) }}
                                    </h3>
                                    <span class="text-sm text-green-600 bg-green-100 px-3 py-1 rounded-full">
                                        {{ count($daySchedules) }} Mata Pelajaran
                                    </span>
                                </div>

                                <!-- Schedule Table -->
                                <div class="overflow-x-auto">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th
                                                    class="w-1/4 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Waktu
                                                </th>
                                                <th
                                                    class="w-1/3 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Mata Pelajaran
                                                </th>
                                                <th
                                                    class="w-5/12 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Guru
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-100">
                                            @foreach ($daySchedules as $schedule)
                                                <tr class="hover:bg-green-50 transition-colors duration-200">
                                                    <td class="w-1/4 px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">
                                                            <div class="bg-green-100 p-2 rounded-lg mr-3">
                                                                <svg class="h-5 w-5 text-green-600" viewBox="0 0 20 20"
                                                                    fill="currentColor">
                                                                    <path fill-rule="evenodd"
                                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                                                        clip-rule="evenodd" />
                                                                </svg>
                                                            </div>
                                                            <span class="text-sm font-medium text-gray-900">
                                                                {{ $schedule['start_time'] }} -
                                                                {{ $schedule['end_time'] }}
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td class="w-1/3 px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ $schedule['subject'] }}
                                                        </div>
                                                    </td>
                                                    <td class="w-5/12 px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">
                                                            <div class="flex-shrink-0 h-10 w-10">
                                                                <img class="h-10 w-10 rounded-full object-cover ring-2 ring-green-500 ring-offset-2"
                                                                    src="{{ $schedule['teacher']->image ?? 'https://ui-avatars.com/api/?name=' . urlencode($schedule['teacher']->name) }}"
                                                                    alt="{{ $schedule['teacher']->name }}">
                                                            </div>
                                                            <div class="ml-4">
                                                                <div class="text-sm font-medium text-gray-900">
                                                                    {{ $schedule['teacher']->name }}
                                                                </div>
                                                                <div class="text-xs text-gray-500">
                                                                    Pengajar
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
