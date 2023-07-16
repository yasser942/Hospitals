<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/Dashboard_Admin',[\App\Http\Controllers\Dashboard\DashboardController::class,'index']);
Route::get('/dashboard/user', function () {

    return view('/Dashboard/User/dashboard');
})->middleware(['auth'])->name('dashboard.user');




require __DIR__.'/auth.php';
