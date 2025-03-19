<div class="modal fade" id="tambahModelSeriPerangkat" tabindex="-1" aria-labelledby="tambahModelSeriPerangkatLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModelSeriPerangkatLabel">Tambah Komponen</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('seri-perangkat.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="seri_perangkat" class="form-label">Nama Perangkat</label>
                        <input name="seri_perangkat" class="form-control mb-1" id="seri_perangkat" rows="3" {{ old('seri_perangkat') }}>
                        @error('seri_perangkat')
                            <p class="text-danger text-sm mt-1 error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="gambar1" class="form-label">Gambar 1</label>
                        <div class="input-group mb-1">
                            <input type="file" class="form-control" name="gambar1" id="gambar1" aria-describedby="inputGroupFileAddon04" accept=".png, .jpg, .jpeg">
                        </div>
                        @error('gambar1')
                            <p class="text-red-500 text-sm mt-1 error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="gambar2" class="form-label">Gambar 2</label>
                        <div class="input-group mb-1">
                            <input type="file" class="form-control" name="gambar2" id="gambar2" aria-describedby="inputGroupFileAddon04" accept=".png, .jpg, .jpeg">
                        </div>
                        @error('gambar2')
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
