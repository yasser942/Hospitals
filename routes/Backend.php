<?php

use App\Http\Controllers\Dashboard\DoctorController;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
##############################User Dashboard###########################
    Route::get('/dashboard/user', function () {

        return view('/Dashboard/User/dashboard');
    })->middleware(['auth'])->name('dashboard.user');

##############################Admin Dashboard###########################
    Route::get('/dashboard/admin', function () {

        return view('/Dashboard/Admin/dashboard');
    })->middleware(['auth:admin',])->name('dashboard.admin');
##############################Admin Logout###########################
    Route::post('logout/admin', [\App\Http\Controllers\Auth\AdminController::class, 'destroy'])
        ->name('logout.admin')->middleware('auth:admin');
##############################Admin Logout End ###########################
    Route::middleware(['auth:admin'])->group(function () {
        ##############################Sections  Routes###########################
        Route::resource('Sections', SectionController::class);
        ##############################Sections  Routes End###########################

        ##############################Doctor  Routes###########################
        Route::resource('Doctors', DoctorController::class);
        Route::post( 'update_password',[DoctorController::class, 'update_password'])->name('update_password');
        Route::post('update_status',[DoctorController::class, 'update_status'])->name('update_status');
        ##############################Doctor  Routes End###########################

    });




    require __DIR__.'/auth.php';

});

