@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-100 py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumb -->
            <nav class="flex mb-8" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li>
                        <a href="{{ route('dashboard') }}"
                            class="flex items-center text-gray-600 hover:text-blue-600 transition">
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
                            class="flex items-center text-gray-600 hover:text-blue-600 transition">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Jadwal Pelajaran
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('classroomSubjects.show', $week->classroomSubject) }}"
                            class="flex items-center text-gray-600 hover:text-blue-600 transition">
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
                            Absensi
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
                                <h2 class="text-2xl font-bold">Absensi Week-{{ $week->week_number }}</h2>
                                <p class="text-sm mt-1 text-blue-100">
                                    {{ $week->classroomSubject->subject->name }} |
                                    Kelas
                                    {{ $week->classroomSubject->classroom->year_level }}-{{ $week->classroomSubject->classroom->group_numbers }}
                                    |
                                    Minggu {{ $week->week_number }}
                                </p>
                            </div>
                        </div>
                        <a href="{{ route('classroomSubjects.show', $week->classroomSubject) }}"
                            class="flex items-center px-4 py-2 bg-white text-blue-600 hover:text-blue-700 border border-blue-500 rounded-lg shadow-md transition hover:shadow-lg">
                            <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>Kembali</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Attendance Summary -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white shadow-md rounded-lg p-6 text-center">
                    <svg class="h-12 w-12 text-blue-500 mx-auto mb-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <h3 class="text-lg font-semibold text-gray-700">Total Students</h3>
                    <p class="text-3xl font-bold text-blue-600">{{ $absences->count() }}</p>
                </div>
                <div class="bg-white shadow-md rounded-lg p-6 text-center">
                    <svg class="h-12 w-12 text-green-500 mx-auto mb-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h3 class="text-lg font-semibold text-gray-700">Present</h3>
                    <p class="text-3xl font-bold text-green-600">{{ $absences->where('status', 'present')->count() }}</p>
                </div>
                <div class="bg-white shadow-md rounded-lg p-6 text-center">
                    <svg class="h-12 w-12 text-red-500 mx-auto mb-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h3 class="text-lg font-semibold text-gray-700">Absent</h3>
                    <p class="text-3xl font-bold text-red-600">{{ $absences->where('status', 'absent')->count() }}</p>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Absent List -->
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="bg-red-500 text-white p-4 flex items-center">
                        <svg class="h-6 w-6 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        <h3 class="text-lg font-semibold">Absent Students
                            (<span id="absent-count">{{ $absences->where('status', 'absent')->count() }}</span>)</h3>
                    </div>
                    <div class="max-h-96 overflow-y-auto">
                        <ul class="divide-y divide-red-100" id="absent-list">
                            @forelse ($absences->where('status', 'absent') as $absence)
                                <li class="px-6 py-4 hover:bg-red-50 transition flex items-center justify-between cursor-pointer"
                                    data-student-id="{{ $absence->student->id }}" data-week-id="{{ $week->id }}"
                                    onclick="changeStatus(event, 'present')">
                                    <div class="flex items-center">
                                        <svg class="h-3 w-3 text-red-500 mr-3" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <circle cx="12" cy="12" r="12" />
                                        </svg>
                                        <span class="font-medium text-gray-700">{{ $absence->student->user->name }}</span>
                                    </div>
                                    <span class="text-sm text-gray-500">Click to mark present</span>
                                </li>
                            @empty
                                <li id="no-absent-message" class="px-6 py-4 text-center text-gray-500">No students are
                                    absent.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>

                <!-- Present List -->
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="bg-green-500 text-white p-4 flex items-center">
                        <svg class="h-6 w-6 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h3 class="text-lg font-semibold">Present Students
                            (<span id="present-count">{{ $absences->where('status', 'present')->count() }}</span>)</h3>
                    </div>
                    <div class="max-h-96 overflow-y-auto">
                        <ul class="divide-y divide-green-100" id="present-list">
                            @forelse ($absences->where('status', 'present') as $absence)
                                <li class="px-6 py-4 hover:bg-green-50 transition flex items-center justify-between cursor-pointer"
                                    data-student-id="{{ $absence->student->id }}" data-week-id="{{ $week->id }}"
                                    onclick="changeStatus(event, 'absent')">
                                    <div class="flex items-center">
                                        <svg class="h-3 w-3 text-green-500 mr-3" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <circle cx="12" cy="12" r="12" />
                                        </svg>
                                        <span class="font-medium text-gray-700">{{ $absence->student->user->name }}</span>
                                    </div>
                                    <span class="text-sm text-gray-500">Click to mark absent</span>
                                </li>
                            @empty
                                <li id="no-present-message" class="px-6 py-4 text-center text-gray-500">No students are
                                    present.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function changeStatus(event, newStatus) {
            let studentId = event.currentTarget.dataset.studentId;
            let weekId = event.currentTarget.dataset.weekId;
            let listItem = event.currentTarget;
            let sourceList = listItem.parentElement;
            let targetList = (newStatus === 'present') ? document.getElementById('present-list') : document.getElementById(
                'absent-list');

            // Make an AJAX request to update the attendance status
            fetch(`/dashboard/update-absence-status/${studentId}/${weekId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        status: newStatus
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Update the DOM
                        listItem.remove();

                        // Remove "No students" message if it exists
                        let noStudentsMessage = targetList.querySelector(`#no-${newStatus}-message`);
                        if (noStudentsMessage) {
                            noStudentsMessage.remove();
                        }

                        targetList.appendChild(listItem);

                        // Update status indicator and text
                        let statusIndicator = listItem.querySelector('svg');
                        let statusText = listItem.querySelector('.text-sm');
                        if (newStatus === 'present') {
                            statusIndicator.classList.remove('text-red-500');
                            statusIndicator.classList.add('text-green-500');
                            statusText.textContent = 'Click to mark absent';
                            listItem.setAttribute('onclick', "changeStatus(event, 'absent')");
                        } else {
                            statusIndicator.classList.remove('text-green-500');
                            statusIndicator.classList.add('text-red-500');
                            statusText.textContent = 'Click to mark present';
                            listItem.setAttribute('onclick', "changeStatus(event, 'present')");
                        }

                        // Check if source list is empty and add "No students" message if needed
                        if (sourceList.children.length === 0) {
                            let message = document.createElement('li');
                            message.id = `no-${newStatus === 'present' ? 'absent' : 'present'}-message`;
                            message.className = 'px-6 py-4 text-center text-gray-500';
                            message.textContent = `No students are ${newStatus === 'present' ? 'absent' : 'present'}.`;
                            sourceList.appendChild(message);
                        }

                        // Update counts
                        updateCounts();
                    } else {
                        alert('Error updating status: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while updating the status.');
                });
        }

        function updateCounts() {
            let absentCount = document.getElementById('absent-list').querySelectorAll('li:not(#no-absent-message)').length;
            let presentCount = document.getElementById('present-list').querySelectorAll('li:not(#no-present-message)')
                .length;
            let totalCount = absentCount + presentCount;

            document.getElementById('absent-count').textContent = absentCount;
            document.getElementById('present-count').textContent = presentCount;

            document.querySelectorAll('.text-3xl.font-bold')[0].textContent = totalCount;
            document.querySelectorAll('.text-3xl.font-bold')[1].textContent = presentCount;
            document.querySelectorAll('.text-3xl.font-bold')[2].textContent = absentCount;
        }
    </script>
@endpush
