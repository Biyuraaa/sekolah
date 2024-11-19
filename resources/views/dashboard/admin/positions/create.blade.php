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
                            <a href="{{ route('positions.index') }}"
                                class="text-gray-700 hover:text-blue-600 ml-1 md:ml-2">Jabatan</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-500 ml-1 md:ml-2">Tambah Jabatan Baru</span>
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
                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900">Tambah Jabatan Baru</h2>
                        <p class="text-sm text-gray-500">Silahkan lengkapi form berikut untuk menambahkan jabatan baru.</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-xl overflow-hidden transition-all duration-200 hover:shadow-2xl">
                <div class="p-6 sm:p-8">
                    <form action="{{ route('positions.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <!-- Nama Jabatan -->
                        <div class="space-y-1">
                            <label for="name" class="block text-sm font-medium text-gray-700">
                                Nama Jabatan <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="name" id="name"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm @error('name') border-red-300 @enderror"
                                placeholder="Masukkan nama jabatan" value="{{ old('name') }}" required>
                            @error('name')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                            <!-- Gaji Pokok -->
                            <div class="space-y-2">
                                <label for="base_salary" class="block text-sm font-medium text-gray-700">
                                    Gaji Pokok <span class="text-red-500">*</span>
                                </label>
                                <div class="relative mt-1 rounded-md shadow-sm">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                        <span class="text-gray-500 sm:text-sm">Rp</span>
                                    </div>
                                    <input type="number" name="base_salary" id="base_salary"
                                        class="block w-full rounded-md border-gray-300 pl-12 pr-12 focus:border-green-500 focus:ring-green-500 sm:text-sm @error('base_salary') border-red-300 @enderror"
                                        placeholder="0.00" value="{{ old('base_salary') }}" required step="0.01"
                                        min="0">
                                </div>
                                @error('base_salary')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Tunjangan -->
                            <div class="space-y-2">
                                <label for="allowance" class="block text-sm font-medium text-gray-700">
                                    Tunjangan <span class="text-red-500">*</span>
                                </label>
                                <div class="relative mt-1 rounded-md shadow-sm">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                        <span class="text-gray-500 sm:text-sm">Rp</span>
                                    </div>
                                    <input type="number" name="allowance" id="allowance"
                                        class="block w-full rounded-md border-gray-300 pl-12 pr-12 focus:border-green-500 focus:ring-green-500 sm:text-sm @error('allowance') border-red-300 @enderror"
                                        placeholder="0.00" value="{{ old('allowance') }}" required step="0.01"
                                        min="0">
                                </div>
                                @error('allowance')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Tanggung Jawab -->
                        <div class="space-y-1">
                            <label for="responsibilities" class="block text-sm font-medium text-gray-700">
                                Tanggung Jawab <span class="text-red-500">*</span>
                            </label>
                            <textarea name="responsibilities" id="responsibilities" rows="4"
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm @error('responsibilities')
                                border-red-300 @enderror"
                                placeholder="Deskripsikan tanggung jawab untuk jabatan ini">{{ old('responsibilities') }}</textarea>
                            @error('responsibilities')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end space-x-4 pt-4">
                            <a href="{{ route('positions.index') }}"
                                class="inline-flex justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                                Batal
                            </a>
                            <button type="submit"
                                class="inline-flex justify-center rounded-md border border-transparent bg-green-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                                Simpan Jabatan
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            // Format currency inputs
            const formatCurrency = (input) => {
                input.addEventListener('input', (e) => {
                    let value = e.target.value;
                    value = value.replace(/[^0-9.]/g, '');

                    if (value.split('.').length > 2) {
                        value = value.replace(/\.+$/, '');
                    }

                    e.target.value = value;
                });
            };

            // Apply currency formatting to salary and allowance inputs
            document.addEventListener('DOMContentLoaded', () => {
                const salaryInput = document.getElementById('base_salary');
                const allowanceInput = document.getElementById('allowance');

                formatCurrency(salaryInput);
                formatCurrency(allowanceInput);
            });
        </script>
    @endpush
@endsection
