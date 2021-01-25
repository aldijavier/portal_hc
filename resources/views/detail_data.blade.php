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
          <h1 class="m-0">Detail Data Pelamar</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <button class="btn bg-gradient-success"><li class="breadcrumb-item"><a href="{{ route('data-pelamar')}}" style="color:white">Kembali Data Pelamar</a></li></button>
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
              <!-- /.card-header -->
              <div class="card-body">
              
              <!-- START ALERTS AND CALLOUTS -->
                <div class="row">
                <div class="col-md-6">
                <div class="card card-default">
                    
                <!-- /.card-header -->
                <div class="card-body">
                @foreach($peg ?? '' as $peg)
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Nama Depan</b>
                            <input class="form-control" value="{{ $peg->nama_depan }}" disabled required >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Nama Belakang</b>
                            <input class="form-control" value="{{ $peg->nama_belakang }}" disabled required>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>No KTP</b>
                            <input class="form-control" value="{{ $peg->no_ktp }}" disabled required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Jenis Kelamin</b>
                            <input class="form-control" value="{{ $peg->jenis_kelamin }}" disabled required>
                        </div>
                    </div>
                </div>
                    
                <div class="form-group">
                    <b>Email</b>
                    <input class="form-control" value="{{ $peg->email }}" disabled required>
                </div>
                    
                <div class="form-group">
                    <b>Tanggal Lahir</b>
                <!-- Pada carbon disini yaitu memmanipulasi data yang sebenarnya pada bagian field tanggal lahir 
                     yang sebelumnya m/d/Y menjadi d/m/Y 
                     format("l, d F Y") contoh Hari, 20 Desember 2020   
                -->

                    <input class="form-control" value ='{{Carbon\Carbon::parse($peg->tgl_lahir)->format("d/m/Y")}}' disabled required>
                </div>


                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>No Telephone</b>
                            <input class="form-control" value="{{ $peg->no_tlp }}" disabled required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>No Handphone</b>
                            <input class="form-control" value="{{ $peg->no_hp }}" disabled required>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Mengetahui informasi dari</b>
                            <input class="form-control" value="{{ $peg->informasi }}" disabled required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Job Title</b>
                            <input class="form-control" value="{{ $peg->job_title }}" disabled required>
                        </div>
                    </div>
                </div>

                <hr/>
                <div class="form-group">
                    <b>Alamat berdasarkan KTP</b>
                    <input class="form-control" value="{{ $peg->alamat }}" disabled required>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Provinsi</b>
                            <input class="form-control" value="{{ $peg->province }}" disabled required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Kota</b>
                            <input class="form-control" value="{{ $peg->city }}" disabled required>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Kecamatan</b>
                            <input class="form-control" value="{{ $peg->district }}" disabled required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Kelurahan</b>
                            <input class="form-control" value="{{ $peg->village }}" disabled required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <b>Kode Pos</b>
                    <input class="form-control" value="{{ $peg->kode_pos }}" disabled required>
                </div>
                @break
                @endforeach
                <br>

                @foreach($peg2 ?? '' as $peg2)
                <div class="form-group">
                    <b>Alamat saat ini</b>
                    <input class="form-control" value="{{ $peg2->alamat2 }}" disabled required>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Provinsi</b>
                            <input class="form-control" value="{{ $peg2->province }}" disabled required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Kota</b>
                            <input class="form-control" value="{{ $peg2->city }}" disabled required>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Kecamatan</b>
                            <input class="form-control" value="{{ $peg2->district }}" disabled required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Kelurahan</b>
                            <input class="form-control" value="{{ $peg2->village }}" disabled required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <b>Kode Pos</b>
                    <input class="form-control" value="{{ $peg->kode_pos2 }}" disabled required>
                </div>
                @break
                @endforeach

                <hr/>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Pendidikan Terakhir</b>
                            <input class="form-control" value="{{ $peg->pendidikan_terakhir }}" disabled required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Unversitas</b>
                            <input class="form-control" value="{{ $peg->universitas }}" disabled required>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Jurusan</b>
                            <input class="form-control" value="{{ $peg->jurusan }}" disabled required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>IPK</b>
                            <input class="form-control" value="{{ $peg->ipk }}" disabled required>
                        </div>
                    </div>
                </div>
                
                <hr/>
                <div class="form-group">
                    <b>Pengalaman</b>
                    <input class="form-control" value="{{ $peg->pengalaman }}" disabled required>
                </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->

  <div class="col-md-6">
    <div class="card card-default">
      <!-- /.card-header -->
      <div class="card-body">

            <div class="form-row">
                    <div class="col-md-5">
                        <div class="form-group">
                        <br>
                        <button class="btn bg-gradient-success col-md-8"><a href="/data_file/{{ $peg->file_cv }}" style="color:white" target="_blank" rel="noopener noreferrer">Lihat CV</button>
                    </div>
                    </div>
                    <br><br>
                    <div class="col-md-6">
                        <div class="form-group">
                        <br>
                        <button class="btn bg-gradient-success col-md-9"><a href="/data_file/{{ $peg->file_ktp }}" style="color:white" target="_blank" rel="noopener noreferrer">Lihat KTP</button>
                    </div>
                    </div>
                </div>

            <div class="form-row">
                <div class="col-md-5">
                    <div class="form-group">
                    <br>
                    <button class="btn bg-gradient-success col-md-8"><a href="/data_file/{{ $peg->file_npwp }}" style="color:white" target="_blank" rel="noopener noreferrer">Lihat NPWP</button>
                </div>
                </div>
                <br><br>
                <div class="col-md-6">
                    <div class="form-group">
                    <br>
                    <button class="btn bg-gradient-success col-md-9"><a href="/data_file/{{ $peg->file_bpjs_ketenagakerjaan }}" style="color:white" target="_blank" rel="noopener noreferrer">Lihat BPJS Ketegakerjaan</button>
                </div>
                </div>
            </div>

            <div class="form-row">
                    <div class="col-md-5">
                        <div class="form-group">
                        <br>
                        <button class="btn bg-gradient-success col-md-8"><a href="/data_file/{{ $peg->file_bpjs_kesehatan }}" style="color:white" target="_blank" rel="noopener noreferrer">Lihat BPJS Kesehatan</button>
                    </div>
                    </div>
                    <br><br>
                    <div class="col-md-6">
                        <div class="form-group">
                        <br>
                        <button class="btn bg-gradient-success col-md-9"><a href="/data_file/{{ $peg->file_transkrip_nilai }}" style="color:white" target="_blank" rel="noopener noreferrer">Lihat Transkrip Nilai</button>
                    </div>
                    </div>
                </div>

            
                <div class="form-row">
                    <div class="col-md-5">
                        <div class="form-group">
                        <br>
                        <button class="btn bg-gradient-success col-md-8"><a href="/data_file/{{ $peg->file_ijazah }}" style="color:white" target="_blank" rel="noopener noreferrer">Lihat Ijazah</button>
                    </div>
                    </div>
                    <br><br>
                    <div class="col-md-6">
                        <div class="form-group">
                        <br>
                        <button class="btn bg-gradient-success col-md-9"><a href="/data_file/{{ $peg->file_surat_keterangan_kerja }}" style="color:white" target="_blank" rel="noopener noreferrer">Lihat Surat Keterangan Kerja</button>
                    </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-5">
                        <div class="form-group">
                        <br>
                        <button class="btn bg-gradient-success col-md-8"><a href="/data_file/{{ $peg->file_kartu_keluarga }}" style="color:white" target="_blank" rel="noopener noreferrer">Lihat Kartu Keluarga</button>
                    </div>
                    </div>
                    <br><br>
                    <div class="col-md-6">
                        <div class="form-group">
                        <br>
                        <button class="btn bg-gradient-success col-md-9"><a href="/data_file/{{ $peg->foto }}" style="color:white" target="_blank" rel="noopener noreferrer">Lihat Foto</button>
                    </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-5">
                        <div class="form-group">
                        <br>
                        <button class="btn bg-gradient-success col-md-8"><a href="/data_file/{{ $peg->file_buku_nikah }}" style="color:white" target="_blank" rel="noopener noreferrer">Lihat Buku Nikah</button>
                        </div>
                    </div>
                </div>
        </div>      
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
<!-- END ALERTS AND CALLOUTS -->
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
