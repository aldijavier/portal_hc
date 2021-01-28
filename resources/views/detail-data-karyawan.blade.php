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
          <h1 class="m-0">Detail Data Karyawan</h1>
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
              
              <!-- START ALERTS AND CALLOUTS -->
                <div class="row">
                <div class="col-md-6">
                <div class="card card-default">
                
                <!-- /.card-header -->
                <div class="card-body">
                @foreach($peg ?? '' as $peg)

                @foreach($kode_generate ?? '' as $kode_generate)
                <div class="form-group">
                    <b>Status Karyawan</b>
                    <input class="form-control"  value="{{ $kode_generate->keterangan_kode }}" disabled required>
                </div>
                @break
                @endforeach

                <div class="form-group">
                    <b>Nomor Karyawan</b>
                    <input class="form-control"  value="{{ $peg->int_emp_number }}" disabled required>
                </div>
                
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Nama Karyawan</b>
                            <input class="form-control"  value="{{ $peg->int_emp_name }}" disabled required >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Nama Panggilan</b>
                            <input class="form-control"  value="{{ $peg->int_emp_pref_name }}" disabled required >
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Jenis Kelamin</b>
                            <input class="form-control"  value="{{ $peg->int_emp_gender }}" disabled required >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Status Pernikahan</b>
                            <input class="form-control"  value="{{ $peg->int_emp_marital }}" disabled required >
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Agama</b>
                            <input class="form-control"  value="{{ $peg->int_emp_religion }}" disabled required >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Kategori Pajak</b>
                            <input class="form-control"  value="{{ $peg->int_emp_tax_cat }}" disabled required >
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Tanggal Lahir</b>
                            <input class="form-control"  value="{{ Carbon\Carbon::parse($peg->int_emp_dob)->format('d/m/Y') }}" disabled required >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Kebangsaan</b>
                            <input class="form-control"  value="{{ $peg->int_emp_nation }}" disabled required >
                        </div>
                    </div>
                </div>
                    
                <div class="form-group">
                    <b>KTP</b>
                    <input class="form-control"  value="{{ $peg->int_emp_ktp }}" disabled required >
                </div>
                <br>

                <div class="form-group">
                    <label>Alamat berdasarkan KTP</label>
                    <input class="form-control"  value="{{ $peg->int_emp_add1 }}" disabled required >
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Provinsi</b>
                            <input class="form-control"  value="{{ $peg->province }}" disabled required >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Kota</b>
                            <input class="form-control"  value="{{ $peg->city }}" disabled required >
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Kecamatan</b>
                            <input class="form-control"  value="{{ $peg->district }}" disabled required >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Kelurahan</b>
                            <input class="form-control"  value="{{ $peg->village }}" disabled required >
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="primaryzip">Kode Pos</label>
                            <input class="form-control"  value="{{ $peg->int_emp_kode_pos1 }}" disabled required >
                        </div>
                    </div>
                </div>
                <br>
                @break
                @endforeach

                @foreach($peg2 ?? '' as $peg2)
                <div class="form-group">
                    <label for="secondaryaddress">Alamat saat ini (*)</label>
                    <input class="form-control"  value="{{ $peg2->int_emp_add2 }}" disabled required >
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Provinsi</b>
                            <input class="form-control"  value="{{ $peg2->province }}" disabled required >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Kota</b>
                            <input class="form-control"  value="{{ $peg2->city }}" disabled required >
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Kecamatan</b>
                            <input class="form-control"  value="{{ $peg2->district }}" disabled required >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Kelurahan</b>
                            <input class="form-control"  value="{{ $peg2->village }}" disabled required >
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="secondaryzip">Kode Pos</label>
                            <input class="form-control"  value="{{ $peg2->int_emp_kode_pos2 }}" disabled required >
                        </div>
                    </div>
                </div>
                <br>
                @break
                @endforeach
        
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Email Pribadi</b>
                            <input class="form-control"  value="{{ $peg->int_emp_email }}" disabled required >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Email NAP</b>
                            <input class="form-control"  value="{{ $peg->int_emp_email_nap }}" disabled required >
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Bergabung Tanggal</b>
                            <input class="form-control"  value="{{ Carbon\Carbon::parse($peg->int_emp_joindate)->format('d/m/Y') }}" disabled required >
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Lokasi</b>
                            <input class="form-control"  value="{{ $peg->int_emp_location }}" disabled required >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Sub Region</b>
                            <input class="form-control"  value="{{ $peg->int_emp_subregion }}" disabled required >
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

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>COA</b>
                            <input class="form-control"  value="{{ $peg->int_emp_coa }}" disabled required >
                        </div>
                    </div>

                    @foreach($directorate ?? '' as $directorate)
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Direktorat</b>
                            <input class="form-control"  value="{{ $directorate->directorate_name }}" disabled required >
                        </div>
                    </div>
                </div>
                @break
                @endforeach 

                @foreach($div ?? '' as $div)
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Divisi</b>
                            <input class="form-control"  value="{{ $div->division_name }}" disabled required >
                        </div>
                    </div>
                @break
                @endforeach

                @foreach($dept ?? '' as $dept)
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Departemen</b>
                            <input class="form-control"  value="{{ $dept->department_name }}" disabled required >
                        </div>
                    </div>
                </div>
                @break
                @endforeach

                <div class="form-row">
                @foreach($position ?? '' as $position)
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Posisi</b>
                            <input class="form-control"  value="{{ $position->position_name }}" disabled required >
                        </div>
                    </div>
                @break
                @endforeach  
                  
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Hari Kerja / Work Day</b>
                            <input class="form-control"  value="{{ $peg->int_emp_workday }}" disabled required >
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Nomor Rekening / Account No</b>
                            <input class="form-control"  value="{{ $peg->int_emp_accountno }}" disabled required >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Nama Akun / Account Name</b>
                            <input class="form-control"  value="{{ $peg->int_emp_accountname }}" disabled required >
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Bank Swift</b>
                            <input class="form-control"  value="{{ $peg->int_emp_bankswift }}" disabled required >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Bank Branch</b>
                            <input class="form-control"  value="{{ $peg->int_emp_bankbranch }}" disabled required >
                        </div>
                    </div>
                </div>
                <br>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>ID Pajak / Tax ID</b>
                            <input class="form-control"  value="{{ $peg->int_emp_taxid }}" disabled required >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Alamat Pajak / Tax Add</b>
                            <input class="form-control"  value="{{ $peg->int_emp_taxadd }}" disabled required >
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>BPJS Ketenagakerjaan</b>
                            <input class="form-control"  value="{{ $peg->int_emp_bpjstk }}" disabled required >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>BPJS Kesehatan</b>
                            <input class="form-control"  value="{{ $peg->int_emp_bpjsk }}" disabled required >
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Tanggal Resign</b>
                            <input class="form-control"  value="{{ Carbon\Carbon::parse($peg->int_emp_resigndate)->format('d/m/Y') }}" disabled required >
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>No Telephone</b>
                            <input class="form-control"  value="{{ $peg->int_emp_phone_home }}" disabled required >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>No Handphone</b>
                            <input class="form-control"  value="{{ $peg->int_emp_phone_mobile }}" disabled required >
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <b>Lama Kerja</b>
                    <input class="form-control"  value="{{ $peg->getWorkLength() }}" disabled required>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Level</b>
                            <input class="form-control"  value="{{ $peg->int_emp_level }}" disabled required >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Nilai / Grading</b>
                            <input class="form-control"  value="{{ $peg->int_emp_grading }}" disabled required >
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Kendaraan</b>
                            <input class="form-control"  value="{{ $peg->int_emp_vehicle }}" disabled required >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Type Transportasi</b>
                            <input class="form-control"  value="{{ $peg->int_emp_transtype }}" disabled required >
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <b>Report Line</b>
                    <input class="form-control"  value="{{ $peg->int_emp_reportline }}" disabled required >
                </div>

                <div class="form-group">
                    <b>NPWP Terdaftar / NPWP Registered</b>
                    <input class="form-control"  value="{{ $peg->int_emp_regisnpwp }}" disabled required >
                </div>

                <div class="form-group">
                    <b>Status</b>
                    <input class="form-control"  value="{{ ($peg->int_emp_statuss == 1) ? 'Aktif' : 'Tidak Aktif' }}" disabled required >
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
