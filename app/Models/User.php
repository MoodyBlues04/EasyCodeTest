<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property int $id
 * @property string $email
 * @property string $name
 * @property ?string $phone
 * @property ?string $tg
 * @property string $password
 * @property ?string $email_verified_at
 *
 * @property-read Collection $settings
 * @property-read Collection $userSettings
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'tg',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function settings(): BelongsToMany
    {
        return $this->belongsToMany(Setting::class, 'user_has_settings', 'user_id', 'setting_id')
            ->withPivot(['value']);
    }

    public function userSettings(): HasMany
    {
        return $this->hasMany(UserSetting::class, 'user_id');
    }

    public function attachDefaultSettings(): void
    {
        $this->settings()->detach();
        $ids = Setting::mapAll(fn (Setting $setting) => $setting->id);
        $this->settings()->attach($ids);
    }
}
