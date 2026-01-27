@extends('layouts.app')

@section('title', 'Hasil Ujian')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-lg shadow p-6 mb-6">
        <h1 class="text-2xl font-bold mb-2">Hasil Ujian</h1>
        <p class="text-gray-600">{{ $attempt->package->title }}</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-white rounded-lg shadow p-6 text-center">
            <p class="text-gray-500 text-sm">Skor Anda</p>
            <p class="text-4xl font-bold text-blue-600">{{ $attempt->score ?? 0 }}</p>
            <p class="text-gray-500">dari {{ $attempt->package->getTotalPoints() }} poin</p>
        </div>
        <div class="bg-white rounded-lg shadow p-6 text-center">
            <p class="text-gray-500 text-sm">Persentase</p>
            <p class="text-4xl font-bold">
                {{ $attempt->package->getTotalPoints() > 0 ? round(($attempt->score ?? 0) / $attempt->package->getTotalPoints() * 100) : 0 }}%
            </p>
        </div>
        <div class="bg-white rounded-lg shadow p-6 text-center">
            <p class="text-gray-500 text-sm">Waktu Pengerjaan</p>
            <p class="text-2xl font-bold">
                {{ $attempt->started_at->diff($attempt->finished_at)->format('%H:%I:%S') }}
            </p>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow">
        <div class="p-4 border-b">
            <h2 class="text-xl font-bold">Detail Jawaban</h2>
        </div>
        <div class="divide-y">
            @foreach($attempt->answers->sortBy('question.order') as $answer)
                <div class="p-4">
                    <div class="flex justify-between items-start mb-2">
                        <span class="bg-gray-200 px-2 py-1 rounded text-sm">Soal {{ $answer->question->order }}</span>
                        @if($answer->question->isMultipleChoice())
                            @if($answer->is_correct)
                                <span class="px-2 py-1 text-xs rounded bg-green-100 text-green-800">Benar (+{{ $answer->question->points }})</span>
                            @else
                                <span class="px-2 py-1 text-xs rounded bg-red-100 text-red-800">Salah</span>
                            @endif
                        @else
                            @if($answer->score !== null)
                                <span class="px-2 py-1 text-xs rounded bg-blue-100 text-blue-800">Nilai: {{ $answer->score }}/{{ $answer->question->points }}</span>
                            @else
                                <span class="px-2 py-1 text-xs rounded bg-yellow-100 text-yellow-800">Menunggu Penilaian</span>
                            @endif
                        @endif
                    </div>

                    <p class="text-gray-800 mb-2 math-content">{!! nl2br(e(Str::limit($answer->question->question_text, 200))) !!}</p>

                    <p class="text-sm">
                        <span class="text-gray-500">Jawaban Anda:</span>
                        <span class="font-medium math-content">{{ $answer->answer_text ?? 'Tidak dijawab' }}</span>
                    </p>

                    @if($answer->question->isMultipleChoice())
                        <p class="text-sm text-green-600">
                            <span class="text-gray-500">Jawaban Benar:</span>
                            <span class="font-medium">{{ $answer->question->correct_answer }}</span>
                        </p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>

    <div class="mt-6 text-center">
        <a href="{{ route('student.packages.index') }}" class="text-blue-600 hover:underline">Kembali ke Daftar Paket Soal</a>
    </div>
</div>
@endsection
