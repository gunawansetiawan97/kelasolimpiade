@extends('layouts.app')

@section('title', 'Langganan Saya')

@section('content')
<div class="max-w-4xl mx-auto">
    <h1 class="text-2xl font-bold mb-6">Langganan Saya</h1>

    @if($userSubscriptions->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($userSubscriptions as $userSubscription)
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="p-6 border-b bg-gradient-to-r from-blue-500 to-blue-600 text-white">
                        <h2 class="text-xl font-bold">{{ $userSubscription->subscription->name }}</h2>
                        <p class="text-blue-100">Langganan Aktif</p>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div>
                                <p class="text-gray-600 text-sm">Mulai</p>
                                <p class="font-semibold">{{ $userSubscription->starts_at->format('d M Y') }}</p>
                            </div>
                            <div>
                                <p class="text-gray-600 text-sm">Berakhir</p>
                                <p class="font-semibold">{{ $userSubscription->expires_at->format('d M Y') }}</p>
                            </div>
                        </div>

                        <div class="mb-6">
                            <p class="text-gray-600 text-sm mb-2">Sisa Waktu</p>
                            <div class="flex items-center">
                                <div class="text-3xl font-bold text-blue-600">{{ $userSubscription->remaining_days }}</div>
                                <div class="ml-2 text-gray-600">hari lagi</div>
                            </div>
                        </div>

                        @if($userSubscription->subscription->features && count($userSubscription->subscription->features) > 0)
                            <div>
                                <p class="text-gray-600 text-sm mb-2">Fitur:</p>
                                <ul class="space-y-1">
                                    @foreach($userSubscription->subscription->features as $feature)
                                        <li class="flex items-center text-gray-700 text-sm">
                                            <svg class="h-4 w-4 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            {{ $feature }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="px-6 py-4 bg-gray-50">
                        <a href="{{ route('subscriptions.index') }}" class="text-blue-600 hover:text-blue-800 text-sm">
                            Perpanjang Langganan &rarr;
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6 text-center">
            <a href="{{ route('student.packages.index') }}" class="text-blue-600 hover:text-blue-800">
                Lihat Semua Paket Soal &rarr;
            </a>
        </div>
    @else
        <div class="bg-white rounded-lg shadow p-8 text-center">
            <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <p class="text-gray-500 mb-4">Anda belum memiliki langganan aktif</p>
            <a href="{{ route('subscriptions.index') }}" class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                Lihat Paket Langganan
            </a>
        </div>
    @endif
</div>
@endsection
