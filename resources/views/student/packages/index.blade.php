@extends('layouts.app')

@section('title', 'Paket Soal')

@section('content')
<h1 class="text-2xl font-bold mb-6">Paket Soal</h1>

@if($activePackages->count() > 0)
    <div class="mb-8">
        <h2 class="text-lg font-bold mb-4 text-green-600">Paket Aktif</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($activePackages as $package)
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="font-bold text-lg">{{ $package->title }}</h3>
                        <div class="flex flex-col items-end">
                            @if($package->is_free)
                                <span class="px-2 py-1 text-xs rounded bg-green-100 text-green-800">Gratis</span>
                            @else
                                <span class="font-bold text-blue-600">{{ $package->formatted_price }}</span>
                            @endif
                            @if(in_array($package->id, $attemptedPackageIds))
                                <span class="px-2 py-1 text-xs rounded bg-green-100 text-green-800 mt-1">Sudah Dikerjakan</span>
                            @endif
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm mb-4">{{ Str::limit($package->description, 100) }}</p>
                    <div class="text-sm text-gray-500 mb-4">
                        <p>{{ $package->questions_count }} soal | {{ $package->duration_minutes }} menit</p>
                        <p>Berakhir: {{ $package->end_date->format('d/m/Y H:i') }}</p>
                    </div>
                    @if(Auth::user()->hasAccessToPackage($package))
                        <a href="{{ route('student.packages.show', $package) }}"
                            class="block text-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            {{ in_array($package->id, $attemptedPackageIds) ? 'Lihat Hasil' : 'Kerjakan' }}
                        </a>
                    @else
                        <form action="{{ route('cart.add.package', $package) }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                                <svg class="inline h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                                Tambah ke Keranjang
                            </button>
                        </form>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endif

@if($upcomingPackages->count() > 0)
    <div class="mb-8">
        <h2 class="text-lg font-bold mb-4 text-blue-600">Akan Datang</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($upcomingPackages as $package)
                <div class="bg-white rounded-lg shadow p-6 opacity-75">
                    <h3 class="font-bold text-lg mb-2">{{ $package->title }}</h3>
                    <p class="text-gray-600 text-sm mb-4">{{ Str::limit($package->description, 100) }}</p>
                    <div class="text-sm text-gray-500 mb-4">
                        <p>{{ $package->questions_count }} soal | {{ $package->duration_minutes }} menit</p>
                        <p>Mulai: {{ $package->start_date->format('d/m/Y H:i') }}</p>
                    </div>
                    <button disabled class="block w-full text-center px-4 py-2 bg-gray-300 text-gray-500 rounded cursor-not-allowed">
                        Belum Tersedia
                    </button>
                </div>
            @endforeach
        </div>
    </div>
@endif

@if($pastPackages->count() > 0)
    <div class="mb-8">
        <h2 class="text-lg font-bold mb-4 text-gray-600">Paket Lama (Mode Latihan)</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($pastPackages as $package)
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="font-bold text-lg mb-2">{{ $package->title }}</h3>
                    <p class="text-gray-600 text-sm mb-4">{{ Str::limit($package->description, 100) }}</p>
                    <div class="text-sm text-gray-500 mb-4">
                        <p>{{ $package->questions_count }} soal</p>
                        <p class="text-yellow-600">Mode latihan - tidak dihitung nilai</p>
                    </div>
                    <a href="{{ route('student.packages.show', $package) }}"
                        class="block text-center px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                        Latihan
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endif

@if($activePackages->count() === 0 && $upcomingPackages->count() === 0 && $pastPackages->count() === 0)
    <div class="bg-white rounded-lg shadow p-8 text-center">
        <p class="text-gray-500">Belum ada paket soal tersedia.</p>
    </div>
@endif
@endsection
