<div class="modal fade" id="tambahModelFiturSubSolution" tabindex="-1" aria-labelledby="tambahModelFiturSubSolutionLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModelFiturSubSolutionLabel">Tambah Fitur Sub Solusi</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('fitur-sub-solutions.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Fitur</label>
                        <input name="nama" class="form-control" id="nama" rows="3">
                        @error('nama')
                            <p class="text-red-500 text-sm mt-1 error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="description" id="description" rows="3">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-sm mt-1 error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="icon" class="form-label">Icon</label>
                        <div class="input-group mb-1">
                            <input type="file" class="form-control" name="icon" id="icon" aria-describedby="inputGroupFileAddon04" accept=".png, .jpg, .jpeg">
                        </div>
                        @error('icon')
                            <p class="text-red-500 text-sm mt-1 error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    <label for="sub_solution_id" class="form-label">Kategori Sub Solusi</label>
                    <div class="input-group mb-1">
                        <select name="sub_solution_id" class="custom-select" id="sub_solution_id">
                            <option selected disabled>Pilih Sub Solusi...</option>
                            @foreach ($subsolutions as $subsolusi)
                                <option value="{{ $subsolusi->id }}" {{ old('sub_solution_id') == $subsolusi->id ? 'selected' : '' }}>{{ $subsolusi->nama }}</option>
                            @endforeach
                        </select>
                        @error('sub_solution_id')
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
<script>
    setTimeout(function() {
        const errorMessages = document.querySelectorAll('.error-message');
        errorMessages.forEach(function(message) {
            message.style.display = 'none';
        });
    }, 3000);
</script>
