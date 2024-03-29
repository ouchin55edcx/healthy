<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DoctorProfile;
use App\Http\Controllers\DoctorProfileController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\MedicamentController;
use App\Http\Controllers\MedicamentsController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\UrgentAppointmentController;
use App\Models\UrgentAppointment;
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


Route::middleware(['auth', 'role:patient'])->group(function () {
    Route::get('/urgent-appointment', [UrgentAppointmentController::class, 'index'])->name('patient.urgent-appointment');
});

Route::post('/book-appointment', [AppointmentController::class, 'bookAppointment'])->name('book-appointment');


// add to favorite 

// routes/web.php
Route::middleware(['auth', 'role:patient'])->group(function () {
    Route::post('/add-to-favorites', [FavoriteController::class, 'addToFavorites'])->name('add-to-favorites');
});


//  specialty 
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::post('/add-specialty', [SpecialityController::class, 'create'])->name('addSpecialty');
});
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::delete('/specialties/{speciality}', [SpecialityController::class, 'destroy'])->name('specialties.destroy');
});
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/specialties/{speciality}/edit', [SpecialityController::class, 'edit'])->name('specialties.edit');
});
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::put('/specialties/{speciality}', [SpecialityController::class, 'update'])->name('specialities.update');
});

//medicaments 
Route::post('/medicaments', [MedicamentController::class, 'store'])->name('medicaments.store');
//delete
Route::delete('/medicaments/{id}', [MedicamentController::class, 'destroy'])->name('medicaments.destroy');
// In routes/web.php
Route::get('/medicaments/{id}/edit', [MedicamentController::class, 'edit'])->name('medicaments.edit');
Route::put('/medicaments/{id}', [MedicamentController::class, 'update'])->name('medicaments.update');



//doctor
Route::post('/medications', [DoctorController::class, 'store'])->name('medications.store');

// generate-certificate
Route::match(['get', 'post'], '/certificate/{patient_id}/{doctor_id}', [CertificateController::class, 'index'])
    ->name('doctor.certificate');

Route::match(['get', 'post'], '/generate-certificate/{patientId}/{doctorId}', [CertificateController::class, 'generateCertificate'])
    ->name('generate-certificate');
