@extends('layouts.app')

@section('title', 'Riwayat Latihan')

@section('content')
<h1 class="text-2xl font-bold mb-6">Riwayat Latihan</h1>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Paket Soal</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Waktu Mulai</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Waktu Selesai</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($attempts as $attempt)
                <tr>
                    <td class="px-6 py-4">{{ $attempt->package->title }}</td>
                    <td class="px-6 py-4">{{ $attempt->started_at->format('d/m/Y H:i') }}</td>
                    <td class="px-6 py-4">{{ $attempt->finished_at?->format('d/m/Y H:i') ?? '-' }}</td>
                    <td class="px-6 py-4">
                        @if($attempt->finished_at)
                            <span class="px-2 py-1 text-xs rounded bg-green-100 text-green-800">Selesai</span>
                        @else
                            <span class="px-2 py-1 text-xs rounded bg-yellow-100 text-yellow-800">Berlangsung</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        @if($attempt->finished_at)
                            <a href="{{ route('student.practice.result', $attempt) }}" class="text-blue-600 hover:underline">Lihat Hasil</a>
                        @else
                            <a href="{{ route('student.practice.question', ['attempt' => $attempt, 'question' => $attempt->package->questions()->orderBy('order')->first()]) }}"
                                class="text-blue-600 hover:underline">Lanjutkan</a>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">Belum ada riwayat latihan</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-4">
    {{ $attempts->links() }}
</div>
@endsection
