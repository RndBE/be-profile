@extends('adminlte.layouts.app')
@section('title', 'Edit Artikel | BE Profile')
@section('content')
    <style>
        .image-preview {
            display: flex;
            flex-wrap: wrap;
            gap: 25px;
            margin-top: 10px;
        }

        .image-preview .preview-item {
            position: relative;
            display: inline-block;
        }

        .image-preview img {
            max-width: 80px;
            height: auto;
            object-fit: contain;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .remove-btn {
            position: absolute;
            top: 1px;
            right: -10px;
            background-color: rgba(255, 0, 0, 0.7);
            color: white;
            border: none;
            border-radius: 50%;
            width: 25px;
            height: 25px;
            cursor: pointer;
            font-size: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
        <div class="app-content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Artikel</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a style="text-decoration: none;" href="/admin/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item"><a style="text-decoration: none;" href="/admin/artikel">Artikel</a></li>
                    <li class="breadcrumb-item active">Edit Artikel</li>
                    </ol>
                </div>
            </div>
        </div>
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg">
                        @include('sweetalert::alert')
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('artikel.update', $artikels->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-12 ml-auto">
                                            <label for="judul" class="form-label">Judul</label>
                                            <input name="judul" class="form-control mb-1" id="judul" rows="3" value="{{ old('judul', $artikels->judul) }}">
                                            @error('judul')
                                                <p class="text-red-500 text-sm mt-1 error-message">{{ $message }}</p>
                                            @enderror

                                            <label for="kategori_topik_id" class="form-label">Kategori Topik</label>
                                            <div class="input-group mb-1">
                                                <select name="kategori_topik_id" class="custom-select" id="kategori_topik_id">
                                                    <option selected disabled>Pilih Topik...</option>
                                                    @foreach ($kategoriTopik as $topik)
                                                        <option value="{{ $topik->id }}" {{ old('kategori_topik_id', $artikels->kategori_topik_id) == $topik->id ? 'selected' : '' }}>{{ $topik->nama }}</option>
                                                    @endforeach
                                                </select>
                                                @error('kategori_topik_id')
                                                    <p class="text-danger text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="gambar" class="mr-3">Upload gambar</label>
                                                <div class="input-group mb-1">
                                                    <input type="file" class="form-control" name="gambar[]" id="gambar" multiple accept=".png, .jpg, .jpeg">
                                                </div>

                                                <div class="image-preview" id="imagePreview">
                                                    @if($artikels->gambar && $artikels->gambar->isNotEmpty())
                                                        @foreach ($artikels->gambar as $image)
                                                            <div class="preview-item existing-image" data-id="{{ $image->id }}">
                                                                <img src="{{ asset('storage/' . $image->gambar) }}" alt="Existing Image">
                                                                <button type="button" class="remove-btn" onclick="removeExistingImage({{ $image->id }})">x</button>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <p>No images available.</p>
                                                    @endif
                                                </div>

                                                @error('gambar')
                                                    <p class="text-danger text-sm mt-1 error-message">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="thumbnail{{ $artikels->id }}" class="form-label">Thumbnail</label>
                                                @if ($artikels->thumbnail)
                                                    <div class="mb-2">
                                                        <img src="{{ asset('storage/' . $artikels->thumbnail) }}" alt="Image" style="width: 100px; height: auto;">
                                                    </div>
                                                @endif
                                                <div class="input-group mb-1">
                                                    <input type="file" class="form-control" name="thumbnail" id="thumbnail{{ $artikels->id }}" aria-describedby="inputGroupFileAddon04" accept=".png, .jpg, .jpeg">
                                                </div>
                                                @error('thumbnail')
                                                    <p class="text-danger text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="status" class="form-label">Status Upload</label>
                                                <div class="input-group mb-1">
                                                    <select name="status" class="custom-select" id="status">
                                                        <option disabled>Pilih Status...</option>
                                                        <option value="draft" {{ old('status', $artikels->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                                                        <option value="published" {{ old('status', $artikels->status) == 'published' ? 'selected' : '' }}>Published</option>
                                                        <option value="archived" {{ old('status', $artikels->status) == 'archived' ? 'selected' : '' }}>Archived</option>
                                                    </select>
                                                </div>
                                                @error('status')
                                                    <p class="text-danger text-sm mt-1 error-message">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <label for="konten" class="form-label">Konten</label>
                                            <textarea class="ckeditor form-control" name="konten" id="konten" rows="3">{{ old('konten', $artikels->konten) }}</textarea>
                                            @error('konten')
                                                <p class="text-red-500 text-sm mt-1 error-message">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer mt-2">
                                        <a href="{{ route('artikel.index') }}" class="btn btn-danger">Kembali</a>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script src="https://cdn.ckeditor.com/4.20.0/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace('konten', {
        filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token() ]) }}",
        filebrowserUploadMethod: 'form'
    });
</script>

    <script>
        setTimeout(function() {
            const errorMessages = document.querySelectorAll('.error-message');
            errorMessages.forEach(function(message) {
                message.style.display = 'none';
            });
        }, 3000);
    </script>
    <script>
        let selectedFiles = [];
        let deletedImages = [];
        let existingImages = [...document.querySelectorAll('.existing-image')].map(function(item) {
            return item.dataset.id;
        });
        function removeExistingImage(imageId) {
            $.ajax({
                url: '{{ route('artikel.remove-image', $artikels->id) }}',
                type: 'DELETE',
                data: {
                    image_id: imageId,
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    if (response.success) {
                        deletedImages.push(imageId);
                        document.querySelector(`.preview-item[data-id="${imageId}"]`).remove();
                        existingImages = existingImages.filter(id => id !== imageId.toString());
                    } else {
                        alert('Error: ' + response.message);
                    }
                },
                error: function() {
                    alert('Error deleting image');
                }
            });
        }

        $('#gambar').on('change', function() {
            const newFiles = Array.from(this.files);
            selectedFiles = selectedFiles.concat(newFiles);
            renderPreview();
        });

        window.removeImage = function(index) {
            selectedFiles.splice(index, 1);
            renderPreview();
        };

        function renderPreview() {
            $('#imagePreview').html('');

            existingImages.forEach(imageId => {
                if (!deletedImages.includes(imageId)) {
                    let imagePath = document.querySelector(`.existing-image[data-id="${imageId}"] img`).src;
                    $('#imagePreview').append(`
                        <div class="preview-item existing-image" data-id="${imageId}">
                            <img src="${imagePath}" alt="Existing Image">
                            <button type="button" class="remove-btn" onclick="removeExistingImage(${imageId})">x</button>
                        </div>
                    `);
                }
            });

            selectedFiles.forEach((file, index) => {
                let reader = new FileReader();
                reader.onload = function(event) {
                    $('#imagePreview').append(`
                        <div class="preview-item">
                            <img src="${event.target.result}" alt="New Image">
                            <button type="button" class="remove-btn" onclick="removeImage(${index})">x</button>
                        </div>
                    `);
                };
                reader.readAsDataURL(file);
            });
        }

        $('#uploadForm').on('submit', function(event) {
            event.preventDefault();
            let formData = new FormData(this);
            selectedFiles.forEach(file => {
                formData.append('gambar[]', file);
            });
            $.ajax({
                url: '{{ route('artikel.update', $artikels->id) }}',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    alert('Files uploaded successfully');
                    window.location.reload();
                },
                error: function(error) {
                    alert('Error uploading files');
                }
            });
        });
    </script>
@endsection


