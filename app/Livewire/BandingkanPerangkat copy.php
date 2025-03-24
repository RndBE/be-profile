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
    public $spesifikasiLogger = [];
    public $spesifikasiSensor = [];
    public $allKategoriList = [];

    public function mount()
    {
        $this->loadAllSpesifikasi();
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







