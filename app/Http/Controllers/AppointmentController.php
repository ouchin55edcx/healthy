<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\AvailableHour;
use App\Models\User;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getDoctors()
    {

        $doctors = User::where('role', 'doctor')
            ->with('speciality')
            ->get();

        return view('patient.appointment', compact('doctors'));
    }


    public function bookAppointment(Request $request)
    {
        // Assuming you have authentication and get the current patient ID
        $patientId = auth()->user()->id;

        // Create a new appointment record
        $appointment = new Appointment();
        $appointment->doctor_id = $request->input('doctor_id'); // Replace with the actual doctor ID
        $appointment->patient_id = $patientId;
        $appointment->hour_id = $request->input('selectedHour');
        $appointment->appointment_date = now()->toDateString(); // Set the appointment date as today
        $appointment->is_booked = true; // Set is_booked to true
        $appointment->save();

        // Redirect back to the page or any other page you prefer
        return redirect()->back()->with('success', 'Appointment booked successfully');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
