<?php

namespace App\Http\Controllers;

use App\Models\Ville;
use App\Models\Doctor;
use App\Models\Review;
use App\Models\Patient;
use App\Models\Speciality;
use App\Models\Consultation;
use Illuminate\Http\Request;

class pagesRedirects extends Controller
{
    public function adminIndex()
    {
        $doctorsCount=Doctor::count();
        $doctors=Doctor::all();
        $patientsCount=Patient::count();
        $patients=Patient::all();
        $consultationsCount=Consultation::count();
        $consultations=Consultation::all();
        return view('admin.index',compact('doctorsCount','patientsCount','consultationsCount','doctors','patients','consultations'));
    }
    public function doctorsList()
    {
        $doctors=Doctor::paginate(10);
        return view('admin.doctor-list',compact('doctors'));
    }
    public function patientsList()
    {
        $patients=Patient::paginate(10);
        return view('admin.patient-list',compact('patients'));
    }
    public function consultationsList()
    {
        $consultations=Consultation::paginate(10);
        return view('admin.consultation-list',compact('consultations'));
    }
    public function specialitiesList()
    {
        $specialities=Speciality::paginate(10);
        return view('admin.specialities',compact('specialities'));
    }
    public function reviewsList()
    {
        $reviews=Review::paginate(10);
        return view('admin.reviews',compact('reviews'));
    }
    public function login()
    {
        return view('login');
    }
    public function register()
    {
        $villes=Ville::orderBy('name')->get();

        return view('register',compact('villes'));
    }
    public function doctorsListAdd()
    {
        $specialities=Speciality::orderBy('name')->get();
        $villes=Ville::orderBy('name')->get();
        return view('admin.doctor-add',compact('specialities','villes'));
    }
}
