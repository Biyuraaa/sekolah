@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-white py-8">
        <div class="mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumb -->
            <nav class="flex mb-8" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <!-- Dashboard Link -->
                    <li>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                </path>
                            </svg>
                            <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-green-600 font-medium">
                                Dashboard
                            </a>
                        </div>
                    </li>

                    <!-- Ujian Link -->
                    <li>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <a href="{{ route('exams.index') }}"
                                class="text-gray-700 hover:text-blue-600 ml-1 md:ml-2 font-medium">Ujian</a>
                        </div>
                    </li>

                    <!-- Detail Ujian Link -->
                    <li>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <a href="{{ route('exams.show', $exam) }}"
                                class="text-gray-700 hover:text-blue-600 ml-1 md:ml-2 font-medium">Detail Ujian</a>
                        </div>
                    </li>

                    <!-- Current Page: Tampilkan Hasil Ujian Kelas -->
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-500 ml-1 md:ml-2 font-medium">Hasil Ujian Kelas</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Header Section -->
            <div class="mb-8">
                <div class="flex items-center space-x-4">
                    <div class="bg-gradient-to-r from-green-500 to-green-600 p-3 rounded-xl shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900">Hasil Ujian Kelas</h2>
                        <p class="text-sm text-gray-500">
                            Mata Pelajaran: {{ $examClassroom->exam->subject->name }} |
                            Kelas: {{ $examClassroom->classroom->year_level }} -
                            {{ $examClassroom->classroom->group_numbers }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Exam Results Section -->
            <div class="border-t border-gray-200 pt-6">
                <div class="bg-white rounded-xl shadow-xl border border-gray-100 overflow-hidden">
                    <!-- Exam Details Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-6 bg-gray-50 border-b">
                        <!-- Exam Details Card -->
                        <div class="bg-white rounded-lg shadow-md p-5 border border-gray-100">
                            <div class="flex items-center space-x-4 mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <h3 class="text-lg font-bold text-gray-800">Detail Ujian</h3>
                            </div>
                            <p class="text-sm text-gray-600 mb-1">
                                <span class="font-medium">Tanggal:</span>
                                {{ \Carbon\Carbon::parse($exam->date)->format('d M Y') }}
                            </p>
                            <p class="text-sm text-gray-600">
                                <span class="font-medium">Durasi:</span>
                                {{ \Carbon\Carbon::parse($exam->start_time)->diffInMinutes(\Carbon\Carbon::parse($exam->end_time)) }}
                                menit
                            </p>
                        </div>

                        <!-- Score Statistics Card -->
                        <div class="bg-white rounded-lg shadow-md p-5 border border-gray-100">
                            <div class="flex items-center space-x-4 mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                                <h3 class="text-lg font-bold text-gray-800">Statistik Nilai</h3>
                            </div>
                            <p class="text-sm text-gray-600 mb-1">
                                <span class="font-medium">Rata-rata:</span>
                                {{ number_format($studentScores->avg('score'), 2) }}
                            </p>
                            <div class="flex justify-between">
                                <p class="text-sm text-green-600">
                                    <span class="font-medium">Tertinggi:</span>
                                    {{ $studentScores->max('score') ?? 'N/A' }}
                                </p>
                                <p class="text-sm text-red-600">
                                    <span class="font-medium">Terendah:</span>
                                    {{ $studentScores->min('score') ?? 'N/A' }}
                                </p>
                            </div>
                        </div>

                        <!-- Exam Supervisor Card -->
                        <div class="bg-white rounded-lg shadow-md p-5 border border-gray-100">
                            <div class="flex items-center space-x-4 mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <h3 class="text-lg font-bold text-gray-800">Pengawas Ujian</h3>
                            </div>
                            <p class="text-sm text-gray-600">
                                {{ $examClassroom->teacher->user->name }}
                            </p>
                        </div>
                    </div>

                    <!-- Student Scores Table -->
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-emerald-50 border-b">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-bold text-emerald-700 uppercase tracking-wider">
                                        No</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-bold text-emerald-700 uppercase tracking-wider">
                                        Nama Siswa</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-bold text-emerald-700 uppercase tracking-wider">
                                        Nilai</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-bold text-emerald-700 uppercase tracking-wider">
                                        Catatan</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse ($studentScores as $index => $studentScore)
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $index + 1 }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $studentScore['student'] }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm 
                                @if ($studentScore['score'] !== 'Belum dinilai') {{ $studentScore['score'] >= 75 ? 'text-green-600 font-semibold' : 'text-red-600' }}
                                @else
                                    text-gray-500 @endif">
                                            {{ $studentScore['score'] }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500">{{ $studentScore['notes'] }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                            Tidak ada data siswa untuk ujian ini.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
