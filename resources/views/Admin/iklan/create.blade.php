<div class="modal fade" id="tambahModelIklan" tabindex="-1" aria-labelledby="tambahModelIklanLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModelIklanLabel">Tambah Poster Iklan</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('iklan.store') }}" method="POST" enctype="multipart/form-data">
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
                        <label for="judul" class="form-label">Judul</label>
                        <input name="judul" class="form-control mb-1" id="judul" rows="3" {{ old('judul') }}>
                        @error('judul')
                            <p class="text-danger text-sm mt-1 error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="url" class="form-label">URL</label>
                        <input name="url" class="form-control mb-1" id="url" rows="3" {{ old('url') }}>
                        @error('url')
                            <p class="text-danger text-sm mt-1 error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="posisi" class="form-label">Posisi/Letak Poster</label>
                        <div class="input-group mb-1">
                            <select name="posisi" class="custom-select" id="posisi">
                                <option selected disabled>Pilih Posisi/Letak...</option>
                                <option value="halaman_artikel_atas" {{ old('posisi') ? 'selected' : '' }}>Halaman Artikel Atas</option>
                                <option value="halaman_artikel_bawah" {{ old('posisi') ? 'selected' : '' }}>Halaman Artikel Bawah</option>
                            </select>
                        </div>
                        @error('posisi')
                            <p class="text-danger text-sm mt-1 error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <div class="input-group mb-1">
                            <select name="status" class="custom-select" id="status">
                                <option selected disabled>Pilih Status...</option>
                                <option value="aktif" {{ old('status') ? 'selected' : '' }}>Aktif</option>
                                <option value="nonaktif" {{ old('status') ? 'selected' : '' }}>Nonaktif</option>
                            </select>
                        </div>
                        @error('status')
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
