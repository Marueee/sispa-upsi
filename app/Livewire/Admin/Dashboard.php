<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Member;
use App\Models\Event;

class Dashboard extends Component
{
    public function render()
    {
        $batches = Member::select('batch')
            ->selectRaw('count(*) as count')
            ->groupBy('batch')
            ->get();

        $recentEvents = Event::latest()
            ->take(5)
            ->get();

        return view('livewire.admin.dashboard', [
            'batches' => $batches,
            'recentEvents' => $recentEvents,
        ]);
    }
}
