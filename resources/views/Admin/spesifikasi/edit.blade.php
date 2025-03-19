@foreach ($Spesifikasi as $item)
<div class="modal fade" id="editSpesifikasiModal{{ $item->id }}" tabindex="-1" aria-labelledby="editSpesifikasiModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSpesifikasiModalLabel{{ $item->id }}">Edit Spesifikasi</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('spesifikasi.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="kategori_id" class="form-label">Nama Kategori Spesifikasi</label>
                        <div class="input-group mb-1">
                            <select name="kategori_id" class="custom-select" id="kategori_id">
                                <option selected disabled>Pilih Kategori Spesifikasi</option>
                                @foreach ($kategoriSpesifikasi as $kategori)
                                    <option value="{{ $kategori->id }}" {{ old('kategori_id', $item->kategori_id) == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>
                                @endforeach
                            </select>
                            @error('kategori_id')
                                <p class="text-danger text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="judul{{ $item->id }}" class="form-label">Judul</label>
                        <input type="text" name="judul" class="form-control" id="judul{{ $item->id }}" value="{{ old('judul', $item->judul) }}">
                        @error('judul')
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
