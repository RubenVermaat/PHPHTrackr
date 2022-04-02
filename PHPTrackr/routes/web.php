<?php

use App\Http\Controllers\PackageController;
use App\Models\Package;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/', function () {
    $data = Package::orderBy('created_at', 'asc')->get();

    return view('adminPanel', [
        'packages' => $data
    ]);
})->name('adminPanel');

// Route::resource('/adminPanel', PackageController::class);
// Route::get('/adminPanel', function () {
//     return view('adminPanel');
// })->name('adminPanel');


require __DIR__.'/auth.php';
