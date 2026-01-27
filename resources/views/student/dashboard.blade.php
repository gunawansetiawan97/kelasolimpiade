@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<h1 class="text-2xl font-bold mb-6">Selamat Datang, {{ $user->name }}!</h1>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-lg font-bold mb-4">Paket Soal Aktif</h2>
        @forelse($activePackages as $package)
            <div class="border-b py-3 last:border-b-0">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="font-medium">{{ $package->title }}</h3>
                        <p class="text-sm text-gray-500">{{ $package->questions_count }} soal | {{ $package->duration_minutes }} menit</p>
                        <p class="text-sm text-gray-500">Berakhir: {{ $package->end_date->format('d/m/Y H:i') }}</p>
                    </div>
                    <a href="{{ route('student.packages.show', $package) }}"
                        class="px-4 py-2 bg-blue-600 text-white text-sm rounded hover:bg-blue-700">
                        Kerjakan
                    </a>
                </div>
            </div>
        @empty
            <p class="text-gray-500">Tidak ada paket soal aktif saat ini.</p>
        @endforelse
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-lg font-bold mb-4">Pengerjaan Terakhir</h2>
        @forelse($recentAttempts as $attempt)
            <div class="border-b py-3 last:border-b-0">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="font-medium">{{ $attempt->package->title }}</h3>
                        <p class="text-sm text-gray-500">{{ $attempt->started_at->format('d/m/Y H:i') }}</p>
                    </div>
                    <div class="text-right">
                        @if($attempt->finished_at)
                            <p class="font-bold text-green-600">Skor: {{ $attempt->score }}</p>
                            <a href="{{ route('student.exam.result', $attempt) }}" class="text-sm text-blue-600 hover:underline">Lihat Hasil</a>
                        @else
                            <span class="px-2 py-1 text-xs rounded bg-yellow-100 text-yellow-800">Berlangsung</span>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <p class="text-gray-500">Belum ada pengerjaan.</p>
        @endforelse
    </div>
</div>

<div class="bg-white rounded-lg shadow p-6">
    <h2 class="text-lg font-bold mb-4">Riwayat Latihan Terakhir</h2>
    @forelse($practiceHistory as $practice)
        <div class="border-b py-3 last:border-b-0">
            <div class="flex justify-between items-center">
                <div>
                    <h3 class="font-medium">{{ $practice->package->title }}</h3>
                    <p class="text-sm text-gray-500">{{ $practice->started_at->format('d/m/Y H:i') }}</p>
                </div>
                <a href="{{ route('student.practice.result', $practice) }}" class="text-sm text-blue-600 hover:underline">Lihat</a>
            </div>
        </div>
    @empty
        <p class="text-gray-500">Belum ada latihan.</p>
    @endforelse

    <div class="mt-4">
        <a href="{{ route('student.practice.history') }}" class="text-blue-600 hover:underline">Lihat semua riwayat latihan</a>
    </div>
</div>
@endsection
