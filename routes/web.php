<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManageUsersController;

Route::get('/', [HomeController::class, 'homepage']);
Route::get('/home', [AdminController::class, 'index'])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    // Admin manage users dashboard
    Route::get('/admin/manage-users', [AdminController::class, 'manageUsers'])->name('admin.manage.users');

    // Users page inside manage users
    Route::get('/admin/manage-users/users', [ManageUsersController::class, 'users'])->name('users');
    Route::get('/admin/manage-users/role', [ManageUsersController::class, 'role'])->name('role');
    Route::get('/admin/manage-users/index', [ManageUsersController::class, 'index'])->name('index');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});


