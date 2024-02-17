<?php

namespace App\Http\Controllers;

use App\Models\Medicament;
use Illuminate\Http\Request;

class MedicamentController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'medicamentName' => 'required|string|max:255',
            'speciality_id' => 'required|exists:specialities,id',
        ]);

        Medicament::create($validatedData);

        return redirect()->back()->with('success', 'Medicament added successfully');
    }

        public function destroy($id)
    {
        $medicament = Medicament::findOrFail($id);
        $medicament->delete();

        return redirect()->back()->with('success', 'Medicament deleted successfully');
    }
}
