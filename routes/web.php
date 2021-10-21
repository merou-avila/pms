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

Route::get('/', function () {
    if (auth()->check()) {
        return redirect('/dashboard');
    }

    return redirect()->route('login');
});

Auth::routes([
    'register' => false
]);

Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

/**
 * Account and Profile
 */
Route::prefix('account')->name('account.')->group(function () {

    Route::get('/profile', 'AccountAndProfileController@profile')->name('profile');
    Route::post('/profile', 'AccountAndProfileController@updateProfile')->name('profile.update');
    Route::get('/password', 'AccountAndProfileController@password')->name('password');
    Route::post('/password', 'AccountAndProfileController@updatePassword')->name('password.update');

});

/**
 * Suplliers
 */
Route::prefix('suppliers')->name('suppliers.')->group(function () {

    Route::get('/', 'SuppliersController@index')->name('index');
    Route::get('/create', 'SuppliersController@create')->name('create');
    Route::post('/store', 'SuppliersController@store')->name('store');
    Route::get('/edit/{supplier}', 'SuppliersController@edit')->name('edit');
    Route::post('/update/{supplier}', 'SuppliersController@update')->name('update');
});

/**
 * Users
 */
Route::prefix('users')->name('users.')->group(function () {

    Route::get('/', 'UsersController@index')->name('index');
    Route::get('/edit/{user}', 'UsersController@edit')->name('edit');
    Route::post('/update/{user}', 'UsersController@update')->name('update');

});

/**
 * Medicines
 */
Route::prefix('medicines')->name('medicines.')->group(function () {

    Route::get('/', 'MedicinesController@index')->name('index');
    Route::get('/create', 'MedicinesController@create')->name('create');
    Route::post('/store', 'MedicinesController@store')->name('store');
    Route::get('/show/{medicine}', 'MedicinesController@show')->name('show');
    Route::post('/upload-photo/{medicine}', 'MedicinesController@upload')->name('upload.photo');
    Route::get('/show-photo/{medicine}', 'MedicinesController@showPhoto')->name('show.photo');
    Route::get('/edit/{medicine}', 'MedicinesController@edit')->name('edit');
    Route::post('/update/{medicine}', 'MedicinesController@update')->name('update');
    Route::post('/generate-barcode/{medicine}', 'MedicinesController@generateBarcode')->name('generate.barcode');

});

/**
 * Units
 */
Route::prefix('medicine-types')->name('medicine-types.')->group(function () {

    Route::get('/', 'MedicineTypesController@index')->name('index');
    Route::get('/create', 'MedicineTypesController@create')->name('create');
    Route::post('/store', 'MedicineTypesController@store')->name('store');
    Route::get('/edit/{medicineType}', 'MedicineTypesController@edit')->name('edit');
    Route::post('/update/{medicineType}', 'MedicineTypesController@update')->name('update');
});

/**
 * Categories
 */
Route::prefix('categories')->name('categories.')->group(function () {

    Route::get('/', 'CategoriesController@index')->name('index');
    Route::get('/create', 'CategoriesController@create')->name('create');
    Route::post('/store', 'CategoriesController@store')->name('store');
    Route::get('/edit/{category}', 'CategoriesController@edit')->name('edit');
    Route::post('/update/{category}', 'CategoriesController@update')->name('update');

});

/**
 * Units
 */
Route::prefix('units')->name('units.')->group(function () {

    Route::get('/', 'UnitsController@index')->name('index');
    Route::get('/create', 'UnitsController@create')->name('create');
    Route::post('/store', 'UnitsController@store')->name('store');
    Route::get('/edit/{unit}', 'UnitsController@edit')->name('edit');
    Route::post('/update/{unit}', 'UnitsController@update')->name('update');
});

