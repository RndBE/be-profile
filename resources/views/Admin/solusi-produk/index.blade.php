@extends('adminlte.layouts.app')
@section('title', 'Solusi Produk | BE Profile')
@section('content')
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Solusi Produk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a style="text-decoration: none;" href="/admin/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Solusi Produk</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"></h1>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModelSolusiProduk">
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
                                        <th scope="col">Nama</th>
                                        <th scope="col">Icon</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($solusiproduks as $index => $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>
                                                @if ($item->icon)
                                                    <img src="{{ asset('storage/' . $item->icon) }}" alt="Image" style="width: 100px; height: auto;">
                                                @endif
                                            </td>
                                            <td>
                                                <a type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editSolusiProdukModal{{ $item->id }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteSolusiProdukModal{{ $item->id }}">
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
    @include('Admin.solusi-produk.create')
    @include('Admin.solusi-produk.edit')
    @include('Admin.solusi-produk.delete', ['solusiproduks' => $solusiproduks])

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

