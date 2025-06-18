<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManageUsersController;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\AdminEventController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\StaffAssignmentController;
use Illuminate\Support\Facades\Auth;
use App\Models\StaffAssignment;







// Public routes
Route::get('/', [HomeController::class, 'homepage']);
Route::get('/home', [AdminController::class, 'index'])->name('home');
Route::get('/staff/dashboard', [AdminController::class, 'staff'])->middleware(['auth', 'staff'])->name('staff.dashboard');
Route::post('/home/staff', [ManageUsersController::class, 'registerStaff'])->name('home.register.staff.submit');
Route::get('/staff/dashboard', [AdminController::class, 'staff'])->middleware(['auth', 'staff'])->name('staff.dashboard');
//events routes
Route::prefix('admin')->group(function () {
    Route::get('/events', [AdminEventController::class, 'index'])->name('admin.events.index');
    Route::post('/events', [AdminEventController::class, 'store'])->name('admin.events.store');
    Route::get('/events/{id}/edit', [AdminEventController::class, 'edit'])->name('admin.events.edit');
    Route::put('/events/{id}', [AdminEventController::class, 'update'])->name('admin.events.update');
    Route::delete('/events/{id}', [AdminEventController::class, 'destroy'])->name('admin.events.destroy');
    Route::get('/admin/events', [AdminController::class, 'events'])->name('admin.events.index');

});



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
    //store donations
    Route::post('/donate', [DonationController::class, 'store'])->name('donation.store');

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
// reports
Route::get('/admin/reports', [AdminController::class, 'reportOverview'])->name('admin.reports');

//cost
Route::get('/admin/cost-management', [AdminController::class, 'costManagement'])->name('admin.cost');
//route for messages
Route::middleware(['auth'])->group(function () {
    Route::post('/send-message', [MessageController::class, 'sendMessage'])->name('send.message');
    
    Route::middleware(['staff'])->group(function () {
        Route::get('/staff/messages', [MessageController::class, 'staffMessages'])->name('staff.messages');
        Route::post('/staff/message/reply/{id}', [MessageController::class, 'sendReply'])->name('staff.reply');
    });
    //route for assign staff
    Route::get('/admin/staff_assignments', [StaffAssignmentController::class, 'create'])->name('staff.assignments.create');
    Route::post('/admin/staff_assignments', [StaffAssignmentController::class, 'store'])->name('staff.assignments.store');
});
//test
Route::get('/test-past-assignments', function () {
    $staffId = Auth::id(); // Get ID of currently logged-in user

    $assignments = StaffAssignment::with('event')
        ->where('staff_id', $staffId)
        ->whereHas('event', function ($query) {
            $query->whereDate('event_date', '<=', Carbon::today());
        })
        ->get();

    return $assignments;
});


