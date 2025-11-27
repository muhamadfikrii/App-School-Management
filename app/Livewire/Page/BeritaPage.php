<?php

namespace App\Livewire\Page;

use App\Models\Berita;
use Livewire\Component;
use Livewire\WithPagination;

class BeritaPage extends Component
{
    use WithPagination;

    public $searchQuery = '';

    public $showDetail = false;

    public $currentNews = null;

    protected $queryString = [
        'searchQuery' => ['except' => ''],
    ];

    // public function showDetail($id)
    // {
    //     $this->currentNews = Berita::find($id);
    //     $this->showDetail = true;
    // }

    // public function backToList()
    // {
    //     $this->showDetail = false;
    //     $this->currentNews = null;
    // }

    public function render()
    {
        if ($this->showDetail && $this->currentNews) {
            return view('livewire.Page.berita');
        }

        $beritas = Berita::query()
            ->when($this->searchQuery, function ($query): void {
                $query->where('title', 'like', '%'.$this->searchQuery.'%')
                    ->orWhere('excerpt', 'like', '%'.$this->searchQuery.'%')
                    ->orWhere('content', 'like', '%'.$this->searchQuery.'%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        return view('livewire.Page.berita', [
            'beritas' => $beritas,
        ]);
    }
}
