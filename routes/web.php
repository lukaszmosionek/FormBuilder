<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/formularz', [FormController::class, 'show']);
Route::post('/formularz', [FormController::class, 'submit'])->name('form.submit');
