<?php

namespace App\Livewire;

use App\Models\Produk;
use Livewire\Component;
use App\Models\SubSolutions;
use App\Models\SeriPerangkat;
use App\Models\SeriPerangkatSpesifikasi;

class BandingkanPerangkat extends Component
{
    public $subsolusiList;
    public $produkList = [];
    public $activeSubSolusi = null;

    public $selectedProduk = [null, null, null]; // Menyimpan produk yang dipilih untuk tiap kolom
    public $seriPerangkatList = [null, null, null]; // Menyimpan seri perangkat untuk tiap kolom
    public $spesifikasiList = []; // Menyimpan spesifikasi berdasarkan kategori

    public function mount()
    {
        $this->subsolusiList = SubSolutions::whereHas('produk', function ($query) {
            $query->select('sub_solution_id')
                ->groupBy('sub_solution_id')
                ->havingRaw('COUNT(sub_solution_id) > 1');
        })->get();
    }

    public function loadProduk($subSolusiId)
    {
        $this->activeSubSolusi = $subSolusiId;
        $this->produkList = Produk::where('sub_solution_id', $subSolusiId)->get();
    }

    public function updateSelectedProduk($index, $produkId)
    {
        $this->selectedProduk[$index] = $produkId;
        $this->seriPerangkatList[$index] = null;

        if ($produkId) {
            $produk = Produk::find($produkId);
            $seriIds = json_decode($produk->seri_perangkat_id, true) ?? [];

            $seriPerangkat = SeriPerangkat::whereIn('id', $seriIds)
                                        ->where('jenis', 'Logger')
                                        ->get();

            $this->seriPerangkatList[$index] = $seriPerangkat;

            // Ambil semua spesifikasi dari seri perangkat
            foreach ($seriPerangkat as $seri) {
                $spesifikasi = SeriPerangkatSpesifikasi::where('seri_perangkat_id', $seri->id)
                    ->with('dataSpesifikasi.dataKategoriSpesifikasi')
                    ->get();

                foreach ($spesifikasi as $item) {
                    $kategori = $item->dataSpesifikasi->dataKategoriSpesifikasi->nama_kategori ?? 'Uncategorized';
                    $judul = $item->dataSpesifikasi->judul;
                    $deskripsi = $item->deskripsi;

                    $this->spesifikasiList[$kategori][$judul][$index] = $deskripsi;
                }
            }
        }

        // Pastikan kategori dan judul yang ada di salah satu perangkat tetapi tidak ada di perangkat lain tetap tampil
        $this->normalizeSpesifikasiList();
    }

    private function normalizeSpesifikasiList()
    {
        foreach ($this->spesifikasiList as $kategori => $judulSpesifikasi) {
            foreach ($judulSpesifikasi as $judul => $deskripsiProduk) {
                for ($i = 0; $i < 3; $i++) {
                    if (!isset($this->spesifikasiList[$kategori][$judul][$i])) {
                        $this->spesifikasiList[$kategori][$judul][$i] = '-';
                    }
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.bandingkan-perangkat');
    }
}


