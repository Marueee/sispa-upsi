<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Member;
use Livewire\WithPagination;  // Add this
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;

class Members extends Component
{
    use WithPagination;

    public $batches = [];
    public $name = '', $matric_no = '', $batch = '', $memberId = null;
    public $isEdit = false;
    public $selectedBatch = '';
    public $search = '';
    public $perPage = 10;

    protected $listeners = [
        'refreshComponent' => '$refresh',
    ];

    public function mount()
    {
        $this->batches = Member::distinct('batch')->pluck('batch')->sort()->values()->toArray();
    }

    public function render()
    {
        $query = Member::query()
            ->when($this->search, function($query) {
                return $query->where(function($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('matric_no', 'like', '%' . $this->search . '%')
                      ->orWhere('batch', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->selectedBatch, function($query) {
                return $query->where('batch', $this->selectedBatch);
            })
            ->orderBy('name');

        return view('livewire.admin.members', [
            'members' => $query->paginate($this->perPage),
            'batches' => $this->batches
        ]);
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
            $this->dispatch('memberCreated');
        } catch (\Exception $e) {
            Log::error('Create error: ' . $e->getMessage());
            $this->dispatch('operationFailed', 'Failed to create member');
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

        // Add this line to trigger the scroll
        $this->dispatch('scrollToForm');
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

        $this->dispatch('memberUpdated');
    }

    #[On('deleteMember')]
    public function delete($memberId)
    {
        try {
            $member = Member::find($memberId);
            if ($member) {
                $member->delete();
                $this->dispatch('memberDeleted');
            }
        } catch (\Exception $e) {
            $this->dispatch('operationFailed', ['message' => 'Failed to delete member']);
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
