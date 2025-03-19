<div class="modal fade" id="tambahModelSpesifikasi" tabindex="-1" aria-labelledby="tambahModelSpesifikasiLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModelSpesifikasiLabel">Tambah Spesifikasi</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('spesifikasi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="kategori_id" class="form-label">Nama Kategori Spesifikasi</label>
                    <div class="input-group mb-1">
                        <select name="kategori_id" class="custom-select" id="kategori_id">
                            <option selected disabled>Pilih Kategori Spesifikasi...</option>
                            @foreach ($kategoriSpesifikasi as $kategori)
                                <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            <p class="text-danger text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input name="judul" class="form-control" id="judul" rows="3" {{ old('judul') }}>
                        @error('judul')
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
