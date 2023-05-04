    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('') }}libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('') }}libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('') }}js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="{{ asset('') }}js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('') }}js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('') }}js/custom.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="{{ asset('') }}libs/chartist/dist/chartist.min.js"></script>
    <script src="{{ asset('') }}libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="{{ asset('') }}js/pages/dashboards/dashboard1.js"></script>
    <script src="
                                https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js
                                "></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
    <script>
        function logout() {
            Swal.fire({
                title: 'Apakah anda yakin ingin logout?',
                showCancelButton: true,
                icon: 'warning',
                confirmButtonText: 'Iya',
                cancelButtonText: 'Tidak',
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#form-logout').submit();
                }
            })
        }
    </script>
