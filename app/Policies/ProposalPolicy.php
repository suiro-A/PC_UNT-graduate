<?php

namespace App\Policies;

use App\Models\Proposal;
use App\Models\User;

class ProposalPolicy
{
    public function view(User $user, Proposal $proposal): bool
    {
        return $user->id === $proposal->user_id || $user->isManager() || $user->isAdmin();
    }
}
