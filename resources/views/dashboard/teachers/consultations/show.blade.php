@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-white py-8">
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
                            <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-blue-600">
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
                            <a href="{{ route('consultations.index') }}" class="text-gray-700 hover:text-blue-600">
                                Konsultasi
                            </a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-500 ml-1 md:ml-2">Detail Konsultasi</span>
                        </div>
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
                        <h2 class="text-xl font-bold text-gray-900">Detail Konsultasi</h2>
                        <p class="text-sm text-gray-500">Detail konsultasi yang telah dibuat.</p>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <a href="{{ route('consultations.index') }}"
                        class="inline-flex items-center px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali
                    </a>
                </div>
            </div>
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4 mb-8">
                <!-- Total Consultations -->
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Total Konsultasi</dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl font-semibold text-gray-900">{{ $totalConsultations }}</div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Today's Consultations -->
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Konsultasi Hari Ini</dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl font-semibold text-gray-900">{{ $todayConsultations }}</div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Consultations -->
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-yellow-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Menunggu Konfirmasi</dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl font-semibold text-gray-900">{{ $pendingConsultations }}</div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Completed Consultations -->
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-indigo-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Konsultasi Selesai</dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl font-semibold text-gray-900">{{ $completedConsultations }}
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-2xl overflow-hidden mb-8 transition-all duration-300 hover:shadow-xl">
                <div class="bg-gradient-to-r from-blue-50 to-blue-100 px-6 py-5 border-b border-gray-200">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600 mr-3" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                        </svg>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Informasi Konsultasi</h3>
                            <p class="text-sm text-gray-600">Detail lengkap mengenai sesi konsultasi Anda</p>
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    <div class="grid grid-cols-2 gap-6">
                        <div class="space-y-6">

                            <!-- Tanggal -->
                            <div class="bg-gray-50 rounded-xl p-4 hover:bg-gray-100 transition-colors duration-200">
                                <div class="flex items-center space-x-3">
                                    <div class="p-2 bg-blue-100 rounded-lg">
                                        <svg class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-sm font-medium text-gray-500">Tanggal</div>
                                        <div class="text-sm font-semibold text-gray-900">
                                            {{ \Carbon\Carbon::parse($consultation->date)->format('d F Y') }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Waktu -->
                            <div class="bg-gray-50 rounded-xl p-4 hover:bg-gray-100 transition-colors duration-200">
                                <div class="flex items-center space-x-3">
                                    <div class="p-2 bg-blue-100 rounded-lg">
                                        <svg class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-sm font-medium text-gray-500">Waktu</div>
                                        <div class="text-sm font-semibold text-gray-900">
                                            {{ \Carbon\Carbon::parse($consultation->start_time)->format('H:i') }} -
                                            {{ \Carbon\Carbon::parse($consultation->end_time)->format('H:i') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <!-- Lokasi -->
                            <div class="bg-gray-50 rounded-xl p-4 hover:bg-gray-100 transition-colors duration-200">
                                <div class="flex items-center space-x-3">
                                    <div class="p-2 bg-blue-100 rounded-lg">
                                        <svg class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-sm font-medium text-gray-500">Lokasi</div>
                                        <div class="text-sm font-semibold text-gray-900">{{ $consultation->location }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="bg-gray-50 rounded-xl p-4 hover:bg-gray-100 transition-colors duration-200">
                                <div class="flex items-center space-x-3">
                                    <div class="p-2 bg-blue-100 rounded-lg">
                                        <svg class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-sm font-medium text-gray-500">Status</div>
                                        <div class="mt-1">
                                            <span
                                                class="px-3 py-1 inline-flex items-center text-sm rounded-full font-medium
                                    @if ($consultation->status == 'pending') bg-yellow-100 text-yellow-800
                                    @elseif($consultation->status == 'confirmed') bg-green-100 text-green-800
                                    @else bg-red-100 text-red-800 @endif">
                                                @if ($consultation->status == 'pending')
                                                    <span class="mr-1.5">⏳</span>
                                                @elseif($consultation->status == 'confirmed')
                                                    <span class="mr-1.5">✅</span>
                                                @else
                                                    <span class="mr-1.5">❌</span>
                                                @endif
                                                {{ ucfirst($consultation->status) }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-2xl overflow-hidden">
                <div class="bg-gradient-to-r from-blue-50 to-blue-100 px-6 py-5 border-b border-gray-200">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600 mr-3" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Daftar Pengajuan Konsultasi</h3>
                            <p class="text-sm text-gray-600">Daftar pengajuan konsultasi yang telah dibuat.</p>
                        </div>
                    </div>
                </div>
                <div class="divide-y divide-gray-100">
                    @forelse ($consultation->appointments->where('status', 'pending') as $appointment)
                        <div class="p-6 hover:bg-gray-50 transition-colors duration-300 group cursor-pointer"
                            onclick="openAppointmentModal({{ $appointment->id }}, '{{ $appointment->purpose }}')">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-4 w-full">
                                    <div class="relative">
                                        <img class="h-14 w-14 rounded-full object-cover ring-2 ring-blue-200 transition-all group-hover:ring-blue-400"
                                            src="https://ui-avatars.com/api/?name={{ urlencode($appointment->user->name) }}&color=7F9CF5&background=EBF4FF"
                                            alt="{{ $appointment->user->name }}">
                                        <span
                                            class="absolute bottom-0 right-0 block h-3.5 w-3.5 rounded-full 
                                @if ($appointment->status == 'pending') bg-yellow-400
                                @elseif($appointment->status == 'confirmed') bg-green-400
                                @else bg-red-400 @endif 
                                ring-2 ring-white"></span>
                                    </div>
                                    <div class="flex-grow">
                                        <div class="flex justify-between items-center">
                                            <div>
                                                <div
                                                    class="text-sm font-semibold text-gray-900 group-hover:text-blue-600 transition-colors">
                                                    {{ $appointment->user->name }}
                                                </div>
                                                <div class="text-sm text-gray-500 truncate max-w-xs">
                                                    {{ $appointment->purpose }}
                                                </div>
                                            </div>
                                            <span
                                                class="px-3 py-1 text-xs font-semibold rounded-full
                                    @if ($appointment->status == 'pending') bg-yellow-100 text-yellow-800
                                    @elseif($appointment->status == 'confirmed') bg-green-100 text-green-800
                                    @else bg-red-100 text-red-800 @endif
                                    hidden md:inline-block">
                                                {{ ucfirst($appointment->status) }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Konfirmasi Appointment -->
                        <div id="appointmentModal"
                            class="fixed inset-0 bg-gray-600 bg-opacity-50 z-50 overflow-y-auto h-full w-full hidden">
                            <div class="relative top-20 mx-auto p-5 border w-full max-w-md shadow-lg rounded-md bg-white">
                                <form id="appointmentForm" method="POST"
                                    action="{{ route('appointments.update', $appointment) }}">
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" name="status" id="appointmentStatus">
                                    <div class="mt-3">
                                        <div class="flex justify-between items-center pb-3">
                                            <h3 class="text-lg font-medium text-gray-900">Konfirmasi Appointment</h3>
                                            <button type="button" onclick="closeModal()"
                                                class="text-gray-400 hover:text-gray-500">
                                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                            </button>
                                        </div>

                                        <div class="mt-2">
                                            <p class="text-sm text-gray-500 mb-2">Purpose:</p>
                                            <p id="modalPurpose" class="text-gray-700 bg-gray-50 p-3 rounded-md mb-4"></p>

                                            <div class="mb-4">
                                                <label for="rejectionNotes"
                                                    class="block text-sm font-medium text-gray-700 mb-1">
                                                    Notes (required for rejection)
                                                </label>
                                                <textarea name="notes" id="rejectionNotes"
                                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                                    rows="3"></textarea>
                                            </div>
                                        </div>

                                        <div class="flex justify-end space-x-3">
                                            <button type="button" onclick="submitForm('confirmed')"
                                                class="inline-flex justify-center items-center px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-200">
                                                <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                Confirm
                                            </button>
                                            <button type="button" onclick="submitForm('rejected')"
                                                class="inline-flex justify-center items-center px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-200">
                                                <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                                Reject
                                            </button>
                                            <button type="button" onclick="closeModal()"
                                                class="inline-flex justify-center items-center px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 transition-colors duration-200">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    @empty
                        <div class="px-6 py-12 text-center">
                            <div class="bg-gray-100 rounded-full p-4 inline-block mb-4">
                                <svg class="h-12 w-12 text-gray-500" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                </svg>
                            </div>
                            <p class="text-gray-600 font-medium">Belum ada appointment yang terdaftar</p>
                            <p class="text-sm text-gray-500 mt-2">Appointment akan muncul setelah didaftarkan</p>
                        </div>
                    @endforelse
                </div>
            </div>



        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function openAppointmentModal(appointmentId, purpose) {
            document.getElementById('modalPurpose').textContent = purpose;
            document.getElementById('appointmentModal').classList.remove('hidden');
            document.getElementById('rejectionNotes').value = '';
        }

        function closeModal() {
            document.getElementById('appointmentModal').classList.add('hidden');
        }

        function submitForm(status) {
            const notes = document.getElementById('rejectionNotes').value;

            if (status === 'rejected' && !notes.trim()) {
                alert('Please provide rejection notes');
                return;
            }

            document.getElementById('appointmentStatus').value = status;
            document.getElementById('appointmentForm').submit();
        }
    </script>
@endpush
