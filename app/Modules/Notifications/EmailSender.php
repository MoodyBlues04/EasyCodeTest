<?php

namespace App\Modules\Notifications;

use App\Models\User;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;

class EmailSender implements Sender
{

    public function send(User $recipient, string $subject, string $content): void
    {
        Mail::send('mail.blank', ['content' => $content], function(Message $message) use ($recipient, $subject) {
            $message
                ->from('sokant2005@mail.ru') // todo from .env
                ->to($recipient->email)
                ->subject($subject);
        });
    }
}
