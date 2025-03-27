<!-- team-area -->

<section class="team__area-four">
    <style>
        .swiper-wrapper {
            padding: 50px;
            border-radius: 8px;
            transition: all 0.3s ease-in-out;
        }

        .swiper-slide {
            background-color: transparent; /* Default tidak ada background */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
            cursor: pointer; /* Ubah kursor saat diarahkan */
            transition: background-color 0.3s ease-in-out;
        }

        .swiper-slide.active-slide {
            background-color: #ECECEC; /* Background aktif saat dipilih */
        }
        .deskripsi-bandingkanperangkat p{
            color: #2E2E4D;
        }
    </style>
    <div class="" style="text-align: center;padding-bottom:100px">
        <h2 class="title">Temukan <span style="color: rgba(180, 4, 4, 0.75);">spesifikasi</span> terbaik <br>
            untuk <span style="color: rgba(180, 4, 4, 0.75);">solusi</span> terbaik.</h2>
    </div>
    <div class="container border-subsolusi">
        <div class="mb-50">
            <h4>Pilih Kategori Perangkat</h4>
        </div>
        <div wire:ignore>
            <div class="subsolusi-active swiper-container">
                <div class="swiper-wrapper">
                    @foreach ($subsolusiList as $subsolusi)
                        <div class="swiper-slide"
                            onclick="setActiveSlide(this)"
                            wire:click="loadProduk({{ $subsolusi->id }})">
                            <div class="brand-item">
                                <img src="{{ asset('storage/' . $subsolusi->icon) }}"
                                    class="d-block w-10"
                                    alt="{{ $subsolusi->nama }}">
                            </div>
                            <div style="text-align: center; margin-top:10px;">
                                <h6>{{ $subsolusi->nama }}</h6>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row g-4" style="margin-right:5px;">
            <div class="table-responsive">
                <table class="table table-bordered rounded-3 overflow-hidden">
                    <thead>
                        <tr style="border-style:none;">
                            <td scope="row" class="align-top" style="border: 0px solid black;"><h4>Pilih produk untuk dibandingkan!</h4></td>
                            @for ($i = 0; $i < 3; $i++)
                                <td style="border: 0px solid black;">
                                    <!-- Select Produk -->
                                    <select class="form-select form-select-lg mb-3"
                                            wire:model="selectedProduk.{{ $i }}"
                                            wire:change="updateSelectedProduk({{ $i }}, $event.target.value)">
                                        <option selected>Pilih Produk {{ $i + 1 }}</option>
                                        @foreach ($produkList as $produk)
                                            <option value="{{ $produk->id }}">{{ $produk->nama_produk }}</option>
                                        @endforeach
                                    </select>

                                    <!-- Tampilkan Gambar Produk -->
                                    @if (!empty($selectedProduk[$i]))
                                        @php
                                            $produkTerpilih = collect($produkList)->firstWhere('id', $selectedProduk[$i]);
                                        @endphp
                                        @if ($produkTerpilih && !empty($produkTerpilih->gambar_produk))
                                            <div class="text-center">
                                                <img src="{{ asset('storage/' . $produkTerpilih->gambar_produk) }}"
                                                    class="img-fluid rounded shadow-sm"
                                                    style="max-width: 300px; height: auto;"
                                                    alt="Gambar {{ $produkTerpilih->nama_produk }}">
                                            </div>
                                        @else
                                            <div class="text-center">
                                                <p style="color: gray;">Tidak ada gambar</p>
                                            </div>
                                        @endif
                                    @endif
                                </td>
                            @endfor
                        </tr>
                        <tr style="border-style:none;">
                            <td colspan="2" style="border: 0px solid black;"><h4>Spesifikasi Data Logger</h4></td>
                        </tr>
                        <tr style="border-style:none;">
                            <th style="background-color: rgba(46, 46, 77, 0.30); color: #2E2E4D;border: 0px solid black;
                                    border-radius: 5px;">Seri Data Logger</th>
                            @for ($i = 0; $i < 3; $i++)
                                <td style="background-color: rgba(46, 46, 77, 0.30); color: #2E2E4D;border: 0px solid black;
                                    border-radius: 5px;">
                                    @if (!empty($seriLoggerList[$i]))
                                        @foreach ($seriLoggerList[$i] as $seri)
                                            <div>{{ $seri->seri_perangkat }}</div>
                                        @endforeach
                                    @else
                                        <div>-</div>
                                    @endif
                                </td>
                            @endfor
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allLoggerKategoriList as $kategori => $judulSpesifikasi)
                            <tr style="border-style:none;">
                                <th colspan="4" style="text-align: center; background-color: #2E2E4D; color: white;border: 0px solid black;
                                    border-radius: 5px;">
                                    {{ $kategori }}
                                </th>
                            </tr>
                            @foreach ($judulSpesifikasi as $judul => $_)
                                <tr style="border-style:none;">
                                    <td style="background-color: {{ $loop->index % 2 == 0 ? 'rgba(46, 46, 77, 0.30)' : 'rgba(210, 210, 219, 0.30)' }}; color: #2E2E4D;border: 0px solid black;
                                    border-radius: 5px;">{{ $judul }}</td>
                                    @for ($i = 0; $i < 3; $i++)
                                        <td style="background-color: {{ $loop->index % 2 == 0 ? 'rgba(210, 210, 219, 0.30)' : 'rgba(46, 46, 77, 0.15)' }}; color: #2E2E4D;border: 0px solid black;
                                    border-radius: 5px;">
                                            @if (!empty($seriLoggerList[$i]))
                                                @php
                                                    $deskripsi = '-';
                                                    foreach ($seriLoggerList[$i] as $seri) {
                                                        if (isset($spesifikasiLogger[$seri->id][$kategori][$judul])) {
                                                            $deskripsi = $spesifikasiLogger[$seri->id][$kategori][$judul];
                                                            break;
                                                        }
                                                    }
                                                @endphp
                                                <div class="deskripsi-bandingkanperangkat">{!! $deskripsi !!}</div>
                                            @else
                                                -
                                            @endif
                                        </td>
                                    @endfor
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                    <tr style="border-style:none;">
                        <td colspan="2" style="border: 0px solid black;"><h4>Spesifikasi Sensor</h4></td>
                    </tr>
                    <thead>
                        <tr style="border-style:none;">
                            <th style="background-color: rgba(46, 46, 77, 0.30); color: #2E2E4D;border: 0px solid black;
                                    border-radius: 5px;">Jenis Sensor</th>
                            @for ($i = 0; $i < 3; $i++)
                                <td style="background-color: rgba(46, 46, 77, 0.30); color: #2E2E4D;border: 0px solid black;
                                    border-radius: 5px;border-style:none;">
                                    @if (!empty($seriSensorList[$i]))
                                        @foreach ($seriSensorList[$i] as $seri)
                                            <div>{{ $seri->seri_perangkat }}</div>
                                        @endforeach
                                    @else
                                        <div>-</div>
                                    @endif
                                </td>
                            @endfor
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allSensorKategoriList as $kategori => $judulSpesifikasi)
                                <tr style="border-style:none;">
                                    <th colspan="4" style="text-align: center; background-color: #2E2E4D; color: white;border: 0px solid black;border-radius: 5px;">
                                        {{ $kategori }}
                                    </th>
                                </tr>
                                @foreach ($judulSpesifikasi as $judul => $_)
                                <tr style="border-style:none;">
                                    <td style="background-color: {{ $loop->index % 2 == 0 ? 'rgba(46, 46, 77, 0.30)' : 'rgba(210, 210, 219, 0.30)' }};color: #2E2E4D;border: 0px solid black;border-radius: 5px;">{{ $judul }}</td>
                                    @for ($i = 0; $i < 3; $i++)
                                        <td style="background-color: {{ $loop->index % 2 == 0 ? 'rgba(210, 210, 219, 0.30)' : 'rgba(46, 46, 77, 0.15)' }}; color: #2E2E4D;border: 0px solid black;border-radius: 5px;">
                                            @if (!empty($seriSensorList[$i]))
                                                @php
                                                    $deskripsi = '-';
                                                    foreach ($seriSensorList[$i] as $seri) {
                                                        if (isset($spesifikasiSensor[$seri->id][$kategori][$judul])) {
                                                            $deskripsi = $spesifikasiSensor[$seri->id][$kategori][$judul];
                                                            break;
                                                        }
                                                    }
                                                @endphp
                                                <div class="deskripsi-bandingkanperangkat">{!! $deskripsi !!}</div>
                                            @else
                                                -
                                            @endif
                                        </td>
                                    @endfor
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>


                {{-- <h3>Spesifikasi Sensor</h3>
                <!-- Tabel untuk Sensor -->
                <table class="table table-bordered rounded-3 overflow-hidden">

                </table> --}}
            </div>
        </div>

    </div>

</section>
<!-- team-area-end -->
{{-- <script>
    // Inisialisasi Swiper
    document.addEventListener('DOMContentLoaded', () => {
        new Swiper('.subsolusi-active', {
            slidesPerView: 3,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            breakpoints: {
                640: { slidesPerView: 2 },
                768: { slidesPerView: 3 },
                1024: { slidesPerView: 5 },
            }
        });
    });
</script> --}}
<script>
    function setActiveSlide(selectedSlide) {
        // Hapus class active-slide dari semua swiper-slide
        document.querySelectorAll('.swiper-slide').forEach(slide => {
            slide.classList.remove('active-slide');
        });

        // Tambahkan class active-slide ke slide yang diklik
        selectedSlide.classList.add('active-slide');
    }
</script>
<script>
    function initSwiper() {
        new Swiper('.subsolusi-active', {
            slidesPerView: 2,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            breakpoints: {
                640: { slidesPerView: 2 },
                768: { slidesPerView: 3 },
                1024: { slidesPerView: 5 },
            }
        });
    }

    document.addEventListener('DOMContentLoaded', initSwiper);

    Livewire.hook('message.processed', (message, component) => {
        initSwiper(); // Re-inisialisasi Swiper setelah Livewire merender ulang
    });
</script>
