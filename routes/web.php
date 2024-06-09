<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('logout', [App\Http\Controllers\Auth\LogoutController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {
    
    Route::get('/', function () {
        return view('index');
    })->name('home');
    
    Route::get('/index', [App\Http\Controllers\CRUD\readController::class, 'index'])->name('index');
    Route::get('/read', [App\Http\Controllers\CRUD\readController::class, 'read'])->name('read');
    Route::get('/offer_print', [App\Http\Controllers\CRUD\readController::class, 'offer_print'])->name('offer_print');
    Route::get('/add', [App\Http\Controllers\CRUD\CreateController::class, 'add'])->name('add');
    Route::get('/edit', [App\Http\Controllers\CRUD\UpdateController::class, 'edit'])->name('edit');

    Route::post('/create', [App\Http\Controllers\CRUD\CreateController::class, 'create'])->name('create');
    Route::post('/update', [App\Http\Controllers\CRUD\UpdateController::class, 'update'])->name('update');
    Route::post('/delete', [App\Http\Controllers\CRUD\DeleteController::class, 'delete'])->name('delete');
    Route::post('/search', [App\Http\Controllers\CRUD\SearchController::class, 'search'])->name('search');
});
