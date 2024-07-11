<?php

namespace App\Models;

use Database\Seeders\UserSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $value
 * @property string $token
 * @property int $user_setting_id
 *
 * @property-read UserSetting $userSetting
 */
class SettingUpdateToken extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'token',
        'user_setting_id',
    ];

    public function userSetting(): BelongsTo
    {
        return $this->belongsTo(UserSeeder::class, 'user_setting_id');
    }
}
