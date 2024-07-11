<?php

namespace App\Modules\Notifications;

use App\Models\User;

class SmsSender implements Sender
{

    public function send(User $recipient, string $subject, string $content): void
    {
        if (null === $recipient->phone) {
            throw new \LogicException("You cannot send via sms, when your phone unset");
        }
        throw new \Exception('I have no money to pay for sms api');
    }
}
