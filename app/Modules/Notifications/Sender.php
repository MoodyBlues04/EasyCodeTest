<?php
declare(strict_types=1);

namespace App\Modules\Notifications;

use App\Models\User;

interface Sender
{
    /**
     * @throws \InvalidArgumentException
     */
    public function send(User $recipient, string $subject, string $content): void;
}
