@foreach ($carousels as $item)
<div class="modal fade" id="editCarouselModal{{ $item->id }}" tabindex="-1" aria-labelledby="editCarouselModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCarouselModalLabel{{ $item->id }}">Edit Carousel</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('carousel.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="judul{{ $item->id }}" class="form-label">Judul</label>
                        <textarea name="judul" class="form-control" id="judul{{ $item->id }}" rows="3">{{ $item->judul }}</textarea>
                        @error('judul')
                            <p class="text-danger text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="sub_judul{{ $item->id }}" class="form-label">Sub Judul</label>
                        <textarea class="form-control" name="sub_judul" id="sub_judul{{ $item->id }}" rows="3">{{ $item->sub_judul }}</textarea>
                        @error('sub_judul')
                            <p class="text-danger text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="gambar{{ $item->id }}" class="form-label">Gambar</label>
                        @if ($item->gambar)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="Image" style="width: 100px; height: auto;">
                            </div>
                        @endif
                        <div class="input-group mb-1">
                            <input type="file" class="form-control" name="gambar" id="gambar{{ $item->id }}" aria-describedby="inputGroupFileAddon04" accept=".png, .jpg, .jpeg, .webp">
                        </div>
                        @error('gambar')
                            <p class="text-danger text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').html(fileName);
    });
</script>
