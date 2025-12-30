<?php
namespace App\Policies;

use App\Models\User;
use App\Models\Project;


class ProjectPolicy
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

