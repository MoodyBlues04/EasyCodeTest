<?php

namespace App\Modules\Notifications;

use App\Models\User;
use App\Modules\Api\Tg\Api;

class TgSender implements Sender
{
    private readonly Api $api;

    public function __construct()
    {
        $this->api = new Api(env('TG_BOT_TOKEN'));
    }

    public function send(User $recipient, string $subject, string $content): void
    {
        if (null === $recipient->tg) {
            throw new \LogicException("You cannot send to tg, when your tg is not set");
        }
        $this->api->sendMessage($recipient->tg, $this->makeHtmlContent($subject, $content));
    }

    private function makeHtmlContent(string $subject, string $content): string
    {
        return "<strong>$subject</strong>\n $content";
    }
}
