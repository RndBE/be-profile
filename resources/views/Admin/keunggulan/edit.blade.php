@foreach ($keunggulan as $item)
<div class="modal fade" id="editKeunggulanModal{{ $item->id }}" tabindex="-1" aria-labelledby="editKeunggulanModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editKeunggulanModalLabel{{ $item->id }}">Edit Keunggulan</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('keunggulan.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="produk_id" class="form-label">Nama Produk</label>
                        <div class="input-group mb-1">
                            <select name="produk_id" class="custom-select" id="produk_id">
                                <option selected disabled>Pilih Produk</option>
                                @foreach ($produks as $produk)
                                    <option value="{{ $produk->id }}" {{ old('produk_id', $item->produk_id) == $produk->id ? 'selected' : '' }}>{{ $produk->nama_produk }}</option>
                                @endforeach
                            </select>
                            @error('produk_id')
                                <p class="text-danger text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="nama_keunggulan{{ $item->id }}" class="form-label">Keunggulan</label>
                        <input type="text" name="nama_keunggulan" class="form-control" id="nama_keunggulan{{ $item->id }}" value="{{ old('nama_keunggulan', $item->nama_keunggulan) }}">
                        @error('nama_keunggulan')
                            <p class="text-danger text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description{{ $item->id }}" class="form-label">Deskripsi</label>
                        <textarea class="ckeditor form-control" name="description" id="description{{ $item->id }}" rows="3">{{ $item->description }}</textarea>
                        @error('description')
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
