<?php
require __DIR__ . '/auth.php';

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\AssetController;
use App\Http\Controllers\Admin\QrCodeController;
use App\Models\Department;
use App\Http\Controllers\Admin\ExcelController;
use App\Http\Controllers\Admin\DepartmentController;

Route::middleware(['auth', 'verified', 'web'])->group(function () {

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Location feature
    Route::get('location', [LocationController::class, 'index'])->name('location');
    Route::get('add-location', [LocationController::class, 'create'])->name('add-location');
    Route::post('add-location', [LocationController::class, 'store'])->name('locations.store');
    Route::get('edit-location/{id}/edit', [LocationController::class, 'edit'])->name('locations.edit');
    Route::put('edit-location/{id}', [LocationController::class, 'update'])->name('locations.update');
    Route::delete('/locations/{id}', [LocationController::class, 'destroy'])->name('locations.destroy');
    Route::post('import-location', [LocationController::class, 'import_excel'])->name('locations.import_excel');
    Route::post('/locations/copy', [LocationController::class, 'copyLocation'])->name('locations.copy');
    // routes/web.php

    // User and role feature
    Route::prefix('permission/show')->group(function () {
        Route::get('user', [UserController::class, 'index'])->name('user.index');
        Route::get('role', [RoleController::class, 'index'])->name('role.index');
        Route::post('roles/copy', [RoleController::class, 'copyRole'])->name('role.copy');
    });

    Route::prefix('permission/create/')->group(function () {
        // User
        Route::get('user', [UserController::class, 'create'])->name('user.create');
        Route::post('user', [UserController::class, 'store'])->name('user.store');
        // Role
        Route::get('role', [RoleController::class, 'create'])->name('role.create');
        Route::post('role', [RoleController::class, 'store'])->name('role.store');
    });
    // Role CRUD
    Route::get('role/{id}', [RoleController::class, 'edit'])->name('role.edit');
    Route::put('role/{id}', [RoleController::class, 'update'])->name('role.update');
    Route::delete('role/delete/{id}', [RoleController::class, 'destroy'])->name('role.destroy');

    // User CRUD in Admin
    Route::get('user/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('user/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    // Assets feature 
    Route::resource('assets/assets', AssetController::class);
    Route::post('images', [AssetController::class, 'uploadImages'])->name('images.upload');
    Route::post('assets/import-assets', [AssetController::class, 'import_excel'])->name('assets.import_excel');

    // Download sample excel file
    Route::get('download-excel/{file}', [ExcelController::class, 'download_excel'])->name('download_excel');


    // QR Code feature
    Route::get('qr-code/template', [QrCodeController::class, 'template'])->name('template');
    Route::post('qr-code/select-asset/{id}', [QrCodeController::class, 'select_asset'])->name('select_asset');
    Route::get('qr-code/print-template', [QrCodeController::class, 'print_template'])->name('print_template');
    Route::post('/print', [QrCodeController::class, 'print'])->name('print');
    Route::get('/show-print', [QrCodeController::class, 'showPrint'])->name('show.print');
    Route::get('show-info-qr/{id}', [QrCodeController::class, 'showInfoQr'])->name('show.info.qrcode');
    // Logout feature
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
Route::get('department-by-location-id/{id}', [DepartmentController::class, 'getInfoDepart'])->name('department.byLocation');
