<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $value
 * @property string $token
 * @property int $user_setting_id
 */
class SettingUpdateToken extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'token',
        'user_setting_id',
    ];
}
