<?php

namespace App\Livewire\Page;

use App\Models\Achievement;
use Livewire\Component;
use Livewire\WithPagination;

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

        return view('livewire.Page.achievement', [
            'achievements' => $achievements,
        ]);
    }
}
