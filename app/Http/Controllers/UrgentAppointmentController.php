<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use Illuminate\Http\Request;

class UrgentAppointmentController extends Controller
{
    public function index()
    {

        $specialties = Speciality::All();
        // @dd($specialties);
        return view('patient.urgent-appointment', compact('specialties'));
    }
}
