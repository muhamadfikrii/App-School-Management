<?php

namespace App\Livewire;

use App\Models\Achievement;
use Livewire\Component;

class Home extends Component
{
    public $achievements;

    public function mount()
    {
        // Ambil 3 prestasi terbaru
        $this->achievements = Achievement::latest()->take(3)->get();
    }

    public function render()
    {
        return view('livewire.home');
    }
}
