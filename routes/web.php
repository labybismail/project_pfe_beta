<?php

use App\Http\Controllers\pagesRedirects;
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
    Route::get('/dashboard', [pagesRedirects::class,'adminIndex'])->name('admin.index');
    Route::get('/doctorsList', [pagesRedirects::class,'doctorsList'])->name('admin.doctorsList');
    Route::get('/patientsList', [pagesRedirects::class,'patientsList'])->name('admin.patientsList');
    Route::get('/consultationsList', [pagesRedirects::class,'consultationsList'])->name('admin.consultationsList');
    Route::get('/specialitiesList', [pagesRedirects::class,'specialitiesList'])->name('admin.specialitiesList');
    Route::get('/reviewsList', [pagesRedirects::class,'reviewsList'])->name('admin.reviewsList');
});

Route::middleware('admin')->group(function(){
    

});
Route::middleware('patient')->group(function(){

});
Route::middleware('doctor')->group(function(){

});