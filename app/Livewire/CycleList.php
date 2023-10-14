<?php

namespace App\Livewire;

use App\Models\Cycle;
use Livewire\Component;

class CycleList extends Component
{
    public function render()
    {
        $cycles = Cycle::orderBy('designation', 'asc')->get();
        
        return view('livewire.cycle-list', ['cycles' => $cycles]);
    }
}
