<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use Illuminate\Http\Request;

class SpecialityController extends Controller
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
    public function create(Request $request)
    {
        $newSpecialty = $request->input('newSpecialty');
        Speciality::create(['specialtyName' => $newSpecialty]);

        return redirect()->back();
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
    public function show(Speciality $speciality)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Speciality $speciality)
    {
        return view('specialties.edit', compact('speciality'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Speciality $speciality)
    {
        $request->validate([
            'specialtyName' => 'required|string|max:255',
        ]);

        $speciality->update([
            'specialtyName' => $request->input('specialtyName'),
        ]);

        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Speciality $speciality)
    {
        $speciality->update(['isDelete' => true]);
    
        return redirect()->route('dashboard');
    }
}