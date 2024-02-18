<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index()
    {

        return view('doctor.certificate');
    }

    public function generateCertificate(Request $request, $patientId, $doctorId)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'number_of_days' => 'required|integer',
        ]);

        // Create and save the certificate
        $certificates = new Certificate([
            'doctor_id' => $doctorId,
            'patient_id' => $patientId,
            'days' => $validatedData['number_of_days'],
        ]);

        $certificates->save();


        // You may want to redirect back or return a response based on your requirements
    }
}
