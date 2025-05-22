<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SispaMember;
use App\Mail\ApplicationStatusNotification;
use Illuminate\Support\Facades\Mail;

class SispaApplicationController extends Controller
{
    public function updateStatus($id, $status)
    {
        $application = SispaMember::findOrFail($id);
        $application->status = $status; // <-- ⚠️ Here is the problem
        $application->save();

        Mail::to($application->email)->send(new ApplicationStatusNotification($application));

        session()->flash('message', "Permohonan {$application->name} telah dikemaskini kepada: $status");
    }
}
