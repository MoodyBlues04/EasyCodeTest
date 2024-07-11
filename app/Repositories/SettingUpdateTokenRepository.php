<?php

namespace App\Repositories;

use App\Models\SettingUpdateToken;

class SettingUpdateTokenRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(SettingUpdateToken::class);
    }

    public function getByTokenOrFail(string $token): SettingUpdateToken
    {
        /** @var ?SettingUpdateToken $settingUpdateToken */
        $settingUpdateToken = $this->firstBy(['token' => $token]);
        if (null === $settingUpdateToken) {
            throw new \InvalidArgumentException("Invalid token: {$token}");
        }
        return $settingUpdateToken;
    }
}
