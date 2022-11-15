<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;



Route::get('country',[ServiceController::class,'country'])->name('country_data');
Route::post('city',[ServiceController::class,'city'])->name('city_data');
Route::post('district',[ServiceController::class,'district'])->name('district_data');

Route::post('city-date',[ServiceController::class,'city_date'])->name('city_date');

Route::get('filter',[ServiceController::class,'filter_data'])->name('filter_data');


Route::get('detail',[ServiceController::class,'detail'])->name('detail');


Route::get('/',[ServiceController::class,'index'])->name('index');

