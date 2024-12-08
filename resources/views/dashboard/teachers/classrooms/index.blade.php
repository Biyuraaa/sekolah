@extends('layouts.app')
@section('content')
    <div class="min-h-screen bg-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
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
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-500 ml-1 md:ml-2">Kelas</span>
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
                        <h2 class="text-2xl font-bold text-gray-900">Daftar Kelas</h2>
                        <p class="text-gray-500 text-sm">Kelola data kelas dalam sistem</p>
                    </div>
                </div>

                <div class="flex items-center space-x-4">

                </div>
            </div>


            <!-- Search and Filter Section -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden mb-8">
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <!-- Search Input -->
                        <div class="relative">
                            <form action="{{ route('classrooms.index') }}" method="GET">
                                <input type="text" name="search" value="{{ request('search') }}"
                                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                    placeholder="Cari kelas...">
                                <button type="submit"
                                    class="absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </button>
                            </form>
                        </div>

                        <!-- Year Level Filter -->
                        <div>
                            <select name="year_level"
                                class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                onchange="this.form.submit()">
                                <option value="">Filter berdasarkan Tingkat</option>
                                @for ($i = 1; $i <= 4; $i++)
                                    <option value="{{ $i }}" {{ request('year_level') == $i ? 'selected' : '' }}>
                                        Tingkat {{ $i }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Table Section -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="min-w-full divide-y divide-gray-200">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nama Kelas
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tingkat
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Angkatan
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($classrooms as $classroom)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $classroom->batch_name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $classroom->year_level . '-' . $classroom->group_numbers }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $classroom->academic_year }}</td>


                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex space-x-2">
                                            <a <a href="{{ route('classrooms.show', $classroom) }}"
                                                class="inline-flex items-center px-3 py-1.5 text-white bg-blue-600 rounded-md hover:bg-blue-700">
                                                <i class="fas fa-eye mr-2"></i>
                                                Lihat
                                            </a>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="mt-4 px-6 py-3 bg-gray-50">
                        {{ $classrooms->appends(request()->except('page'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
