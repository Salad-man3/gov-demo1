<?php

use App\Http\Controllers\Admin\AdminComplaintController;
use App\Http\Controllers\Admin\AdminDecisionController;
use App\Http\Controllers\Admin\AdminServiceController;
use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\Admin\AdminActivityController;
use App\Http\Controllers\User\UserActivityController;
use App\Http\Controllers\User\UserNewsController;
use App\Http\Controllers\User\UserDecisionController;
use App\Http\Controllers\User\UserServiceController;
use App\Http\Controllers\User\UserComplaintController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});
//breeze added
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {
    Route::resource('decisions', AdminDecisionController::class);
    Route::resource('services', AdminServiceController::class);
    Route::resource('complaints', AdminComplaintController::class);
    Route::resource('news', AdminNewsController::class);
    Route::resource('activities', AdminActivityController::class);
    Route::get('council', function () {
        return view('council');
    });
});

Route::resource('/decisions', UserDecisionController::class);

Route::resource('/complaints', UserComplaintController::class);

Route::get('/complaints', [UserComplaintController::class, 'create'])->name('complaints.index');

Route::resource('/services', UserServiceController::class);

Route::resource('/news', UserNewsController::class);

Route::resource('/activities', UserActivityController::class);



Route::get('/council', function () {
    return view('council');
});


require __DIR__ . '/auth.php';

require __DIR__ . '/admin-auth.php';
