<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorProfileController extends Controller
{
    public function index($id)
    {
        $doctor = User::with('speciality')->find($id);
    
        $comments = DB::table('comments')
            ->join('users', 'comments.patient_id', '=', 'users.id')
            ->select('comments.*', 'users.name as user_name') 
            ->where('comments.doctor_id', '=', $id)
            ->get();

        // dd($comments);
    
        return view('patient.doctorProfile', compact('doctor', 'comments'));
    }
}
