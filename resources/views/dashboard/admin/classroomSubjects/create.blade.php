@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-white py-12">
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
                            <a href="{{ route('classroom-subjects.index') }}"
                                class="text-gray-700 hover:text-green-600 ml-1 md:ml-2">Jadwal Pelajaran</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-500 ml-1 md:ml-2">Tambah Baru</span>
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
                                d="M9 12h6m-3 3v-6m3-6a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900">Tambah Jadwal Pelajaran</h2>
                        <p class="text-gray-600 mt-1">Lengkapi informasi untuk menambahkan jadwal pelajaran baru</p>
                    </div>
                </div>
            </div>

            <!-- Form Section -->
            <div class="bg-white rounded-xl shadow-xl overflow-hidden transition-all duration-200 hover:shadow-2xl">
                <form action="{{ route('classroom-subjects.store') }}" method="POST" class="p-8">
                    @csrf
                    <div class="space-y-8">
                        <!-- Schedule Information -->
                        <div class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <!-- Classroom -->
                                <div class="space-y-2">
                                    <label for="classroom_id" class="block text-sm font-medium text-gray-700">Kelas</label>
                                    <select name="classroom_id" id="classroom_id" class="block w-full rounded-md">
                                        <option value="">Pilih Kelas</option>
                                        @foreach ($classrooms as $classroom)
                                            <option value="{{ $classroom->id }}">
                                                {{ $classroom->year_level . '-' . $classroom->group_numbers }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Subject -->
                                <div class="space-y-2">
                                    <label for="subject_id" class="block text-sm font-medium text-gray-700">Mata
                                        Pelajaran</label>
                                    <select name="subject_id" id="subject_id" class="block w-full rounded-md">
                                        <option value="">Pilih Mata Pelajaran</option>
                                        @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <!-- Teacher -->
                                <div class="space-y-2">
                                    <label for="teacher_id" class="block text-sm font-medium text-gray-700">Guru</label>
                                    <select name="teacher_id" id="teacher_id" class="block w-full rounded-md" disabled>
                                        <option value="">Pilih Guru</option>
                                    </select>
                                </div>
                                <!-- Status -->
                                <div class="space-y-2">
                                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                    <select name="status" id="status" class="block w-full rounded-md">
                                        <option value="">Pilih Status</option>
                                        <option value="active">Aktif</option>
                                        <option value="inactive">Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <!-- Day -->
                                <div class="space-y-2">
                                    <label for="day" class="block text-sm font-medium text-gray-700">Hari</label>
                                    <select name="day" id="day" class="block w-full rounded-md">
                                        <option value="">Pilih Hari</option>
                                        <option value="monday">Senin</option>
                                        <option value="tuesday">Selasa</option>
                                        <option value="wednesday">Rabu</option>
                                        <option value="thursday">Kamis</option>
                                        <option value="friday">Jumat</option>
                                    </select>
                                </div>
                                <!-- Credit -->
                                <div class="space-y-2">
                                    <label for="credit" class="block text-sm font-medium text-gray-700">SKS</label>
                                    <input type="number" name="credit" id="credit" class="block w-full rounded-md">
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <!-- Start Time -->
                                <div class="space-y-2">
                                    <label for="start_time" class="block text-sm font-medium text-gray-700">Jam
                                        Mulai</label>
                                    <input type="time" name="start_time" id="start_time"
                                        class="block w-full rounded-md">
                                </div>
                                <!-- End Time -->
                                <div class="space-y-2">
                                    <label for="end_time" class="block text-sm font-medium text-gray-700">Jam
                                        Selesai</label>
                                    <input type="time" name="end_time" id="end_time"
                                        class="block w-full rounded-md">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-8">
                        <button type="submit"
                            class="px-6 py-3 bg-green-500 hover:bg-green-600 text-white font-semibold rounded-lg shadow-md">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            document.getElementById('subject_id').addEventListener('change', async function() {
                const subjectId = this.value;
                const teacherSelect = document.getElementById('teacher_id');

                // Disable teacher select until options are loaded
                teacherSelect.disabled = true;
                teacherSelect.innerHTML = '<option value="">Memuat...</option>';

                if (subjectId) {
                    try {
                        const response = await fetch(
                            `/dashboard/classroomSubjects/getTeachers?subject_id=${subjectId}`);

                        // Check if the response is OK (status 200-299)
                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }

                        const data = await response.json();

                        // Populate teacher options
                        teacherSelect.innerHTML = '<option value="">Pilih Guru</option>';
                        data.forEach(teacher => {
                            const option = document.createElement('option');
                            option.value = teacher.id;
                            option.textContent = teacher.name;
                            teacherSelect.appendChild(option);
                        });

                        teacherSelect.disabled = false; // Re-enable the select
                    } catch (error) {
                        console.error('There has been a problem with your fetch operation:', error);
                        teacherSelect.innerHTML = '<option value="">Gagal Memuat Data</option>';
                    }
                } else {
                    // Reset teacher select if no subject is selected
                    teacherSelect.innerHTML = '<option value="">Pilih Guru</option>';
                    teacherSelect.disabled = true;
                }
            });
        </script>
    @endpush
@endsection
