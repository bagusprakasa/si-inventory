@extends('layouts.template')
@section('content')
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 d-flex align-items-center">
                        <li class="breadcrumb-item"><a href="{{ url('guide-driver') }}" class="link"><i
                                    class="fa-solid fa-box-open"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ url('guide-driver') }}"
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
                        <form class="form-horizontal form-material mx-2" action="{{ route('guide-driver.store') }}"
                            method="POST">
                            @csrf

                                <div class="form-group">
                                    <label class="col-md-12">Nama </label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Masukkan nama guide atau driver" name="name"
                                            class="form-control form-control-line @error('name') is-invalid @enderror"
                                            value="{{ old('name') }}"">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                <label class="col-md-12"> Guide Driver </label>
                                <div class="col-md-12">
                                    <select name="type" class="form-control select2" id="">
                                    <option value="" disabled selected>Pilih Guide Atau Driver</option>
                                    <option value="guide">Guide</option>
                                    <option value="driver">Driver</option>
                                </select>
                                @error('satuan_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success text-white">Simpan</button>
                                    <a href="{{ route('guide-driver.index') }}" class="btn btn-secondary text-white">Kembali</a>
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
