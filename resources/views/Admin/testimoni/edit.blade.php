@foreach ($testimonis as $item)
<div class="modal fade" id="editTestimoniModal{{ $item->id }}" tabindex="-1" aria-labelledby="editTestimoniModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTestimoniModalLabel{{ $item->id }}">Edit Testimoni</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('testimoni.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Specifies that this is an update request -->

                    <div class="mb-3">
                        <label for="nama_user" class="form-label">Nama User</label>
                        <input name="nama_user" class="form-control" id="nama_user" value="{{ old('nama_user', $item->nama_user) }}">
                        @error('nama_user')
                            <p class="text-red-500 text-sm mt-1 error-message">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <input name="jabatan" class="form-control" id="jabatan" value="{{ old('jabatan', $item->jabatan) }}">
                        @error('jabatan')
                            <p class="text-red-500 text-sm mt-1 error-message">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="projek_id" class="form-label">Pilih Projek</label>
                        <div class="input-group mb-3">
                            <select name="projek_id" class="form-select" id="projek_id">
                                <option value="" disabled>Pilih Projek</option>
                                @foreach($projects as $project)
                                    <option value="{{ $project->id }}"
                                            {{ old('projek_id', $item->projek_id) == $project->id ? 'selected' : '' }}>
                                        {{ $project->nama_projek }}
                                    </option>
                                @endforeach
                            </select>
                            @error('projek_id')
                                <p class="text-red-500 text-sm mt-1 error-message">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="brosur" class="form-label">Brosur</label>
                        <div class="input-group mb-1">
                            <input type="file" class="form-control" name="brosur" id="brosur">
                        </div>
                        @error('brosur')
                            <p class="text-red-500 text-sm mt-1 error-message">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="testimoni" class="form-label">Testimoni</label>
                        <textarea name="testimoni" class="form-control" id="testimoni" rows="3">{{ old('testimoni', $item->testimoni) }}</textarea>
                        @error('testimoni')
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
@endforeach
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').html(fileName);
    });
</script>
