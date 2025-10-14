<?php

namespace App\Policies;

use App\Models\ClassRombel;
use App\Models\User;

class FinalGradePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if ($user->is_admin) {
            return true;
        }

        if ($user->is_teacher && $user->teacher) {

            return ClassRombel::where('teacher_id', $user->teacher->id)->exists();
        }

        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if ($user->is_admin) {
            return true;
        }

        if ($user->is_teacher && $user->teacher) {

            return ClassRombel::where('teacher_id', $user->teacher->id)->exists();
        }

        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {

        if ($user->is_admin) {
            return true;
        }

        if ($user->is_teacher && $user->teacher) {

            return ClassRombel::where('teacher_id', $user->teacher->id)->exists();
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        if ($user->is_admin) {
            return true;
        }

        if ($user->is_teacher && $user->teacher) {

            return ClassRombel::where('teacher_id', $user->teacher->id)->exists();
        }

        return false;
    }
}
