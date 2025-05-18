<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\News;
use Livewire\WithFileUploads;

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
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        $this->newsId = $id;
        $this->title = $news->title;
        $this->content = $news->content;
        $this->status = $news->status;
        $this->isEdit = true;
    }

    public function update()
    {
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
    }

    public function delete($id)
    {
        News::findOrFail($id)->delete();
        session()->flash('message', 'News Deleted Successfully.');
    }
}
