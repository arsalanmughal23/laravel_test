<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('user-profile-v1', [UserController::class, 'index'])->name('user.profile_v1');
Route::get('user-profile', [UserController::class, 'profile'])->name('user.profile');
Route::post('user-profile-update', [UserController::class, 'profileUpdate'])->name('user.profile_update');
Route::get('user-search', [UserController::class, 'searchUsers'])->name('user.search');
