<?php

namespace App\Services;

use App\Http\Requests\RequestSettingUpdateRequest;
use App\Models\UserSetting;
use App\Modules\Notifications\SenderFactory;
use App\Modules\Notifications\SendType;
use App\Repositories\SettingUpdateTokenRepository;

class SettingsUpdateService
{
    public function __construct(
        private readonly SettingUpdateTokenRepository $settingUpdateTokenRepository,
        private readonly SenderFactory $factory
    ) {
    }

    public function sendConfirmationMessage(UserSetting $setting, RequestSettingUpdateRequest $request): void
    {
        $setting->setUpdateToken($request->value);
        $sender = $this->factory->make(SendType::from($request->confirmation_type));
        $content = $this->makeUpdateConfirmationContent($setting);
        $sender->send($setting->user, 'Settings update confirmation', $content);
    }

    public function confirmUpdate(string $token): bool
    {
        $settingUpdateToken = $this->settingUpdateTokenRepository->getByTokenOrFail($token);
        $settingUpdateToken->userSetting->value = $settingUpdateToken->value;
        return $settingUpdateToken->userSetting->save() && $settingUpdateToken->delete();
    }

    private function makeUpdateConfirmationContent(UserSetting $setting): string
    {
        $link = route('user.settings.confirm_update', $setting->settingUpdateToken->token);
        return "<p>Click here: <a href='{$link}'>click</a>
            to confirm update of setting: '{$setting->setting->name}' to: '{$setting->settingUpdateToken->value}'</p>";
    }
}
