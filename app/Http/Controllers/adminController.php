<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Consultation;
use Illuminate\Http\Request;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   
    /** 
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'dateNaissance' => 'required|date|before:today',
            'email' => 'required|email|max:255',
            'tel' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'ville' => 'required|exists:villes,id',
            'password' => 'nullable|string|min:8|confirmed',

        ]);
    
        $admin = Admin::findOrFail($id);
        $user = $admin->user;
    
        $user->prenom = $request->input('prenom');
        $user->nom = $request->input('nom');
        $user->dateNaissance = \Carbon\Carbon::createFromFormat('d/m/Y', $request->input('dateNaissance'))->format('Y-m-d');
        $user->email = $request->input('email');
        $user->tel = $request->input('tel');
        $user->address = $request->input('address');
        $user->ville_id = $request->input('ville');
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->save();
        $admin->save();
    
        $_SESSION['user'] = Admin::findOrFail($id)->user;
    
        return redirect()->route('admin.profile')->with('success', 'Information updated successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
