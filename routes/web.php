<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home.index');
    Route::get('/register', 'register')->name('register');
});

Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard');
    Route::post('/add-course', 'addCourse')->name('add.course');
    Route::get('/my-course', 'getCourse')->name('get.course');
    Route::get('/view-course/{id}', 'viewCourse')->name('view.course');
    Route::post('/next-module', 'getNextModule')->name('get.next.module');
})->middleware(['auth', 'verified']);


require __DIR__ . '/auth.php';
