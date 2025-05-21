<?php

namespace App\Http\Controllers;

use App\Models\SispaMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationStatusMail;

class SispaController extends Controller
{
    public function showForm()
    {
        return view('sispa.register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'ic' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'no_matrik' => 'required|string|max:50|unique:sispa_members,no_matrik',
            'height' => 'required|numeric|min:50|max:250',
            'weight' => 'required|numeric|min:20|max:300',
            'tempoh_pengajian' => 'required|integer|min:1|max:10',
        ]);

        $heightInMeters = $request->height / 100;
        $bmi = $request->weight / ($heightInMeters * $heightInMeters);

        $isNormalBMI = $bmi >= 18.5 && $bmi < 25;
        $isEligible = $request->tempoh_pengajian >= 4 && $isNormalBMI;

        $kelayakan = $isEligible ? 'Layak Memohon' : 'Tidak Layak';

        $member = SispaMember::create([
            'name' => $request->name,
            'ic' => $request->ic,
            'email' => $request->email,
            'no_matrik' => $request->no_matrik,
            'height' => $request->height,
            'weight' => $request->weight,
            'bmi' => $bmi,
            'tempoh_pengajian' => $request->tempoh_pengajian,
            'kelayakan' => $kelayakan,
            'status' => 'pending',
        ]);

        // Notify student (initial submission)
        Mail::to($member->email)->send(new ApplicationStatusMail($member, 'submitted'));

        return redirect()->back()->with('success', 'Pendaftaran berjaya! Kami akan hubungi anda melalui email.');
    }
}

