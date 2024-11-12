@extends('adminlte.layouts.app')
@section('title', 'Tambah Projek | BE Profile')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah Projek</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/projek">Projek</a></li>
                <li class="breadcrumb-item active">Tambah Projek</li>
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
                            <form action="{{ route('projek.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="nama_projek" class="form-label">Nama Projek</label>
                                        <input name="nama_projek" class="form-control mb-3" id="nama_projek" rows="3" {{ old('nama_projek') }}>
                                        @error('nama_projek')
                                            <p class="text-red-500 text-sm mt-1 error-message">{{ $message }}</p>
                                        @enderror

                                        <label for="klien_id" class="form-label">Klien</label>
                                        <div class="input-group mb-3">
                                            <select name="klien_id" class="custom-select" id="klien_id">
                                                <option selected disabled>Pilih Klien...</option>
                                                @foreach ($kliens as $klien)
                                                    <option value="{{ $klien->id }}" {{ old('klien_id') == $klien->id ? 'selected' : '' }}>{{ $klien->nama_perusahaan }}</option>
                                                @endforeach
                                            </select>
                                            @error('klien_id')
                                                <p class="text-danger text-sm mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <label for="kategori_projek_id" class="form-label">Kategori Projek</label>
                                        <div class="input-group mb-3">
                                            <select name="kategori_projek_id" class="custom-select" id="kategori_projek_id">
                                                <option selected disabled>Pilih Kategori Projek...</option>
                                                @foreach ($kategoriProjeks as $kategori)
                                                    <option value="{{ $kategori->id }}" {{ old('kategori_projek_id') == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('kategori_projek_id')
                                                <p class="text-danger text-sm mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <label for="lokasi" class="form-label">Lokasi</label>
                                        <input name="lokasi" class="form-control mb-3" id="lokasi" rows="3" {{ old('lokasi') }}>
                                        @error('lokasi')
                                            <p class="text-red-500 text-sm mt-1 error-message">{{ $message }}</p>
                                        @enderror

                                        <label for="website" class="form-label">Website</label>
                                        <input name="website" class="form-control mb-3" id="website" rows="3" {{ old('website') }}>
                                        @error('website')
                                            <p class="text-red-500 text-sm mt-1 error-message">{{ $message }}</p>
                                        @enderror

                                        <label for="waktu" class="form-label">Waktu</label>
                                        <input name="waktu" type="number" class="form-control mb-3" id="waktu" rows="3" {{ old('waktu') }}>
                                        @error('waktu')
                                            <p class="text-red-500 text-sm mt-1 error-message">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-8 ml-auto">
                                        <label for="deskripsi" class="form-label">Deskripsi</label>
                                        <textarea class="ckeditor form-control" name="deskripsi" id="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
                                        @error('deskripsi')
                                            <p class="text-red-500 text-sm mt-1 error-message">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="{{ route('projek.index') }}" class="btn btn-danger">Kembali</a>
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
@endsection
<script>
    setTimeout(function() {
        const errorMessages = document.querySelectorAll('.error-message');
        errorMessages.forEach(function(message) {
            message.style.display = 'none';
        });
    }, 3000);
</script>
