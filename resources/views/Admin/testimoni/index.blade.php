@extends('adminlte.layouts.app')
@section('title', 'Testimoni | BE Profile')
@section('content')
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Testimoni</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a style="text-decoration: none;" href="/admin/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Testimoni</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"></h1>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModelTestimoni">
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
                                        <th scope="col">Nama User</th>
                                        <th scope="col">Projek</th>
                                        <th scope="col">Jabatan</th>
                                        <th scope="col">Perusahaan</th>
                                        <th scope="col">Testimoni</th>
                                        <th scope="col">Logo</th>
                                        <th scope="col">Brosur</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($testimonis as $index => $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama_user }}</td>
                                            <td>{{ $item->projek->nama_projek }}</td>
                                            <td>{{ $item->jabatan }}</td>
                                            <td>{{ $item->projek->klien->nama_perusahaan ?? null }}</td>
                                            <td>{{ $item->testimoni }}</td>
                                            <td>
                                                @if ($item->projek->klien->logo ?? null)
                                                    <img src="{{ asset('storage/' . $item->projek->klien->logo) }}" alt="Image" style="width: 100px; height: auto;">
                                                @endif
                                            </td>
                                            <td>@if ($item->brosur)
                                                <a href="{{ asset('storage/' . $item->brosur) }}" class="btn btn-primary" target="_blank">
                                                    <i class="fas fa-file"></i>
                                                </a>
                                            @else
                                                <span>No file</span>
                                            @endif</td>
                                            <td>
                                                <a type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editTestimoniModal{{ $item->id }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteTestimoniModal{{ $item->id }}">
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
    @include('Admin.testimoni.create')
    @include('Admin.testimoni.edit')
    @include('Admin.testimoni.delete', ['testimonis' => $testimonis])
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
