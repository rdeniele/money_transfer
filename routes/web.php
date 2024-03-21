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
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Route::view('/users', 'UserManagement.users');
// Route::view('/login', 'Login.users');
// Route::view('/branch', 'BranchManagement.branch');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', function () {
    return view('UserManagement/users');
});

Route::get('/branch', function () {
    return view('BranchManagement/branch');
});

// Route::get('/login', function () {
//     return view('Login/content'); //path of your view file
// });



// Route::get('/phonebook', function () {

//     return view('phonebook/content');
// });



// user management
Route::get('/', [UserManagementController::class, 'index']);
Route::post('/users', [UserManagementController::class, 'add']);

Route::get('UserManagement/users/{id}/edit',  [UserManagementController::class, 'edit'])->name('UserManagement.edit');
Route::put('/update', [UserManagementController::class, 'update'])->name('UserManagement.update');
Route::get('/delete/{id}', [UserManagementController::class, 'delete'])->name('UserManagement.delete');

// branch management
Route::get('/branch', [BranchManagementController::class, 'index']);
Route::post('/branch', [BranchManagementController::class, 'store']);

Route::get('BranchManagement/branches/{id}/edit',  [BranchManagementController::class, 'edit'])->name('BranchManagement.edit');
Route::put('/branch/update', [BranchManagementController::class, 'update'])->name('BranchManagement.update');
Route::get('/branch/delete/{id}', [BranchManagementController::class, 'delete'])->name('BranchManagement.delete'); 
