@extends('adminlte.layouts.app')
@section('title', 'Tambah Produk | BE Profile')
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
                <h1 class="m-0">Tambah Produk</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a style="text-decoration: none;" href="/admin/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a style="text-decoration: none;" href="/admin/produk">Produk</a></li>
                <li class="breadcrumb-item active">Tambah Produk</li>
                </ol>
            </div>
        </div>
    </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg">
                    @if ($errors->any())
                        <div class="alert alert-danger error-message" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="text-danger">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @include('sweetalert::alert')
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="nama_produk" class="form-label">Nama Produk</label>
                                        <input name="nama_produk" class="form-control mb-1" id="nama_produk" rows="3" {{ old('nama_produk') }}>
                                        @error('nama_produk')
                                            <p class="text-danger text-sm mt-1 error-message">{{ $message }}</p>
                                        @enderror

                                        <label for="sub_solution_id" class="form-label">Sub Solusi</label>
                                        <div class="input-group mb-1">
                                            <select name="sub_solution_id" class="custom-select" id="sub_solution_id">
                                                <option selected disabled>Pilih Sub Solusi...</option>
                                                @foreach ($subSolutions as $subSolution)
                                                    <option value="{{ $subSolution->id }}" {{ old('sub_solution_id') == $subSolution->id ? 'selected' : '' }}>{{ $subSolution->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('sub_solution_id')
                                            <p class="text-danger text-sm mt-1 error-message">{{ $message }}</p>
                                        @enderror

                                        <label for="link_lkpp_lokal" class="form-label">LKPP Lokal</label>
                                        <input name="link_lkpp_lokal" class="form-control mb-1" placeholder="https://example.com" id="link_lkpp_lokal" rows="3" {{ old('link_lkpp_lokal') }}>
                                        @error('link_lkpp_lokal')
                                            <p class="text-danger text-sm mt-1 error-message">{{ $message }}</p>
                                        @enderror

                                        <label for="link_lkpp_sektoral" class="form-label">LKPP Sektoral</label>
                                        <input name="link_lkpp_sektoral" class="form-control mb-1" placeholder="https://example.com" id="link_lkpp_sektoral" rows="3" {{ old('link_lkpp_sektoral') }}>
                                        @error('link_lkpp_sektoral')
                                            <p class="text-danger text-sm mt-1 error-message">{{ $message }}</p>
                                        @enderror

                                        <label for="brosur" class="mr-3">Upload Brosur</label>
                                        <div class="input-group mb-1">
                                            <input type="file" class="form-control" name="brosur" id="brosur" accept=".pdf">
                                        </div>
                                        @error('brosur')
                                            <p class="text-danger text-sm mt-1 error-message">{{ $message }}</p>
                                        @enderror

                                        <label for="gambar_thumbnail_produk" class="mr-3">Upload Gambar Thumbnail Produk</label>
                                        <div class="input-group mb-1">
                                            <input type="file" class="form-control" name="gambar_thumbnail_produk" id="gambar_thumbnail_produk" accept=".png, .jpg, .jpeg">
                                        </div>
                                        @error('gambar_thumbnail_produk')
                                            <p class="text-danger text-sm mt-1 error-message">{{ $message }}</p>
                                        @enderror

                                        <label for="gambar_produk" class="mr-3">Upload Gambar Produk</label>
                                        <div class="input-group mb-1">
                                            <input type="file" class="form-control" name="gambar_produk" id="gambar_produk" accept=".png, .jpg, .jpeg">
                                        </div>
                                        @error('gambar_produk')
                                            <p class="text-danger text-sm mt-1 error-message">{{ $message }}</p>
                                        @enderror

                                        <div class="form-group">
                                            <label for="solusi_produk_id">Solusi Pemasangan</label>
                                            <select name="solusi_produk_id[]" id="solusi_produk_id" class="form-control" multiple>
                                                @foreach($solusiProduk as $solusi)
                                                    <option value="{{ $solusi->id }}"
                                                        {{ in_array($solusi->id, old('solusi_produk_id', $produk->solusi_produk_id ?? [])) ? 'selected' : '' }}>
                                                        {{ $solusi->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('solusi_produk_id')
                                                <p class="text-danger text-sm mt-1 error-message">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <label for="link_tkdn" class="form-label">Link TKDN</label>
                                        <input name="link_tkdn" class="form-control mb-1" placeholder="https://example.com" id="link_tkdn" rows="3" {{ old('link_tkdn') }}>
                                        @error('link_tkdn')
                                            <p class="text-danger text-sm mt-1 error-message">{{ $message }}</p>
                                        @enderror

                                    </div>
                                    <div class="col-md-8 ml-auto">
                                        <label for="deskripsi_thumbnail" class="form-label">Deskripsi Thumbnail</label>
                                        <textarea class="ckeditor form-control" name="deskripsi_thumbnail" id="deskripsi_thumbnail" rows="3">{{ old('deskripsi_thumbnail') }}</textarea>
                                        @error('deskripsi_thumbnail')
                                            <p class="text-danger text-sm mt-1 error-message">{{ $message }}</p>
                                        @enderror
                                        <label for="deskripsi_produk" class="form-label">Deskripsi Produk</label>
                                        <textarea class="ckeditor form-control" name="deskripsi_produk" id="deskripsi_produk" rows="3">{{ old('deskripsi_produk') }}</textarea>
                                        @error('deskripsi_produk')
                                            <p class="text-danger text-sm mt-1 error-message">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer mt-2">
                                    <a href="{{ route('produk.index') }}" class="btn btn-danger">Kembali</a>
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

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
@endsection


