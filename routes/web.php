<?php

use App\Http\Controllers\PelayanController;
use App\Http\Controllers\PembeliController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('pembeli', PembeliController::class);
Route::resource('pelayan', PelayanController::class);
Route::resource('/', PelayanController::class);

Route::prefix('pembeli')->group(function () {
    Route::get('/take/{pembeli}', [PembeliController::class, 'take'])->name('pembelis.take');
    Route::post('/take/{pembeli}', [PembeliController::class, 'takeStore'])->name('pembelis.takeStore');
});
