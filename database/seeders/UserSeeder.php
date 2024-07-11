<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /** @var User $user */
        $user = User::query()->create([
            'name' => 'test',
            'email' => env('USER_EMAIL', 'test@test.com'),
            'password' => Hash::make('123456'),
            'phone' => env('USER_PHONE', '89277777777'),
            'tg' => env('USER_TG', null),
            'email_verified_at' => Carbon::now(),
        ]);
        $user->attachDefaultSettings();
    }
}
