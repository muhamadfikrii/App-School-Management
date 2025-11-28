<?php

namespace App\Livewire\Partials;

use App\Models\Achievement;
use Livewire\Component;

use function view;

class AchievementDetail extends Component
{
    public Achievement $achievement;

    public function mount($id)
    {
        $this->achievement = Achievement::with('student')->findOrFail($id);
    }

    public function render()
    {
        $achievements = Achievement::all();

        return view('livewire.partials.achievement-detail', [
            'achievements' => $achievements,
        ]);
    }
}
