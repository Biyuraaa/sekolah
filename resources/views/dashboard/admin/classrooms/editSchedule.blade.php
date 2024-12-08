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
                            <a href="{{ route('classrooms.index') }}"
                                class="text-gray-700 hover:text-green-600 ml-1 md:ml-2">Kelas</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <a href="{{ route('classrooms.show', $classroomId) }}"
                                class="text-gray-700 hover:text-green-600 ml-1 md:ml-2">Detail Kelas</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-500 ml-1 md:ml-2">Edit Jadwal Pelajaran</span>
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
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900">Edit Jadwal Pelajaran</h2>
                        <p class="text-gray-600 mt-1">Perbarui informasi jadwal pelajaran</p>
                    </div>
                </div>
            </div>

            <!-- Form Section -->
            <div class="bg-white rounded-xl shadow-xl overflow-hidden transition-all duration-200 hover:shadow-2xl">
                <form
                    action="{{ route('classrooms.schedules.update', ['classroom' => $classroomId, 'classroomSubject' => $classroomSubject, 'classroomSubjectDay' => $classroomSubjectDay]) }}"
                    method="POST" class="p-8">
                    @csrf
                    @method('PUT')
                    <div class="space-y-8">
                        <!-- Schedule Information -->
                        <div class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <input type="hidden" value="{{ $classroomId }}" name="classroom_id">
                                <!-- Subject -->
                                <div class="space-y-2">
                                    <label for="subject_id" class="block text-sm font-medium text-gray-700">Mata
                                        Pelajaran</label>
                                    <select name="subject_id" id="subject_id" class="block w-full rounded-md">
                                        @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}"
                                                {{ $classroomSubject->subject_id == $subject->id ? 'selected' : '' }}>
                                                {{ $subject->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Day -->
                                <div class="space-y-2">
                                    <label for="day" class="block text-sm font-medium text-gray-700">Hari</label>
                                    <select name="day" id="day"
                                        class="block w-full rounded-md @error('day') border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500 @enderror">
                                        <option value="">Pilih Hari</option>
                                        <option value="monday"
                                            {{ old('day', $classroomSubjectDay->day) === 'monday' ? 'selected' : '' }}>
                                            Senin</option>
                                        <option value="tuesday"
                                            {{ old('day', $classroomSubjectDay->day) === 'tuesday' ? 'selected' : '' }}>
                                            Selasa</option>
                                        <option value="wednesday"
                                            {{ old('day', $classroomSubjectDay->day) === 'wednesday' ? 'selected' : '' }}>
                                            Rabu</option>
                                        <option value="thursday"
                                            {{ old('day', $classroomSubjectDay->day) === 'thursday' ? 'selected' : '' }}>
                                            Kamis</option>
                                        <option value="friday"
                                            {{ old('day', $classroomSubjectDay->day) === 'friday' ? 'selected' : '' }}>
                                            Jumat</option>
                                    </select>
                                    @error('day')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label for="teacher_id" class="block text-sm font-medium text-gray-700">Guru</label>
                                <select name="teacher_id" id="teacher_id" class="block w-full rounded-md">
                                    <option value="">Pilih Guru</option>
                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}"
                                            {{ $classroomSubject->teacher_id == $teacher->id ? 'selected' : '' }}>
                                            {{ $teacher->user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <!-- Start Time -->
                                <div class="space-y-2">
                                    <label for="start_hour" class="block text-sm font-medium text-gray-700">Jam
                                        Mulai</label>
                                    <input type="number" name="start_hour" id="start_hour" class="block w-full rounded-md"
                                        value="{{ $classroomSubjectDay->classroomSubjectDayHours->first()->schedule_hour_id }}">
                                </div>
                                <!-- End Time -->
                                <div class="space-y-2">
                                    <label for="end_hour" class="block text-sm font-medium text-gray-700">Jam
                                        Selesai</label>
                                    <input type="number" name="end_hour" id="end_hour" class="block w-full rounded-md"
                                        value="{{ $classroomSubjectDay->classroomSubjectDayHours->last()->schedule_hour_id }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-8">
                        <button type="submit"
                            class="px-6 py-3 bg-green-500 hover:bg-green-600 text-white font-semibold rounded-lg shadow-md">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            async function loadTeachers(subjectId, selectedTeacherId) {
                const teacherSelect = document.getElementById('teacher_id');

                // Disable teacher select until options are loaded
                teacherSelect.disabled = true;
                teacherSelect.innerHTML = '<option value="">Memuat...</option>';

                if (subjectId) {
                    try {
                        const response = await fetch(`/dashboard/classroomSubjects/getTeachers?subject_id=${subjectId}`);

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
                            if (teacher.id == selectedTeacherId) {
                                option.selected = true;
                            }
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
            }

            document.addEventListener('DOMContentLoaded', function() {
                const subjectSelect = document.getElementById('subject_id');
                const selectedSubjectId = subjectSelect.value;
                const selectedTeacherId = {{ $classroomSubject->teacher_id ?? 'null' }};

                // Load teachers based on the initially selected subject
                loadTeachers(selectedSubjectId, selectedTeacherId);

                // Handle subject change
                subjectSelect.addEventListener('change', function() {
                    const newSubjectId = this.value;
                    loadTeachers(newSubjectId, null);
                });
            });

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
                            if (teacher.id == {{ $classroomSubject->teacher_id }}) {
                                option.selected = true;
                            }
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
