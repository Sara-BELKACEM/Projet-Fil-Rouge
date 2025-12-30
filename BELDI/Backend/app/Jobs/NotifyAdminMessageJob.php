<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\Message;
use App\Models\User;
use App\Notifications\NewMessageNotification;

class NotifyAdminMessageJob implements ShouldQueue
{
    use Dispatchable, Queueable;

    public function __construct(public Message $message) {}

    public function handle()
    {
        User::where('is_admin', true)
            ->each(fn ($admin) =>
                $admin->notify(new NewMessageNotification($this->message))
            );
    }
}

