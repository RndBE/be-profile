@foreach ($fitursubsolutionss as $item)
<div class="modal fade" id="editFiturSubSolusiModal{{ $item->id }}" tabindex="-1" aria-labelledby="editFiturSubSolusiModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editFiturSubSolusiModalLabel{{ $item->id }}">Edit Fitur Sub Solusi</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('fitur-sub-solutions.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nama{{ $item->id }}" class="form-label">Nama</label>
                        <textarea name="nama" class="form-control" id="nama{{ $item->id }}" rows="3">{{ $item->nama }}</textarea>
                        @error('nama')
                            <p class="text-danger text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description{{ $item->id }}" class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="description" id="description{{ $item->id }}" rows="3">{{ $item->description }}</textarea>
                        @error('description')
                            <p class="text-danger text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="icon{{ $item->id }}" class="form-label">Icon</label>
                        @if ($item->icon)
                            <div class="mb-2" >
                                <img style="background-color: black; color: white;" src="{{ asset('storage/' . $item->icon) }}" alt="Image" style="width: 100px; height: auto;">
                            </div>
                        @endif
                        <div class="input-group mb-1">
                            <input type="file" class="form-control" name="icon" id="icon{{ $item->id }}" aria-describedby="inputGroupFileAddon04" accept=".png, .jpg, .jpeg">
                        </div>
                        @error('icon')
                            <p class="text-danger text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="sub_solution_id" class="form-label">Kategori Sub Solusi</label>
                        <div class="input-group mb-1">
                            <select name="sub_solution_id" class="custom-select" id="sub_solution_id">
                                <option selected disabled>Pilih Kategori Sub Solusi...</option>
                                @foreach ($subsolutions as $subsolusi)
                                    <option value="{{ $subsolusi->id }}" {{ old('sub_solution_id', $item->sub_solution_id) == $subsolusi->id ? 'selected' : '' }}>{{ $subsolusi->nama }}</option>
                                @endforeach
                            </select>
                            @error('sub_solution_id')
                                <p class="text-danger text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
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
