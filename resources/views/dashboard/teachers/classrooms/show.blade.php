@extends('layouts.app')
@section('content')
    <div class="min-h-screen bg-white py-8">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
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
                        <a href="{{ route('classrooms.index') }}"
                            class="flex items-center text-gray-600 hover:text-blue-600">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Kelas
                        </a>
                    </li>
                    <li>
                        <span class="flex items-center text-gray-400">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Detail Kelas
                        </span>
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
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Kelas
                            {{ $classroom->year_level }}-{{ $classroom->group_numbers }}</h2>
                        <p class="text-gray-500 text-sm">{{ $classroom->batch_name }} - Tahun Ajaran
                            {{ $classroom->academic_year }}</p>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <a href="{{ route('classrooms.index') }}"
                        class="inline-flex items-center px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                                clip-rule="evenodd" />
                        </svg>
                        Kembali
                    </a>
                </div>
            </div>

            <!-- Class Details -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-6 space-y-8">
                    <!-- Homeroom Teacher Section -->
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <img class="h-20 w-20 rounded-full object-cover"
                                src="{{ $classroom->teacher->user->image ?? 'https://ui-avatars.com/api/?name=' . urlencode($classroom->teacher->user->name) }}"
                                alt="{{ $classroom->teacher->user->name }}">
                        </div>
                        <div class="ml-6">
                            <h3 class="text-lg font-medium text-gray-900">Wali Kelas</h3>
                            <p class="text-xl font-semibold text-gray-900">{{ $classroom->teacher->user->name }}</p>
                            <p class="text-sm text-gray-500">{{ $classroom->teacher->user->email }}</p>
                            <div class="mt-2 flex items-center space-x-4">
                                <div class="flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                    <span class="text-gray-500 text-sm">{{ $classroom->teacher->subject->name }}</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                    <span
                                        class="text-gray-500 text-sm">{{ $classroom->teacher->user->phone_number }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Class Summary -->
                    <div class="border-t border-gray-200 pt-6">
                        <h3 class="text-lg font-bold text-gray-900">Ringkasan Kelas</h3>
                        <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                            <!-- Total Students -->
                            <div
                                class="bg-gradient-to-r from-blue-500 to-blue-600 text-white overflow-hidden shadow-lg rounded-lg transform hover:scale-105 transition duration-300">
                                <div class="p-6">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <svg class="h-8 w-8 text-white" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                            </svg>
                                        </div>
                                        <div class="ml-5">
                                            <dl>
                                                <dt class="text-sm font-medium">Total Siswa</dt>
                                                <dd class="text-2xl font-bold">{{ $classroomStudents->count() }}
                                                </dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Total Subjects -->
                            <div
                                class="bg-gradient-to-r from-green-500 to-green-600 text-white overflow-hidden shadow-lg rounded-lg transform hover:scale-105 transition duration-300">
                                <div class="p-6">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                        </div>
                                        <div class="ml-5">
                                            <dl>
                                                <dt class="text-sm font-medium"></dt>
                                                <dd class="text-2xl font-bold">
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Total Teaching Hours -->
                            <div
                                class="bg-gradient-to-r from-yellow-500 to-yellow-600 text-white overflow-hidden shadow-lg rounded-lg transform hover:scale-105 transition duration-300">
                                <div class="p-6">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                        </div>
                                        <div class="ml-5">
                                            <dl>
                                                <dt class="text-sm font-medium"></dt>
                                                <dd class="text-2xl font-bold">
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Active Students -->
                            <div
                                class="bg-gradient-to-r from-purple-500 to-purple-600 text-white overflow-hidden shadow-lg rounded-lg transform hover:scale-105 transition duration-300">
                                <div class="p-6">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                        </div>
                                        <div class="ml-5">
                                            <dl>
                                                <dt class="text-sm font-medium"></dt>
                                                <dd class="text-2xl font-bold">
                                                </dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Class Schedule -->
                    <div class="border-t border-gray-200 pt-6">
                        <h3 class="text-lg font-medium text-gray-900 flex justify-between items-center">
                            Jadwal Pelajaran
                        </h3>
                        <div class="mt-4">
                            <div class="overflow-x-auto">
                                @if ($classroomSubjects->isEmpty())
                                    <!-- Message for empty schedule -->
                                    <div class="bg-yellow-100 text-yellow-800 px-6 py-4 rounded-md">
                                        <p class="text-sm">
                                            Jadwal kosong untuk kelas ini. Silakan tambahkan mata pelajaran baru menggunakan
                                            tombol di atas.
                                        </p>
                                    </div>
                                @else
                                    <!-- Schedule Table -->
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-indigo-50">
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                                    Waktu
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                                    Mata Pelajaran
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                                    Guru
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                                    Status
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach ($classroomSubjects as $day => $daySchedules)
                                                <tr class="bg-gray-50">
                                                    <td colspan="6"
                                                        class="px-6 py-3 text-sm font-semibold text-gray-700">
                                                        {{ ucfirst($day) }}
                                                    </td>
                                                </tr>
                                                @foreach ($daySchedules->sortBy('start_time') as $schedule)
                                                    <tr class="hover:bg-gray-100">
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                            {{ \Carbon\Carbon::parse($schedule['start_time'])->format('H:i') }}
                                                            -
                                                            {{ \Carbon\Carbon::parse($schedule['end_time'])->format('H:i') }}
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                            {{ $schedule['subject']->name }}
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <div class="flex items-center">
                                                                <div class="flex-shrink-0 h-8 w-8">
                                                                    <img class="h-8 w-8 rounded-full"
                                                                        src="{{ $schedule['teacher']->user->image ?? 'https://ui-avatars.com/api/?name=' . urlencode($schedule['teacher']->user->name) }}"
                                                                        alt="{{ $schedule['teacher']->user->name }}">
                                                                </div>
                                                                <div class="ml-4">
                                                                    <div class="text-sm font-medium text-gray-900">
                                                                        {{ $schedule['teacher']->user->name }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <span
                                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                        {{ $schedule['status'] === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                                {{ $schedule['status'] === 'active' ? 'Aktif' : 'Tidak Aktif' }}
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>


                    <!-- Students List -->
                    <div class="border-t border-gray-200 pt-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-medium text-gray-900">Daftar Siswa</h3>
                            <div class="flex space-x-2 items-center">
                            </div>
                        </div>
                        <div class="mt-4 overflow-x-auto">
                            <!-- Empty State -->
                            @if ($classroomStudents->isEmpty())
                                <div id="emptyState" class="bg-yellow-100 text-yellow-800 px-6 py-4 rounded-md">
                                    <p class="text-sm">
                                        Belum ada siswa yang terdaftar di kelas ini. Silakan tambahkan siswa baru
                                        menggunakan tombol di atas.
                                    </p>
                                </div>
                            @else
                                <!-- Students Table -->
                                <table id="studentsTable" class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                No
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Siswa
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                NIS
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Jenis Kelamin
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Status
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="studentsBody" class="bg-white divide-y divide-gray-200">
                                        @foreach ($classroom->classroomStudents as $index => $classroomStudent)
                                            <tr data-status="{{ $classroomStudent->status }}">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    {{ $index + 1 }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="flex-shrink-0 h-10 w-10">
                                                            <img class="h-10 w-10 rounded-full"
                                                                src="{{ $classroomStudent->student->user->image ?? 'https://ui-avatars.com/api/?name=' . urlencode($classroomStudent->student->user->name) }}"
                                                                alt="{{ $classroomStudent->student->user->name }}">
                                                        </div>
                                                        <div class="ml-4">
                                                            <div class="text-sm font-medium text-gray-900">
                                                                {{ $classroomStudent->student->user->name }}
                                                            </div>
                                                            <div class="text-sm text-gray-500">
                                                                {{ $classroomStudent->student->user->email }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    {{ $classroomStudent->student->student_id_number }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    {{ $classroomStudent->student->user->gender }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                @switch($classroomStudent->status)
                                    @case('ongoing')
                                        bg-green-100 text-green-800
                                        @break
                                    @case('graduated')
                                        bg-blue-100 text-blue-800
                                        @break
                                    @case('not_graduated')
                                        bg-red-100 text-red-800
                                        @break
                                    @case('dropped_out')
                                        bg-yellow-100 text-yellow-800
                                        @break
                                    @default
                                        bg-gray-100 text-gray-800
                                @endswitch">
                                                        {{ ucfirst(str_replace('_', ' ', $classroomStudent->status)) }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection
