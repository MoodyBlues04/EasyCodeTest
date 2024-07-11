<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestSettingUpdateRequest;
use App\Models\User;
use App\Models\UserSetting;
use App\Modules\Notifications\SendType;
use App\Repositories\SettingsRepository;
use App\View\Objects\DropdownItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SettingsController extends Controller
{
    public function __construct(private readonly SettingsRepository $settingsRepository)
    {
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
        $confirmationTypes = array_map(fn (string $name) => new DropdownItem($name, $name), SendType::names());
        return view('user.settings.edit', compact('setting', 'confirmationTypes'));
    }

    public function requestUpdate(UserSetting $setting, RequestSettingUpdateRequest $request): View
    {
        dd($setting, $request);
    }

    public function confirmUpdate(UserSetting $setting): RedirectResponse
    {
        dd($setting);
    }
}
