<?php

namespace App\Livewire\Partials;

use App\Models\Achievement;
use App\Models\Major;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Achievemet;
use Livewire\Component;

class Statistics extends Component
{
    public function render()
    {
        return view('livewire.partials.statistics');
    }
}
