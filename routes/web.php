<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group([], __DIR__ . '/web/auth.php');

Route::group(['middleware' => 'auth', 'as' => 'user.', 'prefix' => 'user'], function () {
    Route::get('/settings', SettingsController::class . '@index')->name('settings.index');
    Route::get('/settings/{setting}/edit', SettingsController::class . '@edit')->name('settings.edit');
    Route::patch('/settings/{setting}/request_update', SettingsController::class . '@requestUpdate')
        ->name('settings.request_update');
    Route::get('/settings/{token}/confirm_update', SettingsController::class . '@confirmUpdate')
        ->name('settings.confirm_update');
});
Route::view('/', 'user.home')->middleware('auth')->name('home');

