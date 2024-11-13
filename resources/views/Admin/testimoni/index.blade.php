@extends('adminlte.layouts.app')
@section('title', 'Testimoni | BE Profile')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModelTestimoni">
                        Tambah
                    </button>
                </div>
                <div class="row">
                    <div class="col-lg">
                        @include('sweetalert::alert')

                        <div class="card">
                            <div class="card-body table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
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
                                        @forelse ($testimonis as $index => $item)
                                            <tr>
                                                <td>{{ $testimonis->firstItem() + $index }}</td>
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
                                                    <a type="button" class="btn btn-warning" data-toggle="modal" data-target="#editTestimoniModal{{ $item->id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteTestimoniModal{{ $item->id }}">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr class="bg-white border-bottom">
                                                <td colspan="7" class="p-4 text-center">
                                                    <svg class="mx-auto mb-2" xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 00-1.883 2.542l.857 6a2.25 2.25 0 002.227 1.932H19.05a2.25 2.25 0 002.227-1.932l.857-6a2.25 2.25 0 00-1.883-2.542m-16.5 0V6A2.25 2.25 0 016 3.75h3.879a1.5 1.5 0 011.06.44l2.122 2.12a1.5 1.5 0 001.06.44H18A2.25 2.25 0 0120.25 9v.776" />
                                                    </svg>
                                                    <h5 class="mt-3 font-weight-bold text-secondary">Data Tidak Ditemukan!</h5>
                                                    <p class="text-muted">Maaf, data yang Anda cari tidak ada</p>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="px-6 py-4">
                                    {{ $testimonis->links('vendor.pagination.bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('Admin.testimoni.create')
    @include('Admin.testimoni.edit')
    @include('Admin.testimoni.delete', ['testimonis' => $testimonis])
@endsection
