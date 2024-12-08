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
                            <span class="text-gray-500 ml-1 md:ml-2">Edit Fasilitas</span>
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
                        <h2 class="text-3xl font-bold text-gray-900">Edit Fasilitas</h2>
                        <p class="text-sm text-gray-500">Silahkan perbarui data fasilitas berikut.</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-xl overflow-hidden transition-all duration-200 hover:shadow-2xl">
                <div class="p-6 sm:p-8">
                    <form action="{{ route('facilities.update', $facility->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Nama Fasilitas -->
                        <div class="space-y-1">
                            <label for="name" class="block text-sm font-medium text-gray-700">
                                Nama Fasilitas <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="name" id="name"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm @error('name') border-red-300 @enderror"
                                placeholder="Masukkan nama fasilitas" value="{{ old('name', $facility->name) }}" required>
                            @error('name')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Deskripsi -->
                        <div class="space-y-1">
                            <label for="description" class="block text-sm font-medium text-gray-700">
                                Deskripsi <span class="text-red-500">*</span>
                            </label>
                            <textarea name="description" id="description" rows="4"
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm @error('description') border-red-300 @enderror"
                                placeholder="Deskripsikan fasilitas ini">{{ old('description', $facility->description) }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Lokasi -->
                        <div class="space-y-1">
                            <label for="location" class="block text-sm font-medium text-gray-700">
                                Lokasi <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="location" id="location"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm @error('location') border-red-300 @enderror"
                                placeholder="Masukkan lokasi fasilitas" value="{{ old('location', $facility->location) }}"
                                required>
                            @error('location')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Kapasitas -->
                            <div class="space-y-2">
                                <label for="capacity" class="block text-sm font-medium text-gray-700">
                                    Kapasitas <span class="text-red-500">*</span>
                                </label>
                                <input type="number" name="capacity" id="capacity"
                                    class="block w-full rounded-md border-gray-300 focus:border-green-500 focus:ring-green-500 sm:text-sm @error('capacity') border-red-300 @enderror"
                                    placeholder="Masukkan kapasitas fasilitas"
                                    value="{{ old('capacity', $facility->capacity) }}" required min="0">
                                @error('capacity')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div class="space-y-2">
                                <label for="status" class="block text-sm font-medium text-gray-700">
                                    Status <span class="text-red-500">*</span>
                                </label>
                                <select name="status" id="status"
                                    class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm @error('status') border-red-300 @enderror"
                                    required>
                                    <option value="available"
                                        {{ old('status', $facility->status) == 'available' ? 'selected' : '' }}>Tersedia
                                    </option>
                                    <option value="unavailable"
                                        {{ old('status', $facility->status) == 'unavailable' ? 'selected' : '' }}>Tidak
                                        Tersedia</option>
                                    <option value="maintenance"
                                        {{ old('status', $facility->status) == 'maintenance' ? 'selected' : '' }}>Dalam
                                        Perbaikan</option>
                                </select>
                                @error('status')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex items-center justify-end space-x-4 pt-4">
                            <a href="{{ route('facilities.index') }}"
                                class="inline-flex justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                                Batal
                            </a>
                            <button type="submit"
                                class="inline-flex justify-center rounded-md border border-transparent bg-green-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                                Perbarui Fasilitas
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
