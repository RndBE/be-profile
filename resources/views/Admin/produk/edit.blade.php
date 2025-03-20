@extends('adminlte.layouts.app')
@section('title', 'Edit Produk | BE Profile')
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
                    <h1 class="m-0">Edit Produk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a style="text-decoration: none;" href="/admin/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a style="text-decoration: none;" href="/admin/produk">Produk</a></li>
                        <li class="breadcrumb-item active">Edit Produk</li>
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
                            <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="nama_produk" class="form-label">Nama Produk</label>
                                        <input name="nama_produk" class="form-control mb-1" id="nama_produk" value="{{ old('nama_produk', $produk->nama_produk) }}">
                                        @error('nama_produk')
                                            <p class="text-danger text-sm mt-1 error-message">{{ $message }}</p>
                                        @enderror

                                        <label for="sub_solution_id" class="form-label">Sub Solusi</label>
                                        <div class="input-group mb-1">
                                            <select name="sub_solution_id" class="custom-select" id="sub_solution_id">
                                                <option selected disabled>Pilih Sub Solusi</option>
                                                @foreach ($subSolutions as $subSolution)
                                                    <option value="{{ $subSolution->id }}" {{ old('sub_solution_id', $produk->sub_solution_id) == $subSolution->id ? 'selected' : '' }}>{{ $subSolution->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('sub_solution_id')
                                            <p class="text-danger text-sm mt- error-message">{{ $message }}</p>
                                        @enderror

                                        <label for="link_lkpp_lokal" class="form-label">Link LKPP Lokal</label>
                                        <input name="link_lkpp_lokal" class="form-control mb-1" placeholder="https://example.com" id="link_lkpp_lokal" value="{{ old('link_lkpp_lokal', $produk->link_lkpp_lokal) }}">
                                        @error('link_lkpp_lokal')
                                            <p class="text-danger text-sm mt-1 error-message">{{ $message }}</p>
                                        @enderror

                                        <label for="link_lkpp_sektoral" class="form-label">Link LKPP Sektoral</label>
                                        <input name="link_lkpp_sektoral" class="form-control mb-1" placeholder="https://example.com" id="link_lkpp_sektoral" value="{{ old('link_lkpp_sektoral', $produk->link_lkpp_sektoral) }}">
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
                                        @if ($produk->gambar_thumbnail_produk)
                                            <div class="mb-2">
                                                <img src="{{ asset('storage/' . $produk->gambar_thumbnail_produk) }}" alt="Image" style="width: 100px; height: auto;">
                                            </div>
                                        @endif
                                        <div class="input-group mb-1">
                                            <input type="file" class="form-control" name="gambar_thumbnail_produk" id="gambar_thumbnail_produk" accept=".png, .jpg, .jpeg">
                                        </div>
                                        @error('gambar_thumbnail_produk')
                                            <p class="text-danger text-sm mt-1 error-message">{{ $message }}</p>
                                        @enderror

                                        <label for="gambar_produk" class="mr-3">Upload Gambar Produk</label>
                                        @if ($produk->gambar_produk)
                                            <div class="mb-2">
                                                <img src="{{ asset('storage/' . $produk->gambar_produk) }}" alt="Image" style="width: 100px; height: auto;">
                                            </div>
                                        @endif
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
                                        <input name="link_tkdn" class="form-control mb-1" placeholder="https://example.com" id="link_tkdn" value="{{ old('link_tkdn', $produk->link_tkdn) }}">
                                        @error('link_tkdn')
                                            <p class="text-danger text-sm mt-1 error-message">{{ $message }}</p>
                                        @enderror

                                        <label for="seri_perangkat_id" class="form-label">Seri Perangkat</label>
                                        <div class="mb-1">
                                            <div class="row">
                                                @foreach ($seriPerangkat as $perangkat)
                                                    <div class="col-md-4">
                                                        <div class="form-check">
                                                            <input
                                                                type="checkbox"
                                                                name="seri_perangkat_id[]"
                                                                value="{{ $perangkat->id }}"
                                                                id="perangkat_{{ $perangkat->id }}"
                                                                class="form-check-input"
                                                                {{ in_array($perangkat->id, old('seri_perangkat_id', $produk->seri_perangkat_id ?? [])) ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="perangkat_{{ $perangkat->id }}">
                                                                {{ $perangkat->seri_perangkat }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                        @error('seri_perangkat_id')
                                            <p class="text-danger text-sm mt-1 error-message">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-8 ml-auto">
                                        <label for="deskripsi_thumbnail" class="form-label">Deskripsi Thumbnail</label>
                                        <textarea class="ckeditor form-control" name="deskripsi_thumbnail" id="deskripsi_thumbnail" rows="3">{{ old('deskripsi_thumbnail', $produk->deskripsi_thumbnail) }}</textarea>
                                        @error('deskripsi_thumbnail')
                                            <p class="text-danger text-sm mt-1 error-message">{{ $message }}</p>
                                        @enderror

                                        <label for="deskripsi_produk" class="form-label">Deskripsi Produk</label>
                                        <textarea class="ckeditor form-control" name="deskripsi_produk" id="deskripsi_produk" rows="3">{{ old('deskripsi_produk', $produk->deskripsi_produk) }}</textarea>
                                        @error('deskripsi_produk')
                                            <p class="text-danger text-sm mt-1 error-message">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endsection



