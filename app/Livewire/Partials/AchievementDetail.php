<?php

namespace App\Livewire\Partials;

use App\Models\Achievement;
use function view;

use Illuminate\Support\Facades\Log;
use Livewire\Component;

class AchievementDetail extends Component
{
    public Achievement $achievement;
    public $achievements;

    public function mount($id)
    {
        $this->achievement = Achievement::with('student')->findOrFail($id);
    }

    public function render()
    {
        // Temporarily get all achievements except current one
        $this->achievements = Achievement::where('id', '!=', $this->achievement->id)
            ->take(3)
            ->get();


        return view('livewire.partials.achievement-detail', [
            'achievements' => $this->achievements,
        ]);
    }
}
