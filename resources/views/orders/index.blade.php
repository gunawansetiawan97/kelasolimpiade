@extends('layouts.app')

@section('title', 'Pesanan Saya')

@section('content')
<div class="max-w-4xl mx-auto">
    <h1 class="text-2xl font-bold mb-6">Pesanan Saya</h1>

    @if($orders->isEmpty())
        <div class="bg-white rounded-lg shadow p-8 text-center">
            <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
            </svg>
            <p class="text-gray-500 mb-4">Anda belum memiliki pesanan</p>
            <a href="{{ route('student.packages.index') }}" class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                Lihat Paket Soal
            </a>
        </div>
    @else
        <div class="space-y-4">
            @foreach($orders as $order)
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="px-6 py-4 border-b bg-gray-50 flex justify-between items-center">
                        <div>
                            <p class="font-semibold">#{{ $order->order_number }}</p>
                            <p class="text-sm text-gray-500">{{ $order->created_at->format('d M Y H:i') }}</p>
                        </div>
                        <div class="text-right">
                            @if($order->status === 'pending')
                                <span class="px-3 py-1 text-sm font-semibold rounded-full bg-yellow-100 text-yellow-800">Menunggu Pembayaran</span>
                            @elseif($order->status === 'paid')
                                <span class="px-3 py-1 text-sm font-semibold rounded-full bg-green-100 text-green-800">Lunas</span>
                            @elseif($order->status === 'cancelled')
                                <span class="px-3 py-1 text-sm font-semibold rounded-full bg-red-100 text-red-800">Dibatalkan</span>
                            @else
                                <span class="px-3 py-1 text-sm font-semibold rounded-full bg-gray-100 text-gray-800">Kadaluarsa</span>
                            @endif
                        </div>
                    </div>
                    <div class="px-6 py-4">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm text-gray-600">{{ $order->items->count() }} item</p>
                                @if($order->payment)
                                    <p class="text-xs mt-1">
                                        Status pembayaran:
                                        @if($order->payment->status === 'pending')
                                            <span class="text-yellow-600">Menunggu verifikasi</span>
                                        @elseif($order->payment->status === 'verified')
                                            <span class="text-green-600">Terverifikasi</span>
                                        @else
                                            <span class="text-red-600">Ditolak</span>
                                        @endif
                                    </p>
                                @endif
                            </div>
                            <div class="text-right">
                                <p class="text-lg font-bold">{{ $order->formatted_total }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="px-6 py-3 bg-gray-50 flex justify-between items-center">
                        <a href="{{ route('orders.show', $order) }}" class="text-blue-600 hover:text-blue-800 text-sm">
                            Lihat Detail
                        </a>
                        @if($order->status === 'pending' && !$order->payment)
                            <a href="{{ route('checkout.payment', $order) }}" class="bg-green-600 text-white px-4 py-1 rounded hover:bg-green-700 text-sm">
                                Bayar Sekarang
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $orders->links() }}
        </div>
    @endif
</div>
@endsection
