<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Achievement;

class Achievements extends Component
{
    use WithPagination;
    public Achievement $achievement;

    protected $paginationTheme = 'tailwind';

    public $perPage = 5;

    public function render()
    {
        $achievements = Achievement::with('student')
            ->latest()
            ->paginate($this->perPage);
            // dd($achievements);

        return view('livewire.partials.achievement', [
            'achievements' => $achievements,
        ]);
    }
}
