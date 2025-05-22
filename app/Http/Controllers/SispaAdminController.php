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
    $request->validate([
        'status' => 'required|in:pending,approved,rejected', // Validate status
    ]);

    $application = SispaMember::findOrFail($id);
    $application->status = $request->status;
    $application->save();

    // Send email notification
    try {
        Mail::to($application->email)->send(new ApplicationStatusMail($application, 'status_updated'));
    } catch (\Exception $e) {
        \Log::error('Email sending failed: ' . $e->getMessage());
    }

    return redirect()->route('admin.sispa.index')->with('success', 'Status updated successfully.');
}

}
