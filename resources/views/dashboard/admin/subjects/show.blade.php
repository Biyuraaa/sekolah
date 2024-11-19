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
                        <a href="{{ route('subjects.index') }}"
                            class="flex items-center text-gray-600 hover:text-green-600">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Mata Pelajaran
                        </a>
                    </li>
                    <li>
                        <span class="flex items-center text-gray-400">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Detail Mata Pelajaran
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
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-4xl font-extrabold text-gray-900">{{ $subject->name }}</h2>
                            <p class="text-gray-500 mt-1">Detail dan statistik mata pelajaran</p>
                        </div>
                    </div>
                    <div class="flex space-x-3">
                        <a href="{{ route('subjects.edit', $subject->id) }}"
                            class="btn-secondary transition hover:bg-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </svg>
                            Edit
                        </a>
                        <a href="{{ route('subjects.index') }}"
                            class="btn-primary transition hover:bg-green-700">Kembali</a>
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
                                    <dt class="text-sm font-medium text-gray-500">Kode Mata Pelajaran</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $subject->code ?? '-' }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Jumlah SKS</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $subject->credit_hours }} SKS</dd>
                                </div>
                                <div class="sm:col-span-2">
                                    <dt class="text-sm font-medium text-gray-500">Deskripsi</dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                        {{ $subject->description ?? 'Tidak ada deskripsi' }}</dd>
                                </div>
                            </dl>
                        </div>
                    </div>

                    <!-- Class Schedule -->
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                            <h3 class="text-lg font-medium text-gray-900">Jadwal Kelas</h3>
                        </div>
                        <div class="p-6">
                            {{-- @if ($subject->schedules->count() > 0)
                                <ul class="divide-y divide-gray-200">
                                    @foreach ($subject->schedules as $schedule)
                                        <li class="py-4 flex items-center justify-between">
                                            <div>
                                                <p class="text-sm font-medium text-gray-900">{{ $schedule->day_name }}</p>
                                                <p class="text-sm text-gray-500">{{ $schedule->start_time }} -
                                                    {{ $schedule->end_time }}</p>
                                            </div>
                                            <p class="text-sm text-gray-500">{{ $schedule->room }}</p>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-gray-500">Belum ada jadwal yang ditentukan.</p>
                            @endif --}}
                        </div>
                    </div>

                    <!-- Student List -->
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                            <h3 class="text-lg font-medium text-gray-900">Daftar Siswa</h3>
                        </div>
                        <div class="p-6">
                            {{-- @if ($subject->students->count() > 0)
                                <ul class="divide-y divide-gray-200">
                                    @foreach ($subject->students as $student)
                                        <li class="py-4 flex items-center">
                                            <img class="h-10 w-10 rounded-full mr-4" src="{{ $student->avatar_url }}"
                                                alt="{{ $student->name }}">
                                            <div>
                                                <p class="text-sm font-medium text-gray-900">{{ $student->name }}</p>
                                                <p class="text-sm text-gray-500">{{ $student->student_id }}</p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-gray-500">Belum ada siswa yang terdaftar.</p>
                            @endif --}}
                        </div>
                    </div>
                </div>

                <!-- Sidebar Content -->
                <div class="col-span-12 lg:col-span-4 space-y-6">
                    <!-- Teacher Information -->
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                            <h3 class="text-lg font-medium text-gray-900">Informasi Pengajar</h3>
                        </div>
                        <div class="p-6">
                            @if ($subject->teachers)
                                @foreach ($subject->teachers as $teacher)
                                    <div class="flex items-center space-x-4">
                                        <img class="h-12 w-12 rounded-full" src="{{ $teacher->user->image }}"
                                            alt="{{ $teacher->user->name }}">
                                        <div>
                                            <h4 class="text-lg font-medium text-gray-900">
                                                {{ $teacher->user->name }}
                                            </h4>
                                            <p class="text-sm text-gray-500">{{ $teacher->user->email }}</p>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <a href="{{ route('teachers.show', $teacher->user->id) }}"
                                            class="text-green-600 hover:text-green-700 font-medium">Lihat profil lengkap</a>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-gray-500">Belum ada pengajar yang ditugaskan.</p>
                            @endif
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                            <h3 class="text-lg font-medium text-gray-900">Statistik Cepat</h3>
                        </div>
                        <div class="p-6">
                            <dl class="grid grid-cols-1 gap-x-4 gap-y-6">
                                <div class="flex justify-between items-center">
                                    <dt class="text-sm font-medium text-gray-500">Total Siswa</dt>
                                    {{-- <dd class="text-sm font-semibold text-gray-900">{{ $subject->students->count() }}</dd> --}}
                                </div>
                                <div class="flex justify-between items-center">
                                    <dt class="text-sm font-medium text-gray-500">Rata-rata Nilai</dt>
                                    <dd class="text-sm font-semibold text-gray-900">
                                        {{-- {{ number_format($subject->students->avg('pivot.grade'), 2) }}</dd> --}}
                                </div>
                                <div class="flex justify-between items-center">
                                    <dt class="text-sm font-medium text-gray-500">Tingkat Kelulusan</dt>
                                    <dd class="text-sm font-semibold text-gray-900">
                                        {{-- {{ number_format(($subject->students->where('pivot.grade', '>=', 60)->count() / $subject->students->count()) * 100, 2) }}% --}}
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
                            {{-- @if ($recentActivities && $recentActivities->count() > 0)
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
                            @endif --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // You can add charts here if needed
    </script>
@endpush
