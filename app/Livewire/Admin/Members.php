<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Member;

class Members extends Component
{
    public $name = '', $matric_no = '', $batch = '', $memberId = null;
    public $isEdit = false;
    public $members;

    public function mount()
    {
        $this->loadMembers();
    }

    public function render()
    {
        return view('livewire.admin.members');
    }

    public function loadMembers()
    {
        $this->members = Member::orderBy('name')->get();
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'matric_no' => 'required|string|max:20|unique:members,matric_no',
        ]);

        Member::create([
            'name' => $this->name,
            'matric_no' => $this->matric_no,
            'batch' => $this->batch,
        ]);

        session()->flash('message', 'Member added successfully.');
        $this->resetForm();
        $this->loadMembers();
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
        $this->validate([
            'name' => 'required|string|max:255',
            'matric_no' => 'required|string|max:20|unique:members,matric_no,' . $this->memberId,
        ]);

        $member = Member::findOrFail($this->memberId);

        $member->update([
            'name' => $this->name,
            'matric_no' => $this->matric_no,
            'batch' => $this->batch,
        ]);

        session()->flash('message', 'Member updated successfully.');
        $this->resetForm();
        $this->loadMembers();
    }

    public function delete($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();

        session()->flash('message', 'Member deleted.');
        $this->loadMembers();
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
