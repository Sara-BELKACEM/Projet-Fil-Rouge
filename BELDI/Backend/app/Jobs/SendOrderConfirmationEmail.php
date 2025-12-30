<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\Order;
use App\Notifications\OrderConfirmedNotification;

class SendOrderConfirmationEmail implements ShouldQueue
{
    use Dispatchable, Queueable;

    public function __construct(public Order $order) {}

    public function handle()
    {
        $this->order->user
            ->notify(new OrderConfirmedNotification($this->order));
    }
}

