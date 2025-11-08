@extends('adminlte.layouts.app')
@section('title', 'Artikel | BE Profile')
@section('content')
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Artikel</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a style="text-decoration: none;" href="/admin/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Artikel</li>
                    </ol>
                </div>
            </div>
        </div>
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800"></h1>
                    <a href="{{ route('artikel.create') }}" class="btn btn-primary">Tambah</a>
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
                                            <th scope="col">Kategori Topik</th>
                                            <th scope="col">Judul</th>
                                            <th scope="col">Konten</th>
                                            <th scope="col">Thumbnail</th>
                                            <th scope="col">Tanggal Publikasi</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Slug</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($artikels as $index => $item)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $item->kategoriTopik?->nama }}</td>
                                                <td>{{ $item->judul }}</td>
                                                <td>{!! $item->konten !!}</td>
                                                <td>
                                                    @if ($item->thumbnail)
                                                        <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="Image" style="width: 100px; height: auto;">
                                                    @endif
                                                </td>
                                                <td>{{ $item->tanggal_publikasi }}</td>
                                                <td>{{ $item->status }}</td>
                                                <td>{{ $item->slug }}</td>
                                                <td>
                                                    <a type="button" class="btn btn-warning" href="{{ route('artikel.edit', $item->id) }}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteArtikelModal{{ $item->id }}">
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
    @include('Admin.artikel.delete', ['artikels' => $artikels])

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

