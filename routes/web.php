<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManageUsersController;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Http\Controllers\MessageController;




// Public routes
Route::get('/', [HomeController::class, 'homepage']);
Route::get('/home', [AdminController::class, 'index'])->name('home');
Route::get('/staff/dashboard', [AdminController::class, 'staff'])->middleware(['auth', 'staff'])->name('staff.dashboard');
Route::post('/home/staff', [ManageUsersController::class, 'registerStaff'])->name('home.register.staff.submit');
Route::get('/staff/dashboard', [AdminController::class, 'staff'])->middleware(['auth', 'staff'])->name('staff.dashboard');



Route::middleware(['auth'])->group(function () {
    Route::get('home/staff', [StaffController::class, 'dashboard'])->name('home.staff');
});



// Protected routes for authenticated and verified users
Route::middleware(['auth', 'verified'])->group(function () {
    // Admin manage users dashboard
    Route::get('/admin/manage-users', [AdminController::class, 'manageUsers'])->name('admin.manage.users');

    // Users pages inside manage users
    Route::get('/admin/manage-users/users', [ManageUsersController::class, 'users'])->name('users');
    Route::get('/admin/manage-users/role', [ManageUsersController::class, 'role'])->name('role');
    Route::get('/admin/manage-users/index', [ManageUsersController::class, 'index'])->name('index');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    // Route to get user count excluding admins
    Route::get('/user-count', function () {
        $count = User::where('usertype', '!=', 'admin')->count();
        return response()->json(['count' => $count]);
    });

    // Get new users from the last week
    Route::get('/new-user-count', function () {
        $oneWeekAgo = Carbon::now()->subWeek();
        $count = User::where('usertype', '!=', 'admin')
                    ->where('created_at', '>=', $oneWeekAgo)
                    ->count();
        return response()->json(['new_user_count' => $count]);
    })->name('new.user.count');

    // New user details
    Route::get('/new-user-details', function () {
        $oneWeekAgo = Carbon::now()->subWeek();
        $newUsers = User::where('usertype', '!=', 'admin')
                    ->where('created_at', '>=', $oneWeekAgo)
                    ->get(['id', 'name', 'email', 'created_at']);
        return response()->json($newUsers);
    })->name('new.user.details');

    // Total user details (excluding admin)
    Route::get('/total-user-details', function () {
        $users = User::where('usertype', '!=', 'admin')->get(['id', 'name', 'email', 'created_at']);
        return response()->json($users);
    });
    Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/user/dashboard', [HomeController::class, 'userDashboard'])->name('user.dashboard');
});
//protect registration

Route::post('/admin/manage-users/store-user', [ManageUsersController::class, 'storeUser']);
Route::post('/admin/manage-users/store-staff', [ManageUsersController::class, 'store'])->name('admin.store.staff');



//route to export spredssheet
Route::get('/export-users-word', [ManageUsersController::class, 'exportUsersToWord'])->name('export.users.word');

});
//route for messages
Route::middleware(['auth'])->group(function () {
    Route::post('/send-message', [MessageController::class, 'sendMessage'])->name('send.message');
    
    Route::middleware(['staff'])->group(function () {
        Route::get('/staff/messages', [MessageController::class, 'staffMessages'])->name('staff.messages');
        Route::post('/staff/message/reply/{id}', [MessageController::class, 'sendReply'])->name('staff.reply');
    });
});


