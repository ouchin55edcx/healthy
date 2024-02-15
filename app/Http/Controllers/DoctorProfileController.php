<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\AvailableHour;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorProfileController extends Controller
{
    public function index($id, Request $request)
    {
        $doctor = User::with('speciality')->find($id);
        $availableHours = AvailableHour::all();

        // Use $id directly instead of trying to get it from the request
        $doctorAppointments = Appointment::where('doctor_id', $id)->get();

        // dd($doctorAppointments);
        $comments = DB::table('comments')
            ->join('users', 'comments.patient_id', '=', 'users.id')
            ->select('comments.*', 'users.name as user_name')
            ->where('comments.doctor_id', '=', $id)
            ->get();

        return view('patient.doctorProfile', compact('doctor', 'comments', 'availableHours', 'doctorAppointments'));
    }
}
