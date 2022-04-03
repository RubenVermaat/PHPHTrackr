<?php

use App\Http\Controllers\PackageController;
use App\Http\Middleware\MustBeAdmin;
use App\Models\Package;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\RegisteredUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// guest pages
Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    
});

// admin pages
Route::middleware(['adminRole'])->group(function () {
  
});


// adminstratief 
Route::middleware(['adminRole'])->group(function () {
    
});

// 

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::controller(PackageController::class)->group(function () {
    Route::get('admin/adminpanel', 'create', function() {
        return view('adminpanel');
    })->middleware(['auth'])->name('adminpanel');
});

/*
Route::get('/', function () {
    $data = Package::orderBy('created_at', 'asc')->get();

    return view('adminPanel', [
        'packages' => $data
    ]);
})->name('adminPanel');
*/
// Route::resource('/adminPanel', PackageController::class);
// Route::get('/adminPanel', function () {
//     return view('adminPanel');
// })->name('adminPanel');



Route::middleware('auth')->group(function () {
   
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});




