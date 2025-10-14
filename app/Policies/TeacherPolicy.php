<?php

namespace App\Policies;

use App\Models\Teacher;
use App\Models\User;

class TeacherPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->is_admin || $user->is_teacher;
    }

    /**
     * Determine whether the user can view any models.
     */
    public function view(User $user): bool
    {
        return $user->is_admin || $user->is_teacher;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->is_admin;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Teacher $teacher): bool
    {
        if ($user->is_admin) {
            return true;
        }

        if ($user->is_teacher && $user->teacher) {
            return $user->teacher->id === $teacher->id;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        return $user->is_admin;
    }
}
