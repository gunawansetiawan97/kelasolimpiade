@extends('layouts.exam')

@section('title', 'Latihan - ' . $package->title)
@section('exam-title', 'Latihan: ' . $package->title)

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-yellow-100 border border-yellow-300 rounded p-3 mb-4 text-center">
        <p class="text-yellow-800">Mode Latihan - Jawaban tidak dihitung sebagai nilai resmi</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="md:col-span-3">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-bold">Soal {{ $question->order }}</h2>
                    <span class="text-sm text-gray-500">{{ $question->points }} poin</span>
                </div>

                <div class="prose max-w-none mb-6 math-content">
                    {!! nl2br(e($question->question_text)) !!}
                </div>

                <form action="{{ route('student.practice.submit', ['attempt' => $attempt, 'question' => $question]) }}" method="POST">
                    @csrf

                    @if($question->isMultipleChoice())
                        <div class="space-y-3">
                            @foreach($question->options as $option)
                                <label class="flex items-start p-3 border rounded-lg cursor-pointer hover:bg-gray-50
                                    {{ $currentAnswer && $currentAnswer->answer_text === $option->option_label ? 'bg-blue-50 border-blue-500' : '' }}">
                                    <input type="radio" name="answer" value="{{ $option->option_label }}"
                                        class="mt-1 mr-3"
                                        {{ $currentAnswer && $currentAnswer->answer_text === $option->option_label ? 'checked' : '' }}>
                                    <span class="math-content"><strong>{{ $option->option_label }}.</strong> {{ $option->option_text }}</span>
                                </label>
                            @endforeach
                        </div>
                    @else
                        <textarea name="answer" rows="6"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Tulis jawaban Anda di sini...">{{ $currentAnswer->answer_text ?? '' }}</textarea>
                    @endif

                    <div class="flex justify-between items-center mt-6">
                        @php
                            $prevQuestion = $questions->where('order', '<', $question->order)->last();
                            $nextQuestion = $questions->where('order', '>', $question->order)->first();
                        @endphp

                        @if($prevQuestion)
                            <a href="{{ route('student.practice.question', ['attempt' => $attempt, 'question' => $prevQuestion]) }}"
                                class="px-4 py-2 border rounded-lg hover:bg-gray-50">Sebelumnya</a>
                        @else
                            <div></div>
                        @endif

                        <div class="space-x-2">
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                                Simpan
                            </button>

                            @if($nextQuestion)
                                <button type="submit" name="next_question" value="1"
                                    class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                                    Simpan & Lanjut
                                </button>
                            @else
                                <button type="submit" name="finish" value="1"
                                    class="px-4 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700">
                                    Selesai Latihan
                                </button>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="md:col-span-1">
            <div class="bg-white rounded-lg shadow p-4 sticky top-20">
                <h3 class="font-bold mb-3">Navigasi Soal</h3>
                <div class="grid grid-cols-5 gap-2">
                    @foreach($questions as $q)
                        <a href="{{ route('student.practice.question', ['attempt' => $attempt, 'question' => $q]) }}"
                            class="w-10 h-10 flex items-center justify-center rounded
                                {{ $q->id === $question->id ? 'bg-blue-600 text-white' : '' }}
                                {{ in_array($q->id, $answeredQuestionIds) && $q->id !== $question->id ? 'bg-green-100 text-green-800' : '' }}
                                {{ !in_array($q->id, $answeredQuestionIds) && $q->id !== $question->id ? 'bg-gray-100' : '' }}
                                hover:opacity-80">
                            {{ $q->order }}
                        </a>
                    @endforeach
                </div>

                <hr class="my-4">

                <form action="{{ route('student.practice.submit', ['attempt' => $attempt, 'question' => $question]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="answer" value="{{ $currentAnswer->answer_text ?? '' }}">
                    <button type="submit" name="finish" value="1"
                        class="block w-full text-center py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                        Selesai Latihan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
