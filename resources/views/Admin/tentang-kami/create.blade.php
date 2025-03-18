<div class="modal fade" id="tambahModelTentangKami" tabindex="-1" aria-labelledby="tambahModelTentangKamiLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModelTentangKamiLabel">Tambah Tentang Beacon</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('tentang-kami.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="gambar_satu" class="form-label">Gambar satu</label>
                        <div class="input-group mb-1">
                            <input type="file" class="form-control" name="gambar_satu" id="gambar_satu" aria-describedby="inputGroupFileAddon04" accept=".png, .jpg, .jpeg, .webp">
                        </div>
                        @error('gambar_satu')
                            <p class="text-red-500 text-sm mt-1 error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="gambar_dua" class="form-label">Gambar dua</label>
                        <div class="input-group mb-1">
                            <input type="file" class="form-control" name="gambar_dua" id="gambar_dua" aria-describedby="inputGroupFileAddon04" accept=".png, .jpg, .jpeg, .webp">
                        </div>
                        @error('gambar_dua')
                            <p class="text-red-500 text-sm mt-1 error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="gambar_direktur" class="form-label">Gambar direktur</label>
                        <div class="input-group mb-1">
                            <input type="file" class="form-control" name="gambar_direktur" id="gambar_direktur" aria-describedby="inputGroupFileAddon04" accept=".png, .jpg, .jpeg, .webp">
                        </div>
                        @error('gambar_direktur')
                            <p class="text-red-500 text-sm mt-1 error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="gambar_komisaris" class="form-label">Gambar komisaris</label>
                        <div class="input-group mb-1">
                            <input type="file" class="form-control" name="gambar_komisaris" id="gambar_komisaris" aria-describedby="inputGroupFileAddon04" accept=".png, .jpg, .jpeg, .webp">
                        </div>
                        @error('gambar_komisaris')
                            <p class="text-red-500 text-sm mt-1 error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="gambar_administrasi" class="form-label">Gambar Manager Administrasi</label>
                        <div class="input-group mb-1">
                            <input type="file" class="form-control" name="gambar_administrasi" id="gambar_administrasi" aria-describedby="inputGroupFileAddon04" accept=".png, .jpg, .jpeg, .webp">
                        </div>
                        @error('gambar_administrasi')
                            <p class="text-red-500 text-sm mt-1 error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="gambar_marketing" class="form-label">Gambar Manager Marketing</label>
                        <div class="input-group mb-1">
                            <input type="file" class="form-control" name="gambar_marketing" id="gambar_marketing" aria-describedby="inputGroupFileAddon04" accept=".png, .jpg, .jpeg, .webp">
                        </div>
                        @error('gambar_marketing')
                            <p class="text-red-500 text-sm mt-1 error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="gambar_hardware" class="form-label">Gambar Manager Hardware</label>
                        <div class="input-group mb-1">
                            <input type="file" class="form-control" name="gambar_hardware" id="gambar_hardware" aria-describedby="inputGroupFileAddon04" accept=".png, .jpg, .jpeg, .webp">
                        </div>
                        @error('gambar_hardware')
                            <p class="text-red-500 text-sm mt-1 error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="gambar_software" class="form-label">Gambar Manager Software</label>
                        <div class="input-group mb-1">
                            <input type="file" class="form-control" name="gambar_software" id="gambar_software" aria-describedby="inputGroupFileAddon04" accept=".png, .jpg, .jpeg, .webp">
                        </div>
                        @error('gambar_software')
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
