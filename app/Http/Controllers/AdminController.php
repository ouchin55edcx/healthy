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
        $specialities = Speciality::all();

        // dd($specialities);

        return view('admin.dashboard', compact('specialities'));
    }
}
