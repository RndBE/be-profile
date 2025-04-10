<div class="modal fade" id="tambahModelInstagramToken" tabindex="-1" aria-labelledby="tambahModelInstagramTokenLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModelInstagramTokenLabel">Tambah Instagram Token</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('instagram-token.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="access_token" class="form-label">Akses Token</label>
                        <textarea name="access_token" class="form-control" id="access_token" rows="3">{{ old('access_token') }}</textarea>
                        @error('access_token')
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
<script>
    setTimeout(function() {
        const errorMessages = document.querySelectorAll('.error-message');
        errorMessages.forEach(function(message) {
            message.style.display = 'none';
        });
    }, 3000);
</script>
