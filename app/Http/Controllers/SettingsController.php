<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\User;
use App\Repositories\SettingsRepository;
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
        $settings = $user->settings()->withPivot('value')->get()->all();
        return view('user.settings.index', compact('settings'));
    }

    public function edit(Setting $setting): View
    {
        return view('user.settings.edit', compact('setting'));
    }

    public function requestUpdate(Setting $setting): View
    {
        dd($setting);
    }

    public function confirmUpdate(Setting $setting): RedirectResponse
    {
        dd($setting);
    }
}
