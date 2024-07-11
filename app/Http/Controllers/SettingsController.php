<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestSettingUpdateRequest;
use App\Models\User;
use App\Models\UserSetting;
use App\Modules\Notifications\SendType;
use App\Services\SettingsUpdateService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SettingsController extends Controller
{
    public function __construct(
        private readonly SettingsUpdateService $settingsUpdateService
    ) {
        $this->middleware('auth');
    }

    public function index(): View
    {
        /** @var User $user */
        $user = auth()->user();
        $settings = $user->userSettings;
        return view('user.settings.index', compact('settings'));
    }

    public function edit(UserSetting $setting): View
    {
        $confirmationTypes = SendType::cases();
        return view('user.settings.edit', compact('setting', 'confirmationTypes'));
    }

    public function requestUpdate(UserSetting $setting, RequestSettingUpdateRequest $request): View
    {
        $this->settingsUpdateService->sendConfirmationMessage($setting, $request);
        return view('user.settings.request_update', compact('setting'));
    }

    public function confirmUpdate(string $token): RedirectResponse
    {
        $this->settingsUpdateService->confirmUpdate($token);
        return redirect()->route('user.settings.index')->with('success', 'Setting updated');
    }
}
