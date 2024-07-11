<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

/**
 * @property int $id
 * @property int $user_id
 * @property int $setting_id
 * @property string $value
 *
 * @property-read User $user
 * @property-read Setting $setting
 * @property-read SettingUpdateToken $settingUpdateToken
 */
class UserSetting extends Model
{
    use HasFactory;

    protected $table = 'user_has_settings';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function setting(): BelongsTo
    {
        return $this->belongsTo(Setting::class, 'setting_id');
    }

    public function settingUpdateToken(): HasOne
    {
        return $this->hasOne(SettingUpdateToken::class, 'user_setting_id');
    }

    public function setUpdateToken(string $value): void
    {
        $this->settingUpdateToken()->firstOrCreate(['value' => $value], ['token' => Str::random()]);
    }
}
