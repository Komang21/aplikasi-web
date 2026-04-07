<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="./index.html" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="{{ asset('storage/AdminLTELogo.png') }}"
              alt="AdminLTE Lgo"
              class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">AdminLTE 4</span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="navigation"
              aria-label="Main navigation"
              data-accordion="false"
              id="navigation"
            >
              {{-- resources/views/layouts/partials/sidebar.blade.php --}}
<nav class="sidebar sidebar-dark bg-primary">
    <ul class="nav flex-column">

        {{-- Dashboard - Admin only --}}
        @can('dashboard-view')
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.index') ? 'active' : '' }}" 
               href="{{ route('admin.index') }}">
                <i class="fas fa-tachometer-alt"></i>
                <span class="ms-2">Dashboard</span>
            </a>
        </li>
        @endcan

        {{-- User - Admin only --}}
        @can('lihat user')
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.user.*') ? 'active' : '' }}" 
               href="{{ route('admin.user.index') }}">
                <i class="fas fa-users"></i>
                <span class="ms-2">User</span>
            </a>
        </li>
        @endcan

        {{-- Role - Admin only --}}
        @can('lihat role')
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.role.*') ? 'active' : '' }}" 
               href="{{ route('admin.role.index') }}">
                <i class="fas fa-user-shield"></i>
                <span class="ms-2">Role</span>
            </a>
        </li>
        @endcan

        {{-- Permission - Admin only --}}
        @can('lihat permission')
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.permission.*') ? 'active' : '' }}" 
               href="{{ route('admin.permission.index') }}">
                <i class="fas fa-key"></i>
                <span class="ms-2">Permission</span>
            </a>
        </li>
        @endcan

        {{-- Barang --}}
        @can('barang-view')
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.barang.*') ? 'active' : '' }}" 
               href="{{ route('admin.barang.index') }}">
                <i class="fas fa-boxes"></i>
                <span class="ms-2">Data Barang</span>
            </a>
        </li>
        @endcan

        {{-- Penjualan --}}
        @can('penjualan-view')
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.penjualan.*') ? 'active' : '' }}" 
               href="{{ route('admin.penjualan.index') }}">
                <i class="fas fa-shopping-cart"></i>
                <span class="ms-2">Penjualan</span>
            </a>
        </li>
        @endcan

    </ul>
</nav>

{{-- CSS Hover Effect --}}
<style>
/* Hover untuk link sidebar */
/* Hover untuk link sidebar */
.nav-link {
    transition: all 0.3s ease;
    color: #fff; /* default teks putih */
}

/* Hover background & teks */
.nav-link:hover {
    background-color: #222; /* hitam gelap saat hover */
    color: #fff;             /* teks tetap putih */
}

/* Hover ikon */
.nav-link:hover i {
    color: #ffcc00;          /* ikon kuning saat hover */
}

/* Menu aktif */
.nav-link.active {
    background-color: #000;  /* hitam penuh untuk menu aktif */
    color: #fff;             /* teks putih */
}

/* Ikon menu aktif tetap putih */
.nav-link.active i {
    color: #fff;
}
</style>
            </ul>
            <!--end::Sidebar Menu-->
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>
