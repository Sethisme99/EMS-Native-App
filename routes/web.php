<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use Native\Laravel\Facades\Window;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');


Route::resource('employees',EmployeeController::class);