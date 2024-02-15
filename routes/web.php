<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DoctorProfile;
use App\Http\Controllers\DoctorProfileController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// pages route 
Route::get('/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'verified', 'role:admin'])->name('dashboard');


Route::middleware(['auth', 'role:doctor'])->group(function () {
    Route::get('/doctor', [DoctorController::class, 'index'])->name('doctor.dashboard');
});

Route::middleware(['auth', 'role:patient'])->group(function () {
    Route::get('/patient', [PatientController::class, 'index'])->name('patient.page');
});

// page profile doctor 

Route::middleware(['auth', 'role:patient'])->group(function () {
    Route::get('/doctorProfile/{id}', [DoctorProfileController::class, 'index'])->name('patient.doctorProfile');
});
Route::middleware(['auth', 'role:patient'])->group(function () {
    Route::get('/appointments', [AppointmentController::class, 'getDoctors'])->name('patient.appointment');
});
Route::middleware(['auth', 'role:patient'])->group(function () {
    Route::post('/comment/add', [CommentController::class, 'store'])->name('comment.store');
});

Route::post('/book-appointment', [AppointmentController::class,'bookAppointment'])->name('book-appointment');


// get doctors 
