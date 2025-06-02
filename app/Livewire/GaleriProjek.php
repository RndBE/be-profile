<?php

namespace App\Livewire;

use App\Models\Projek;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\KeywordProjek;
use App\Models\KategoriProjek;
use Illuminate\Support\Facades\DB;

class GaleriProjek extends Component
{
    use WithPagination;

    public $search = '';
    public $category = null;
    public $tags = [];
    public $categories,$popularTags;

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->categories = KategoriProjek::withCount('projek')->get();
        $this->popularTags = KeywordProjek::whereRaw('LENGTH(keyword) >= 3')->orderBy('count', 'desc')->limit(10)->get();
    }

    public function updatingSearch()
    {
        $this->resetPage();

        if (!empty($this->search)) {
            KeywordProjek::updateOrCreate(
                ['keyword' => $this->search], // Cari kata kunci
                ['count' => DB::raw('count + 1')] // Tambah hitungan
            );
        }
    }

    public function updatingCategory()
    {
        $this->resetPage();
    }

    public function render()
    {
        // Query projek dengan relasi kategori_projek
        $query = Projek::with('kategoriProjek');

        // Filter berdasarkan pencarian
        if ($this->search) {
            $query->where('nama_projek', 'like', '%' . $this->search . '%')
                ->orWhere('waktu', 'like', '%' . $this->search . '%')
                ->orWhere('lokasi', 'like', '%' . $this->search . '%')
                ->orWhere('website', 'like', '%' . $this->search . '%');
        }

        // Filter berdasarkan kategori
        if ($this->category) {
            $query->where('kategori_projek_id', $this->category);
        }

        // Filter berdasarkan tag
        if (!empty($this->tags)) {
            $query->whereIn('tags', $this->tags);
        }

        $this->categories = KategoriProjek::withCount('projek')->get();
        $this->popularTags = KeywordProjek::whereRaw('LENGTH(keyword) >= 3')->orderBy('count', 'desc')->limit(10)->get();

        // Ambil data projek dengan paginasi
        $projeks = $query->orderBy('waktu', 'desc')->orderBy('updated_at', 'desc')->paginate(6);

        return view('livewire.galeri-projek', [
            'projeks' => $projeks,
        ]);
    }

}
