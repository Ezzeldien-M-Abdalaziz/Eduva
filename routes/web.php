<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Frontend\UserDashboardController;
use \App\Http\Controllers\Frontend\InstructorDashboardController;

Route::get('/', function () {
    return view('welcome');
});

/* Student Role Users Routes */
Route::group(['middleware' => ['auth', 'verified' , 'check_role:student'] , 'prefix' => 'student' , 'as' => 'student.'] , function(){

    Route::get('/dashboard' , [UserDashboardController::class , 'index'] )->name('dashboard');
});



/* Instructor Role Users Routes */
Route::group(['middleware' => ['auth', 'verified' , 'check_role:instructor'] , 'prefix' => 'instructor' , 'as' => 'instructor.'] , function(){

    Route::get('/dashboard' , [InstructorDashboardController::class , 'index'] )->name('dashboard');
});


Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');    //middleware(['auth:admin' is checking against admin guard

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';

