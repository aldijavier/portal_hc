<aside class="main-sidebar sidebar-light-indigo elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link bg-indigo">
            <span class="brand-text font-weight-light">PT NAP Info Lintas Nusa</span>
        </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image" style="margin: 0 auto;">
          <img src="{{ asset('img/matrix.png') }}" style="width:100px;" class="img-circle elevation-20" alt="User Image">
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard HC
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('beranda-hc') }}" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                  <p>Beranda</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('data-karyawan') }}" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>Data Karyawan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('data-pelamar') }}" class="nav-link">
                  <i class="nav-icon fas fa-user-friends"></i>
                  <p>Data Pelamar</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>