@foreach ($iklans as $item)
<div class="modal fade" id="editIklanModal{{ $item->id }}" tabindex="-1" aria-labelledby="editIklanModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editIklanModalLabel{{ $item->id }}">Edit Poster Iklan</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('iklan.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @php
                        $gambarFields = [
                            'gambar' => 'Gambar',
                        ];
                    @endphp

                    @foreach ($gambarFields as $field => $label)
                        <div class="mb-3">
                            <label for="{{ $field }}" class="form-label">{{ $label }}</label>
                            @if ($item->$field)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $item->$field) }}" alt="Image" style="width: 100px; height: auto;">
                                </div>
                            @endif
                            <div class="input-group mb-1">
                                <input type="file" class="form-control" name="{{ $field }}" id="{{ $field }}" accept=".png, .jpg, .jpeg, .webp">
                            </div>
                            @error($field)
                                <p class="text-danger text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    @endforeach
                    <label for="judul" class="form-label">Judul</label>
                    <input name="judul" class="form-control mb-1" id="judul" value="{{ old('judul', $item->judul) }}">
                    @error('judul')
                        <p class="text-danger text-sm mt-1 error-message">{{ $message }}</p>
                    @enderror

                    <label for="url" class="form-label">URL</label>
                    <input name="url" class="form-control mb-1" id="url" value="{{ old('url', $item->url) }}">
                    @error('url')
                        <p class="text-danger text-sm mt-1 error-message">{{ $message }}</p>
                    @enderror

                    <div class="mb-3">
                        <label for="posisi" class="form-label">Posisi/Letak Poster</label>
                        <div class="input-group mb-1">
                            <select name="posisi" class="custom-select" id="posisi">
                                <option disabled>Pilih Posisi/Letak...</option>
                                <option value="halaman_artikel_atas" {{ old('posisi', $item->posisi) == 'halaman_artikel_atas' ? 'selected' : '' }}>Halaman Artikel Atas</option>
                                <option value="halaman_artikel_bawah" {{ old('posisi', $item->posisi) == 'halaman_artikel_bawah' ? 'selected' : '' }}>Halaman Artikel Bawah</option>
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
                                <option disabled>Pilih Status...</option>
                                <option value="aktif" {{ old('status', $item->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="nonaktif" {{ old('status', $item->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
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
@endforeach
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').html(fileName);
    });
</script>
