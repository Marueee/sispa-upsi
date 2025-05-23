<?php

namespace App\Livewire\Admin;


use Livewire\Component;
use App\Models\ContactMessage;

class ContactMessages extends Component
{
    public function render()
    {
        return view('livewire.admin.contact-messages', [
            'messages' => ContactMessage::latest()->get(),
        ]);
    }
}


