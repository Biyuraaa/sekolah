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
                            <span class="text-gray-500 ml-1 md:ml-2">Jadwal Pelajaran</span>
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Jadwal Pelajaran</h2>
                        <p class="text-gray-500 text-sm">Kelola jadwal mata pelajaran untuk setiap kelas</p>
                    </div>
                </div>


            </div>

            <div class="bg-white shadow-xl rounded-2xl overflow-hidden transition-all duration-300 hover:shadow-2xl">
                {{-- Header Section --}}
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="bg-white p-3 rounded-lg shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-white">Daftar Mata Pelajaran</h3>
                                <p class="text-blue-100">Total: {{ $classroomSubjects->count() }} mata pelajaran</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-8">

                    @if ($classroomSubjects->count() > 0)
                        {{-- List Mata Pelajaran --}}
                        <div class="flex flex-col space-y-6">
                            @foreach ($classroomSubjects as $classroomSubject)
                                <a href="{{ route('classroomSubjects.show', $classroomSubject->id) }}" class="block group">
                                    <div
                                        class="bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                                        {{-- Card Content --}}
                                        <div class="p-6">
                                            <div class="flex items-center justify-between mb-6">
                                                <!-- Icon Container -->
                                                <div class="flex items-center space-x-4">
                                                    <div
                                                        class="bg-gradient-to-br from-blue-50 to-blue-100 p-3 rounded-xl group-hover:scale-110 transition-transform duration-300">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24"
                                                            stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                                        </svg>
                                                    </div>
                                                    <span
                                                        class="text-xl font-bold text-gray-900 group-hover:text-blue-600 transition-colors">
                                                        {{ $classroomSubject->subject->name }}
                                                    </span>
                                                </div>
                                                <!-- Status Badge -->
                                                <span
                                                    class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium {{ $classroomSubject->status === 'active' ? 'text-green-700 bg-green-100 ring-1 ring-green-300' : 'text-red-700 bg-red-100 ring-1 ring-red-300' }}">
                                                    <span
                                                        class="w-2 h-2 rounded-full {{ $classroomSubject->status === 'active' ? 'bg-green-500' : 'bg-red-500' }} mr-2"></span>
                                                    {{ $classroomSubject->status === 'active' ? 'Aktif' : 'Tidak Aktif' }}
                                                </span>
                                            </div>


                                            {{-- Teacher Info --}}
                                            <div class="flex items-center space-x-4">
                                                <img class="h-12 w-12 rounded-full object-cover ring-2 ring-blue-500 ring-offset-2 group-hover:ring-offset-4 transition-all"
                                                    src="https://ui-avatars.com/api/?name={{ urlencode($classroomSubject->teacher->user->name) }}&background=random"
                                                    alt="{{ $classroomSubject->teacher->user->name }}">
                                                <div>
                                                    <p class="text-sm font-semibold text-gray-900">
                                                        {{ $classroomSubject->teacher->user->name }}</p>
                                                    <p class="text-xs text-gray-500">Pengajar</p>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Card Footer --}}
                                        <div class="px-6 py-4 bg-gray-50 rounded-b-2xl border-t border-gray-100">
                                            <div class="flex justify-between items-center">
                                                <div class="flex items-center space-x-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                    <span
                                                        class="text-sm text-gray-600">{{ $classroomSubject->classroomSubjectDays->count() }}
                                                        Pertemuan</span>
                                                </div>
                                                <span
                                                    class="inline-flex items-center text-sm font-medium text-blue-600 group-hover:text-blue-800 transition-colors">
                                                    Lihat Detail
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-4 w-4 ml-1 group-hover:translate-x-1 transition-transform"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M9 5l7 7-7 7" />
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @else
                        {{-- Empty State --}}
                        <div
                            class="flex flex-col items-center justify-center py-16 bg-gray-50 rounded-2xl border-2 border-dashed border-gray-200">
                            <div class="bg-white p-6 rounded-full shadow-sm mb-6">
                                <svg class="h-16 w-16 text-blue-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-900 mb-2">Belum Ada Mata Pelajaran</h2>
                            <p class="text-gray-500 text-center max-w-sm mb-6">Mata pelajaran yang tersedia akan
                                ditampilkan di sini.</p>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection
