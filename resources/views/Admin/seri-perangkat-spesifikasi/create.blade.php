<div class="modal fade" id="tambahModelSeriPerangkatSpesifikasi" tabindex="-1" aria-labelledby="tambahModelSeriPerangkatSpesifikasiLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModelSeriPerangkatSpesifikasiLabel">Tambah Seri Perangkat Spesifikasi</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('seri-perangkat-spesifikasi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="seri_perangkat_id" class="form-label">Seri Perangkat</label>
                        <div class="input-group mb-1">
                            <select name="seri_perangkat_id" class="custom-select" id="seri_perangkat_id">
                                <option selected disabled>Pilih Perangkat...</option>
                                @foreach ($seriPerangkatBahan as $spesifikasi)
                                <option value="{{ $spesifikasi->id }}" {{ old('seri_perangkat_id') == $spesifikasi->id ? 'selected' : '' }}>
                                    {{ $spesifikasi->seri_perangkat }}
                                </option>
                                @endforeach
                            </select>
                            @error('seri_perangkat_id')
                                <p class="text-danger text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="spesifikasi_id" class="form-label">Spesifikasi</label>
                        <div class="input-group mb-1">
                            <select name="spesifikasi_id" class="custom-select" id="spesifikasi_id">
                                <option selected disabled>Pilih Spesifikasi...</option>
                                @foreach ($Spesifikasi as $spesifikasi)
                                <option value="{{ $spesifikasi->id }}" {{ old('spesifikasi_id') == $spesifikasi->id ? 'selected' : '' }}>
                                    {{ optional($spesifikasi->dataKategoriSpesifikasi)->nama_kategori }} | {{ $spesifikasi->judul }}
                                </option>
                                @endforeach
                            </select>
                            @error('spesifikasi_id')
                                <p class="text-danger text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="ckeditor form-control" name="deskripsi" id="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
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
