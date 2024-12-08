@extends('layouts.app')
@section('content')
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumb Navigation -->
            <nav class="flex mb-8" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                </path>
                            </svg>
                            <a href="{{ route('dashboard') }}"
                                class="text-gray-700 hover:text-blue-600 transition duration-300">
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
                            <a href="{{ route('attendances.index') }}"
                                class="text-gray-700 hover:text-blue-600 transition duration-300">
                                Absensi
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
                            <span class="text-gray-500 ml-1 md:ml-2">{{ $classroomSubject->subject->name }}</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <div class="flex justify-between items-center mb-8">
                <div class="flex items-center space-x-3">
                    <div class="bg-blue-500 p-2 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Absensi Mata Pelajaran</h2>
                        <p class="text-gray-500 text-sm">Detail kehadiran dan informasi kelas.</p>
                    </div>
                </div>
            </div>

            <!-- Statistik Absensi -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
                <div class="bg-white shadow-md rounded-lg p-5 text-center">
                    <h4 class="text-sm text-gray-600 mb-2">Total Pertemuan</h4>
                    <p class="text-2xl font-bold text-blue-600">{{ $totalMeetings }}</p>
                </div>
                <div class="bg-white shadow-md rounded-lg p-5 text-center">
                    <h4 class="text-sm text-gray-600 mb-2">Hadir</h4>
                    <p class="text-2xl font-bold text-green-600">{{ $presentCount }}</p>
                </div>
                <div class="bg-white shadow-md rounded-lg p-5 text-center">
                    <h4 class="text-sm text-gray-600 mb-2">Terlambat</h4>
                    <p class="text-2xl font-bold text-yellow-600">{{ $lateCount }}</p>
                </div>
                <div class="bg-white shadow-md rounded-lg p-5 text-center">
                    <h4 class="text-sm text-gray-600 mb-2">Tidak Hadir</h4>
                    <p class="text-2xl font-bold text-red-600">{{ $absenceCount }}</p>
                </div>
            </div>

            <!-- Riwayat Absensi -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-6 bg-gray-50 border-b">
                    <h3 class="text-xl font-semibold text-gray-800">Riwayat Absensi</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-100 border-b">
                            <tr>
                                <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Pertemuan</th>
                                <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status
                                </th>
                                <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Keterangan</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($absences as $absence)
                                <tr>
                                    <td class="p-4 whitespace-nowrap">Pertemuan {{ $absence['week']->week_number }}</td>
                                    <td class="p-4 whitespace-nowrap">
                                        @if ($absence['status'])
                                            <span
                                                class="px-2 py-1 rounded-full text-xs font-medium 
                                    {{ $absence['status'] == 'present'
                                        ? 'bg-green-100 text-green-800'
                                        : ($absence['status'] == 'late'
                                            ? 'bg-yellow-100 text-yellow-800'
                                            : 'bg-red-100 text-red-800') }}">
                                                {{ ucfirst($absence['status']) }}
                                            </span>
                                        @else
                                            <span
                                                class="px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                                Belum ada data
                                            </span>
                                        @endif
                                    </td>
                                    <td class="p-4">-</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="p-4 text-center text-gray-500">Tidak ada riwayat absensi</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
