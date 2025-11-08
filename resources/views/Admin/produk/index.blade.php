@extends('adminlte.layouts.app')
@section('title', 'Produk | BE Profile')
@section('content')
    <div class="app-content-header">
        <div class="app-container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Produk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a style="text-decoration: none;" href="/admin/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Produk</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"></h1>
                <a href="{{ route('produk.create') }}" class="btn btn-primary">Tambah</a>
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
                                        <th scope="col">Gambar Thumbnail</th>
                                        <th scope="col">Deskripsi Thumbnail</th>
                                        <th scope="col">Nama Produk</th>
                                        <th scope="col">Kategori Sub Solusi</th>
                                        <th scope="col">Gambar Produk</th>
                                        <th scope="col">Deskripsi Produk</th>
                                        <th scope="col">Solusi Pemasangan</th>
                                        <th scope="col">Brosur</th>
                                        <th scope="col">LKPP</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($produks as $index => $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>
                                                @if ($item->gambar_thumbnail_produk)
                                                    <img src="{{ asset('storage/' .$item->gambar_thumbnail_produk) }}" alt="Image" style="width: 100px; height: auto;">
                                                @else
                                                -
                                                @endif
                                            </td>
                                            <td>{!! $item->deskripsi_thumbnail !!}</td>
                                            <td>{{ $item->nama_produk ?? 'N/A' }}</td>
                                            <td>{{ $item->subSolution->nama ?? 'N/A' }}</td>
                                            <td>
                                                @if ($item->gambar_produk)
                                                    <img src="{{ asset('storage/' .$item->gambar_produk) }}" alt="Image" style="width: 100px; height: auto;">
                                                @else
                                                -
                                                @endif
                                            </td>
                                            <td>{!! $item->deskripsi_produk !!}</td>
                                            <td>
                                                @if (!empty($item->solusi_produk_id))
                                                    @php
                                                        $solusiIds = json_decode($item->solusi_produk_id, true);
                                                        $namaSolusi = $solusiProduk->only($solusiIds);
                                                    @endphp
                                                    {{ implode(', ', $namaSolusi->toArray()) }}
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>
                                                @if(!empty($item->brosur) && Storage::disk('public')->exists($item->brosur))
                                                    <a href="{{ asset('storage/' . $item->brosur) }}"
                                                    target="_blank"
                                                    class="btn btn-info">
                                                        <i class="fa-regular fa-file"></i>
                                                    </a>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    LKPP
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="{{ $item->link_lkpp_lokal }}" target="blank">LKPP Lokal</a></li>
                                                    <li><a class="dropdown-item" href="{{ $item->link_lkpp_sektoral }}" target="blank">LKPP Sektoral</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td>
                                                <a type="button" class="btn btn-warning" href="{{ route('produk.edit', $item->id) }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteProdukModal{{ $item->id }}">
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
    @include('Admin.produk.delete', ['produks' => $produks])

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

