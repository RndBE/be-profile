@extends('adminlte.layouts.app')
@section('title', 'Fitur Sub Solutions | BE Profile')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Fitur Sub Solutions</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a style="text-decoration: none;" href="/admin/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Fitur Sub Solutions</li>
                    </ol>
                </div>
            </div>
        </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800"></h1>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModelFiturSubSolution">
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
                                            <th scope="col">Sub Solusi</th>
                                            <th scope="col">Deskripsi</th>
                                            <th scope="col">Icon</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($fitursubsolutionss as $index => $item)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->subSolution?->nama }}</td>
                                                <td>{!! $item->description !!}</td>
                                                <td style="background-color: black; color: white;">
                                                    @if ($item->icon)
                                                        <img src="{{ asset('storage/' . $item->icon) }}" alt="Image" style="width: 100px; height: auto;">
                                                    @endif
                                                </td>
                                                <td>
                                                    <a type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editFiturSubSolusiModal{{ $item->id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteSubSolutionModal{{ $item->id }}">
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
    @include('Admin.fitur-sub-solutions.create')
    @include('Admin.fitur-sub-solutions.edit')
    @include('Admin.fitur-sub-solutions.delete', ['fitursubsolutionss' => $fitursubsolutionss])

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

