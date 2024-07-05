<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use Illuminate\Http\Request;

class specialitiesController extends Controller
{
    public function get_edit_fields(Request $request){
        $speciality = Speciality::find($request->id);
        $html = "
        <input type='hidden' name='speciality_id' value=".$speciality->id.">
        <div class='row form-row'>
            <div class='col-12 col-sm-6'>
                <div class='form-group'>
                    <label>Speciality</label>
                    <input type='text' name='speciality_name' class='form-control' value=".$speciality->name.">
                </div>
            </div>
            <div class='col-12 col-sm-6'>
                <div class='form-group'>
                    <label>Image</label>
                    <input type='file' name='speciality_img' class='form-control'>
                </div>
            </div>
        </div>
    ";
    return $html;

    }
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'speciality_name' => 'required|string|max:255',
            'speciality_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Process image upload if provided
        if ($request->hasFile('speciality_img')) {
            $image = $request->file('speciality_img');
            $imageName = $request->input('speciality_name') . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/img/specialities'), $imageName);
        }
    
        // Create new speciality record in database
        $speciality = new Speciality();
        $speciality->name = $request->input('speciality_name');
        // $speciality->image_path = $imageName ?? null; // Save image path if uploaded
        $speciality->save();
    
        return redirect()->back()->with('success', 'Speciality added successfully.');
    }
    public function destroy($id)
    {
        // Find the speciality by ID
        $speciality = Speciality::find($id);
        
        // Delete the associated image file from storage
        $this->deleteSpecialityImage($speciality->name);
        
        // Delete the speciality from the database
        $speciality->delete();

        // Redirect back or respond with a success message
        return redirect()->back()->with('success', 'Speciality deleted successfully');
    }

    // Method to delete the image file from storage
    private function deleteSpecialityImage($imageName)
    {
        // Specify the path to the speciality images directory
        $imagePath = public_path('assets/img/specialities/' . $imageName);

        // Check if the image exists in storage
        if (file_exists($imagePath)) {
            // Delete the image file
            unlink($imagePath);
        }
    }
    public function update(Request $request)
    {
        // Validate the request data
        $request->validate([
            'speciality_name' => 'required|string|max:255',
            'speciality_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Find the speciality by ID
        $speciality = Speciality::findOrFail($request->id);

        // Update the speciality name
        $speciality->name = $request->input('speciality_name');

        // Check if a new image is uploaded
        if ($request->hasFile('speciality_img')) {
            // Delete the old image file if it exists
            $this->deleteSpecialityImage($speciality->name);

            // Store the new image file
            $imageName = $request->file('speciality_img')->getClientOriginalName();
            $request->file('speciality_img')->move(public_path('assets/img/specialities'), $imageName);

            // Update the speciality's image name
            $speciality->name = pathinfo($imageName, PATHINFO_FILENAME);
        }

        // Save the updated speciality
        $speciality->save();

        // Redirect back or respond with a success message
        return redirect()->route('admin.specialitiesList')->with('success', 'Speciality updated successfully');
    }

}
