@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-white py-8">
        <div class="mx-auto px-4 sm:px-6 lg:px-8">
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
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <a href="{{ route('profile.index') }}" class="text-gray-700 hover:text-blue-600">
                                Profile
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
                            <span class="text-gray-500 ml-1 md:ml-2">
                                Edit Profile
                            </span>
                        </div>
                    </li>
                </ol>
            </nav>
            <div class="flex justify-between items-center mb-8">
                <div class="flex items-center space-x-3">
                    <div class="bg-blue-500 p-2 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Edit Profil</h2>
                        <p class="text-gray-500 text-sm">Lengkapi informasi akun Anda</p>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <a href="{{ route('profile.index') }}"
                        class="inline-flex items-center px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Kembali
                    </a>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-xl overflow-hidden transition-all duration-200 hover:shadow-2xl">
                <div class="p-6 sm:p-8">
                    <form action="{{ route('profile.update') }}" method="POST" class="space-y-6"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        @php
                            $name = auth()->user()->name;
                            $initials = collect(explode(' ', $name))
                                ->map(function ($segment) {
                                    return strtoupper(substr($segment, 0, 1));
                                })
                                ->take(2)
                                ->join('');
                        @endphp

                        <div class="flex justify-center">
                            <div class="relative group">
                                <!-- Profile Image or Initials -->
                                <div
                                    class="relative overflow-hidden transition-all duration-300 ease-in-out transform hover:scale-105">
                                    @if (auth()->user()->image)
                                        <img src="{{ asset('storage/images/users/' . auth()->user()->image) }}"
                                            alt="Profile Image"
                                            class="w-32 h-32 rounded-full object-cover border-4 border-blue-500/50 hover:border-blue-600 transition-colors duration-300">
                                    @else
                                        <div
                                            class="w-32 h-32 rounded-full border-4 border-blue-500/50 hover:border-blue-600 bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center transition-all duration-300">
                                            <span class="text-2xl font-bold text-white">{{ $initials }}</span>
                                        </div>
                                    @endif

                                    <!-- Overlay on Hover -->
                                    <div
                                        class="absolute inset-0 bg-black/20 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    </div>
                                </div>

                                <!-- Camera Icon Button -->
                                <label for="image"
                                    class="absolute -right-2 -bottom-2 bg-blue-600 hover:bg-blue-700 text-white p-2 rounded-full cursor-pointer shadow-lg transform hover:scale-110 transition-all duration-300 group-hover:-translate-y-1">
                                    <i class="fas fa-camera text-lg"></i>
                                    <input type="file" name="image" id="image" class="hidden" accept="image/*"
                                        onchange="previewImage(event)">
                                </label>

                                <!-- Loading Indicator (Hidden by default) -->
                                <div id="loading-indicator"
                                    class="hidden absolute inset-0 bg-white/80 rounded-full flex items-center justify-center">
                                    <i class="fas fa-spinner fa-spin text-blue-600 text-xl"></i>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                                <input type="text" name="name" id="name"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                                    value="{{ old('name', auth()->user()->name) }}" required>
                                @error('name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" id="email"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                                    value="{{ old('email', auth()->user()->email) }}" disabled>
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                                <textarea name="address" id="address" rows="4"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500">{{ old('address', auth()->user()->address) }}</textarea>
                                @error('address')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone
                                    Number</label>
                                <input type="tel" name="phone_number" id="phone_number"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                                    value="{{ old('phone_number', auth()->user()->phone_number) }}">
                                @error('phone_number')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Date of
                                    Birth</label>
                                <input type="date" name="date_of_birth" id="date_of_birth"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                                    value="{{ old('date_of_birth', auth()->user()->date_of_birth) }}">
                                @error('date_of_birth')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                                <select name="gender" id="gender"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                                    <option value="male"
                                        {{ old('gender', auth()->user()->gender) == 'male' ? 'selected' : '' }}>Male
                                    </option>
                                    <option value="female"
                                        {{ old('gender', auth()->user()->gender) == 'female' ? 'selected' : '' }}>Female
                                    </option>
                                </select>
                                @error('gender')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="inline-flex items-center px-6 py-2 text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                const imgElement = event.target.closest('.relative').querySelector('img, div');
                const loadingIndicator = document.getElementById('loading-indicator');

                // Show loading indicator
                loadingIndicator.classList.remove('hidden');

                reader.onload = function(e) {
                    // Common image classes for circular shape and styling
                    const imageClasses =
                        'w-32 h-32 rounded-full object-cover border-4 border-blue-500/50 hover:border-blue-600 transition-colors duration-300';

                    // If there's no img element, create one to replace the initials div
                    if (imgElement.tagName === 'DIV') {
                        const newImg = document.createElement('img');
                        newImg.className = imageClasses;
                        newImg.alt = 'Profile Image';
                        newImg.src = e.target.result;
                        imgElement.parentNode.replaceChild(newImg, imgElement);
                    } else {
                        // Update existing image classes and source
                        imgElement.className = imageClasses;
                        imgElement.src = e.target.result;
                    }

                    // Hide loading indicator
                    loadingIndicator.classList.add('hidden');
                }

                reader.readAsDataURL(file);
            }
        }
    </script>
@endpush
