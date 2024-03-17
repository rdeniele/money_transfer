<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoneyTransferController;
use App\Http\Controllers\LoginController;
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


Route::view('/users', 'UserManagement.users');
Route::view('/login', 'Login.users');



// Route::get('/', [LoginController::class, 'index']);
Route::get('/', [MoneyTransferController::class, 'index']);
Route::post('/users', [MoneyTransferController::class, 'add']);
Route::get('/delete/{id}', [MoneyTransferController::class, 'delete']);
// Route::get('/edit/{id}', [MoneyTransferController::class, 'edit']);
// Route::post('/edit/{id}', [MoneyTransferController::class, 'update']);

// Route::get('user-management/users/{id}/edit', [MoneyTransferController::class, 'edit'])->name('UserManagement.user_edit');
// Route::put('user-management/users/{id}/edit', [MoneyTransferController::class, 'update'])->name('UserManagement.user_edit');

Route::get('/edit/{id}', [MoneyTransferController::class, 'edit'])->name('UserManagement.user_edit');
Route::put('/user-management/users/{id}/update', [MoneyTransferController::class, 'update'])->name('UserManagement.user_update');