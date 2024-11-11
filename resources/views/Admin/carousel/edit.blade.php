@foreach ($carousels as $item)
<div class="modal fade" id="editCarouselModal{{ $item->id }}" tabindex="-1" aria-labelledby="editCarouselModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCarouselModalLabel{{ $item->id }}">Edit Carousel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="gambar" id="gambar{{ $item->id }}" accept=".png, .jpg, .jpeg">
                            <label class="custom-file-label" for="gambar{{ $item->id }}">Choose file</label>
                        </div>
                        @error('gambar')
                            <p class="text-danger text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
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
