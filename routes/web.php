<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\ProfileController as UserProfileController;
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

Route::view('/', 'home')->name('home');
Route::get('/lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');
Route::middleware('auth')
    ->name('user.')
    ->group(function () {
        Route::get('/profile', [UserProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [UserProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [UserProfileController::class, 'destroy'])->name('profile.destroy');
    });
Route::prefix('user')
    ->name('user.')
    ->middleware(['auth', 'verified_email'])
    ->group(function () {
        Route::get('/dashboard', UserDashboardController::class)->name('dashboard');
        // Routes that require an auth and verified email go here
        Route::middleware('verified_account')->group(function () {
            // Other routes that require an auth, verified email and verified account go here
        });
    });
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/dashboard', AdminDashboardController::class)->name('dashboard');
        Route::resource('users', AdminUserController::class);
        Route::patch('/users/{user}/make-admin', [AdminUserController::class, 'makeAdmin'])->name('users.makeadmin');
        Route::patch('/users/{user}/remove-admin', [AdminUserController::class, 'removeAdmin'])->name('users.removeadmin');
        Route::patch('/users/{user}/verify', [AdminUserController::class, 'verify'])->name('users.verify');
        Route::patch('/users/{user}/unverify', [AdminUserController::class, 'unverify'])->name('users.unverify');
        Route::patch('/users/{user}/reset-password', [AdminUserController::class, 'resetPassword'])->name('users.resetpassword');
        // Routes that require an auth, admin, verified email and verified account go here
    });

require __DIR__.'/auth.php';
