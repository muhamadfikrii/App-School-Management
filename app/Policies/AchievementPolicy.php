<?php

namespace App\Policies;

use App\Models\Achievement;
use App\Models\User;

class AchievementPolicy
{
    /**
     * Determine whether the user can view any achievements.
     */
    public function viewAny(User $user): bool
    {
        return $user->is_admin || $user->is_teacher;
    }

    /**
     * Determine whether the user can view a specific achievement.
     */
    public function view(User $user, Achievement $achievement): bool
    {
        return $user->is_admin || $user->is_teacher;
    }

    /**
     * Determine whether the user can create achievements.
     */
    public function create(User $user): bool
    {
        return $user->is_admin;
    }

    /**
     * Determine whether the user can update an achievement.
     */
    public function update(User $user, Achievement $achievement): bool
    {
        return $user->is_admin;
    }

    /**
     * Determine whether the user can delete an achievement.
     */
    public function delete(User $user, Achievement $achievement): bool
    {
        return $user->is_admin;
    }

    /**
     * Disable restore for now.
     */
    public function restore(User $user, Achievement $achievement): bool
    {
        return false;
    }

    /**
     * Disable force delete for now.
     */
    public function forceDelete(User $user, Achievement $achievement): bool
    {
        return false;
    }
}
