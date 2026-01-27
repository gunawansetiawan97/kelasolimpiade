@extends('layouts.app')

@section('title', $package->title)

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold mb-2">{{ $package->title }}</h1>
        <p class="text-gray-600 mb-6">{{ $package->description }}</p>

        <div class="grid grid-cols-2 gap-4 mb-6">
            <div class="bg-gray-50 p-4 rounded">
                <p class="text-gray-500 text-sm">Jumlah Soal</p>
                <p class="text-2xl font-bold">{{ $package->getQuestionCount() }}</p>
            </div>
            <div class="bg-gray-50 p-4 rounded">
                <p class="text-gray-500 text-sm">Durasi</p>
                <p class="text-2xl font-bold">{{ $package->duration_minutes }} menit</p>
            </div>
            <div class="bg-gray-50 p-4 rounded">
                <p class="text-gray-500 text-sm">Total Poin</p>
                <p class="text-2xl font-bold">{{ $package->getTotalPoints() }}</p>
            </div>
            <div class="bg-gray-50 p-4 rounded">
                <p class="text-gray-500 text-sm">Status</p>
                <p class="text-xl font-bold">
                    @if($package->isActive())
                        <span class="text-green-600">Aktif</span>
                    @elseif($package->isUpcoming())
                        <span class="text-blue-600">Akan Datang</span>
                    @else
                        <span class="text-gray-600">Mode Latihan</span>
                    @endif
                </p>
            </div>
        </div>

        @if($attempt && $attempt->finished_at)
            <div class="bg-green-50 border border-green-200 rounded p-4 mb-6">
                <h3 class="font-bold text-green-800 mb-2">Anda sudah menyelesaikan ujian ini</h3>
                <p class="text-green-700">Skor: {{ $attempt->score }} / {{ $package->getTotalPoints() }}</p>
                <a href="{{ route('student.exam.result', $attempt) }}" class="mt-2 inline-block text-green-600 hover:underline">Lihat hasil lengkap</a>
            </div>

            @if($package->isPast())
                <form action="{{ route('student.practice.start', $package) }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full py-3 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 font-medium">
                        Latihan Lagi (Tidak Dihitung Nilai)
                    </button>
                </form>
            @endif
        @elseif($package->isActive())
            @if($attempt && !$attempt->finished_at)
                <div class="bg-yellow-50 border border-yellow-200 rounded p-4 mb-6">
                    <p class="text-yellow-800">Anda sedang mengerjakan ujian ini. Sisa waktu akan dihitung dari waktu mulai.</p>
                </div>
                <a href="{{ route('student.exam.question', ['package' => $package, 'question' => $package->questions()->orderBy('order')->first()]) }}"
                    class="block w-full py-3 bg-blue-600 text-white text-center rounded-lg hover:bg-blue-700 font-medium">
                    Lanjutkan Ujian
                </a>
            @else
                <form action="{{ route('student.exam.start', $package) }}" method="POST"
                    onsubmit="return confirm('Yakin ingin memulai ujian? Timer akan dimulai setelah Anda menekan OK.')">
                    @csrf
                    <button type="submit" class="w-full py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-medium">
                        Mulai Ujian
                    </button>
                </form>
            @endif
        @elseif($package->isUpcoming())
            <div class="bg-blue-50 border border-blue-200 rounded p-4 mb-6">
                <p class="text-blue-800">Paket soal ini akan tersedia pada {{ $package->start_date->format('d/m/Y H:i') }}</p>
            </div>
        @else
            <form action="{{ route('student.practice.start', $package) }}" method="POST">
                @csrf
                <button type="submit" class="w-full py-3 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 font-medium">
                    Mulai Latihan (Tidak Dihitung Nilai)
                </button>
            </form>
        @endif

        <a href="{{ route('student.packages.index') }}" class="block text-center mt-4 text-gray-600 hover:underline">
            Kembali ke daftar paket soal
        </a>
    </div>
</div>
@endsection
