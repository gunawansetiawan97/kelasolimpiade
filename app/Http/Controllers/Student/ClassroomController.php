<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Services\ClassroomService;
use Illuminate\Support\Facades\Auth;

class ClassroomController extends Controller
{
    protected ClassroomService $classroomService;

    public function __construct(ClassroomService $classroomService)
    {
        $this->classroomService = $classroomService;
    }

    public function index()
    {
        $user = Auth::user();
        $classrooms = $this->classroomService->getClassroomsForUser($user);

        return view('student.classrooms.index', compact('classrooms'));
    }

    public function show(Classroom $classroom)
    {
        $user = Auth::user();

        // Check if user is a member of this classroom
        if (!$this->classroomService->userCanAccessClassroom($user, $classroom)) {
            abort(403, 'Anda tidak memiliki akses ke kelas ini.');
        }

        $classroom->load('subscription');
        $activities = $this->classroomService->getClassroomActivities($classroom);

        return view('student.classrooms.show', compact('classroom', 'activities'));
    }
}
