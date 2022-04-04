<?php

use App\Http\Controllers\LabelController;
use App\Http\Controllers\PackageController;
use App\Http\Middleware\MustBeAdmin;
use App\Models\Package;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\RegisteredAdminController;
use App\Http\Controllers\Auth\LoginUserController;
use App\Http\Controllers\CustomerViewController;

// guest pages
Route::middleware('guest')->group(function () {
    // login
    Route::get('login', [LoginUserController::class, 'create'])
        ->name('login');

    Route::post('login', [LoginUserController::class, 'store']);

    // admin register
    Route::get('admin/register', [RegisteredAdminController::class, 'create'])
        ->name('register');

    Route::post('admin/register', [RegisteredAdminController::class, 'store']);
    
    // normal register
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);
    
});

// logged in users
Route::middleware('auth')->group(function () {

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::post('logout', [LoginUserController::class, 'destroy'])
        ->name('logout');
});




// admin exclusive pages 
Route::middleware(['adminRole'])->group(function () {
});

// all pages employee write access
Route::middleware(['employeeWrite'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});
// all pages employee read access
Route::middleware(['employeeRead'])->group(function () {
  
    
});



// all pages for recievers
Route::middleware(['receiver'])->group(function () {
    Route::get('customerview', [CustomerViewController::class, 'show'])->name('customerview');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::controller(PackageController::class)->group(function () {
    Route::get('adminviews/adminPanel', 'panelIndex')->name('adminPanel');
    Route::get('packages/create', 'create')->name('packageCreate');
    Route::post('packages/store', 'store')->name('packageStore');
    Route::get('packages/index', 'index')->name('packageIndex');
});

Route::controller(LabelController::class)->group(function () {
    Route::get('/labels/create/{id}', 'store')->name('labelCreate');
    Route::get('/labels/index', 'index')->name('labelIndex');
});


require __DIR__ . '/channels.php';
