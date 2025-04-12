<?php

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
