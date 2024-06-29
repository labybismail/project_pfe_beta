<?php

use App\Models\Doctor;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\doctorController;


Route::middleware('guest')->group(function(){
    Route::get('/', [homeController::class,'home'])->name('home');
    
    Route::get('doctor/{id}',[doctorController::class,'show'])->name('doctorProfile');
    
});
Route::prefix('admin')->group(function(){
    Route::get('/dashboard', [adminController::class,'index'])->name('admin.index');
    Route::get('/doctorsList', [adminController::class,'doctorsList'])->name('admin.doctorsList');
});

Route::middleware('admin')->group(function(){

});
Route::middleware('patient')->group(function(){

});
Route::middleware('doctor')->group(function(){

});