<?php

namespace App\Services;

use App\Models\Admin;
use App\Models\Classroom;
use App\Models\ClassroomActivity;
use App\Models\ClassroomMember;
use App\Models\User;
use Illuminate\Support\Collection;

class ClassroomService
{
    public function getClassroomsForUser(User $user): Collection
    {
        return Classroom::whereHas('members', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })
            ->with(['subscription', 'activities' => function ($query) {
                $query->latest()->limit(3);
            }])
            ->withCount('activities')
            ->active()
            ->get();
    }

    public function getClassroomActivities(Classroom $classroom): Collection
    {
        return $classroom->activities()
            ->with('admin')
            ->orderByDesc('is_pinned')
            ->orderByDesc('created_at')
            ->get();
    }

    public function addMember(Classroom $classroom, User $user, Admin $admin): ClassroomMember
    {
        return ClassroomMember::create([
            'classroom_id' => $classroom->id,
            'user_id' => $user->id,
            'added_by' => $admin->id,
            'joined_at' => now(),
        ]);
    }

    public function removeMember(Classroom $classroom, User $user): bool
    {
        return ClassroomMember::where('classroom_id', $classroom->id)
            ->where('user_id', $user->id)
            ->delete() > 0;
    }

    public function getAvailableStudents(Classroom $classroom): Collection
    {
        // Get active subscribers of the classroom's subscription
        // who are not yet members of this classroom
        $existingMemberIds = $classroom->members()->pluck('user_id');

        return User::whereHas('userSubscriptions', function ($query) use ($classroom) {
            $query->where('subscription_id', $classroom->subscription_id)
                ->where('status', 'active')
                ->where('expires_at', '>', now());
        })
            ->whereNotIn('id', $existingMemberIds)
            ->orderBy('name')
            ->get();
    }

    public function getClassroomMembers(Classroom $classroom): Collection
    {
        return $classroom->members()
            ->with(['user', 'addedBy'])
            ->orderBy('joined_at', 'desc')
            ->get();
    }

    public function createActivity(Classroom $classroom, Admin $admin, array $data): ClassroomActivity
    {
        return ClassroomActivity::create([
            'classroom_id' => $classroom->id,
            'admin_id' => $admin->id,
            'type' => $data['type'],
            'title' => $data['title'],
            'content' => $data['content'],
            'is_pinned' => $data['is_pinned'] ?? false,
        ]);
    }

    public function togglePin(ClassroomActivity $activity): bool
    {
        $activity->is_pinned = !$activity->is_pinned;
        return $activity->save();
    }

    public function userCanAccessClassroom(User $user, Classroom $classroom): bool
    {
        return $classroom->hasMember($user);
    }
}
