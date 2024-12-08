@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Enhanced Breadcrumb -->
            <nav class="flex mb-8" aria-label="Breadcrumb">
                <ol class="inline-flex items-center rounded-lg bg-white shadow-sm px-6 py-3 space-x-2 md:space-x-4">
                    <li>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2 transition-transform hover:scale-110" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path
                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                </path>
                            </svg>
                            <a href="{{ route('dashboard') }}"
                                class="text-gray-600 hover:text-blue-600 font-medium transition-colors duration-200">
                                Dashboard
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2 transition-transform hover:scale-110" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <a href="{{ route('gradeExams.index') }}"
                                class="text-gray-600 hover:text-blue-600 font-medium transition-colors duration-200">
                                Penilaian Ujian
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-400 mx-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-500 ml-1 md:ml-2">
                                {{ $classroomSubject->subject->name }}
                                {{ $classroomSubject->classroom->year_level }} -
                                {{ $classroomSubject->classroom->group_numbers }}
                            </span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Enhanced Header Section -->
            <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-4">
                        <div
                            class="bg-gradient-to-r from-blue-500 to-blue-600 p-3 rounded-lg shadow-lg transform transition-transform hover:scale-105">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Grade Exams</h2>
                            <p class="text-sm font-medium text-gray-500 mt-1">Manage and evaluate exam submissions
                                efficiently</p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-100">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gradient-to-r from-blue-50 to-blue-100">
                            <tr>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    <div class="flex items-center space-x-1">
                                        <span>No</span>
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 11l5-5m0 0l5 5m-5-5v12" />
                                        </svg>
                                    </div>
                                </th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Nama Mahasiswa</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Nilai</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Catatan</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($studentScores as $index => $score)
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="px-6 py-4">
                                        <span
                                            class="inline-flex items-center justify-center h-6 w-6 rounded-full bg-blue-100 text-blue-600 text-sm font-medium">
                                            {{ $index + 1 }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div
                                                class="h-8 w-8 rounded-full bg-blue-500 flex items-center justify-center text-white font-medium mr-3">
                                                {{ substr($score->classroomStudent->student->user->name, 0, 1) }}
                                            </div>
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $score->classroomStudent->student->user->name }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-sm font-medium
                                {{ $score->score >= 80
                                    ? 'bg-green-100 text-green-800'
                                    : ($score->score >= 60
                                        ? 'bg-yellow-100 text-yellow-800'
                                        : 'bg-red-100 text-red-800') }}">
                                            {{ $score->score }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="text-sm text-gray-500">
                                            {{ $score->note ?? 'Tidak ada catatan' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <button
                                            class="grade-btn inline-flex items-center px-3 py-2 border border-blue-600 rounded-lg text-sm font-medium text-blue-600 bg-white hover:bg-blue-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 space-x-2"
                                            data-score-id="{{ $score->id }}"
                                            data-student-name="{{ $score->classroomStudent->student->user->name }}"
                                            data-current-score="{{ $score->score }}"
                                            data-current-notes="{{ $score->notes }}">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                            <span>Beri Nilai</span>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="gradeModal" class="fixed z-50 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title"
                role="dialog" aria-modal="true">
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                    <div
                        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                Beri Nilai untuk <span id="studentName"></span>
                            </h3>
                            <div class="mt-2">
                                <form id="gradeForm">
                                    <input type="hidden" id="scoreId" name="scoreId">
                                    <div class="mb-4">
                                        <label for="score"
                                            class="block text-sm font-medium text-gray-700">Nilai</label>
                                        <input type="number" name="score" id="score"
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    <div class="mb-4">
                                        <label for="notes"
                                            class="block text-sm font-medium text-gray-700">Catatan</label>
                                        <textarea name="notes" id="notes" rows="3"
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <button type="button" id="submitGrade"
                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                                Simpan
                            </button>
                            <button type="button" id="closeModal"
                                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                Batal
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection


@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('gradeModal');
            const gradeButtons = document.querySelectorAll('.grade-btn');
            const closeModalButton = document.getElementById('closeModal');
            const submitGradeButton = document.getElementById('submitGrade');
            const studentNameSpan = document.getElementById('studentName');
            const scoreInput = document.getElementById('score');
            const notesInput = document.getElementById('notes');
            const scoreIdInput = document.getElementById('scoreId');

            gradeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const scoreId = this.dataset.scoreId;
                    const studentName = this.dataset.studentName;
                    const currentScore = this.dataset.currentScore;
                    const currentNotes = this.dataset.currentNotes;

                    studentNameSpan.textContent = studentName;
                    scoreInput.value = currentScore;
                    notesInput.value = currentNotes;
                    scoreIdInput.value = scoreId;

                    modal.classList.remove('hidden');
                });
            });

            closeModalButton.addEventListener('click', function() {
                modal.classList.add('hidden');
            });

            submitGradeButton.addEventListener('click', function() {
                const scoreId = scoreIdInput.value;
                const score = scoreInput.value;
                const notes = notesInput.value;

                fetch(`/dashboard/gradeExams/${scoreId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute('content')
                        },
                        body: JSON.stringify({
                            score,
                            notes
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Update the table row
                            const row = document.querySelector(`[data-score-id="${scoreId}"]`).closest(
                                'tr');
                            const scoreSpan = row.querySelector('td:nth-child(3) span');
                            const notesSpan = row.querySelector('td:nth-child(4) span');

                            // Update score and apply new color
                            scoreSpan.textContent = score;
                            updateScoreColor(scoreSpan, score);

                            // Update notes
                            notesSpan.textContent = notes || 'Tidak ada catatan';

                            // Close the modal
                            modal.classList.add('hidden');
                        } else {
                            alert('Terjadi kesalahan saat menyimpan nilai.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Terjadi kesalahan saat menyimpan nilai.');
                    });
            });

            function updateScoreColor(element, score) {
                // Remove existing color classes
                element.classList.remove('bg-green-100', 'text-green-800', 'bg-yellow-100', 'text-yellow-800',
                    'bg-red-100', 'text-red-800');

                // Add new color classes based on score
                if (score >= 80) {
                    element.classList.add('bg-green-100', 'text-green-800');
                } else if (score >= 60) {
                    element.classList.add('bg-yellow-100', 'text-yellow-800');
                } else {
                    element.classList.add('bg-red-100', 'text-red-800');
                }
            }
        });
    </script>
@endpush
