<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    @include('Template.head')   
    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
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
          <h1 class="m-0">Edit Data Karyawan</h1>
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
                
        <form class="form-detail" action="{{ url('update-proses-datakaryawan',$karyawans->int_emp_id) }}" enctype="multipart/form-data" method="POST" id="myform">
        {{ csrf_field() }}
        @method('patch')

                <div class="card-body">

                <div class="form-group">
                    <b>Status Karyawan</b><span style="color: red">*</span>
                    @foreach($kode_generate ?? '' as $kode_generate)
                    <input class="form-control"  value="{{ $kode_generate->keterangan_kode }}" readonly required>
                    @endforeach
                    <select name="int_emp_status" class="form-control" required readonly hidden>
                        @foreach($kode_generates ?? '' as $kode_generates)
                        <option value="{{ $kode_generates->id_kode }}" hidden>{{ $kode_generates->keterangan_kode }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <b>Nomor Karyawan</b><span style="color: red">*</span>
                    <input class="form-control" name="int_emp_number" type="text" value="{{ $karyawans->int_emp_number }}" readonly required>
                </div>
                
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Nama Karyawan</b><span style="color: red">*</span>
                            <input class="form-control" name="int_emp_name" type="text" value="{{ $karyawans->int_emp_name }}" required >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Nama Panggilan</b><span style="color: red">*</span>
                            <input class="form-control" name="int_emp_pref_name" type="text" value="{{ $karyawans->int_emp_pref_name }}" required>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Jenis Kelamin</b><span style="color: red">*</span>
                            <select name="int_emp_gender" class="form-control" required>
                                    <option value="" disabled>Jenis Kelamin </option>
                                    <option value="{{ $karyawans->int_emp_gender }}">{{ $karyawans->int_emp_gender }} </option>
                                    <option value="Laki-Laki">Laki - Laki </option>
                                    <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Status Pernikahan</b><span style="color: red">*</span>
                            <select name="int_emp_marital" class="form-control">
                                @foreach($peg ?? '' as $peg)
                                <option value="{{ $peg->marital }}">{{ $peg->marital}}</option>

                                @foreach ($countries as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                            {{-- <select name="int_emp_marital" class="form-control" required>
                                    <option value="" disabled>Status Pernikahan</option>
                                    
                                        @foreach($peg ?? '' as $peg)
                                        <option value="{{ $peg->marital }}">{{ $peg->marital}}</option>

                                        @foreach ($cntr as $keys => $values)
                                            <option value="{{ $keys }}">{{ $values }}</option>
                                        @endforeach
                            </select> --}}
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Agama</b><span style="color: red">*</span>
                            <select name="int_emp_religion" class="form-control" required>
                                    <option disabled value="">Agama </option>
                                    <option value="{{ $karyawans->int_emp_religion }}">{{ $karyawans->int_emp_religion }} </option>
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
                            <b>Kategori Pajak</b><span style="color: red">*</span>
                            <select name="int_emp_tax_cat" class="form-control" required>
                                <option value="{{ $peg->pajak }}">{{ $peg->pajak}}</option>
                            </select>
                            
                            <script type="text/javascript">
                                jQuery(document).ready(function ()
                                {
                                        jQuery('select[name="int_emp_marital"]').on('change',function(){
                                           var countryID = jQuery(this).val();
                                           if(countryID)
                                           {
                                              jQuery.ajax({
                                                 url : '/dropdownlist/getstates/' +countryID,
                                                 type : "GET",
                                                 dataType : "json",
                                                 success:function(data)
                                                 {
                                                    console.log(data);
                                                    jQuery('select[name="int_emp_tax_cat"]').empty();
                                                    jQuery.each(data, function(key,value){
                                                       $('select[name="int_emp_tax_cat"]').append('<option value="'+ key +'">'+ value +'</option>');
                                                    });
                                                 }
                                              });
                                           }
                                           else
                                           {
                                              $('select[name="int_emp_tax_cat"]').empty();
                                           }
                                        });
                                });
                                </script>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Tanggal Lahir</b><span style="color: red">*</span>
                            <input class="form-control" name="int_emp_dob" type="date" value="{{ $karyawans->int_emp_dob }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Kebangsaan</b><span style="color: red">*</span>
                            <select name="int_emp_nation" class="form-control" required>
                                    <option value="" disabled>Kebangsaan</option>
                                    <option value="{{ $karyawans->int_emp_nation }}">{{ $karyawans->int_emp_nation }} </option>
                                    <option value="WNI">WNI</option>
                                    <option value="WNA">WNA</option>
                            </select>
                        </div>
                    </div>
                </div>
                    
                <div class="form-group">
                    <b>KTP</b><span style="color: red">*</span>
                    <input class="form-control" name="int_emp_ktp" onkeypress="return onlyNumber(event)" maxlength="16" type="text" value="{{ $karyawans->int_emp_ktp }}" required>
                </div>
                <br>

                <div class="form-group">
                    <label for="primaryaddress">Alamat berdasarkan KTP</label><span style="color: red">*</span>
                    <textarea class="form-control" name="int_emp_add1" type="text" id="primaryaddress" required>{{ $karyawans->int_emp_add1 }}</textarea>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Provinsi</b><span style="color: red">*</span>
                            <select name="int_emp_provinces1" id="provinces" class="form-control input-lg dynamic primaryprovinsi" data-dependent="Provinsi" required>
                                <option disabled value="">Pilih Provinsi</option>
                                <option value="{{ $karyawans->int_emp_provinces1 }}">
                                {{-- @foreach($peg ?? '' as $peg) --}}
                                {{ $peg->province }} </option>
                                

                                @foreach($provinces_list as $provinces)
                                <option value="{{$provinces->id}}">{{$provinces->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Kota</b><span style="color: red">*</span>
                            <select name="int_emp_regencies1" id="regencies" class="form-control input-lg dynamic1" data-dependent="Kota"required>
                                <option disabled value="">Pilih Kota</option>
                                <option value="{{ $karyawans->int_emp_regencies1 }}">
                                {{ $peg->city }}</option>


                                @foreach($cities_list as $cities)
                                <option value="{{$cities->id}}">{{$cities->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Kecamatan</b><span style="color: red">*</span>
                            <select name="int_emp_districts1" id="districts" class="form-control input-lg dynamic2" data-dependent="Kecamatan" required>
                                <option disabled value="">Pilih Kecamatan </option>
                                <option value="{{ $karyawans->int_emp_districts1 }}">
                                {{ $peg->district }}</option>
                                

                                @foreach($districts_list as $districts)
                                <option value="{{$districts->id}}">{{$districts->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Kelurahan</b><span style="color: red">*</span>
                            <select name="int_emp_villages1" id="villages" class="form-control input-lg" data-dependent="Kelurahan" required>
                                <option disabled value="">Pilih Kelurahan</option>
                                <option value="{{ $karyawans->int_emp_villages1 }}">
                                {{ $peg->village }}</option>
                                @endforeach

                                <!-- @foreach($villages_list as $villages)
                                <option value="{{$villages->id}}">{{$villages->name}}</option>
                                @endforeach -->
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="primaryzip">Kode Pos</label><span style="color: red">*</span>
                            <input class="form-control" name="int_emp_kode_pos1" onkeypress="return onlyNumber(event)" maxlength="5" id="primaryzip" type="text" value="{{ $karyawans->int_emp_kode_pos1 }}" required>
                        </div>
                    </div>
                </div>
                <br>

                <input type="checkbox" id="same" name="same" onchange= "addressFunction()"/>              
                <label for = "same">Jika alamat saat ini sama dengan KTP silahkan di centang.</label> 

                <div class="form-group">
                    <label for="secondaryaddress">Alamat saat ini (*)</label><span style="color: red">*</span>
                    <textarea class="form-control" name="int_emp_add2" id="secondaryaddress" type="text" required>{{ $karyawans->int_emp_add2 }}</textarea>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Provinsi</b><span style="color: red">*</span>
                            <select id="provinces2" class="form-control input-lg dynamic23 provinsiclass" data-dependent="Provinsi" required>
                                <option disabled value="">Pilih Provinsi</option>
                                <option value="{{ $karyawans->int_emp_provinces2 }}">
                                @foreach($peg2 ?? '' as $peg2)
                                {{ $peg2->province }} </option>
                      
                                @foreach($provinces_list2 as $provinces2)
                                <option value="{{$provinces2->id}}">{{$provinces2->name}}</option>
                                @endforeach
                            </select>
                            <!--// fungsi untuk read only ketika alamat saat ini di ceklis otomatis -->
                            <input type="text" id="provinces3" name="int_emp_provinces2" value="{{ $karyawans->int_emp_provinces2 }}" hidden>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Kota</b><span style="color: red">*</span>
                            <select id="regencies2" class="form-control input-lg dynamic12 kotaclass" data-dependent="Kota" required>
                                <option disabled value="">Pilih Kota</option>
                                <option value="{{ $karyawans->int_emp_regenies2 }}">
                                {{ $peg2->city }} </option>

                                @foreach($cities_list2 as $cities2)
                                <option value="{{$cities2->id}}">{{$cities2->name}}</option>
                                @endforeach
                            </select>
                            <!--// fungsi untuk read only ketika alamat saat ini di ceklis otomatis -->
                            <input type="text" id="regencies3" name="int_emp_regencies2" value="{{ $karyawans->int_emp_regencies2 }}" hidden>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Kecamatan</b><span style="color: red">*</span>
                            <select id="districts2" class="form-control input-lg dynamic22 kecamatanclass"  data-dependent="Kecamatan" required>
                                <option disabled value="">Pilih Kecamatan </option>
                                <option value="{{ $karyawans->int_emp_districts2 }}">
                                {{ $peg2->district }} </option>

                                @foreach($districts_list2 as $districts2)
                                <option value="{{$districts2->id}}">{{$districts2->name}}</option>
                                @endforeach
                            </select>
                            <!--// fungsi untuk read only ketika alamat saat ini di ceklis otomatis -->
                            <input type="text" id="districts3" name="int_emp_districts2" value="{{ $karyawans->int_emp_districts2 }}" hidden>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Kelurahan</b><span style="color: red">*</span>
                            <select id="villages2" class="form-control input-lg kelurahanclass"  data-dependent="Kelurahan" required>
                                <option disabled value="">Pilih Kelurahan</option>
                                <option value="{{ $karyawans->int_emp_villages2 }}">
                                {{ $peg2->village }}</option>
                                @endforeach
                            </select>
                            <!--// fungsi untuk read only ketika alamat saat ini di ceklis otomatis -->
                            <input type="text" id="villages3" name="int_emp_villages2" value="{{ $karyawans->int_emp_villages2 }}" hidden>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="secondaryzip">Kode Pos</label><span style="color: red">*</span>
                            <input class="form-control" name="int_emp_kode_pos2" onkeypress="return onlyNumber(event)" maxlength="5" id="secondaryzip" type="text" value="{{ $karyawans->int_emp_kode_pos2 }}" required>
                        </div>
                    </div>
                </div>
                <br>
        
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Email Pribadi</b><span style="color: red">*</span>
                            <input class="form-control" name="int_emp_email" type="email" value="{{ $karyawans->int_emp_email }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Email NAP</b><span style="color: red">*</span>
                            <input class="form-control" name="int_emp_email_nap" type="email" value="{{ $karyawans->int_emp_email_nap }}" required>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Bergabung Tanggal</b><span style="color: red">*</span>
                            <input class="form-control" name="int_emp_joindate" type="date" value="{{ $karyawans->int_emp_joindate }}" required>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Lokasi</b><span style="color: red">*</span>
                            <input class="form-control" name="int_emp_location" type="text" value="{{ $karyawans->int_emp_location }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Sub Region</b><span style="color: red">*</span>
                            <input class="form-control" name="int_emp_subregion" type="text" value="{{ $karyawans->int_emp_subregion }}" required>
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
                    <b>COA</b><span style="color: red">*</span>
                    <select name="int_emp_coa" class="form-control">
                        <option value="{{ $peg->coa }}">{{ $peg->coa}}</option>

                        @foreach ($coa as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <b>Direktorat</b><span style="color: red">*</span>
                            <select name="int_emp_directorate" class="form-control" required>
                                <option disabled value>Pilih Directorate</option>
                                <option value="{{ $karyawans->int_emp_directorate }}">
                                @foreach($direct ?? '' as $direct)
                                {{ $direct->directorate_name }} </option>
                                @endforeach

                                @foreach($directorates ?? '' as $directorates)
                                <option value="{{ $directorates->directorate_id }}">{{ $directorates->directorate_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <b>Divisi</b><span style="color: red">*</span>
                        <select class="form-control" name="int_emp_division" id="int_emp_division" required>
                            <option disabled value>Pilih Divisi</option>
                            <option value="{{ $karyawans->int_emp_division }}">
                            @foreach($div ?? '' as $div)
                            {{ $div->division_name }} </option>
                            @endforeach

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
                        <b>Departemen</b><span style="color: red">*</span>
                        <select class="form-control department_reportline_name selectsearch" name="int_emp_department" id="int_emp_department" required>
                            <option disabled value>Pilih Department</option>
                            <option value="{{ $karyawans->int_emp_department }}">
                            @foreach($dept ?? '' as $dept)
                            {{ $dept->department_name }} </option>
                            @endforeach

                            @foreach($departments ?? '' as $departments)
                            <option value="{{ $departments->department_id }}">{{ $departments->department_name }}</option>
                            @endforeach
                        </select> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <b>Posisi</b><span style="color: red">*</span>
                        <select name="int_emp_position" class="form-control selectsearch" required>
                            <option disabled value>Pilih Posisi</option>
                                <option value="{{ $karyawans->int_emp_position }}">
                                @foreach($position ?? '' as $position)
                                {{ $position->position_name }} </option>
                                @endforeach

                                @foreach($positions ?? '' as $positions)
                                <option value="{{ $positions->position_id }}">{{ $positions->position_name }}</option>
                                @endforeach
                        </select>   
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <b>Hari Kerja</b><span style="color: red">*</span>
                        <input class="form-control" name="int_emp_workday" type="text" value="{{ $karyawans->int_emp_workday }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <b>Nama Bank</b><span style="color: red">*</span>
                        <select name="int_name_bank" class="form-control">
                            <option value="{{ $peg->bank_list }}">{{ $peg->bank_list}}</option>

                            @foreach ($bankis as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    jQuery(document).ready(function ()
                    {
                        jQuery('select[name="int_name_bank"]').on('change',function(){
                            var countryID = jQuery(this).val();
                               if(countryID)
                               {
                                  jQuery.ajax({
                                     url : '/dropdownlist/getbank/' +countryID,
                                     type : "GET",
                                     dataType : "json",
                                     success:function(data)
                                     {
                                        console.log(data);
                                        jQuery('input[name="int_emp_bankswift"]').empty();
                                        jQuery.each(data, function(key,value){
                                           $('input[name="int_emp_bankswift"]').val(value, key);
                                        });
                                     }
                                  });
                               }
                               else
                               {
                                  $('input[name="int_emp_bankswift"]').empty();
                               }
                            });
                    });
                  </script>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Nomor Rekening</b><span style="color: red">*</span>
                            <input class="form-control" name="int_emp_accountno" onkeypress="return onlyNumber(event)" maxlength="16" type="text" value="{{ $karyawans->int_emp_accountno }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Nama Akun</b><span style="color: red">*</span>
                            <input class="form-control" name="int_emp_accountname" type="text" value="{{ $karyawans->int_emp_accountname }}" required>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Bank Swift</b><span style="color: red">*</span>
                            <input class="form-control" name="int_emp_bankswift" type="text" value="{{ $peg->bank_swift }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Bank Branch</b><span style="color: red">*</span>
                            <input class="form-control" name="int_emp_bankbranch" type="text" value="{{ $karyawans->int_emp_bankbranch }}" required>
                        </div>
                    </div>
                </div>
                <br>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>ID Pajak</b><span style="color: red">*</span>
                            <input class="form-control" name="int_emp_taxid" onkeypress="return onlyNumber(event)" maxlength="20" type="text" value="{{ $karyawans->int_emp_taxid }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Alamat Pajak</b><span style="color: red">*</span>
                            <input class="form-control" name="int_emp_taxadd" type="text" value="{{ $karyawans->int_emp_taxadd }}" required>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>BPJS Ketenagakerjaan</b><span style="color: red">*</span>
                            <input class="form-control" name="int_emp_bpjstk" onkeypress="return onlyNumber(event)" maxlength="20" type="text" value="{{ $karyawans->int_emp_bpjstk }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>BPJS Kesehatan</b><span style="color: red">*</span>
                            <input class="form-control" name="int_emp_bpjsk" onkeypress="return onlyNumber(event)" maxlength="20" type="text" value="{{ $karyawans->int_emp_bpjsk }}" required>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Tanggal Resign</b><span style="color: red">*</span>
                            <input class="form-control" name="int_emp_resigndate" type="date" value="{{ $karyawans->int_emp_resigndate }}">
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>No Telephone</b><span style="color: red">*</span>
                            <input class="form-control" name="int_emp_phone_home" onkeypress="return onlyNumber(event)" maxlength="14" type="text" value="{{ $karyawans->int_emp_phone_home }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>No Handphone</b><span style="color: red">*</span>
                            <input class="form-control" name="int_emp_phone_mobile" onkeypress="return onlyNumber(event)" maxlength="14" type="text" value="{{ $karyawans->int_emp_phone_mobile }}" required>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Emergency Contact Name</b><span style="color: red">*</span>
                            <input class="form-control" name="int_emp_emergency_contact_name" value="{{ $karyawans->int_emp_emergency_contact_name }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Relationship with Employee</b><span style="color: red">*</span>
                            <select name="int_emp_relationship" class="form-control">
                                    <option value="" disabled>Pilih Relationship</option>
                                    <option value="{{ $karyawans->int_emp_relationship }}">{{ $karyawans->int_emp_relationship }} </option>
                                    <option value="Istri">Istri</option>
                                    <option value="Orang Tua">Orang Tua</option>
                                    <option value="Paman Kandung">Paman Kandung</option>
                                    <option value="Saudara Kandung">Saudara Kandung</option>
                                    <option value="Suami">Suami</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Emergency Number</b><span style="color: red">*</span>
                            <input class="form-control" name="int_emp_emergency_number" type="text" onkeypress="return onlyNumber(event)" maxlength="14" value="{{ $karyawans->int_emp_emergency_number }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <b>Lama kerja</b><span style="color: red">*</span>
                    <input class="form-control" type="text" value="{{ $karyawans->getWorkLength() }}" readonly>
                </div>

                <div class="form-group">
                    <b>Level</b><span style="color: red">*</span>
                    <select name="int_emp_level" class="form-control" required>
                        <option value="" disabled>Level</option>
                        <option value="{{ $karyawans->int_emp_level }}">{{ $karyawans->int_emp_level }} </option>
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

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Kendaraan</b><span style="color: red">*</span>
                            <select name="int_emp_vehicle" class="form-control" required>
                                    <option value="" disabled>Kendaraan</option>
                                    <option value="{{ $karyawans->int_emp_vehicle }}">{{ $karyawans->int_emp_vehicle }} </option>
                                    <option value="Pribadi">Pribadi</option>
                                    <option value="Umum">Umum</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Type Transportasi</b><span style="color: red">*</span>
                            <select name="int_emp_transtype" class="form-control" required>
                                    <option value="" disabled>Type Transportasi</option>
                                    <option value="{{ $karyawans->int_emp_transtype }}">{{ $karyawans->int_emp_transtype }} </option>
                                    <option value="Mobil">Mobil</option>
                                    <option value="Motor">Motor</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <b>Report Line</b><span style="color: red">*</span>
                    <input class="form-control pic" readonly name="int_emp_reportline" type="text" value="{{ $karyawans->int_emp_reportline }}" required>
                </div>

                <div class="form-group">
                    <b>NPWP Terdaftar</b><span style="color: red">*</span>
                    <input class="form-control" name="int_emp_regisnpwp" onkeypress="return onlyNumber(event)" maxlength="20" type="text" value="{{ $karyawans->int_emp_regisnpwp }}" required>
                </div>

                <div class="form-group">
                    <b>Status</b><span style="color: red">*</span>
                    <select name="int_emp_statuss" class="form-control" required>
                        <option value="" disabled>Status</option>
                        <option value="{{ $karyawans->int_emp_statuss }}">{{ ($peg->int_emp_statuss == 1) ? 'Aktif' : 'Tidak Aktif' }} </option>
                        <option value="1">Aktif</option>
                        <option value="2">Tidak Aktif</option>
                    </select>
                </div>

                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                <input type="submit" name="submit" class="btn btn-primary btn-block" value="Submit Data">

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
