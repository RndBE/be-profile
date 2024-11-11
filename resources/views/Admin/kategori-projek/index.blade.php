@extends('adminlte.layouts.app')
@section('title', 'Kategori Projek | BE Profile')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kategori Projek</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Kategori Projek</li>
                    </ol>
                </div>
            </div>
        </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800"></h1>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModelKategoriProjek">
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
                                            <th scope="col">Nama</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($kategori_pojeks as $index => $item)
                                            <tr>
                                                <td>{{ $kategori_pojeks->firstItem() + $index }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>
                                                    <a type="button" class="btn btn-warning" data-toggle="modal" data-target="#editKategoriProjekModal{{ $item->id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteKategoriProjekModal{{ $item->id }}">
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
                                    {{ $kategori_pojeks->links('vendor.pagination.bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('Admin.kategori-projek.create')
    @include('Admin.kategori-projek.edit')
    @include('Admin.kategori-projek.delete', ['kategori_pojeks' => $kategori_pojeks])
@endsection
