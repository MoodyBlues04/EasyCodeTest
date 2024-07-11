<?php

namespace App\Repositories;

use App\Models\Setting;

class SettingsRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(Setting::class);
    }
}
