<?php

namespace App\Livewire;

use App\Models\Artikel;
use Livewire\Component;

class SearchArtikel extends Component
{
    public $search = ''; // Variabel pencarian

    public function render()
    {
        $artikels = Artikel::where('status', 'published')
            ->where(function($query) {
                $query->where('judul', 'like', '%' . $this->search . '%')
                    ->orWhere('konten', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->get();

        return view('livewire.search-artikel', compact('artikels'));
    }
}
