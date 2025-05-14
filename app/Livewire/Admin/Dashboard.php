<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Member;

class Dashboard extends Component
{
    public function render()
    {
        $batches = Member::select('batch')
            ->selectRaw('count(*) as count')
            ->groupBy('batch')
            ->get();

        return view('livewire.admin.dashboard', [
            'batches' => $batches,
        ]);
    }
}
