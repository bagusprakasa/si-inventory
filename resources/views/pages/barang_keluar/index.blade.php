@extends('layouts.template')
@section('content')
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 d-flex align-items-center">
                        <li class="breadcrumb-item"><a href="{{ url('kategori_produk') }}" class="link"><i
                                    class="fa-solid fa-box-open"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ url('kategori_produk') }}"
                                class="link">{{ ucwords(Request::segment(1)) }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ Request::segment(2) != null ? ucwords(Request::segment(2)) : 'List' }}</li>
                    </ol>
                </nav>
                <h1 class="mb-0 fw-bold">Barang Keluar</h1>
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
                                <a href="{{ route('barang-keluar.create') }}" class="btn btn-primary">Tambah Data</a>
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
                                        <th class="border-top-0">Nomor Transaksi</th>
                                        <th class="border-top-0">Tanggal Masuk</th>
                                        <th class="border-top-0">Catatan</th>
                                        <th class="border-top-0">Penanggung Jawab</th>
                                        <th class="border-top-0">Total Barang</th>
                                        <th class="border-top-0">Grandtotal</th>
                                        <th class="border-top-0">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $id = 1;
                                    @endphp
                                    @if (count($data) != 0)
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->trx_no }}</td>
                                                <td>{{ $item->date_out }}</td>
                                                <td>{{ $item->note }}</td>
                                                <td>{{ $item->guide_driver->name }}</td>
                                                <td>{{ $item->total_qty }}</td>
                                                <td>{{ number_format($item->grand_total, 0, ',', '.') }}</td>
                                                <td>
                                                    <a href="#" class="btn btn-success btn-sm text-white"
                                                        data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                        onclick="detail({{ $item->id }})">Detail</a>
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

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table mb-0 table-hover align-middle text-nowrap">
                            <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Kuantitas</th>
                                    <th>Harga Barang</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody id="modal-detail">

                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }

        function detail(id) {
            $('#modal-detail').empty();
            $.ajax({
                type: "get",
                url: "{{ url('barang-keluar') }}/" + id,
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    $.each(response, function(i, v) {
                        $('#modal-detail').append(
                            `
                    <tr>
                        <td>${v.produk.name}</td>
                        <td>${parseFloat(v.qty)}</td>
                        <td>${formatRupiah((parseFloat(v.subtotal)/parseFloat(v.qty)).toString())}</td>
                        <td>${formatRupiah(parseFloat(v.subtotal).toString())}</td>
                    </tr>
                    `
                        );
                    });
                }
            });
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
