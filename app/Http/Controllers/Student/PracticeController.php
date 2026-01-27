<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\QuestionPackage;
use App\Services\ExamService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PracticeController extends Controller
{
    protected ExamService $examService;

    public function __construct(ExamService $examService)
    {
        $this->examService = $examService;
    }

    public function start(QuestionPackage $package)
    {
        $user = Auth::user();
        $canStart = $this->examService->canStartPractice($user, $package);

        if (!$canStart['can_start']) {
            return redirect()->route('student.packages.show', $package)
                ->with('error', $canStart['reason']);
        }

        $attempt = $this->examService->startPractice($user, $package);

        return redirect()->route('student.practice.question', [
            'attempt' => $attempt,
            'question' => $package->questions()->orderBy('order')->first(),
        ]);
    }

    public function showQuestion($attemptId, Question $question)
    {
        $user = Auth::user();
        $attempt = $user->practiceAttempts()->with('package')->findOrFail($attemptId);

        if ($attempt->isFinished()) {
            return redirect()->route('student.practice.result', $attempt)
                ->with('info', 'Latihan sudah selesai.');
        }

        $this->examService->openPracticeQuestion($attempt, $question);

        $package = $attempt->package;
        $questions = $package->questions()->orderBy('order')->get();
        $currentAnswer = $attempt->getAnswerForQuestion($question);
        $answeredQuestionIds = $attempt->answers()->whereNotNull('answered_at')->pluck('question_id')->toArray();

        return view('student.practice.question', compact(
            'package',
            'question',
            'questions',
            'attempt',
            'currentAnswer',
            'answeredQuestionIds'
        ));
    }

    public function submitAnswer(Request $request, $attemptId, Question $question)
    {
        $user = Auth::user();
        $attempt = $user->practiceAttempts()->with('package')->findOrFail($attemptId);

        if ($attempt->isFinished()) {
            return redirect()->route('student.practice.result', $attempt);
        }

        $request->validate([
            'answer' => ['required', 'string'],
        ]);

        $this->examService->submitPracticeAnswer($attempt, $question, $request->answer);

        $package = $attempt->package;

        if ($request->has('next_question')) {
            $nextQuestion = $package->questions()
                ->where('order', '>', $question->order)
                ->orderBy('order')
                ->first();

            if ($nextQuestion) {
                return redirect()->route('student.practice.question', [
                    'attempt' => $attempt,
                    'question' => $nextQuestion,
                ]);
            }
        }

        if ($request->has('finish')) {
            $this->examService->finishPractice($attempt);
            return redirect()->route('student.practice.result', $attempt)
                ->with('success', 'Latihan selesai.');
        }

        return redirect()->route('student.practice.question', [
            'attempt' => $attempt,
            'question' => $question,
        ])->with('success', 'Jawaban tersimpan.');
    }

    public function result($attemptId)
    {
        $user = Auth::user();
        $attempt = $user->practiceAttempts()
            ->with(['package.questions.options', 'answers.question'])
            ->findOrFail($attemptId);

        return view('student.practice.result', compact('attempt'));
    }

    public function history()
    {
        $user = Auth::user();
        $attempts = $user->practiceAttempts()
            ->with('package')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('student.practice.history', compact('attempts'));
    }
}
