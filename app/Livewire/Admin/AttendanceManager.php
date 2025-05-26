<?php

namespace App\Livewire\Admin;

use App\Models\Event;
use App\Models\Member;
use App\Models\Attendance;
use Illuminate\Support\Facades\Log;  // Add this line
use Livewire\Component;
use Livewire\WithPagination;

class AttendanceManager extends Component
{
    use WithPagination;

    public $selectedDate = '';
    public $selectedEventId = '';
    public $eventData = [
        'name' => '',
        'date' => '',
        'location' => '',
        'start_time' => '',
        'end_time' => '',
        'description' => '',
    ];

    public $attendance = [];
    public $selectAll = false;
    public $selectedBatch = '';
    public $perPage = 10; // Added property for pagination
    public $search = '';

    public function mount()
    {
        $this->eventData['date'] = date('Y-m-d');
    }

    public function updatedSelectedDate($value)
    {
        $this->selectedEventId = ''; // Reset event selection
        $this->reset(['eventData', 'attendance']);
        if ($value) {
            $this->eventData['date'] = $value;
        }
    }

    public function updatedSelectedEventId($value)
    {
        if ($value) {
            $event = Event::with(['attendances' => function ($query) {
                $query->where('is_present', true);
            }])->find($value);

            if ($event) {
                $this->eventData = [
                    'name' => $event->name,
                    'date' => $event->date->format('Y-m-d'),
                    'location' => $event->location,
                    'start_time' => $event->start_time ? date('H:i', strtotime($event->start_time)) : null,
                    'end_time' => $event->end_time ? date('H:i', strtotime($event->end_time)) : null,
                    'description' => $event->description,
                ];

                // Reset and load existing attendance
                $this->attendance = [];
                foreach ($event->attendances as $attendance) {
                    $this->attendance[$attendance->member_id] = true;
                }
            }
        } else {
            // Reset form but keep selected date
            $this->reset(['eventData', 'attendance']);
            $this->eventData['date'] = $this->selectedDate;
        }
    }

    public function updatedSelectAll($value)
    {
        $members = $this->selectedBatch
            ? Member::where('batch', $this->selectedBatch)->get()
            : Member::all();

        // Only update attendance for the current batch members
        foreach ($members as $member) {
            // Preserve existing attendance for other batches
            $this->attendance[$member->id] = $value;
        }
    }

    public function getMembers()
    {
        $query = Member::query();

        if ($this->selectedBatch) {
            $query->where('batch', $this->selectedBatch);
        }

        return $query->orderBy('name')->paginate($this->perPage);
    }

    public function getGroupedMembersProperty()
    {
        $query = Member::query();

        if ($this->selectedBatch) {
            $query->where('batch', $this->selectedBatch);
        }

        return $query->orderBy('batch')->orderBy('name')->get()->groupBy('batch');
    }

    public function getBatchesProperty()
    {
        return Member::distinct()->pluck('batch')->sort()->values();
    }

    public function render()
    {
        $members = Member::query()
            ->when($this->selectedBatch, function($query) {
                return $query->where('batch', $this->selectedBatch);
            })
            ->when($this->search, function($query) {
                return $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('matric_no', 'like', '%' . $this->search . '%');
            })
            ->orderBy('name')
            ->paginate($this->perPage);

        // If batch is selected, group the paginated results
        if ($this->selectedBatch) {
            $groupedMembers = $members->groupBy('batch');
        }

        return view('livewire.admin.attendance', [
            'members' => $members,
            'groupedMembers' => $this->selectedBatch ? $groupedMembers : null,
            'batches' => Member::distinct()->pluck('batch')->sort(),
            'existingEvents' => $this->selectedDate ?
                Event::whereDate('date', $this->selectedDate)
                     ->orderBy('name')
                     ->get() :
                collect(),
        ]);
    }

    public function submit()
    {
        try {
            $this->validate([
                'eventData.name' => 'required|string|min:3',
                'eventData.date' => 'required|date',
                'eventData.location' => 'nullable|string',
                'eventData.start_time' => 'nullable|date_format:H:i',
                'eventData.end_time' => 'nullable|date_format:H:i|after:eventData.start_time',
                'eventData.description' => 'nullable|string',
            ]);

            if ($this->selectedEventId) {
                $event = Event::find($this->selectedEventId);
                $event->update($this->eventData);

                // Only delete attendance records that we're updating
                if ($this->selectedBatch) {
                    // Delete attendance only for the selected batch
                    Attendance::where('event_id', $event->id)
                        ->whereIn('member_id', Member::where('batch', $this->selectedBatch)
                        ->pluck('id'))
                        ->delete();
                } else {
                    // Delete all attendance if no batch is selected
                    Attendance::where('event_id', $event->id)->delete();
                }
            } else {
                $event = Event::create($this->eventData);
            }

            // Get members based on batch selection
            $members = $this->selectedBatch
                ? Member::where('batch', $this->selectedBatch)->get()
                : Member::all();

            // Create new attendance records
            foreach ($members as $member) {
                Attendance::updateOrCreate(
                    [
                        'event_id' => $event->id,
                        'member_id' => $member->id
                    ],
                    [
                        'is_present' => isset($this->attendance[$member->id]) && $this->attendance[$member->id]
                    ]
                );
            }

            // Dispatch success event
            $this->dispatch('attendanceSaved');

            // Reset form or do other cleanup
            $this->reset(['eventData', 'attendance', 'selectAll', 'selectedEventId']);
            $this->eventData['date'] = date('Y-m-d');
        } catch (\Exception $e) {
            Log::error('Attendance save error: ' . $e->getMessage());

            // Dispatch error event
            $this->dispatch('attendanceError');
        }
    }
}
