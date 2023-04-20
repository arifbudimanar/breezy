<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsersController as AdminUsersController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\User\ProfileController as UserProfileController;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::prefix('user')->middleware(['auth'])->group(function () {
    Route::middleware(['verified_email'])->group(function () {
        Route::get('/dashboard', UserDashboardController::class)->name('user.dashboard');
        Route::get('/profile', [UserProfileController::class, 'edit'])->name('user.profile.edit');
        Route::patch('/profile', [UserProfileController::class, 'update'])->name('user.profile.update');
        Route::delete('/profile', [UserProfileController::class, 'destroy'])->name('user.profile.destroy');
        Route::middleware('verified_account')->group(function () {
            // Other routes here
        });
    });
});
Route::prefix('admin')->middleware(['auth', 'admin', 'verified_email', 'verified_account'])->group(function () {
    Route::get('/dashboard', AdminDashboardController::class)->name('admin.dashboard');
    Route::resource('users', AdminUsersController::class)->only(['index', 'destroy'])->names(['index' => 'admin.users.index', 'destroy' => 'admin.users.destroy',]);
    Route::patch('/users/{user}/make-admin', [AdminUsersController::class, 'makeAdmin'])->name('admin.users.make-admin');
    ROute::patch('/users/{user}/remove-admin', [AdminUsersController::class, 'removeAdmin'])->name('admin.users.remove-admin');
});

require __DIR__ . '/auth.php';
