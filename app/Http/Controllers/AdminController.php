<?php

namespace App\Http\Controllers;

use App\Models\Medicament;
use App\Models\Speciality;
use Illuminate\Http\Request;
// use Illuminate\Http\Response;
// use Illuminate\View\View;

class AdminController extends Controller
{
    public function index()
    {
        $specialities = Speciality::where('isDelete', 0)->get();
        $medicaments = Medicament::all();
        $totlaSpeciality = Speciality::where('isDelete', 0)->count();

        // dd($medicaments);

        return view('admin.dashboard', compact('specialities', 'totlaSpeciality', 'medicaments'));
    }
}
