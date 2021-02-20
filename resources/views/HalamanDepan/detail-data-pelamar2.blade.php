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
              @if(count($peg))
                <div class="row">
                <div class="col-md-12">
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

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Email</b>
                            <input class="form-control" value="{{ $peg->email }}" disabled required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Tanggal Lahir</b>
                            <input class="form-control" value ='{{Carbon\Carbon::parse($peg->tgl_lahir)->format("d/m/Y")}}' disabled required>
                        </div>
                    </div>
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
                <br>

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
                <br>

                <div class="form-group">
                    <b>Alamat saat ini</b>
                    <input class="form-control" value="{{ $peg->alamat2 }}" disabled required>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Provinsi</b>
                            <input class="form-control" value="{{ $peg->province2 }}" disabled required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Kota</b>
                            <input class="form-control" value="{{ $peg->city2 }}" disabled required>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Kecamatan</b>
                            <input class="form-control" value="{{ $peg->district2 }}" disabled required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Kelurahan</b>
                            <input class="form-control" value="{{ $peg->village2 }}" disabled required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <b>Kode Pos</b>
                    <input class="form-control" value="{{ $peg->kode_pos2 }}" disabled required>
                </div>

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
                <br>
                
                <hr/>
                <div class="form-group">
                    <b>Pengalaman</b>
                    <input class="form-control" value="{{ $peg->pengalaman }}" disabled required>
                </div>
                <br>

                <hr/>
                <b>Dokumen File</b>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <br>
                        <button class="btn bg-gradient-success col-md-8 btn-flat"><a href="/data_file/{{ $peg->file_cv }}" style="color:white" target="_blank" rel="noopener noreferrer">Lihat CV</button></a>
                    </div>
                    </div>
                    <br><br>
                    <div class="col-md-6">
                        <div class="form-group">
                        <br>
                        <button class="btn bg-gradient-success col-md-9 btn-flat"><a href="/data_file/{{ $peg->file_ktp }}" style="color:white" target="_blank" rel="noopener noreferrer">Lihat KTP</button></a>
                    </div>
                    </div>
                </div>

            <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group">
                    <br>
                    <button class="btn bg-gradient-success col-md-8 btn-flat"><a href="/data_file/{{ $peg->file_npwp }}" style="color:white" target="_blank" rel="noopener noreferrer">Lihat NPWP</button></a>
                </div>
                </div>
                <br><br>
                <div class="col-md-6">
                    <div class="form-group">
                    <br>
                    <button class="btn bg-gradient-success col-md-9 btn-flat"><a href="/data_file/{{ $peg->file_bpjs_ketenagakerjaan }}" style="color:white" target="_blank" rel="noopener noreferrer">Lihat BPJS Ketegakerjaan</button></a>
                </div>
                </div>
            </div>

            <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <br>
                        <button class="btn bg-gradient-success col-md-8 btn-flat"><a href="/data_file/{{ $peg->file_bpjs_kesehatan }}" style="color:white" target="_blank" rel="noopener noreferrer">Lihat BPJS Kesehatan</button></a>
                    </div>
                    </div>
                    <br><br>
                    <div class="col-md-6">
                        <div class="form-group">
                        <br>
                        <button class="btn bg-gradient-success col-md-9 btn-flat"><a href="/data_file/{{ $peg->file_transkrip_nilai }}" style="color:white" target="_blank" rel="noopener noreferrer">Lihat Transkrip Nilai</button></a>
                    </div>
                    </div>
                </div>

            
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <br>
                        <button class="btn bg-gradient-success col-md-8 btn-flat"><a href="/data_file/{{ $peg->file_ijazah }}" style="color:white" target="_blank" rel="noopener noreferrer">Lihat Ijazah</button></a>
                    </div>
                    </div>
                    <br><br>
                    <div class="col-md-6">
                        <div class="form-group">
                        <br>
                        <button class="btn bg-gradient-success col-md-9 btn-flat"><a href="/data_file/{{ $peg->file_surat_keterangan_kerja }}" style="color:white" target="_blank" rel="noopener noreferrer">Lihat Surat Keterangan Kerja</button></a>
                    </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <br>
                        <button class="btn bg-gradient-success col-md-8 btn-flat"><a href="/data_file/{{ $peg->file_kartu_keluarga }}" style="color:white" target="_blank" rel="noopener noreferrer">Lihat Kartu Keluarga</button></a>
                    </div>
                    </div>
                    <br><br>
                    <div class="col-md-6">
                        <div class="form-group">
                        <br>
                        <button class="btn bg-gradient-success col-md-9 btn-flat"><a href="/data_file/{{ $peg->foto }}" style="color:white" target="_blank" rel="noopener noreferrer">Lihat Foto</button></a>
                    </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <br>
                        @if(empty($peg->file_buku_nikah))
                            <button type="button" class="btn bg-gradient-success col-md-8 btn-flat" data-toggle="modal" data-target="#modal-lg-file-buku-nikah">
                            Lihat Buku Nikah
                            </button>
                        @else
                            <button class="btn bg-gradient-success col-md-8 btn-flat"><a href="/data_file/{{ $peg->file_buku_nikah }}" style="color:white" target="_blank" rel="noopener noreferrer">Lihat Buku Nikah</button></a>  
                        @endif
                        </div>
                    </div>
                    <br><br>
                    <div class="col-md-6">
                        <div class="form-group">
                        <br>
                        @if(empty($peg->file_nilai))
                            <button type="button" class="btn bg-gradient-success col-md-9 btn-flat" data-toggle="modal" data-target="#modal-lg">
                            Lihat Nilai Interview
                            </button>
                        @else
                            <button class="btn bg-gradient-success col-md-9 btn-flat"><a href="/data_file/{{ $peg->file_nilai }}" style="color:white" target="_blank" rel="noopener noreferrer">Lihat Nilai Interview</button></a>
                        @endif
                    </div>
                    </div>
                </div>
                @break
                @endforeach
                @else
                <h2> File belum di Upload</h2>
                @endif
                <br>

        <!-- Modal ketika file nilai kosong / belum di upload -->
        <div class="modal fade" id="modal-lg-file-buku-nikah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-danger center">
                <h4 class="modal-title"><i class="icon fas fa-exclamation-triangle"></i> Pemberitahuan !</h4>
            </div>
            <div class="modal-body">
                <br>
                <h5 style="text-align:center">File buku nikah tidak di upload oleh Pelamar.<br>
                Terima kasih.</h5>
                <br>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

        <!-- Modal ketika file nilai kosong / belum di upload -->
        <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-danger center">
                <h4 class="modal-title"><i class="icon fas fa-exclamation-triangle"></i> Pemberitahuan !</h4>
            </div>
            <div class="modal-body">
                <br>
                <h5 style="text-align:center">File nilai interview masih kosong.<br>Jika ingin melihat file, silahkan upload file tersebut.<br>
                Terima kasih.</h5>
                <br>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

                <hr/>
                <div style="text-align:center"><b>Hasil Nilai Interview</b></div><br>
                <!-- Horizontal Form -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Hasil Nilai Interview</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nilai Interview</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="{{ $peg->total_score }}" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Notes and Comments</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="{{ $peg->notes_and_comments }}" readonly>
                    </div>
                  </div>
                </div>
                <br>
                <!-- /.card-body -->
                <div class="card-footer bg-white">
                    <b>Score guidelines:</b><br>
                    <b>•	31 – 40: Very recommended</b><br>
                    <b>•	21 – 30: Recommended with note</b><br>
                    <b>•	1 – 20: Refused</b>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
            
                <!-- <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Nilai Interview</b>
                            <input class="form-control" value="{{ $peg->total_score }}" readonly required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Notes and Comments</b>
                            <input class="form-control" value="{{ $peg->notes_and_comments }}" readonly required>
                        </div>
                    </div>
                </div>
                <br>
                <div>
                <b>Score guidelines:</b><br>
                <b>•	31 – 40: Very recommended</b><br>
                <b>•	21 – 30: Recommended with note</b><br>
                <b>•	1 – 20: Refused</b></div><br> -->
              
                
                 <br>
                 <hr/>
                 <br>
                 <form class="form-detail" action="{{ url('/upload/proses',$peg->id) }}" enctype="multipart/form-data" method="POST" id="myform">
                {{ csrf_field() }}
                @method('patch')

                <!-- Upload Nilai -->
                <div class="form-detail">
                    <label style="color:black">Upload Hasil Nilai Interview<br>(* Max : 5 mb | format : pdf )</label>
                    <input class="form-control" type="file" name="file_nilai" class="form-control-file border">
                </div>
                <br>
                

                <!-- Button Upload Nilai -->
                <div class="form-detail align-items-center justify-content">
                    <input class="btn btn-primary" type="submit" value="Upload Nilai">
                </form>
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
    @include('sweetalert::alert')
<!-- /.REQUIRED SCRIPTS -->
</body>
</html>

