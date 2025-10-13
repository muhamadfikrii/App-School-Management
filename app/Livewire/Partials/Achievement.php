<?php

namespace App\Livewire\Partials;

use App\Models\Achievement as ModelsAchievement;
use Livewire\Component;

class Achievement extends Component
{
    public $achievements;
    public function mount()
    {
        $this->achievements = ModelsAchievement::all();
    }
    public function render()
    {
        $achievements = ModelsAchievement::with('student')->get();
        return view('livewire.partials.achievement', [
            'achievements', $achievements
        ]);
    }
}
