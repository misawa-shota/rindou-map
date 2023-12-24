<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToppageController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\RindouController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ClearController;
use App\Http\Controllers\RuleController;
use App\Http\Controllers\PrivacyController;
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

Route::resource('maps', MapController::class);

Route::get('posts/detailpage/{post}', [PostController::class, 'detailpage'])->name('posts.detailpage');
Route::group(['middleware' => 'auth'], function() {
    Route::post('posts/create', [PostController::class, 'getRindouList']);
    Route::resource('posts', PostController::class);
    Route::get('users/mypage', [UserController::class, 'mypage'])->name('mypage');
    Route::get('users/mypage/edit', [UserController::class, 'edit'])->name('mypage.edit');
    Route::put('users/mypage/update', [UserController::class, 'update'])->name('mypage.update');
    Route::get('clear', [ClearController::class, 'index'])->name('clear.index');
    Route::post('clear/create', [ClearController::class, 'getRindouList']);
    Route::get('clear/create', [ClearController::class, 'create'])->name('clear.create');
    Route::post('clear/store', [ClearController::class, 'store'])->name('clear.store');
    Route::delete('clear/destroy/{clear}', [ClearController::class, 'destroy'])->name('clear.destroy');
});
Auth::routes(['verify' => true]);

Route::get('rindous/postList/{rindou}', [RindouController::class, 'postList'])->name('rindous.postList');
Route::resource('rindous', RindouController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('rule', [RuleController::class, 'index'])->name('rule.index');

Route::get('privacy', [PrivacyController::class, 'index'])->name('privacy.index');
