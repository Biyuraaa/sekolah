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
                                                <dd class="text-2xl font-bold">{{ $classroom->classroomStudents->count() }}
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
                                            <svg class="h-8 w-8 text-white" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                            </svg>
                                        </div>
                                        <div class="ml-5">
                                            <dl>
                                                <dt class="text-sm font-medium">Total Mata Pelajaran</dt>
                                                <dd class="text-2xl font-bold">
                                                    {{ $classroom->classroomSubjects->count() }}</dd>
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
                                            <svg class="h-8 w-8 text-white" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <div class="ml-5">
                                            <dl>
                                                <dt class="text-sm font-medium">Total Jam Pelajaran</dt>
                                                <dd class="text-2xl font-bold">
                                                    {{ $classroom->classroomSubjects->sum('credit') }} Jam</dd>
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
                                            <svg class="h-8 w-8 text-white" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <div class="ml-5">
                                            <dl>
                                                <dt class="text-sm font-medium">Siswa Aktif</dt>
                                                <dd class="text-2xl font-bold">
                                                    {{ $classroom->classroomStudents->where('status', 'ongoing')->count() }}
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
                            <a href="{{ route('classrooms.schedules.create', $classroom->id) }}"
                                class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Tambah Mata Pelajaran
                            </a>
                        </h3>
                        <div class="mt-4">
                            <div class="overflow-x-auto">
                                @if ($classroom->classroomSubjects->isEmpty())
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
                                                <th scope="col"
                                                    class="px-6 py-3 text-right text-xs font-medium text-gray-600 uppercase tracking-wider">
                                                    Aksi
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach ($classroom->classroomSubjects->sortBy('day')->groupBy('day') as $day => $schedules)
                                                <tr class="bg-gray-50">
                                                    <td colspan="6"
                                                        class="px-6 py-3 text-sm font-semibold text-gray-700">
                                                        {{ ucfirst($day) }}
                                                    </td>
                                                </tr>
                                                @foreach ($schedules->sortBy('start_time') as $schedule)
                                                    <tr class="hover:bg-gray-100">
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                            {{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i') }}
                                                            -
                                                            {{ \Carbon\Carbon::parse($schedule->end_time)->format('H:i') }}
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                            {{ $schedule->subject->name }}
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <div class="flex items-center">
                                                                <div class="flex-shrink-0 h-8 w-8">
                                                                    <img class="h-8 w-8 rounded-full"
                                                                        src="{{ $schedule->teacher->user->image ?? 'https://ui-avatars.com/api/?name=' . urlencode($schedule->teacher->user->name) }}"
                                                                        alt="{{ $schedule->teacher->user->name }}">
                                                                </div>
                                                                <div class="ml-4">
                                                                    <div class="text-sm font-medium text-gray-900">
                                                                        {{ $schedule->teacher->user->name }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <span
                                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $schedule->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                                {{ $schedule->status === 'active' ? 'Aktif' : 'Tidak Aktif' }}
                                                            </span>
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                            <!-- Tombol Lihat -->
                                                            <a href="{{ route('classrooms.schedules.show', ['classroom' => $classroom->id, 'classroomSubject' => $schedule]) }}"
                                                                class="inline-flex items-center px-3 py-1.5 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="h-4 w-4 mr-2" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M15 12H9m0 0H4m5 0v9m0-9V3m6 6h9m-9 0V3m0 9v9m6-9H9" />
                                                                </svg>
                                                                Lihat
                                                            </a>

                                                            <!-- Tombol Edit -->
                                                            <a href="{{ route('classrooms.schedules.edit', ['classroom' => $classroom->id, 'classroomSubject' => $schedule]) }}"
                                                                class="inline-flex items-center px-3 py-1.5 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="h-4 w-4 mr-2" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M11 17a4 4 0 01-2-7.464A4 4 0 0112 8a4 4 0 011 7.936v1.525M16.938 14.938A9 9 0 1110 6.062M13.512 17.512l2.988 2.988M16.5 19.5l1.5-1.5" />
                                                                </svg>
                                                                Edit
                                                            </a>

                                                            <!-- Tombol Hapus -->
                                                            <a href="{{ route('classrooms.schedules.delete', ['classroom' => $classroom->id, 'classroomSubject' => $schedule->id]) }}"
                                                                class="inline-flex items-center px-3 py-1.5 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="h-4 w-4 mr-2" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                                </svg>
                                                                Hapus
                                                            </a>
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
                                <!-- Button for Adding New Student -->
                                <a href="{{ route('classrooms.students.create', ['classroom' => $classroom]) }}"
                                    class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-200 active:bg-blue-700">
                                    Tambah Siswa
                                </a>
                                <!-- Status Filter -->
                                <select id="statusFilter"
                                    class="rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    <option value="all">Semua Status</option>
                                    <option value="ongoing">Aktif</option>
                                    <option value="graduated">Lulus</option>
                                    <option value="not_graduated">Tidak Lulus</option>
                                    <option value="dropped_out">Keluar</option>
                                    <option value="inactive">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-4 overflow-x-auto">
                            <!-- Empty State -->
                            @if ($classroom->classroomStudents->isEmpty())
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
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Aksi
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
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 flex space-x-2">
                                                    <!-- Action Buttons -->
                                                    <a href="{{ route('students.edit', $classroomStudent->student->id) }}"
                                                        class="text-green-600 hover:text-green-900">Edit</a>
                                                    <form method="POST"
                                                        action="{{ route('students.destroy', $classroomStudent->student->id) }}"
                                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus siswa ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="text-red-600 hover:text-red-900">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>


                    <!-- Subject Teachers -->
                    <div class="border-t border-gray-200 pt-6">
                        <h3 class="text-lg font-medium text-gray-900">Guru Mata Pelajaran</h3>
                        <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach ($classroom->classroomSubjects->unique('teacher_id') as $subject)
                                <div class="bg-white overflow-hidden shadow rounded-lg">
                                    <div class="px-4 py-5 sm:p-6">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-12 w-12">
                                                <img class="h-12 w-12 rounded-full"
                                                    src="{{ $subject->teacher->user->image ?? 'https://ui-avatars.com/api/?name=' . urlencode($subject->teacher->user->name) }}"
                                                    alt="{{ $subject->teacher->user->name }}">
                                            </div>
                                            <div class="ml-4">
                                                <h4 class="text-lg font-medium text-gray-900">
                                                    {{ $subject->teacher->user->name }}
                                                </h4>
                                                <p class="text-sm text-gray-500">{{ $subject->subject->name }}</p>
                                                <div class="mt-1 flex items-center">
                                                    @if ($subject->teacher->is_certified)
                                                        <span
                                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                            Tersertifikasi
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.getElementById('statusFilter').addEventListener('change', function() {
                const selectedStatus = this.value;
                const rows = document.querySelectorAll('#studentsBody tr');
                let visibleRows = 0;

                rows.forEach(row => {
                    if (selectedStatus === 'all' || row.dataset.status === selectedStatus) {
                        row.style.display = '';
                        visibleRows++;
                    } else {
                        row.style.display = 'none';
                    }
                });

                document.getElementById('emptyState').classList.toggle('hidden', visibleRows > 0);
            });
        </script>
    @endpush
@endsection
