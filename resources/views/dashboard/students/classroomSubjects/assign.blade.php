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
                            {{ $classroomSubject->subject->name ?? 'Detail Jadwal Pelajaran' }} </a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-500 ml-1 md:ml-2">
                                Pengumpulan Tugas
                            </span>
                        </div>
                    </li>
                </ol>
            </nav>

            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <!-- Header Section -->
                <div class="bg-gradient-to-r from-blue-600 to-blue-700 p-6">
                    <div class="flex items-center space-x-4">
                        <div class="bg-white/10 p-3 rounded-lg backdrop-blur-sm">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                </path>
                            </svg>
                        </div>
                        <h1 class="text-2xl font-bold text-white">{{ $task->title }}</h1>
                    </div>
                </div>

                <!-- Content Section -->
                <div class="p-6">
                    <!-- Description Card -->
                    <div class="bg-gray-50 rounded-xl p-4 mb-6">
                        <p class="text-gray-700 leading-relaxed">
                            {{ $task->description ?? 'Tidak ada deskripsi untuk tugas ini.' }}
                        </p>
                    </div>

                    <!-- Status Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <!-- Due Date Card -->
                        <div
                            class="bg-white rounded-lg p-4 border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
                            <div class="flex items-center space-x-3">
                                <div class="flex-shrink-0">
                                    <span class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-100">
                                        <svg class="h-5 w-5 text-blue-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </span>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Due Date</p>
                                    <p class="text-lg font-semibold text-gray-900">
                                        {{ $task->due_date->format('d M Y, H:i') }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Time Remaining Card -->
                        <div
                            class="p-4 border shadow-sm rounded-lg transition-shadow 
    @if ($submission->status === 'submitted' && !$task->due_date->isPast()) bg-green-600 text-white
    @elseif ($submission->status === 'late')
        bg-red-600 text-white
    @elseif (!$submission->submitted_at && $task->due_date->isPast())
        bg-white text-red-600
    @else
        bg-white text-black @endif">
                            <div class="flex items-center space-x-3">
                                <div class="flex-shrink-0">
                                    <span
                                        class="flex h-10 w-10 items-center justify-center rounded-full 
                {{ $task->due_date->isPast() ? 'bg-red-100' : 'bg-green-100' }}">
                                        <svg class="h-5 w-5 {{ $task->due_date->isPast() ? 'text-red-600' : 'text-green-600' }}"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </span>
                                </div>
                                <div>
                                    @if ($submission->status === 'submitted' && !$task->due_date->isPast())
                                        <p class="text-sm font-medium">Time Remaining</p>
                                        <p class="text-lg font-semibold">
                                            Assignment was submitted
                                            {{ $task->due_date->diffForHumans($submission->submitted_at, true) }} early
                                        </p>
                                    @elseif ($submission->status === 'late')
                                        <p class="text-sm font-medium">Submission Status</p>
                                        <p class="text-lg font-semibold">Assignment was submitted late</p>
                                    @elseif (!$submission->submitted_at && $task->due_date->isPast())
                                        <p class="text-sm font-medium">Time Remaining</p>
                                        <p class="text-lg font-semibold">Overdue</p>
                                    @else
                                        <p class="text-sm font-medium">Time Remaining</p>
                                        <p class="text-lg font-semibold">{{ $task->due_date->diffForHumans() }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <!-- Submission Status -->
                        <div
                            class="bg-white rounded-lg p-4 border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
                            <div class="flex items-center space-x-3">
                                <div class="flex-shrink-0">
                                    <span
                                        class="flex h-10 w-10 items-center justify-center rounded-full {{ $submission->status === 'submitted' ? 'bg-green-100' : 'bg-yellow-100' }}">
                                        <svg class="h-5 w-5 {{ $submission->status === 'submitted' ? 'text-green-600' : 'text-yellow-600' }}"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </span>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Submission Status</p>
                                    <p
                                        class="text-lg font-semibold {{ $submission->status === 'submitted' ? 'text-green-600' : 'text-yellow-600' }}">
                                        {{ ucfirst($submission->status) }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Grading Status -->
                        <div
                            class="bg-white rounded-lg p-4 border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
                            <div class="flex items-center space-x-3">
                                <div class="flex-shrink-0">
                                    <span
                                        class="flex h-10 w-10 items-center justify-center rounded-full {{ $submission->grade ? 'bg-purple-100' : 'bg-gray-100' }}">
                                        <svg class="h-5 w-5 {{ $submission->grade ? 'text-purple-600' : 'text-gray-600' }}"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                        </svg>
                                    </span>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Grading Status</p>
                                    <p
                                        class="text-lg font-semibold {{ $submission->grade == 0 ? 'text-red-600' : 'text-green-600' }}">
                                        {{ $submission->grade == 0 ? 'Not Graded' : $submission->grade }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Button -->
                    <div class="flex justify-end">
                        <button id="submitButton"
                            class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg text-sm transition-colors duration-200 shadow-lg hover:shadow-xl">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                            </svg>
                            Submit Assignment
                        </button>
                    </div>

                </div>
            </div>

            <!-- Change this div -->
            <div id="fileUploadSection" class="mt-8 {{ isset($submission->file_path) ? '' : 'hidden' }}">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Submit Your Assignment</h2>
                <form action="{{ route('submissions.submit', $submission) }}" method="POST"
                    enctype="multipart/form-data" id="assignment-form" class="space-y-4">
                    @csrf
                    @method('PATCH')
                    <div class="flex items-center justify-center w-full">
                        <label for="file-upload" id="upload-zone"
                            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition duration-300 ease-in-out">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                    </path>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span>
                                    or drag and drop</p>
                                <p class="text-xs text-gray-500">PDF, DOC, DOCX (MAX. 10MB)</p>
                            </div>
                            <input id="file-upload" name="file" type="file" class="hidden"
                                accept=".pdf,.doc,.docx" />
                        </label>
                    </div>
                    <div id="file-info" class="hidden w-full p-4 mt-3 bg-gray-50 rounded-lg">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <svg class="w-8 h-8 mr-2 text-gray-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                                <div>
                                    <p id="file-name" class="text-sm font-medium text-gray-900"></p>
                                    <p id="file-size" class="text-xs text-gray-500"></p>
                                </div>
                            </div>
                            <button type="button" id="remove-file" class="text-red-500 hover:text-red-700">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div>
                        <button type="submit" id="submit-assignment"
                            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-300 ease-in-out">
                            Submit Assignment
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection


@push('scripts')
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    @if (isset($submission->file_path))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const fileName = '{{ basename($submission->file_path) }}';
                const uploadZone = document.getElementById('upload-zone');
                const fileInfo = document.getElementById('file-info');
                const fileNameElement = document.getElementById('file-name');
                uploadZone.classList.add('hidden');
                fileInfo.classList.remove('hidden');
                fileNameElement.textContent = fileName;
            });
        </script>
    @endif
    <script>
        const fileUpload = document.getElementById('file-upload');
        const filePreview = document.getElementById('file-preview');
        const removeFile = document.getElementById('remove-file');

        const submitAssignment = document.getElementById('submit-assignment');

        fileUpload.addEventListener('change', handleFileSelect);
        removeFile.addEventListener('click', clearFile);

        submitButton.addEventListener('click', function() {
            document.getElementById('fileUploadSection').classList.toggle('hidden');
        });

        function handleFileSelect(event) {
            const file = event.target.files[0];
            if (file) {
                if (file.size > 10 * 1024 * 1024) { // 10MB limit
                    alert('File size exceeds 10MB limit');
                    clearFile();
                    return;
                }
                document.getElementById('upload-zone').classList.add('hidden');
                document.getElementById('file-info').classList.remove('hidden');
                document.getElementById('file-name').textContent = file.name;
                document.getElementById('file-size').textContent = `${(file.size / 1024 / 1024).toFixed(2)} MB`;
                submitButton.disabled = false;
            }
        }
        document.getElementById('remove-file').addEventListener('click', function() {
            // Clear the file input
            document.getElementById('file-upload').value = '';

            // Show upload zone again
            document.getElementById('upload-zone').classList.remove('hidden');
            document.getElementById('file-info').classList.add('hidden');
        });

        function clearFile() {
            fileUpload.value = '';
            filePreview.classList.add('hidden');
            submitButton.disabled = true;
        }

        function formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }

        // Drag and drop functionality
        const dropZone = document.querySelector('label[for="file-upload"]');

        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            dropZone.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, unhighlight, false);
        });

        function highlight(e) {
            dropZone.classList.add('border-blue-500', 'bg-blue-100');
        }

        function unhighlight(e) {
            dropZone.classList.remove('border-blue-500', 'bg-blue-100');
        }

        dropZone.addEventListener('drop', handleDrop, false);

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const file = dt.files[0];
            fileUpload.files = dt.files;
            handleFileSelect({
                target: {
                    files: [file]
                }
            });
        }
    </script>
@endpush

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

    <style>

    </style>
@endpush
