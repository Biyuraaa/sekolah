@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-white py-12">
        <div class="mx-auto px-4 sm:px-6 lg:px-8">
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
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <a href="{{ route('consultations.index') }}"
                                class="text-gray-700 hover:text-blue-600 ml-1 md:ml-2">
                                Konsultasi
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
                            <span class="text-gray-500 ml-1 md:ml-2">Tambah Jadwal Konsultasi</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Header Section -->
            <div class="mb-8">
                <div class="flex items-center space-x-4">
                    <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-3 rounded-xl shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900">Tambah Jadwal Konsultasi</h2>
                        <p class="text-sm text-gray-500">Silahkan lengkapi form untuk menambahkan jadwal konsultasi baru.
                        </p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-xl overflow-hidden transition-all duration-200 hover:shadow-2xl">
                <div class="p-6 sm:p-8">
                    <form action="{{ route('consultations.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <input type="hidden" name="teacher_id" value="{{ Auth::user()->teacher->id }}">



                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Tanggal -->
                            <div class="space-y-1">
                                <label for="date" class="block text-sm font-medium text-gray-700">
                                    Tanggal <span class="text-red-500">*</span>
                                </label>
                                <input type="date" name="date" id="date"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm @error('date') border-red-300 @enderror"
                                    value="{{ old('date') }}" required>
                                @error('date')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- Lokasi -->
                            <div class="space-y-1">
                                <label for="location" class="block text-sm font-medium text-gray-700">
                                    Lokasi <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="location" id="location"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm @error('location') border-red-300 @enderror"
                                    placeholder="Masukkan lokasi konsultasi" value="{{ old('location') }}" required>
                                @error('location')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-1">
                                <label for="start_time" class="block text-sm font-medium text-gray-700">
                                    Jam Mulai <span class="text-red-500">*</span>
                                </label>
                                <input type="time" name="start_time" id="start_time"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm @error('start_time') border-red-300 @enderror"
                                    value="{{ old('start_time') }}" required>
                                @error('start_time')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- Jam Selesai -->
                            <div class="space-y-1">
                                <label for="end_time" class="block text-sm font-medium text-gray-700">
                                    Jam Selesai <span class="text-red-500">*</span>
                                </label>
                                <input type="time" name="end_time" id="end_time"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm @error('end_time') border-red-300 @enderror"
                                    value="{{ old('end_time') }}" required>
                                @error('end_time')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Maks Janji -->
                        </div>
                        <div class="space-y-1">
                            <label for="max_appointments" class="block text-sm font-medium text-gray-700">
                                Maks. Konsultasi <span class="text-red-500">*</span>
                            </label>
                            <input type="number" name="max_appointments" id="max_appointments"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm @error('max_appointments') border-red-300 @enderror"
                                value="{{ old('max_appointments') }}" required min="1">
                            @error('max_appointments')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="flex items-center justify-end space-x-4 pt-4">
                            <a href="{{ route('consultations.index') }}"
                                class="inline-flex justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                                Batal
                            </a>
                            <button type="submit"
                                class="inline-flex justify-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                Simpan Jadwal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
