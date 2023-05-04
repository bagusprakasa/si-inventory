@extends('layouts.template')
@section('content')
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 d-flex align-items-center">
                        <li class="breadcrumb-item"><a href="{{ url('produk') }}" class="link"><i
                                    class="fa-solid fa-box-open"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ url('produk') }}"
                                class="link">{{ ucwords(Request::segment(1)) }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ Request::segment(2) != null ? ucwords(Request::segment(2)) : 'List' }}</li>
                    </ol>
                </nav>
                <h1 class="mb-0 fw-bold">{{ ucwords(Request::segment(1)) }}</h1>
            </div>
        </div>
    </div>
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Table -->
        <div class="row">
            <!-- column -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- title -->
                        <div class="d-md-flex">
                            <div>
                                <a href="{{ route('produk.create') }}" class="btn btn-primary">Tambah Data</a>
                            </div>
                            <div class="ms-auto">
                                <form action="" method="GET">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="key" name="key"
                                                value="{{ Request::get('key') }}" placeholder="Cari data . . . .">
                                        </div>
                                        <div class="col-md-4">

                                            <button type="submit" class="btn btn-success text-white">Cari</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- title -->
                        <div class="table-responsive">
                            <table class="table mb-0 table-hover align-middle text-nowrap">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">No</th>
                                        <th class="border-top-0">satuan produk</th>
                                        <th class="border-top-0">kategori produk</th>
                                        <th class="border-top-0">Nama</th>
                                        <th class="border-top-0">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @if (count($data) != 0)
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $item->satuan_id->name }}</td>
                                                <td>{{ $item->kategori_id->name }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>
                                                    <a href="{{ route('produk.edit', $item->id) }}"
                                                        class="btn btn-success btn-sm text-white">Edit</a>
                                                    <a href="javascript:void(0)" class="btn btn-danger btn-sm text-white"
                                                        onclick="hapus({{ $item->id }})">Hapus</a>
                                                    <form action="{{ route('produk.destroy', $item->id) }}" method="post"
                                                        id="delete">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="3" class="text-center">
                                                <h3>Tidak ada data.</h3>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            <div class="float-right">
                                {{ $data->appends(Request::all())->links('layouts.pagination') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Table -->
    </div>
    <!-- End Container fluid  -->
    <script src="
                                https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js
                                "></script>
    <script>
        function hapus(id) {
            Swal.fire({
                title: 'Apakah anda yakin ingin menghapus?',
                showCancelButton: true,
                icon: 'warning',
                confirmButtonText: 'Iya',
                cancelButtonText: 'Tidak',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $('#delete').submit();

                }
            })
        }
    </script>
    @if (session('status'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('status') }}',
            })
        </script>
    @endif
@endsection
