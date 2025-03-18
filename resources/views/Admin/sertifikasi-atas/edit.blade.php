@foreach ($sertifikasi_atas as $item)
<div class="modal fade" id="editSertifikasiModal{{ $item->id }}" tabindex="-1" aria-labelledby="editSertifikasiModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSertifikasiModalLabel{{ $item->id }}">Edit Sertifikasi Atas</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('sertifikasi-atas.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @php
                        $gambarFields = [
                            'gambar_satu' => 'Gambar Satu',
                            'gambar_dua' => 'Gambar Dua',
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
                    <label for="header" class="form-label">Judul</label>
                    <input name="header" class="form-control mb-1" id="header" value="{{ old('header', $item->header) }}">
                    @error('header')
                        <p class="text-danger text-sm mt-1 error-message">{{ $message }}</p>
                    @enderror

                    <label for="sub_header" class="form-label">Sub Judul</label>
                    <input name="sub_header" class="form-control mb-1" id="sub_header" value="{{ old('sub_header', $item->sub_header) }}">
                    @error('sub_header')
                        <p class="text-danger text-sm mt-1 error-message">{{ $message }}</p>
                    @enderror

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
