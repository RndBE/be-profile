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
    public $selectedSubsolusiId = null;

    public $selectedProduk = [null, null, null];
    public $seriLoggerList = [null, null, null];
    public $seriSensorList = [null, null, null];
    public $spesifikasiList = [];

    public $spesifikasiLogger = [];
    public $spesifikasiSensor = [];
    public $allKategoriList = [];
    public $allLoggerKategoriList = [];
    public $allSensorKategoriList = [];

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
        $seriSpesifikasi = SeriPerangkatSpesifikasi::with('dataSpesifikasi')->get();

        // Simpan daftar kategori dan judul agar tetap ditampilkan meskipun tidak ada data
        foreach ($spesifikasi as $item) {
            $kategori = $item->dataKategoriSpesifikasi->nama_kategori;
            $judul = $item->judul;
            $jenisKategori = $item->jenis_kategori;

            if ($jenisKategori === 'Logger') {
                $this->allLoggerKategoriList[$kategori][$judul] = true;
            }

            if ($jenisKategori === 'Sensor') {
                $this->allSensorKategoriList[$kategori][$judul] = true;
            }

            // $this->allLoggerKategoriList[$kategori][$judul] = true;
        }

        // Proses spesifikasi berdasarkan jenis kategori (Logger atau Sensor)
        foreach ($seriSpesifikasi as $item) {
            $kategori = $item->dataSpesifikasi->dataKategoriSpesifikasi->nama_kategori;
            $judul = $item->dataSpesifikasi->judul;
            $jenis = $item->dataSpesifikasi->jenis_kategori;

            if ($jenis === 'Logger') {
                $this->spesifikasiLogger[$item->seri_perangkat_id][$kategori][$judul] = $item->deskripsi;
            } elseif ($jenis === 'Sensor') {
                $this->spesifikasiSensor[$item->seri_perangkat_id][$kategori][$judul] = $item->deskripsi;
            }
        }
    }


    public function render()
    {
        return view('livewire.bandingkan-perangkat');
    }
}


