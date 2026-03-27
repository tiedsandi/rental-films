<?php

use App\Http\Controllers\RentalController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/rentals');
});

Route::get('/rentals', [RentalController::class, 'index'])->name('rental.index');
Route::get('/rentals/create', [RentalController::class, 'create'])->name('rental.create');
Route::post('/rentals', [RentalController::class, 'store'])->name('rental.store');
