<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\News;
use Livewire\WithFileUploads;
use Livewire\Attributes\On;

class NewsManager extends Component
{
    use WithFileUploads;

    public $news_items, $title, $content, $image, $status = 'draft', $newsId;
    public $isEdit = false;

    protected $rules = [
        'title' => 'required|string|max:255',
        'content' => 'required',
        'status' => 'required|in:draft,published',
        'image' => 'nullable|image|max:1024',
    ];

    public function render()
    {
        $this->news_items = News::latest()->get();
        return view('livewire.admin.news');
    }

    public function resetInput()
    {
        $this->title = '';
        $this->content = '';
        $this->status = 'draft';
        $this->image = null;
        $this->newsId = null;
        $this->isEdit = false;
    }

    public function store()
    {
        try {
            $this->validate();

            $news = new News();
            $news->title = $this->title;
            $news->content = $this->content;
            $news->status = $this->status;

            if ($this->image) {
                $news->image = $this->image->store('news', 'public');
            }

            $news->save();

            session()->flash('message', 'News Created Successfully.');
            $this->resetInput();
            $this->dispatch('newsCreated');
        } catch (\Exception $e) {
            $this->dispatch('error', ['message' => 'Failed to create news article']);
        }
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        $this->newsId = $news->id;
        $this->title = $news->title;
        $this->content = $news->content;
        $this->status = $news->status;
        $this->isEdit = true;

        // Add this line to trigger the scroll
        $this->dispatch('scrollToForm');
    }

    public function update()
    {
        try {
            $this->validate();

            $news = News::findOrFail($this->newsId);
            $news->title = $this->title;
            $news->content = $this->content;
            $news->status = $this->status;

            if ($this->image) {
                $news->image = $this->image->store('news', 'public');
            }

            $news->save();

            session()->flash('message', 'News Updated Successfully.');
            $this->resetInput();
            $this->dispatch('newsUpdated');
        } catch (\Exception $e) {
            $this->dispatch('error', ['message' => 'Failed to update news article']);
        }
    }

    #[On('deleteNews')]
    public function delete($newsId)
    {
        try {
            $news = News::find($newsId);
            if ($news) {
                $news->delete();
                session()->flash('message', 'News Deleted Successfully.');
                $this->dispatch('newsDeleted');
            }
        } catch (\Exception $e) {
            $this->dispatch('error', ['message' => 'Failed to delete news article']);
        }
    }
}
