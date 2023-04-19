<!DOCTYPE html>
<html dir="ltr" lang="en">

@include('partials.head')

<body>
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- Main wrapper - style you can find in pages.scss -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- Header -->
        @include('partials.header')
        <!-- sidebar -->
        @include('partials.sidebar')
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Content -->
            @yield('content')
            <!-- footer -->
            <footer class="footer text-center">
                Semua Hak Dilindungi oleh Anak Magang. Dirancang dan Dikembangkan oleh <a href="#">Anak
                    Magang</a>.
            </footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- JS -->
    @include('partials.js')
</body>

</html>
