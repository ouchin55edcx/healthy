<?php

namespace App\Http\Controllers;

use App\Models\Medicament;
use App\Models\Doctor;
use App\Models\Speciality;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {

        $medicaments = Medicament::all();
        $doctorId = auth()->user()->id;

        $appointments = User::find($doctorId)->doctorAppointments()
            ->whereDate('appointment_date', now()->toDateString())
            ->join('users as patients', 'appointments.patient_id', '=', 'patients.id')
            ->join('available_hours', 'appointments.hour_id', '=', 'available_hours.hour_id')
            ->select('appointments.*', 'patients.name as patient_name', 'available_hours.start_time', 'available_hours.end_time')
            ->get();
        // dd($appointments);
        return view('doctor.dashboard', compact('medicaments', 'appointments'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'medicamentName' => 'required|string|max:255',
            'specialty_id' => 'required|numeric', // Adjust validation rules as needed
        ]);

        // Create a new Medication instance
        Medicament::create([
            'name' => $request->input('medicamentName'),
            'specialty_id' => $request->input('specialty_id'),
            // Add any other fields you want to save
        ]);

        // Redirect back or wherever you want after saving
        return redirect()->back()->with('success', 'Medication added successfully');
    }
}
