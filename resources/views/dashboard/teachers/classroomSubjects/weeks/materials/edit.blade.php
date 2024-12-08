@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-white py-8">
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
                            Detail Jadwal Mata Pelajaran
                        </a>
                    </li>
                    <li>
                        <span class="flex items-center text-gray-400">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Edit Materi
                        </span>
                    </li>
                </ol>
            </nav>

            <!-- Header Section -->
            <div class="flex justify-between items-center mb-8">
                <div class="flex items-center space-x-4">
                    <div class="bg-blue-100 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-3xl font-extrabold text-gray-900">Edit Materi Mata Pelajaran</h2>
                        <p class="text-sm text-gray-500 mt-1">
                            Edit materi untuk mata pelajaran <span
                                class="font-medium">{{ $classroomSubject->subject->name }}</span>
                            di kelas <span
                                class="font-medium">{{ $classroomSubject->classroom->year_level }}-{{ $classroomSubject->classroom->group_numbers }}</span>
                            pada minggu ke-<span class="font-medium">{{ $week->week_number }}</span>
                        </p>
                    </div>
                </div>
                <div>
                    <a href="{{ route('classroomSubjects.show', $classroomSubject) }}"
                        class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 011.414-1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                                clip-rule="evenodd" />
                        </svg>
                        Kembali
                    </a>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-lg overflow-hidden mx-auto my-8">
                <div class="p-6 sm:p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Edit Materi</h2>

                    @if ($errors->any())
                        <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-red-800">Terdapat {{ $errors->count() }} kesalahan
                                        pada formulir:</h3>
                                    <ul class="mt-2 text-sm text-red-700 list-disc list-inside">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    <form id="materialForm"
                        action="{{ route('weeks.materials.update', [$classroomSubject, $week, $material]) }}"
                        method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Judul Materi</label>
                            <input type="text" name="title" id="title"
                                class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 @error('title') border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror"
                                placeholder="Masukkan judul materi" required value="{{ old('title', $material->title) }}">
                            @error('title')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                            <textarea name="description" id="description" rows="4"
                                class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 @error('description') border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror"
                                placeholder="Tambahkan deskripsi (opsional)">{{ old('description', $material->description) }}</textarea>
                            @error('description')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="file" class="block text-sm font-medium text-gray-700">Unggah File Baru
                                (Opsional)</label>
                            <div id="drop-zone"
                                class="mt-1 flex flex-col items-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md transition-colors duration-200 ease-in-out hover:border-blue-400">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                        viewBox="0 0 48 48" aria-hidden="true">
                                        <path
                                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex flex-col space-y-2 text-sm text-gray-600">
                                        <label for="file"
                                            class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                            <span>Pilih file baru</span>
                                            <input id="file" name="file" type="file" class="sr-only"
                                                accept=".pdf,.doc,.docx,.ppt,.pptx,.xls,.xlsx" />
                                        </label>
                                        <p class="text-gray-500">atau seret dan lepas file di sini</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PDF, Word, Excel, PowerPoint (Maks. 10MB)</p>
                                </div>
                            </div>
                            <div id="file-preview" class="mt-2 hidden">
                                <div class="flex items-center justify-between p-2 bg-gray-50 rounded-lg">
                                    <div class="flex items-center text-sm text-gray-600">
                                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span id="file-name" class="text-gray-700"></span>
                                        <span id="file-size" class="ml-2 text-gray-500"></span>
                                    </div>
                                    <button type="button" id="remove-file"
                                        class="text-red-600 hover:text-red-800 focus:outline-none focus:ring-2 focus:ring-red-500">
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            @if ($material->file_path)
                                <div class="mt-2">
                                    <p class="text-sm text-gray-600">File saat ini: <a
                                            href="{{ asset('storage/files/materials/' . $material->file_path) }}"
                                            class="text-blue-600 hover:underline"
                                            target="_blank">{{ basename($material->file_path) }}</a></p>
                                </div>
                            @endif
                            @error('file')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                <svg class="w-5 h-5 mr-2 -ml-1" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                </svg>
                                Perbarui Materi
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
            const form = document.getElementById('materialForm');
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

            function handleFile(file) {
                if (validateFile(file)) {
                    fileName.textContent = file.name;
                    fileSize.textContent = formatFileSize(file.size);
                    filePreview.classList.remove('hidden');
                }
            }

            // Drag and drop handlers
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
                if (file) handleFile(file);
            });

            // File input change handler
            fileInput.addEventListener('change', function() {
                if (fileInput.files.length > 0) {
                    handleFile(fileInput.files[0]);
                }
            });

            // Remove file handler
            removeFile.addEventListener('click', function() {
                fileInput.value = '';
                filePreview.classList.add('hidden');
            });

            // Form validation
            form.addEventListener('submit', function(e) {
                let isValid = true;
                const title = document.getElementById('title');

                if (title.value.trim() === '') {
                    isValid = false;
                    title.classList.add('border-red-300', 'text-red-900', 'placeholder-red-300',
                        'focus:ring-red-500', 'focus:border-red-500');
                    const errorMsg = title.parentNode.querySelector('.text-red-600') || document
                        .createElement('p');
                    errorMsg.textContent = 'Judul materi harus diisi.';
                    errorMsg.classList.add('mt-2', 'text-sm', 'text-red-600');
                    if (!title.parentNode.querySelector('.text-red-600')) {
                        title.parentNode.appendChild(errorMsg);
                    }
                } else {
                    title.classList.remove('border-red-300', 'text-red-900', 'placeholder-red-300',
                        'focus:ring-red-500', 'focus:border-red-500');
                    const errorMsg = title.parentNode.querySelector('.text-red-600');
                    if (errorMsg) errorMsg.remove();
                }

                if (!isValid) {
                    e.preventDefault();
                }
            });
        });
    </script>
@endpush
