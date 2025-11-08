@extends('adminlte.layouts.app')
@section('title', 'Komponen | BE Profile')
@section('content')
        <div class="app-content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Komponen</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a style="text-decoration: none;" href="/admin/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Komponen</li>
                    </ol>
                </div>
            </div>
        </div>
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800"></h1>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModelKomponen">
                        Tambah
                    </button>
                </div>
                <div class="row">
                    <div class="col-lg">
                        @include('sweetalert::alert')
                        <div class="card">
                            <div class="card-body table-responsive">
                                <table id="example" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-center">No</th>
                                            <th scope="col">Produk</th>
                                            <th scope="col">Deskripsi</th>
                                            <th scope="col">Gambar</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($komponen as $index => $item)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $item->dataProduk?->nama_produk }}</td>
                                                <td>{!! $item->description !!}</td>
                                                <td>
                                                    @if ($item->gambar)
                                                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="Image">
                                                    @endif
                                                </td>
                                                <td>
                                                    <a type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editKomponenModal{{ $item->id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteKomponenModal{{ $item->id }}">
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
                </div>
            </div>
        </div>
    @include('Admin.komponen.create')
    @include('Admin.komponen.edit')
    @include('Admin.komponen.delete', ['komponen' => $komponen])

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

