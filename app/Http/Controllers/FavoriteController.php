<?php

namespace App\Http\Controllers;

use App\Models\favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function addToFavorites(Request $request)
{
    // Get the doctor_id and patient_id from the form submission
    $doctorId = $request->input('doctor_id');
    $patientId = auth()->user()->id; // Assuming you have authentication

    // Check if the record already exists to avoid duplicates
    $existingFavorite = favorite::where('doctor_id', $doctorId)
                                 ->where('patient_id', $patientId)
                                 ->first();

    if (!$existingFavorite) {
        // Create a new favorite record
        $favorite = new favorite();
        $favorite->doctor_id = $doctorId;
        $favorite->patient_id = $patientId;
        $favorite->save();
    }

    return redirect()->back()->with('success', 'Added to favorites successfully');
}
}
