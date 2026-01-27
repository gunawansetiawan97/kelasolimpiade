@extends('layouts.app')

@section('title', 'Hasil Latihan')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-yellow-100 border border-yellow-300 rounded p-3 mb-4 text-center">
        <p class="text-yellow-800">Ini adalah hasil latihan - tidak dihitung sebagai nilai resmi</p>
    </div>

    <div class="bg-white rounded-lg shadow p-6 mb-6">
        <h1 class="text-2xl font-bold mb-2">Hasil Latihan</h1>
        <p class="text-gray-600">{{ $attempt->package->title }}</p>
        <p class="text-sm text-gray-500 mt-2">
            Dikerjakan pada {{ $attempt->started_at->format('d/m/Y H:i') }}
        </p>
    </div>

    <div class="bg-white rounded-lg shadow">
        <div class="p-4 border-b">
            <h2 class="text-xl font-bold">Pembahasan</h2>
        </div>
        <div class="divide-y">
            @foreach($attempt->package->questions->sortBy('order') as $question)
                @php
                    $answer = $attempt->answers->where('question_id', $question->id)->first();
                @endphp
                <div class="p-4">
                    <div class="flex justify-between items-start mb-2">
                        <span class="bg-gray-200 px-2 py-1 rounded text-sm">Soal {{ $question->order }}</span>
                        @if($question->isMultipleChoice())
                            @if($answer && $answer->answer_text === $question->correct_answer)
                                <span class="px-2 py-1 text-xs rounded bg-green-100 text-green-800">Benar</span>
                            @elseif($answer)
                                <span class="px-2 py-1 text-xs rounded bg-red-100 text-red-800">Salah</span>
                            @else
                                <span class="px-2 py-1 text-xs rounded bg-gray-100 text-gray-800">Tidak Dijawab</span>
                            @endif
                        @endif
                    </div>

                    <p class="text-gray-800 mb-3 math-content">{!! nl2br(e($question->question_text)) !!}</p>

                    @if($question->isMultipleChoice())
                        <div class="ml-4 text-sm space-y-1">
                            @foreach($question->options as $option)
                                <div class="p-2 rounded math-content
                                    {{ $option->option_label === $question->correct_answer ? 'bg-green-50 text-green-800' : '' }}
                                    {{ $answer && $answer->answer_text === $option->option_label && $option->option_label !== $question->correct_answer ? 'bg-red-50 text-red-800' : '' }}">
                                    <strong>{{ $option->option_label }}.</strong> {{ $option->option_text }}
                                    @if($option->option_label === $question->correct_answer)
                                        <span class="text-green-600">(Jawaban Benar)</span>
                                    @endif
                                    @if($answer && $answer->answer_text === $option->option_label)
                                        <span class="text-blue-600">(Jawaban Anda)</span>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="bg-gray-50 p-3 rounded">
                            <p class="text-sm text-gray-500 mb-1">Jawaban Anda:</p>
                            <p class="text-gray-800">{!! nl2br(e($answer->answer_text ?? 'Tidak dijawab')) !!}</p>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>

    <div class="mt-6 flex justify-center space-x-4">
        <a href="{{ route('student.packages.show', $attempt->package) }}" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Latihan Lagi</a>
        <a href="{{ route('student.packages.index') }}" class="px-4 py-2 border rounded hover:bg-gray-50">Kembali ke Daftar Paket</a>
    </div>
</div>
@endsection
