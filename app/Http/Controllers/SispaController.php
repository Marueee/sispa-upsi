<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SispaMember;

class SispaController extends Controller
{

    public function showRegisterForm()
    {
    return view('sispa.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'ic' => 'required|string|max:20',
            'email' => 'required|email',
            'no_matrik' => 'required|string|unique:sispa_members,no_matrik',
            'height' => 'required|numeric|min:50',
            'weight' => 'required|numeric|min:10',
            'tempoh' => 'required|integer|min:1',
        ]);

        // Calculate BMI
        $heightInMeters = $request->height / 100;
        $bmi = $request->weight / ($heightInMeters * $heightInMeters);

        // Determine qualification
        $kelayakan = ($bmi >= 18.5 && $bmi < 25 && $request->tempoh >= 4) ? 'Layak Memohon' : 'Tidak Layak';

        // Store in DB
        SispaMember::create([
            'name' => $request->name,
            'ic' => $request->ic,
            'email' => $request->email,
            'no_matrik' => $request->no_matrik,
            'height' => $request->height,
            'weight' => $request->weight,
            'bmi' => round($bmi, 2),
            'tempoh_pengajian' => $request->tempoh,
            'kelayakan' => $kelayakan,
        ]);

        return redirect()->back()->with('success', 'Pendaftaran berjaya dihantar!');
    }
}

