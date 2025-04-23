<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ReceptionistController;
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

//Route to receptionist registering a walkin patient
Route::get('/receptionist/register-patient', [ReceptionistController::class, 'registerPatient'])->name('register.patient');
//Route to receptionist viewing bill of a paitent
Route::get('/receptionist/view-bills', [ReceptionistController::class, 'viewBills'])->name('view.bills');
//Route to receptionist printing bill of a paitent
Route::get('/receptionist/print-bill', [ReceptionistController::class, 'printBill'])->name('print.bill');
Route::get('/receptionist/print-bill/{id}', [ReceptionistController::class, 'printBill'])->name('print.bill');
Route::get('/receptionist/print-bill/{patient_id}', [ReceptionistController::class, 'printBill'])->name('print.bill');
//Route to receptionist scheduling an appointment
Route::get('/receptionist/schedule-appointment', [ReceptionistController::class, 'scheduleAppointment'])->name('schedule.appointment');
// Route to save a new patient
Route::post('/receptionist/save-patient', [ReceptionistController::class, 'savePatient'])->name('save.patient');
//Route to receptionist viewing appointments
Route::get('/receptionist/view-appointments', [ReceptionistController::class, 'viewAppointments'])->name('view.appointments');

Route::post('/appointment/{id}/confirm', [ReceptionistController::class, 'confirmAppointment'])->name('appointment.confirm');
Route::post('/appointment/{id}/reject', [ReceptionistController::class, 'rejectAppointment'])->name('appointment.reject');

//Route to pharmacist dashboard when button is pressed
Route::get('/pharmacist/dashboard', function () {
    return view('pharmacist.home');
})->name('pharmacist.dashboard')->middleware('auth');

//route ton show all users
Route::get('admin/users',[Admin::class,'index'])->name('users')->middleware('auth');
Route::get('/admin/users/search', [Admin::class, 'search'])->name('users.search');
//view user profile
Route::get('admin/users/{id}',[Admin::class,'show'])->name('profile.view')->middleware('auth');
//update user profile
Route::put('admin/users/update/{id}', [Admin::class, 'updateUser'])->name('profile.edit')->middleware('auth');
//route to add user form
Route::get('admin/adduser',[Admin::class,'adduser'])->name('adduser')->middleware('auth');
//route to add user
Route::post('admin/adduser',[Admin::class,'saveuser'])->name('saveuser')->middleware('auth');

//route to analytics for admin
Route::get('admin/analytics',[Admin::class,'analytics'])->name('admin.dashboard')->middleware('auth');

//view your profile as a user
Route::get('user/profile/{id}', [Admin::class, 'viewprofile'])->name('user.profile')->middleware('auth');

//view all recent activities
Route::get('admin/recentActivities',[Admin::class,'recentActivities'])->name('recent.activities')->middleware('auth');

//activity details
Route::get('/activities/{id}', [Admin::class, 'showActivity'])->name('activities.show');

//reports
Route::get('/admin/reports', [Admin::class, 'reports'])->name('admin.reports')->middleware('auth');

Route::post('/save-appointment', [HomeController::class, 'saveAppointment'])->name('save.appointment');

