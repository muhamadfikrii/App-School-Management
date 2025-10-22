<?php

namespace App\Livewire\Partials;

use Livewire\Component;

class ContactSection extends Component
{
    public $message;

    public $successMessage;

    public function submit()
    {

        $this->successMessage = 'Terima kasih, pesan Anda telah terkirim!';
        $this->reset(['name', 'email', 'message']);
    }

    public function render()
    {
        return view('livewire.partials.contact-section');
    }
}
