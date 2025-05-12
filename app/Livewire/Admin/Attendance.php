<?php

namespace App\Livewire\Admin;

use App\Models\Member;
use App\Models\Attendance as AttendanceModel;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Attendance extends Component
{
    public $batches = [];
    public $selectedBatch = '';
    public $date;
    public $activity_name;
    public $attendance = [];
    public $description;

    protected $rules = [
        'selectedBatch' => 'required',
        'date' => 'required|date',
        'activity_name' => 'required',
        'attendance' => 'required|array|min:1',
        'description' => 'nullable|string'
    ];

    protected $messages = [
        'selectedBatch.required' => 'Please select a batch',
        'date.required' => 'Date is required',
        'activity_name.required' => 'Activity name is required',
        'attendance.required' => 'Please mark at least one attendance',
    ];

    public function mount()
    {
        $this->batches = Member::select('batch')
            ->distinct()
            ->orderBy('batch')
            ->pluck('batch')
            ->toArray();
        $this->date = now()->toDateString();
    }

    public function updatedSelectedBatch()
    {
        $this->reset(['attendance', 'activity_name', 'description']);
    }

    public function toggleAllCheckboxes()
    {
        $allChecked = count($this->attendance) === count($this->members);
        $this->attendance = $allChecked ? [] :
            $this->members->pluck('id')->mapWithKeys(fn($id) => [$id => true])->toArray();
    }

    public function getMembersProperty()
    {
        return empty($this->selectedBatch) ? collect() :
            Member::where('batch', $this->selectedBatch)
                  ->orderBy('name')
                  ->get();
    }

    public function submit()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            foreach ($this->members as $member) {
                AttendanceModel::updateOrCreate(
                    [
                        'member_id' => $member->id,
                        'date' => $this->date,
                        'activity_name' => $this->activity_name,
                    ],
                    [
                        'batch' => $this->selectedBatch,
                        'is_present' => isset($this->attendance[$member->id]),
                        'description' => $this->description ?? '',
                    ]
                );
            }

            DB::commit();

            $this->showSuccessMessage();
            $this->reset(['activity_name', 'description', 'attendance']);

        } catch (\Exception $e) {
            DB::rollBack();
            $this->showErrorMessage($e->getMessage());
        }
    }

    private function showSuccessMessage()
    {
        $this->js("
            Swal.fire({
                title: 'Success!',
                text: 'Attendance saved successfully!',
                icon: 'success',
                timer: 3000,
                showConfirmButton: false,
                toast: true,
                position: 'top-end'
            })
        ");
    }

    private function showErrorMessage($message)
    {
        $this->js("
            Swal.fire({
                title: 'Error!',
                text: 'Failed to save attendance: {$message}',
                icon: 'error',
                timer: 3000,
                showConfirmButton: false,
                toast: true,
                position: 'top-end'
            })
        ");
    }

    public function render()
    {
        return view('livewire.admin.attendance', [
            'batches' => $this->batches,
            'members' => $this->members,
        ]);
    }
}
