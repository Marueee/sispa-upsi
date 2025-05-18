<?php

namespace App\Livewire\Admin;

use App\Models\Event;
use App\Models\Attendance;
use Livewire\Component;

class Report extends Component
{
    public $filterDate;
    public $filterActivityName;
    public $reportRecords;
    public $reportDescription;

    public function loadReport()
    {
        if ($this->filterDate && $this->filterActivityName) {
            $event = Event::where('name', $this->filterActivityName)
                         ->where('date', $this->filterDate)
                         ->first();

            if ($event) {
                $this->reportRecords = Attendance::with('member')
                    ->where('event_id', $event->id)
                    ->get();
                $this->reportDescription = $event->description;
            }
        }
    }

    public function render()
    {
        $activityNames = [];

        if ($this->filterDate) {
            $activityNames = Event::where('date', $this->filterDate)
                                ->pluck('name')
                                ->unique()
                                ->values()
                                ->all();
        }

        return view('livewire.admin.report', [
            'activityNames' => $activityNames
        ]);
    }
}
