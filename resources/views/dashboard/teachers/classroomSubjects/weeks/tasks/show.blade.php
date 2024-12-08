@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-white py-10">
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
                        <a href="{{ route('classroomSubjects.show', $task->week->classroomSubject) }}"
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
                            Detail Tugas
                        </span>
                    </li>
                </ol>
            </nav>

            <!-- Header Section -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden mb-8">
                <div class="p-6 bg-gradient-to-r from-blue-500 to-blue-600 text-white">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="bg-white p-3 rounded-full shadow-md">
                                <svg class="h-8 w-8 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold">{{ $task->title }}</h2>
                                <p class="text-sm mt-1 text-blue-100">
                                    {{ $task->week->classroomSubject->subject->name }} |
                                    Kelas
                                    {{ $task->week->classroomSubject->classroom->year_level }}-{{ $task->week->classroomSubject->classroom->group_numbers }}
                                    |
                                    Minggu {{ $task->week->week_number }}
                                </p>
                            </div>
                        </div>
                        <a href="{{ route('classroomSubjects.show', $task->week->classroomSubject) }}"
                            class="btn btn-white flex items-center space-x-2">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>Kembali</span>
                        </a>
                    </div>
                </div>
                <div class="p-6 bg-white">
                    <h3 class="text-lg font-semibold mb-2">Deskripsi Tugas</h3>
                    <p class="text-gray-600">{{ $task->description }}</p>
                </div>
            </div>
            <!-- Students Submissions List -->
            <div class="bg-white shadow-xl rounded-xl overflow-hidden">
                @foreach ($students as $index => $student)
                    @php
                        $submission = $submissions->firstWhere('student_id', $student->id);
                        $statusColor = $submission
                            ? ($submission->status === 'Submitted'
                                ? 'bg-green-100 text-green-800'
                                : 'bg-yellow-100 text-yellow-800')
                            : 'bg-red-100 text-red-800';
                    @endphp
                    <div class="border-b border-gray-100 last:border-0">
                        <div class="submission-item group">

                            <button onclick="toggleSubmissionDetails(this)"
                                class="w-full px-6 py-5 flex items-center justify-between hover:bg-gray-50 transition-all duration-200 ease-in-out">
                                <div class="p-4 hover:bg-gray-50 rounded-lg transition-all duration-200">
                                    <div class="flex items-center space-x-5">
                                        <div class="flex-shrink-0">
                                            <div
                                                class="h-14 w-14 rounded-full bg-gradient-to-tr from-blue-600 to-indigo-500 flex items-center justify-center shadow-lg transform hover:scale-105 transition-transform duration-200">
                                                <span class="text-lg font-bold text-white">
                                                    {{ strtoupper(substr($student->user->name, 0, 2)) }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <h3
                                                class="text-lg font-semibold text-gray-900 truncate group-hover:text-blue-600 transition-colors duration-200">
                                                {{ $student->user->name }}
                                            </h3>
                                            <div class="mt-2">
                                                @if ($submission)
                                                    <span
                                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                                        <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        {{ $submission->status }}
                                                    </span>
                                                @else
                                                    <span
                                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-600">
                                                        <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        Belum Mengumpulkan
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <svg class="w-5 h-5 text-gray-400 submission-toggle-icon transform transition-transform duration-200 group-hover:text-blue-500"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>

                            </button>

                            <!-- Expandable Content -->
                            <div class="submission-details hidden">
                                <div class="px-6 py-4 bg-gray-50 space-y-4">
                                    @if ($submission)
                                        @php
                                            $statusConfig = [
                                                'not_submitted' => [
                                                    'color' => 'bg-red-100 text-red-800',
                                                    'icon' =>
                                                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>',
                                                    'label' => 'Belum Mengumpulkan',
                                                ],
                                                'submitted' => [
                                                    'color' => 'bg-green-100 text-green-800',
                                                    'icon' =>
                                                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>',
                                                    'label' => 'Sudah Mengumpulkan',
                                                ],
                                                'graded' => [
                                                    'color' => 'bg-blue-100 text-blue-800',
                                                    'icon' =>
                                                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>',
                                                    'label' => 'Sudah Dinilai',
                                                ],
                                                'late' => [
                                                    'color' => 'bg-yellow-100 text-yellow-800',
                                                    'icon' =>
                                                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>',
                                                    'label' => 'Terlambat',
                                                ],
                                            ];

                                            $currentStatus =
                                                $statusConfig[$submission->status] ?? $statusConfig['not_submitted'];
                                        @endphp
                                        <div class="grid grid-cols-2 gap-4">
                                            <div class="bg-white p-4 rounded-lg shadow-sm">
                                                <dt class="text-sm font-medium text-gray-500 mb-1">Status</dt>
                                                <dd class="text-sm font-semibold">
                                                    <span
                                                        class="inline-flex items-center px-3 py-1 rounded-full {{ $currentStatus['color'] }} transition-colors duration-150">
                                                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24" aria-hidden="true">
                                                            {!! $currentStatus['icon'] !!}
                                                        </svg>
                                                        <span>{{ $currentStatus['label'] }}</span>
                                                    </span>
                                                </dd>
                                            </div>

                                            <div class="bg-white p-4 rounded-lg shadow-sm">
                                                <dt class="text-sm font-medium text-gray-500 mb-1">Waktu Pengumpulan</dt>
                                                <dd class="text-sm font-semibold text-gray-900">
                                                    @if ($submission->submitted_at)
                                                        {{ Carbon\Carbon::parse($submission->submitted_at)->format('d M Y, H:i') }}
                                                    @else
                                                        <span class="text-gray-400">-</span>
                                                    @endif
                                                </dd>
                                            </div>

                                            <div class="bg-white p-4 rounded-lg shadow-sm">
                                                <dt class="text-sm font-medium text-gray-500 mb-1">File</dt>
                                                <dd class="text-sm font-semibold">
                                                    @if ($submission->file_path)
                                                        <a href="{{ Storage::url('files/submissions/' . $submission->file_path) }}"
                                                            class="inline-flex items-center text-blue-600 hover:text-blue-700 group transition-colors duration-150"
                                                            download>
                                                            <svg class="w-4 h-4 mr-1.5 transition-transform group-hover:translate-y-0.5"
                                                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                                aria-hidden="true">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                                            </svg>
                                                            <span
                                                                class="border-b border-transparent group-hover:border-blue-700">Download
                                                                File</span>
                                                        </a>
                                                    @else
                                                        <span class="inline-flex items-center text-gray-400">
                                                            <svg class="w-4 h-4 mr-1.5" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24"
                                                                aria-hidden="true">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                            </svg>
                                                            <span>Belum ada file</span>
                                                        </span>
                                                    @endif
                                                </dd>
                                            </div>

                                            <div class="bg-white p-4 rounded-lg shadow-sm">
                                                <dt class="text-sm font-medium text-gray-500 mb-1">Nilai</dt>
                                                <dd class="text-sm font-semibold text-gray-900">
                                                    @if ($submission->grade)
                                                        <span class="inline-flex items-center">
                                                            <svg class="w-4 h-4 mr-1.5 text-green-500" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24"
                                                                aria-hidden="true">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                            </svg>
                                                            {{ $submission->grade }}
                                                        </span>
                                                    @else
                                                        <span class="text-gray-400">Belum dinilai</span>
                                                    @endif
                                                </dd>
                                            </div>
                                        </div>

                                        <button
                                            onclick="document.getElementById('gradeModal{{ $submission->id }}').classList.remove('hidden')"
                                            class="mt-6 w-full inline-flex justify-center items-center px-4 py-2.5 
                    border border-transparent text-sm font-semibold rounded-lg 
                    text-white bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 
                    focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500
                    transform transition-all duration-200 hover:scale-[1.02] shadow-sm">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                            <span>Beri Nilai</span>
                                        </button>
                                    @else
                                        <div class="py-8 text-center">
                                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                            <p class="mt-2 text-sm font-medium text-gray-500">
                                                Belum ada pengumpulan
                                            </p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="gradeModal{{ $submission->id }}"
                        class="fixed inset-0 z-50 flex items-center justify-center hidden">
                        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

                        <div class="bg-white rounded-lg shadow-xl w-full max-w-lg mx-auto relative z-10">
                            <form action="{{ route('submissions.grade', $submission) }}" method="POST"
                                class="p-6 space-y-6">
                                @csrf
                                @method('PATCH')

                                <!-- Modal Header -->
                                <div class="flex justify-between items-center">
                                    <h3 class="text-lg font-semibold text-gray-900">
                                        Beri Nilai - {{ $submission->student_name }}
                                    </h3>
                                    <button
                                        onclick="document.getElementById('gradeModal{{ $submission->id }}').classList.add('hidden')"
                                        type="button" class="text-gray-400 hover:text-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 9a1 1 0 011 1v8a1 1 0 11-2 0v-8a1 1 0 011-1zM10 3a1 1 0 110 2 1 1 0 010-2z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>

                                <!-- Error Message (if needed) -->
                                <div class="hidden bg-red-50 p-3 rounded-md">
                                    <div class="flex items-center text-red-600">
                                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                                            </path>
                                        </svg>
                                        <span></span>
                                    </div>
                                </div>

                                <!-- Input Fields -->
                                <div class="space-y-4">
                                    <div>
                                        <label for="grade"
                                            class="block text-sm font-medium text-gray-700">Nilai</label>
                                        <input type="number" id="grade" name="grade"
                                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                            min="0" max="100" value="{{ $submission->grade }}" required>
                                    </div>
                                    <div>
                                        <label for="notes"
                                            class="block text-sm font-medium text-gray-700">Catatan/Feedback</label>
                                        <textarea id="notes" name="notes" rows="4"
                                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ $submission->notes }}</textarea>
                                    </div>
                                </div>

                                <!-- Modal Footer -->
                                <div class="flex justify-end space-x-3">
                                    <button type="button"
                                        onclick="document.getElementById('gradeModal{{ $submission->id }}').classList.add('hidden')"
                                        class="px-4 py-2 rounded-md text-gray-700 border border-gray-300 hover:bg-gray-100">Batal</button>
                                    <button type="submit"
                                        class="px-4 py-2 rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:ring-2 focus:ring-blue-500">
                                        Simpan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>


        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function toggleSubmissionDetails(button) {
            const detailsContainer = button.nextElementSibling;
            const icon = button.querySelector('.submission-toggle-icon');

            detailsContainer.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        }

        function openGradeModal(submissionId, studentName, grade, notes) {
            const modal = document.getElementById('gradeModal');
            const modalTitle = document.getElementById('modalTitle');
            const submissionIdInput = document.getElementById('submissionId');
            const gradeInput = document.getElementById('grade');
            const notesInput = document.getElementById('notes');

            // Set modal title
            modalTitle.textContent = `Beri Nilai - ${studentName}`;
            submissionIdInput.value = submissionId;
            gradeInput.value = grade !== null ? grade : 0;
            notesInput.value = notes || '';

            modal.classList.remove('hidden');
        }

        // Function to close the modal
        function closeGradeModal() {
            const modal = document.getElementById('gradeModal');
            modal.classList.add('hidden');
        }
        // Handle form submission with enhanced validation and error handling
        document.getElementById('gradeForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const submissionId = document.getElementById('submissionId').value;
            const grade = document.getElementById('grade').value;
            const notes = document.getElementById('notes').value;
            const errorContainer = document.getElementById('gradeErrorContainer');
            const saveButton = e.target.querySelector('button[type="submit"]');

            // Reset previous error messages
            errorContainer.textContent = '';
            errorContainer.classList.add('hidden');

            // Validate grade
            if (grade === '' || isNaN(grade)) {
                errorContainer.textContent = 'Mohon masukkan nilai yang valid';
                errorContainer.classList.remove('hidden');
                return;
            }

            const parsedGrade = parseFloat(grade);
            if (parsedGrade < 0 || parsedGrade > 100) {
                errorContainer.textContent = 'Nilai harus antara 0 dan 100';
                errorContainer.classList.remove('hidden');
                return;
            }

            // Disable button to prevent multiple submissions
            saveButton.disabled = true;
            saveButton.textContent = 'Menyimpan...';

            fetch(`/api/submissions/${submissionId}/grade`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        grade: parsedGrade,
                        notes: notes.trim()
                    })
                })
                .then(response => {
                    if (!response.ok) throw new Error('Gagal menyimpan nilai');
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        closeGradeModal();
                        location.reload();
                    } else {
                        throw new Error(data.message || 'Gagal menyimpan nilai');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    errorContainer.textContent = error.message || 'Terjadi kesalahan. Silakan coba lagi.';
                    errorContainer.classList.remove('hidden');

                    // Re-enable submit button
                    saveButton.disabled = false;
                    saveButton.textContent = 'Simpan Nilai';
                });
        });
    </script>
@endpush
