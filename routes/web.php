<?php

use App\Http\Controllers\invoicesController;
use App\Models\invoices;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

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

Route::get('/', [invoicesController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

Route::get('/create', [invoicesController::class, 'create'])->middleware(['auth', 'verified']);

Route::post('/invoices', [invoicesController::class, 'store'])->middleware(['auth', 'verified']);

Route::put('/edit/{invoice}', [invoicesController::class, 'update'])->middleware(['auth', 'verified']);

Route::delete('/delete/{invoice}', [invoicesController::class, 'delete'])->middleware(['auth', 'verified']);

Route::get('/details/{invoice}', [invoicesController::class, 'show'])->middleware(['auth', 'verified']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/edit/{invoice}',[invoicesController::class,'edit'])->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
