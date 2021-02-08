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
          <h1 class="m-0">Tambah Data Karyawan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <button class="btn bg-gradient-success"><li class="breadcrumb-item"><a href="{{ route('data-karyawan')}}" style="color:white">Kembali Data Karyawan</a></li></button>
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
              @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    {{ $error }} <br/>
                    @endforeach
                </div>
                @endif

              <!-- START ALERTS AND CALLOUTS -->
                <div class="row">
                <div class="col-md-6">
                <div class="card card-default">
                
                <!-- /.card-header -->
        <form class="form-detail" action="/tambah/proses" enctype="multipart/form-data" method="POST" id="myform">
        {{ csrf_field() }}
                

                <div class="card-body">
                <div class="form-group">
                    <b>Status Karyawan</b>
                    <select class="form-control" name="int_emp_status" id="int_emp_status">
                        <option value>Pilih Status Karyawan</option>
                        @foreach($kode_generate ?? '' as $kode_generate)
                        <option value="{{ $kode_generate->id_kode }}" {{ old('int_emp_status') == "$kode_generate->id_kode" ? 'selected' : '' }}>{{ $kode_generate->keterangan_kode }}</option>
                        @endforeach
                    </select> 
                </div>

                <div class="form-group" hidden>
                    <b>Nomor Karyawan</b>
                    <input class="form-control" name="int_emp_number" type="text" value="{{ $kode }}" readonly hidden>
                    {!! $errors->first('int_emp_number', "<p class='invalid-feedback'>:message</p>") !!}
                </div>
                
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Nama Karyawan</b>
                            <input class="form-control" name="int_emp_name" type="text" value="{{ old('int_emp_name') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Nama Panggilan</b>
                            <input class="form-control" name="int_emp_pref_name" type="text" value="{{ old('int_emp_pref_name') }}">
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Jenis Kelamin</b>
                            <select name="int_emp_gender" class="form-control">
                                    <option value="">Jenis Kelamin </option>
                                    <option value="Laki-Laki" {{ old('int_emp_gender') == "Laki-Laki" ? 'selected' : '' }}>Laki - Laki </option>
                                    <option value="Perempuan" {{ old('int_emp_gender') == "Perempuan" ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Status Pernikahan</b>
                            <select name="int_emp_marital" class="form-control"   >
                                    <option value="">Status Pernikahan</option>
                                    <option value="Lajang"  {{ old('int_emp_marital') == "Lajang" ? 'selected' : '' }}>Lajang</option>
                                    <option value="Menikah" {{ old('int_emp_marital') == "Menikah" ? 'selected' : '' }}>Menikah</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Agama</b>
                            <select name="int_emp_religion" class="form-control"   >
                                    <option value="">Agama </option>
                                    <option value="Islam" {{ old('int_emp_religion') == "Islam" ? 'selected' : '' }}>Islam</option>
                                    <option value="Kristen Protestan" {{ old('int_emp_religion') == "Kristen Protestan" ? 'selected' : '' }}>Kristen Protestan</option>
                                    <option value="Kristen Katolik" {{ old('int_emp_religion') == "Kristen Katolik" ? 'selected' : '' }}>Kristen Katolik</option>
                                    <option value="Hindu" {{ old('int_emp_religion') == "Hindu" ? 'selected' : '' }}>Hindu</option>
                                    <option value="Budha" {{ old('int_emp_religion') == "Budha" ? 'selected' : '' }}>Budha</option>
                                    <option value="Konghucu" {{ old('int_emp_religion') == "Konghucu" ? 'selected' : '' }}>Konghucu</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Kategori Pajak</b>
                            <select name="int_emp_tax_cat" class="form-control"   >
                                    <option value="">Kategori Pajak </option>
                                    <option value="S0" {{ old('int_emp_tax_cat') == "S0" ? 'selected' : '' }}>S0</option>
                                    <option value="S1" {{ old('int_emp_tax_cat') == "S1" ? 'selected' : '' }}>S1</option>
                                    <option value="S2" {{ old('int_emp_tax_cat') == "S2" ? 'selected' : '' }}>S2</option>
                                    <option value="S3" {{ old('int_emp_tax_cat') == "S3" ? 'selected' : '' }}>S3</option>
                                    <option value="M0" {{ old('int_emp_tax_cat') == "M0" ? 'selected' : '' }}>M0</option>
                                    <option value="M1" {{ old('int_emp_tax_cat') == "M1" ? 'selected' : '' }}>M1</option>
                                    <option value="M2" {{ old('int_emp_tax_cat') == "M2" ? 'selected' : '' }}>M2</option>
                                    <option value="M3" {{ old('int_emp_tax_cat') == "M3" ? 'selected' : '' }}>M3</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Tanggal Lahir</b>
                            <input class="form-control" id="int_emp_dob" name="int_emp_dob" type="date" value="{{ old('int_emp_dob') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Kebangsaan</b>
                            <select name="int_emp_nation" class="form-control">
                                    <option value="">Kebangsaan</option>
                                    <option value="WNI" {{ old('int_emp_nation') == "WNI" ? 'selected' : '' }}>WNI</option>
                                    <option value="WNA" {{ old('int_emp_nation') == "WNA" ? 'selected' : '' }}>WNA</option>
                            </select>
                        </div>
                    </div>
                </div>
                    
                <div class="form-group">
                    <b>KTP</b>
                    <input class="form-control" name="int_emp_ktp" onkeypress="return onlyNumber(event)" maxlength="16" type="text" value="{{ old('int_emp_ktp') }}">
                </div>
                <br>

                <div class="form-group">
                    <label for="primaryaddress">Alamat berdasarkan KTP</label>
                    <textarea class="form-control" name="int_emp_add1" type="text" id="primaryaddress" value="{{ old('int_emp_add1') }}"> {{ old('int_emp_add1') }}</textarea>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Provinsi</b>
                            <select name="int_emp_provinces1" id="provinces" class="form-control input-lg dynamic primaryprovinsi" data-dependent="Provinsi">
                                <option value="">Pilih Provinsi</option>
                                @foreach($provinces_list as $provinces)
                                <option value="{{$provinces->id}}">{{$provinces->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Kota</b>
                            <select name="int_emp_regencies1" id="regencies" class="form-control input-lg dynamic1" data-dependent="Kota">
                                    <option class="form-control py-4" value="">Pilih Kota</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Kecamatan</b>
                            <select name="int_emp_districts1" id="districts" class="form-control input-lg dynamic2" data-dependent="Kecamatan"   >
                                    <option class="form-control py-4" value="">Pilih Kecamatan </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Kelurahan</b>
                            <select name="int_emp_villages1" id="villages" class="form-control input-lg" data-dependent="Kelurahan"   >
                                    <option class="form-control py-4" value="">Pilih Kelurahan</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="primaryzip">Kode Pos</label>
                            <input class="form-control" name="int_emp_kode_pos1" onkeypress="return onlyNumber(event)" maxlength="5" id="primaryzip" type="text" value="{{ old('int_emp_kode_pos1') }}">
                        </div>
                    </div>
                </div>
                <br>

                <input type="checkbox" id="same" name="same" onchange= "addressFunction()"/>              
                <label for = "same">Jika alamat saat ini sama dengan KTP silahkan di centang.</label> 

                <div class="form-group">
                    <label for="secondaryaddress">Alamat saat ini</label>
                    <textarea class="form-control" name="int_emp_add2" id="secondaryaddress" type="text" value="{{ old('int_emp_add2') }}"> {{ old('int_emp_add2') }}</textarea>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Provinsi</b>
                            <select id="provinces2" class="form-control input-lg dynamic23 provinsiclass" data-dependent="Provinsi"   >
                                    <option class="form-control py-4" value="">Pilih Provinsi</option>
                                    @foreach($provinces_list2 as $provinces)
                                        <option value="{{$provinces->id}}">{{$provinces->name}}</option>
                                    @endforeach
                            </select>
                            <!--// fungsi untuk read only ketika alamat saat ini di ceklis otomatis -->
                            <input type="text" id="provinces3" name="int_emp_provinces2" hidden>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Kota</b>
                            <select id="regencies2" class="form-control input-lg dynamic12 kotaclass" data-dependent="Kota"   >
                                    <option class="form-control py-4" value="">Pilih Kota</option>
                            </select>
                            <!--// fungsi untuk read only ketika alamat saat ini di ceklis otomatis -->
                            <input type="text" id="regencies3" name="int_emp_regencies2" hidden>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Kecamatan</b>
                            <select id="districts2" class="form-control input-lg dynamic22 kecamatanclass"  data-dependent="Kecamatan"   >
                                    <option class="form-control py-4" value="">Pilih Kecamatan </option>
                            </select>
                            <!--// fungsi untuk read only ketika alamat saat ini di ceklis otomatis -->
                            <input type="text" id="districts3" name="int_emp_districts2" hidden>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Kelurahan</b>
                            <select id="villages2" class="form-control input-lg kelurahanclass"  data-dependent="Kelurahan"   >
                                    <option class="form-control py-4" value="">Pilih Kelurahan</option>
                            </select>
                            <!--// fungsi untuk read only ketika alamat saat ini di ceklis otomatis -->
                            <input type="text" id="villages3" name="int_emp_villages2" hidden>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="secondaryzip">Kode Pos</label>
                            <input class="form-control" name="int_emp_kode_pos2" onkeypress="return onlyNumber(event)" maxlength="5" id="secondaryzip" type="text" value="{{ old('int_emp_kode_pos2') }}">
                        </div>
                    </div>
                </div>
                <br>
        
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Email Pribadi</b>
                            <input class="form-control" name="int_emp_email" type="email" value="{{ old('int_emp_email') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Email NAP</b>
                            <input class="form-control" name="int_emp_email_nap" type="email" value="{{ old('int_emp_email_nap') }}" >
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Bergabung Tanggal</b>
                            <input class="form-control" name="int_emp_joindate" type="date" value="{{ old('int_emp_joindate') }}">
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Lokasi</b>
                            <input class="form-control" name="int_emp_location" type="text" value="{{ old('int_emp_location') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Sub Region</b>
                            <input class="form-control" name="int_emp_subregion" type="text" value="{{ old('int_emp_subregion') }}">
                        </div>
                    </div>
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

                <div class="form-group">
                    <b>COA</b>
                    <input class="form-control" name="int_emp_coa" type="text" value="{{ old('int_emp_coa') }}">
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <b>Direktorat</b>
                            <select name="int_emp_directorate" class="form-control">
                                <option value>Pilih Direktorat</option>
                                @foreach($directorates ?? '' as $directorates)
                                <option value="{{ $directorates->directorate_id }}" {{ old('int_emp_directorate') == "$directorates->directorate_id" ? 'selected' : '' }}>{{ $directorates->directorate_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <b>Divisi</b>
                            <select class="form-control" name="int_emp_division" id="int_emp_division">
                                <option value>Pilih Divisi</option>
                                @foreach($divisions ?? '' as $divisions)
                                <option value="{{ $divisions->division_id }}" {{ old('int_emp_division') == "$divisions->division_id" ? 'selected' : '' }}>{{ $divisions->division_name }}</option>
                                @endforeach
                            </select>   
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <b>Departemen</b>
                            <select class="form-control department_reportline_name selectsearch" name="int_emp_department" id="int_emp_department"   >
                                <option value>Pilih Department</option>
                                @foreach($departments ?? '' as $departments)
                                <option value="{{ $departments->department_id }}" {{ old('int_emp_department') == "$departments->department_id" ? 'selected' : '' }}>{{ $departments->department_name }}</option>
                                @endforeach
                            </select> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <b>Posisi</b>
                            <select class="form-control selectsearch" name="int_emp_position">
                                    <option value="">Pilih Posisi</option>
                                    @foreach($positions ?? '' as $positions)
                                    <option value="{{ $positions->position_id }}" {{ old('int_emp_position') == "$positions->position_id" ? 'selected' : '' }}>{{ $positions->position_name }}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Hari Kerja</b>
                            <input class="form-control" name="int_emp_workday" type="text" value="{{ old('int_emp_workday') }}">
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Nomor Rekening</b>
                            <input class="form-control" name="int_emp_accountno" onkeypress="return onlyNumber(event)" maxlength="30" type="text" value="{{ old('int_emp_accountno') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Nama Akun</b>
                            <input class="form-control" name="int_emp_accountname" type="text" value="{{ old('int_emp_accountname') }}">
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Bank Swift</b>
                            <input class="form-control" name="int_emp_bankswift" type="text" value="{{ old('int_emp_bankswift') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Bank Branch</b>
                            <input class="form-control" name="int_emp_bankbranch" type="text" value="{{ old('int_emp_bankbranch')}}">
                        </div>
                    </div>
                </div>
                <br>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>ID Pajak</b>
                            <input class="form-control" name="int_emp_taxid" onkeypress="return onlyNumber(event)" maxlength="30" type="text" value="{{ old('int_emp_taxid') }}">    
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Alamat Pajak</b>
                            <input class="form-control" name="int_emp_taxadd" type="text" value="{{ old('int_emp_taxadd') }}">
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>BPJS Ketenagakerjaan</b>
                            <input class="form-control" name="int_emp_bpjstk" onkeypress="return onlyNumber(event)" maxlength="30" type="text" value="{{ old('int_emp_bpjstk') }}">    
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>BPJS Kesehatan</b>
                            <input class="form-control" name="int_emp_bpjsk" onkeypress="return onlyNumber(event)" maxlength="30" type="text" value="{{ old('int_emp_bpjsk') }}">                          
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Tanggal Resign</b>
                            <input class="form-control" name="int_emp_resigndate" type="date" value="">
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>No Telephone</b>
                            <input class="form-control" name="int_emp_phone_home" onkeypress="return onlyNumber(event)" maxlength="14" type="text" value="{{ old('int_emp_phone_home') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>No Handphone</b>
                            <input class="form-control" name="int_emp_phone_mobile" onkeypress="return onlyNumber(event)" maxlength="14" type="text" value="{{ old('int_emp_phone_mobile') }}">
                        </div>
                    </div>
                </div>

                <div class="form-group" hidden>
                        <b>Lama kerja</b>
                        <input class="form-control" name="int_emp_worklength" type="text" value="" hidden>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Level</b>
                            <select name="int_emp_level" class="form-control">
                                    <option value="">Level</option>
                                    <option value="Managing Director" {{ old('int_emp_level') == "Managing Director" ? 'selected' : '' }}>Managing Director</option>
                                    <option value="Chief / Director" {{ old('int_emp_level') == "Chief / Director" ? 'selected' : '' }}>Chief / Director</option>
                                    <option value="Division Head" {{ old('int_emp_level') == "Division Head" ? 'selected' : '' }}>Division Head</option>
                                    <option value="Advisor" {{ old('int_emp_level') == "Advisor" ? 'selected' : '' }}>Advisor</option>
                                    <option value="Department Head" {{ old('int_emp_level') == "Department Head" ? 'selected' : '' }}>Department Head</option>
                                    <option value="Expert" {{ old('int_emp_level') == "Expert" ? 'selected' : '' }}>Expert</option>
                                    <option value="Unit Head" {{ old('int_emp_level') == "Unit Head" ? 'selected' : '' }}>Unit Head</option>
                                    <option value="Specialist" {{ old('int_emp_level') == "Specialist" ? 'selected' : '' }}>Specialist</option>
                                    <option value="Analyst" {{ old('int_emp_level') == "Analyst" ? 'selected' : '' }}>Analyst</option>
                                    <option value="Officer" {{ old('int_emp_level') == "Officer" ? 'selected' : '' }}>Officer</option>
                                    <option value="Partner Service / Outsource" {{ old('int_emp_level') == "Partner Service / Outsource" ? 'selected' : '' }}>Partner Service / Outsource</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Nilai / Grading</b>
                            <select name="int_emp_grading" class="form-control">
                                    <option value="">Nilai / Grading</option>
                                    <option value="A" {{ old('int_emp_grading') == "A" ? 'selected' : '' }}>A</option>
                                    <option value="B" {{ old('int_emp_grading') == "B" ? 'selected' : '' }}>B</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Kendaraan</b>
                            <select name="int_emp_vehicle" class="form-control">
                                    <option value="">Kendaraan</option>
                                    <option value="Pribadi" {{ old('int_emp_vehicle') == "Pribadi" ? 'selected' : '' }}>Pribadi</option>
                                    <option value="Umum" {{ old('int_emp_vehicle') == "Umum" ? 'selected' : '' }}>Umum</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Type Transportasi</b>
                            <select name="int_emp_transtype" class="form-control">
                                    <option value="">Type Transportasi</option>
                                    <option value="Mobil" {{ old('int_emp_transtype') == "Mobil" ? 'selected' : '' }}>Mobil</option>
                                    <option value="Motor" {{ old('int_emp_transtype') == "Motor" ? 'selected' : '' }}>Motor</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <b>Report Line</b>
                    <input class="form-control pic" name="int_emp_reportline" type="text" value="{{ old('int_emp_reportline') }}" readonly>
                </div>

                <div class="form-group">
                    <b>NPWP Terdaftar</b>
                    <input class="form-control" name="int_emp_regisnpwp" onkeypress="return onlyNumber(event)" maxlength="30" type="text" value="{{ old('int_emp_regisnpwp') }}">    
                </div>

                <div class="form-group">
                    <b>Status</b>
                    <select name="int_emp_statuss" class="form-control">
                        <option value="">Status</option>
                        <option value="1" {{ old('int_emp_statuss') == "1" ? 'selected' : '' }}>Aktif</option>
                        <option value="2" {{ old('int_emp_statuss') == "2" ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                </div>

                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                <input type="submit" name="submit" class="btn btn-primary btn-block" value="Tambah Data">

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

<script>
function onlyNumber(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57)){
            return false;
        }
    return true;
}
</script>


<script>
    $(document).ready(function() 
    {
    $('.selectsearch').select2();
    });
</script>


<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('change','.department_reportline_name',function () {
			var dept_id=$(this).val();
			var a=$(this).parent().parent().parent().parent();
			console.log(dept_id);
			var op="";
			$.ajax({
				type:'get',
				url:'{!!URL::to('findReportLineName')!!}',
				data:{'id':dept_id},
				dataType:'json',//return data will be json
				success:function(data){
					console.log("reportline_name");
					console.log(data.reportline_name);

					// here price is coloumn name in products table data.coln name
					
                    a.find('.pic').val(data.reportline_name);
				
                },
				error:function(){

				}
			});
		});
	});
</script>

<script>
$(document).ready(function(){
    $('.dynamic').change(function(){
    if($(this).val() != '')
    {   
    var value = $(this).val();   
    var _token = $('input[name="_token"]').val();      
    $.ajax({
    url:"{{ route('dynamicdependent.regencies') }}",
    method:"POST",
    data:{value:value, _token:_token},    
    success:function(result)
    {                
        $('#regencies').html(result);
    }
    })
    }
    });
    $('.dynamic1').change(function(){
    if($(this).val() != '')
    {   
    var value = $(this).val();   
    var _token = $('input[name="_token"]').val();   
    $.ajax({
    url:"{{ route('dynamicdependent.districts') }}",
    method:"POST",
    data:{value:value, _token:_token},    
    success:function(result)
    {        
        $('#districts').html(result);
    }
    })
    }
    });
    $('.dynamic2').change(function(){
    if($(this).val() != '')
    {   
    var value = $(this).val();   
    var _token = $('input[name="_token"]').val();   
    $.ajax({
    url:"{{ route('dynamicdependent.villages') }}",
    method:"POST",
    data:{value:value, _token:_token},    
    success:function(result)
    {  
        $('#villages').html(result);
    }
    })
    }
    });
    $('#provinces').change(function(){
    $('#regencies').val('');
    $('#districts').val('');
    $('#villages').val('');
    });
    $('#regencies').change(function(){
    $('#districts').val('');
    $('#villages').val('');
    });
    $('#districts').change(function(){  
    $('#village').val('');
    });
});
</script>

<script>
$(document).ready(function(){
 $('.dynamic23').change(function(){
  if($(this).val() != '')
  {   
   var value = $(this).val();   
   var _token = $('input[name="_token"]').val();      
   $.ajax({
    url:"{{ route('dynamicdependent2.regencies2') }}",
    method:"POST",
    data:{value:value, _token:_token},    
    success:function(result)
    {                
     $('#regencies2').html(result);
    }
   })
  }
 });
 $('.dynamic12').change(function(){
  if($(this).val() != '')
  {   
   var value = $(this).val();   
   var _token = $('input[name="_token"]').val();   
   $.ajax({
    url:"{{ route('dynamicdependent2.districts2') }}",
    method:"POST",
    data:{value:value, _token:_token},    
    success:function(result)
    {        
     $('#districts2').html(result);
    }
   })
  }
 });
 $('.dynamic22').change(function(){
  if($(this).val() != '')
  {   
   var value = $(this).val();   
   var _token = $('input[name="_token"]').val();   
   $.ajax({
    url:"{{ route('dynamicdependent2.villages2') }}",
    method:"POST",
    data:{value:value, _token:_token},    
    success:function(result)
    {        
     $('#villages2').html(result);
    }
   })
  }
 });
 $('#provinces2').change(function(){
  $('#regencies2').val('');
  $('#districts2').val('');
  $('#villages2').val('');
 });
 $('#regencies2').change(function(){
  $('#districts2').val('');
  $('#villages2').val('');
 });
 $('#districts2').change(function(){  
  $('#village2').val('');
 });
});
</script>

<script>
$('#provinces2').on('change', function() {
    $('#provinces3').val(this.value);
});
$('#regencies2').on('change', function() {
    $('#regencies3').val(this.value);
});
$('#districts2').on('change', function() {
    $('#districts3').val(this.value);
});
$('#villages2').on('change', function() {
    $('#villages3').val(this.value);
});
</script>

<script>          
function addressFunction() 
{ 
  if (document.getElementById('same').checked) 
  { 
    document.getElementById('secondaryaddress').value=document.
             getElementById('primaryaddress').value
    $("#secondaryaddress").prop("readOnly", true);
 
    document.getElementById('secondaryzip').value=document. 
             getElementById('primaryzip').value
    $("#secondaryzip").prop("readOnly", true);

    let dataForProvinces = []; // buat object untuk di jadikan array
    var e = document.getElementById("provinces"); // ambil id berdasarkan getElementById
    var strValueProvinces = e.options[e.selectedIndex].value; // pisah value dari getElementById
    console.log(strValueProvinces)
    var strTextProvinces = e.options[e.selectedIndex].text; // pisah juga untuk text dari getElementById
    dataForProvinces.push({"id":strValueProvinces,"name":strTextProvinces}); // gabungin disini dalam bentuk array yang sudah buat object nya di atas tadi
    console.log(dataForProvinces)
    $("#provinces2").val(strValueProvinces); // masukin id dari strValueRegencies untuk di tampilkan di halaman
    // fungsi untuk read only ketika alamat saat ini di ceklis otomatis
    $('.provinsiclass').attr("disabled", true);
    $(".provinsiclass").val(dataForProvinces[0].id);
    $("#provinces3").val(dataForProvinces[0].id);    
    
    
    
    let dataForRegencies = []; // buat object untuk di jadikan array
    var e = document.getElementById("regencies"); // ambil id berdasarkan getElementById
    var strValueRegencies = e.options[e.selectedIndex].value; // pisah value dari getElementById
    var strTextRegencies = e.options[e.selectedIndex].text; // pisah juga untuk text dari getElementById
    dataForRegencies.push({"id":strValueRegencies,"name":strTextRegencies}); // gabungin disini dalam bentuk array yang sudah buat object nya di atas tadi
    console.log(dataForRegencies)
    $(".kotaclass").append("<option value='"+dataForRegencies[0].id+"'>"+dataForRegencies[0].name+"</option>"); //  masukin id dari strValueRegencies untuk di tampilkan di halaman
	document.getElementById('regencies2').value=document.
    getElementById('regencies').value;
    $("#regencies2").val(strValueRegencies); // masukin id dari strValueRegencies untuk di tampilkan di halaman
    // fungsi untuk read only ketika alamat saat ini di ceklis otomatis
    $('.kotaclass').attr("disabled", true);
    $(".kotaclass").val(dataForRegencies[0].id);
    $("#regencies3").val(dataForRegencies[0].id);
    
    
    let dataForDistricts = []; // buat object untuk di jadikan array
    var e = document.getElementById("districts"); // ambil id berdasarkan getElementById
    var strValueDistricts = e.options[e.selectedIndex].value; // pisah value dari getElementById
    var strTextDistricts = e.options[e.selectedIndex].text; // pisah juga untuk text dari getElementById
    dataForDistricts.push({"id":strValueDistricts,"name":strTextDistricts}); // gabungin disini dalam bentuk array yang sudah buat object nya di atas tadi
    console.log(dataForDistricts)
    $(".kecamatanclass").append("<option value='"+dataForDistricts[0].id+"'>"+dataForDistricts[0].name+"</option>"); //ss masukin id dari strValueRegencies untuk di tampilkan di halaman
	document.getElementById('districts2').value=document.
    getElementById('districts').value;
    $("#districts2").val(strValueDistricts); // masukin id dari strValueRegencies untuk di tampilkan di halaman
    // fungsi untuk read only ketika alamat saat ini di ceklis otomatis
    $('.kecamatanclass').attr("disabled", true);
    $(".kecamatanclass").val(dataForDistricts[0].id);
    $("#districts3").val(dataForDistricts[0].id);
    

    let dataForVillages = []; // buat object untuk di jadikan array
    var e = document.getElementById("villages"); // ambil id berdasarkan getElementById
    var strValueVillages = e.options[e.selectedIndex].value; // pisah value dari getElementById
    var strTextVillages = e.options[e.selectedIndex].text; // pisah juga untuk text dari getElementById
    dataForVillages.push({"id":strValueVillages,"name":strTextVillages}); // gabungin disini dalam bentuk array yang sudah buat object nya di atas tadi
    //console.log(dataForVillages[0].id);
    console.log(dataForVillages);
    $(".kelurahanclass").append("<option value='"+dataForVillages[0].id+"'>"+dataForVillages[0].name+"</option>"); //ss masukin id dari strValueRegencies untuk di tampilkan di halaman
    document.getElementById('villages2').value=document.
    getElementById('villages').value;
    $("#villages2").val(strValueVillages); // masukin id dari strValueRegencies untuk di tampilkan di halaman
    // fungsi untuk read only ketika alamat saat ini di ceklis otomatis 
    $('.kelurahanclass').attr("disabled", true);
    $(".kelurahanclass").val(dataForVillages[0].id);
    $("#villages3").val(dataForVillages[0].id);
  }
  else
  { 
    document.getElementById('secondaryaddress').value=""; 
    document.getElementById('provinces2').value=""; 
    document.getElementById('regencies2').value="";
    document.getElementById('districts2').value=""; 
    document.getElementById('villages2').value=""; 
    document.getElementById('secondaryzip').value="";
    $('#provinces3').val("");
    $('#regencies3').val("");
    $('#districts3').val("");
    $('#villages3').val("");
    $('#provinces2').removeAttr('disabled', false);
    $('#regencies2').removeAttr('disabled', false);
    $('#districts2').removeAttr('disabled', false);
    $('#villages2').removeAttr('disabled', false);
    $("#secondaryaddress").prop("readOnly", false);  
    $("#secondaryzip").prop("readOnly", false);   
  } 
}
</script>
