<?php

namespace App\Livewire\Partials;

use App\Models\Berita;
use Livewire\Component;

class BeritaDetail extends Component
{
    public $berita;

    public $beritaId;

    public $relatedNews;

    public function mount($slug)
    {
        $this->beritaId = $slug;
        $this->loadBerita();
    }

    public function loadBerita()
    {
        $this->berita = Berita::findOrFail($this->beritaId);

        // Load berita terkait (kecuali berita saat ini)
        $this->relatedNews = Berita::where('id', '!=', $this->berita->id)
            ->take(3)
            ->get();

        // dd($this->relatedNews->pluck('image_url'));
    }

    public function render()
    {
        return view('livewire.partials.berita-detail', [
            'relatedNews' => $this->relatedNews,
            'berita',
        ]);
    }
}
