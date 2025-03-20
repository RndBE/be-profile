@foreach ($seriPerangkat as $item)
<div class="modal fade" id="editSeriPerangkatModal{{ $item->id }}" tabindex="-1" aria-labelledby="editSeriPerangkatModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSeriPerangkatModalLabel{{ $item->id }}">Edit Seri Perangkat</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('seri-perangkat.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="seri_perangkat" class="form-label">Nama Perangkat</label>
                        <input name="seri_perangkat" class="form-control mb-1" id="seri_perangkat" value="{{ old('seri_perangkat', $item->seri_perangkat) }}">
                        @error('seri_perangkat')
                            <p class="text-danger text-sm mt-1 error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jenis" class="form-label">Jenis</label>
                        <div class="input-group mb-1">
                            <select name="jenis" class="custom-select" id="jenis">
                                <option disabled>Pilih Jenis...</option>
                                <option value="Logger" {{ old('jenis', $item->jenis) == 'Logger' ? 'selected' : '' }}>Logger</option>
                                <option value="Sensor" {{ old('jenis', $item->jenis) == 'Sensor' ? 'selected' : '' }}>Sensor</option>
                            </select>
                        </div>
                        @error('jenis')
                            <p class="text-danger text-sm mt-1 error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="gambar1{{ $item->id }}" class="form-label">Gambar 1</label>
                        @if ($item->gambar1)
                            <div class="mb-2" >
                                <img src="{{ asset('storage/' . $item->gambar1) }}" alt="Image" style="max-width: 400px; height: auto;">
                            </div>
                        @endif
                        <div class="input-group mb-1">
                            <input type="file" class="form-control" name="gambar1" id="gambar1{{ $item->id }}" aria-describedby="inputGroupFileAddon04" accept=".png, .jpg, .jpeg">
                        </div>
                        @error('gambar1')
                            <p class="text-danger text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="gambar2{{ $item->id }}" class="form-label">Gambar 2</label>
                        @if ($item->gambar2)
                            <div class="mb-2" >
                                <img src="{{ asset('storage/' . $item->gambar2) }}" alt="Image" style="max-width: 400px; height: auto;">
                            </div>
                        @endif
                        <div class="input-group mb-1">
                            <input type="file" class="form-control" name="gambar2" id="gambar2{{ $item->id }}" aria-describedby="inputGroupFileAddon04" accept=".png, .jpg, .jpeg">
                        </div>
                        @error('gambar2')
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
