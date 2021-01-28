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
                    <select class="form-control" name="int_emp_status" id="int_emp_status"   >
                        <option value>Pilih Status Karyawan</option>
                        @foreach($kode_generate ?? '' as $kode_generate)
                        <option value="{{ $kode_generate->id_kode }}">{{ $kode_generate->keterangan_kode }}</option>
                        @endforeach
                    </select> 
                </div>

                <div class="form-group">
                    <b>Nomor Karyawan</b>
                    <input class="form-control" name="int_emp_number" type="text" value="{{ $kode }}" readonly>
                    {!! $errors->first('int_emp_number', "<p class='invalid-feedback'>:message</p>") !!}
                </div>
                
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Nama Karyawan</b>
                            <input class="form-control" name="int_emp_name" type="text" value=""   >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Nama Panggilan</b>
                            <input class="form-control" name="int_emp_pref_name" type="text" value=""   >
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Jenis Kelamin</b>
                            <select name="int_emp_gender" class="form-control"   >
                                    <option value="">Jenis Kelamin </option>
                                    <option value="Laki-Laki">Laki - Laki </option>
                                    <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Status Pernikahan</b>
                            <select name="int_emp_marital" class="form-control"   >
                                    <option value="">Status Pernikahan</option>
                                    <option value="Lajang">Lajang</option>
                                    <option value="Menikah">Menikah</option>
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
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen Protestan">Kristen Protestan</option>
                                    <option value="Kristen Katolik">Kristen Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Konghucu">Konghucu</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Kategori Pajak</b>
                            <select name="int_emp_tax_cat" class="form-control"   >
                                    <option value="">Kategori Pajak </option>
                                    <option value="S0">S0</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                    <option value="M0">M0</option>
                                    <option value="M1">M1</option>
                                    <option value="M2">M2</option>
                                    <option value="M3">M3</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Tanggal Lahir</b>
                            <input class="form-control" id="int_emp_dob" name="int_emp_dob" type="date"   >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Kebangsaan</b>
                            <select name="int_emp_nation" class="form-control"   >
                                    <option value="">Kebangsaan</option>
                                    <option value="WNI">WNI</option>
                                    <option value="WNA">WNA</option>
                            </select>
                        </div>
                    </div>
                </div>
                    
                <div class="form-group">
                    <b>KTP</b>
                    <input class="form-control" name="int_emp_ktp" onkeypress="return onlyNumber(event)" maxlength="16" type="text" value=""   >
                </div>
                <br>

                <div class="form-group">
                    <label for="primaryaddress">Alamat berdasarkan KTP</label>
                    <textarea class="form-control" name="int_emp_add1" type="text" id="primaryaddress"   ></textarea>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Provinsi</b>
                            <select name="int_emp_provinces1" id="provinces" class="form-control input-lg dynamic primaryprovinsi" data-dependent="Provinsi"   >
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
                            <select name="int_emp_regencies1" id="regencies" class="form-control input-lg dynamic1" data-dependent="Kota"   >
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
                            <input class="form-control" name="int_emp_kode_pos1" onkeypress="return onlyNumber(event)" maxlength="5" id="primaryzip" type="text" value=""   >
                        </div>
                    </div>
                </div>
                <br>

                <input type="checkbox" id="same" name="same" onchange= "addressFunction()"/>              
                <label for = "same">Jika alamat saat ini sama dengan KTP silahkan di centang.</label> 

                <div class="form-group">
                    <label for="secondaryaddress">Alamat saat ini</label>
                    <textarea class="form-control" name="int_emp_add2" id="secondaryaddress" type="text"   ></textarea>
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
                            <input class="form-control" name="int_emp_kode_pos2" onkeypress="return onlyNumber(event)" maxlength="5" id="secondaryzip" type="text" value=""   >
                        </div>
                    </div>
                </div>
                <br>
        
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Email Pribadi</b>
                            <input class="form-control" name="int_emp_email" type="email" value=""   >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Email NAP</b>
                            <input class="form-control" name="int_emp_email_nap" type="email" value=""   >
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Bergabung Tanggal</b>
                            <input class="form-control" name="int_emp_joindate" type="date" value=""   >
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Lokasi</b>
                            <input class="form-control" name="int_emp_location" type="text" value=""   >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Sub Region</b>
                            <input class="form-control" name="int_emp_subregion" type="text" value=""   >
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
                    <input class="form-control" name="int_emp_coa" type="text" value=""   >
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <b>Direktorat</b>
                            <select name="int_emp_directorate" class="form-control"   >
                                <option value="">Pilih Direktorat</option>
                                <option value="Chief Commercial Officer">Chief Commercial Officer</option>
                                <option value="Chief Finance Officer / Director">Chief Finance Officer / Director</option>
                                <option value="Chief Business & System Support">Chief Business & System Support</option>
                                <option value="Chief Network Officer">Chief Network Officer</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <b>Divisi</b>
                            <select class="form-control" name="int_emp_division" id="int_emp_division"   >
                                <option value>Pilih Divisi</option>
                                @foreach($divisions ?? '' as $divisions)
                                <option value="{{ $divisions->division_id }}">{{ $divisions->division_name }}</option>
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
                                <option value="{{ $departments->department_id }}">{{ $departments->department_name }}</option>
                                @endforeach
                            </select> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <b>Posisi</b>
                            <select name="int_emp_position" class="form-control selectsearch"   >
                                    <option value="">Pilih Posisi</option>
                                    <option value="Customer Engagement">Customer Engagement</option>
                                    <option value="Sr Customer Care Associate">Sr Customer Care Associate</option>
                                    <option value="Customer Care Associate">Customer Care Associate</option>
                                    <option value="Customer Support Engineer">Customer Support Engineer</option>
                                    <option value="Sales Support Admin">Sales Support Admin</option>
                                    <option value="Sales Support Engineer">Sales Support Engineer</option>
                                    <option value="Sales Support Engineer (Bandung)">Sales Support Engineer (Bandung)</option>
                                    <option value="Marketing Communication">Marketing Communication</option>
                                    <option value="Digital Communication">Digital Communication</option>
                                    <option value="AM - Enterprise Sales">AM - Enterprise Sales</option>
                                    <option value="AM - Enterprise Sales (Bandung)">AM - Enterprise Sales (Bandung)</option>
                                    <option value="AE - Enterprise Sales">AE - Enterprise Sales</option>
                                    <option value="AM - Wholesale Sales">AM - Wholesale Sales</option>
                                    <option value="AM - Government Sales">AM - Government Sales</option>
                                    <option value="Key Account Manager">Key Account Manager</option>
                                    <option value="Senior Accounting Associate">Senior Accounting Associate</option>
                                    <option value="Accounting Associate">Accounting Associate</option>
                                    <option value="Tax Associate">Tax Associate</option>
                                    <option value="Finance Associate">Finance Associate</option>
                                    <option value="Budget Control Associate">Budget Control Associate</option>
                                    <option value="Revenue Assurance Associate">Revenue Assurance Associate</option>
                                    <option value="Risk & Compliance Associate">Risk & Compliance Associate</option>
                                    <option value="Partner Sourcing Manager">Partner Sourcing Manager</option>
                                    <option value="Property Relation">Property Relation</option>
                                    <option value="Procurrement Associate">Procurrement Associate</option>
                                    <option value="Facility & Asset Management Associate">Facility & Asset Management Associate</option>
                                    <option value="Quality Assurance Engineer">Quality Assurance Engineer</option>
                                    <option value="UI / UX Developer">UI / UX Developer</option>
                                    <option value="Application Developer">Application Developer</option>
                                    <option value="System Engineer">System Engineer</option>
                                    <option value="Helpdesk Support Associate">Helpdesk Support Associate</option>
                                    <option value="Capacity Design Senior Engineer">Capacity Design Senior Engineer</option>
                                    <option value="Capacity Design Engineer">Capacity Design Engineer</option>
                                    <option value="Network Senior Architect">Network Senior Architect</option>
                                    <option value="Network Architect">Network Architect</option>
                                    <option value="Network Senior Engineer">Network Senior Engineer</option>
                                    <option value="Network Engineer">Network Engineer</option>
                                    <option value="Network Monitoring Engineer">Network Monitoring Engineer</option>
                                    <option value="Monitoring Support Engineer">Monitoring Support Engineer</option>
                                    <option value="Service Delivery Engineer">Service Delivery Engineer</option>
                                    <option value="Field Support">Field Support</option>
                                    <option value="Service Deliery Engineer (Bandung)">Service Deliery Engineer (Bandung)</option>
                                    <option value="Field Support (Bandung)">Field Support (Bandung)</option>
                                    <option value="Field Support (Surabaya)">Field Support (Surabaya)</option>
                                    <option value="Admin Support">Admin Support</option>
                                    <option value="Project Management">Project Management</option>
                                    <option value="Infrastructure Engineer">Infrastructure Engineer</option>
                                    <option value="Infrastructure Support">Infrastructure Support</option>
                                    <option value="NQI Engineer">NQI Engineer</option>
                                    <option value="Data Center Support (PKU)">Data Center Support (PKU)</option>
                                    <option value="Data Center Support (Cyber1)">Data Center Support (Cyber1)</option>
                                    <option value="CLS Engineer (PM)">CLS Engineer (PM)</option>
                                    <option value="CLS Support (PM)">CLS Support (PM)</option>
                                    <option value="CLS Engineer (BTM)">CLS Engineer (BTM)</option>
                                    <option value="Legal Associate">Legal Associate</option>
                                    <option value="Human Capital Associate">Human Capital Associate</option>
                                    <option value="Driver">Driver</option>
                                    <option value="Messenger">Messenger</option>
                                    <option value="Strategic Planning Manager">Strategic Planning Manager</option>
                                    <option value="Corporate Planning Associate">Corporate Planning Associate</option>
                                    <option value="Office Boy">Office Boy</option>
                                    <option value="Office Boy (PKU)">Office Boy (PKU)</option>
                                    <option value="Office Boy (PM)">Office Boy (PM)</option>
                                    <option value="Office Boy (BTM)">Office Boy (BTM)</option>
                                    <option value="Receptionist">Receptionist</option>
                                    <option value="Internal Audit Associate">Internal Audit Associate</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Hari Kerja</b>
                            <input class="form-control" name="int_emp_workday" type="text" value=""   >
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Nomor Rekening</b>
                            <input class="form-control" name="int_emp_accountno" onkeypress="return onlyNumber(event)" maxlength="30" type="text" value=""   >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Nama Akun</b>
                            <input class="form-control" name="int_emp_accountname" type="text" value=""   >
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Bank Swift</b>
                            <input class="form-control" name="int_emp_bankswift" type="text" value=""   >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Bank Branch</b>
                            <input class="form-control" name="int_emp_bankbranch" type="text" value=""   >
                        </div>
                    </div>
                </div>
                <br>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>ID Pajak</b>
                            <input class="form-control" name="int_emp_taxid" onkeypress="return onlyNumber(event)" maxlength="30" type="text" value=""   >    
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Alamat Pajak</b>
                            <input class="form-control" name="int_emp_taxadd" type="text" value=""   >
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>BPJS Ketenagakerjaan</b>
                            <input class="form-control" name="int_emp_bpjstk" onkeypress="return onlyNumber(event)" maxlength="30" type="text" value=""   >    
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>BPJS Kesehatan</b>
                            <input class="form-control" name="int_emp_bpjsk" onkeypress="return onlyNumber(event)" maxlength="30" type="text" value=""   >                          
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Tanggal Resign</b>
                            <input class="form-control" name="int_emp_resigndate" type="date" value=""   >
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>No Telephone</b>
                            <input class="form-control" name="int_emp_phone_home" onkeypress="return onlyNumber(event)" maxlength="14" type="text" value=""   >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>No Handphone</b>
                            <input class="form-control" name="int_emp_phone_mobile" onkeypress="return onlyNumber(event)" maxlength="14" type="text" value=""   >
                        </div>
                    </div>
                </div>

                <div class="form-group">
                        <b>Lama kerja</b>
                        <input class="form-control" name="int_emp_worklength" type="text" value=""   >
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Level</b>
                            <select name="int_emp_level" class="form-control"   >
                                    <option value="">Level</option>
                                    <option value="Managing Director">Managing Director</option>
                                    <option value="Chief / Director">Chief / Director</option>
                                    <option value="Division Head">Division Head</option>
                                    <option value="Advisor">Advisor</option>
                                    <option value="Department Head">Department Head</option>
                                    <option value="Expert">Expert</option>
                                    <option value="Unit Head">Unit Head</option>
                                    <option value="Specialist">Specialist</option>
                                    <option value="Analyst">Analyst</option>
                                    <option value="Officer">Officer</option>
                                    <option value="Partner Service / Outsource">Partner Service / Outsource</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Nilai / Grading</b>
                            <select name="int_emp_grading" class="form-control"   >
                                    <option value="">Nilai / Grading</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Kendaraan</b>
                            <select name="int_emp_vehicle" class="form-control"   >
                                    <option value="">Kendaraan</option>
                                    <option value="Pribadi">Pribadi</option>
                                    <option value="Umum">Umum</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Type Transportasi</b>
                            <select name="int_emp_transtype" class="form-control"   >
                                    <option value="">Type Transportasi</option>
                                    <option value="Mobil">Mobil</option>
                                    <option value="Motor">Motor</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <b>Report Line</b>
                    <input class="form-control pic" name="int_emp_reportline" type="text" value="">
                </div>

                <div class="form-group">
                    <b>NPWP Terdaftar</b>
                    <input class="form-control" name="int_emp_regisnpwp" onkeypress="return onlyNumber(event)" maxlength="30" type="text" value=""   >    
                </div>

                <div class="form-group">
                    <b>Status</b>
                    <select name="int_emp_statuss" class="form-control"   >
                        <option value="">Status</option>
                        <option value="1">Aktif</option>
                        <option value="2">Tidak Aktif</option>
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
