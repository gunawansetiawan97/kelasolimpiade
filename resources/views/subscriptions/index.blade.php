@extends('layouts.app')

@section('title', 'Paket Langganan')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="text-center mb-10">
        <h1 class="text-3xl font-bold mb-4">Pilih Paket Langganan</h1>
        <p class="text-gray-600">Dapatkan akses ke semua paket soal dengan berlangganan</p>
    </div>

    @if($userSubscription)
        <div class="bg-green-50 border border-green-200 rounded-lg p-6 mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="font-semibold text-green-800">Anda memiliki langganan aktif</h3>
                    <p class="text-green-600">{{ $userSubscription->subscription->name }} - Berlaku hingga {{ $userSubscription->expires_at->format('d M Y') }}</p>
                </div>
                <a href="{{ route('subscriptions.my') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                    Lihat Detail
                </a>
            </div>
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse($subscriptions as $subscription)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <div class="p-6 border-b bg-gradient-to-r from-blue-500 to-blue-600 text-white">
                    <h3 class="text-xl font-bold mb-2">{{ $subscription->name }}</h3>
                    <div class="text-3xl font-bold">
                        {{ $subscription->formatted_price }}
                        <span class="text-sm font-normal">/ {{ $subscription->duration_days }} hari</span>
                    </div>
                </div>
                <div class="p-6">
                    @if($subscription->description)
                        <p class="text-gray-600 mb-4">{{ $subscription->description }}</p>
                    @endif

                    @if($subscription->features && count($subscription->features) > 0)
                        <ul class="space-y-2 mb-6">
                            @foreach($subscription->features as $feature)
                                <li class="flex items-center text-gray-700">
                                    <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    {{ $feature }}
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    @auth
                        <form action="{{ route('cart.add.subscription', $subscription) }}" method="POST">
                            @csrf
                            @if($userSubscription && $userSubscription->subscription_id === $subscription->id)
                                <button type="submit" class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition-colors">
                                    Perpanjang Langganan
                                </button>
                            @else
                                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition-colors">
                                    Pilih Paket
                                </button>
                            @endif
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="block w-full text-center bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition-colors">
                            Login untuk Berlangganan
                        </a>
                    @endauth
                </div>
            </div>
        @empty
            <div class="col-span-3 text-center py-10">
                <p class="text-gray-500">Belum ada paket langganan tersedia</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
