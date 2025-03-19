@extends('adminlte.layouts.app')
@section('title', 'Seri Perangkat | BE Profile')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Seri Perangkat</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a style="text-decoration: none;" href="/admin/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Seri Perangkat</li>
                    </ol>
                </div>
            </div>
        </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800"></h1>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModelSeriPerangkat">
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
                                            <th scope="col">Nama Perangkat</th>
                                            <th scope="col">Gambar 1</th>
                                            <th scope="col">Gambar 2</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($seriPerangkat as $index => $item)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $item->seri_perangkat }}</td>
                                                <td>
                                                    @if ($item->gambar1)
                                                        <img src="{{ asset('storage/' . $item->gambar1) }}" alt="Image">
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->gambar2)
                                                        <img src="{{ asset('storage/' . $item->gambar2) }}" alt="Image">
                                                    @endif
                                                </td>
                                                <td>
                                                    <a type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editSeriPerangkatModal{{ $item->id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteSeriPerangkatModal{{ $item->id }}">
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
    </div>
    @include('Admin.seri-perangkat.create')
    @include('Admin.seri-perangkat.edit')
    @include('Admin.seri-perangkat.delete', ['seriPerangkat' => $seriPerangkat])

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

