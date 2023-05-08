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
                        <form class="form-horizontal form-material mx-2" action="{{ route('barang-masuk.store') }}"
                        method="POST">

                            @csrf

                            <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="col-md-12">Penanggung Jawab</label>
                                    <div class="col-md-12">
                                        <select name="id_guidedriver" class="form-control select2" id="id_guidedriver">
                                        <option value="">---Pilih Penanggung Jawab---</option>
                                        @foreach ($guidedriver as $guidedrivers)
                                            <option value="{{ $guidedrivers->id }}">{{ $guidedrivers->name }}</option>
                                        @endforeach
                                    </select>
                                        @error('id_guidedriver')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">Tanggal Trip </label>
                                    <div class="col-md-12">
                                        <input type="date" placeholder="" name="date"
                                            class="form-control form-control-line @error('date') is-invalid @enderror"
                                            value="{{ old('date') }}"">
                                        @error('date')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label class="col-md-12">Keterangan </label>
                                    <div class="col-md-12">
                                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                        {{-- <input type="text" placeholder="Masukkan nama guide atau driver" name="name"
                                            class="form-control form-control-line @error('name') is-invalid @enderror"
                                            value="{{ old('name') }}""> --}}
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <div class="col-sm-12">
                                <a href="javascript:void(0)" class="btn btn-primary text-white" id="addBarang"> Tambah Barang</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table mb-0 table-hover align-middle text-nowrap">
                                <thead>
                                    <tr>
                                        <th class="border-top-0"></th>
                                        <th class="border-top-0">Nama Barang</th>
                                        <th class="border-top-0">Harga Barang</th>
                                        <th class="border-top-0">Kuantitas Barang</th>
                                        <th class="border-top-0">Subotal</th>
                                    </tr>
                                </thead>
                                <tbody id="barang-masuk">
                                    @php
                                        $no = 0;
                                    @endphp
                                    @for ($i = 0; $i < $countItem; $i++)
                                        @php
                                            $no++;
                                        @endphp
                                        @include('pages.barang_masuk.tr', ['no' => $no, 'i' => $i, 'barangs' => $barang])
                                    @endfor
                                </tbody>
                            </table>
                        </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success text-white">Simpan</button>
                                    <a href="{{ route('barang-masuk.index') }}" class="btn btn-secondary text-white">Kembali</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Table -->
    </div>
    <!-- End Container fluid  -->
@endsection
@push('custom-js')
    <script>
        var addButton = $('#addBarang');
        var wrapper = $('#barang-masuk');
        $(addButton).click(function() {
            var no = parseInt($(".row-item:last").attr('data-no'))
            $.ajax({
                type: 'get',
                url: "{{ url('ajax-barang-masuk') }}",
                data: {
                    no: no
                },
                success: function(data) {
                    wrapper.append(data)
                    no++
                }
            })
        });
        function removeTr(no) {
            var selector = '.row-item[data-no="' + no + '"]';
            $(selector).remove()
         }
    </script>
    @endpush
