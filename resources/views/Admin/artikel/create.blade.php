@extends('adminlte.layouts.app')
@section('title', 'Tambah Artikel | BE Profile')
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
    <div class="content-wrapper">
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Artikel</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a style="text-decoration: none;" href="/admin/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item"><a style="text-decoration: none;" href="/admin/artikel">Artikel</a></li>
                    <li class="breadcrumb-item active">Tambah Artikel</li>
                    </ol>
                </div>
            </div>
        </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg">
                        @include('sweetalert::alert')
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 ml-auto">
                                            <label for="judul" class="form-label">Judul</label>
                                            <input name="judul" class="form-control mb-1" id="judul" rows="3" {{ old('judul') }}>
                                            @error('judul')
                                                <p class="text-red-500 text-sm mt-1 error-message">{{ $message }}</p>
                                            @enderror

                                            <label for="kategori_topik_id" class="form-label">Kategori Topik</label>
                                            <div class="input-group mb-1">
                                                <select name="kategori_topik_id" class="custom-select" id="kategori_topik_id">
                                                    <option selected disabled>Pilih Topik...</option>
                                                    @foreach ($kategori_topiks as $topik)
                                                        <option value="{{ $topik->id }}" {{ old('kategori_topik_id') == $topik->id ? 'selected' : '' }}>{{ $topik->nama }}</option>
                                                    @endforeach
                                                </select>
                                                @error('kategori_topik_id')
                                                    <p class="text-danger text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="gambar" class="mr-3">Upload gambar slider</label>
                                                <div class="input-group mb-1">
                                                    <input type="file" class="form-control" name="gambar[]" id="gambar" multiple accept=".png, .jpg, .jpeg">
                                                </div>
                                                <div class="image-preview" id="imagePreview"></div>
                                                @error('gambar')
                                                    <p class="text-danger text-sm mt-1 error-message">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="thumbnail" class="form-label">Thumbnail</label>
                                                <div class="input-group mb-1">
                                                    <input type="file" class="form-control" name="thumbnail" id="thumbnail" aria-describedby="inputGroupFileAddon04" accept=".png, .jpg, .jpeg, .svg">
                                                </div>
                                                @error('thumbnail')
                                                    <p class="text-red-500 text-sm mt-1 error-message">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="status" class="form-label">Status Upload</label>
                                                <div class="input-group mb-1">
                                                    <select name="status" class="custom-select" id="status">
                                                        <option selected disabled>Pilih Status...</option>
                                                        <option value="draft" {{ old('status') ? 'selected' : '' }}>Draft</option>
                                                        <option value="published" {{ old('status') ? 'selected' : '' }}>Published</option>
                                                        <option value="archived" {{ old('status') ? 'selected' : '' }}>Archived</option>
                                                    </select>
                                                </div>
                                                @error('status')
                                                    <p class="text-danger text-sm mt-1 error-message">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <label for="konten" class="form-label">Konten</label>
                                            <textarea class="ckeditor form-control" name="konten" id="konten" rows="3">{{ old('konten') }}</textarea>
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
    </div>
    <script>
        $(document).ready(function() {
            let selectedFiles = [];

            $('#gambar').on('change', function() {
                const newFiles = Array.from(this.files);
                selectedFiles = newFiles;
                renderPreview();
            });

            window.removeImage = function(index) {
                selectedFiles.splice(index, 1);
                renderPreview();
            };

            function renderPreview() {
                $('#imagePreview').html('');
                selectedFiles.forEach((file, index) => {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        $('#imagePreview').append(`
                            <div class="preview-item" data-index="${index}">
                                <img src="${event.target.result}" alt="Selected Image">
                                <button type="button" class="remove-btn" onclick="removeImage(${index})">x</button>
                            </div>
                        `);
                    };
                    reader.readAsDataURL(file);
                });
            }

            $('#uploadForm').on('submit', function(event) {
                event.preventDefault();
                let formData = new FormData();
                selectedFiles.forEach((file) => {
                    formData.append('gambar[]', file);
                });

                $.ajax({
                    url: '{{ route('artikel.store') }}',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        alert('Files uploaded successfully');
                    },
                    error: function(error) {
                        alert('Error uploading files');
                    }
                });
            });
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
@endsection


