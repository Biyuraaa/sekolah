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
                            <a href="{{ route('facilities.index') }}"
                                class="text-gray-700 hover:text-blue-600 ml-1 md:ml-2">Fasilitas</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-500 ml-1 md:ml-2">Detail Fasilitas</span>
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
                                d="M3 7v10c0 1.104.896 2 2 2h3v-6h4v6h3c1.104 0 2-.896 2-2V7l-7-4-7 4z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900">Detail Fasilitas</h2>
                        <p class="text-gray-500">Lihat detail fasilitas yang tersedia di sekolah.</p>
                    </div>
                </div>
            </div>
            <div class="space-y-8">
                <!-- Facility Details Card -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="p-6 sm:p-8">
                        <div class="flex justify-between items-start">
                            <div class="space-y-4">
                                <h3 class="text-2xl font-bold text-gray-900">{{ $facility->name }}</h3>
                                <div class="flex items-center space-x-4 text-sm text-gray-500">
                                    <span class="flex items-center">
                                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        {{ $facility->location }}
                                    </span>
                                    <span class="flex items-center">
                                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                        </svg>
                                        Kapasitas: {{ $facility->capacity }} orang
                                    </span>
                                </div>
                                <p class="text-gray-600">{{ $facility->description }}</p>
                            </div>
                            <span @class([
                                'px-3 py-1 text-sm font-semibold rounded-full',
                                'bg-green-100 text-green-800' => $facility->status === 'available',
                                'bg-red-100 text-red-800' => $facility->status === 'unavailable',
                                'bg-yellow-100 text-yellow-800' => $facility->status === 'maintenance',
                            ])>
                                {{ ucfirst($facility->status) }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Stats Grid -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-8">
                    <!-- Total Bookings -->
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                                <i class="fas fa-calendar-check fa-lg"></i>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-sm font-medium text-gray-500">Total Peminjaman</h4>
                                <p class="text-lg font-semibold text-gray-900">{{ $totalBookings }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- Approved Bookings -->
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-green-100 text-green-600">
                                <i class="fas fa-check-circle fa-lg"></i>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-sm font-medium text-gray-500">Disetujui</h4>
                                <p class="text-lg font-semibold text-gray-900">{{ $approvedBookings }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- Pending Bookings -->
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                                <i class="fas fa-hourglass-start fa-lg"></i>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-sm font-medium text-gray-500">Pending</h4>
                                <p class="text-lg font-semibold text-gray-900">{{ $pendingBookings }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- Rejected Bookings -->
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-red-100 text-red-600">
                                <i class="fas fa-times-circle fa-lg"></i>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-sm font-medium text-gray-500">Ditolak</h4>
                                <p class="text-lg font-semibold text-gray-900">{{ $rejectedBookings }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Booking History -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900">Riwayat Peminjaman</h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Peminjam
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Waktu</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tujuan</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @if ($schedules->isEmpty())
                                    <tr>
                                        <td class="px-6 py-4 text-sm font-medium text-gray-500" colspan="5">Tidak ada
                                            data
                                            tersedia.</td>
                                    </tr>
                                @else
                                    @foreach ($schedules as $schedule)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $schedule->user->name }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ $schedule->date }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">
                                                    {{ $schedule->start }} - {{ $schedule->end }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="text-sm text-gray-900">{{ $schedule->purpose }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span @class([
                                                    'px-2 py-1 text-xs font-semibold rounded-full',
                                                    'bg-yellow-100 text-yellow-800' => $schedule->status === 'pending',
                                                    'bg-green-100 text-green-800' => $schedule->status === 'approved',
                                                    'bg-red-100 text-red-800' => $schedule->status === 'rejected',
                                                    'bg-gray-100 text-gray-800' => $schedule->status === 'canceled',
                                                    'bg-blue-100 text-blue-800' => $schedule->status === 'completed',
                                                ])>
                                                    {{ ucfirst($schedule->status) }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="px-6 py-4 border-t border-gray-200">
                        {{ $schedules->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
