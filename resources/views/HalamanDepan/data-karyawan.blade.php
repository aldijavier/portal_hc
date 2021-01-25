
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
          <h1 class="m-0">Manajemen Data Karyawan</h1>
          <br>
          <button class="btn bg-gradient-success"><i class="fas fa-plus-square"></i><a href="{{ route('tambah-data-karyawan') }}" style="color:white"> Tambah Data Karyawan</button>
          <button class="btn bg-gradient-info"><i class="fas fa-file-excel"></i><a href="{{ route('export-excel') }}" style="color:white"> Export Data Karyawan Aktif</button>
          <button class="btn bg-gradient-danger"><i class="fas fa-file-excel"></i><a href="{{ route('export-excel2') }}" style="color:white"> Export Data Karyawan Tidak Aktif</button>
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
              <table id="" class="table table-bordered table-striped example4">
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
							<th>Action</th>
						</tr>
					</thead>
          <tbody>
            @php $no = 1 @endphp
            @foreach($karyawan ?? '' as $g)
						<tr>
              <td>{{ $no++ }}</td>
							<td>{{$g->int_emp_number}}</td>
              <td>{{$g->int_emp_name}}</td>
							<td>{{$g->int_emp_gender}}</td>
							<td>{{$g->int_emp_marital}}</td>
							<td>{{$g->int_emp_religion}}</td>
              <td>{{Carbon\Carbon::parse($g->int_emp_dob)->format("d/m/Y")}}</td>
              <td>{{$g->department_name}}</td>
              <td><span class="badge {{ ($g->int_emp_statuss == 1) ? 'badge-success' : 'badge-danger' }}">
              {{ ($g->int_emp_statuss == 1) ? 'Aktif' : 'Tidak Aktif' }}</span></td>
              <td>
              <div><button class="btn bg-gradient-warning"><a href="{{url('editdatakaryawan/'.$g->int_emp_id)}}" style="color:white">Edit Data</button></div>
              <br><button class="btn bg-gradient-primary"><a href="{{url('detaildatakaryawan/'.$g->int_emp_id)}}" style="color:white">Lihat Detail Data</button>
							</td>
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

<!-- <div class="col-md-11">
              <h3><center>Filter Data</center></h3>
              </div> -->

              <!-- <form class="row" action="{{ url('/data-karyawan/periode') }}" method="get">
              <div class="col-md-3">
                <label> Nomor Karyawan : </label>
                  <input class="form-control"type="text" name="int_emp_number">
              </div>

              <div class="col-md-3">
                <label> Nama Karyawan: </label>
                  <input class="form-control" type="text" name="int_emp_name">
              </div>
              
              <div class="col-md-3">
              
                <label> Status Pernikahan: </label>
                  <select name="int_emp_marital" class="form-control select1">
                    <option value="">Status Pernikahan</option>
                    <option value="Lajang">Lajang</option>
                    <option value="Menikah">Menikah</option>
                  </select>
              </div>

              <div class="col-md-3">
                <label>Agama </label>
                  <select name="int_emp_religion" class="form-control select2">
                        <option value="">Pilih Agama </option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen Protestan">Kristen Protestan</option>
                        <option value="Kristen Katolik">Kristen Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Konghucu">Konghucu</option>
                  </select>
              </div>

              <br>
              <button type="submit" class="btn btn-primary"> Submit</button>
              </form>
              <br>
              <br> -->