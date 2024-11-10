<?php


use App\Http\Controllers\ClinicController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::group([

    // for common things between routes
    'middleware' => ['auth'],
], function () {
    Route::get('/admin/cp', [ClinicController::class, 'index'])->name('admin.home');
  // web.php

Route::get('/admin/clinic/{id}', [ClinicController::class, 'show'])->name('dashboard.clinic.show');
Route::put('/admin/clinic/update/{id}', [ClinicController::class, 'update'])->name('dashboard.clinic.update');
Route::get('/admin/showall', [ClinicController::class, 'showall'])->name('dashboard.showall');
// Route::get('/export', [ClinicController::class, 'exportToExcel'])->name('export.excel');
 Route::get('/export', [ClinicController::class, 'extractData'])->name('export.csv');



});



