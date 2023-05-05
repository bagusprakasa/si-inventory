@extends('layouts.template')
@section('content')
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 d-flex align-items-center">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}" class="link"><i
                                    class="fas fa-home fs-4"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
                <h1 class="mb-0 fw-bold">Dashboard</h1>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Sales chart -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title">Report Bulanan Air Mineral</h4>
                                {{-- <h6 class="card-subtitle">Ample admin Vs Pixel admin</h6> --}}
                            </div>
                            <div class="ms-auto d-flex no-block align-items-center">
                                <ul class="list-inline dl d-flex align-items-center m-r-15 m-b-0">
                                    <li class="list-inline-item d-flex align-items-center text-info"><i
                                            class="fa fa-circle font-10 me-1"></i> Masuk
                                    </li>
                                    <li class="list-inline-item d-flex align-items-center text-primary"><i
                                            class="fa fa-circle font-10 me-1"></i> Keluar
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <canvas id="myChart" height="100px"></canvas>
                        {{-- <div class="ct-chart mt-4" style="height: 350px;">
                            <div class="chartist-tooltip"></div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Sales chart -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->

    {{-- @include('partials.js-dashboard') --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('myChart');
        var monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];
        console.log({{ Js::from($arrMasukQty) }});
        console.log({{ Js::from($arrMasukDate) }});

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: monthNames,
                datasets: [{
                    label: 'Air Mineral Masuk',
                    data: [12, 19, 3, 5, 2, 3],
                    borderWidth: 1,
                    backgroundColor: '#1a9bfc'
                }, {
                    label: 'Air Mineral Keluar',
                    data: [12, 19, 3, 5, 2, 200],
                    borderWidth: 1,
                    backgroundColor: '#1e4db7',
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
