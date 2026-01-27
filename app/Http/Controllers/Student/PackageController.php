<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\QuestionPackage;
use Illuminate\Support\Facades\Auth;

class PackageController extends Controller
{
    public function index()
    {
        $activePackages = QuestionPackage::where('is_active', true)
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->withCount('questions')
            ->orderBy('end_date')
            ->get();

        $upcomingPackages = QuestionPackage::where('is_active', true)
            ->where('start_date', '>', now())
            ->withCount('questions')
            ->orderBy('start_date')
            ->get();

        $pastPackages = QuestionPackage::where(function ($query) {
                $query->where('is_active', false)
                    ->orWhere('end_date', '<', now());
            })
            ->withCount('questions')
            ->orderBy('end_date', 'desc')
            ->get();

        $user = Auth::user();
        $attemptedPackageIds = $user->packageAttempts()->pluck('package_id')->toArray();

        return view('student.packages.index', compact(
            'activePackages',
            'upcomingPackages',
            'pastPackages',
            'attemptedPackageIds'
        ));
    }

    public function show(QuestionPackage $package)
    {
        $user = Auth::user();
        $attempt = $user->packageAttempts()->where('package_id', $package->id)->first();

        return view('student.packages.show', compact('package', 'attempt'));
    }
}
