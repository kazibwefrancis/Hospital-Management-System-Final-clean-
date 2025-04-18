<?php

use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/



Route::get('/',[HomeController::class,'index']);

// Francis: Changed '/home' to '/redirect' and protect with 'auth'
Route::get('/redirect', [HomeController::class, 'redirect'])->middleware('auth');

// Francis: Dashboard route (optional: only needed if you directly access /dashboard)
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
//Route to admin dashboard when button is pressed
Route::get('/admin/dashboard', function () {
    return view('admin.home');
})->name('admin.dashboard')->middleware('auth');

//Route to doctor dashboard when button is pressed
Route::get('/doctor/dashboard', function () {
    return view('admin.doctor.home');
})->name('doctor.dashboard')->middleware('auth');

//Route to receptionist dashboard when button is pressed
Route::get('/receptionist/dashboard', function () {
    return view('admin.receptionist.home');
})->name('receptionist.dashboard')->middleware('auth');

//Route to pharmacist dashboard when button is pressed
Route::get('/pharmacist/dashboard', function () {
    return view('pharmacist.home');
})->name('pharmacist.dashboard')->middleware('auth');

//route to add user form
Route::get('admin/adduser',[Admin::class,'adduser'])->name('adduser')->middleware('auth');
//route to add user
Route::post('admin/adduser',[Admin::class,'saveuser'])->name('saveuser')->middleware('auth');

//route to analytics for admin
Route::get('admin/analytics',[Admin::class,'analytics'])->name('admin.dashboard')->middleware('auth');
