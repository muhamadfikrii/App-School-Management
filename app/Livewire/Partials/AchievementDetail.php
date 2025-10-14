<?php

namespace App\Livewire\Partials;

use App\Models\Achievement;
use Livewire\Component;

class AchievementDetail extends Component
{
    public Achievement $achievement;

    public function mount(Achievement $achievement)
    {
        $this->achievement = $achievement;
    }

    public function render()
    {
        return view('livewire.partials.achievement-detail');
    }
}
