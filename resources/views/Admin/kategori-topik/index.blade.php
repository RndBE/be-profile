@extends('adminlte.layouts.app')
@section('title', 'Kategori Topik | BE Profile')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kategori Topik</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a style="text-decoration: none;" href="/admin/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Kategori Topik</li>
                    </ol>
                </div>
            </div>
        </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800"></h1>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModelKategoriTopik">
                        Tambah
                    </button>
                </div>
                <div class="row">
                    <div class="col-lg">
                        @include('sweetalert::alert')

                        <div class="card">
                            <div class="card-body table-responsive">
                                <table id="tabel" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-center">No</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Deskripsi</th>
                                            <th scope="col">Icon</th>
                                            <th scope="col">Thumbnail</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kategori_topiks as $index => $item)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->description }}</td>
                                                <td>
                                                    @if ($item->icon)
                                                        <img src="{{ asset('storage/' . $item->icon) }}" alt="Image" style="width: 100px; height: auto;">
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->thumbnail)
                                                        <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="Image" style="width: 100px; height: auto;">
                                                    @endif
                                                </td>
                                                <td>
                                                    <a type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editKategoriTopikModal{{ $item->id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteKategoriTopikModal{{ $item->id }}">
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
    @include('Admin.kategori-topik.create')
    @include('Admin.kategori-topik.edit')
    @include('Admin.kategori-topik.delete', ['kategori_topiks' => $kategori_topiks])
    <script>
        $(document).ready(function () {
            $('#tabel').DataTable({
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
