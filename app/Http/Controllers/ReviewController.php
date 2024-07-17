<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $request->validate([
            'doctorId'=>'required|exists:doctors,id',
            'patientId'=>'required|exists:patients,id',
            'comment'=>'required|string',
            'rating'=>'required|integer|in:1,2,3,4,5',
        ]);
        $recomand= ($request->rating>2)?1:0 ;
        Review::create([
            'patientId'=>$request->patientId,
            'doctorId'=>$request->doctorId,
            'rating'=>$request->rating,
            'comment'=>$request->comment,
            'recomended'=>$recomand
        ]);
        return redirect()->back()->with('success','Added with success');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Review::find($id)->delete();
        return redirect()->back()->with('success','deleted with success');
    }
}
