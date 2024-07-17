<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PatientConroller extends Controller
{
    public function updateInfos(Request $request, $id)
    {
        $request->validate([
            'photo_profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'dateNaissance' => 'required|date|before:today',
            'blood_group' => 'required|in:A-,A+,B-,B+,AB-,AB+,O-,O+',
            'email' => 'required|email|max:255',
            'tel' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'ville' => 'required|exists:villes,id'
        ]);

        // Find the patient and update the information
        $patient = Patient::findOrFail($id);
        $user = $patient->user;
        $patient->blood_type = $request->input('blood_group');
        // Handle file upload if a new profile photo is uploaded
        if ($request->hasFile('photo_profile')) {
            $fileName = $user->nom . '_' . $user->prenom . '.' . $request->photo_profile->extension();
            $request->photo_profile->storeAs('public/patients/', $fileName);
            // $user->photo_profile = $fileName;
        }

        // Update user information
        $user->prenom = $request->input('prenom');
        $user->nom = $request->input('nom');
        $user->dateNaissance = \Carbon\Carbon::createFromFormat('d/m/Y', $request->input('dateNaissance'))->format('Y-m-d');
        $user->email = $request->input('email');
        $user->tel = $request->input('tel');
        $user->address = $request->input('address');
        $user->ville_id = $request->input('ville');
        $user->save();

        // Update patient information
        $patient->save();
        $_SESSION['user']=Patient::findOrFail($id)->user;
        return redirect()->route('patient.profileSetting')->with('success', 'Information updated successfully');
    }

}
