<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorProfileController extends Controller
{
    public function index($id)
    {
        $doctor = User::find($id);

        // You can also eager load relationships if needed
        $doctor = User::with('speciality')->find($id);
        // dd($doctor);
        return view('patient.doctorProfile', compact('doctor'));
    }
}
