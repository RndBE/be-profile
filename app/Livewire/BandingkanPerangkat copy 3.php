<?php

namespace App\Livewire;

use App\Models\Produk;
use Livewire\Component;
use App\Models\Spesifikasi;
use App\Models\SubSolutions;
use App\Models\SeriPerangkat;
use App\Models\SeriPerangkatSpesifikasi;

class BandingkanPerangkat extends Component
{
    public $subsolusiList;
    public $produkList = [];
    public $activeSubSolusi = null;

    public $selectedProduk = [null, null, null];
    public $seriLoggerList = [null, null, null];
    public $seriSensorList = [null, null, null];
    public $spesifikasiList = [];

    public $spesifikasiLogger = [];
    public $spesifikasiSensor = [];
    public $allKategoriList = [];

    public function mount()
    {
        $this->subsolusiList = SubSolutions::whereHas('produk', function ($query) {
            $query->select('sub_solution_id')
                ->groupBy('sub_solution_id')
                ->havingRaw('COUNT(sub_solution_id) > 1');
        })->get();

        $this->loadAllSpesifikasi();
    }

    public function loadProduk($subSolusiId)
    {
        $this->activeSubSolusi = $subSolusiId;
        $this->produkList = Produk::where('sub_solution_id', $subSolusiId)->get();
    }

    public function updateSelectedProduk($index, $produkId)
    {
        $this->selectedProduk[$index] = $produkId;
        $this->seriLoggerList[$index] = null;
        $this->seriSensorList[$index] = null;

        if ($produkId) {
            $produk = Produk::find($produkId);
            $seriIds = json_decode($produk->seri_perangkat_id, true) ?? [];

            $seriLogger = SeriPerangkat::whereIn('id', $seriIds)
                        ->where('jenis', 'Logger')
                        ->get();

            $seriSensor = SeriPerangkat::whereIn('id', $seriIds)
                        ->where('jenis', 'Sensor')
                        ->get();

            $this->seriLoggerList[$index] = $seriLogger;
            $this->seriSensorList[$index] = $seriSensor;
        }
    }

    private function loadAllSpesifikasi()
    {
        // Ambil semua spesifikasi dengan kategori terkait
        $spesifikasi = Spesifikasi::with('dataKategoriSpesifikasi')->get();

        foreach ($spesifikasi as $item) {
            $kategori = $item->dataKategoriSpesifikasi->nama_kategori;
            $judul = $item->judul;
            $jenis = $item->jenis_kategori;
            $deskripsi = $item->deskripsi ?? '-';

            // Tambahkan ke array dengan 3 perangkat untuk perbandingan
            if ($jenis === 'Logger') {
                $this->spesifikasiLogger[$kategori][$judul][] = $deskripsi;
            } elseif ($jenis === 'Sensor') {
                $this->spesifikasiSensor[$kategori][$judul][] = $deskripsi;
            }

            // Pastikan kategori dan judul tetap terdaftar
            $this->allKategoriList[$kategori][$judul] = true;
        }

        // Isi dengan '-' jika kurang dari 3 perangkat
        foreach ($this->spesifikasiLogger as &$kategori) {
            foreach ($kategori as &$judul) {
                $judul = array_pad($judul, 3, '-');
            }
        }
        foreach ($this->spesifikasiSensor as &$kategori) {
            foreach ($kategori as &$judul) {
                $judul = array_pad($judul, 3, '-');
            }
        }
    }

    public function render()
    {
        return view('livewire.bandingkan-perangkat');
    }
}


