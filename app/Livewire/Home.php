<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

class Home extends Component
{
     #[Title('Dashboard')] 
    public function render()
    {
        return view('livewire.home');
    }
}
