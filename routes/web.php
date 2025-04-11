<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\controllers\AdminController;


Route::get('/', [HomeController::class, 'homepage']);


route::get('/home',[AdminController::class,'index'])->name('home');




Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/manage-users', [AdminController::class, 'manageUsers'])->name('admin.manage.users');
});

