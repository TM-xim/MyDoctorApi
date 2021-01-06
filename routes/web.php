<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/login', [App\Http\Controllers\Admin\LoginController::class, 'index'])->name('admin.login');
Route::post('/admin/login', [App\Http\Controllers\Admin\LoginController::class, 'login'])->name('admin.login');
Route::get('/doctor/login', [App\Http\Controllers\Doctor\LoginController::class, 'index'])->name('doctor.login');
Route::post('/doctor/login', [App\Http\Controllers\Doctor\LoginController::class, 'login'])->name('doctor.login');

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/admins', [App\Http\Controllers\Admin\AdminsController::class, 'index'])->name('admin.admins');
    Route::get('/admin/admins/add', [App\Http\Controllers\Admin\AdminsController::class, 'add'])->name('admin.addAdmin');
    Route::post('/admin/admins/add', [App\Http\Controllers\Admin\AdminsController::class, 'create'])->name('admin.addAdmin');
    Route::get('/admin/admins/edit/{adminId}', [App\Http\Controllers\Admin\AdminsController::class, 'edit'])->name('admin.editAdmin');
    Route::put('/admin/admins/edit/{adminId}', [App\Http\Controllers\Admin\AdminsController::class, 'update'])->name('admin.editAdmin');
    Route::get('/admin/admins/{adminId}/delete', [App\Http\Controllers\Admin\AdminsController::class, 'delete'])->name('admin.deleteAdmin');
    Route::delete('/admin/admins/{adminId}/delete', [App\Http\Controllers\Admin\AdminsController::class, 'destroy'])->name('admin.deleteAdmin');

    Route::get('/admin/doctors', [App\Http\Controllers\Admin\DoctorsController::class, 'index'])->name('admin.doctors');
    Route::get('/admin/doctors/add', [App\Http\Controllers\Admin\DoctorsController::class, 'add'])->name('admin.addDoctor');
    Route::post('/admin/doctors/add', [App\Http\Controllers\Admin\DoctorsController::class, 'create'])->name('admin.addDoctor');
    Route::get('/admin/doctors/edit/{doctorId}', [App\Http\Controllers\Admin\DoctorsController::class, 'edit'])->name('admin.editDoctor');
    Route::put('/admin/doctors/edit/{doctorId}', [App\Http\Controllers\Admin\DoctorsController::class, 'update'])->name('admin.editDoctor');
    Route::get('/admin/doctors/{doctorId}/delete', [App\Http\Controllers\Admin\DoctorsController::class, 'delete'])->name('admin.deleteDoctor');
    Route::delete('/admin/doctors/{doctorId}/delete', [App\Http\Controllers\Admin\DoctorsController::class, 'destroy'])->name('admin.deleteDoctor');
});

Route::middleware(['auth:doctor'])->group(function () {
    Route::view('/doctor/welcome', 'doctor.welcome')->name('doctor.welcome');
    Route::get('/doctor/me/', [App\Http\Controllers\Doctor\DoctorController::class, 'edit'])->name('doctor.editDoctor');
    Route::put('/doctor/me/', [App\Http\Controllers\Doctor\DoctorController::class, 'update'])->name('doctor.editDoctor');
    Route::get('/doctor/agenda', [App\Http\Controllers\Doctor\DoctorController::class, 'list'])->name('doctor.list');
    Route::get('/doctor/agenda/createSchedule', [App\Http\Controllers\Doctor\SchedulesController::class, 'add'])->name('doctor.schedule.add');
});
