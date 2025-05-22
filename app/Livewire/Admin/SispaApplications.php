<?php

namespace App\Livewire\Admin;

use App\Models\SispaMember;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationStatusNotification;

class SispaApplications extends Component
{
    public $applications;

    public function mount()
    {
        $this->applications = SispaMember::all();
    }

    public function updateStatus($id, $status)
    {
        $application = SispaMember::findOrFail($id);
        $application->status = (string) $status;
        $application->save();

        // Send email notification
        Mail::to($application->email)->send(new ApplicationStatusNotification($application));

        session()->flash('message', "Permohonan {$application->name} telah dikemaskini kepada: $status");
    }

    public function render()
    {
        return view('livewire.admin.sispa-applications');
    }
}

