@extends('adminlte.layouts.app')
@section('title', 'Tag | BE Profile')
@section('content')
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6"><h3 class="mb-0">Tag</h3></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a style="text-decoration: none;" href="/admin/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tag</li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!-- /.content-header -->
    <div class="app-content">
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"></h1>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModelTag">
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
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tags as $index => $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>
                                                <a type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editTagModal{{ $item->id }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteTagModal{{ $item->id }}">
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
    @include('Admin.tag.create')
    @include('Admin.tag.edit')
    @include('Admin.tag.delete', ['tags' => $tags])
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
