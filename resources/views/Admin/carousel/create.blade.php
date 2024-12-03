<div class="modal fade" id="tambahModelCarousel" tabindex="-1" aria-labelledby="tambahModelCarouselLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModelCarouselLabel">Tambah Carousel</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('carousel.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <textarea name="judul" class="form-control" id="judul" rows="3">{{ old('judul') }}</textarea>
                        @error('judul')
                            <p class="text-red-500 text-sm mt-1 error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="sub_judul" class="form-label">Sub Judul</label>
                        <textarea class="form-control" name="sub_judul" id="sub_judul" rows="3">{{ old('sub_judul') }}</textarea>
                        @error('sub_judul')
                            <p class="text-red-500 text-sm mt-1 error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <div class="input-group mb-1">
                            <input type="file" class="form-control" name="gambar" id="gambar" aria-describedby="inputGroupFileAddon04" accept=".png, .jpg, .jpeg">
                        </div>
                        @error('gambar')
                            <p class="text-red-500 text-sm mt-1 error-message">{{ $message }}</p>
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
<script>
    setTimeout(function() {
        const errorMessages = document.querySelectorAll('.error-message');
        errorMessages.forEach(function(message) {
            message.style.display = 'none';
        });
    }, 3000);
</script>
