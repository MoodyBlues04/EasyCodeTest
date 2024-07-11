<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 *
 * @property-read Collection $users
 */
class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_has_settings', 'setting_id', 'user_id')
            ->withPivot(['value']);
    }

    public static function mapAll(callable $callback): array
    {
        return self::query()->get()->map($callback)->all();
    }
}
