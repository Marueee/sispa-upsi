<?php

namespace App\Livewire\Admin;

use App\Models\Member;
use App\Models\Attendance as AttendanceModel;
use Livewire\Component;

class Attendance extends Component
{
    public $batches = [];
    public $selectedBatch = '';
    public $date;
    public $activity_name;
    public $attendance = [];

    public function mount()
    {
        $this->batches = Member::select('batch')->distinct()->pluck('batch')->toArray();
        $this->date = now()->toDateString();
    }

    public function updatedSelectedBatch($value)
    {
        $this->attendance = []; // Reset old attendance
        // Remove the dd() and just let it continue
    }


   public function toggleAllCheckboxes()
{
    $allChecked = count($this->attendance) === count($this->members);

    if ($allChecked) {
        $this->attendance = [];
    } else {
        foreach ($this->members as $member) {
            $this->attendance[$member->id] = true;
        }
    }
}


    public function getMembersProperty()
    {
        if (empty($this->selectedBatch)) {
            return collect();
        }

        return Member::where('batch', $this->selectedBatch)->get();
    }

    public function submit()
    {
        // Add validation
        $this->validate([
            'selectedBatch' => 'required',
            'date' => 'required|date',
            'activity_name' => 'required',
        ]);

        if (empty($this->attendance)) {
            $this->dispatch('showAlert', [
                'type' => 'error',
                'title' => 'Error!',
                'message' => 'Please mark at least one attendance!'
            ]);
            return;
        }

        try {
            foreach ($this->attendance as $memberId => $present) {
                AttendanceModel::updateOrCreate(
                    [
                        'member_id' => $memberId,
                        'date' => $this->date,
                        'activity_name' => $this->activity_name,
                    ],
                    [
                        'batch' => $this->selectedBatch,
                        'is_present' => $present,
                    ]
                );
            }

            $this->dispatch('showAlert', [
                'type' => 'success',
                'title' => 'Success!',
                'message' => 'Attendance saved successfully!'
            ]);

            // Reset form after successful save
            $this->reset(['activity_name', 'attendance']);

        } catch (\Exception $e) {
            $this->dispatch('showAlert', [
                'type' => 'error',
                'title' => 'Error!',
                'message' => 'Failed to save attendance. Please try again.'
            ]);
        }
    }

    public function render()
    {
        return view('livewire.admin.attendance', [
            'batches' => $this->batches,
            'members' => $this->members, // magic Livewire computed property
        ]);
    }
}
