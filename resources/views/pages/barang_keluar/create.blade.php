@extends('layouts.template')
@section('content')
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 d-flex align-items-center">
                        <li class="breadcrumb-item"><a href="{{ url('barang-keluar') }}" class="link"><i
                                    class="fa-solid fa-box-open"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ url('barang-keluar') }}"
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
                        <form class="form-horizontal form-material mx-2" action="{{ route('barang-keluar.store') }}"
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
                                        <input type="date" placeholder="" name="name"
                                            class="form-control form-control-line @error('name') is-invalid @enderror"
                                            value="{{ old('name') }}"">
                                        @error('name')
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
                                        <textarea class="form-control-line @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}" name="name"
                                        placeholder="Leave a comment here" id="floatingTextarea2" style="height: 150px">   </textarea>
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success text-white">Simpan</button>
                                    <a href="{{ route('barang-keluar.index') }}" class="btn btn-secondary text-white">Kembali</a>
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
