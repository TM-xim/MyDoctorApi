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

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/admins', [App\Http\Controllers\Admin\AdminsController::class, 'index'])->name('admin.admins');
    Route::get('/admin/admins/add', [App\Http\Controllers\Admin\AdminsController::class, 'add'])->name('admin.addAdmin');
    Route::post('/admin/admins/add', [App\Http\Controllers\Admin\AdminsController::class, 'create'])->name('admin.addAdmin');
    Route::get('/admin/admins/edit/{id}', [App\Http\Controllers\Admin\AdminsController::class, 'edit'])->name('admin.editAdmin');
});
