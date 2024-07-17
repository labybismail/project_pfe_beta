<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    public function loginAttempt(Request $request)
    {
        // Validate the form data
        $request->validate([
            'login' => 'required|email',
            'password' => 'required|min:6',
        ]);
    
        $credentials = $request->only('login', 'password');
    
        // Assuming you have a User model and you want to authenticate manually
        $user = User::where('email', $credentials['login'])->first();
    
        if ($user && Hash::check($credentials['password'], $user->password)) {
            // Authentication successful
            // Store user information in session
            $request->session()->put('user', $user);
            $request->session()->put('isLogged', true); // Example session flag
            if(Admin::where('user_id',$user->id)->exists()){
              return redirect()->route('admin.index');
            }
            if(Doctor::where('user_id', session()->get('user')->id)->exists()){
                return redirect()->route('doctorDashboard');
            }
            return redirect()->route('home');
        }
    
        // Authentication failed
        return redirect()->back()->withErrors(['login' => 'Invalid credentials'])->withInput($request->only('login'));
    }
    public function registerAttempt(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required|string|max:20', 
            'password' => 'required|string|min:8',
            'cin' => 'required|string|max:20|unique:users',
            'address' => 'required|string|max:255',
            'gender' => 'required|in:M,F',
            'date_of_birth' => 'required|date',
            'ville'=>'required|exists:ville,id'
        ]);

        $user = new User();
        $user->prenom = $request->first_name;
        $user->nom = $request->last_name;
        $user->email = $request->email;
        $user->tel = $request->phone;
        $user->password = Hash::make($request->password);
        $user->cin = $request->cin;
        $user->address = $request->address;
        $user->sexe = $request->gender;
        $user->dateNaissance = $request->date_of_birth;
        $user->status_compte ='A';
        $user->ville_id = $request->ville;
        $user->save();

        $patient = new Patient();
        $patient->user_id =$user->id;
        $patient->blood_type ='O-';
        $patient->save();

        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }
    
}
