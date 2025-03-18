<div class="modal fade" id="tambahModelTentangKami" tabindex="-1" aria-labelledby="tambahModelTentangKamiLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModelTentangKamiLabel">Tambah Sertifikasi</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('sertifikasi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <div class="input-group mb-1">
                            <input type="file" class="form-control" name="gambar" id="gambar" aria-describedby="inputGroupFileAddon04" accept=".png, .jpg, .jpeg, .webp">
                        </div>
                        @error('gambar')
                            <p class="text-red-500 text-sm mt-1 error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="icon" class="form-label">Icon</label>
                        <div class="input-group mb-1">
                            <input type="file" class="form-control" name="icon" id="icon" aria-describedby="inputGroupFileAddon04" accept=".png, .jpg, .jpeg, .webp">
                        </div>
                        @error('icon')
                            <p class="text-red-500 text-sm mt-1 error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul</label>
                        <input name="title" class="form-control mb-1" id="title" rows="3" {{ old('title') }}>
                        @error('title')
                            <p class="text-danger text-sm mt-1 error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="sub_title" class="form-label">Sub Judul</label>
                        <input name="sub_title" class="form-control mb-1" id="sub_title" rows="3" {{ old('sub_title') }}>
                        @error('sub_title')
                            <p class="text-danger text-sm mt-1 error-message">{{ $message }}</p>
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
