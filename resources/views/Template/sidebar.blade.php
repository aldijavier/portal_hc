<aside class="main-sidebar sidebar-light-indigo elevation-4" style="background-color: #151A48">
        <!-- Brand Logo -->
        <a href="#" class="brand-link" style="background-color: #151A48">
          <img src="{{ asset('img/matrixlogo1.png') }}" style="width:125px; margin-left: 50px" alt="User Image">
        </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="pb-4 mb-3 d-flex" style="background-color: #151A48">
       
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2" style="background-color: #151A48">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open" ><br>
            <a href="#" class="nav-link active" style="background-color: #151A48">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p style="font-size: 16px; color: white;">
                Dashboard HC
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('beranda-hc') }}" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                  <strong><p style="color: white; font-size: 14px;"></p></strong>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('data-karyawan') }}" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <strong><p style="color: white; font-size: 14px;">Data Karyawan</p></strong>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="{{ route('data-karyawan-temporary') }}" class="nav-link">
                  <i class="nav-icon fas fa-user-friends"></i>
                  <p>Data Karyawan Temporary</p>
                </a>
              </li> -->
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>