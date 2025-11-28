<?php

namespace App\Policies;

use App\Models\ClassRombel;
use App\Models\User;

class ClassRombelPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user, ClassRombel $classRombel): bool
    {
        return $user->is_admin || $user->is_teacher && $classRombel->where('teacher_id', $user->teacher->id)->exists();
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
    public function update(User $user): bool
    {
        return $user->is_admin;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        return $user->is_admin;
    }
}
