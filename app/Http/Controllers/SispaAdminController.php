<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SispaMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationStatusMail;

class SispaAdminController extends Controller
{
    public function index()
    {
        $applications = SispaMember::all();
        return view('livewire.admin.sispa-applications', compact('applications'));
    }

    public function updateStatus(Request $request, $id)
    {
        $application = SispaMember::findOrFail($id);
        $application->status = $request->status;
        $application->save();

        Mail::to($application->email)->send(new ApplicationStatusMail($application, 'status_updated'));

        return redirect()->route('admin.sispa.index')->with('success', 'Status updated successfully.');
    }
}
