<div>
    <!-- Search Form -->
    <div class="publikasi__search">
        <input type="text" wire:model.debounce.300ms="search" placeholder="Cari artikel atau kata kunci soal IT dan Telemetri">
        <button type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none">
                <path d="M19.0002 19.0002L14.6572 14.6572M14.6572 14.6572C15.4001 13.9143 15.9894 13.0324 16.3914 12.0618C16.7935 11.0911 17.0004 10.0508 17.0004 9.00021C17.0004 7.9496 16.7935 6.90929 16.3914 5.93866C15.9894 4.96803 15.4001 4.08609 14.6572 3.34321C13.9143 2.60032 13.0324 2.01103 12.0618 1.60898C11.0911 1.20693 10.0508 1 9.00021 1C7.9496 1 6.90929 1.20693 5.93866 1.60898C4.96803 2.01103 4.08609 2.60032 3.34321 3.34321C1.84288 4.84354 1 6.87842 1 9.00021C1 11.122 1.84288 13.1569 3.34321 14.6572C4.84354 16.1575 6.87842 17.0004 9.00021 17.0004C11.122 17.0004 13.1569 16.1575 14.6572 14.6572Z" stroke="currentcolor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>
    </div>

    <!-- List Artikel -->
    <div class="services-item-wrap mt-4">
        <div class="row">
            @forelse($artikels as $artikel)
                <div class="col-lg-4 col-md-6">
                    <div class="blog__post-two shine-animate-item w-100">
                        <div class="blog__post-thumb-two">
                            <a href="{{ route('artikel.show', $artikel->slug) }}" class="shine-animate">
                                <img src="{{ asset('storage/' . $artikel->thumbnail) }}" alt="{{ $artikel->judul }}">
                            </a>
                        </div>
                        <div class="blog__post-content-two">
                            <div class="blog-post-meta">
                                <ul class="list-wrap">
                                    <li>
                                        <a href="#" class="blog__post-tag-two">{{ $artikel->kategoriTopik->nama ?? '' }}</a>
                                    </li>
                                    <li>
                                        <img src="{{ asset('asset/img/icon/Calendar.png') }}" alt="Calendar Icon" style="width: 16px;">
                                        {{ \Carbon\Carbon::parse($artikel->tanggal_publikasi)->locale('id')->translatedFormat('l, d F Y') }}
                                    </li>
                                </ul>
                            </div>
                            <h2 class="title">
                                <a href="{{ route('artikel.show', $artikel->slug) }}">{{ $artikel->judul }}</a>
                            </h2>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p>Artikel tidak ditemukan.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
