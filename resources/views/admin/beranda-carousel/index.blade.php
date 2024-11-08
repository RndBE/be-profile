@extends('admin.layouts.app')

@section('title', 'Carousel | BE PROFILE')
@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1>Widgets</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Widgets</li>
        </ol>
    </div>
    </div>
@endsection
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Beranda / Carousel Slider</h1>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModelCarousel">
            Tambah
        </button>

    </div>
    @if (session('success'))
        <div id="successAlert" class="alert alert-success alert-dismissible fade show" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="font-medium">{{ session('success') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div id="errorAlert" class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="font-medium">{{ session('error') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card pb-10">
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td width="100px">No</td>
                            <td width="250px">Judul</td>
                            <td>Sub Judul</td>
                            <td>Sub Judul</td>
                            <td>Aksi</td>
                        </tr>
                        @foreach ($carousels as $index => $item)
                            <tr style="{{ $item->is_read == 1 ? 'background-color: #f0f0f0' : ''}}">
                                <td>{{ $carousels->firstItem() + $index }}</td>
                                <td>{{ $item->judul }}</td>
                                <td>{{ $item->sub_judul }}</td>
                                <td>
                                    @if ($item->gambar)
                                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="Image" style="width: 100px; height: auto;">
                                    @endif
                                </td>

                                <td>
                                    <form action="/admin/pesan/{{ $item->id }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>

                    <div class="px-6 py-4">
                        {{ $carousels->links('vendor.pagination.bootstrap-5') }}
                    </div>
                </div>
            </div>

        </div>
    </div>
    @include('admin.beranda-carousel.create')
@endsection
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Atur waktu delay dalam milidetik (contoh: 5000 = 5 detik)
        const delay = 5000;

        // Menghilangkan alert sukses
        const successAlert = document.getElementById('successAlert');
        if (successAlert) {
            setTimeout(() => {
                successAlert.style.display = 'none';
            }, delay);
        }

        // Menghilangkan alert error
        const errorAlert = document.getElementById('errorAlert');
        if (errorAlert) {
            setTimeout(() => {
                errorAlert.style.display = 'none';
            }, delay);
        }
    });
</script>

