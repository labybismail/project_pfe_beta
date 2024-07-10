<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Speciality;
use App\Models\Ville;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function home(){
        $doctors=Doctor::all();
        $specialities=Speciality::orderBy('name')->get();
        $villes=Ville::orderBy('name')->get();
        return view('index',compact('doctors','specialities','villes'));
    }
}
