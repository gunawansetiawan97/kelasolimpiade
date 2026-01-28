@extends('layouts.exam')

@section('title', 'Ujian - ' . $package->title)
@section('exam-title', $package->title)

@section('timer')
    <span id="timer-display">--:--</span>
@endsection

@section('content')
<div class="max-w-4xl mx-auto">
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

                <form action="{{ route('student.exam.submit', ['package' => $package, 'question' => $question]) }}" method="POST">
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

                    <div class="flex flex-col-reverse md:flex-row md:justify-between md:items-center mt-6 gap-3">
                        @php
                            $prevQuestion = $questions->where('order', '<', $question->order)->last();
                            $nextQuestion = $questions->where('order', '>', $question->order)->first();
                        @endphp

                        @if($prevQuestion)
                            <a href="{{ route('student.exam.question', ['package' => $package, 'question' => $prevQuestion]) }}"
                                class="px-4 py-2 border rounded-lg hover:bg-gray-50 text-center">Sebelumnya</a>
                        @else
                            <div class="hidden md:block"></div>
                        @endif

                        <div class="flex flex-col md:flex-row gap-2">
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
                                    class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                                    Selesai
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
                        <a href="{{ route('student.exam.question', ['package' => $package, 'question' => $q]) }}"
                            class="w-10 h-10 flex items-center justify-center rounded
                                {{ $q->id === $question->id ? 'bg-blue-600 text-white' : '' }}
                                {{ in_array($q->id, $answeredQuestionIds) && $q->id !== $question->id ? 'bg-green-100 text-green-800' : '' }}
                                {{ !in_array($q->id, $answeredQuestionIds) && $q->id !== $question->id ? 'bg-gray-100' : '' }}
                                hover:opacity-80">
                            {{ $q->order }}
                        </a>
                    @endforeach
                </div>

                <div class="mt-4 text-sm">
                    <div class="flex items-center mb-1">
                        <span class="w-4 h-4 bg-green-100 rounded mr-2"></span>
                        <span>Sudah dijawab</span>
                    </div>
                    <div class="flex items-center mb-1">
                        <span class="w-4 h-4 bg-blue-600 rounded mr-2"></span>
                        <span>Soal saat ini</span>
                    </div>
                    <div class="flex items-center">
                        <span class="w-4 h-4 bg-gray-100 rounded mr-2"></span>
                        <span>Belum dijawab</span>
                    </div>
                </div>

                <hr class="my-4">

                <a href="{{ route('student.exam.confirm-finish', $package) }}"
                    class="block w-full text-center py-2 bg-red-600 text-white rounded hover:bg-red-700">
                    Selesai Ujian
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const endTime = new Date('{{ $attempt->getEndTime()->toISOString() }}');

    function updateTimer() {
        const now = new Date();
        const diff = endTime - now;

        if (diff <= 0) {
            document.getElementById('timer-display').textContent = '00:00';
            alert('Waktu ujian telah habis!');
            window.location.href = '{{ route('student.exam.confirm-finish', $package) }}';
            return;
        }

        const minutes = Math.floor(diff / 60000);
        const seconds = Math.floor((diff % 60000) / 1000);

        document.getElementById('timer-display').textContent =
            String(minutes).padStart(2, '0') + ':' + String(seconds).padStart(2, '0');

        if (diff < 300000) {
            document.getElementById('timer').classList.add('bg-red-600');
            document.getElementById('timer').classList.remove('bg-blue-700');
        }
    }

    updateTimer();
    setInterval(updateTimer, 1000);
</script>
@endpush
