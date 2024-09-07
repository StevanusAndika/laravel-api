<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Default route to show the welcome page


// Resource routes for managing cars
Route::apiResource('cars', CarController::class);
