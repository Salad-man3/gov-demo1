<?php

use App\Http\Controllers\Admin\AdminDecisionController;
use App\Http\Controllers\Admin\AdminServiceController;
use App\Http\Controllers\User\UserDecisionController;
use App\Http\Controllers\User\UserServiceController;
use App\Http\Controllers\primarycontroller;
use Illuminate\Support\Facades\Route;

Route::get(
    '/',
    [primarycontroller::class, "index"]
);

Route::resource('admin/services', AdminServiceController::class);

Route::resource('admin/decisions', AdminDecisionController::class);

Route::resource('/decisions',UserDecisionController::class);

Route::resource('/services', UserServiceController::class);

