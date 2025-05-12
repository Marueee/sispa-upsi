<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Attendance;    // Changed from using alias
use Illuminate\Support\Collection;

class Report extends Component
{
    public $filterDate;
    public $filterActivityName;
    public $activityNames = [];
    public Collection $reportRecords;    // Added type declaration
    public $reportDescription;

    public function mount()
    {
        $this->reportRecords = collect();  // Initialize as empty collection
        $this->activityNames = Attendance::select('activity_name')
            ->distinct()
            ->pluck('activity_name')
            ->toArray();
    }

    public function updatedFilterDate()
    {
        $this->filterActivityName = null;
        $this->reportRecords = collect();  // Reset as empty collection
        $this->reportDescription = null;

        if ($this->filterDate) {
            $this->activityNames = Attendance::where('date', $this->filterDate)
                ->select('activity_name')
                ->distinct()
                ->pluck('activity_name')
                ->toArray();
        } else {
            $this->activityNames = [];
        }
    }

    public function loadReport()
    {
        try {
            $query = Attendance::query()
                ->with('member')
                ->when($this->filterDate, fn($q) => $q->where('date', $this->filterDate))
                ->when($this->filterActivityName, fn($q) => $q->where('activity_name', $this->filterActivityName));

            $this->reportRecords = $query->get();

            if ($this->reportRecords->isEmpty()) {
                $this->js("
                    Swal.fire({
                        title: 'No Records',
                        text: 'No attendance records found',
                        icon: 'info',
                        timer: 3000,
                        showConfirmButton: false
                    })
                ");
                return;
            }

            $this->reportDescription = null;
            if ($this->filterDate && $this->filterActivityName) {
                $this->reportDescription = $this->reportRecords->first()?->description;
            }

        } catch (\Exception $e) {
            $this->js("
                Swal.fire({
                    title: 'Error',
                    text: 'Failed to load report: {$e->getMessage()}',
                    icon: 'error',
                    timer: 3000,
                    showConfirmButton: false
                })
            ");
        }
    }

    public function render()
    {
        return view('livewire.admin.report');
    }
}
