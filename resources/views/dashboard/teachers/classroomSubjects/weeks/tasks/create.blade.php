@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-50 py-10">
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
                    <li>
                        <a href="{{ route('classroomSubjects.show', $classroomSubject) }}"
                            class="flex items-center text-gray-600 hover:text-blue-600">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Detail Jadwal Pelajaran
                        </a>
                    </li>
                    <li>
                        <span class="flex items-center text-gray-400">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Buat Tugas
                        </span>
                    </li>
                </ol>
            </nav>

            <!-- Header Section -->
            <div class="bg-white shadow-soft rounded-xl overflow-hidden mb-8">
                <div class="p-6 bg-gradient-to-r from-blue-50 to-blue-100">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="bg-blue-500 p-3 rounded-lg shadow-md">
                                <svg class="h-8 w-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-gray-800">Buat Tugas Mata Pelajaran</h2>
                                <p class="text-sm text-gray-600 mt-1">
                                    Buat tugas untuk mata pelajaran
                                    <span class="font-semibold text-blue-600">{{ $classroomSubject->subject->name }}</span>
                                    di kelas
                                    <span
                                        class="font-semibold text-blue-600">{{ $classroomSubject->classroom->year_level }}-{{ $classroomSubject->classroom->group_numbers }}</span>
                                    pada minggu ke-
                                    <span class="font-semibold text-blue-600">{{ $week->week_number }}</span>
                                </p>
                            </div>
                        </div>
                        <a href="{{ route('classroomSubjects.show', $classroomSubject) }}"
                            class="btn btn-outline-blue flex items-center space-x-2">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>Kembali</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Form Section -->
            <div class="bg-white shadow-soft rounded-xl overflow-hidden">
                <div class="p-8">
                    @if ($errors->any())
                        <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded-r-lg">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 mr-4">
                                    <svg class="h-6 w-6 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-sm font-medium text-red-800 mb-2">Kesalahan Formulir</h3>
                                    <ul class="text-sm text-red-700 list-disc list-inside space-y-1">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('weeks.tasks.store', [$classroomSubject, $week]) }}" method="POST"
                        class="space-y-6" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Title Input -->
                            <div class="md:col-span-2">
                                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Judul
                                    Tugas</label>
                                <input type="text" name="title" id="title" required
                                    class="form-input w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200"
                                    value="{{ old('title') }}" placeholder="Masukkan judul tugas">
                            </div>


                            <!-- Due Date and Time -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Tanggal dan Waktu Pengumpulan
                                </label>
                                <div class="grid grid-cols-2 gap-3">
                                    <div>
                                        <label for="due_date_input" class="sr-only">Tanggal</label>
                                        <input type="date" name="due_date_input" id="due_date_input" required
                                            class="form-input w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                                            value="{{ old('due_date_input', now()->format('Y-m-d')) }}">
                                    </div>
                                    <div>
                                        <label for="due_time_input" class="sr-only">Waktu</label>
                                        <input type="time" name="due_time_input" id="due_time_input" required
                                            class="form-input w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                                            value="{{ old('due_time_input', now()->format('H:i')) }}">
                                    </div>
                                </div>
                                <p class="mt-2 text-xs text-gray-500">
                                    Pilih tanggal dan waktu terakhir pengumpulan tugas
                                </p>
                            </div>

                            <!-- Description -->
                            <div class="md:col-span-2">
                                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                                    Deskripsi Tugas
                                </label>
                                <textarea name="description" id="description" rows="4"
                                    class="form-textarea w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200"
                                    placeholder="Tambahkan deskripsi detail tugas (opsional)">{{ old('description') }}</textarea>
                                <p class="mt-2 text-xs text-gray-500">
                                    Berikan penjelasan tambahan tentang tugas yang akan dikumpulkan
                                </p>
                            </div>
                        </div>
                        <!-- File Upload -->
                        <div>
                            <label for="file" class="block text-sm font-medium text-gray-700 mb-2">Unggah
                                File</label>
                            <div id="drop-zone"
                                class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center transition duration-200 
                                            hover:border-blue-500 hover:bg-blue-50 group">
                                <input type="file" id="file" name="file" class="hidden"
                                    accept=".pdf,.doc,.docx,.ppt,.pptx,.xls,.xlsx">

                                <div class="flex flex-col items-center justify-center space-y-3">
                                    <svg class="w-12 h-12 text-gray-400 group-hover:text-blue-500 transition"
                                        fill="none" stroke="currentColor" viewBox="0 0 48 48">
                                        <path
                                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>

                                    <div class="space-y-1">
                                        <label for="file"
                                            class="text-blue-600 hover:text-blue-700 font-medium cursor-pointer">
                                            Pilih file
                                        </label>
                                        <p class="text-sm text-gray-500">atau seret dan lepas di sini</p>
                                    </div>

                                    <p class="text-xs text-gray-400">PDF, Word, Excel, PowerPoint (Maks. 10MB)</p>
                                </div>

                                <div id="file-preview" class="hidden mt-4 bg-gray-100 rounded-lg p-3">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center space-x-3">
                                            <svg class="w-8 h-8 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <div>
                                                <p id="file-name" class="text-sm font-medium text-gray-700"></p>
                                                <p id="file-size" class="text-xs text-gray-500"></p>
                                            </div>
                                        </div>
                                        <button id="remove-file" type="button"
                                            class="text-red-500 hover:text-red-600 focus:outline-none">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="md:col-span-2 flex justify-end">
                            <button type="submit"
                                class="btn btn-primary flex items-center space-x-2 px-6 py-2.5 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>Simpan Tugas</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.getElementById('file');
            const dropZone = document.getElementById('drop-zone');
            const filePreview = document.getElementById('file-preview');
            const fileName = document.getElementById('file-name');
            const fileSize = document.getElementById('file-size');
            const removeFile = document.getElementById('remove-file');

            const MAX_FILE_SIZE = 10 * 1024 * 1024; // 10MB
            const ALLOWED_TYPES = [
                'application/pdf',
                'application/msword',
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                'application/vnd.ms-powerpoint',
                'application/vnd.openxmlformats-officedocument.presentationml.presentation',
                'application/vnd.ms-excel',
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
            ];

            function formatFileSize(bytes) {
                if (bytes === 0) return '0 Bytes';
                const k = 1024;
                const sizes = ['Bytes', 'KB', 'MB'];
                const i = Math.floor(Math.log(bytes) / Math.log(k));
                return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
            }

            function validateFile(file) {
                if (!ALLOWED_TYPES.includes(file.type)) {
                    alert('Tipe file tidak didukung. Silakan pilih file PDF, Word, Excel, atau PowerPoint.');
                    return false;
                }
                if (file.size > MAX_FILE_SIZE) {
                    alert('Ukuran file terlalu besar. Maksimum 10MB.');
                    return false;
                }
                return true;
            }

            function handleFileDisplay(file) {
                if (validateFile(file)) {
                    fileName.textContent = file.name;
                    fileSize.textContent = formatFileSize(file.size);
                    filePreview.classList.remove('hidden');
                    dropZone.classList.add('border-green-500', 'bg-green-50');
                }
            }

            // Drag and drop event handlers
            dropZone.addEventListener('dragover', (e) => {
                e.preventDefault();
                dropZone.classList.add('border-blue-500', 'bg-blue-50');
            });

            dropZone.addEventListener('dragleave', (e) => {
                e.preventDefault();
                dropZone.classList.remove('border-blue-500', 'bg-blue-50');
            });

            dropZone.addEventListener('drop', (e) => {
                e.preventDefault();
                dropZone.classList.remove('border-blue-500', 'bg-blue-50');
                const file = e.dataTransfer.files[0];
                if (file) {
                    fileInput.files = e.dataTransfer.files;
                    handleFileDisplay(file);
                }
            });

            // File input change handler
            fileInput.addEventListener('change', function() {
                if (fileInput.files.length > 0) {
                    handleFileDisplay(fileInput.files[0]);
                }
            });

            // Remove file handler
            removeFile.addEventListener('click', function() {
                fileInput.value = '';
                filePreview.classList.add('hidden');
                dropZone.classList.remove('border-green-500', 'bg-green-50');
            });

            // Optional: Restrict date selection
            const dueDateInput = document.getElementById('due_date_input');
            const today = new Date().toISOString().split('T')[0];
            dueDateInput.setAttribute('min', today);
        });
    </script>
@endpush
