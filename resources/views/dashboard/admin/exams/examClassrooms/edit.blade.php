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

                    <!-- Current Page: Edit Kelas -->
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-500 ml-1 md:ml-2 font-medium">Edit Kelas</span>
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
                        <h2 class="text-3xl font-bold text-gray-900">Edit Ujian</h2>
                        <p class="text-sm text-gray-500">Silahkan lengkapi form berikut untuk mengedit jadwal ujian.</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-xl overflow-hidden transition-all duration-200 hover:shadow-2xl">
                <div class="p-6 sm:p-8">
                    <form action="{{ route('exams.examClassrooms.update', [$exam, $examClassroom]) }}" method="POST"
                        class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-2">
                                <label for="classroom_id" class="block text-sm font-medium text-gray-700">
                                    Kelas <span class="text-red-500">*</span>
                                </label>
                                <select name="classroom_id" id="classroom_id"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm @error('classroom_id') border-red-300 @enderror"
                                    disabled>
                                    <option value="">Pilih Kelas</option>
                                    @foreach ($classrooms as $classroom)
                                        <option value="{{ $classroom->id }}"
                                            {{ old('classroom_id', $examClassroom->classroom_id) == $classroom->id ? 'selected' : '' }}>
                                            {{ $classroom->year_level }} {{ $classroom->group_numbers }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('classroom_id')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label for="room" class="block text-sm font-medium text-gray-700">Ruangan</label>
                                <input type="text" name="room" id="room"
                                    value="{{ old('room', $examClassroom->room) }}" class="block w-full rounded-md">
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label for="teacher_id" class="block text-sm font-medium text-gray-700">
                                Pengawas <span class="text-red-500">*</span>
                            </label>
                            <select name="teacher_id" id="teacher_id"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm @error('teacher_id') border-red-300 @enderror"
                                required>
                                <option value="">Pilih Pengawas</option>
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}"
                                        {{ old('teacher_id', $examClassroom->teacher_id) == $teacher->id ? 'selected' : '' }}>
                                        {{ $teacher->user->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('teacher_id')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end space-x-4 pt-4">
                            <a href="{{ route('exams.show', $exam) }}"
                                class="inline-flex justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
                                Batal
                            </a>
                            <button type="submit"
                                class="inline-flex justify-center rounded-md border border-transparent bg-green-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-green-700">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
