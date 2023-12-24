<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FindController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\AllTripController;
use App\Http\Controllers\PurchasedController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('bus')->middleware('auth')->group(function() {

    //Create Trip Page

    Route::get('/trip', [TripController::class, 'trip'])->name('bus.trip');
    Route::post('/trip', [TripController::class, 'submit_trip'])->name('bus.trip');

    // Find Ticket Page

    Route::get('/search', [FindController::class, 'find'])->name('bus.search');
    Route::post('/search', [FindController::class, 'search'])->name('bus.search');

    Route::get('/show', [FindController::class, 'show'])->name('bus.show');

    Route::get('/buy-ticket', [FindController::class, 'buy'])->name('bus.buy-ticket');
    Route::post('/buy-ticket', [FindController::class, 'submit_buy'])->name('bus.buy-ticket');

    // Purchased Ticket Page

    Route::get('/purchased-ticket', [PurchasedController::class, 'purchased'])->name('bus.purchased-ticket');
    
    // All Availble Trips Page

    Route::get('/all-trip', [AllTripController::class, 'all_trip'])->name('bus.all-trip');
    Route::get('/all-trip/{id}', [AllTripController::class, 'deleteTrip'])->name('bus.delete-trip');

});

require __DIR__.'/auth.php';
