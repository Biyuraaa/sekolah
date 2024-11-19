@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumb -->
            <nav class="flex mb-8" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li>
                        <a href="{{ route('dashboard') }}" class="flex items-center text-gray-600 hover:text-green-600">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                </path>
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('students.index') }}"
                            class="flex items-center text-gray-600 hover:text-green-600">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Siswa
                        </a>
                    </li>
                    <li>
                        <span class="flex items-center text-gray-400">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Detail Siswa
                        </span>
                    </li>
                </ol>
            </nav>

            <!-- Header Section -->
            <div class="mb-8">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <div class="bg-gradient-to-r from-green-500 to-green-600 p-3 rounded-xl shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-4xl font-extrabold text-gray-900">{{ $student->user->name }}</h2>
                            <p class="text-gray-500 mt-1">Detail dan informasi siswa</p>
                        </div>
                    </div>
                    <div class="flex space-x-3">
                        <!-- Edit Button -->
                        <a href="{{ route('students.edit', $student->id) }}"
                            class="flex items-center bg-blue-500 text-white font-semibold px-4 py-2 rounded-lg shadow-md hover:bg-blue-600 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </svg>
                            Edit
                        </a>

                        <!-- Back Button -->
                        <a href="{{ route('students.index') }}"
                            class="flex items-center bg-green-500 text-white font-semibold px-4 py-2 rounded-lg shadow-md hover:bg-green-600 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path d="M10 19l-7-7 7-7v14z"></path>
                            </svg>
                            Kembali
                        </a>
                    </div>
                </div>
            </div>


            <!-- Content Grid -->
            <div class="grid grid-cols-12 gap-6">
                <!-- Main Content -->
                <div class="col-span-12 lg:col-span-8 space-y-6">
                    <!-- Basic Information Card -->
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                            <h3 class="text-lg font-medium text-gray-900">Informasi Dasar</h3>
                        </div>
                        <div class="p-6">
                            <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">NIS</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $student->student_id }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Kelas</dt>
                                    @php
                                        if ($student->classroomStudents->where('status', 'ongoing')->first()) {
                                            $classroom = $student->classroomStudents
                                                ->where('status', 'ongoing')
                                                ->first()->classroom;
                                            $class = $classroom->year_level . '-' . $classroom->group_numbers;
                                        } else {
                                            $class = '-';
                                        }
                                    @endphp
                                    <dd class="mt-1 text-sm text-gray-900">
                                        {{ $class }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Email</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $student->user->email }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Nomor Telepon</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $student->user->phone_number ?? '-' }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Jenis Kelamin</dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                        {{ $student->user->gender == 'male' ? 'Laki-laki' : 'Perempuan' }}</dd>
                                </div>
                                <div class="sm:col-span-2">
                                    <dt class="text-sm font-medium text-gray-500">Alamat</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $student->user->address ?? '-' }}</dd>
                                </div>

                            </dl>
                        </div>
                    </div>

                    <!-- Academic Progress -->
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                            <h3 class="text-lg font-medium text-gray-900">Progres Akademik</h3>
                        </div>
                        <div class="p-6">
                            @if ($student->subjects && $student->subjects->count() > 0)
                                <div class="space-y-4">
                                    @foreach ($student->subjects as $subject)
                                        <div class="border-b border-gray-200 pb-4">
                                            <div class="flex justify-between items-center mb-2">
                                                <h4 class="text-sm font-medium text-gray-900">{{ $subject->name }}</h4>
                                                <span
                                                    class="text-sm font-semibold {{ $subject->pivot->grade >= 60 ? 'text-green-600' : 'text-red-600' }}">
                                                    Nilai: {{ $subject->pivot->grade }}
                                                </span>
                                            </div>
                                            <div class="w-full bg-gray-200 rounded-full h-2">
                                                <div class="bg-green-600 h-2 rounded-full"
                                                    style="width: {{ $subject->pivot->grade }}%"></div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-gray-500">Belum ada data akademik.</p>
                            @endif
                        </div>
                    </div>

                    <!-- Attendance Record -->
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                            <h3 class="text-lg font-medium text-gray-900">Catatan Kehadiran</h3>
                        </div>
                        <div class="p-6">
                            @if ($student->attendances && $student->attendances->count() > 0)
                                <div class="space-y-4">
                                    @foreach ($student->attendances->take(5) as $attendance)
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <p class="text-sm font-medium text-gray-900">
                                                    {{ $attendance->subject->name }}</p>
                                                <p class="text-sm text-gray-500">{{ $attendance->date->format('d M Y') }}
                                                </p>
                                            </div>
                                            <span
                                                class="px-3 py-1 text-xs font-medium rounded-full 
                                                {{ $attendance->status === 'present'
                                                    ? 'bg-green-100 text-green-800'
                                                    : ($attendance->status === 'absent'
                                                        ? 'bg-red-100 text-red-800'
                                                        : 'bg-yellow-100 text-yellow-800') }}">
                                                {{ ucfirst($attendance->status) }}
                                            </span>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-gray-500">Belum ada catatan kehadiran.</p>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Sidebar Content -->
                <div class="col-span-12 lg:col-span-4 space-y-6">
                    <!-- Quick Stats -->
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                            <h3 class="text-lg font-medium text-gray-900">Statistik Cepat</h3>
                        </div>
                        <div class="p-6">
                            <dl class="grid grid-cols-1 gap-x-4 gap-y-6">
                                <div class="flex justify-between items-center">
                                    <dt class="text-sm font-medium text-gray-500">Rata-rata Nilai</dt>
                                    <dd class="text-sm font-semibold text-gray-900">
                                        {{-- {{ number_format($student->subjects->avg('pivot.grade'), 2) }} --}}
                                    </dd>
                                </div>
                                <div class="flex justify-between items-center">
                                    <dt class="text-sm font-medium text-gray-500">Total Mata Pelajaran</dt>
                                    {{-- <dd class="text-sm font-semibold text-gray-900">{{ $student->subjects->count() }}</dd> --}}
                                </div>
                                <div class="flex justify-between items-center">
                                    <dt class="text-sm font-medium text-gray-500">Tingkat Kehadiran</dt>
                                    <dd class="text-sm font-semibold text-gray-900">
                                        {{-- {{ number_format(
                                            ($student->attendances->where('status', 'present')->count() / max($student->attendances->count(), 1)) * 100,
                                            2,
                                        ) }}% --}}
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>

                    <!-- Recent Activities -->
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                            <h3 class="text-lg font-medium text-gray-900">Aktivitas Terbaru</h3>
                        </div>
                        <div class="p-6">
                            @if (isset($recentActivities) && $recentActivities->count() > 0)
                                <ul class="divide-y divide-gray-200">
                                    @foreach ($recentActivities as $activity)
                                        <li class="py-4">
                                            <div class="flex space-x-3">
                                                <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                                </svg>
                                                <div class="flex-1 space-y-1">
                                                    <div class="flex items-center justify-between">
                                                        <h3 class="text-sm font-medium">{{ $activity->title }}</h3>
                                                        <p class="text-sm text-gray-500">
                                                            {{ $activity->created_at->diffForHumans() }}</p>
                                                    </div>
                                                    <p class="text-sm text-gray-500">{{ $activity->description }}</p>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-gray-500">Belum ada aktivitas terbaru.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
