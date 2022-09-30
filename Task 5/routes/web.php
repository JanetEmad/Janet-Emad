<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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

Route::prefix('dashboard')->middleware(['auth', 'verified'])->name('dashboard')->group(function(){
    Route::get('/',DashboardController::class);
    Route::prefix('products')->name('.products.')->controller(ProductController::class)->group(function(){
        Route::get('/','index')->name('index');
        Route::get('/create','create')->name('create');
        Route::get('/edit/{id}','edit')->name('edit');
        Route::post('/store','store')->name('store');
        Route::put('/update/{id}','update')->name('update');
        Route::delete('/delete/{id}','delete')->name('delete');
    });
});

Route::get('dashboard/profile/{id}',[AdminController::class,'getadmin'])->name('dashboard.profile');
Route::get('dashboard/profile/{id}/edit',[AdminController::class,'edit'])->name('dashboard.profile.edit');
Route::put('dashboard/profile/{id}/update',[AdminController::class,'update'])->name('dashboard.profile.update');


require __DIR__.'/auth.php';
