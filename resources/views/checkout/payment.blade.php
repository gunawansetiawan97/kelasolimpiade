@extends('layouts.app')

@section('title', 'Upload Bukti Pembayaran')

@section('content')
<div class="max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold mb-6">Upload Bukti Pembayaran</h1>

    <div class="bg-white rounded-lg shadow overflow-hidden mb-6">
        <div class="px-6 py-4 border-b bg-gray-50">
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-lg">Pesanan #{{ $order->order_number }}</h2>
                <span class="px-3 py-1 text-sm font-semibold rounded-full bg-yellow-100 text-yellow-800">
                    Menunggu Pembayaran
                </span>
            </div>
        </div>

        <div class="p-6">
            <div class="mb-6">
                <p class="text-gray-600 mb-2">Total Pembayaran:</p>
                <p class="text-3xl font-bold text-green-600">{{ $order->formatted_total }}</p>
            </div>

            <div class="mb-6 p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                <p class="text-sm text-yellow-800">
                    <strong>Batas waktu pembayaran:</strong><br>
                    {{ $order->expires_at->format('d M Y H:i') }} WIB
                </p>
            </div>

            <div class="mb-6">
                <p class="font-semibold mb-3">Transfer ke salah satu rekening berikut:</p>
                @foreach($bankAccounts as $bank)
                    <div class="mb-3 p-3 border rounded-lg">
                        <p class="font-semibold">{{ $bank['bank'] }}</p>
                        <p class="text-lg font-mono">{{ $bank['account_number'] }}</p>
                        <p class="text-sm text-gray-600">a.n. {{ $bank['account_name'] }}</p>
                    </div>
                @endforeach
            </div>

            <form action="{{ route('checkout.upload-proof', $order) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Upload Bukti Transfer
                    </label>
                    <input type="file" name="proof_image" accept="image/*" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 @error('proof_image') border-red-500 @enderror">
                    @error('proof_image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG. Maksimal 2MB</p>
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 font-medium">
                    Upload Bukti Pembayaran
                </button>
            </form>
        </div>
    </div>

    <div class="text-center">
        <a href="{{ route('orders.index') }}" class="text-blue-600 hover:text-blue-800">
            Lihat Semua Pesanan
        </a>
    </div>
</div>
@endsection
