<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorProfileController extends Controller
{
    public function index()
    {
        return view('patient.doctorProfile');
    }

    
}
