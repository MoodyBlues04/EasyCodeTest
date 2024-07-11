<?php

namespace App\Modules\Notifications;

class SenderFactory
{
    public function make(SendType $sendType): Sender
    {
        return match ($sendType) {
            SendType::EMAIL => new EmailSender(),
            SendType::TG => new TgSender(),
            SendType::SMS => new SmsSender(),
        };
    }
}
