
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    @include('Template.head')
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet" type="text/css">
    {{-- <link href="{{asset('css/upload.css')}}" rel="stylesheet" type="text/css"> --}}
    <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>

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
          <h1 class="m-0" style="text-align: center">Data Employee Management</h1>
          <br>
          <button class="custom-btn btn-31" style="width: 250px;"><i class="fas fa-plus-square"></i><a href="{{ route('tambah-data-karyawan') }}" style="color:white"> Add Data Employee</button></a>
          <button class="custom-btn btn-21" style="width: 250px;"><i class="fas fa-file-excel"></i><a href="{{ route('export-excel') }}" style="color:white"> Export Data Employee Active</button></a>
          <button class="custom-btn btn-11" style="width: 310px;"><i class="fas fa-file-excel"></i><a href="{{ route('export-excel2') }}" style="color:white"> Export Data Employee Non Active</button></a>
          <br><br>
          <form class="form-detail" action="{{route ('importkaryawan') }}" enctype="multipart/form-data" method="POST" id="myform">
              {{ csrf_field() }}
              <div class="form-group col-md-4">
                <label for="file">Import Data Employee</label>
                <input type="file" class="form-control" name="file" style="height: 45px;"> <span style="margin:295px;"><button class="btn btn-outline-primary" style="margin-top: -51px;"><i class="fas fa-file-upload"></i> Import Data</button></span>
                <label for="file">(* type format : .xlxs )</label>
                <p class="text-danger">{{ $errors->first('file') }}</p>
              </div>
              {{-- <div class="form-group col-md-7">
                <button class="btn btn-outline-primary"><i class="fas fa-file-upload"></i> Import Data</button>
              </div> --}}
            </form>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('beranda-hc') }}">Home</a></li>
              <li class="breadcrumb-item active">Data Karyawan</li>
            </ol> -->
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
              <div class="card-header" style="background-color: #151A48">
                <h3 class="card-title" style="color: white">Data Employee</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body"> 
              
              <center><h1 style="font-size: 30px;">Filter Data</h1></center>
              <br>
              
              <form action="{{ route('filter-data-karyawan') }}" method="GET" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="row">
              <div class="col-md-4">
              <label for="name"> Number Employee </label>
                <input data-column="0" type="text" name="search_number_karyawan" id="search_number_karyawan" class="form-control filter-number" autocomplete="off" placeholder="Input Employee Number"
                value="{{ (request()->get('search_number_karyawan')) }}">
              </div>

              <div class="col-md-4">
                <label for="name"> Name Employee </label>
                <input  data-column="1" type="text"  name="search_nama_karyawan" id="search_nama_karyawan" class="form-control" autocomplete="off" placeholder="Input Name of Employee"
                value="{{ (request()->get('search_nama_karyawan')) }}">
              </div>

                <div class="col-md-4">
                  <label for="filter-pernikahan">Marital Status</label>
                  <select data-column="3" name="search_statuspernikahan_karyawan" id="search_statuspernikahan_karyawan" class="form-control filter-pernikahan">
                    <option value="">Choose Marital Status</option>
                    <option @if(request()->get('search_statuspernikahan_karyawan')=="1") selected @endif value="1" >Lajang</option>
                    <option @if(request()->get('search_statuspernikahan_karyawan')=="2") selected @endif value="2" >Menikah</option>
                    <option @if(request()->get('search_statuspernikahan_karyawan')=="3") selected @endif value="3" >Cerai</option>
                  </select>
                </div>
                </div>
                <br>

                <div class="row">
                <div class="col-md-4">
                  <label>Religion</label>
                  <select data-column="4" name="search_agama_karyawan" id="search_agama_karyawan" class="form-control filter-agama">
                    <option value="">Choose Religion</option>
                    <option @if(request()->get('search_agama_karyawan')=="Islam") selected @endif value="Islam" >Islam</option>
                    <option @if(request()->get('search_agama_karyawan')=="Kristen") selected @endif value="Kristen" >Kristen</option>
                    <option @if(request()->get('search_agama_karyawan')=="Katolik") selected @endif value="Katolik" >Katolik</option>
                    <option @if(request()->get('search_agama_karyawan')=="Hindu") selected @endif value="Hindu" >Hindu</option>
                    <option @if(request()->get('search_agama_karyawan')=="Budha") selected @endif value="Budha" >Budha</option>
                    <option @if(request()->get('search_agama_karyawan')=="Konghucu") selected @endif value="Konghucu" >Konghucu</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label>Departement</label>
                  <select data-column="6" name="search_department_karyawan" id="search_department_karyawan" class="form-control filter-department">
                    <option value="" style="padding-bottom: 500px;">Choose Departement</option>
                    @foreach($departments1 as $department)
                    <option @if(request()->get('search_department_karyawan')=="{{$department->department_id}}") selected @endif value="{{$department->department_id}}">{{$department->department_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-4">
                <label for="filter-statuss"> Status Employee </label>
                  <select class="form-control filter-statuss" name="search_statuss_karyawan" id="search_statuss_karyawan">
                      <option value=""> Choose Employee Status </option>
                      <option @if(request()->get('search_statuss_karyawan')=="1") selected @endif value="1" >Active</option>
                      <option @if(request()->get('search_statuss_karyawan')=="2") selected @endif value="2" >Non Active</option>
                  </select>
                </div>
              </div>
              <br>
              <button type="submit" class="btn btn-success"><i class="fa fa-search" aria-hidden="true"></i> Filter Data</button>
              <a  class="btn btn-primary" href="{{url('/data-karyawan')}}"><i class="fas fa-sync" aria-hidden="true" ></i> Reset Filter</a>
              </form>
              <br>
              <br>

              <table id="" class="table table-bordered table-striped example4">
              <thead>
						<tr>
              <th>No</th>
              <th>Number Identity Employee</th>
							<th>Name of Employee</th>
							<th>Gender</th>
							<th>Marital Status</th>
							<th>Religion</th>
              <th>Birth of Date</th>
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
							<td>{{$g->marital}}</td>
							<td>{{$g->int_emp_religion}}</td>
              <td>{{Carbon\Carbon::parse($g->int_emp_dob)->format("d/m/Y")}}</td>
              <td>{{$g->department_name}}</td>
              <td><span class="badge {{ ($g->int_emp_statuss == 1) ? 'badge-success' : 'badge-danger' }}">
              {{ ($g->int_emp_statuss == 1) ? 'Aktif' : 'Tidak Aktif' }}</span></td>
              <td>
              <div><button class="btn bg-gradient-warning button2"><a href="{{url('editdatakaryawan/'.$g->int_emp_id)}}" style="color:white;">Edit Data</button><div>
              <br><button class="btn bg-gradient-primary button2"><a href="{{url('detaildatakaryawan/'.$g->int_emp_id)}}" style="color:white;">Lihat Data</button>
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