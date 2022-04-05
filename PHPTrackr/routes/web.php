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
    ->name('admin/register');

    Route::post('admin/register', [RegisteredAdminController::class, 'store'])
    ->name('admin/register-post');

    
    // normal register
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store'])
    ->name('register-post');
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
    Route::controller(PackageController::class)->group(function () {
        Route::get('adminviews/adminPanel', 'panelIndex')->name('adminPanel');
    });

});

// all pages employee write access
Route::middleware(['employeeWrite'])->group(function () {
    Route::controller(PackageController::class)->group(function () {
        Route::get('packages/create', 'create')->name('packageCreate');
        Route::post('packages/store', 'store')->name('packageStore');
        
    });
    Route::controller(LabelController::class)->group(function () {
        Route::get('labels/store/{id}', 'store')->name('labelStore');
        Route::post('labels/storeBulk', 'storeBulk')->name('labelsBulkStore');
        Route::post('labels/update', 'updateStatus');
    });

});
// all pages employee read access
Route::middleware(['employeeRead'])->group(function () {
    Route::controller(PackageController::class)->group(function () {
        Route::get('packages/index', 'index')->name('packageIndex');
        Route::any('packages/search', 'search')->name('packageSearch');
        Route::post('packages/import', 'import')->name('packagesImport');
    });

    Route::controller(LabelController::class)->group(function () {
        Route::get('labels/index', 'index')->name('labelIndex');
        Route::any('labels/search', 'search')->name('labelSearch');
        Route::get('labels/pdf/{id}', [LabelController::class, 'exportPDF']);
    });
});

Route::get('/', function () {
    return view('welcome');
});

// all pages for recievers
Route::middleware(['receiver'])->group(function () {
    Route::get('customerview', [CustomerViewController::class, 'index'])->name('customerview');
    Route::get('customerview/review', [CustomerViewController::class, 'show'])->name('customerreview');
    Route::post('customerview/review', [CustomerViewController::class, 'store'])->name('customerreview-post');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


require __DIR__ . '/channels.php';
