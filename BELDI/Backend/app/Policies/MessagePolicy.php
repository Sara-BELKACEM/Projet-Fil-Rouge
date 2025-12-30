<?php

namespace App\Policies;

use App\Models\Message;
use App\Models\User;

class MessagePolicy
{
    public function viewAny(User $user)
    {
        return $user->is_admin;
    }

    public function create()
    {
        return true; // contact form
    }
}
