<?php

use App\Http\Controllers\UserManagementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoneyTransferController;
use App\Http\Controllers\BranchManagementController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by your RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Login route
Route::post('/login', [LoginController::class, 'login']);

Route::get('/', function () {
    return view('Dashboard.dashboard');
});

// User management routes
Route::prefix('users')->group(function () {
    Route::get('/', [UserManagementController::class, 'index'])->name('users.index');
    Route::post('/', [UserManagementController::class, 'add'])->name('users.store');
    Route::get('/edit/{id}', [UserManagementController::class, 'edit'])->name('UserManagement.edit');
    Route::put('/update', [UserManagementController::class, 'update'])->name('UserManagement.update');
    Route::get('/delete/{id}', [UserManagementController::class, 'delete'])->name('UserManagement.delete');
});

// Branch management routes
Route::prefix('branch')->group(function () {
    Route::get('/', [BranchManagementController::class, 'index'])->name('BranchManagement.index');
    Route::post('/', [BranchManagementController::class, 'store'])->name('BranchManagement.branch');
    Route::get('/edit/{id}', [BranchManagementController::class, 'edit'])->name('BranchManagement.edit');
    Route::put('/update', [BranchManagementController::class, 'update'])->name('BranchManagement.update');
    Route::get('/delete/{id}', [BranchManagementController::class, 'delete'])->name('BranchManagement.delete');
});

// Money transfer or transactions routes
Route::prefix('transactions')->group(function () {
    Route::get('/search', 'MoneyTransferController@searchTransactions')->name('transactions.search');
    Route::get('/', [MoneyTransferController::class, 'index'])->name('MoneyTransfer.index');
    Route::post('/', [MoneyTransferController::class, 'store'])->name('MoneyTransfer.store');
    Route::get('/edit/{id}', [MoneyTransferController::class, 'edit'])->name('MoneyTransfer.edit');
    Route::put('/update', [MoneyTransferController::class, 'update'])->name('MoneyTransfer.update');
    Route::get('/delete/{id}', [MoneyTransferController::class, 'delete'])->name('MoneyTransfer.delete');
});


// Route::get('/', function () {
//     return redirect('/dashboard');
// });
