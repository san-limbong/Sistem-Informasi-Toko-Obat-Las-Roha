{{-- Sidebar for Menu --}}
<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" style="text-decoration: none" href="/dashboard">
            <span class="align-middle">SILAS</span>
        </a>
        <ul class="sidebar-nav">
            <li class="sidebar-item {{ $active === 'dashboard' ? 'active' : '' }}">
                <a class="sidebar-link" href="/dashboard">
                    <i class="align-middle" data-feather="pie-chart"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item {{ $active === 'data' ? 'active' : '' }}">
                <a data-bs-target="#pages" data-bs-toggle="collapse" class="sidebar-link collapsed"
                    aria-expanded="false">
                    <i class="align-middle" data-feather="clipboard"></i> <span class="align-middle">Barang</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-caret-down-fill pt-1" viewBox="0 0 16 16">
                        <path
                            d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                    </svg>
                </a>
                <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item {{ $active === 'mengelolabarang' ? 'active' : '' }}"><a class="sidebar-link"
                            href="/databarang">Mengelola Barang</a></li>
                    <li class="sidebar-item {{ $active === 'mengelolacategory' ? 'active' : '' }}"><a
                            class="sidebar-link" href="/databarang/kategori">Mengelola Kategori</a>
                    <li class="sidebar-item {{ $active === 'vendor' ? 'active' : '' }}"><a class="sidebar-link"
                            href="/vendor">Vendor</a>

                    </li>
                </ul>
            </li>
            @if (auth()->user()->role == 2)
            <li class="sidebar-item {{ $active === 'transaksi' ? 'active' : '' }}">
                <a class="sidebar-link" href="/datapesanan">
                    <i class="align-middle" data-feather="shopping-cart"></i> <span
                        class="align-middle">Transaksi</span>
                </a>
            </li>

            @endif
            @if (auth()->user()->role == 1)
            <li class="sidebar-item {{ $active === 'manageaccount' ? 'active' : '' }}">
                <a class="sidebar-link" href="/profile/list">
                    <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Mengelola
                        Akun</span>
                </a>
            </li>
            @endif

            <li class="sidebar-item {{ $active === 'rencanapengadaan' ? 'active' : '' }}">
                <a class="sidebar-link" href="/rencanapengadaan">
                    <i class="align-middle" data-feather="edit"></i> <span class="align-middle">Rencana
                        Pengadaan</span>
                </a>
            </li>
            <li class="sidebar-item {{ $active === 'pengadaanbarang' ? 'active' : '' }}">
                <a class="sidebar-link" href="/pengadaanbarang">
                    <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Pengadaan
                        Barang</span>
                </a>
            </li>
            <li class="sidebar-item {{ $active === 'penerimaanbarang' ? 'active' : '' }}">
                <a class="sidebar-link" href="/draftbarang">
                    <i class="align-middle" data-feather="truck"></i> <span class="align-middle">Penerimaan
                        Barang</span>
                </a>
            </li>
        </ul>

    </div>
</nav>