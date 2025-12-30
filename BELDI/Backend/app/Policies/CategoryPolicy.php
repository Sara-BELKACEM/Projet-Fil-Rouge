<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;

class CategoryPolicy
{
    public function viewAny()
    {
        return true;
    }

    public function create(User $user)
    {
        return $user->is_admin;
    }

    public function update(User $user)
    {
        return $user->is_admin;
    }

    public function delete(User $user)
    {
        return $user->is_admin;
    }
}

