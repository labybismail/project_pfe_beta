<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Doctor;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function bookingPage(Request $request)
    {
        $doctor=Doctor::find($request->doctorID);
        return view('booking',compact('doctor'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'doctorID' => 'required|exists:doctors,id',
            'patientID' => 'required|exists:users,id',
            'weekday' => 'required|date_format:Y-m-d',
            'appointment_time' => 'required|date_format:H:i:s',
        ]);
    
        $patientId = (int) $request->patientID;
        $doctorId = (int) $request->doctorID;
        
        Consultation::create([
            'dateRdv' => $request->weekday,
            'heureRdv' => $request->appointment_time,
            'patientId' => $patientId,
            'doctorId' => $doctorId,
        ]);
    
        return redirect()->route('bookingPage',compact('doctorId'))->withSuccess('Consultation added successfully.');
    }
    
    
}
