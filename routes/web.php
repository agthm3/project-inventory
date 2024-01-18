<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\InputDataController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestMaterialController;
use App\Http\Controllers\VerificationController;
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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
// input data
Route::get('/input-data', [InputDataController::class, 'index'])->name('inputdata.index');
Route::post('/input-data/create', [InputDataController::class, 'store'])->name('inputdata.store');
Route::get('/inventory/edit/{inputData}', [InputDataController::class, 'edit'])->name('inputdata.edit');
Route::patch('/inventory/edit/{inputData}', [InputDataController::class, 'update'])->name('inputdata.update');

Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.index');
Route::get('/inventory/{inputData}', [InventoryController::class, 'show'])->name('inventory.show');


Route::get('/request-material', [RequestMaterialController::class, 'index'])->name('requestmaterial.index');
Route::get('/verification', [VerificationController::class, 'index'])->name('verification.index');
Route::get('/history', [HistoryController::class, 'index'])->name('history.index');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
