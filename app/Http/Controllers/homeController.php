<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Speciality;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function home(){
        $doctors=Doctor::all();
        $specialities=Speciality::all();
        return view('index',compact('doctors','specialities'));
    }
}
