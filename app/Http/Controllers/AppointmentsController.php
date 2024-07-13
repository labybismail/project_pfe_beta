<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function update(Request $request, string $id)
    {
        Consultation::find($id)->update(['statusId'=>$request->statusId]);
        return redirect()->route('doctorDashboard')->with('success','updated');
    }
    public function destroy(string $id)
    {
        //
    }
}
