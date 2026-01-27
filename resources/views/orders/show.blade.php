@extends('layouts.app')

@section('title', 'Detail Pesanan')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Detail Pesanan</h1>
        <a href="{{ route('orders.index') }}" class="text-blue-600 hover:text-blue-800">&larr; Kembali</a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden mb-6">
        <div class="px-6 py-4 border-b bg-gray-50">
            <div class="flex justify-between items-center">
                <div>
                    <p class="font-semibold text-lg">#{{ $order->order_number }}</p>
                    <p class="text-sm text-gray-500">{{ $order->created_at->format('d M Y H:i') }}</p>
                </div>
                <div>
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
        </div>

        <!-- Order Items -->
        <div class="divide-y">
            @foreach($order->items as $item)
                <div class="px-6 py-4 flex justify-between items-center">
                    <div>
                        <p class="font-medium">{{ $item->orderable->title ?? $item->orderable->name ?? 'Item' }}</p>
                        @if($item->orderable_type === 'App\\Models\\QuestionPackage')
                            <span class="text-xs text-blue-600">Paket Soal</span>
                        @else
                            <span class="text-xs text-purple-600">Langganan</span>
                        @endif
                    </div>
                    <p class="font-medium">Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                </div>
            @endforeach
        </div>

        <div class="px-6 py-4 bg-gray-50">
            <div class="flex justify-between items-center">
                <span class="font-semibold">Total</span>
                <span class="text-xl font-bold text-green-600">{{ $order->formatted_total }}</span>
            </div>
        </div>
    </div>

    <!-- Payment Status -->
    @if($order->payment)
        <div class="bg-white rounded-lg shadow overflow-hidden mb-6">
            <div class="px-6 py-4 border-b bg-gray-50">
                <h2 class="font-semibold text-lg">Status Pembayaran</h2>
            </div>
            <div class="p-6">
                <div class="flex items-start space-x-4">
                    @if($order->payment->proof_image)
                        <img src="{{ Storage::url($order->payment->proof_image) }}" alt="Bukti pembayaran" class="w-32 h-32 object-cover rounded-lg border">
                    @endif
                    <div>
                        <p class="mb-2">
                            <span class="text-gray-600">Status:</span>
                            @if($order->payment->status === 'pending')
                                <span class="font-semibold text-yellow-600">Menunggu verifikasi admin</span>
                            @elseif($order->payment->status === 'verified')
                                <span class="font-semibold text-green-600">Terverifikasi</span>
                            @else
                                <span class="font-semibold text-red-600">Ditolak</span>
                            @endif
                        </p>
                        @if($order->payment->verified_at)
                            <p class="text-sm text-gray-500">
                                Diverifikasi pada: {{ $order->payment->verified_at->format('d M Y H:i') }}
                            </p>
                        @endif
                        @if($order->payment->admin_notes)
                            <p class="mt-2 p-3 bg-gray-100 rounded text-sm">
                                <strong>Catatan admin:</strong> {{ $order->payment->admin_notes }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Actions -->
    @if($order->status === 'pending')
        <div class="bg-white rounded-lg shadow p-6">
            @if(!$order->payment)
                <p class="text-gray-600 mb-4">Silakan selesaikan pembayaran sebelum {{ $order->expires_at->format('d M Y H:i') }} WIB</p>
                <div class="flex space-x-4">
                    <a href="{{ route('checkout.payment', $order) }}" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">
                        Upload Bukti Pembayaran
                    </a>
                    <form action="{{ route('orders.cancel', $order) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin membatalkan pesanan ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700">
                            Batalkan Pesanan
                        </button>
                    </form>
                </div>
            @elseif($order->payment->status === 'rejected')
                <p class="text-gray-600 mb-4">Bukti pembayaran Anda ditolak. Silakan upload ulang.</p>
                <a href="{{ route('checkout.payment', $order) }}" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">
                    Upload Ulang Bukti Pembayaran
                </a>
            @else
                <p class="text-gray-600">Bukti pembayaran Anda sedang diverifikasi. Mohon tunggu konfirmasi dari admin.</p>
            @endif
        </div>
    @endif
</div>
@endsection
