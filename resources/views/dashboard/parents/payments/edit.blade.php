@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-white py-12">
        <div class="mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex mb-8" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-blue-600 inline-flex items-center">
                            <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                </path>
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <li class="inline-flex items-center">
                        <a href="{{ route('payments.index') }}"
                            class="text-gray-700 hover:text-blue-600 inline-flex items-center">
                            <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Tuition Payments
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-500 ml-1 md:ml-2 font-medium">
                                Edit Pembayaran
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
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">
                            Edit Pembayaran Tuition
                        </h2>
                        <p class="text-sm font-medium text-gray-500">
                            Edit detail pembayaran yang sudah dibuat
                        </p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('payments.index') }}"
                        class="inline-flex items-center px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        <span>Kembali</span>
                    </a>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-xl overflow-hidden transition-all duration-200 hover:shadow-2xl">
                <div class="p-6 sm:p-8">
                    <form action="{{ route('payments.update', $payment->id) }}" method="POST" enctype="multipart/form-data"
                        class="space-y-6">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="parent_id" value="{{ $payment->parent_id }}">

                        <!-- Amount Input dengan Formatting Mata Uang -->
                        <div class="space-y-2">
                            <label for="amount" class="block text-sm font-medium text-gray-700">
                                Jumlah Pembayaran <span class="text-red-500">*</span>
                            </label>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                    <span class="text-gray-500 sm:text-sm">Rp</span>
                                </div>
                                <input type="number" name="amount" id="amount"
                                    class="block w-full rounded-md @error('amount') border-red-500 @else border-gray-300 @enderror pl-12 pr-12 focus:border-green-500 focus:ring-green-500 sm:text-sm"
                                    placeholder="0.00" value="{{ old('amount', $payment->amount) }}" required step="0.01"
                                    min="0" x-model.number="amount" x-on:input="formatCurrency">
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                    <span class="text-gray-500 sm:text-sm">.00</span>
                                </div>
                            </div>
                            @error('amount')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Purpose Input -->
                        <div class="space-y-1">
                            <label for="purpose" class="block text-sm font-medium text-gray-700">
                                Tujuan Pembayaran <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="purpose" id="purpose"
                                class="mt-1 block w-full rounded-md @error('purpose') border-red-500 @else border-gray-300 @enderror shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm"
                                placeholder="Contoh: SPP Bulan Januari 2024" value="{{ old('purpose', $payment->purpose) }}"
                                required maxlength="255">
                            @error('purpose')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-1">
                            <label for="payment_method" class="block text-sm font-medium text-gray-700">
                                Metode Pembayaran <span class="text-red-500">*</span>
                            </label>
                            <select name="payment_method" id="payment_method"
                                class="mt-1 block w-full rounded-md @error('payment_method') border-red-500 @else border-gray-300 @enderror shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm"
                                required>
                                <option value="">Pilih Metode Pembayaran</option>
                                <option value="cash"
                                    {{ old('payment_method', $payment->payment_method) == 'cash' ? 'selected' : '' }}>Tunai
                                    (Cash)</option>
                                <option value="transfer"
                                    {{ old('payment_method', $payment->payment_method) == 'transfer' ? 'selected' : '' }}>
                                    Transfer Bank</option>
                                <option value="e-wallet"
                                    {{ old('payment_method', $payment->payment_method) == 'e-wallet' ? 'selected' : '' }}>
                                    E-Wallet</option>
                            </select>
                            @error('payment_method')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Bulan dan Tahun Pembayaran -->
                        <div class="grid grid-cols-2 gap-4">
                            <div class="space-y-1">
                                <label for="month" class="block text-sm font-medium text-gray-700">
                                    Bulan Pembayaran <span class="text-red-500">*</span>
                                </label>
                                <select name="month" id="month"
                                    class="mt-1 block w-full rounded-md @error('month') border-red-500 @else border-gray-300 @enderror shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm"
                                    required>
                                    <option value="">Pilih Bulan</option>
                                    <option value="january"
                                        {{ old('month', $payment->month) == 'january' ? 'selected' : '' }}>Januari</option>
                                    <option value="february"
                                        {{ old('month', $payment->month) == 'february' ? 'selected' : '' }}>Februari
                                    </option>
                                    <option value="march"
                                        {{ old('month', $payment->month) == 'march' ? 'selected' : '' }}>Maret</option>
                                    <option value="april"
                                        {{ old('month', $payment->month) == 'april' ? 'selected' : '' }}>April</option>
                                    <option value="may" {{ old('month', $payment->month) == 'may' ? 'selected' : '' }}>
                                        Mei</option>
                                    <option value="june"
                                        {{ old('month', $payment->month) == 'june' ? 'selected' : '' }}>Juni</option>
                                    <option value="july"
                                        {{ old('month', $payment->month) == 'july' ? 'selected' : '' }}>Juli</option>
                                    <option value="august"
                                        {{ old('month', $payment->month) == 'august' ? 'selected' : '' }}>Agustus</option>
                                    <option value="september"
                                        {{ old('month', $payment->month) == 'september' ? 'selected' : '' }}>September
                                    </option>
                                    <option value="october"
                                        {{ old('month', $payment->month) == 'october' ? 'selected' : '' }}>Oktober</option>
                                    <option value="november"
                                        {{ old('month', $payment->month) == 'november' ? 'selected' : '' }}>November
                                    </option>
                                    <option value="december"
                                        {{ old('month', $payment->month) == 'december' ? 'selected' : '' }}>Desember
                                    </option>
                                </select>
                                @error('month')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="space-y-1">
                                <label for="year" class="block text-sm font-medium text-gray-700">
                                    Tahun Pembayaran <span class="text-red-500">*</span>
                                </label>
                                <select name="year" id="year"
                                    class="mt-1 block w-full rounded-md @error('year') border-red-500 @else border-gray-300 @enderror shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm"
                                    required>
                                    <option value="">Pilih Tahun</option>
                                    @php
                                        $currentYear = date('Y');
                                        $previousYear = $currentYear - 1;
                                        $nextYear = $currentYear + 1;
                                    @endphp
                                    <option value="{{ $previousYear }}"
                                        {{ old('year', $payment->year) == $previousYear ? 'selected' : '' }}>
                                        {{ $previousYear }}</option>
                                    <option value="{{ $currentYear }}"
                                        {{ old('year', $payment->year) == $currentYear ? 'selected' : '' }}>
                                        {{ $currentYear }}</option>
                                    <option value="{{ $nextYear }}"
                                        {{ old('year', $payment->year) == $nextYear ? 'selected' : '' }}>
                                        {{ $nextYear }}</option>
                                </select>
                                @error('year')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- File Upload dengan Preview -->
                        <div class="space-y-1">
                            <label for="proof_of_payment" class="block text-sm font-medium text-gray-700">
                                Bukti Pembayaran <span class="text-red-500">*</span>
                            </label>
                            <div x-data="{ file: null }"
                                class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 @error('proof_of_payment') border-red-500 @else border-gray-300 @enderror border-dashed rounded-md">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                        viewBox="0 0 48 48">
                                        <path
                                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                        <label for="proof_of_payment"
                                            class="relative cursor-pointer rounded-md font-medium text-green-600 hover:text-green-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-green-500">
                                            <span>Unggah file</span>
                                            <input id="proof_of_payment" name="proof_of_payment" type="file"
                                                class="sr-only" accept="image/png,image/jpeg,image/gif"
                                                x-on:change="file = $event.target.files[0]">
                                        </label>
                                        <p class="pl-1">atau drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, GIF sampai 10MB</p>

                                    <!-- Tampilkan gambar yang sudah ada -->
                                    @if ($payment->proof_of_payment)
                                        <div class="mt-4">
                                            <p class="text-sm font-medium text-gray-700 mb-2">Bukti Pembayaran Saat Ini:
                                            </p>
                                            <img src="{{ Storage::url($payment->proof_of_payment) }}"
                                                alt="Bukti Pembayaran" class="mx-auto max-h-48 rounded-lg shadow-md">
                                        </div>
                                    @endif

                                    <template x-if="file">
                                        <p x-text="file.name" class="mt-2 text-sm text-gray-500"></p>
                                    </template>
                                </div>
                            </div>
                            @error('proof_of_payment')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="flex items-center justify-end space-x-4 pt-4">
                            <a href="{{ route('payments.index') }}"
                                class="inline-flex justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                                Batal
                            </a>
                            <button type="submit"
                                class="inline-flex justify-center rounded-md border border-transparent bg-green-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
