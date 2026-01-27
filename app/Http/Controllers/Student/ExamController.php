<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\QuestionPackage;
use App\Services\ExamService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    protected ExamService $examService;

    public function __construct(ExamService $examService)
    {
        $this->examService = $examService;
    }

    public function start(QuestionPackage $package)
    {
        $user = Auth::user();
        $canStart = $this->examService->canStartExam($user, $package);

        if (!$canStart['can_start']) {
            return redirect()->route('student.packages.show', $package)
                ->with('error', $canStart['reason']);
        }

        if (isset($canStart['is_continue']) && $canStart['is_continue']) {
            $attempt = $canStart['attempt'];
        } else {
            $attempt = $this->examService->startExam($user, $package);
        }

        return redirect()->route('student.exam.question', [
            'package' => $package,
            'question' => $package->questions()->orderBy('order')->first(),
        ]);
    }

    public function showQuestion(QuestionPackage $package, Question $question)
    {
        $user = Auth::user();
        $attempt = $user->getActiveAttempt($package);

        if (!$attempt) {
            return redirect()->route('student.packages.show', $package)
                ->with('error', 'Anda belum memulai ujian ini.');
        }

        if ($attempt->isExpired()) {
            $this->examService->finishAttempt($attempt);
            return redirect()->route('student.exam.result', $attempt)
                ->with('info', 'Waktu ujian telah habis. Ujian telah disubmit otomatis.');
        }

        $this->examService->openQuestion($attempt, $question);

        $questions = $package->questions()->orderBy('order')->get();
        $currentAnswer = $attempt->getAnswerForQuestion($question);
        $answeredQuestionIds = $attempt->answers()->whereNotNull('answered_at')->pluck('question_id')->toArray();

        return view('student.exam.question', compact(
            'package',
            'question',
            'questions',
            'attempt',
            'currentAnswer',
            'answeredQuestionIds'
        ));
    }

    public function submitAnswer(Request $request, QuestionPackage $package, Question $question)
    {
        $user = Auth::user();
        $attempt = $user->getActiveAttempt($package);

        if (!$attempt) {
            return redirect()->route('student.packages.show', $package)
                ->with('error', 'Anda belum memulai ujian ini.');
        }

        if ($attempt->isExpired()) {
            $this->examService->finishAttempt($attempt);
            return redirect()->route('student.exam.result', $attempt)
                ->with('info', 'Waktu ujian telah habis.');
        }

        $request->validate([
            'answer' => ['required', 'string'],
        ], [
            'answer.required' => 'Jawaban wajib diisi.',
        ]);

        $this->examService->submitAnswer($attempt, $question, $request->answer);

        if ($request->has('next_question')) {
            $nextQuestion = $package->questions()
                ->where('order', '>', $question->order)
                ->orderBy('order')
                ->first();

            if ($nextQuestion) {
                return redirect()->route('student.exam.question', [
                    'package' => $package,
                    'question' => $nextQuestion,
                ]);
            }
        }

        if ($request->has('finish')) {
            return redirect()->route('student.exam.confirm-finish', $package);
        }

        return redirect()->route('student.exam.question', [
            'package' => $package,
            'question' => $question,
        ])->with('success', 'Jawaban tersimpan.');
    }

    public function confirmFinish(QuestionPackage $package)
    {
        $user = Auth::user();
        $attempt = $user->getActiveAttempt($package);

        if (!$attempt) {
            return redirect()->route('student.packages.show', $package);
        }

        $questions = $package->questions()->orderBy('order')->get();
        $answeredQuestionIds = $attempt->answers()->whereNotNull('answered_at')->pluck('question_id')->toArray();
        $unansweredCount = $questions->count() - count($answeredQuestionIds);

        return view('student.exam.confirm-finish', compact('package', 'attempt', 'unansweredCount'));
    }

    public function finish(QuestionPackage $package)
    {
        $user = Auth::user();
        $attempt = $user->getActiveAttempt($package);

        if (!$attempt) {
            return redirect()->route('student.packages.show', $package);
        }

        $this->examService->finishAttempt($attempt);

        return redirect()->route('student.exam.result', $attempt)
            ->with('success', 'Ujian telah selesai.');
    }

    public function result($attemptId)
    {
        $user = Auth::user();
        $attempt = $user->packageAttempts()->with(['package', 'answers.question'])->findOrFail($attemptId);

        return view('student.exam.result', compact('attempt'));
    }
}
