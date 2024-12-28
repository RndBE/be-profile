@extends('adminlte.layouts.app')
@section('title', 'Sub Solutions | BE Profile')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Sub Solutions</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a style="text-decoration: none;" href="/admin/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Sub Solutions</li>
                    </ol>
                </div>
            </div>
        </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800"></h1>
                    <a href="{{ route('sub-solutions.create') }}" class="btn btn-primary">Tambah</a>
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
                                            <th scope="col">Kategori Solusi</th>
                                            <th scope="col">Deskripsi 1</th>
                                            <th scope="col">Deskripsi 2</th>
                                            <th scope="col">Video</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subsolutionss as $index => $item)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->Solution?->nama }}</td>
                                                <td>{!! $item->description1 !!}</td>
                                                <td>{!! $item->description2 !!}</td>
                                                <td>
                                                    @if ($item->video)
                                                        @php
                                                            // Extract YouTube video ID from the URL
                                                            preg_match('/(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?v=([^\&\?\/]+)/', $item->video, $matches);
                                                            $videoId = $matches[1] ?? null;
                                                        @endphp

                                                        @if ($videoId)
                                                            <!-- Embed YouTube video -->
                                                            <iframe width="200" height="113"
                                                                    src="https://www.youtube.com/embed/{{ $videoId }}"
                                                                    frameborder="0"
                                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                                    allowfullscreen>
                                                            </iframe>
                                                            <iframe allow="autoplay;" allowfullscreen="" frameborder="0" height="360" src="https://www.youtube.com/embed/{{ $videoId }}" width="640"></iframe>
                                                        @else
                                                            Invalid YouTube URL
                                                        @endif
                                                    @else
                                                        No Video
                                                    @endif
                                                </td>
                                                <td>
                                                    <a type="button" class="btn btn-warning" href="{{ route('sub-solutions.edit', $item->id) }}">
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
    @include('Admin.sub-solutions.delete', ['subsolutionss' => $subsolutionss])

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

