
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
          <h1 class="m-0">Filter Data Karyawan</h1>
          <br>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('beranda-hc') }}">Home</a></li>
              <li class="breadcrumb-item active">Filter Data Karyawan</li>
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
              
              <div class="row">
              <div class="col-md-4">
              <label for="name"> Nomor Karyawan </label>
                <input data-column="0" type="text" name="int_emp_number" class="form-control filter-number" autocomplete="off">
              </div>

              <div class="col-md-4">
                <label for="name"> Nama Karyawan </label>
                <input data-column="1" type="text" name="int_emp_name" class="form-control filter-name" autocomplete="off">                    
              </div>

                <div class="col-md-4">
                  <label for="filter-pernikahan">Status Pernikahan</label>
                  <select data-column="3" class="form-control filter-pernikahan">
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
                  <select data-column="4" id="filter-organisasi" class="form-control filter-agama">
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
                  <select data-column="6" class="form-control filter-department">
                    <option value="">Pilih Departement</option>
                    @foreach($list_department as $department)
                    <option value="{{$department->department_id}}">{{$department->department_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-4">
                <label for="filter-statuss"> Status Karyawan </label>
                  <select data-column="7" class="form-control filter-statuss">
                      <option value=""> Pilih Status Karyawan </option>
                      <option value="1">Aktif</option>
                      <option value="0">Tidak Aktif</option>
                  </select>
                </div>
              </div>
              <br>

              <button class="btn btn-sm btn-flat btn-primary btn-refresh"><i class="fas fa-4 fa-sync-alt"></i> Refresh Data</button>
              <br><br>

              <table id="table" class="table table-bordered table-striped">
              <thead>
              <tr>
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

<script> 
    $(document).ready(function(){
        var table = $('#table').DataTable({
        "autoWidth": false,
        "responsive": true,
        processing: true,
        serverSide: true,
        ajax: '{{ route('api.filter-data-karyawan') }}',
        columns: [
            {"data":"int_emp_number"},
            {"data":"int_emp_name"},
            {"data":"int_emp_gender"},
            {"data":"int_emp_marital"},
            {"data":"int_emp_religion"},
            {"data":"int_emp_dob"},
            {"data":"int_emp_department"},
            {"data":"int_emp_statuss"},
        ],
        });

    //filter berdasarkan Nomor Karyawan
    $('.filter-number').keyup(function () {
        table.column( $(this).data('column'))
        .search( $(this).val() )
        .draw();
    });

    //filter berdasarkan Nama Karyawan
    $('.filter-name').keyup(function () {
        table.column( $(this).data('column'))
        .search( $(this).val() )
        .draw();
    });

    //filter Berdasarkan pernikahan
    $('.filter-pernikahan').change(function () {
        table.column( $(this).data('column'))
        .search( $(this).val() )
        .draw();
    });

    //filter Berdasarkan agama
    $('.filter-agama').change(function () {
        table.column( $(this).data('column'))
        .search( $(this).val() )
        .draw();
    });

    //filter Berdasarkan agama
    $('.filter-department').change(function () {
        table.column( $(this).data('column'))
        .search( $(this).val() )
        .draw();
    });

    //filter Berdasarkan agama
    $('.filter-statuss').change(function () {
        table.column( $(this).data('column'))
        .search( $(this).val() )
        .draw();
    });
    });
</script>