
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
            <h1 class="m-0">Data Pelamar</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Pelamar</li>
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
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
						<tr>
							<th>Nama</th>
							<th>Job Title</th>
							<th>Universitas</th>
							<th>Jurusan</th>
							<th>IPK</th>
							<th>Pengalaman</th>
							<th>Alamat</th>
							<th>Lihat Dokumen</th>
							<th>Lihat Detail</th>
						</tr>
					</thead>
					<tbody>
						@foreach($gambar ?? '' as $g)
						<tr>
							<td>{{$g->nama_depan}} {{$g->nama_belakang}}</td>
							<td>{{$g->job_title}}</td>
							<td>{{$g->universitas}}</td>
							<td>{{$g->jurusan}}</td>
							<td>{{$g->ipk}}</td>
							<td>{{$g->pengalaman}}</td>
							<td>{{$g->alamat}}, {{$g->village}}, {{$g->district}}, {{$g->city}}, {{$g->province}}, {{$g->kode_pos}}</td>
                            <td>
								<a href="/data_file/{{ $g->file_cv }}" target="_blank" rel="noopener noreferrer">Lihat CV</a> |
								<a href="/data_file/{{ $g->file_ktp }}" target="_blank" rel="noopener noreferrer">Lihat KTP</a> |
								<a href="/data_file/{{ $g->file_npwp }}" target="_blank" rel="noopener noreferrer">Lihat NPWP</a> |
								<a href="/data_file/{{ $g->file_bpjs_ketenagakerjaan }}" target="_blank" rel="noopener noreferrer">Lihat BPJS Ketenagakerjaan</a> |
								<a href="/data_file/{{ $g->file_bpjs_kesehatan }}" target="_blank" rel="noopener noreferrer">Lihat BPJS Kesehatan</a> |
								<a href="/data_file/{{ $g->file_transkrip_nilai }}" target="_blank" rel="noopener noreferrer">Lihat Transkrip Nilai</a> |
								<a href="/data_file/{{ $g->file_ijazah }}" target="_blank" rel="noopener noreferrer">Lihat Ijazah</a> |
								<a href="/data_file/{{ $g->file_surat_keterangan_kerja }}" target="_blank" rel="noopener noreferrer">Lihat Surat Keterangan Kerja</a> |
								<a href="/data_file/{{ $g->file_kartu_keluarga }}" target="_blank" rel="noopener noreferrer">Lihat Kartu Keluarga</a> |
								<a href="/data_file/{{ $g->foto }}" target="_blank" rel="noopener noreferrer">Lihat Foto</a> |
								<a href="/data_file/{{ $g->file_buku_nikah }}" target="_blank" rel="noopener noreferrer">Lihat Buku Nikah</a>
							</td>
							<td>
							<a href="{{url('detail/'.$g->id)}}" target="_blank">Lihat Detail Data</a>
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
