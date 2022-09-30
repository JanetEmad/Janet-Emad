<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::prefix('dashboard')->name('dashboard')->group(function(){
    Route::get('/',DashboardController::class);
    Route::prefix('posts')->name('.posts.')->controller(PostController::class)->group(function(){
        Route::get('/create','create')->name('create');
        Route::post('/store','store')->name('store');
        Route::delete('/delete/{id}','delete')->name('delete');
        Route::get('/show/{id}','show')->name('show');
    });
});
