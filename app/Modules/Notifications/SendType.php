<?php

namespace App\Modules\Notifications;

use App\View\Objects\DropdownItem;
use App\View\Objects\ToDropdownItemInterface;

enum SendType: string implements ToDropdownItemInterface
{
    case TG = 'tg';
    case EMAIL = 'email';
    case SMS = 'sms';

    public function toDropdownItem(): DropdownItem
    {
        return new DropdownItem($this->name, $this->value);
    }
}
