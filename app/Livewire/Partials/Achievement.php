<?php

namespace App\Livewire\Partials;

use App\Models\Achievement as ModelsAchievement;
use Livewire\Component;
use Livewire\WithPagination;

class Achievement extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $perPage = 5;

    public function render()
    {
        $achievements = ModelsAchievement::with('student')
            ->latest()
            ->paginate($this->perPage);

        return view('livewire.partials.achievement', [
            'achievements' => $achievements,
        ]);
    }
}
