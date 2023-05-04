<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <h5>Dashboard</h5>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ url('dashboard') }}" aria-expanded="false"><i class="fa-solid fa-house"></i> <span
                            class="hide-menu">
                            Dashboard</span></a></li>
                <hr>
                <h5>Barang Masuk</h5>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.html"
                        aria-expanded="false"><i class="fa-solid fa-list"></i> <span class="hide-menu">
                            List</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.html"
                        aria-expanded="false"><i class="fa-brands fa-wpforms"></i> <span class="hide-menu">
                            Create</span></a></li>
                <hr>
                <h5>Barang Keluar</h5>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('barang-keluar.index') }}" aria-expanded="false"><i class="fa-solid fa-list"></i>
                        <span class="hide-menu">
                            List</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.html"
                        aria-expanded="false"><i class="fa-brands fa-wpforms"></i> <span class="hide-menu">
                            Create</span></a></li>
                <hr>
                <h5>Data Master</h5>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('satuan.index') }}" aria-expanded="false"><i class="fa-solid fa-box-open"></i>
                        <span class="hide-menu">
                            Satuan</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('kategori_produk.index') }}" aria-expanded="false"><i
                            class="fa-solid fa-boxes-stacked"></i> <span class="hide-menu">
                            Kategori Produk</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('produk.index') }}" aria-expanded="false"><i class="fa-solid fa-box"></i> <span
                            class="hide-menu">
                            Produk</span></a></li>
                Kategori Produk</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('guide-driver.index') }}" aria-expanded="false"><i class="fa-solid fa-box"></i>
                        <span class="hide-menu">
                            Guide/Driver</span></a></li>
                <hr>
            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
