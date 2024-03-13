<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BelajarController;
use App\Http\Controllers\DataTableController;
// use Illuminate\Support\Facades\Auth;


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

Route::get('/register',[LoginController::class, 'register'])->name('register');
Route::post('/prosesregister',[LoginController::class, 'prosesregister'])->name('prosesregister');

Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/proseslogin',[LoginController::class, 'proseslogin'])->name('proseslogin');
Route::get('/logout',[LoginController::class, 'logout'])->name('logout');

// Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function () {

// });

// Route::group(['middleware' => 'web'], function () {

Route::group(['middleware' => ['auth']], function () {

    Route::get('/home',[HomeController::class, 'dashboard'])->name('dashboard');

    Route::get('/user',[HomeController::class, 'index'])->name('indexuser');

    Route::get('/create',[HomeController::class, 'create'])->name('createuser');
    Route::post('/store',[HomeController::class, 'store'])->name('storeuser');

    Route::get('/edit/{id}',[HomeController::class, 'edit'])->name('edituser');
    Route::put('/update/{id}',[HomeController::class, 'update'])->name('updateuser');
    Route::delete('/delete/{id}',[HomeController::class, 'delete'])->name('deleteuser');

    Route::get('/clientside',[DataTableController::class, 'clientside'])->name('clientside');
    Route::get('/serverside',[DataTableController::class, 'serverside'])->name('serverside');

    Route::get('/import',[BelajarController::class, 'import'])->name('import');


     // Route::group(['prefix' => 'belajar'], function () {
        Route::get('/cache', [BelajarController::class, 'cache'])->name('cache');
        Route::get('/import', [BelajarController::class, 'import'])->name('import');
        Route::post('/import-proses', [BelajarController::class, 'import_proses'])->name('import-proses');
    // });



});