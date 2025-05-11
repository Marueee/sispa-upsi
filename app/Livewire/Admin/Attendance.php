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
    public $filterBatch;
    public $filterDate;
    public $filterActivity;
    public $filterActivityName;
    public $reportRecords = [];
    public $activityNames = [];
    public $showReport = false;
    public $description;
    public $reportDescription = null;

    public function mount()
    {
        $this->batches = Member::select('batch')->distinct()->pluck('batch')->toArray();
        $this->date = now()->toDateString();

        // // Load all activities initially
        // $this->activityNames = AttendanceModel::select('activity_name')->distinct()->pluck('activity_name')->toArray();
        // $this->filterDate = now()->toDateString();
        // $this->updatedFilterDate();
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
        $this->validate([
            'selectedBatch' => 'required',
            'date' => 'required|date',
            'activity_name' => 'required',
            'attendance' => 'required|array|min:1',
        ]);

        try {
            // Check if any attendance is marked
            if (empty($this->attendance)) {
                $this->js("
                    Swal.fire({
                        title: 'Error!',
                        text: 'Please mark at least one attendance.',
                        icon: 'error',
                        timer: 3000,
                        showConfirmButton: false
                    })
                ");
                return;
            }

            // Loop through all members regardless of attendance status
            foreach ($this->members as $member) {
                AttendanceModel::updateOrCreate(
                    [
                        'member_id' => $member->id,
                        'date' => $this->date,
                        'activity_name' => $this->activity_name,
                    ],
                    [
                        'batch' => $this->selectedBatch,
                        'is_present' => isset($this->attendance[$member->id]) ? true : false,
                        'description' => $this->description ?? '',
                    ]
                );
            }

            $this->js("
                Swal.fire({
                    title: 'Success!',
                    text: 'Attendance saved successfully!',
                    icon: 'success',
                    timer: 3000,
                    showConfirmButton: false
                })
            ");

            // Reset form fields
            $this->reset(['activity_name', 'description', 'attendance']);

        } catch (\Exception $e) {
            $this->js("
                Swal.fire({
                    title: 'Error!',
                    text: 'Failed to save attendance: {$e->getMessage()}',
                    icon: 'error',
                    timer: 3000,
                    showConfirmButton: false
                })
            ");
        }
    }

    public function render()
    {
        return view('livewire.admin.attendance', [
            'batches' => $this->batches,
            'members' => $this->members, // magic Livewire computed property
        ]);
    }

    public function loadReport()
    {
        $query = AttendanceModel::with('member');

        if ($this->filterActivityName) {
            $query->where('activity_name', $this->filterActivityName);
        }

        if ($this->filterDate) {
            $query->where('date', $this->filterDate);
        }

        $this->reportRecords = $query->get();

        // Get description for the selected activity and date
        if ($this->filterDate && $this->filterActivityName) {
            $record = AttendanceModel::where('date', $this->filterDate)
                ->where('activity_name', $this->filterActivityName)
                ->first();
            $this->reportDescription = $record ? $record->description : null;
        }
    }

    public function updatedFilterDate()
    {
        $this->filterActivityName = null;

        if ($this->filterDate) {
            $this->activityNames = AttendanceModel::where('date', $this->filterDate)
                ->select('activity_name')
                ->distinct()
                ->pluck('activity_name')
                ->toArray();

            // Remove the automatic report loading
            // $this->loadReport();
        } else {
            $this->activityNames = [];
            $this->reportRecords = [];
        }
    }

    public function showReportSection()
    {
        $this->showReport = true;
        $this->filterDate = null;
        $this->filterActivityName = null;
        $this->activityNames = [];
        $this->reportRecords = [];
    }
}
