<?php

namespace App\Livewire\Page;

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
        return view('livewire.Page.contact');
    }
}
