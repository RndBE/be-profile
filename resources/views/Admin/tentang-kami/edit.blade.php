@foreach ($tentangkami as $item)
<div class="modal fade" id="editTentangKamiModal{{ $item->id }}" tabindex="-1" aria-labelledby="editTentangKamiModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTentangKamiModalLabel{{ $item->id }}">Edit Tentang Kami</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('tentang-kami.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @php
                        $gambarFields = [
                            'gambar_satu' => 'Gambar Satu',
                            'gambar_dua' => 'Gambar Dua',
                            'gambar_direktur' => 'Gambar Direktur',
                            'gambar_komisaris' => 'Gambar Komisaris',
                            'gambar_administrasi' => 'Gambar Administrasi',
                            'gambar_marketing' => 'Gambar Marketing',
                            'gambar_hardware' => 'Gambar Hardware',
                            'gambar_software' => 'Gambar Software'
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
