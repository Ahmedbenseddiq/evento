<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminPanel\adminController;
use App\Http\Controllers\organizerPanel\organizerController;
use App\Http\Controllers\clientPanel\clientController;
use App\Http\Controllers\dashboard\dashboardController;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', [dashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('admin/home',[adminController::class, 'index'])->name('admin.home');
});


Route::middleware(['auth','role:organizer'])->group(function () {
    Route::get('organizer/home',[organizerController::class, 'index'])->name('organizer.home');
});


Route::middleware(['auth','role:client'])->group(function () {
    Route::get('client/home',[clientController::class, 'index'])->name('client.home');
});

