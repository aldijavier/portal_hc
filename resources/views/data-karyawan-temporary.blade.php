
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
  <div class="content-wrapper bg-white">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="content-header">
          <h1 class="m-0">Manajemen Data Karyawan Temporary</h1>
          <br>
          <button class="btn bg-gradient-success"><i class="fas fa-plus-square"></i><a href="{{ route('tambah-data-karyawan-temporary') }}" style="color:white"> Tambah Data Karyawan</button></a>
          <button class="btn bg-gradient-info"><i class="fas fa-file-excel"></i><a href="{{ route('export-excel') }}" style="color:white"> Export Data Karyawan Aktif</button></a>
          <button class="btn bg-gradient-danger"><i class="fas fa-file-excel"></i><a href="{{ route('export-excel2') }}" style="color:white"> Export Data Karyawan Tidak Aktif</button></a>
          <br><br>
          <form class="form-detail" action="{{route ('import') }}" enctype="multipart/form-data" method="POST" id="myform">
                {{ csrf_field() }}

            <div class="form-group col-md-7">
              <label for="file">Import Data Karyawan Temporary</label>
              <input type="file" class="form-control" name="file">
              <label for="file">(* type format : .xls dan .xlxs )</label>
              <p class="text-danger">{{ $errors->first('file') }}</p>
            </div>
            <div class="form-group col-md-7">
            <button class="btn btn-outline-primary"><i class="fas fa-file-upload"></i> Import Data</button>
            </div>
            </form>

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
              <div class="card-header bg-indigo">
                <h3 class="card-title">Data Karyawan Temporary</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body"> 
              
              <center><h1>Filter Data</h1></center>
              <br>
              
              <form action="/filter-data-karyawan" method="GET" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="row">
              <div class="col-md-4">
              <label for="name"> Nomor Karyawan </label>
                <input data-column="0" type="text" name="search_number_karyawan" id="search_number_karyawan" class="form-control filter-number" autocomplete="off" placeholder="Masukan nomor karyawan"
                value="{{ (request()->get('search_number_karyawan')) }}">
              </div>

              <div class="col-md-4">
                <label for="name"> Nama Karyawan </label>
                <input  data-column="1" type="text"  name="search_nama_karyawan" id="search_nama_karyawan" class="form-control" autocomplete="off" placeholder="Masukan nama karyawan"
                value="{{ (request()->get('search_nama_karyawan')) }}">
              </div>

                <div class="col-md-4">
                  <label for="filter-pernikahan">Status Pernikahan</label>
                  <select data-column="3" name="search_statuspernikahan_karyawan" id="search_statuspernikahan_karyawan" class="form-control filter-pernikahan">
                    <option value="">Pilih Status Pernikahan</option>
                    <option @if(request()->get('search_statuspernikahan_karyawan')=="Lajang") selected @endif value="Lajang" >Lajang</option>
                    <option @if(request()->get('search_statuspernikahan_karyawan')=="Menikah") selected @endif value="Menikah" >Menikah</option>
                  </select>
                </div>
                </div>
                <br>

                <div class="row">
                <div class="col-md-4">
                  <label>Agama</label>
                  <select data-column="4" name="search_agama_karyawan" id="search_agama_karyawan" class="form-control filter-agama">
                    <option value="">Pilih Agama</option>
                    <option @if(request()->get('search_agama_karyawan')=="Islam") selected @endif value="Islam" >Islam</option>
                    <option @if(request()->get('search_agama_karyawan')=="Kristen Protestan") selected @endif value="Kristen Protestan" >Kristen Protestan</option>
                    <option @if(request()->get('search_agama_karyawan')=="Kristen Katolik") selected @endif value="Kristen Katolik" >Kristen Katolik</option>
                    <option @if(request()->get('search_agama_karyawan')=="Hindu") selected @endif value="Hindu" >Hindu</option>
                    <option @if(request()->get('search_agama_karyawan')=="Budha") selected @endif value="Budha" >Budha</option>
                    <option @if(request()->get('search_agama_karyawan')=="Konghucu") selected @endif value="Konghucu" >Konghucu</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label>Departement</label>
                  <select data-column="6" name="search_department_karyawan" id="search_department_karyawan" class="form-control filter-department">
                    <option value="">Pilih Departement</option>
                    @foreach($departments1 as $department)
                    <option @if(request()->get('search_department_karyawan')=="{{$department->department_id}}") selected @endif value="{{$department->department_id}}">{{$department->department_name}}</option>
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
              <a  class="btn btn-primary" href="{{url('/data-karyawan')}}"><i class="fas fa-sync fa-spin" aria-hidden="true" ></i> Reset Filter</a>
              </form>
              <br>
              <br>

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
              <div><button class="btn bg-gradient-warning button2"><a href="{{url('editdatakaryawantemporary/'.$g->int_emp_id)}}" style="color:white;">Edit Data</button><div>
              <br><button class="btn bg-gradient-primary button2"><a href="{{url('detaildatakaryawantemporary/'.$g->int_emp_id)}}" style="color:white;">Lihat Data</button>
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
    @include('sweetalert::alert')
<!-- /.REQUIRED SCRIPTS -->
</body>
</html>