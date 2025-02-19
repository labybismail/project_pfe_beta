<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\User;
use App\Models\Ville;
use App\Models\Doctor;
use App\Models\Review;
use App\Models\Speciality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class doctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function searchDoctor(Request $request)
    {
        $villeID = $request->input('ville');
        $genderID = $request->input('gender');
        $specialityID = $request->input('speciality');
    
        $query = Doctor::query()
            ->join('users', 'users.id', '=', 'doctors.user_id');
            
        if ($specialityID != '') {
            $query->where('doctors.speciality_id', $specialityID);
        }
        
        if ($villeID != '') {
            $query->where('users.ville_id', $villeID);
        }
        
        if ($genderID != '') {
            $query->where('users.sexe', $genderID);
        }
        
        // Select all columns from doctors and specific columns from users except users.id
        $doctors = $query->select(
            'doctors.*', 
            'users.nom', 
            'users.prenom', 
            'users.email', 
            'users.ville_id', 
            'users.sexe' 
            // Add other columns you need from users here, excluding 'users.id'
        )->get();
    
        $specialities = Speciality::orderBy('Name')->get();
        return view('search', compact('doctors', 'specialities', 'genderID', 'specialityID', 'villeID'));
    }
    
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

        // $request->validate([
        //     'first_name' => 'required|string|max:255',
        //     'last_name' => 'required|string|max:255',
        //     'cin' => 'required|string|max:20|unique:users,cin',
        //     'gender' => 'required|string|in:M,F',
        //     'email' => 'required|string|email|max:255|unique:users,email',
        //     'phone' => 'required|string|max:10',
        //     'dateNaissance' => 'required|date',
        //     'address' => 'required|string|max:255',
        //     'password' => ['required', 'confirmed'],
        //     'speciality' => 'required|exists:specialities,id',
        //     'appointment_price' => 'required|numeric|min:0',
        //     'profile_picture' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
        //     'ville' => 'required|exists:villes,id'

        // ]);

        // DB::beginTransaction();

        // try {
            $user = new User();
            $user->prenom = $request->first_name;
            $user->nom = $request->last_name;
            $user->email = $request->email;
            $user->tel = $request->phone;
            $user->password = Hash::make($request->password);
            $user->cin = $request->cin;
            $user->address = $request->address;
            $user->sexe = $request->gender;
            $user->dateNaissance = $request->dateNaissance;
            $user->status_compte = 'A';
            $user->ville_id = $request->ville;
            //$user->save();

            if ($request->hasFile('profile_picture')) {
                $file = $request->file('profile_picture');
                $fileName = $user->nom . '_' . $user->prenom . '.' . $file->getClientOriginalExtension();
                $filePath = 'doctors/' . $fileName; // Path inside storage/app/public

                // Check if the directory exists, otherwise create it
                if (!Storage::disk('public')->exists('doctors')) {
                    Storage::disk('public')->makeDirectory('doctors');
                }

                // Save the file to storage
                Storage::putFileAs('public', $file, $filePath);

                // Update user with profile picture path
                // $user->profile_picture = $filePath;
            }
            $user->save();

            $doctor = Doctor::create([
                'user_id' => $user->id,
                'speciality_id' => $request->speciality,
                'prix' => $request->appointment_price,
                'about' => ''
            ]);

            // DB::commit();

            return redirect()->route('admin.doctorsList')->with('success', 'Doctor added successfully!');
        // } catch (\Exception $e) {
        //     DB::rollBack();
        //     return redirect()->route('admin.doctorsList')->with('error', 'Failed to add doctor. Please try again.');
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $doctor = Doctor::find($id);
     
        $doctorReviews =Review::where('doctorId',$id)->get();
        return view('doctor-profile', compact('doctor','doctorReviews'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $doctor = Doctor::find($id);
        $specialities = Speciality::all();
        $villes = Ville::all();

        return view('admin.doctor-edit', compact('doctor', 'specialities','villes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate incoming request data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'cin' => 'required|string|max:20',
            'gender' => 'required|in:M,F',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:20',
            'dateNaissance' => 'required|date',
            'password' => 'nullable|string|min:8',
            'address' => 'required|string|max:255',
            'speciality' => 'required|exists:specialities,id',
            'appointment_price' => 'required|numeric|min:0',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,gif,png|max:2048',
            'status' => 'required|in:A,I',
            'ville' => 'required|exists:villes,id',
            'about' => 'nullable|string'

        ]);
        // try {
            // Find the doctor
            $doctor = Doctor::findOrFail($id);

            // Update user information
            $user = $doctor->user;
            $user->prenom = $request->input('first_name');
            $user->nom = $request->input('last_name');
            $user->email = $request->input('email');
            $user->tel = $request->input('phone');
            $user->cin = $request->input('cin');
            $user->sexe = $request->input('gender');
            $user->dateNaissance = $request->input('dateNaissance');
            $user->address = $request->input('address');
            $user->status_compte = $request->input('status');
            $user->ville_id = $request->input('ville');
            if($request->filled('about')){
                $doctor->about = $request->input('about');
            }
            if ($request->filled('password')) {
                $user->password = bcrypt($request->input('password'));
            }

            // Save user

            // Update doctor information

            $doctor->speciality_id = $request->input('speciality');
            $doctor->prix = $request->input('appointment_price');

            // Handle profile picture upload if provided
            // if ($request->hasFile('profile_picture')) {
            //     $image = $request->file('profile_picture');
            //     $fileName =$user->nom . '_' . $user->prenom . '.' . $image->getClientOriginalExtension();
            //     $image->storeAs('public/doctors', $fileName); // Store in storage/app/public/doctors directory
            //     // $doctor->profile_picture = $fileName;
            // }
            if ($request->hasFile('profile_picture')) {
                $file = $request->file('profile_picture');
                $fileName = $user->nom . '_' . $user->prenom . '.' . $file->getClientOriginalExtension();
                $filePath = 'doctors/' . $fileName; // Path inside storage/app/public
                $oldFileName = $user->nom . '_' . $user->prenom; // Old file name without extension
                $oldFilePath = 'doctors/' . $oldFileName; // Old file path

                if (Storage::disk('public')->exists($oldFilePath)) {
                    Storage::disk('public')->delete($oldFilePath);
                }
                $oldFilePath = $user->profile_picture;
                if ($oldFilePath && Storage::disk('public')->exists($oldFilePath)) {
                    Storage::disk('public')->delete($oldFilePath);
                }

                // Save the file to storage
                Storage::putFileAs('public', $file, $filePath);

                // Update user with profile picture path 
            }

            $user->save();
            $doctor->save();

            // Redirect back with success message
            return redirect()->route('admin.doctorsList')->with('success', 'Doctor updated successfully.');
        // } catch (\Exception $e) {
        //     // Handle exceptions
        //     return redirect()->route()->with('error', 'Failed to update doctor. ' . $e->getMessage())->withInput();
        // }
    }
    public function updateInfos(Request $request, $id)
{
    // Validate the incoming request data
    $validator = Validator::make($request->all(), [
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        // 'email' => 'required|email|max:255',
        'phone' => 'nullable|string|max:20',
        'gender' => 'required|string|in:M,F',
        'dateNaissance' => 'required|date',
        'about' => 'nullable|string',
        'appointment_price' => 'nullable|numeric|min:0',
        'profile_picture' => 'nullable|image|max:2048',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Find the user and doctor by ID
    $user = User::findOrFail($id);
    $doctor = $user->doctor;

    // Update the user fields
    $user->prenom = $request->input('first_name');
    $user->nom = $request->input('last_name');
    // $user->email = $request->input('email');
    $user->tel = $request->input('phone');
    $user->Sexe = $request->input('gender');
    $user->dateNaissance = $request->input('dateNaissance');

    // Handle the file upload if the profile picture is provided
    if ($request->hasFile('profile_picture')) {
        $profilePicture = $request->file('profile_picture');
        $filename = $user->nom.'_'.$user->prenom . '.' . $profilePicture->getClientOriginalExtension();
        $profilePicture->move(public_path('storage/doctors'), $filename);
    }

    // Update the doctor fields
    $doctor->about = $request->input('about');
    $doctor->prix = $request->input('appointment_price');

    // Save the changes
    $user->save();
    $doctor->save();

    return redirect()->route('doctor_profileSettings')->with('success', 'Doctor information updated successfully.');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $doctor = Doctor::findOrFail($id);

        $nom = $doctor->user->nom;
        $prenom = $doctor->user->prenom;
        $imagePath = public_path("storage/doctors/{$nom}_{$prenom}.*");

        foreach (glob($imagePath) as $file) {
            File::delete($file);
        }

        User::find($doctor->user_id)->delete();
        $doctor->delete();

        return redirect()->route('admin.doctorsList')->with('success', 'Doctor deleted successfully!');

    }
}
