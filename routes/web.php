<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToppageController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\ListController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [ToppageController::class, 'index']);
// Route::get('/', function(){
//     return view('welcome');
// });

Route::resource('maps', MapController::class)->middleware(['auth', 'verified']);
Auth::routes(['verify' => true]);

Route::resource('list', ListController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
