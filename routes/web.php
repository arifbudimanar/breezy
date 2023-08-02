<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\User\ProfileController as UserProfileController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;

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

Route::view('/', 'welcome')->name('welcome')->middleware('guest');
Route::view('/home', 'home')->name('home');

Route::get('/lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');

Route::prefix('user')->name('user.')->middleware(['auth'])->group(function () {
    Route::middleware(['verified_email'])->group(function () {
        Route::get('/dashboard', UserDashboardController::class)->name('dashboard');
        Route::get('/profile', [UserProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [UserProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [UserProfileController::class, 'destroy'])->name('profile.destroy');
        Route::middleware('verified_account')->group(function () {
            // Other routes here
        });
    });
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin', 'verified_email', 'verified_account'])->group(function () {
    Route::get('/dashboard', AdminDashboardController::class)->name('dashboard');
    Route::resource('users', AdminUserController::class)
        ->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'])
        ->names([
            'index' => 'users.index', 'create' => 'users.create', 'store' => 'users.store', 'show' => 'users.show', 'edit' => 'users.edit', 'update' => 'users.update', 'destroy' => 'users.destroy',
        ]);
    Route::patch('/users/{user}/make-admin', [AdminUserController::class, 'makeAdmin'])->name('users.makeadmin');
    Route::patch('/users/{user}/remove-admin', [AdminUserController::class, 'removeAdmin'])->name('users.removeadmin');
    Route::patch('/users/{user}/verify', [AdminUserController::class, 'verify'])->name('users.verify');
    Route::patch('/users/{user}/unverify', [AdminUserController::class, 'unverify'])->name('users.unverify');
    Route::patch('/users/{user}/reset-password', [AdminUserController::class, 'resetPassword'])->name('users.resetpassword');
});

require __DIR__ . '/auth.php';
