<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\QuestionPackage;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $activePackages = QuestionPackage::where('is_active', true)
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->withCount('questions')
            ->get();

        $recentAttempts = $user->packageAttempts()
            ->with('package')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        $practiceHistory = $user->practiceAttempts()
            ->with('package')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('student.dashboard', compact(
            'user',
            'activePackages',
            'recentAttempts',
            'practiceHistory'
        ));
    }
}
