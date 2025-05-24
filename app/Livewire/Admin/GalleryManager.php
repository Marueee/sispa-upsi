<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Gallery;

class GalleryManager extends Component
{
    use WithFileUploads;

    public $title, $description, $status = 'draft', $image, $gallery_items;
    public $isEdit = false;
    public $editId = null;

    public function mount()
    {
        $this->loadGalleryItems();
    }

    public function loadGalleryItems()
    {
        $this->gallery_items = Gallery::latest()->get();
    }

    public function store()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'nullable',
            'status' => 'required|in:draft,published',
            'image' => 'required|image|max:2048',
        ]);

        $imagePath = $this->image->store('gallery', 'public');

        Gallery::create([
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'image' => $imagePath,
        ]);

        session()->flash('message', 'Gallery item created successfully.');

        $this->resetFields();
        $this->loadGalleryItems();
    }

    public function edit($id)
    {
        $item = Gallery::findOrFail($id);

        $this->editId = $id;
        $this->title = $item->title;
        $this->description = $item->description;
        $this->status = $item->status;
        $this->isEdit = true;
    }

    public function update()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'nullable',
            'status' => 'required|in:draft,published',
        ]);

        $item = Gallery::findOrFail($this->editId);
        $item->title = $this->title;
        $item->description = $this->description;
        $item->status = $this->status;

        if ($this->image) {
            $imagePath = $this->image->store('gallery', 'public');
            $item->image = $imagePath;
        }

        $item->save();

        session()->flash('message', 'Gallery item updated successfully.');

        $this->resetFields();
        $this->loadGalleryItems();
    }

    public function delete($id)
    {
        $item = Gallery::findOrFail($id);
        $item->delete();

        session()->flash('message', 'Gallery item deleted.');
        $this->loadGalleryItems();
    }

    public function resetFields()
    {
        $this->title = '';
        $this->description = '';
        $this->status = 'draft';
        $this->image = null;
        $this->editId = null;
        $this->isEdit = false;
    }

    public function render()
    {
        return view('livewire.admin.gallery-manager');
    }
}
