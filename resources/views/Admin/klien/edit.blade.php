@foreach ($kliens as $item)
<div class="modal fade" id="editKlienModal{{ $item->id }}" tabindex="-1" aria-labelledby="editKlienModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editKlienModalLabel{{ $item->id }}">Edit Klien</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('klien.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nama_perusahaan{{ $item->id }}" class="form-label">Nama Perusahaan</label>
                        <input type="text" name="nama_perusahaan" class="form-control" id="nama_perusahaan{{ $item->id }}" value="{{ old('nama_perusahaan', $item->nama_perusahaan) }}">
                        @error('nama_perusahaan')
                            <p class="text-danger text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="logo{{ $item->id }}" class="form-label">Logo</label>
                        @if ($item->logo)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $item->logo) }}" alt="Image" style="width: 100px; height: auto;">
                            </div>
                        @endif
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="logo" id="logo{{ $item->id }}" accept=".png, .jpg, .jpeg">
                            <label class="custom-file-label" for="logo{{ $item->id }}">Choose file</label>
                        </div>
                        @error('logo')
                            <p class="text-danger text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
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
