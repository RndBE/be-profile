@extends('adminlte.layouts.app')
@section('title', 'Tentang Beacon | BE Profile')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tentang Beacon</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a style="text-decoration: none;" href="/admin/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Tentang Beacon</li>
                    </ol>
                </div>
            </div>
        </div>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800"></h1>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModelTentangKami">
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
                                            <th scope="col">Gambar Satu</th>
                                            <th scope="col">Gambar Dua</th>
                                            <th scope="col">Direktur</th>
                                            <th scope="col">Komisaris</th>
                                            <th scope="col">Manager Administrasi</th>
                                            <th scope="col">Manager Marketing</th>
                                            <th scope="col">Manager Hardware</th>
                                            <th scope="col">Manager Software</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($tentangkami as $index => $item)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>
                                                    @if ($item->gambar_satu)
                                                        <img src="{{ asset('storage/' . $item->gambar_satu) }}" alt="Image" style="width: 100px; height: auto;">
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->gambar_dua)
                                                        <img src="{{ asset('storage/' . $item->gambar_dua) }}" alt="Image" style="width: 100px; height: auto;">
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->gambar_direktur)
                                                        <img src="{{ asset('storage/' . $item->gambar_direktur) }}" alt="Image" style="width: 100px; height: auto;">
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->gambar_komisaris)
                                                        <img src="{{ asset('storage/' . $item->gambar_komisaris) }}" alt="Image" style="width: 100px; height: auto;">
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->gambar_administrasi)
                                                        <img src="{{ asset('storage/' . $item->gambar_administrasi) }}" alt="Image" style="width: 100px; height: auto;">
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->gambar_marketing)
                                                        <img src="{{ asset('storage/' . $item->gambar_marketing) }}" alt="Image" style="width: 100px; height: auto;">
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->gambar_hardware)
                                                        <img src="{{ asset('storage/' . $item->gambar_hardware) }}" alt="Image" style="width: 100px; height: auto;">
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->gambar_software)
                                                        <img src="{{ asset('storage/' . $item->gambar_software) }}" alt="Image" style="width: 100px; height: auto;">
                                                    @endif
                                                </td>
                                                <td>
                                                    <a type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editTentangKamiModal{{ $item->id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteTentangKamiModal{{ $item->id }}">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('Admin.tentang-kami.create')
    @include('Admin.tentang-kami.edit')
    @include('Admin.tentang-kami.delete', ['tentangkami' => $tentangkami])
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
