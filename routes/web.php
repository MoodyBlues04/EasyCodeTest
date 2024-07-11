<?php

use Illuminate\Support\Facades\Route;

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

// TODO: settings upd logic, rewrite from blade to vue

Route::group([], __DIR__ . '/web/auth.php');
Route::prefix('user')
    ->as('user.')
    ->middleware(['auth', 'verified', 'user'])
    ->group(__DIR__ . '/web/user.php');
Route::view('/', 'user.home')->middleware('auth')->name('home');

