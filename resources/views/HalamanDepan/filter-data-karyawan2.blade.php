<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    @include('Template.head')
</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed">
<div class="wrapper">

  <!-- Navbar -->
    @include('Template.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
    @include('Template.sidebar')  
  <!-- / .Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1 class="m-0">Filter Data Karyawan Bagian 2</h1>
          <br>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('beranda-hc') }}">Home</a></li>
              <li class="breadcrumb-item active">Data Karyawan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <!-- <h3 class="card-title">DataTable with default features</h3> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">

              <form action="/filter-data-karyawan2" method="GET" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="row">
              <div class="col-md-4">
              <label for="name"> Nomor Karyawan </label>
                <input data-column="0" type="text" name="search_number_karyawan" id="search_number_karyawan" class="form-control filter-number" autocomplete="off" placeholder="Masukan nomor karyawan">
              </div>

              <div class="col-md-4">
                <label for="name"> Nama Karyawan </label>
                <input  data-column="1" type="text"  name="search_nama_karyawan" id="search_nama_karyawan" class="form-control" autocomplete="off" placeholder="Masukan nama karyawan">
              </div>

                <div class="col-md-4">
                  <label for="filter-pernikahan">Status Pernikahan</label>
                  <select data-column="3" name="search_statuspernikahan_karyawan" id="search_statuspernikahan_karyawan" class="form-control filter-pernikahan">
                    <option value="">Pilih Status Pernikahan</option>
                    <option value="Lajang">Lajang</option>
                    <option value="Menikah">Menikah</option>
                  </select>
                </div>
                </div>
                <br>

                <div class="row">
                <div class="col-md-4">
                  <label>Agama</label>
                  <select data-column="4" name="search_agama_karyawan" id="search_agama_karyawan" class="form-control filter-agama">
                    <option value="">Pilih Agama</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen Protestan">Kristen Protestan</option>
                    <option value="Kristen Katolik">Kristen Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Budha">Budha</option>
                    <option value="Konghucu">Konghucu</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label>Departement</label>
                  <select data-column="6" name="search_department_karyawan" id="search_department_karyawan" class="form-control filter-department">
                    <option value="">Pilih Departement</option>
                    @foreach($list_department as $department)
                    <option value="{{$department->department_id}}">{{$department->department_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-4">
                <label for="filter-statuss"> Status Karyawan </label>
                  <select class="form-control filter-statuss" name="search_statuss_karyawan" id="search_statuss_karyawan">
                      <option value=""> Pilih Status Karyawan </option>
                      <option @if(request()->get('search_statuss_karyawan')=="1") selected @endif value="1" >Aktif</option>
                      <option @if(request()->get('search_statuss_karyawan')=="2") selected @endif value="2" >Tidak Aktif</option>
                  </select>
                </div>
              </div>
              <br>
              <button type="submit" class="btn btn-success"><i class="fa fa-search" aria-hidden="true"></i> Filter Data</button>
              <a  class="btn btn-primary" href="{{url('/filter-data-karyawan2')}}"> <i class="fas fa-4 fa-sync-alt" aria-hidden="true" ></i> Refresh Data</a>
              </form>
              <br>
             
              <!-- <button class="btn btn-sm btn-flat btn-primary btn-refresh"><i class="fas fa-4 fa-sync-alt"></i> Refresh Data</button> -->
              <br>

            <table class="table table-bordered table-striped example4">
            <thead>
			      <tr>
            <th>No</th>
            <th>Nomor Karyawan</th>
            <th>Nama Karyawan</th>
            <th>Jenis Kelamin</th>
            <th>Status Pernikahan</th>
            <th>Agama</th>
            <th>Tanggal Lahir</th>
            <th>Department</th>
            <th>Status</th>
			      </tr>
			      </thead>
            <tbody>
            <!-- @php $no = 1 @endphp -->
            @foreach($karyawan  as $no => $g)
			      <tr>
            <td>{{ $karyawan->firstItem()+$no}}</td>
			      <td>{{$g->int_emp_number}}</td>
            <td>{{$g->int_emp_name}}</td>
            <td>{{$g->int_emp_gender}}</td>
            <td>{{$g->int_emp_marital}}</td>
            <td>{{$g->int_emp_religion}}</td>
            <td>{{Carbon\Carbon::parse($g->int_emp_dob)->format("d/m/Y")}}</td>
            <td>{{$g->department_name}}</td>
            <td><span class="badge {{ ($g->int_emp_statuss == 1) ? 'badge-success' : 'badge-danger' }}">
            {{ ($g->int_emp_statuss == 1) ? 'Aktif' : 'Tidak Aktif' }}</span></td>
			      </tr>
            @endforeach
			      </tbody>
            </table>
               </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>  
    <!-- /.content -->
    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
        @include('Template.footer')
   </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
    @include('Template.script')
<!-- /.REQUIRED SCRIPTS -->
</body>
</html>

<script type="text/javascript">
    $(document).ready(function(){
 
        // btn refresh
        $('.btn-refresh').click(function(e){
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })
 
    })
</script>


