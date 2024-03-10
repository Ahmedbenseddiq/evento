<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminPanel\adminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\organizerPanel\organizerController;
use App\Http\Controllers\clientPanel\clientController;
use App\Http\Controllers\dashboard\dashboardController;
use App\Http\Controllers\eventController;

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
    Route::get('admin/categories',[CategoryController::class, 'index'])->name('admin.categories');
    Route::get('admin/createCategory',[CategoryController::class, 'create'])->name('admin.createCategory');
    Route::post('admin/storeCategory',[CategoryController::class, 'store'])->name('admin.storeCategory');
    Route::get('admin/{category}/editCategory',[CategoryController::class, 'edit'])->name('admin.editCategory');
    Route::post('admin/{category}/updateCategory',[CategoryController::class, 'update'])->name('admin.updateCategory');
    Route::delete('admin/{category}/destroyCategory',[CategoryController::class, 'destroy'])->name('admin.detroyCategory');
    Route::get('admin/users',[adminController::class, 'users'])->name('admin.users');
    Route::post('admin/users/{id}/restrict', [AdminController::class, 'restrictUser'])->name('admin.restrictUsers');
    Route::get('admin/events',[adminController::class, 'events'])->name('admin.events');
    Route::post('admin/events/{id}/approve', [AdminController::class, 'approveEvent'])->name('admin.approveEvents');
});


Route::middleware(['auth','role:organizer'])->group(function () {
    Route::get('organizer/home',[eventController::class, 'index'])->name('organizer.home');
    Route::get('organizer/createEvent',[eventController::class, 'create'])->name('organizer.createEvent');
    Route::post('organizer/storeEvent',[eventController::class, 'store'])->name('organizer.storeEvent');
    Route::get('organizer/{event}/editEvent',[eventController::class, 'edit'])->name('organizer.editEvent');
    Route::post('organizer/{event}/updateEvent',[eventController::class, 'update'])->name('organizer.updateEvent');
    Route::delete('organizer/{event}/destroyEvent',[eventController::class, 'destroy'])->name('organizer.destroyEvent');
});


Route::middleware(['auth','role:client'])->group(function () {
    Route::get('client/home',[clientController::class, 'index'])->name('client.home');
    Route::get('client/{id}/single',[clientController::class, 'single'])->name('client.single');
    Route::get('client/{id}/createReservation', [clientController::class, 'createReservation'])->name('client.createReservation');
    Route::post('client/storeReservation', [clientController::class,'storeReservation'])->name('client.storeReservation');
});

