@extends('layouts.app')

@section('title', 'Pembayaran')

@section('content')
<div class="max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold mb-6">Pembayaran</h1>

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

            @if($order->payment->xendit_expiry_date)
            <div class="mb-6 p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                <p class="text-sm text-yellow-800">
                    <strong>Batas waktu pembayaran:</strong><br>
                    {{ $order->payment->xendit_expiry_date->format('d M Y H:i') }} WIB
                </p>
            </div>
            @endif

            <div class="mb-6">
                <h3 class="font-semibold mb-3">Item Pesanan:</h3>
                @foreach($order->items as $item)
                    <div class="flex justify-between items-center py-2 border-b last:border-b-0">
                        <div>
                            <p class="font-medium">{{ $item->name }}</p>
                            <p class="text-sm text-gray-500">{{ ucfirst($item->item_type) }}</p>
                        </div>
                        <p class="font-semibold">Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                    </div>
                @endforeach
            </div>

            <div class="space-y-3">
                <a href="{{ $order->payment->xendit_invoice_url }}"
                   target="_blank"
                   class="block w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 font-medium text-center">
                    Bayar Sekarang
                </a>

                <p class="text-center text-sm text-gray-500">
                    Anda akan diarahkan ke halaman pembayaran Xendit
                </p>
            </div>
        </div>
    </div>

    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
        <h3 class="font-semibold text-blue-800 mb-2">Metode Pembayaran Tersedia:</h3>
        <ul class="text-sm text-blue-700 space-y-1">
            <li>- Transfer Bank (BCA, BNI, BRI, Mandiri, Permata)</li>
            <li>- Virtual Account</li>
            <li>- E-Wallet (OVO, DANA, LinkAja, ShopeePay)</li>
            <li>- QRIS</li>
            <li>- Kartu Kredit/Debit</li>
        </ul>
    </div>

    <div class="text-center">
        <a href="{{ route('orders.index') }}" class="text-blue-600 hover:text-blue-800">
            Lihat Semua Pesanan
        </a>
    </div>
</div>
@endsection
