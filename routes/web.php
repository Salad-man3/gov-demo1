<?php

use App\Http\Controllers\Admin\AdminDecisionController;
use App\Http\Controllers\Admin\AdminServiceController;
use App\Http\Controllers\User\UserDecisionController;
use App\Http\Controllers\User\UserServiceController;
use App\Http\Controllers\ProfileController;
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


Route::resource('admin/services', AdminServiceController::class);

Route::resource('admin/decisions', AdminDecisionController::class);

Route::resource('/decisions',UserDecisionController::class);

Route::resource('/services',UserServiceController::class);



require __DIR__.'/auth.php';

