@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<div class="max-w-4xl mx-auto">
    <h1 class="text-2xl font-bold mb-6">Checkout</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Order Summary -->
        <div class="md:col-span-2">
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="px-6 py-4 border-b bg-gray-50">
                    <h2 class="font-semibold text-lg">Ringkasan Pesanan</h2>
                </div>
                <div class="divide-y">
                    @foreach($cartItems as $item)
                        <div class="px-6 py-4 flex justify-between items-center">
                            <div>
                                <p class="font-medium">{{ $item->cartable->title ?? $item->cartable->name ?? 'Item' }}</p>
                                @if($item->cartable_type === 'App\\Models\\QuestionPackage')
                                    <span class="text-xs text-blue-600">Paket Soal</span>
                                @else
                                    <span class="text-xs text-purple-600">Langganan {{ $item->cartable->duration_days ?? '' }} hari</span>
                                @endif
                            </div>
                            <p class="font-medium">Rp {{ number_format($item->cartable->price ?? 0, 0, ',', '.') }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="px-6 py-4 bg-gray-50 flex justify-between items-center">
                    <span class="font-semibold">Total</span>
                    <span class="text-xl font-bold text-green-600">Rp {{ number_format($total, 0, ',', '.') }}</span>
                </div>
            </div>
        </div>

        <!-- Payment Info -->
        <div class="md:col-span-1">
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="px-6 py-4 border-b bg-gray-50">
                    <h2 class="font-semibold text-lg">Pembayaran</h2>
                </div>
                <div class="p-6">
                    <div class="mb-4 p-3 bg-blue-50 border border-blue-200 rounded-lg">
                        <p class="text-sm text-blue-800 font-medium mb-2">Metode Pembayaran Tersedia:</p>
                        <ul class="text-xs text-blue-700 space-y-1">
                            <li>- Transfer Bank</li>
                            <li>- Virtual Account</li>
                            <li>- E-Wallet (OVO, DANA, dll)</li>
                            <li>- QRIS</li>
                        </ul>
                    </div>

                    <form action="{{ route('checkout.process') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-lg hover:bg-green-700 font-medium">
                            Lanjutkan ke Pembayaran
                        </button>
                    </form>

                    <p class="text-xs text-gray-500 mt-3 text-center">
                        Anda akan diarahkan ke halaman pembayaran
                    </p>
                </div>
            </div>

            <a href="{{ route('cart.index') }}" class="block text-center text-blue-600 hover:text-blue-800 mt-4">
                &larr; Kembali ke Keranjang
            </a>
        </div>
    </div>
</div>
@endsection
