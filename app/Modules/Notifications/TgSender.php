<?php

namespace App\Modules\Notifications;

use App\Models\User;

class TgSender implements Sender
{

    public function send(User $recipient, string $subject, string $content): void
    {
        // TODO: Implement send() method.
    }
}
