<section class="blog__area">
    <div class="container">
        <div class="blog__inner-wrap">
            <div class="row">
                <div class="col-70">
                    <div class="blog-post-wrap">
                        <div class="row gutter-24">
                            @foreach($projeks as $projek)
                            <div class="col-md-6">
                                <div class="blog-post-item">
                                    <div class="project-thumb-blog">
                                        <a href="{{ route('proyek.show', Str::slug($projek->nama_projek)) }}">
                                            <img src="{{ asset('storage/' . $projek->thumbnail) }}" alt="">
                                        </a>
                                    </div>
                                    <div class="blog-post-content">
                                        <div class="left-side-content">
                                            <h4 class="title">
                                                <a href="{{ route('proyek.show', Str::slug($projek->nama_projek)) }}">{{ $projek->nama_projek }}</a>
                                            </h4>
                                            <span>Tahun {{ $projek->waktu }}</span>
                                        </div>
                                        <div class="link-arrow">
                                            <a href="{{ route('proyek.show', Str::slug($projek->nama_projek)) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 15" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M17.6293 3.27957C17.7117 2.80341 17.4427 2.34763 17.0096 2.17812C16.9477 2.15385 16.8824 2.13552 16.8144 2.12376L6.96081 0.419152C6.41654 0.325049 5.89911 0.689856 5.80491 1.23411C5.71079 1.77829 6.07564 2.29578 6.61982 2.38993L14.0946 3.68295L1.36574 12.6573C0.914365 12.9756 0.806424 13.5995 1.12467 14.0509C1.44292 14.5022 2.06682 14.6102 2.51819 14.2919L15.247 5.31753L13.954 12.7923C13.8598 13.3365 14.2247 13.854 14.7689 13.9482C15.3131 14.0422 15.8305 13.6774 15.9248 13.1332L17.6293 3.27957Z" fill="currentcolor" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        {{-- <div class="pagination-wrap mt-40">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination list-wrap">
                                    <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-double-left"></i></a></li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item next-page"><a class="page-link" href="#"><i class="fas fa-angle-double-right"></i></a>
                                    </li>
                                </ul>
                            </nav>
                        </div> --}}
                        <div class="pagination-wrap mt-40">
                            {{ $projeks->links() }}
                        </div>
                    </div>
                </div>
                <div class="col-30">
                    <aside class="blog__sidebar">
                        <div class="sidebar__widget sidebar__widget-two">
                            <div class="sidebar__search">
                                <form action="#">
                                    <input type="text" wire:model.live="search" placeholder="Cari daerah, mitra, atau perangkat...">
                                    <button type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none">
                                            <path d="M19.0002 19.0002L14.6572 14.6572M14.6572 14.6572C15.4001 13.9143 15.9894 13.0324 16.3914 12.0618C16.7935 11.0911 17.0004 10.0508 17.0004 9.00021C17.0004 7.9496 16.7935 6.90929 16.3914 5.93866C15.9894 4.96803 15.4001 4.08609 14.6572 3.34321C13.9143 2.60032 13.0324 2.01103 12.0618 1.60898C11.0911 1.20693 10.0508 1 9.00021 1C7.9496 1 6.90929 1.20693 5.93866 1.60898C4.96803 2.01103 4.08609 2.60032 3.34321 3.34321C1.84288 4.84354 1 6.87842 1 9.00021C1 11.122 1.84288 13.1569 3.34321 14.6572C4.84354 16.1575 6.87842 17.0004 9.00021 17.0004C11.122 17.0004 13.1569 16.1575 14.6572 14.6572Z" stroke="currentcolor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="sidebar__widget">
                            <h4 class="sidebar__widget-title">Kategori</h4>
                            <div class="sidebar__cat-list">
                                <ul class="list-wrap">
                                    @foreach($categories as $category)
                                        <li>
                                            <a href="#" wire:click.prevent="$set('category', {{ $category->id }})">
                                                <i class="flaticon-arrow-button"></i>{{ $category->nama }} ({{ $category->projek_count }})
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar__widget">
                            <h4 class="sidebar__widget-title">Tags</h4>
                            <div class="sidebar__tag-list">
                                <ul class="list-wrap">
                                    @foreach($popularTags as $tag)
                                        <li>
                                            <a href="#" wire:click.prevent="$set('search', '{{ $tag->keyword }}')">
                                                {{ $tag->keyword }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
