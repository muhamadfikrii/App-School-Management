<?php

namespace App\Livewire\Page;

use App\Models\Achievement;
use Livewire\Component;

use function view;

class Home extends Component
{
    public $achievements;

    public function mount()
    {
        $this->achievements = Achievement::latest()->take(3)->get();
    }

    public function render()
    {
        return view('livewire.Page.home');
    }
}
