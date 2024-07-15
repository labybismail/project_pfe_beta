<?php

use App\Http\Controllers\AppointmentsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\pagesRedirects;
use App\Http\Controllers\loginController;
use App\Http\Controllers\doctorController;
use App\Http\Controllers\PatientConroller;
use Illuminate\Routing\RedirectController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\specialitiesController;



Route::get('doctor/{id}', [doctorController::class, 'show'])->name('doctorProfile');

Route::middleware('isNotAdmin')->group(function () {
    Route::get('/', [homeController::class, 'home'])->name('home');
    Route::post('/searchDoctor',[doctorController::class,'searchDoctor'])->name('searchDoctor');
});
Route::middleware('isGuest')->group(function () {

    Route::get('/login', [pagesRedirects::class, 'login'])->name('login');
    Route::post('/login', [loginController::class, 'loginAttempt'])->name('loginAttempt');
    Route::get('/register', [pagesRedirects::class, 'register'])->name('register');
    Route::POST('/register', [loginController::class, 'registerAttempt'])->name('registerAttempt');
});

Route::middleware('isLogged')->group(function () {
    Route::middleware('isDoctor')->group(function(){
        Route::get('/doctorDashboard', [pagesRedirects::class, 'doctorDashboard'])->name('doctorDashboard');
        Route::put('/doctorDashboard/{id}', [AppointmentsController::class, 'update'])->name('doctorDashboard.update');
        Route::get('/doctorAppointment', [pagesRedirects::class, 'doctorAppointment'])->name('doctorAppointment');
        Route::get('/doctor_myPatients', [pagesRedirects::class, 'doctor_myPatients'])->name('doctor_myPatients');
        
    });
    Route::middleware('isPatient')->group(function () {
        Route::post('/booking', [BookingController::class, 'bookingPage'])->name('bookingPage');
        Route::POST('/book', [BookingController::class, 'store'])->name('book.store');
        Route::get('/dashboard', [pagesRedirects::class, 'patientDashboard'])->name('patient.dashboard');
        Route::get('/profileSetting', [pagesRedirects::class, 'profileSetting'])->name('patient.profileSetting');
        Route::put('/updateInfos/{id}', [PatientConroller::class, 'updateInfos'])->name('patient.updateInfos');
    
    });
    
    Route::middleware('isAdmin')->group(function () {
        Route::prefix('admin')->group(function () {
            Route::get('/dashboard', [pagesRedirects::class, 'adminIndex'])->name('admin.index');
            Route::get('/doctorsList', [pagesRedirects::class, 'doctorsList'])->name('admin.doctorsList');
            Route::prefix('doctorsListAdd')->group(function () {
                Route::get('add', [pagesRedirects::class, 'doctorsListAdd'])->name('admin.doctorsListAdd');
                Route::post('add', [doctorController::class, 'store'])->name('admin.doctorsListstore');
                Route::delete('{id}', [doctorController::class, 'destroy'])->name('admin.deleteDoctor');
                Route::get('/edit/{id}', [doctorController::class, 'edit'])->name('admin.deleteEdit');
                Route::put('/edit/{id}', [doctorController::class, 'update'])->name('admin.doctorsListUpdate');
            });

            Route::get('/patientsList', [pagesRedirects::class, 'patientsList'])->name('admin.patientsList');
            Route::get('/consultationsList', [pagesRedirects::class, 'consultationsList'])->name('admin.consultationsList');
            Route::get('/specialitiesList', [pagesRedirects::class, 'specialitiesList'])->name('admin.specialitiesList');
            Route::get('/reviewsList', [pagesRedirects::class, 'reviewsList'])->name('admin.reviewsList');
            Route::prefix('speciality')->group(function () {
                Route::post('/store', [specialitiesController::class, 'store'])->name('speciality.store');
                Route::delete('/{id}', [specialitiesController::class, 'destroy'])->name('speciality.destroy');
                Route::post('/', [specialitiesController::class, 'update'])->name('speciality.update');
                Route::post('/get_edit_fields', [specialitiesController::class, 'get_edit_fields'])->name('speciality.get_edit_fields');
            });
        });
    });
    Route::get('logout', function () {
        session()->forget('user');
        session()->forget('isLogged');
        return redirect()->route('home');
    })->name('logout');

});


Route::fallback(function () {
    return view('error-404');
});
