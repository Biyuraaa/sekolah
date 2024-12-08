@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-white py-8">
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
                            <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-green-600">
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
                            <a href="{{ route('exams.index') }}"
                                class="text-gray-700 hover:text-blue-600 ml-1 md:ml-2">Ujian</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-500 ml-1 md:ml-2">Tambah Ujian Baru</span>
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
                        <h2 class="text-3xl font-bold text-gray-900">Tambah Ujian Baru</h2>
                        <p class="text-sm text-gray-500">Silahkan lengkapi form berikut untuk menambahkan jadwal ujian baru.
                        </p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-xl overflow-hidden transition-all duration-200 hover:shadow-2xl">
                <div class="p-6 sm:p-8">
                    <form action="{{ route('exams.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Mata Pelajaran -->
                            <div class="space-y-1">
                                <label for="subject_id" class="block text-sm font-medium text-gray-700">
                                    Mata Pelajaran <span class="text-red-500">*</span>
                                </label>
                                <select name="subject_id" id="subject_id"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm @error('subject_id') border-red-300 @enderror"
                                    required>
                                    <option value="">Pilih Mata Pelajaran</option>
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}"
                                            {{ old('subject_id') == $subject->id ? 'selected' : '' }}>
                                            {{ $subject->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('subject_id')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Tipe Ujian -->
                            <div class="space-y-1">
                                <label for="type" class="block text-sm font-medium text-gray-700">
                                    Tipe Ujian <span class="text-red-500">*</span>
                                </label>
                                <select name="type" id="type"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm @error('type') border-red-300 @enderror"
                                    required>
                                    <option value="uts" {{ old('type') == 'uts' ? 'selected' : '' }}>UTS</option>
                                    <option value="uas" {{ old('type') == 'uas' ? 'selected' : '' }}>UAS</option>
                                </select>
                                @error('type')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            <!-- Tanggal Ujian -->
                            <div class="space-y-1">
                                <label for="date" class="block text-sm font-medium text-gray-700">
                                    Tanggal Ujian <span class="text-red-500">*</span>
                                </label>
                                <input type="date" name="date" id="date"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm @error('date') border-red-300 @enderror"
                                    value="{{ old('date') }}" required>
                                @error('date')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Waktu Mulai -->
                            <div class="space-y-1">
                                <label for="start_time" class="block text-sm font-medium text-gray-700">
                                    Waktu Mulai <span class="text-red-500">*</span>
                                </label>
                                <input type="time" name="start_time" id="start_time"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm @error('start_time') border-red-300 @enderror"
                                    value="{{ old('start_time') }}" required>
                                @error('start_time')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Waktu Selesai -->
                            <div class="space-y-1">
                                <label for="end_time" class="block text-sm font-medium text-gray-700">
                                    Waktu Selesai <span class="text-red-500">*</span>
                                </label>
                                <input type="time" name="end_time" id="end_time"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm @error('end_time') border-red-300 @enderror"
                                    value="{{ old('end_time') }}" required>
                                @error('end_time')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Tahun Akademik -->
                        <div class="space-y-1">
                            <label for="academic_year" class="block text-sm font-medium text-gray-700">
                                Tahun Akademik <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="academic_year" id="academic_year"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm @error('academic_year') border-red-300 @enderror"
                                placeholder="Contoh: 2023/2024" value="{{ old('academic_year') }}" required>
                            @error('academic_year')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end space-x-4 pt-4">
                            <a href="{{ route('exams.index') }}"
                                class="inline-flex justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                                Batal
                            </a>
                            <button type="submit"
                                class="inline-flex justify-center rounded-md border border-transparent bg-green-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                                Simpan Ujian
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                // Validate end time is after start time
                const startTimeInput = document.getElementById('start_time');
                const endTimeInput = document.getElementById('end_time');

                const validateTimes = () => {
                    if (startTimeInput.value && endTimeInput.value) {
                        if (endTimeInput.value <= startTimeInput.value) {
                            endTimeInput.setCustomValidity('Waktu selesai harus setelah waktu mulai');
                        } else {
                            endTimeInput.setCustomValidity('');
                        }
                    }
                };

                startTimeInput.addEventListener('change', validateTimes);
                endTimeInput.addEventListener('change', validateTimes);

                // Validate academic year format
                const academicYearInput = document.getElementById('academic_year');
                academicYearInput.addEventListener('input', (e) => {
                    const value = e.target.value;
                    if (!/^\d{4}\/\d{4}$/.test(value)) {
                        academicYearInput.setCustomValidity('Format tahun akademik harus YYYY/YYYY');
                    } else {
                        const [year1, year2] = value.split('/').map(Number);
                        if (year2 !== year1 + 1) {
                            academicYearInput.setCustomValidity('Tahun kedua harus tahun pertama + 1');
                        } else {
                            academicYearInput.setCustomValidity('');
                        }
                    }
                });
            });
        </script>
    @endpush
@endsection
