<nav class="main-header navbar navbar-expand navbar-primary navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('beranda-hc') }}" class="nav-link">Home</a>
      </li>
      <li class="nav-item dropdown d-none d-sm-inline-block">
        <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Data Karyawan</a>
          <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
            <li><a href="{{ route('data-karyawan') }}" class="dropdown-item">Manajemen Data Karyawan</a></li>
            <li><a href="{{ route('filter-data-karyawan') }}" class="dropdown-item">Filter Data Karyawan</a></li>
          </ul>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('data-pelamar') }}" class="nav-link">Data Pelamar</a>
      </li>
    </ul>
    
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>