@extends('adminlte.layouts.app')
@section('title', 'Seri Perangkat Spesifikasi | BE Profile')
@section('content')
        <div class="app-content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Seri Perangkat Spesifikasi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a style="text-decoration: none;" href="/admin/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Seri Perangkat Spesifikasi</li>
                    </ol>
                </div>
            </div>
        </div>
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800"></h1>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModelSeriPerangkatSpesifikasi">
                        Tambah
                    </button>
                </div>
                <div class="row">
                    <div class="col-lg">
                        @include('sweetalert::alert')
                        <div class="card">
                            <div class="card-body table-responsive">
                                <div class="accordion" id="accordionSeriPerangkat">
                                    @foreach ($seriPerangkatSpesifikasi->groupBy('dataSeriPerangkat.seri_perangkat') as $seriPerangkat => $items)
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ Str::slug($seriPerangkat) }}" aria-expanded="false" aria-controls="collapse{{ Str::slug($seriPerangkat) }}">
                                                    {{ $seriPerangkat }}
                                                </button>
                                            </h2>
                                            <div id="collapse{{ Str::slug($seriPerangkat) }}" class="accordion-collapse collapse" data-bs-parent="#accordionSeriPerangkat">
                                                <div class="accordion-body">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col" class="text-center">No</th>
                                                                <th scope="col">Spesifikasi</th>
                                                                <th scope="col">Deskripsi</th>
                                                                <th scope="col">Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($items as $index => $item)
                                                                <tr>
                                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                                    <td>
                                                                        {{ optional($item->dataSpesifikasi->dataKategoriSpesifikasi)->nama_kategori }} |
                                                                        {{ optional($item->dataSpesifikasi)->judul }}
                                                                    </td>
                                                                    <td>{!! $item->deskripsi !!}</td>
                                                                    <td>
                                                                        <a type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editSeriPerangkatSpesifikasiModal{{ $item->id }}">
                                                                            <i class="fas fa-edit"></i>
                                                                        </a>
                                                                        <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteSeriPerangkatSpesifikasiModal{{ $item->id }}">
                                                                            <i class="fas fa-trash"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @include('Admin.seri-perangkat-spesifikasi.create')
    @include('Admin.seri-perangkat-spesifikasi.edit')
    @include('Admin.seri-perangkat-spesifikasi.delete', ['seriPerangkatSpesifikasi' => $seriPerangkatSpesifikasi])

    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                    paging: true,
                    searching: true,
                    ordering: true,
                    info: true,
                    lengthChange: true,
                    pageLength: 10,
                });
            });
    </script>
@endsection

