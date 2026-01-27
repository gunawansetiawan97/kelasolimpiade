@extends('layouts.app')

@section('title', 'Konfirmasi Selesai')

@section('content')
<div class="max-w-lg mx-auto">
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold mb-4">Selesaikan Ujian?</h1>

        <p class="text-gray-600 mb-4">Anda akan menyelesaikan ujian <strong>{{ $package->title }}</strong>.</p>

        @if($unansweredCount > 0)
            <div class="bg-yellow-50 border border-yellow-200 rounded p-4 mb-4">
                <p class="text-yellow-800">
                    <strong>Perhatian!</strong> Masih ada <strong>{{ $unansweredCount }}</strong> soal yang belum dijawab.
                </p>
            </div>
        @endif

        <p class="text-gray-600 mb-6">Setelah selesai, Anda tidak dapat mengubah jawaban lagi.</p>

        <div class="flex space-x-4">
            <a href="{{ route('student.exam.question', ['package' => $package, 'question' => $package->questions()->orderBy('order')->first()]) }}"
                class="flex-1 py-2 text-center border rounded-lg hover:bg-gray-50">
                Kembali ke Soal
            </a>
            <form action="{{ route('student.exam.finish', $package) }}" method="POST" class="flex-1">
                @csrf
                <button type="submit" class="w-full py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                    Ya, Selesaikan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
