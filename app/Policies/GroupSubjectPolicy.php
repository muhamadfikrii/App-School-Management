<?php

namespace App\Policies;

use App\Models\User;

class GroupSubjectPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->is_admin;
    }
}
