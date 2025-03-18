<div class="modal fade" id="tambahModelSertifikasi" tabindex="-1" aria-labelledby="tambahModelSertifikasiLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModelSertifikasiLabel">Tambah Sertifikasi Atas</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('sertifikasi-atas.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="gambar_satu" class="form-label">Gambar Satu</label>
                        <div class="input-group mb-1">
                            <input type="file" class="form-control" name="gambar_satu" id="gambar_satu" aria-describedby="inputGroupFileAddon04" accept=".png, .jpg, .jpeg, .webp">
                        </div>
                        @error('gambar_satu')
                            <p class="text-red-500 text-sm mt-1 error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="gambar_dua" class="form-label">Gambar Dua</label>
                        <div class="input-group mb-1">
                            <input type="file" class="form-control" name="gambar_dua" id="gambar_dua" aria-describedby="inputGroupFileAddon04" accept=".png, .jpg, .jpeg, .webp">
                        </div>
                        @error('gambar_dua')
                            <p class="text-red-500 text-sm mt-1 error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="header" class="form-label">Header</label>
                        <input name="header" class="form-control mb-1" id="header" rows="3" {{ old('header') }}>
                        @error('header')
                            <p class="text-danger text-sm mt-1 error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="sub_header" class="form-label">Sub Header</label>
                        <input name="sub_header" class="form-control mb-1" id="sub_header" rows="3" {{ old('sub_header') }}>
                        @error('sub_header')
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
