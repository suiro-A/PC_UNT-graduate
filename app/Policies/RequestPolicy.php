<?php

namespace App\Policies;

use App\Models\Request;
use App\Models\User;

class RequestPolicy
{
    public function view(User $user, Request $request): bool
    {
        return $user->id === $request->user_id || $user->isManager() || $user->isAdmin();
    }
}
