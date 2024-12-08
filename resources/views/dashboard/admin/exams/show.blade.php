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
                    <li>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <a href="{{ route('exams.index') }}" class="text-gray-700 hover:text-blue-600">
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
                            <span class="text-gray-500">Detail Ujian</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Header Section -->
            <div class="bg-white shadow rounded-lg p-6 mb-8">
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-3">
                        <div class="bg-blue-500 p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900">{{ $exam->subject->name }} -
                                {{ strtoupper($exam->type) }}</h1>
                            <p class="text-sm font-medium text-gray-500">Exam Details</p>
                        </div>
                    </div>
                    <span
                        class="px-3 py-1 text-sm font-medium rounded-full {{ $exam->type === 'uts' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                        {{ strtoupper($exam->type) }}
                    </span>
                </div>
            </div>
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4 mb-8">
                <!-- Total Questions Card -->
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                                <i class="fas fa-question-circle text-white text-xl"></i>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Total Questions</dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl font-semibold text-gray-900">{{ $exam->questions_count }}</div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Duration Card -->
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                                <i class="fas fa-clock text-white text-xl"></i>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Duration</dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl font-semibold text-gray-900">
                                            {{ \Carbon\Carbon::parse($exam->start_time)->diffInMinutes($exam->end_time) }}
                                            min
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Participants Card -->
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-yellow-500 rounded-md p-3">
                                <i class="fas fa-users text-white text-xl"></i>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Participants</dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl font-semibold text-gray-900">{{ $exam->participants_count }}
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Average Score Card -->
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-purple-500 rounded-md p-3">
                                <i class="fas fa-chart-bar text-white text-xl"></i>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Average Score</dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl font-semibold text-gray-900">
                                            {{ number_format($exam->average_score, 1) }}
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="bg-white shadow rounded-lg overflow-hidden">
                <!-- Exam Header -->
                <div class="px-6 py-4 border-b">
                    <div class="flex items-center justify-between">
                        <h2 class="text-2xl font-bold text-gray-800">Informasi Detail</h2>
                    </div>
                </div>

                <!-- Exam Details -->
                <div class="px-6 py-8">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
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
                                        <p class="text-lg font-semibold text-green-700">{{ $exam->subject->name }}</p>
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
                                        <p class="text-base text-green-700">{{ $exam->subject->description }}</p>
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
                                        <p class="text-sm font-medium text-purple-900">Tanggal</p>
                                        <p class="text-lg font-semibold text-purple-700">
                                            {{ \Carbon\Carbon::parse($exam->date)->format('d F Y') }}</p>
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
                                            {{ \Carbon\Carbon::parse($exam->start_time)->format('H:i') }} -
                                            {{ \Carbon\Carbon::parse($exam->end_time)->format('H:i') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Academic Information Card -->
                        <div
                            class="group hover:shadow-lg transition-all duration-300 ease-in-out bg-gradient-to-br from-blue-50 to-blue-100/50 rounded-xl p-6 border border-blue-100">
                            <div class="flex justify-between items-start mb-4">
                                <h3 class="text-lg font-semibold text-blue-900">Informasi Akademik</h3>
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
                                        <p class="text-sm font-medium text-blue-900">Tahun Akademik</p>
                                        <p class="text-lg font-semibold text-blue-700">{{ $exam->academic_year }}</p>
                                    </div>
                                </div>

                                @if ($exam->additional_info)
                                    <div class="flex items-center space-x-3 group">
                                        <div
                                            class="flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-lg bg-blue-500/10 group-hover:bg-blue-500/20 transition-colors duration-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-sm font-medium text-blue-900">Informasi Tambahan</p>
                                            <p class="text-base text-blue-700">{{ $exam->additional_info }}</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-200 pt-6">
                <h3 class="text-lg font-medium text-gray-900 flex justify-between items-center">
                    <span>Exam Classrooms</span>
                    <a href="{{ route('exams.examClassrooms.create', $exam) }}"
                        class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Add New Classroom
                    </a>
                </h3>
                <div class="mt-4">
                    <div class="overflow-x-auto">
                        @if ($exam->examClassrooms->isEmpty())
                            <!-- Message for empty schedule -->
                            <div class="bg-yellow-100 text-yellow-800 px-6 py-4 rounded-md">
                                <p class="text-sm">No exam classrooms available.</p>
                            </div>
                        @else
                            <!-- Schedule Table -->
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-indigo-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-center text-xs font-medium text-gray-600 uppercase tracking-wider">
                                            Kelas
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-center text-xs font-medium text-gray-600 uppercase tracking-wider">
                                            Ruangan
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-center text-xs font-medium text-gray-600 uppercase tracking-wider">
                                            Pengawas
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-center text-xs font-medium text-gray-600 uppercase tracking-wider">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($exam->examClassrooms as $examClassroom)
                                        <tr class="hover:bg-gray-100">
                                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-900">
                                                {{ $examClassroom->classroom->year_level }} -
                                                {{ $examClassroom->classroom->group_numbers }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-900">
                                                {{ $examClassroom->room }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-900">
                                                {{ $examClassroom->teacher->user->name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                                <!-- Lihat Button -->
                                                <a href="{{ route('exams.examClassrooms.show', [$exam, $examClassroom]) }}"
                                                    class="inline-flex items-center px-3 py-1.5 text-white bg-blue-600 rounded-md hover:bg-blue-700">
                                                    <i class="fas fa-eye mr-2"></i> Lihat
                                                </a>

                                                <!-- Edit Button -->
                                                <a href="{{ route('exams.examClassrooms.edit', [$exam, $examClassroom]) }}"
                                                    class="inline-flex items-center px-3 py-1.5 text-white bg-orange-600 rounded-md hover:bg-orange-700">
                                                    <i class="fas fa-edit mr-2"></i> Edit
                                                </a>

                                                <!-- Delete Button -->
                                                <form action="" method="POST" class="inline-block"
                                                    onsubmit="return confirm('Are you sure you want to delete this classroom?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="inline-flex items-center px-3 py-1.5 text-white bg-red-600 rounded-md hover:bg-red-700">
                                                        <i class="fas fa-trash mr-2"></i> Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
