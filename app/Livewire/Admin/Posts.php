<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithFileUploads;

class Posts extends Component
{
    use WithFileUploads;

    public $posts, $title, $content, $image, $status = 'draft', $postId;
    public $isEdit = false;

    protected $rules = [
        'title' => 'required|string|max:255',
        'content' => 'required',
        'status' => 'required|in:draft,published',
        'image' => 'nullable|image|max:1024', // 1MB Max
    ];

    public function render()
    {
        $this->posts = Post::latest()->get();
        return view('livewire.admin.posts');
    }

    public function resetInput()
    {
        $this->title = '';
        $this->content = '';
        $this->status = 'draft';
        $this->image = null;
        $this->postId = null;
        $this->isEdit = false;
    }

    public function store()
    {
        $this->validate();

        $post = new Post();
        $post->title = $this->title;
        $post->content = $this->content;
        $post->status = $this->status;

        if ($this->image) {
            $post->image = $this->image->store('posts', 'public');
        }

        $post->save();

        session()->flash('message', 'Post Created Successfully.');
        $this->resetInput();
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->postId = $id;
        $this->title = $post->title;
        $this->content = $post->content;
        $this->status = $post->status;
        $this->isEdit = true;
    }

    public function update()
    {
        $this->validate();

        $post = Post::findOrFail($this->postId);
        $post->title = $this->title;
        $post->content = $this->content;
        $post->status = $this->status;

        if ($this->image) {
            $post->image = $this->image->store('posts', 'public');
        }

        $post->save();

        session()->flash('message', 'Post Updated Successfully.');
        $this->resetInput();
    }

    public function delete($id)
    {
        Post::findOrFail($id)->delete();
        session()->flash('message', 'Post Deleted Successfully.');
    }
}
