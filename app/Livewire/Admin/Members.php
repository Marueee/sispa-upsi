<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Member;
use Illuminate\Support\Facades\Log;  // Add this import

class Members extends Component
{
    public $name = '', $matric_no = '', $batch = '', $memberId = null;
    public $isEdit = false;
    public $members;
    public $selectedBatch = '';
    public $batches = [];

    protected $listeners = [
        'refreshComponent' => '$refresh',
    ];

    public function mount()
    {
        $this->batches = Member::distinct('batch')->pluck('batch')->toArray();
        $this->loadMembers();
    }

    public function render()
    {
        $query = Member::query()->orderBy('name');

        if ($this->selectedBatch) {
            $query->where('batch', $this->selectedBatch);
        }

        $this->members = $query->get();

        return view('livewire.admin.members', [
            'members' => $this->members,
            'batches' => $this->batches
        ]);
    }

    public function updated($propertyName)
    {
        if ($propertyName === 'selectedBatch') {
            $this->loadMembers();
        }
    }

    public function loadMembers()
    {
        $query = Member::query()->orderBy('name');

        if ($this->selectedBatch) {
            $query->where('batch', $this->selectedBatch);
        }

        $this->members = $query->get();
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'matric_no' => 'required|unique:members,matric_no',
            'batch' => 'required'
        ]);

        try {
            Member::create($validatedData);
            $this->resetForm();
            $this->loadMembers();

            // Dispatch the success event for SweetAlert
            $this->dispatch('memberCreated');
        } catch (\Exception $e) {
            Log::error('Create error: ' . $e->getMessage());
            $this->dispatch('showAlert', [
                'type' => 'error',
                'title' => 'Error!',
                'text' => 'Failed to create member'
            ]);
        }
    }


    public function edit($id)
    {
        $member = Member::findOrFail($id);

        $this->memberId = $member->id;
        $this->name = $member->name;
        $this->matric_no = $member->matric_no;
        $this->batch = $member->batch;
        $this->isEdit = true;
    }

    public function update()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'matric_no' => 'required|unique:members,matric_no,' . $this->memberId,
            'batch' => 'required'
        ]);

        $member = Member::find($this->memberId);
        $member->update($validatedData);
        $this->resetForm();

        $this->dispatch('showAlert', [
            'type' => 'success',
            'title' => 'Success!',
            'text' => 'Member updated successfully!'
        ]);
    }

    public function delete($id)
    {
        try {
            $member = Member::findOrFail($id);
            $member->delete();
            $this->loadMembers();

            // Dispatch success event for SweetAlert
            $this->dispatch('memberDeleted');
        } catch (\Exception $e) {
            Log::error('Delete error: ' . $e->getMessage());

            // Dispatch error event for SweetAlert
            $this->dispatch('deleteFailed');
        }
    }

    public function resetForm()
    {
        $this->name = '';
        $this->matric_no = '';
        $this->batch = '';
        $this->memberId = null;
        $this->isEdit = false;
    }
}
