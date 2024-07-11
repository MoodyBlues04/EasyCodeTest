<?php

namespace App\Modules\Notifications;

enum SendType
{
    case TG;
    case EMAIL;
    case SMS;

    public static function names(): array
    {
        return array_column(self::cases(), 'name');
    }
}
