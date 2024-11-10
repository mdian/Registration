<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::group([


    // 'middleware' => 'CheckIfThursdayAfter9AM',
    'middleware' => ['CheckIfThursdayAfter9AM', 'sanitize']

], function () {

    Route::get('/registration/{clinic}', [RegisterController::class, 'create'])->name('registration.create');

    Route::get('/', [RegisterController::class, 'index'])->name('registration.index');

    Route::post('/registraion/store', [RegisterController::class, 'store'])->name('registration.store');
});

Route::get('/formclose/{clinic}', [RegisterController::class, 'formclose'])->name('registration.formclose');
// Route::get('/registration/{clinic}', [RegisterController::class, 'create'])->name('registration.create');


// Route::get('/registration/edit/{id}', [RegisterController::class, 'edit'])->name('registration.edit');
