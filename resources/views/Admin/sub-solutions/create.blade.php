@extends('adminlte.layouts.app')
@section('title', 'Tambah Sub Solutions | BE Profile')
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
                    <h1 class="m-0">Tambah Sub Solutions</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a style="text-decoration: none;" href="/admin/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item"><a style="text-decoration: none;" href="/admin/sub-solutions">Sub Solutions</a></li>
                    <li class="breadcrumb-item active">Tambah Sub Solutions</li>
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
                                <form action="{{ route('sub-solutions.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 ml-auto">
                                            <label for="nama" class="form-label">Nama</label>
                                            <input name="nama" class="form-control mb-1" id="nama" rows="3" {{ old('nama') }}>
                                            @error('nama')
                                                <p class="text-red-500 text-sm mt-1 error-message">{{ $message }}</p>
                                            @enderror

                                            <label for="solution_id" class="form-label">Kategori Solusi</label>
                                            <div class="input-group mb-1">
                                                <select name="solution_id" class="custom-select" id="solution_id">
                                                    <option selected disabled>Pilih Solusi...</option>
                                                    @foreach ($solutions as $solusi)
                                                        <option value="{{ $solusi->id }}" {{ old('solution_id') == $solusi->id ? 'selected' : '' }}>{{ $solusi->nama }}</option>
                                                    @endforeach
                                                </select>
                                                @error('solution_id')
                                                    <p class="text-danger text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <label for="video" class="form-label">Video</label>
                                            <input name="video" class="form-control mb-1" id="video" rows="3" {{ old('video') }}>
                                            @error('video')
                                                <p class="text-red-500 text-sm mt-1 error-message">{{ $message }}</p>
                                            @enderror

                                            <label for="description1" class="form-label">Deskripsi 1</label>
                                            <textarea class="ckeditor form-control" name="description1" id="description1" rows="3">{{ old('description1') }}</textarea>
                                            @error('description1')
                                                <p class="text-red-500 text-sm mt-1 error-message">{{ $message }}</p>
                                            @enderror

                                            <label for="description2" class="form-label">Deskripsi 2</label>
                                            <textarea class="ckeditor form-control" name="description2" id="description2" rows="3">{{ old('description2') }}</textarea>
                                            @error('description2')
                                                <p class="text-red-500 text-sm mt-1 error-message">{{ $message }}</p>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="modal-footer mt-2">
                                        <a href="{{ route('sub-solutions.index') }}" class="btn btn-danger">Kembali</a>
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
        setTimeout(function() {
            const errorMessages = document.querySelectorAll('.error-message');
            errorMessages.forEach(function(message) {
                message.style.display = 'none';
            });
        }, 3000);
    </script>
@endsection


