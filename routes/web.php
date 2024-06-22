<?php

use App\Models\Doctor;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Doctor::find(1)->user->tel;
});
