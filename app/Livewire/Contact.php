<?php

namespace App\Livewire;

use Livewire\Component;

class Contact extends Component
{
    public string $tab = 'map';

    public function setTab(string $tab)
    {
        $this->tab = $tab;
    }

    public function render()
    {
        return view('livewire.contact');
    }
}
