<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use Illuminate\Http\Request;
// use Illuminate\Http\Response;
// use Illuminate\View\View;

class AdminController extends Controller
{
    public function index()
    {
        $specialities = Speciality::where('isDelete', 0)->get();
        $totlaSpeciality = Speciality::where('isDelete', 0)->count();

        // dd($totlaSpeciality);

        return view('admin.dashboard', compact('specialities', 'totlaSpeciality'));
    }
}
