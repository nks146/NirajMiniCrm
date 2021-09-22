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

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']],  function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    Route::get('/company', [App\Http\Controllers\CompanyController::class, 'index'])->name('admin.company.index');
    Route::get('/company/create', [App\Http\Controllers\CompanyController::class, 'create'])->name('admin.company.create');
    Route::post('/company/store', [App\Http\Controllers\CompanyController::class, 'store'])->name('admin.company.store');
    Route::get('/company/edit/{id}', [App\Http\Controllers\CompanyController::class, 'edit'])->name('admin.company.edit');
    Route::post('/company/update/{id}', [App\Http\Controllers\CompanyController::class, 'update'])->name('admin.company.update');
    Route::get('//company/delete/{id}', [App\Http\Controllers\CompanyController::class, 'delete'])->name('admin.company.delete');

    Route::get('/employee', [App\Http\Controllers\EmployeeController::class, 'index'])->name('admin.employee.index');
    Route::get('/employee/create', [App\Http\Controllers\EmployeeController::class, 'create'])->name('admin.employee.create');
    Route::post('/employee/store', [App\Http\Controllers\EmployeeController::class, 'store'])->name('admin.employee.store');
    Route::get('/employee/edit/{id}', [App\Http\Controllers\EmployeeController::class, 'index'])->name('admin.employee.edit');
    Route::post('/employee/update/{id}', [App\Http\Controllers\EmployeeController::class, 'index'])->name('admin.employee.update');
    Route::get('//employee/delete/{id}', [App\Http\Controllers\EmployeeController::class, 'index'])->name('admin.employee.delete');

    Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
});