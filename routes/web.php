<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RequestEarningsController;
use App\Http\Controllers\UseProfileController;
use App\Http\Controllers\PackageController;

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

Route::group(['middleware' => ['auth', 'auth.role:ADMIN||EMP']], function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    // Admins and employees both alowed to access these routes
    //supplier routes
    // Route::resource('supplier', SupplierController::class);
    // Route::resource('product', ProductController::class)->except('destroy');
    Route::get('/profile', [UseProfileController::class, 'profile'])->name('profile');
    Route::get('/package', [PackageController::class, 'package'])->name('package');
    Route::resource('request_earnings', RequestEarningsController::class)->except('destroy');
});

Route::group(['middleware' => ['auth', 'auth.role:ADMIN']], function () {
    // Only admins alowed to access these routes
    Route::resource('employee', EmployeeController::class)->except('destroy');
    Route::post('employee/status', [EmployeeController::class, 'status'])->name('employee.status');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');




