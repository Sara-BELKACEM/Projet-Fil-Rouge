<?php
namespace App\Policies;

use App\Models\User;
use App\Models\Order;

class OrderPolicy
{
    public function view(User $user, Order $order)
    {
        return $user->is_admin || $order->user_id === $user->id;
    }

    public function viewAny(User $user)
    {
        return true;
    }

    public function create(User $user)
    {
        return true;
    }
}

