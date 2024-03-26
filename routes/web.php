<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CarController;
use App\Http\Controllers\FoodController;

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

Route::get('/home', function () {
    return view('layout/homepage');
});

Route::get('/products', function()
{
return view('blacks/products');
});

Route::get('/details', function()
{
return view('blacks/details');
});

Route::get('/master', function()
{
return view('layout/master');
});

// Route::get('/create-food', function()
// {
// return view('foods/create-food');
// });

Route::resource('foods', FoodController::class);

// Route::get('/allCar', [CarController::class, 'index']);

// Route::prefix('car')->group(function () {
//     Route::get('/show/{id}', [CarController::class, 'getEdit'])->name('showCardetail.car-detail');

//     Route::get('/getCar/{id}', [CarController::class, 'show'])->name('car-detail');

//     Route::post('/edit/{id}', [CarController::class, 'updateCar'])->name('editCar.car-detail');
//     Route::get('/delete/{id}', [CarController::class, 'delete'])->name('delete.car-detail');
// });

// // Route::get('/getCar/{id}', [CarController::class, 'show'])->name('show.car-detail');

// Route::resource('cars', CarController::class);


