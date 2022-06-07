<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
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

Route::controller(VideoController::class)->group(function () {
    Route::get('/', 'index')->name('home');

    Route::prefix('/video')->group(function () {
        Route::get('/create', 'create')->middleware(['auth'])->name('video.create');
        Route::post('/store', 'store')->name('video.store');
        Route::get('/{id}', 'show')->name('video.show');
        Route::delete('/{id}/delete', 'destroy')->name('video.destroy');
    });
});

Route::controller(UserController::class)->group(function () {
    Route::get('/user/{id}', 'show')->middleware(['auth'])->name('channel');

    Route::prefix('/admin')->group(function () {
        Route::get('/users', 'index')->middleware(['auth'])->name('users');
        Route::put('/user/{id}/ban', 'update')->middleware(['auth'])->name('ban');
    });
});

Route::get('/dashboard/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
