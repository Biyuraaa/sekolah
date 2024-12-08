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
                            <svg class="w-5 h-5 text-gray-400 mx-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-500 ml-1 md:ml-2">Hasil Ujian</span>
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

        </div>
    </div>
@endsection
