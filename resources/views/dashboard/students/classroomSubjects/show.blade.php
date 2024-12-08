@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Enhanced Breadcrumbs -->
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
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span
                                class="text-gray-500 ml-1 md:ml-2">{{ $classroomSubject->subject->name ?? 'Detail Jadwal Pelajaran' }}</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Enhanced Header Section -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-8">
                <div class="bg-gradient-to-r from-blue-600 to-blue-700 p-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="bg-white p-3 rounded-lg shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                            <div>
                                <h1 class="text-2xl font-bold text-white">
                                    {{ $classroomSubject->subject->name ?? 'Nama Mata Pelajaran' }}</h1>
                                <p class="text-sm text-white">
                                    {{ $classroomSubject->classroom->year_level . '-' . $classroomSubject->classroom->group_numbers ?? 'Nama Kelas' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Weeks Section -->
            <div class="bg-white/80 backdrop-blur-sm rounded-xl border border-gray-200 shadow-lg mt-8 overflow-hidden">
                <div class="px-6 py-5 bg-gradient-to-r from-green-50 to-green-100 border-b border-gray-200">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center space-x-4">
                            <div class="bg-green-600 p-3 rounded-xl shadow-md">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-3xl font-bold text-gray-800">Course Weeks</h2>
                                <p class="text-gray-600 text-sm">Comprehensive overview of course progression</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    @if ($weeks->isEmpty())
                        <div
                            class="bg-gray-50 rounded-xl border-2 border-dashed border-gray-300 text-center p-10 transition-all duration-300 hover:border-green-400">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="w-28 h-28 text-gray-400 mb-5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                                <h3 class="text-2xl font-semibold text-gray-700 mb-3">No Weeks Scheduled</h3>
                                <p class="text-gray-500 max-w-md mx-auto mb-6">
                                    Your course journey begins here. Start by creating your first week to outline the
                                    learning path.
                                </p>
                            </div>
                        </div>
                    @else
                        <div class="space-y-5">
                            @foreach ($weeks as $week)
                                <div
                                    class="bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md transition-all duration-300 ease-in-out overflow-hidden group">
                                    <div class="week-header cursor-pointer flex items-center justify-between p-5 bg-gray-50 hover:bg-gray-100 transition-colors"
                                        data-week-id="{{ $week->id }}">
                                        <div class="flex items-center space-x-4">
                                            <div
                                                class="bg-blue-100 text-blue-700 px-4 py-2 rounded-lg font-bold tracking-wide">
                                                Week {{ $week->week_number }}
                                            </div>
                                            <h4
                                                class="text-xl font-semibold text-gray-800 group-hover:text-blue-600 transition-colors">
                                                {{ $week->title }}
                                            </h4>
                                        </div>
                                        <svg class="h-6 w-6 text-gray-500 transform transition-transform duration-300 week-arrow"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                    <div class="hidden week-content" id="week-{{ $week->id }}">
                                        <div class="p-6 pt-0">
                                            <div class="border-t border-gray-200 pt-6 space-y-6">
                                                <!-- Learning Materials Section -->
                                                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                                                    <div
                                                        class="px-6 py-5 bg-gradient-to-r from-blue-50 to-blue-100 border-b border-blue-200 flex justify-between items-center">
                                                        <h5 class="text-2xl font-bold text-gray-800 flex items-center">
                                                            <svg class="w-8 h-8 mr-4 text-blue-600" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                                </path>
                                                            </svg>
                                                            Learning Materials
                                                        </h5>
                                                    </div>

                                                    <div class="p-6">
                                                        @if ($week->materials->isNotEmpty())
                                                            <ul class="space-y-4">
                                                                @foreach ($week->materials as $material)
                                                                    <li
                                                                        class="bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md transition-all duration-300 ease-in-out overflow-hidden">
                                                                        <div class="p-6">
                                                                            <div class="flex items-start justify-between">
                                                                                <div class="flex-1">
                                                                                    <div
                                                                                        class="flex items-center space-x-4 mb-4">
                                                                                        <div
                                                                                            class="bg-blue-100 p-3 rounded-full">
                                                                                            <svg class="w-6 h-6 text-blue-600"
                                                                                                fill="none"
                                                                                                stroke="currentColor"
                                                                                                viewBox="0 0 24 24">
                                                                                                <path
                                                                                                    stroke-linecap="round"
                                                                                                    stroke-linejoin="round"
                                                                                                    stroke-width="2"
                                                                                                    d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0013.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                                                                            </svg>
                                                                                        </div>
                                                                                        <h4
                                                                                            class="text-xl font-semibold text-gray-800 leading-tight">
                                                                                            {{ $material->title }}
                                                                                        </h4>
                                                                                    </div>
                                                                                    <hr class="my-3 border-gray-200">


                                                                                    <p
                                                                                        class="text-sm text-gray-600 leading-relaxed mb-4">
                                                                                        {{ Str::limit($material->description, 150) }}
                                                                                    </p>
                                                                                </div>

                                                                                @if ($material->file_path)
                                                                                    <div class="ml-4">
                                                                                        <a href="{{ asset('storage/files/materials/' . $material->file_path) }}"
                                                                                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300">
                                                                                            <svg class="w-5 h-5 mr-2"
                                                                                                fill="none"
                                                                                                stroke="currentColor"
                                                                                                viewBox="0 0 24 24">
                                                                                                <path
                                                                                                    stroke-linecap="round"
                                                                                                    stroke-linejoin="round"
                                                                                                    stroke-width="2"
                                                                                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                                                                            </svg>
                                                                                            Download
                                                                                        </a>
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                        </div>

                                                                        <div
                                                                            class="bg-gray-50 px-6 py-3 flex justify-between items-center border-t border-gray-200">
                                                                            <div class="text-sm text-gray-500">
                                                                                Uploaded
                                                                                {{ $material->created_at->diffForHumans() }}
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @else
                                                            <div
                                                                class="text-center py-12 bg-gray-50 rounded-xl border border-gray-200">
                                                                <svg class="mx-auto h-16 w-16 text-gray-400"
                                                                    fill="none" viewBox="0 0 24 24"
                                                                    stroke="currentColor">
                                                                    <path vector-effect="non-scaling-stroke"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                                                </svg>
                                                                <h3 class="mt-4 text-lg font-semibold text-gray-900">No
                                                                    Learning Materials</h3>
                                                                <p class="mt-2 text-sm text-gray-600">

                                                                </p>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <!-- Assignments Section -->
                                                <div
                                                    class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                                                    <!-- Header -->
                                                    <div
                                                        class="px-6 py-4 bg-gradient-to-r from-green-50 to-green-100 border-b border-green-200 flex justify-between items-center">
                                                        <h5 class="text-xl font-bold text-gray-800 flex items-center">
                                                            <svg class="w-7 h-7 mr-3 text-green-600 transform rotate-6"
                                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                            </svg>
                                                            <span class="tracking-wide">Assignments</span>
                                                        </h5>
                                                    </div>

                                                    <!-- Content -->
                                                    <div class="p-6">
                                                        @if ($week->tasks->isNotEmpty())
                                                            <ul class="space-y-4">
                                                                @foreach ($week->tasks as $task)
                                                                    <li
                                                                        class="bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                                                                        <a href="{{ route('classroomSubjects.tasks.assign', [$classroomSubject, $task]) }}"
                                                                            class="block p-4 hover:text-blue-600">
                                                                            <div class="flex items-center justify-between">
                                                                                <div class="flex-1">
                                                                                    <!-- Task Title and Due Date -->
                                                                                    <div
                                                                                        class="flex items-center space-x-3">
                                                                                        <div class="flex-shrink-0">
                                                                                            <span
                                                                                                class="flex h-8 w-8 items-center justify-center rounded-full bg-green-100">
                                                                                                <svg class="w-5 h-5 text-green-600"
                                                                                                    fill="none"
                                                                                                    stroke="currentColor"
                                                                                                    viewBox="0 0 24 24">
                                                                                                    <path
                                                                                                        stroke-linecap="round"
                                                                                                        stroke-linejoin="round"
                                                                                                        stroke-width="2"
                                                                                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                                                </svg>
                                                                                            </span>
                                                                                        </div>
                                                                                        <div>
                                                                                            <h4
                                                                                                class="text-lg font-semibold text-gray-900 group-hover:text-blue-600">
                                                                                                {{ $task->title }}
                                                                                            </h4>
                                                                                            <p
                                                                                                class="text-sm text-gray-600">
                                                                                                <svg class="inline w-4 h-4 mr-1 text-gray-500"
                                                                                                    fill="none"
                                                                                                    stroke="currentColor"
                                                                                                    viewBox="0 0 24 24">
                                                                                                    <path
                                                                                                        stroke-linecap="round"
                                                                                                        stroke-linejoin="round"
                                                                                                        stroke-width="2"
                                                                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                                                                </svg>
                                                                                                Due:
                                                                                                {{ \Carbon\Carbon::parse($task->due_date)->format('M d, Y') }}
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @else
                                                            <div class="text-center py-12">
                                                                <div
                                                                    class="mx-auto h-24 w-24 bg-gray-50 rounded-full flex items-center justify-center">
                                                                    <svg class="h-12 w-12 text-gray-400" fill="none"
                                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path vector-effect="non-scaling-stroke"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            stroke-width="2"
                                                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                                                    </svg>
                                                                </div>
                                                                <h3 class="mt-4 text-lg font-medium text-gray-900">No
                                                                    assignments yet</h3>
                                                                <p class="mt-2 text-sm text-gray-500 max-w-sm mx-auto">Get
                                                                    started by creating your first assignment for this week.
                                                                </p>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle week content
            const weekHeaders = document.querySelectorAll('.week-header');
            weekHeaders.forEach(header => {
                header.addEventListener('click', function() {
                    const weekId = this.dataset.weekId;
                    const content = document.getElementById(`week-${weekId}`);
                    const arrow = this.querySelector('svg');

                    content.classList.toggle('hidden');
                    arrow.classList.toggle('rotate-180');
                });
            });

            // Modal functionality
            const modal = document.getElementById('createWeekModal');
            const openModalButton = document.getElementById('openCreateWeekModal');
            const closeModalButton = document.getElementById('closeCreateWeekModal');
            const cancelButton = document.getElementById('cancelCreateWeek');
            const form = document.getElementById('createWeekForm');

            function openModal() {
                modal.classList.remove('hidden');
                const modalContainer = modal.querySelector('.modal-container');
                setTimeout(() => {
                    modalContainer.classList.add('show');
                    modal.querySelector('input').focus();
                }, 50);
            }

            function closeModal() {
                const modalContainer = modal.querySelector('.modal-container');
                modalContainer.classList.remove('show');
                setTimeout(() => {
                    modal.classList.add('hidden');
                    form.reset();
                }, 200); // Sesuaikan dengan waktu transisi di CSS
            }

            openModalButton.addEventListener('click', openModal);
            closeModalButton.addEventListener('click', closeModal);
            cancelButton.addEventListener('click', closeModal);

            modal.addEventListener('click', (e) => {
                if (!e.target.closest('.modal-container')) {
                    closeModal();
                }
            });

            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                    closeModal();
                }
            });

            // Form validation (optional)
            form.addEventListener('submit', (e) => {
                const weekNumber = document.getElementById('week_number').value;
                const title = document.getElementById('title').value;

                if (!weekNumber || !title) {
                    e.preventDefault();
                    alert('Please fill out all fields.');
                }
            });
        });
    </script>
@endpush

@push('styles')
    <style>
        .modal-container {
            transform: scale(0.9);
            opacity: 0;
            transition: transform 0.2s ease, opacity 0.2s ease;
        }

        .modal-container.show {
            transform: scale(1);
            opacity: 1;
        }
    </style>
@endpush
